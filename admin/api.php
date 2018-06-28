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
$data = json_decode(file_get_contents('php://input')); // JSON or empty
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
      case "POST": echo addMesse($mysql,$data); break;
      case "PUT": echo updateMesse($mysql,$id, $data);break;
      case "PATCH": echo changeMesseSort($mysql,$id, $data);break;
      case "DELETE": echo deleteMesse($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "thema":
    switch($method) {
      case "GET": echo getThema($mysql,$id);break;
      case "POST": echo addThema($mysql,$data); break;
      case "PUT": echo updateThema($mysql,$id, $data);break; 
      case "DELETE": echo deleteThema($mysql,$id);break;
      default: die("{error:'Method ".$method." for Object " . $object . " not supported'}");
    }
    break;
  case "oton":
    switch($method) {
      case "GET": echo getOton($mysql,$id);break;
      case "POST": echo addOton($mysql,$data); break;
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
  $sql = "SELECT id, titel, slug, `text`, bild, link, themenservice, datum, enddatum, sortierung, kontakt_aktiv, presseteam FROM " . DB_PREFIX . "_messen".$where;
  return getObject($mysql, $sql, $id);
}
function addMesse($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_messen (titel, slug, `text`, bild, link, datum, enddatum, sortierung, kontakt_aktiv, presseteam) VALUES ('".$data->titel."', '".$data->slug."', '".$data->text."', '".$data->bild."', '".$data->link."', '".$data->datum."', '".$data->enddatum."', '".$data->sortierung."','".$data->kontakt_aktiv."','".$data->presseteam."')";
  return addObject($mysql, $sql);
}
function updateMesse($mysql,$id, $data) {
  $sql = "UPDATE " . DB_PREFIX . "_messen SET titel='".$data->titel."', slug='".$data->slug."', `text`='".$data->text."', bild='".$data->bild."', link='".$data->link."', datum='".$data->datum."', enddatum='".$data->enddatum."', sortierung='".$data->sortierung."', kontakt_aktiv='".$data->kontakt_aktiv."', presseteam='".$data->presseteam."' WHERE id=".$id;
  return updateObject($mysql, $sql);
}
function changeMesseSort($mysql,$id, $data) {
  $mySort = getField("SELECT sortierung FROM " . DB_PREFIX . "_messen WHERE id=".$id);
  if($data->messeUp) {
    if($data->reverseSort) {
      $otherRow = getMultipleFields("SELECT id, sortierung FROM " . DB_PREFIX . "_messen WHERE sortierung > ".$mySort." ORDER by sortierung ASC LIMIT 1");
    } else {
      $otherRow = getMultipleFields("SELECT id, sortierung FROM " . DB_PREFIX . "_messen WHERE sortierung < ".$mySort." ORDER by sortierung DESC LIMIT 1");
    }
  } else {
    if($data->reverseSort) {
      $otherRow = getMultipleFields("SELECT id, sortierung FROM " . DB_PREFIX . "_messen WHERE sortierung < ".$mySort." ORDER by sortierung DESC LIMIT 1");
    } else {
      $otherRow = getMultipleFields("SELECT id, sortierung FROM " . DB_PREFIX . "_messen WHERE sortierung > ".$mySort." ORDER by sortierung ASC LIMIT 1");
    }
  }
  $mysql->query("UPDATE " . DB_PREFIX . "_messen SET sortierung=".$otherRow[1]. " WHERE id=".$id);
  return updateObject($mysql, "UPDATE " . DB_PREFIX . "_messen SET sortierung=".$mySort. " WHERE id=".$otherRow[1]);
}
function deleteMesse($mysql,$id) {
  $sql = "DELETE FROM " . DB_PREFIX . "_messen WHERE id=".$id;
  return updateObject($mysql, $sql);
}

// Thema
function getThema($mysql,$id) {
  $where = "";
  if($id) {
    $where = " AND id=".$id;
  }
  $sql = "SELECT t.id, t.titel, t.`text`, t.messen_id, m.slug AS messe, t.pdf, t.sortierung FROM " . DB_PREFIX . "_themen t, " . DB_PREFIX . "_messen m WHERE m.id=t.messen_id".$where;
  return getObject($mysql, $sql, $id);
}
function addThema($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_themen (titel, `text`, messen_id) VALUES ('".$data["titel"]."', '".$data["text"]."', ".$data["messen_id"].")";
  return addObject($mysql, $sql);
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
  return getObject($mysql, $sql, $id);
}
function addOton($mysql,$data) {
  $sql = "INSERT INTO  " . DB_PREFIX . "_otoene (titel, `text`, themen_id) VALUES ('".$data["titel"]."', '".$data["text"]."', ".$data["themen_id"].")";
  return addObject($mysql, $sql);
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
  return getObject($mysql, $sql, $id);
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
function getField($mysql, $sql) {
  $result = $mysql->query($sql);
  if ($result->num_rows == 1) {
    return $result->fetch_array()[0];
  } else {
    return "";
  }
}
function getMultipleFields($mysql, $sql) {
  $result = $mysql->query($sql);
  if ($result->num_rows == 1) {
    return $result->fetch_array();
  } else {
    return "";
  }
}
function getObject($mysql, $sql, $id) {
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
    http_response_code(404);
    return json_encode(array('error' =>'Object with id ' . $id . ' not found'));
  }
}
function addObject($mysql, $sql) {
  if ($mysql->query($sql) === TRUE) {
    $last_id = $mysql->insert_id;
    echo json_encode($last_id);
  } else {
    http_response_code(403);
    return json_encode(array('error' =>'Object could not be inserted: '.$mysql->error));
  }
}
function updateObject($mysql, $sql) {
  if ($mysql->query($sql) === TRUE) {
    $affected_rows = $mysql->affected_rows;
    echo json_encode($affected_rows);
  } else {
    http_response_code(403);
    return json_encode(array('error' =>'Object could not be updated: '.$mysql->error));
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
      return json_encode(array('error' =>'Login Error.'));
    }
    return $token == calcToken($data["login"], $data["password"]);
  } else {
    return json_encode(array('error' =>'Login Error.'));
  }
}
function checkToken($mysql, $userId, $token) {
  $sql = "SELECT login, password FROM " . DB_PREFIX . "_user WHERE id=".$userId;
  $result = $mysql->query($sql);
  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    return $token == calcToken($data["login"], $data["password"]);
  } else {
    return json_encode(array('error' =>'No User for ID '.$userId.' found.'));
  }
}
function calcToken($login, $password) {
  return hash('sha256', $login.$password);
}
?>