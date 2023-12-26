<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
<style type="text/css">
body {
    background-image: url(/sistema/img/FondoPanel1.jpeg);
}
</style>
<title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

	
<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>	
</head>
<body>


<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>		
	

	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
	
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
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/venta/".$nombre_imagen);

if ($nombre_imagen) {
	$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen;
}else{
	$Imagen = '';
}



$nombre_imagen1=$_FILES['imagen1']['name'];
$tipo_iamgen1=$_FILES['imagen1']['type'];
$tamagno_imegen1=$_FILES['imagen1']['size'];
$carpetas_destino1='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen1;
move_uploaded_file($_FILES['imagen1']['tmp_name'],"img/venta/".$nombre_imagen1);

if ($nombre_imagen1) {
	$Imagen1 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen1;
}else{
	$Imagen1 = '';
}


$nombre_imagen2=$_FILES['imagen2']['name'];
$tipo_iamgen2=$_FILES['imagen2']['type'];
$tamagno_imegen2=$_FILES['imagen2']['size'];
$carpetas_destino2='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen2;
move_uploaded_file($_FILES['imagen2']['tmp_name'],"img/venta/".$nombre_imagen2);

if ($nombre_imagen2) {
	$Imagen2 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagen2;
}else{
	$Imagen2 = '';
}


$nombre_imagen3=$_FILES['imagen3']['name'];
$tipo_iamgen3=$_FILES['imagen3']['type'];
$tamagno_imegen3=$_FILES['imagen3']['size'];
$carpetas_destino3='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagen3;
move_uploaded_file($_FILES['imagen3']['tmp_name'],"img/venta/".$nombre_imagen3);

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
move_uploaded_file($_FILES['imagenSolu']['tmp_name'],"img/venta/".$nombre_imagenSolu);
if ($nombre_imagenSolu) {
	$ImagenSolu = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu;
}else{
	$ImagenSolu = '';
}

$nombre_imagenSolu1=$_FILES['imagenSolu1']['name'];
$tipo_iamgenSolu1=$_FILES['imagenSolu1']['type'];
$tamagno_imegenSolu1=$_FILES['imagenSolu1']['size'];
$carpetas_destinoSolu1='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu1;
move_uploaded_file($_FILES['imagenSolu1']['tmp_name'],"img/venta/".$nombre_imagenSolu1);



$nombre_imagenSolu2=$_FILES['imagenSolu2']['name'];
$tipo_iamgenSolu2=$_FILES['imagenSolu2']['type'];
$tamagno_imegenSolu2=$_FILES['imagenSolu2']['size'];
$carpetas_destinoSolu2='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu2;
move_uploaded_file($_FILES['imagenSolu2']['tmp_name'],"img/venta/".$nombre_imagenSolu2);
if ($nombre_imagenSolu2) {
	$ImagenSolu2 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu2;
}else{
	$ImagenSolu2 = '';
}

$nombre_imagenSolu3=$_FILES['imagenSolu3']['name'];
$tipo_iamgenSolu3=$_FILES['imagenSolu3']['type'];
$tamagno_imegenSolu3=$_FILES['imagenSolu3']['size'];
$carpetas_destinoSolu3='ftp.comofrasrl.com.ar/img/venta/' . $nombre_imagenSolu3;
move_uploaded_file($_FILES['imagenSolu3']['tmp_name'],"img/venta/".$nombre_imagenSolu3);
if ($nombre_imagenSolu3) {
	$ImagenSolu3 = 'https://interno.comofrasrl.com.ar/sistema/img/venta/'.$nombre_imagenSolu3;
}else{
	$ImagenSolu3 = '';
}

$EvalEfica=$_POST['txtEvalEfica'];
$RespEvaluc=$_POST['txtRespEvaluc'];
$Prioridad=$_POST['SelectPrioridad'];
$Usuario = $_SESSION['usuario'];

