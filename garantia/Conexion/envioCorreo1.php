<?php

<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');


$json = file_get_contents('php://input');
$params = json_decode($json);

require("./conexion.php");
//include_once("http://localhost/sistema/garantia/src/app/Conexion/database.php");
$con = returnConection();

mysqli_query($con ,"INSERT INTO `Garantia` (`Id_gar`, `Serie`, `Correo`, `Telefono`, `Fecha`, `FechaContestacion`, `Observacion`) VALUES (NULL, '$params->Serie', '$params->Correo', '$params->Telefono', current_timestamp(), '', '');");



header('Content-Type: application/json');

echo json_encode($response);
?>


$titulo="Prueba correo";
$mensaje="Mensaje de correo";
$para="gustavog@live.com.ar";
//$para="gustavog@live.com.ar";

$cabeceras = 'From: industrial@comofrasrl.com.ar>';
$enviado = mail($para, $titulo, $mensaje,$cabeceras);
?>
