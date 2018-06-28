<?php
// header('Content-Type: application/json');
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

echo $id;
echo "<br/>Data: <br/>";
print_r($data);

echo $data->titel;
echo "<br/>";
echo $method;
?>