<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PruebaFormulario</title>
<link href="/sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
</head>

<body>

      
<?php
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Estado=$_POST['listEstado'];
$Anios=$_POST['txtAnios'];

include("Conexion/conexion.php");		  
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`) VALUES (NULL, '20302806285', 'EstudioPersonal', 'Estado', '1');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);	
		  

?>

</body>
</html>
