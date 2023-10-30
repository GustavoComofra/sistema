<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');


$json = file_get_contents('php://input');
$params = json_decode($json);

require("http://interno.comofrasrl.com.ar/sistema/garantia/Conexion/conexion.php");
//include_once("http://localhost/sistema/garantia/src/app/Conexion/database.php");
$con = returnConection();

mysqli_query($con ,"INSERT INTO `Garantia` (`Id_gar`, `Serie`, `Correo`, `Telefono`, `Fecha`, `FechaContestacion`, `Observacion`) VALUES (NULL, '$params->Serie', '$params->Correo', '$params->Telefono', current_timestamp(), '', '');");

class Result{}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje ='A la brevesas se estara respondiendo';


header('Content-Type: application/json');

echo json_encode($response);
?>
<?php
//$titulo="Prueba correo";
//$mensaje="Mensaje de correo";
//$para="gustavog@live.com.ar";
//$para="gustavog@live.com.ar";

//$cabeceras = 'From: industrial@comofrasrl.com.ar>';
//$enviado = mail($para, $titulo, $mensaje,$cabeceras);
?>
