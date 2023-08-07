<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
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
<link href="http://interno.comofrasrl.com.ar/sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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

$queryFechaCumple = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `FechaNacimiento` LIKE '%$Dia%' ORDER BY `Nombres` ASC");



 while ($filaFechaCumple = mysqli_fetch_array($queryFechaCumple))

{
	 
	 echo "


<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<TR>
<h2> Cumples de hoy:  <img src=\"../sistema/img/imgCumple.JPG\" alt=\"iconoCumple\" width=\"50\" height=\"50\"></h2>
	 </thead>
<TD><B>Imagen</B></TD>
<TD><B>CUIL</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
</TR>
"; 	

echo "<TR>\n";
echo "<td>".'<img  src="'.$filaFechaCumple['Foto'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaFechaCumple['CUIT_Empl']."</td>\n";
echo "<td>".$filaFechaCumple['Nombres']."</td>\n";	
echo "<td>".$filaFechaCumple['Apellidos']."</td>\n";

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
<h2> Garantia pendiente de responder:
		 <img src="../sistema/img/iconoReclamo.png" alt="iconoReclamo" width="50" height="50"></h2>
<?php
include("Conexion/conexion.php");

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
<TD><B>Correo</B></TD>
<TD><B>Telefono</B></TD>
<TD><B>Fecha</B></TD>
</TR>

";	 
	 
echo "<TR>\n";
echo "<td>".$filaGarantia['Id_gar']."</td>\n";
echo "<td>".$filaGarantia['Serie']."</td>\n";
echo "<td>".$filaGarantia['Correo']."</td>\n";
echo "<td>".$filaGarantia['Telefono']."</td>\n";	 
echo "<td>".$filaGarantia['Fecha']."</td>\n";

//echo "<td>"."<a href=\"/sistema/VistaReclamo.php?Id_gar=".$filaGarantia['Id_gar']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n"; 

	 
echo "</TR>\n";
echo "</table>";	 

 }	
?>	

<!-- -->





	<h2> Reclamos Pendiente:
		 <img src="../sistema/img/iconoReclamo.png" alt="iconoReclamo" width="50" height="50"></h2>
<?php
$fecha_actual = date("Y-m-d");
//resto 30 d�a
$varFechaCarnet = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));

include("Conexion/conexion.php");

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
?>	
<!-- Validaciones Pendientes -->
<h2> Procesos Pendientes de validar<img src="../sistema/img/IconoProceso.png" alt="iconoProceso" width="50" height="50"></h2>
<?php

$userValPanel=$_SESSION['usuario'];


include("Conexion/conexion.php");

$queryProcesoPendiente = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `Baja` LIKE 'No' AND `FechaValidacion` = '0000-00-00' ORDER BY `Proceso`.`id_proceso` DESC");

 while ($filaProcesoPendiente = mysqli_fetch_array($queryProcesoPendiente))

{

echo "

<table border=1 class=\"table table-striped\">
  <thead>
<TR>
	 </thead>
<TD><B>Num</B></TD>
<TD><B>Proceso</B></TD>
<TD><B>FechaInicio</B></TD>
<TD><B>CodProd</B></TD>
<TD><B>imgprod</B></TD>
<TD><B>ver</B></TD>
<TD><B>Cad</B></TD>
<TD><B></B></TD>
<TD><B></B></TD>
</TR>

";	 
	 
echo "<TR>\n";
echo "<td>".$filaProcesoPendiente['id_proceso']."</td>\n";
echo "<td>".$filaProcesoPendiente['Proceso']."</td>\n";
echo "<td>".$filaProcesoPendiente['FechaInicio']."</td>\n";
echo "<td>".$filaProcesoPendiente['ProductoProceso']."</td>\n";
echo '<td>'.'<img class="imgEfcPanel"  src="'.$filaProcesoPendiente['imgprod'].'"/>'.'</td>';

echo "<td>"."<a href=\"/sistema/VistaProceso.php?id_proceso=".$filaProcesoPendiente['id_proceso']."\" ><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/VistaProcesoCadena.php?id_proceso=".$filaProcesoPendiente['id_proceso']."\" ><img src=\"../sistema/img/iconoCadena.png\" alt=\"iconoCadena\" width=\"20\" height=\"20\"></a></td>\n";
	 
if($userValPanel=="BenjaS"||$userValPanel=="gustavog"||$userValPanel=="MarianoP"||$userValPanel=="EduardoP"||$userValPanel=="DiegoP"){
	echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$filaProcesoPendiente['id_proceso']."\" ><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
	echo "<td>"."<a href=\"/sistema/ValidaProceso.php?id_proceso=".$filaProcesoPendiente['id_proceso']."\" ><img src=\"../sistema/img/iconoValidar.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
   }
	 
echo "</TR>\n";
echo "</table>";	 

 }	
?>

	
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

