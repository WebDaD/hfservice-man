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
  $sorter = " sortierung ASC";
} else {
  $sorter = " datum DESC";
}

$sql = "SELECT title, slug, bild, datum FROM ".DB_PREFIX."_messen ".$sorter;

$result = $mysql->query($sql);


if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    // HERE be HTML $row["fieldname"]
  }
} else {
  // HERE be HTML for 0 Results
}
$mysql->close();
?>
