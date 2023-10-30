<?php
include('Conexion/conexion.php');
if(isset($_POST['Maquina'])){
$Maquina= $_POST['Maquina'];
$Modelo=$_POST['Modelo'];
$Link = $_POST['Link'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/Mantenimiento/img/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"/Mantenimiento/img/".$nombre_imagen);
$Imagen = 'https://interno.comofrasrl.com.ar/sistema/Mantenimiento/img/'.$nombre_imagen;

$ProvedMaq= $_POST['ProvedMaq'];
$ContMaq=$_POST['ContMaq'];
$DiasManteni = $_POST['DiasManteni'];

$ValorMaq= $_POST['ValorMaq'];
$ObsMaq=$_POST['ObsMaq'];
$idMaq = $_POST['idMaq'];

$userMAq = $_POST['userMAq'];

// $query = "INSERT INTO `Maquinaria` (`idMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `ContMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `Activo`) VALUES (NULL, '$Maquina', '$Modelo', '$Link', '$Imagen', '$ProvedMaq', '$ContMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', '$userMAq', 'Si');";

$query = "INSERT INTO `Maquinaria` (`idMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `ContMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `Activo`) VALUES (NULL, 'Maquina', '', 'll', 'll', '1', 'ContMaq', '1', '1', 'ob', 'userMAq', 'Si');";




$result = mysqli_query($mysqli, $query);
if(!$result){
die('Error');
}
echo "agregado sastifactoriamente " . $Maquina;
}

?>