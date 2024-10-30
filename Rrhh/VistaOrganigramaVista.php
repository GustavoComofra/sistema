<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
	<title>Organigrama Comofra SRL</title>

<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>	
<div class="container-fluid">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
    <div class="col-md-auto">




    <div class="col col-lg-2">

<div class="container text-center">
  <div class="row">
    <div class="col">
	<img src="../sistema/img/Icono.png" alt="Logo" width="80" height="80">
    </div>
    <div class="col">
	<h1><strong>Organigrama</strong></h1>
    </div>
    <div class="col">
	<!-- <a href="/sistema/VistaOrganigramaImpresion.php" target="_blank">
      <img src="../sistema/img/iconoImpresion.png" alt="iconoImpresion" width="20" height="20"></a> -->
    </div>
  </div>
</div>




<div class="container text-center">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
		<!-- Gerente General 277 -->
	<p><h2><strong>Gerencia</strong></h2></p>
	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGG = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Sector` = 19 AND `Encargado` = 19 AND `Gerente` = 19 AND `Gerente_General` = 19 ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaGG = mysqli_fetch_array($queryOrganigramaGG))
	
	{
	echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGG['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGG['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGG['Nombres'];
	echo "  ";
	echo $filaOrganigramaGG['Apellidos'];

	
	 }
	
	?>
		<!-- Gerente General 277 -->
    </div>
    <div class="col">
      
    </div>
  </div>
</div>

    </div>

<div class="container text-center">
  <div class="row">
  <p><h2><strong>Area</strong></h2></p>
  


    <div class="col">
	<h3><strong>Ventas</strong></h3>
		<!-- Gerente Perez 3317 -->
	<table  class="table table-striped">
	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGV = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 18 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
	
	
	
	 while ($filaOrganigramaGV = mysqli_fetch_array($queryOrganigramaGV))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGV['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGV['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGV['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaGV['Nombres'];
		echo "  ";
		echo $filaOrganigramaGV['Apellidos'];
		echo "</TR>\n";
	
	 }
	
	?>
	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGVC = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 18 AND `Gerente` = 18 ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaGVC = mysqli_fetch_array($queryOrganigramaGVC))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGVC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGVC['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGVC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaGVC['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaGVC['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>
	</table>
	  <!-- Final Gerente Venta -->
    </div>


	<div class="col">
<h3><strong>Produccion</strong></h3>
		<!-- Gerente Damian 3438 -->

	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGP = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 16 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
	
	
	
	 while ($filaOrganigramaGP = mysqli_fetch_array($queryOrganigramaGP))
	
	{
	echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGP['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGP['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";	
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGP['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo " - ";
	echo $filaOrganigramaGP['Nombres'];
	echo "  ";
	echo $filaOrganigramaGP['Apellidos'];
	
	 }
	
	?>

    </div>

<!-- Fin Gerente Damian -->

<!-- Gerente Administracion< -->
    <div class="col">
	<h3><strong>Administracion</strong></h3>
	<!-- Gerente Leandro 3075 -->
	<table class="table table-striped">
	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGA = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 17 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
	
	
	
	 while ($filaOrganigramaGA = mysqli_fetch_array($queryOrganigramaGA))
	
	{
	echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGA['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGA['Nombres'];
	echo "  ";
	echo $filaOrganigramaGA['Apellidos'];
    echo "</TR>\n";
	
	 }
	
	?>

<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGAC = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 17 AND `Gerente` = 17 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaGAC = mysqli_fetch_array($queryOrganigramaGAC))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGAC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGAC['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGAC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaGAC['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaGAC['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>

	</table>
    </div>
	  <!--Fin  Gerente Asministrativo -->

	  <!-- Gerente Ingenieria -->
	  <div class="col">
	<h3><strong>Ingenieria</strong></h3>
	<!-- Gerente Leandro 3075 -->
	<table class="table table-striped">
	<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaGA = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 22 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
	
	
	
	 while ($filaOrganigramaGA = mysqli_fetch_array($queryOrganigramaGA))
	
	{
	echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaGA['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGA['Nombres'];
	echo "  ";
	echo $filaOrganigramaGA['Apellidos'];
    echo "</TR>\n";
	
	 }
	
	?>

<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaSerIng = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 6 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaSerIng = mysqli_fetch_array($queryOrganigramaSerIng))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerIng['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerIng['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerIng['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaSerIng['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaSerIng['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>

	</table>
    </div>
	  <!--Fin  Gerente Ingenieria -->
  </div>

</div>

    </div>
  </div>
</div>	

<!-- Inicio Produccion -->
<div class="text-center">
<div class="row">
<h3>Produccion</h3>
<p><h3><strong>Encargados</strong></h3></p>
    <div class="col">

	<table class="table table-striped"> 
	<?php
	//Ariel Linea
	include("Conexion/conexion.php");
	
	$queryOrganigramaEnLi = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 25 AND `Gerente` = 16 AND `Baja` LIKE 'No'");
	
	 while ($filaOrganigramaEnLi = mysqli_fetch_array($queryOrganigramaEnLi))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLi['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnLi['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnLi['Apellidos'];
		echo "</TR>\n";
	
	 }
	 echo "- Linea ";
	 $queryOrganigramaEnLiCo = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 7 AND `Gerente` = 25 AND `Baja` LIKE 'No'");
	
	
	
	 while ($filaOrganigramaEnLiCo = mysqli_fetch_array($queryOrganigramaEnLiCo))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLiCo['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLiCo['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLiCo['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaEnLiCo['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaEnLiCo['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }

	?>

	  </table>
    </div>

<!-- Inicio Agro partes -->
	<div class="col">

<table class="table table-striped"> 
<?php
//Ariel Agropartes
include("Conexion/conexion.php");

$queryOrganigramaEnLi = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 25 AND `Gerente`  `Sector` = 25 AND Sector = 16 AND `Baja` LIKE 'No'");

 while ($filaOrganigramaEnLi = mysqli_fetch_array($queryOrganigramaEnLi))

{
	echo "<TR>\n";
	//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLi['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaEnLi['Nombres'];
	echo "  ";
	echo $filaOrganigramaEnLi['Apellidos'];
	echo "</TR>\n";

 }
 echo "- Agropartes ";
 $queryOrganigramaEnLiCo = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 1 AND `Gerente` = 25 AND `Baja` LIKE 'No'");



 while ($filaOrganigramaEnLiCo = mysqli_fetch_array($queryOrganigramaEnLiCo))

{
echo "<TR>\n";
//echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLiCo['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLiCo['IdPersonal']."\" target=\"_blank\">
<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLiCo['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
echo "<td>"." - "."</td>\n";
echo "<td>".$filaOrganigramaEnLiCo['Nombres']."</td>\n";
echo "<td>"."  "."</td>\n";
echo "<td>".$filaOrganigramaEnLiCo['Apellidos']."</td>\n";
echo "</TR>\n";

 }
?>

  </table>
</div>
<!-- Fin Agro partes -->


	<!-- Fin Chapa -->
    <div class="col">
	<table class="table table-striped"> 
	<?php
	//Fernando
	include("Conexion/conexion.php");
	
	$queryOrganigramaEnMe = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 26 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnMe = mysqli_fetch_array($queryOrganigramaEnMe))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMe['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMe['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMe['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnMe['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnMe['Apellidos'];
		echo "</TR>\n";
	
	 }
	 echo "- Mecanizado, Corte y Plegado ";
	 $queryOrganigramaEnMeCol = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 9 AND `Gerente` = 26 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaEnMeCol = mysqli_fetch_array($queryOrganigramaEnMeCol))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMeCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMeCol['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMeCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaEnMeCol['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaEnMeCol['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>
	
	  </table>
    </div>

<!-- Fin Chapa -->

<!-- Inicio Pintura -->
    <div class="col">

	<table class="table table-striped"> 
	<?php
	//Pintura
	include("Conexion/conexion.php");
	
	$queryOrganigramaEnPin = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 27 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnPin = mysqli_fetch_array($queryOrganigramaEnPin))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPin['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnPin['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPin['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnPin['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnPin['Apellidos'];
		echo "</TR>\n";
	
	 }
	 echo "- Pre pintura y Pintura";
	 $queryOrganigramaEnPinCol = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 10 AND `Gerente` = 27 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaEnPinCol = mysqli_fetch_array($queryOrganigramaEnPinCol))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPinCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnPinCol['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPinCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaEnPinCol['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaEnPinCol['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>
	
	  </table>	

    </div>

	<!-- Fin Pintura -->

		<!-- Inicio Pintura -->

    <div class="col">
	<table class="table table-striped"> 
	<?php
	//Teyo
	include("Conexion/conexion.php");
	
	$queryOrganigramaEnFi = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 28 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnFi = mysqli_fetch_array($queryOrganigramaEnFi))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnFi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnFi['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnFi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnFi['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnFi['Apellidos'];
		echo "</TR>\n";
	
	 }

	 echo "- Final y Despacho";
	 $queryOrganigramaEnFiCol = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 5 AND `Gerente` = 28 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaEnFiCol = mysqli_fetch_array($queryOrganigramaEnFiCol))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnFiCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnFiCol['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnFiCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaEnFiCol['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaEnFiCol['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>
	
	  </table>	
    </div>

    <div class="col">
	<table class="table table-striped"> 
	<?php
	//Rivero
	include("Conexion/conexion.php");
	
	$queryOrganigramaEnMae = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 29 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnMae = mysqli_fetch_array($queryOrganigramaEnMae))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMae['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMae['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMae['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnMae['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnMae['Apellidos'];
		echo "</TR>\n";
	
	 }
	 echo "Maestranza";
	 $queryOrganigramaEnMaeCol = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 4 AND `Gerente` = 29 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaEnMaeCol = mysqli_fetch_array($queryOrganigramaEnMaeCol))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMaeCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMaeCol['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMaeCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaEnMaeCol['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaEnMaeCol['Apellidos']."</td>\n";
	echo "</TR>\n";
	mysqli_close($mysqli);
	 }
	
	?>
	
	  </table>
    </div>
	</div>

	<!-- Inicio Servicio -->
	<div class="container text-center">
	
  <div class="row">
  <p><h2><strong>Servicios</strong></h2></p>
 <!-- Gerente Calidad -->
 <div class="col">
    <h3><strong>Calidad</strong></h3>
    <table class="table table-striped">
    <?php
    
    include("Conexion/conexion.php");
    
    $queryOrganigramaEncCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 23 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
    
    
    
     while ($filaOrganigramaEncCal = mysqli_fetch_array($queryOrganigramaEncCal))
    
    {
    echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
    echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEncCal['IdPersonal']."\" target=\"_blank\">
        <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
    echo " - ";
    echo $filaOrganigramaEncCal['Nombres'];
    echo "  ";
    echo $filaOrganigramaEncCal['Apellidos'];
    echo "</TR>\n";
    
     }
    
    ?>

<?php
    
    include("Conexion/conexion.php");
    
    $queryOrganigramaSerCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 2 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
    
    
    
     while ($filaOrganigramaSerCal = mysqli_fetch_array($queryOrganigramaSerCal))
    
    {
    echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
    echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerCal['IdPersonal']."\" target=\"_blank\">
    <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
    echo "<td>"." - "."</td>\n";
    echo "<td>".$filaOrganigramaSerCal['Nombres']."</td>\n";
    echo "<td>"."  "."</td>\n";
    echo "<td>".$filaOrganigramaSerCal['Apellidos']."</td>\n";
    echo "</TR>\n";
    
     }
    
    ?>

    </table>
    </div>
      <!--Fin  Gerente Calidad -->

	<!-- Compras-Tercero-Planificacion -->
   <div class="col">
	<h3><strong>(Compras-Tercero-Planificacion)</strong></h3>

	<table class="table table-striped">
<?php
	
	include("Conexion/conexion.php");
	
	$queryOrganigramaSerGen = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 13 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	
	
	 while ($filaOrganigramaSerGen = mysqli_fetch_array($queryOrganigramaSerGen))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerGen['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerGen['IdPersonal']."\" target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerGen['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaSerGen['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaSerGen['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>

	</table>
   </div>
<!--Fin Compras-Tercero-Planificacion -->
 <!-- Gerente RRHH -->
 <div class="col">
    <h3><strong>RRHH</strong></h3>
   <table class="table table-striped">
    <?php
    
    include("Conexion/conexion.php");
    
    $queryOrganigramaEncRRHH = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 24 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
    
    
    
     while ($filaOrganigramaEncRRHH = mysqli_fetch_array($queryOrganigramaEncRRHH))
    
    {
    echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncRRHH ['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
    echo "<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaEncRRHH ['IdPersonal']."\" target=\"_blank\">
        <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncRRHH ['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
    echo " - ";
    echo $filaOrganigramaEncRRHH['Nombres'];
    echo "  ";
    echo $filaOrganigramaEncRRHH['Apellidos'];
    echo "</TR>\n";
    
     }
    
    ?>

<?php
    
    include("Conexion/conexion.php");
    
    $queryOrganigramaSerRRHH = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 21 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC
");
    
    
    
     while ($filaOrganigramaSerRRHH = mysqli_fetch_array($queryOrganigramaSerRRHH))
    
    {
    echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
    echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerRRHH['IdPersonal']."\" target=\"_blank\">
    <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerRRHH['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
    echo "<td>"." - "."</td>\n";
    echo "<td>".$filaOrganigramaSerRRHH['Nombres']."</td>\n";
    echo "<td>"."  "."</td>\n";
    echo "<td>".$filaOrganigramaSerRRHH['Apellidos']."</td>\n";
    echo "</TR>\n";
    
     }
    
    ?>

    </table>
    </div>
      <!--Fin  Gerente RRHH -->


   </div>
  <!-- Fila Servicio -->

  </div>

  <!-- Fin Servicio -->

  </div>
	
</body>
</html>