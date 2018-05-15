<?php
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 

$sql_now = "SELECT titel, slug, bild FROM ".DB_PREFIX."_messen WHERE datum > CURDATE() ORDER BY datum ASC";
$result_now = $mysql->query($sql_now);
$now = array();
if ($result_now->num_rows > 0) {
  while($row = $result_now->fetch_assoc()) {
    array_push($now, $row);
  }
}
$sql_old = "SELECT titel, slug, bild FROM ".DB_PREFIX."_messen WHERE datum < CURDATE() ORDER BY datum DESC";
$result_old = $mysql->query($sql_old);
$old = array();
if ($result_old->num_rows > 0) {
  while($row = $result_old->fetch_assoc()) {
    array_push($old, $row);
  }
}
$mysql->close();

?>
  <div id="unique-image-text-section-oben">
   <div class="sidebar-section">

    
    
      <div class="teaser-locations">
        <div class="row locations">
          <?php foreach ($now as $messe): ?>
          <div class="col-sm-4 col-xs-12">
            <a href="<?php echo $messe["slug"];?>" class="location">
              <figure>
                <div class="figImage">
                  <img src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>">
                </div>
              </figure>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      
    
      <div class="teaser-locations">
        <div class="row locations">
          <?php foreach ($old as $messe): ?>
          <div class="col-sm-4 col-xs-12">
            <a href="<?php echo $messe["slug"];?>" class="location">
              <figure>
                <div class="figImage">
                  <img src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>">
                </div>
              </figure>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>