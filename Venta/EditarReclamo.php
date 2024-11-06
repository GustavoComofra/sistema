<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>

<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
}
	
</script>	


<title>Cliente</title>
<body>
	
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
	</div>
	<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">
						<?php
						include("../layout/header/header-Center.php");
						?>
					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">

<?php 

include("../Conexion/conexion.php");
//mysqli_query("SET NAMES 'utf8'");
  
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
	include("../Conexion/conexion.php");
$IdReclamo=$_POST['txtIdReclamo'];
//echo "<h1>"."<a href=\"/sistema/FormReclamoEditar.php?NumReclamo=".$NumReclamo."\">Volver</a>"."</h1>";	

echo "<td>"."<a href=\"/sistema/Venta/ListReclamo.php#\"><img src=\"/sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a></td>\n";
$EditarComReclamo = "UPDATE `ComReclamo` SET `Reclamo` = '$Reclamo', `NumTipoReclamo` = '$NumTipoReclamo', `Fecha` = '$Fecha', `FechaFinal` = '$FechaFinal', `IdConce` = '$IdConce', `IdCliente` = '$IdCliente', `IdRepacion` = '$IdRepacion', `Descripcion` = '$Descripcion', `Chasis` = '$Chasis', `Serie` = '$Serie', `TipoImplemento` = '1', `NumImplemento` = '$Implemento', `AnalisisCausa` = '$AnalisisCausa', `RequiereAsistencia` = '$RequiereAsistencia', `RespAccion` = '$RespAccion', `CodRecurUtil` = '$CodRecurUtil', `EvalEfica` = '$EvalEfica', `RespEvaluc` = '$RespEvaluc', `Sup` = '$Sup', `FechaCierre` = '$FechaCierre' WHERE `ComReclamo`.`IdReclamo` = ".$IdReclamo.";";
	

$ejecutar_Editar=mysqli_query($mysqli,$EditarComReclamo);

}
mysqli_close($mysqli);

?>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>
</body>
</html>