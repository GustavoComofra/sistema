<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html >

<head>

	<!-- CSS -->
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../sistema/img/favicon.png" rel="icon" type="image/png">
<title>Industria Comofra SRL</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	.BtnMenu{
		text-decoration: none;
	}
</style>

</head>


<script type="text/javascript">
	function volver() {
		window.location.href = "https://interno.comofrasrl.com.ar/sistema/index.php";
	}
</script>

<body style="margin: 0 !important;">
	<?php

	session_start();

	$varCerrarSession = $_SESSION['usuario'];
	if ($varCerrarSession == null || $varCerrarSession = '') {
		echo "<H1>" . "Usted no tiene autorizacion" . "<H1>";
		echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";	
		die();
	}

	?>

	<nav class="navbar-dark bg-dark">

			<img class="" src="https://interno.comofrasrl.com.ar/sistema/img/favicon.png" width="50" height="50" style="border-radius: 50% 50%;" alt="Imagen logo" />

		<a class="BtnMenu" style="margin-left: 1%; margin-right:1%;" href="https://interno.comofrasrl.com.ar/sistema/panel.php">Inicio</a>

			<button class="navbar-toggler" type="button" onclick="mostrarOcultarBarra()"  id="BtnCollapse" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" >
      <span class="navbar-toggler-icon"></span>
			</button>
			<ul class="navbar-nav" style="margin-left: 80%; padding:0">

			</ul>
			</div>
	</nav>


	<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript" src="../js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script> -->
	<!-- <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script> -->
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>