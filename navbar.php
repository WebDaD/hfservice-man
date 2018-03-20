<?php
$type = $_GET["type"]; // list (default) | grid | stripe
$sort = $_GET["sort"]; // manual | datum (default)
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

$sql = "SELECT titel, slug, bild FROM ".DB_PREFIX."_messen ORDER BY ".$sorter;
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

<?php elseif($type == "stripe"): ?>

<?php else: ?>
  <ul style="list-style-type: none;">
    <?php foreach ($messen as $messe): ?>
      <li>
        <a href="<?php echo $messe["slug"];?>">
          <img style="width:100%;height:auto;" src="/uploads/<?php echo $messe["bild"];?>" alt="<?php echo $messe["titel"];?>"/>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
