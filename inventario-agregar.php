<?php
include('Conexion/conexion.php');
//$search = $_POST['app-form'];
//echo $search=$_POST['nombre'];
//$UsuarioInventario=$_SESSION['usuario'];
$ValorCantidad= $_POST['Cantidad'];
if($ValorCantidad > 0){
$Cantidad= $_POST['Cantidad'];
$UsuarioInventario=$_POST['UsuarioInventario'];
$CodCmg = $_POST['CodCmg'];
$ObsInv = $_POST['ObsInv'];

$query = "INSERT INTO `Inventario` (`idInventario`, `CodCmg`, `Cantidad`, `Sectorinv`, `FechaInventario`, `UsuarioInventario`, `ObsInv`) VALUES (NULL, '$CodCmg', '$Cantidad', '1', current_timestamp(), '$UsuarioInventario', '$ObsInv')";

$result = mysqli_query($mysqli, $query);
if(!$result){
echo "Error";

//die("Error");

}
//echo "agregado sastifactoriamente " . $UsuarioInventario;
} 
?> 