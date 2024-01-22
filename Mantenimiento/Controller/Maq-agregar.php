<?php
include("Conexion/conexion.php");

$Maquina=$_POST['txtMaquina'];
$Modelo=$_POST['txtModelo'];
$Link=$_POST['txtLink'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/manten/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/manten/".$nombre_imagen);

$ImagenNombre = 'https://interno.comofrasrl.com.ar/sistema/img/manten/'.$nombre_imagen;

if ($ImagenNombre == 'https://interno.comofrasrl.com.ar/sistema/img/manten/') {
    $Imagen = 'iconoMant.png';
}else {
    $Imagen = $ImagenNombre;
}


$ProvedMaq= $_POST['listProvedMaq'];
$Fk_Clasi= $_POST['listClasificacion'];
$ContMaq=$_POST['txtContMaq'];
$DiasManteni = $_POST['txtDiasManteni'];

$ValorMaq= $_POST['txtValorMaq'];
$ObsMaq=$_POST['txtObsMaq'];
$idMaq = $_POST['idMaq'];

$userMAq = $_POST['txtuserMAq'];

// $query = "INSERT INTO `Maquinaria` (`idMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `ContMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `Activo`) VALUES (NULL, '$Maquina', '$Modelo', '$Link', '$Imagen', '$ProvedMaq', '$ContMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', '$userMAq', 'Si');";

$query = "INSERT INTO `Maquinaria` (`idMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`,`Fk_Clasi`,  `ContMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `Activo`) VALUES (NULL, '$Maquina', '$Modelo', '$Link', '$Imagen', '$ProvedMaq', '$Fk_Clasi', '$ContMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', '$userMAq', 'Si');";




$result = mysqli_query($mysqli, $query);
if(!$result){
die('Error');
}
echo "agregado sastifactoriamente " . $Maquina;


?>