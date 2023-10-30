<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

$db_host = '198.27.76.221';
$db_username = 'comofras_sistema';
$db_password = 'Comofra05!';
$db_name = 'comofras_bdinterno';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

$to = "gustavog@live.com.ar";
$subject = "Pedido de Garantia";
$message = "Su pedido habilitacion de garantia esta en proceso";
$headers = "From: ventas@comofrasrl.com.ar" . "\r\n" . "CC: gustavog@live.com.ar";

//mail($to, $subject, $message, $headers);


if ($mysqli->connect_error) {
die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}



?>
