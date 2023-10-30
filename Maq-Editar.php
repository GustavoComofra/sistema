<?php
include("Conexion/conexion.php");
//$idMaq = 81;
$idMaq = $_POST['txtidMaq'];
$Maquina=$_POST['txtMaquina'];
$Modelo=$_POST['txtModelo'];
$Link=$_POST['txtLink'];
$ProvedMaq= $_POST['listProvedMaq'];
$Fk_Clasi= $_POST['listClasificacion'];
$ContMaq=$_POST['txtContMaq'];
$DiasManteni = $_POST['txtDiasManteni'];
$ValorMaq= $_POST['txtValorMaq'];
$ObsMaq=$_POST['txtObsMaq'];



// $query = "UPDATE `Maquinaria` SET `Maquina` = '$Maquina', `Modelo` = '$Modelo', `Link` = '$Link', `ProvedMaq` = '$ProvedMaq', `Fk_Clasi` = '$Fk_Clas', `ContMaq` = '$ContMaq', `DiasManteni` = '$DiasManteni', `ValorMaq` = '$ValorMaq', `ObsMaq` = '$ObsMaq' WHERE `Maquinaria`.`idMaq` = '$idMaq'";

$query = "UPDATE `Maquinaria` SET `Maquina` = '$Maquina' , `Modelo` = '$Modelo', `Link` = '$Link', `ProvedMaq` = '$ProvedMaq',`Fk_Clasi` = '$Fk_Clasi', `ContMaq` = '$ContMaq', `DiasManteni` = '$DiasManteni', `ValorMaq` = '$ValorMaq', `ObsMaq` = '$ObsMaq' WHERE `Maquinaria`.`idMaq` = '$idMaq';";


$result = mysqli_query($mysqli, $query);

$result = mysqli_query($mysqli, $query);
if(!$result){
die('Error de edicion'. $idMaq);
}
echo "Edicion sastifactoriamente num " . $idMaq;

?>