/*
$insertarComReclamo = 
"INSERT INTO `ComReclamo` (`IdReclamo`, `NumReclamo`, `Reclamo`, `NumTipoReclamo`, `Fecha`, `FechaFinal`, `FechaCierre`, `IdConce`, `IdCliente`, `IdRepacion`, `Descripcion`, `Chasis`, `Serie`, `TipoImplemento`, `NumImplemento`, `Falla`, `FallaTerminacion`, `FallaMecanica`, `FallaSistHid`, `FallaSistElect`, `Imagen`, `Imagen1`, `Imagen2`, `Imagen3`, `AnalisisCausa`, `RequiereAsistencia`, `RespAccion`, `ImagenSolu`, `ImagenSolu1`, `ImagenSolu2`, `ImagenSolu3`, `CodRecurUtil`, `EvalEfica`, `RespEvaluc`, `Prioridad`, `Sup`) VALUES (NULL, '$varNumRecl', '$Reclamo', '$NumTipoReclamo', '$Fecha', '$FechaFinal', '$FechaCierre', '$IdConce', '$IdCliente', '$IdRepacion', '$Descripcion', '$Chasis', '$Serie', '$TipoImplemento', '', 0, 0, 0, 0, 0, '$Imagen', '$Imagen1', '$Imagen2', '$Imagen3', '$AnalisisCausa', '$RequiereAsistencia', '$RespAccion', '$ImagenSolu', '$ImagenSolu1', '$ImagenSolu2', '$ImagenSolu3', '', '$EvalEfica', '$RespEvaluc', '$Prioridad', 'No');";
*/
$insertarComReclamo = 
"INSERT INTO `ComReclamo` (`IdReclamo`, `NumReclamo`, `Reclamo`, `NumTipoReclamo`, `Fecha`, `FechaFinal`, `FechaCierre`, `IdConce`, `IdCliente`, `IdRepacion`, `Descripcion`, `Chasis`, `Serie`, `TipoImplemento`, `NumImplemento`, `Falla`, `FallaTerminacion`, `FallaMecanica`, `FallaSistHid`, `FallaSistElect`, `Imagen`, `Imagen1`, `Imagen2`, `Imagen3`, `AnalisisCausa`, `RequiereAsistencia`, `RespAccion`, `ImagenSolu`, `ImagenSolu1`, `ImagenSolu2`, `ImagenSolu3`, `CodRecurUtil`, `EvalEfica`, `RespEvaluc`, `Prioridad`, `Usuario`, `Sup`) VALUES (NULL, '$varNumRecl', '$Reclamo', '$NumTipoReclamo', '$Fecha', '$FechaFinal', '$FechaCierre', '$IdConce', '$IdCliente', '$IdRepacion', '$Descripcion', '$Chasis', '$Serie', '0', '1', '0', '0', '0', '0', '0', '$Imagen', '$Imagen1', '$Imagen2', '$Imagen3', '$AnalisisCausa', '$RequiereAsistencia', '$RespAccion', '$ImagenSolu', '$ImagenSolu1', '$ImagenSolu2', '$ImagenSolu3', '', '$EvalEfica', '$RespEvaluc', '$Prioridad', '$Usuario', 'No');";


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


/*$mensaje=
'<p>'.'IdReclamo: '. $row['IdReclamo'].'<p/>'.'<br>';
'<p>'.'Reclamo: '. $row['Reclamo'].'</p>'. '<br>';
'<p>'.'Tipo de Reclamo: '. $row['TipoReclamo'].'</p>'. '<br>';
'<p>'.'Fecha: '. $row['Fecha'].'</p>'. '<br>';
'<p>'.'Fecha Final: '. $row['FechaFinal'].'</p>'. '<br>';
'<p>'.'Requiere Asistencia: '. $row['RequiereAsistencia'].'</p>'. '<br>';
'<p>'.'Respuesta de Accion: '. $row['RespAccion'].'</p>'. '<br>';*/
	
	;
	
	$para="gustavog@live.com.ar,jefatura-ingenieria@comofrasrl.com.ar,jefatura-calidad@comofrasrl.com.ar,sgc@comofrasrl.com.ar,calidad2@comofrasrl.com.ar,producto@comofrasrl.com.ar,repuestos@comofrasrl.com.ar,gerenciageneral@comofrasrl.com.ar,gerenciaproduccion@comofrasrl.com.ar,producto1@comofrasrl.com.ar,procesos@comofrasrl.com.ar,industrial@comofrasrl.com.ar";
	//$para="gustavog@live.com.ar";
	
	$cabeceras = 'From: industrial@comofrasrl.com.ar>';
	$enviado = mail($para, $titulo, $mensaje,$cabeceras);
	
	if ($enviado)
	  echo 'Email enviado correctamente: '.$para;
	else
	  echo 'Error en el envio del email';
//MOSTRAR DATOS CARGADOS

	include("Conexion/conexion.php");

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




</div>
	 </div>
	   
	  </body>
</html>