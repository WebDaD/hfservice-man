<?php
if (strpos($_SERVER['SERVER_NAME'],'demo.') !== false) {
  include 'config.demo.php';
} else {
  include 'config.php';
}
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 

$sql_now = "SELECT titel, slug, bild FROM ".DB_PREFIX."_messen ORDER BY titel ASC";
$result_now = $mysql->query($sql_now);
$now = array();
if ($result_now->num_rows > 0) {
  while($row = $result_now->fetch_assoc()) {
    array_push($now, $row);
  }
}

$mysql->close();

?>
   <div class="row no-padding-outside">
                <div class="broadcasting">
                    <div class="row">
                   

                            <div id="unique-image-text-section-oben">


                                <div class="teaser-locations">
                                    <div class="row locations">
                                       
          <?php foreach ($now as $messe): ?>
          <div class="col-md-4 col-xs-12">
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

    
    

    </div>
  </div>