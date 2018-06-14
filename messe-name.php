<?php
$url = explode( '#', $_GET["messe"] );
$messe = $url[0];

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


$sql = "SELECT titel FROM ".DB_PREFIX."_messen WHERE slug='".$messe."'";
$result = $mysql->query($sql);
if ($result->num_rows == 1) {
  $data = $result->fetch_assoc();
} else {
  die("404 - Messe nicht gefunden");
}
echo $data["titel"];
$mysql->close();
?>