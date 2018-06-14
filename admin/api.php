<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: POST, PUT, DELETE, GET, OPTIONS');
header('Access-Control-Allow-Headers: token, id');
header('Access-Control-Max-Age: 1728000');
$method = $_SERVER['REQUEST_METHOD']; // 'GET', 'HEAD', 'POST', 'PUT', 'DELETE'
$object = $_GET["object"]; // messe, thema, oton, user
$id = $_GET["id"]; // id or empty
$file = $_GET["file"]; // type of file or empty
$data = $_POST["data"]; // JSON or empty
$headers = getallheaders ();
$token = $headers["id"]; // token
$userId = $headers["token"]; // token

if (strpos($_SERVER['SERVER_NAME'],'demo.') !== false) {
  include 'config.demo.php';
} else {
  include 'config.php';
}



$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysql->connect_errno . ") " . $mysql->connect_error;
}
$mysql->query("SET NAMES utf8"); 

/* TODO: activate!
if ($method == "GET" && $object == "login") {
  echo login($mysql, $data);
  exit(0);
} else {
  if (!$userId && !$token && !checkToken($mysql,$userId,$token)) {
    die("{error:'Token Error.'}");
  }
}
*/
switch($object) {
  case "messe":
    switch($method) {
      case "GET": echo getMesse($mysql,$id);break;
      case "POST": 
        if($file) {
          if ($file == "themenservice") {
            echo uploadThemenserviceForMesse($mysql,$id,$data);
          } else {
            die("{error:'File ".$file." for method ".$method." for Object " . $object . " not supported'}");
          }
        } else {
          echo addMesse($mysql,$data);
        }
        break;
      case "PUT": echo updateMesse($mysql,$id, $data);break;
      case "DELETE": echo deleteMesse($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "thema":
    switch($method) {
      case "GET": echo getThema($mysql,$id);break;
      case "POST": 
        if($file) {
          if ($file == "pdf") {
            echo uploadPDFForThema($mysql,$id,$data);
          } else {
            die("{error:'File ".$file." for method ".$method." for Object " . $object . " not supported'}");
          }
        } else {
          echo addThema($mysql,$data);
        }
        break;
      case "PUT": echo updateThema($mysql,$id, $data);break; 
      case "DELETE": echo deleteThema($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "oton":
    switch($method) {
      case "GET": echo getOton($mysql,$id);break;
      case "POST": 
        if($file) {
          if ($file == "bild") {
            echo uploadBildForOton($mysql,$id,$data);
          } else if ($file == "mp3") {
            echo uploadMP3ForOton($mysql,$id,$data);
          } else {
            die("{error:'File ".$file." for method ".$method." for Object " . $object . " not supported'}");
          }
        } else {
          echo addOton($mysql,$data);
        }
        break;
      case "PUT": echo updateOton($mysql,$id, $data);break;
      case "DELETE": echo deleteOton($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "user":
    switch($method) {
      case "GET": echo getUser($mysql,$id);break;
      case "POST": echo addUser($mysql,$data);break;
      case "PUT": echo updateUser($mysql,$id, $data);break;
      case "DELETE": echo deleteUser($mysql,$id);break;
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
  $sql = "SELECT id, titel, slug, `text`, bild, link, themenservice, datum, enddatum, sortierung FROM " . DB_PREFIX . "_messen".$where;
  return getObject($mysql, $sql);
}
function addMesse($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_messen (titel, slug, `text`, link, datum, enddatum, sortierung) VALUES ('".$data["titel"]."', '".$data["slug"]."', '".$data["text"]."', '".$data["link"]."', '".$data["datum"]."', '".$data["enddatum"]."', '".$data["sortierung"]."')";
  return addObject($mysql, $sql);
}
function uploadThemenserviceForMesse($mysql,$id,$data) {
  // TODO: upload file in data, update db
}
function updateMesse($mysql,$id, $data) {
  // TODO: update
}
function deleteMesse($mysql,$id) {
  // TODO: delete
}

// Thema
function getThema($mysql,$id) {
  $where = "";
  if($id) {
    $where = " WHERE id=".$id;
  }
  $sql = "SELECT id, titel, `text`, messen_id, pdf FROM " . DB_PREFIX . "_themen".$where;
  return getObject($mysql, $sql);
}
function addThema($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_themen (titel, `text`, messen_id) VALUES ('".$data["titel"]."', '".$data["text"]."', ".$data["messen_id"].")";
  return addObject($mysql, $sql);
}
function uploadPDFForThema($mysql,$id,$data) {
  // TODO: upload file in data, update db 
}
function updateThema($mysql,$id, $data) {
  // TODO: update
}
function deleteThema($mysql,$id) {
  // TODO: delete
}

// Oton
function getOton($mysql,$id) {
  $where = "";
  if($id) {
    $where = " WHERE id=".$id;
  }
  $sql = "SELECT id, titel, `text`, bild, themen_id, mp3, upload FROM " . DB_PREFIX . "_otoene".$where;
  return getObject($mysql, $sql);
}
function addOton($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_otoene (titel, `text`, themen_id) VALUES ('".$data["titel"]."', '".$data["text"]."', ".$data["themen_id"].")";
  return addObject($mysql, $sql);
}
function uploadBildForOton($mysql,$id,$data) {
  // TODO: upload file in data, update db 
}
function uploadMP3ForOton($mysql,$id,$data) {
  // TODO: upload file in data, update db 
}
function updateOton($mysql,$id, $data) {
  // TODO: update
}
function deleteOton($mysql,$id) {
  // TODO: delete
}

// User
function getUser($mysql,$id) {
  $where = "";
  if($id) {
    $where = " WHERE id=".$id;
  }
  $sql = "SELECT id, login, password FROM " . DB_PREFIX . "_user".$where;
  return getObject($mysql, $sql);
}
function addUser($mysql,$data) {
  $sql = "INSERT INTO " . DB_PREFIX . "_user (login, password) VALUES ('".$data["login"]."', SHA('".$data["password"]."',256))";
  return addObject($mysql, $sql);
}
function updateUser($mysql,$id, $data) {
  // TODO: update
}
function deleteUser($mysql,$id) {
  // TODO: delete
}

// global
function getObject($mysql, $sql) {
  $objects = array();
  $result = $mysql->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      array_push($objects, $row);
    }
    if(count($objects) > 1) {
      return json_encode($objects);
    } else {
      return json_encode($objects[0]);
    }
    
  } else {
    die("{error:'Object with id " . $id . " not found'}");
  }
}
function addObject($mysql, $sql) {
  if ($mysql->query($sql) === TRUE) {
    $last_id = $mysql->insert_id;
    echo json_encode($last_id);
  } else {
    die("{error:'Object could not be inserted: ".$mysql->error."'}");
  }
}

function login($mysql, $data) {
  $sql = "SELECT login, password FROM " . DB_PREFIX . "_user WHERE login=".$data["login"];
  $result = $mysql->query($sql);
  if ($result->num_rows == 1) {
    $res = $result->fetch_assoc();
    if (hash('sha256', $data["password"]) == $res["password"]) {
      return calcToken($data["login"], $data["password"]);
    } else {
      die("{error:'Login Error.'}");
    }
    return $token == calcToken($data["login"], $data["password"]);
  } else {
    die("{error:'Login Error.'}");
  }
}
function checkToken($mysql, $userId, $token) {
  $sql = "SELECT login, password FROM " . DB_PREFIX . "_user WHERE id=".$userId;
  $result = $mysql->query($sql);
  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    return $token == calcToken($data["login"], $data["password"]);
  } else {
    die("{error:'No User for ID ".$userId." found.'}");
  }
}
function calcToken($login, $password) {
  return hash('sha256', $login.$password);
}
?>