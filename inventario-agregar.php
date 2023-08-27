<?php
include('Conexion/conexion.php');
//$search = $_POST['app-form'];
//echo $search=$_POST['nombre'];
if(isset($_POST['Cantidad'])){
$Cantidad= $_POST['Cantidad'];
$CodCmg = $_POST['CodCmg'];
$ObsInv = $_POST['ObsInv'];

$query = "INSERT INTO `Inventario` (`idInventario`, `CodCmg`, `Cantidad`, `Sectorinv`, `FechaInventario`, `UsuarioInventario`, `ObsInv`) VALUES (NULL, '$CodCmg', '$Cantidad', '1', current_timestamp(), '', '$ObsInv')";

$result = mysqli_query($mysqli, $query);
if(!$result){
die('Error');
}
echo "agregado sastifactoriamente ";
}

?>