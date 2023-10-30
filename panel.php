<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
	<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<style>
.imgEfcPanel{

  width: 40px;
  height: 40px;
  border-radius: 50% 50%;

}
.Advertencia{
  color: red;
}

.imgEfcPanel:hover {

	
width: 150%;
height: 150%;


}

</style>

	
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
  <div class="col-sm-8 card" style="width: 100rem;">
	  
<div>


<?php
	

	
$Dia=date("m-d");

include("Conexion/conexion.php");
$queryFechaCumpleTitulo = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `FechaNacimiento` LIKE '%$Dia%' ");
while ($filaFechaCumpleTitulo = mysqli_fetch_array($queryFechaCumpleTitulo))
{
	$cumpleTitulo = $filaFechaCumpleTitulo['Nombres'];
}


if ($cumpleTitulo) {
	echo "<h2> Cumples de hoy:  <img src=\"../sistema/img/imgCumple.JPG\" alt=\"iconoCumple\" width=\"50\" height=\"50\"></h2>";
}

$queryFechaCumple = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `FechaNacimiento` LIKE '%$Dia%' ORDER BY `Nombres` ASC");



 while ($filaFechaCumple = mysqli_fetch_array($queryFechaCumple))

{
	 
	 echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<TR>

	 </thead>
<TD><B>Imagen</B></TD>
<TD><B>CUIL</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Sector</B></TD>
</TR>
"; 	

echo "<TR>\n";
echo "<td>".'<img  src="'.$filaFechaCumple['Foto'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaFechaCumple['CUIT_Empl']."</td>\n";
echo "<td>".$filaFechaCumple['Nombres']."</td>\n";	
echo "<td>".$filaFechaCumple['Apellidos']."</td>\n";
echo "<td>".$filaFechaCumple['SectorFk']."</td>\n";
echo "</TR>\n";

 }	
	
	echo "</table>";
?>

	

</div>	
	  
<div>


	  
<?php
$fecha_actual = date("Y-m-d");
//resto 30 d�a
$varFechaPrueba = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));

include("Conexion/conexion.php");

$queryFechaPrueba = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `FechaPrueba` >= '$fecha_actual' AND `FechaPrueba` <= '$varFechaPrueba'");

 while ($filaFechaPrueba = mysqli_fetch_array($queryFechaPrueba))

{
	echo "

	<h2> Proximos periodos de prueba a vencer: 
	<img src=\"../sistema/img/imgAdvertencia.JPG\" alt=\"imgAdvertencia\" width=\"50\" height=\"50\"> </h2>
	
	<table border=1 class=\"table table-striped\">
	  <thead>
	<TR>
		 </thead>
	
	<TD><B>CUIL</B></TD>
	<TD><B>Nombre</B></TD>
	<TD><B>Apellido</B></TD>
	<TD><B>Prueba</B></TD>
	<TD><B>Vista</B></TD>	
	</TR>
	
	";	  

echo "<TR>\n";
$varIdPersonal = $filaFechaPrueba['IdPersonal'];
echo "<td>".$filaFechaPrueba['CUIT_Empl']."</td>\n";
echo "<td>".$filaFechaPrueba['Nombres']."</td>\n";
echo "<td>".$filaFechaPrueba['Apellidos']."</td>\n";
echo "<td>".$filaFechaPrueba['FechaPrueba']."</td>\n";
echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaFechaPrueba['IdPersonal']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n";	 

echo "</TR>\n";
	 
echo "</table>";

 }	
	 
?>

	
</div>
	  
<div>

	  
<?php
$fecha_actual = date("Y-m-d");
//resto 30 d�a
$varFechaCarnet = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));

include("Conexion/conexion.php");

$queryVenCarnet = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `VenCarnet` >= '$fecha_actual' AND `VenCarnet` <= '$varFechaCarnet'");

 while ($filaVenCarnet = mysqli_fetch_array($queryVenCarnet))

{

echo "

<table border=1 class=\"table table-striped\">
  <thead><h2> Proximos carnet a vencer: </h2>
<TR>
	 </thead>
<TD><B>CUIL</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Venc</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>Ver</B></TD>
</TR>

";	 
	 
echo "<TR>\n";
echo "<td>".$filaVenCarnet['CUIT_Empl']."</td>\n";
echo "<td>".$filaVenCarnet['Nombres']."</td>\n";
echo "<td>".$filaVenCarnet['Apellidos']."</td>\n";
echo "<td>".$filaVenCarnet['VenCarnet']."</td>\n";
echo "<td>".$filaVenCarnet['TipoCarnet']."</td>\n";
	
$varIdPersonalCarnet = $filaVenCarnet['IdPersonal'];	 
	 
echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaVenCarnet['IdPersonal']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n";	 
	 
echo "</TR>\n";
echo "</table>";	 

 }	
