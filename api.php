<?php
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD']; // 'GET', 'HEAD', 'POST', 'PUT', 'DELETE'
$object = $_GET["object"]; // messe, thema, oton
$id = $_GET["id"]; // id or empty
$data = $_POST["data"]; // JSON or empty

include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 

switch($object) {
  case "messe":
    switch($method) {
      case "GET": echo getMesse($mysql,$id);break;
      case "POST": echo addMesse($mysql,$data);break;
      case "PUT": echo updateMesse($mysql,$id, $data);break;
      case "DELETE": echo deleteMesse($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "thema":
    switch($method) {
      case "GET": echo getThema($mysql,$id);break;
      case "POST": echo addThema($mysql,$data);break;
      case "PUT": echo updateThema($mysql,$id, $data);break;
      case "DELETE": echo deleteThema($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "oton":
    switch($method) {
      case "GET": echo getOton($mysql,$id);break;
      case "POST": echo addOton($mysql,$data);break;
      case "PUT": echo updateOton($mysql,$id, $data);break;
      case "DELETE": echo deleteOton($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  default:
    die("{error:'Object " . $object . " not supported'}");
}
$mysql->close();

// functions. return json

// Messe
function getMesse($mysql,$id) {
  
  $where = "";
  if($id) {
    $where = " WHERE id=".$id;
  }
  $messen = array();
  $sql = "SELECT id, titel, bild, link, themenservice, datum, enddatum FROM " . DB_PREFIX . "_messen".$where;
  $result = $mysql->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($messen, $row);
    }
    if(count($messen) > 1) {
      return json_encode($messen);
    } else {
      return json_encode($messen[0]);
    }
    
  } else {
    die("{error:'Messe with id " . $id . " not found'}");
  }
}
function addMesse($mysql,$data) {
  
}
function updateMesse($mysql,$id, $data) {
  
}
function deleteMesse($mysql,$id) {
  
}

// Thema
function getThema($mysql,$id) {

}
function addThema($mysql,$data) {
  
}
function updateThema($mysql,$id, $data) {
  
}
function deleteThema($mysql,$id) {
  
}

// Oton
function getOton($mysql,$id) {

}
function addOton($mysql,$data) {
  
}
function updateOton($mysql,$id, $data) {
  
}
function deleteOton($mysql,$id) {
  
}
?>