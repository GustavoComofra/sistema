<?php
include("../Conexion/conexion.php");

$IdProv = $_POST['IdProv'];
//$IdProv= 3;
echo $IdProv1;
$Proveedor= $_POST['Proveedor'];
$Direccion=$_POST['Direccion'];
$Fk_Localidad = $_POST['Fk_Localidad'];
$FK_Provincia = $_POST['FK_Provincia'];
$Telefono = $_POST['Telefono'];
$Email= $_POST['Email'];
$Contacto=$_POST['Contacto'];
$Activo=$_POST['Activo'];
$ObsProv = $_POST['ObsProv'];

$query = "UPDATE `Proveedor` SET `Proveedor` = '$Proveedor', `Direccion` = '$Direccion', `Fk_Localidad` = '$Fk_Localidad', `FK_Provincia` = '$FK_Provincia', `Telefono` = '$Telefono', `Email` = '$Email', `Contacto` = '$Contacto', `Activo` = '$Activo', `ObsProv` = '$ObsProv' WHERE `Proveedor`.`IdProv` = '$IdProv';";

 //$query = "UPDATE `Proveedor` SET `Proveedor` = '$Proveedor' WHERE `Proveedor`.`IdProv` = '$IdProv';";

$result = mysqli_query($mysqli, $query);

if(!$result){
    die('Error edicion Prov-Editar '. $IdProv);
    }

echo "Registro actualizado ". $IdProv;

?>