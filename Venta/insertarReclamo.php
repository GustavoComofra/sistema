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


<title>Insertar Reclamo</title>
<body>
	
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
	</div>
	
<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

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

$queryNumRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `ComReclamo`.`NumReclamo` DESC LIMIT 1");

 while ($valoresNumRecl = mysqli_fetch_array($queryNumRecl))
   
		  {
$varNumRecl = $valoresNumRecl['NumReclamo']+1;
 //echo $varNumRecl;
}	

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
$Implemento= $_POST['listImplemento'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"../img/venta/".$nombre_imagen);

if ($nombre_imagen) {
	$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen;
}else{
	$Imagen = '';
}



$nombre_imagen1=$_FILES['imagen1']['name'];
$tipo_iamgen1=$_FILES['imagen1']['type'];
$tamagno_imegen1=$_FILES['imagen1']['size'];
$carpetas_destino1='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen1;
move_uploaded_file($_FILES['imagen1']['tmp_name'],"../img/venta/".$nombre_imagen1);

if ($nombre_imagen1) {
	$Imagen1 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen1;
}else{
	$Imagen1 = '';
}


$nombre_imagen2=$_FILES['imagen2']['name'];
$tipo_iamgen2=$_FILES['imagen2']['type'];
$tamagno_imegen2=$_FILES['imagen2']['size'];
$carpetas_destino2='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen2;
move_uploaded_file($_FILES['imagen2']['tmp_name'],"../img/venta/".$nombre_imagen2);

if ($nombre_imagen2) {
	$Imagen2 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen2;
}else{
	$Imagen2 = '';
}


$nombre_imagen3=$_FILES['imagen3']['name'];
$tipo_iamgen3=$_FILES['imagen3']['type'];
$tamagno_imegen3=$_FILES['imagen3']['size'];
$carpetas_destino3='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen3;
move_uploaded_file($_FILES['imagen3']['tmp_name'],"../img/venta/".$nombre_imagen3);

if ($nombre_imagen3) {
	$Imagen3 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen3;
}else{
	$Imagen3 = '';
}




$AnalisisCausa=$_POST['txtAnalisisCausa'];
$RequiereAsistencia=$_POST['listRequiereAsistencia'];
$RespAccion=$_POST['txtRespAccion'];


$nombre_imagenSolu=$_FILES['imagenSolu']['name'];
$tipo_iamgenSolu=$_FILES['imagenSolu']['type'];
$tamagno_imegenSolu=$_FILES['imagenSolu']['size'];
$carpetas_destinoSolu='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu;
move_uploaded_file($_FILES['imagenSolu']['tmp_name'],"../img/venta/".$nombre_imagenSolu);
if ($nombre_imagenSolu) {
	$ImagenSolu = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu;
}else{
	$ImagenSolu = '';
}

$nombre_imagenSolu1=$_FILES['imagenSolu1']['name'];
$tipo_iamgenSolu1=$_FILES['imagenSolu1']['type'];
$tamagno_imegenSolu1=$_FILES['imagenSolu1']['size'];
$carpetas_destinoSolu1='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu1;
move_uploaded_file($_FILES['imagenSolu1']['tmp_name'],"../img/venta/".$nombre_imagenSolu1);



$nombre_imagenSolu2=$_FILES['imagenSolu2']['name'];
$tipo_iamgenSolu2=$_FILES['imagenSolu2']['type'];
$tamagno_imegenSolu2=$_FILES['imagenSolu2']['size'];
$carpetas_destinoSolu2='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu2;
move_uploaded_file($_FILES['imagenSolu2']['tmp_name'],"../img/venta/".$nombre_imagenSolu2);
if ($nombre_imagenSolu2) {
	$ImagenSolu2 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu2;
}else{
	$ImagenSolu2 = '';
}

$nombre_imagenSolu3=$_FILES['imagenSolu3']['name'];
$tipo_iamgenSolu3=$_FILES['imagenSolu3']['type'];
$tamagno_imegenSolu3=$_FILES['imagenSolu3']['size'];
$carpetas_destinoSolu3='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu3;
move_uploaded_file($_FILES['imagenSolu3']['tmp_name'],"../img/venta/".$nombre_imagenSolu3);
if ($nombre_imagenSolu3) {
	$ImagenSolu3 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu3;
}else{
	$ImagenSolu3 = '';
}

$EvalEfica=$_POST['txtEvalEfica'];
$RespEvaluc=$_POST['txtRespEvaluc'];
$Prioridad=$_POST['SelectPrioridad'];
$Usuario = $_SESSION['usuario'];


