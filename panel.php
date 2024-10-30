<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../sistema/img/Icono.png" rel="icon" type="image/png">

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


<title>.Com</title>
</head>

<body>
	<div class="m-0">
		<?php

		include("../sistema/layout/header/header-Top.php");

		?>

<?php

$host = "198.27.76.221";
$usr = "comofras_sistema";
$clave = "Comofra05!";
$db = "comofras_bdinterno";

$mysqli = new mysqli($host,$usr,$clave,$db);

mysqli_set_charset($mysqli, "utf8");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
   // echo "ok";
}


?>

		
	</div>

	<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">

						<?php

						include("../sistema/layout/header/header-Center.php");

						?>

			</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->

			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">
			
		
<!-- Cumpleaños -->
<?php
	

	$Dia=date("m-d");
	//echo $Dia;
	
	//include("../Conexion/conexion.php");
	$queryFechaCumpleTitulo = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `FechaNacimiento` LIKE '$Dia' AND `Baja` LIKE 'No' ");
	while ($filaFechaCumpleTitulo = mysqli_fetch_array($queryFechaCumpleTitulo))
	{
		$cumpleTitulo = $filaFechaCumpleTitulo['Nombres'];
	}
	
	

	
	$queryFechaCumple = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `FechaNacimiento` LIKE '%$Dia%' AND `Baja` LIKE 'No' ORDER BY `Nombres` ASC");
	
		if ($queryFechaCumple) {
		echo "<h2> Cumples de hoy:  <img src=\"/sistema/img/imgCumple.JPG\" alt=\"iconoCumple\" width=\"50\" height=\"50\"></h2>";
	}
	
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
	<TD><B>Nacimiento</B></TD>
	<TD><B>Sector</B></TD>
	</TR>
	"; 	
	
	echo "<TR>\n";
	echo "<td>".'<img  src='.$filaFechaCumple['Foto'].' style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
	echo "<td>".$filaFechaCumple['CUIT_Empl']."</td>\n";
	echo "<td>".$filaFechaCumple['Nombres']."</td>\n";	
	echo "<td>".$filaFechaCumple['Apellidos']."</td>\n";
	echo "<td>".$filaFechaCumple['FechaNacimiento']."</td>\n";
	echo "<td>".$filaFechaCumple['SectorFk']."</td>\n";
	echo "</TR>\n";
	
	 }	
		
		echo "</table>";
	?>
	
	

	<?php
	$fecha_actual = date("Y-m-d");
	//resto 30 d�a
	$varFechaPrueba = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
	
	//include("../Conexion/conexion.php");
	
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
	

		  
	<?php
	$fecha_actual = date("Y-m-d");
	//resto 30 d�a
	$varFechaCarnet = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
	
	//include("../Conexion/conexion.php");
	
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
	//include("../Conexion/conexion.php");
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
	
	//include("../Conexion/conexion.php");
	
	$queryReclamoTitulo = $mysqli -> query ("SELECT * FROM `ComVisReclamo` WHERE `FechaCierre` <= '0000-00-00' AND `Sup` LIKE 'No' ");
	
	if ($queryReclamoTitulo) {
		echo "<h2> Reclamos Pendiente:
		<img src='../sistema/img/iconoReclamo.png' alt='iconoReclamo' width='50' height='50'></h2>";
	}
	
	
	$queryReclamo = $mysqli -> query ("SELECT * FROM `ComVisReclamo-1` WHERE `FechaCierre` <= '0000-00-00' AND `Sup` LIKE 'No' ");
	
	 while ($filaReclamo = mysqli_fetch_array($queryReclamo))
	
	{
	
	echo "
	
	<table border=1 class=\"table table-striped\">
	  <thead>
	<TR>
	
		 </thead>
	<TD><B>Num</B></TD>
	<TD><B>Reclamo</B></TD>
	<TD><B>Prioridad</B></TD>
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
	
	$varPrioridad = $filaReclamo['Prioridad'];
	if($varPrioridad == "Alta"){
		echo "<td>"."<strong style=\"color: red\">".$varPrioridad."</strong>"."</td>\n";
		}else if($varPrioridad == "Media") {
		echo "<td>"."<p style=\"color: blue\">".$varPrioridad."</p>"."</td>\n";
		}else {
			echo "<td>"."<p style=\"color: green\">".$varPrioridad."</p>"."</td>\n";
		}
	
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
		
		echo "<td>"."<a href=\"/sistema/Venta/VistaReclamo.php?NumReclamo=".$filaReclamo['NumReclamo']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n"; 

		 
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
	
	

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script> -->
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

	<!-- datatables-->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- datatables extension SELECT -->
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	<!-- extension BOTONES -->
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

	<!-- para botenes de exportar -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

</body>

</html>