?>
<!-- Inicio Garantia -->
<?php
include("Conexion/conexion.php");
$queryGarantiaTitulo = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `FechaContestacion` = '0000-00-00'");
while ($filaGarantiaTitulo = mysqli_fetch_array($queryGarantiaTitulo))
{
	$varTitulo = $filaGarantiaTitulo;
}


if ($varTitulo) {
	echo "<h2> Garantia pendiente de responder:
	<img src='../sistema/img/iconoPedidoGarantia.png' alt='iconoPedidoGarantia' width='50' height='50'></h2>";
}




$queryGarantia = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `FechaContestacion` = '0000-00-00'");

 while ($filaGarantia = mysqli_fetch_array($queryGarantia))

{

echo "

<table border=1 class=\"table table-striped\">

  <thead>
<TR>

	 </thead>
<TD><B>Id</B></TD>
<TD><B>Serie</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Correo</B></TD>
<TD><B>Telefono</B></TD>
<TD><B>Fecha</B></TD>
</TR>

";	 
	 
echo "<TR>\n";
echo "<td>".$filaGarantia['Id_gar']."</td>\n";
echo "<td>".$filaGarantia['Serie']."</td>\n";
echo "<td>".$filaGarantia['Cliente']."</td>\n";
echo "<td>".$filaGarantia['Correo']."</td>\n";
echo "<td>".$filaGarantia['Telefono']."</td>\n";	 
echo "<td>".$filaGarantia['Fecha']."</td>\n";

//echo "<td>"."<a href=\"/sistema/VistaReclamo.php?Id_gar=".$filaGarantia['Id_gar']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n"; 

	 
echo "</TR>\n";
echo "</table>";	 

 }	
?>	
<!--Fin Garantia -->

<!--Inicio Reclamo -->

<?php
$fecha_actual = date("Y-m-d");
//resto 30 d�a
$varFechaCarnet = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));

include("Conexion/conexion.php");

$queryReclamoTitulo = $mysqli -> query ("SELECT * FROM `ComVisReclamo` WHERE `FechaCierre` <= '0000-00-00' AND `Sup` LIKE 'No' ");

if ($queryGarantiaTitulo) {
	echo "<h2> Reclamos Pendiente:
	<img src='../sistema/img/iconoReclamo.png' alt='iconoReclamo' width='50' height='50'></h2>";
}


$queryReclamo = $mysqli -> query ("SELECT * FROM `ComVisReclamo` WHERE `FechaCierre` <= '0000-00-00' AND `Sup` LIKE 'No' ");

 while ($filaReclamo = mysqli_fetch_array($queryReclamo))

{

echo "

<table border=1 class=\"table table-striped\">
  <thead>
<TR>

	 </thead>
<TD><B>Num</B></TD>
<TD><B>Reclamo</B></TD>
<TD><B>Implemento</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>Estado</B></TD>
<TD><B>Chasis</B></TD>
<TD><B>Ver</B></TD>

</TR>

";	 
	 
echo "<TR>\n";
echo "<td>".$filaReclamo['NumReclamo']."</td>\n";
echo "<td>".$filaReclamo['Reclamo']."</td>\n";
echo "<td>".$filaReclamo['Implemento']."</td>\n";
echo "<td>".$filaReclamo['Fecha']."</td>\n";	 
//echo "<td>".$filaReclamo['FechaFinal']."</td>\n";
	 
$varVen = $filaReclamo['FechaFinal'];	
$fecha_actual = date("Y-m-d");

if($varVen <= $fecha_actual){
echo "<td>"."<strong style=\"color: red\">"."Vencido"."</strong>"."</td>\n";
}else{
echo "<td>"."<p style=\"color: blue\">"."Pendiente cierre"."</p>"."</td>\n";
	
}	 	 
	 
echo "<td>".$filaReclamo['Chasis']."</td>\n";
	

	 
echo "<td>"."<a href=\"/sistema/VistaReclamo.php?NumReclamo=".$filaReclamo['NumReclamo']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n"; 

	 
/* echo "<td>"."<a href=\"/sistema/FormReclamoEditar.php?NumReclamo=".$filaReclamo['NumReclamo']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; */
	 
echo "</TR>\n";
echo "</table>";	 

 }	

 mysqli_close($mysqli);
?>	
<!--Inicio Reclamo -->


<!-- Inicio Procesos -->

<?php

//include ("Conexion/conexion.php");

//include ("ListarProcesosAjax.php");
/*
if (!$resultado) {
echo "Libre";
}else{
	
}
*/

?>
<!-- Final Inicio Procesos -->
	
</div>
	  
	  

</div>
  </div>
</div>	



<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
</body>
</html>