$insertarComReclamo = 
"INSERT INTO `ComReclamo` (`IdReclamo`, `NumReclamo`, `Reclamo`, `NumTipoReclamo`, `Fecha`, `FechaFinal`, `FechaCierre`, `IdConce`, `IdCliente`, `IdRepacion`, `Descripcion`, `Chasis`, `Serie`, `TipoImplemento`, `NumImplemento`, `Falla`, `FallaTerminacion`, `FallaMecanica`, `FallaSistHid`, `FallaSistElect`, `Imagen`, `Imagen1`, `Imagen2`, `Imagen3`, `AnalisisCausa`, `RequiereAsistencia`, `RespAccion`, `ImagenSolu`, `ImagenSolu1`, `ImagenSolu2`, `ImagenSolu3`, `CodRecurUtil`, `EvalEfica`, `RespEvaluc`, `Prioridad`, `Usuario`, `Sup`) VALUES (NULL, '$varNumRecl', '$Reclamo', '$NumTipoReclamo', '$Fecha', '$FechaFinal', '$FechaCierre', '$IdConce', '$IdCliente', '$IdRepacion', '$Descripcion', '$Chasis', '$Serie', '0', '$Implemento', '0', '0', '0', '0', '0', '$Imagen', '$Imagen1', '$Imagen2', '$Imagen3', '$AnalisisCausa', '$RequiereAsistencia', '$RespAccion', '$ImagenSolu', '$ImagenSolu1', '$ImagenSolu2', '$ImagenSolu3', '', '$EvalEfica', '$RespEvaluc', '$Prioridad', '$Usuario', 'No');";


$ejecutar_insertar=mysqli_query($mysqli,$insertarComReclamo);
mysqli_close($mysqli);

if ($Reclamo) {
	echo '<h2>Reclamos cargado</h2>';
//ENVIO DE CORREO
	$titulo="Reclamo Num ".$varNumRecl;
$mensaje="Reclamo: ".$_POST['txtReclamo']
	." - Descripcion: ".$Descripcion
	." - Prioridad: ".$Prioridad
	." DETALLES: "
	." - Chasis: ".$_POST['txtChasis']
	." - Serie: ".$Serie
	." - Fecha: ".$_POST['txtFecha']
	." - Numero Tipo Reclamo: ".$NumTipoReclamo
	." - Cod concecionario: ".$IdConce
	." - Cod Cliente: ".$IdCliente
	." - Cod Repacion: ".$IdRepacion
	."Para revisarlo: https://interno.comofrasrl.com.ar/sistema/";
	
	;
	
	$para="gustavog@live.com.ar,producto@comofrasrl.com.ar,gerenciageneral@comofrasrl.com.ar,gerenciaproduccion@comofrasrl.com.ar,producto1@comofrasrl.com.ar,industrial@comofrasrl.com.ar; sgs@comofrasrl.com.ar";
	//$para="industrial@comofrasrl.com.ar";
	
	//$cabeceras = 'From: jefatura-calidad@comofrasrl.com.ar>';
	$cabeceras = 'From: jefatura-calidad@comofrasrl.com.ar' . "\r\n" .
             'Reply-To: jefatura-calidad@comofrasrl.com.ar' . "\r\n" .
             'Content-Type: text/html; charset=UTF-8' . "\r\n";
			 
	$enviado = mail($para, $titulo, $mensaje,$cabeceras);
	
// Verificar si el correo se envió correctamente
if ($enviado) {
    echo 'Email enviado correctamente a: ' . $para;
} else {
    echo 'Error en el envío del email';
}

//Fin ENVIO DE CORREO

	include("../Conexion/conexion.php");

$query2 = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `IdReclamo` DESC LIMIT 1");
$row = mysqli_fetch_assoc($query2);

echo '<p>'.'IdReclamo: '. $row['IdReclamo'].'<p/>'.'<br>';
echo '<p>'.'Reclamo: '. $row['Reclamo'].'</p>'. '<br>';
echo '<p>'.'Tipo de Reclamo: '. $row['TipoReclamo'].'</p>'. '<br>';
echo '<p>'.'Fecha: '. $row['Fecha'].'</p>'. '<br>';
echo '<p>'.'Fecha Final: '. $row['FechaFinal'].'</p>'. '<br>';
echo '<p>'.'Requiere Asistencia: '. $row['RequiereAsistencia'].'</p>'. '<br>';
echo '<p>'.'Respuesta de Accion: '. $row['RespAccion'].'</p>'. '<br>';


}else{
	echo '<h1>ERROR EN LA CARGA</h1>';
}

?>


			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>
	   
	  </body>
</html>