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
	window.location.href = "https://interno.comofrasrl.com.ar/sistema/index.php";
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
}
	
</script>	


<title></title>

<body style="margin: 0 !important;">

<!-- Inicio Venta -->
<ul class="">

    <li class="" onclick="mostrarOcultarVenta()"> <!--onclick="mostrarOcultarVenta()" -->
			<h5 class="" href=""  style="color: white">
<i class="material-icons">storefront</i> - Venta</h5>
	</li>
	<!-- <div id="divBtnVenta" class="BtnMenu" style="height: 100%;  margin: 0; display:none"> -->

<div id="divBtnVenta" class="BtnMenu" style="height: 100%;  margin: 0; display:none">


<?php

$varUser=$_SESSION['usuario'];

include("../Conexion/conexion.php");

$queryventa = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'venta' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaventa = mysqli_fetch_array($queryventa))

{
$varClase = $filaventa['Clase'];  
$varLink = 	$filaventa['Link'];  
$varNombre = $filaventa['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;

}
echo" 
<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"../sistema/garantia/imgGarantia/qrcode-PedidoGarantia.png\" target=\"_blank\"><img src=\"https://interno.comofrasrl.com.ar/sistema/garantia/imgGarantia/qrcode-PedidoGarantia.png\" alt=\"iconoInforme\" width=\"20\" height=\"20\"> - Codigo QR</a>
";		

?>	
      </div>
<!-- Fin Venta -->
<hr>
<!-- Inicio Calidad -->

    <li class="" onclick="mostrarOcultarCalidad()">
	<!-- <h5 onclick="mostrarOcultarCalidad()" style="color: white"> -->
	<h5  style="color: white">
				<i class="material-icons">done</i> - Calidad </h5>
	</li>


<div id="divBtnCalidad" class="BtnMenu" style="height: 100%;  margin: 0; display:none">
<?php

				
$varUser=$_SESSION['usuario'];
				



$queryman = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'calidad'");

  while ($filaman = mysqli_fetch_array($queryman))

{
$varClase = $filaman['Clase'];  
$varLink = 	$filaman['Link'];  
$varNombre = $filaman['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;
}


?>			
      </div>
<!-- Fin Calidad -->
<hr>
<!-- Inicio Ing -->


    <li class="" onclick="mostrarOcultarIng()">
	<!-- <h5 class="" href="" onclick="mostrarOcultarIng()" style="color: white"> -->
			<h5 class="" href=""  style="color: white">
				<i class="material-icons">engineering</i> - Ing</h5>
	</li>

<div id="divBtnIng" class="BtnMenu" style="height: 100%;  margin: 0; display:none">
<?php

				
$varUser=$_SESSION['usuario'];
				



$querying = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'Ingenieria' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaing = mysqli_fetch_array($querying))

{
$varClase = $filaing['Clase'];  
$varLink = 	$filaing['Link'];  
$varNombre = $filaing['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;
}

?>		
      </div>
<!-- Fin Ing -->
<hr>
<!-- Inicio RRHH -->


    <li class="">
			<h5 class="" href="" onclick="mostrarOcultarRRHH()" style="color: white">
				<i class="material-icons">person</i> - RRHH</h5>
	</li>


<div id="divBtnRRHH" class="BtnMenu" style="height: 100%;  margin: 0; display:none">
<?php
				
$varUser=$_SESSION['usuario'];

$queryrrhh = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'rrhh' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filarrhh = mysqli_fetch_array($queryrrhh))

{
$varClase = $filarrhh['Clase'];  
$varLink = 	$filarrhh['Link'];  
$varNombre = $filarrhh['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;
}


?>			
	
      </div>
<!-- Fin RRHH -->
<hr>
<!-- Inicio Mant -->


    <li class="">
			<h5 class="" href="" onclick="mostrarOcultarMant()" style="color: white">
				<i class="material-icons">settings</i> - Mant</h5>
	</li>


<div id="divBtnMant" class="bg-dark " style="height: 100%;  margin: 0; display:none">
<?php
				
$varUser=$_SESSION['usuario'];



$queryman = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'mantenimiento' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaman = mysqli_fetch_array($queryman))

{
$varClase = $filaman['Clase'];  
$varLink = 	$filaman['Link'];  
$varNombre = $filaman['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;
}

?>				
	
      </div>
<!-- Fin Mant -->
<hr>
<!-- Inicio Listados -->


    <li class="">
			<h5 class="" href="" onclick="mostrarOcultarList()" style="color: white">
				<i class="material-icons">fact_check</i> - Listados</h5>
	</li>


<div id="divBtnList" class="bg-dark " style="height: 100%;  margin: 0; display:none">

<?php
		
				
$varUser=$_SESSION['usuario'];
				
$query1 = $mysqli -> query ("SELECT * FROM `PrUsuario` WHERE `usuario` LIKE '$varUser' ");


  while ($fila = mysqli_fetch_array($query1))
				
{
$varTipoUsuario = $fila['TipoUser'];
//echo $fila['usuario']." tipo: ".$fila['TipoUser'];

}
//mysqli_close($mysqli);	
	

if($varTipoUsuario==1){

$query1 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($fila1 = mysqli_fetch_array($query1))

{
$varClase = $fila1['Clase'];  
$varLink = 	$fila1['Link'];  
$varNombre = $fila1['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLink \">$varNombre</a>"	;
}

}
				
if($varTipoUsuario==2){

$queryForm2 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `TipoUserFK` = 2 AND `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($filaForm2 = mysqli_fetch_array($queryForm2))

{
$varClase = $filaForm2['Clase'];  
$varLinkForm2 = $filaForm2['Link'];  
$varNombreForm2 = $filaForm2['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLinkForm2 \"$varNombreForm2 </a>"	;
}		
}
			
if($varTipoUsuario==3){

$queryForm3 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `TipoUserFK` = 3 AND `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($filaForm3 = mysqli_fetch_array($queryForm3))

{
$varClase = $filaForm3['Clase'];  
$varLinkForm3 = $filaForm3['Link'];  
$varNombreForm3 = $filaForm3['Nombre'];
echo "<a class=\"dropdown-item bg-dark\" style=\"color: white; text-align: start;\" href=\"$varLinkForm3\">$varNombreForm3</a>"	;
}		
}			
 	
			
			
?>			
<a class="dropdown-item bg-dark" style="color: white; text-align: start;" href="/sistema/Listado/inventarioCom.php">Carga_Inventario</a>
<a class="dropdown-item bg-dark" style="color: white; text-align: start;" href="/sistema/Listado/ListadoInventario.php">Listado_Inventario</a>
		  <a class="dropdown-item bg-dark" style="color: white; text-align: start;" href="/sistema/Rrhh/VistaOrganigrama.php">Organigrama</a>
      <a class="dropdown-item bg-dark" style="color: white; text-align: start;" href="../Listado/GraficoPersonal.php">GraficoPersonal</a>  
			<a class="dropdown-item bg-dark" style="color: white; text-align: start;" href="javascript:window.print()">Imprimir</a>
</li>		
</div>
<!-- Fin Listados -->
<hr>

    <li class="">
			<a class="" href="https://interno.comofrasrl.com.ar/sistema/CerrarSession.php" style="color: white">
				<?php echo ' <i class="material-icons">logout</i>'." - ". $_SESSION['usuario'];  ?>
			</a>
	</li>
	</ul>

<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
	

	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>


</html>