<?php
$type = $_GET["type"]; // list (default) | grid | stripe
$sort = $_GET["sort"]; // manual | datum (default)
$columns = !empty($_GET['columns']) && is_string($_GET['columns']) ? $_GET['columns'] : 3; //nr of columns for grid-view. defaults to 3
$max = !empty($_GET['max']) && is_string($_GET['max']) ? $_GET['max'] : -1; //nr of results. defaults to -1 (all)
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 

if($sort == "manual") {
  $sorter = "sortierung ASC";
} else {
  $sorter = "datum DESC";
}

if($max == "-1") {
  $limit = "";
} else {
  $limit = "LIMIT ".$max;
}

$sql = "SELECT titel, slug, bild FROM ".DB_PREFIX."_messen ORDER BY ".$sorter." ".$limit;
$result = $mysql->query($sql);

$messen = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($messen, $row);
  }
}
$mysql->close();
?>


<?php if($type == "grid"): ?>
<div class="teaser-locations">
  <div class="row locations">
    <?php foreach ($messen as $messe): ?>
      <div class="col-sm-4 col-xs-12">
        <a href="<?php echo $messe["slug"];?>" class="location">
          <figure>
            <div class="figImage"><img src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>"></div>
          </figure>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php elseif($type == "stripe"): ?>
  <div class="row locations">
    <?php foreach ($messen as $messe): ?>
      <div class="col-md-3 col-sm-6">
          <a href="<?php echo $messe["slug"];?>" class="location">
              <figure>
                  <div class="figImage"><img src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>"></div>
                  <figcaption>
                      <strong><?php echo $messe["titel"];?></strong>
                      <p>Alle Radiospos zur Messe.</p>
                  </figcaption>
              </figure>
          </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <ul style="list-style-type: none;" class="addContent ">
    <?php foreach ($messen as $messe): ?>
      <li>
        <a href="<?php echo $messe["slug"];?>">
          <img style="width:100%;height:auto;" src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>"/>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
