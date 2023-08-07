<!DOCTYPE html>
<html lang="es">
	<!-- caracter en lenguaje humano -->
  <meta charset="UTF-8">
	<!-- Vista distintas ventanas -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
	<!-- Informacion de la pagina -->
  <meta name="Sistema web para rrhh" content="Pagina de inicio"/>
	<!-- Etiquetas para los bucadores -->
  <meta name="keywords" content="Sistema rrhh, personal, horarios"/>

<head>

    
	<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/RRHH/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="/RRHH/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
    <link href="" rel="icon" type="image/png">
 <title>Insertar personal ingreso</title>
</head>

<body id="">
  

	<header class="">

  </header>

  <main>
	
  <div class="container">
    <div class="row">
      
      <div class="col">
    </div>   
    
  </div>


    <br>
    <section>
    <div class="container">

      <div class="col" >


		<?php
include("Conexion/conexion.php");
$Dia=date("Y-m-d");
$res=mysqli_query($con,"SELECT * FROM `ComHorario`");
$CUIT=$_POST["codigo"];		  
$insertarIngreso = "INSERT INTO `ComHorario` (`idComHorario`, `CUIT`, `Times`, `Dia`, `DiaIngr`, `DiaSal`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

$ejecutar_insertar=mysqli_query($mysqli,$insertarIngreso);

mysqli_close($mysqli);


	

  ?>  

      </div>
</div>
  </section>
	  
	  
</main>

</body>

</html>