<!DOCTYPE html>
<html lang="es">
	<!-- caracter en lenguaje humano -->
  <meta charset="UTF-8">
	<!-- Vista distintas ventanas -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
	<!-- Informacion de la pagina -->
  <meta name="" content=""/>
	<!-- Etiquetas para los bucadores -->
<head>
	<!-- Script JS -->
	<script type="text/javascript" src="/RRHH/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<!-- CSS -->
	<link rel="stylesheet" href="/RRHH/css/estiloHome.css">
	<!-- Logo Icono -->
    <link href="" rel="icon" type="">
 <title>Insertar personal Salida</title>
</head>

<body>
	<h1>Adios</h1>
	
<?php
	$CUIT=$_POST["codigoSal"];
include("Conexion/conexion.php");

$query1 = $mysqli -> query ("SELECT * FROM `ComHorario` WHERE `CUIT` = '$CUIT' ORDER BY `ComHorario`.`Times` DESC LIMIT 1");
  while ($fila = mysqli_fetch_array($query1))
{
echo $fila['idComHorario']." - ";
echo $fila['CUIT']." - ";
echo $fila['Times']." - ";

echo "<br>";
$var=$fila['idComHorario'];
}
 
//mysqli_close($mysqli);

//include("Conexion/conexion.php");


//$CUIT=$_POST["codigoSal"];
//$res=mysqli_query($con,"SELECT * FROM `ComHorario` WHERE `CUIT` = '$CUIT' ORDER BY `ComHorario`.`Times` DESC LIMIT 1");
$res=mysqli_query($con,"SELECT * FROM `ComHorario`");
$insertarSalida = "UPDATE `ComHorario` SET `DiaSal` = CURRENT_TIMESTAMP WHERE `idComHorario` = '$var';";
$ejecutar_insertar=mysqli_query($mysqli,$insertarSalida);
echo $var;
//mysqli_close($mysqli);

  ?>  


</body>

</html>
<script type="text/javascript">
window.location.href = "http://planidear.com.ar/RRHH/Salir.php";
</script>