<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Formulario reclamo editar</title>
<link href="../sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
</head>
<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<body>

	
<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	

    </div>
    <div class="col-md-auto">

<?php 

include("Conexion/conexion.php");
mysqli_query("SET NAMES 'utf8'");
  
$queryNumRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `ComReclamo`.`NumReclamo` DESC LIMIT 1");


 while ($valoresNumRecl = mysqli_fetch_array($queryNumRecl))

		  
		  {
$varNumRecl = $valoresNumRecl['NumReclamo']+1;

}	

$IdReclamo=$_POST['txtIdReclamo'];
$NumReclamo=$_POST['txtNumReclamo'];		
$NumTipoReclamo=$_POST['listTipoReclamo'];
$Reclamo=$_POST['txtReclamo'];
$Fecha= $_POST['txtFecha'];
$FechaFinal= $_POST['txtFechaFinal'];
$FechaCierre= $_POST['txtFechaCierre'];
$IdConce= $_POST['listIdConce'];

$IdCliente=$_POST['listIdCliente'];
$IdRepacion=$_POST['listIdRepacion'];
$Descripcion= $_POST['txtDescripcion'];
$Chasis= $_POST['txtChasis'];
$Serie= $_POST['txtSerie'];
//$TipoImplemento= $_POST['listTipoImplemento'];
$Implemento= $_POST['listImplemento'];

$AnalisisCausa=$_POST['txtAnalisisCausa'];
$RequiereAsistencia=$_POST['listRequiereAsistencia'];
$RespAccion=$_POST['txtAcciones'];

$CodRecurUtil=$_POST['txtCodRecurUtil'];
$EvalEfica=$_POST['txtEvalEfica'];
$RespEvaluc=$_POST['txtRespEvaluc'];
$Sup=$_POST['txtSup'];		

if(!$NumReclamo==null){
	include("Conexion/conexion.php");
$IdReclamo=$_POST['txtIdReclamo'];
//echo "<h1>"."<a href=\"/sistema/FormReclamoEditar.php?NumReclamo=".$NumReclamo."\">Volver</a>"."</h1>";	

echo "<td>"."<a href=\"/sistema/ListReclamo.php#\"><img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a></td>\n";
$EditarComReclamo = "UPDATE `ComReclamo` SET `Reclamo` = '$Reclamo', `NumTipoReclamo` = '$NumTipoReclamo', `Fecha` = '$Fecha', `FechaFinal` = '$FechaFinal', `IdConce` = '$IdConce', `IdCliente` = '$IdCliente', `IdRepacion` = '$IdRepacion', `Descripcion` = '$Descripcion', `Chasis` = '$Chasis', `Serie` = '$Serie', `TipoImplemento` = '1', `NumImplemento` = '$Implemento', `AnalisisCausa` = '$AnalisisCausa', `RequiereAsistencia` = '$RequiereAsistencia', `RespAccion` = '$RespAccion', `CodRecurUtil` = '$CodRecurUtil', `EvalEfica` = '$EvalEfica', `RespEvaluc` = '$RespEvaluc', `Sup` = '$Sup', `FechaCierre` = '$FechaCierre' WHERE `ComReclamo`.`IdReclamo` = ".$IdReclamo.";";
	

$ejecutar_Editar=mysqli_query($mysqli,$EditarComReclamo);

}




mysqli_close($mysqli);

?>

	
		
    </div>
  </div>
</div>		
	

	
</body>
</html>