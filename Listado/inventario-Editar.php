<?php
include('../Conexion/conexion.php');

$idInventario  = $_POST['idInventario'];
$Cantidad= $_POST['Cantidad'];
$CodCmg = $_POST['CodCmg'];
$ObsInv = $_POST['ObsInv'];

$query = "UPDATE `Inventario` SET `CodCmg` = '$CodCmg', `Cantidad` = '$Cantidad', `ObsInv` = '$ObsInv' WHERE `Inventario`.`idInventario` = '$idInventario'";
$result = mysqli_query($mysqli, $query);

if(!$result){
    die('Error edicion');
    }

echo "Registro actualizado";

?>