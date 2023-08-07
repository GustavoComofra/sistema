<?php
include_once("http://interno.comofrasrl.com.ar/sistema/garantia/src/app/Conexion/database.php");
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
$request = json_decode($postdata);
$Serie = trim($request->Serie);
$Correo = mysqli_real_escape_string($mysqli, trim($request->Correo));
$Telefono = mysqli_real_escape_string($mysqli, trim($request->Telefono));

$sql = "INSERT INTO `Garantia`(Id_gar,Serie,Correo,Telefono) VALUES (NULL,'$Serie','$Correo','$Telefono')";
if ($mysqli->query($sql) === TRUE) {

$authdata = [
'Serie' => $Serie,
'Correo' => $Correo,
'Telefono' => $Telefono,

];
echo json_encode($authdata);

}

}

mysqli_close($mysqli);
?>
