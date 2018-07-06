<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: token, id');
header('Access-Control-Max-Age: 1728000');
if (strpos($_SERVER['SERVER_NAME'],'demo.') !== false) {
  include 'config.demo.php';
} else {
  include 'config.php';
}

$object = $_GET["object"]; // messe, thema, oton

if ($object != 'messe' && $object != 'thema' && $object != 'oton') {
  http_response_code(400);
  echo json_encode(array('error' =>'Object ' . $object . ' not valid. Use messe, thema or oton'));
  die();
}

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysql->connect_errno . ") " . $mysql->connect_error;
}
$mysql->query("SET NAMES utf8"); 
switch($object) {
  case 'messe': echo sortMesse($mysql);break;
  case 'thema': echo sortThema($mysql);break;
  case 'oton': echo sortOton($mysql);break;
  default: 
    http_response_code(400);
    echo json_encode(array('error' =>'Object ' . $object . ' not valid. Use messe, thema or oton'));
  break;
}
function sortMesse($mysql) {
  $sql = "SELECT id FROM " . DB_PREFIX . "_messen ORDER by id ASC";
  $i = 1;
  $result = $mysql->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $updateSQL = "UPDATE " . DB_PREFIX . "_messen SET sortierung=".$i." WHERE id=".$row["id"];
      $mysql->query($updateSQL);
      $i++;
    }
    return json_encode(array('result' => $i.' Messen resorted'));
  } else {
    http_response_code(404);
    return json_encode(array('error' =>'No Messen found'));
  }
}
function sortThema($mysql) {
  $sql = "SELECT id, messen_id FROM " . DB_PREFIX . "_themen ORDER by messen_id ASC, id ASC";
  $i = 1;
  $c = 1;
  $currentMesseID = -1;
  $result = $mysql->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if ($currentMesseID != $row["messen_id"]) {
        $currentMesseID = $row["messen_id"];
        $i = 1;
      }
      $updateSQL = "UPDATE " . DB_PREFIX . "_themen SET sortierung=".$i." WHERE id=".$row["id"];
      $mysql->query($updateSQL);
      $i++;
      $c++;
    }
    return json_encode(array('result' => $c.' Themen resorted'));
  } else {
    http_response_code(404);
    return json_encode(array('error' =>'No Themen found'));
  }
}
function sortOton($mysql) {
  $sql = "SELECT id, themen_id FROM " . DB_PREFIX . "_otoene ORDER by themen_id ASC, id ASC";
  $i = 1;
  $c = 1;
  $currentThemaID = -1;
  $result = $mysql->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if ($currentThemaID != $row["themen_id"]) {
        $currentThemaID = $row["themen_id"];
        $i = 1;
      }
      $updateSQL = "UPDATE " . DB_PREFIX . "_otoene SET sortierung=".$i." WHERE id=".$row["id"];
      $mysql->query($updateSQL);
      $i++;
      $c++;
    }
    return json_encode(array('result' => $c.' O-Töne resorted'));
  } else {
    http_response_code(404);
    return json_encode(array('error' =>'No O-Töne found'));
  }
}

?>