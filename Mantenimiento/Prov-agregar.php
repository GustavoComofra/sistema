<?php
include("../Conexion/conexion.php");


$Proveedor= $_POST['Proveedor'];
$Direccion=$_POST['Direccion'];
$Fk_Localidad = $_POST['Fk_Localidad'];
$FK_Provincia = $_POST['FK_Provincia'];
$Telefono = $_POST['Telefono'];
$Email= $_POST['Email'];
$Contacto=$_POST['Contacto'];
$ObsProv = $_POST['ObsProv'];


$query = "INSERT INTO `Proveedor` (`IdProv`, `Proveedor`, `Direccion`, `Fk_Localidad`, `FK_Provincia`, `Telefono`, `Email`, `Contacto`, `Activo`, `FechaProv`, `ObsProv`) VALUES (NULL, '$Proveedor', '$Direccion', '$Fk_Localidad', '$FK_Provincia', '$Telefono', '$Email', '$Contacto', 'Si', current_timestamp(), '$ObsProv');";




$result = mysqli_query($mysqli, $query);
if(!$result){
die('Error');
}
echo "agregado sastifactoriamente " . $Maquina;


?>