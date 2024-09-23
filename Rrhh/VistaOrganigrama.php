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

	<title>Organigrama</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

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
			<div class="col-9 mt-0" style="margin-left: 20px">
  <div class="row">
    <div class="col">
	<img src="../img/Icono.png" alt="Logo" width="80" height="80">
    </div>
	<div class="col">

    </div>
	<div class="col">
      
	  </div>
	  <div class="col">
		
		</div>
    <div class="col">
	<h1><strong>Organigrama</strong></h1>
    </div>
    <div class="col">
	<a href="../Rrhh/VistaOrganigramaImpresion.php" target="_blank">
      <img src="../img/iconoImpresion.png" alt="iconoImpresion" width="20" height="20"></a>
    </div> 
	<div class="col">

</div>
  </div>


<div class="container text-center">
  <div class="row">




		<!-- Fin Gerente General 277 -->
    </div>
    <div class="col">
      
    </div>
  </div>
</div>

    </div>

<div class="container text-center">
<p><h2><strong>Gerencias</strong></h2></p>
<?php
	
	include("../Conexion/conexion.php");
	
	$queryOrganigramaGG = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Sector` = 19 AND `Encargado` = 19 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
		
	 while ($filaOrganigramaGG = mysqli_fetch_array($queryOrganigramaGG))
	
	 {
		echo "<a href=\"../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGG['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGG['Foto']." alt=\"img\" width=\"50\" height=\"50\"></a>"." - ".$filaOrganigramaGG['Nombres']."  ".$filaOrganigramaGG['Apellidos'];
		
		 }
	
	?>
  <div class="row">


  <p><h2><strong>Area</strong></h2></p>
  
    <div class="col">
	<h3><strong>Ventas</strong></h3>
		<!-- Gerente Perez 3317 -->
	<table  class="table table-striped">
	<?php
	
//	include("Conexion/conexion.php");
	
	$queryOrganigramaGV = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 18 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
		
	 while ($filaOrganigramaGV = mysqli_fetch_array($queryOrganigramaGV))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGV['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=\"../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGV['IdPersonal']."\" target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=\"".$filaOrganigramaGV['Foto']."\" alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";

		echo " - ";
		echo $filaOrganigramaGV['Nombres'];
		echo "  ";
		echo $filaOrganigramaGV['Apellidos'];
		echo "</TR>\n";
	
	 }
	
	?>
	<?php
	
	//include("Conexion/conexion.php");
	
	$queryOrganigramaGVC = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 18 AND `Gerente` = 18 ORDER BY `Apellidos` ASC");
	
	while ($filaOrganigramaGVC = mysqli_fetch_array($queryOrganigramaGVC))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGVC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=\"../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGVC['IdPersonal']." target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGVC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaGVC['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaGVC['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>
	</table>
	  <!-- Final Gerente Perez 3317 -->
    </div>

		<!-- Gerente Damian 3438 -->
		<div class="col">
	<h3><strong>Produccion</strong></h3>
	<!-- Gerente Damian -->
	<table class="table table-striped">
	<?php
	
//	include("Conexion/conexion.php");
	
$queryOrganigramaGP = $mysqli -> query ("SELECT * FROM ComEmpleado WHERE Encargado = 16 AND Gerente = 19 AND Baja LIKE 'No'");
	
while ($filaOrganigramaGP = mysqli_fetch_array($queryOrganigramaGP))
	
	{
	echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGP['IdPersonal']." target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGP['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGP['Nombres'];
	echo "  ";
	echo $filaOrganigramaGP['Apellidos'];
    echo "</TR>\n";
	
	 }
	
	?>

<?php
	
	//include("Conexion/conexion.php");
	
	$queryOrganigramaGAC = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 16 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
		
	 while ($filaOrganigramaGPC = mysqli_fetch_array($queryOrganigramaGAC))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGAC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGAC['IdPersonal']." target=\"_blank\">
	<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGPC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
	echo "<td>"." - "."</td>\n";
	echo "<td>".$filaOrganigramaGPC['Nombres']."</td>\n";
	echo "<td>"."  "."</td>\n";
	echo "<td>".$filaOrganigramaGPC['Apellidos']."</td>\n";
	echo "</TR>\n";
	
	 }
	
	?>

	</table>
    </div>

<!-- Fin Gerente Damian 3438 -->

<!-- Gerente Administracion< -->
    <div class="col">
	<h3><strong>Administracion</strong></h3>
	<!-- Gerente Yesica 3075 -->
	<table class="table table-striped">
	<?php
	
//	include("Conexion/conexion.php");
	
	$queryOrganigramaGA = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 17 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
		
	 while ($filaOrganigramaGA = mysqli_fetch_array($queryOrganigramaGA))
	
	{
	echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGA['IdPersonal']." target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGA['Nombres'];
	echo "  ";
	echo $filaOrganigramaGA['Apellidos'];
    echo "</TR>\n";
	
	 }
	
	?>

<?php
	
	//include("Conexion/conexion.php");
	
	$queryOrganigramaGAC = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 17 AND `Gerente` = 17 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
		
	 while ($filaOrganigramaGAC = mysqli_fetch_array($queryOrganigramaGAC))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGAC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGAC['IdPersonal']." target=\"_blank\">
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
	<table class="table table-striped">
	<?php
	
	//include("Conexion/conexion.php");
	
	$queryOrganigramaGA = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 22 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
		
	 while ($filaOrganigramaGA = mysqli_fetch_array($queryOrganigramaGA))
	
	{
	echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaGA['IdPersonal']." target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaGA['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
	echo " - ";
	echo $filaOrganigramaGA['Nombres'];
	echo "  ";
	echo $filaOrganigramaGA['Apellidos'];
    echo "</TR>\n";
	
	 }
	
	?>

<?php
	
	//include("Conexion/conexion.php");
	
	$queryOrganigramaSerIng = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 6 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaSerIng = mysqli_fetch_array($queryOrganigramaSerIng))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerIng['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerIng['IdPersonal']." target=\"_blank\">
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

<!-- Gerente RRHH -->
<div class="col">
    <h3><strong>RRHH</strong></h3>
   <table class="table table-striped">
    <?php
    
  //  include("Conexion/conexion.php");
    
    $queryOrganigramaEncRRHH = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 24 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
    
     while ($filaOrganigramaEncRRHH = mysqli_fetch_array($queryOrganigramaEncRRHH))
    
    {
    echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncRRHH ['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
    echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEncRRHH ['IdPersonal']." target=\"_blank\">
        <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncRRHH ['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
    echo " - ";
    echo $filaOrganigramaEncRRHH['Nombres'];
    echo "  ";
    echo $filaOrganigramaEncRRHH['Apellidos'];
    echo "</TR>\n";
    
     }
    
    ?>

<?php
    
   // include("Conexion/conexion.php");
    
    $queryOrganigramaSerRRHH = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 21 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC
");
    
     while ($filaOrganigramaSerRRHH = mysqli_fetch_array($queryOrganigramaSerRRHH))
    
    {
    echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
    echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerRRHH['IdPersonal']." target=\"_blank\">
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
</div>	

<div class="text-center">
<div class="row">
<h3>Produccion</h3>
<p><h3><strong>Encargados</strong></h3></p>
    <div class="col">

	<table class="table table-striped"> 
	<?php
	//Ariel Linea
	//include("Conexion/conexion.php");
	
	$queryOrganigramaEnLi = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 25 AND `Gerente` = 16 AND `Baja` LIKE 'No'");
	
	 while ($filaOrganigramaEnLi = mysqli_fetch_array($queryOrganigramaEnLi))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLi['IdPersonal']." target=\"_blank\">
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
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLiCo['IdPersonal']." target=\"_blank\">
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

	<div class="col">

<table class="table table-striped"> 
<?php
//Agropartes
//include("Conexion/conexion.php");

$queryOrganigramaEnLi = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 31 AND `Gerente` = 16 AND `Baja` LIKE 'No'");

 while ($filaOrganigramaEnLi = mysqli_fetch_array($queryOrganigramaEnLi))

{
	echo "<TR>\n";
	//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnLi['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
	echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLi['IdPersonal']." target=\"_blank\">
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
echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnLiCo['IdPersonal']." target=\"_blank\">
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

    <div class="col">
	<table class="table table-striped"> 
	<?php
	//Fernando
	//include("Conexion/conexion.php");
	
	$queryOrganigramaEnMe = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 26 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnMe = mysqli_fetch_array($queryOrganigramaEnMe))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMe['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMe['IdPersonal']." target=\"_blank\">
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
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMeCol['IdPersonal']." target=\"_blank\">
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
    <div class="col">

	<table class="table table-striped"> 
	<?php
	//Pintura
	//include("Conexion/conexion.php");
	
	$queryOrganigramaEnPin = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 27 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnPin = mysqli_fetch_array($queryOrganigramaEnPin))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPin['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnPin['IdPersonal']." target=\"_blank\">
		<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPin['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
		echo " - ";
		echo $filaOrganigramaEnPin['Nombres'];
		echo "  ";
		echo $filaOrganigramaEnPin['Apellidos'];
		echo "</TR>\n";
	
	 }
	 echo "- Pintura - Final";
	 $queryOrganigramaEnPinCol = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 10 AND `Gerente` = 27 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnPinCol = mysqli_fetch_array($queryOrganigramaEnPinCol))
	
	{
	echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnPinCol['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnPinCol['IdPersonal']." target=\"_blank\">
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

    

    <div class="col">
	<table class="table table-striped"> 
	<?php
	//Rivero
	//include("Conexion/conexion.php");
	
	$queryOrganigramaEnMae = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 29 AND `Gerente` = 16 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
	
	 while ($filaOrganigramaEnMae = mysqli_fetch_array($queryOrganigramaEnMae))
	
	{
		echo "<TR>\n";
		//echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEnMae['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
		echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMae['IdPersonal']." target=\"_blank\">
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
	echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEnMaeCol['IdPersonal']." target=\"_blank\">
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



	<div class="container text-center">
  <div class="row">
  <p><h2><strong>Servicios</strong></h2></p>

  	 <!-- Gerente Calidad -->
 <div class="col">
    <h3><strong>Calidad</strong></h3>
    <table class="table table-striped">
    <?php
    
	include("../Conexion/conexion.php");
    
    $queryOrganigramaEncCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 23 AND `Gerente` = 19 AND `Baja` LIKE 'No'");
   
     while ($filaOrganigramaEncCal = mysqli_fetch_array($queryOrganigramaEncCal))
    
    {
    echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
    echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEncCal['IdPersonal']." target=\"_blank\">
        <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
    echo " - ";
    echo $filaOrganigramaEncCal['Nombres'];
    echo "  ";
    echo $filaOrganigramaEncCal['Apellidos'];
    echo "</TR>\n";
    
     }
    
    ?>

<?php
    
//    include("Conexion/conexion.php");
    
    $queryOrganigramaSerCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 2 AND `Gerente` = 19 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
   
     while ($filaOrganigramaSerCal = mysqli_fetch_array($queryOrganigramaSerCal))
    
    {
    echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
    echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerCal['IdPersonal']."\" target=\"_blank\">
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

	   <!-- Gerente Calidad -->

 <div class="col">
    <h3><strong>Compras</strong></h3>
    <table class="table table-striped">
    <?php
    
	include("../Conexion/conexion.php");
    
    $queryOrganigramaEncCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 33 AND `Gerente` = 17 AND `Baja` LIKE 'No'");
   
     while ($filaOrganigramaEncComp = mysqli_fetch_array($queryOrganigramaEncCal))
    
    {
    echo "<TR>\n";
    //echo "<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">";
    echo "<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaEncComp['IdPersonal']." target=\"_blank\">
        <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaEncComp['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>";
    echo " - ";
    echo $filaOrganigramaEncComp['Nombres'];
    echo "  ";
    echo $filaOrganigramaEncComp['Apellidos'];
    echo "</TR>\n";
    
     }
    
    ?>

<?php
    
//    include("Conexion/conexion.php");
    
    $queryOrganigramaSerCal = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `Encargado` = 33 AND `Gerente` = 33 AND `Baja` LIKE 'No' ORDER BY `Apellidos` ASC");
   
     while ($filaOrganigramaSerComC = mysqli_fetch_array($queryOrganigramaSerCal))
    
    {
    echo "<TR>\n";
    //echo "<td>"."<img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerCal['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\">"."</td>\n";
    echo "<td>"."<a href=../Rrhh/VistaPersonal.php?IdPersonal=".$filaOrganigramaSerComC['IdPersonal']." target=\"_blank\">
    <img style=\"border-radius: 50% 50%\" src=".$filaOrganigramaSerComC['Foto']." alt=\"BtnIconoVer\" width=\"50\" height=\"50\"></a>"."</td>\n";
    echo "<td>"." - "."</td>\n";
    echo "<td>".$filaOrganigramaSerComC['Nombres']."</td>\n";
    echo "<td>"."  "."</td>\n";
    echo "<td>".$filaOrganigramaSerComC['Apellidos']."</td>\n";
    echo "</TR>\n";
    
     }
    
    ?>

    </table>
    </div>
      <!--Fin  Compras -->

	

  </div>

  <!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!-- <script src="js/dataTables.bootstrap.js"></script> -->
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