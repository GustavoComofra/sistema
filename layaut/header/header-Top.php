<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


	<!-- CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../layaut/script/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="../layaut/estilos/css/estiloHome.css"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
	
	
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Industria Comofra SRL</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

	
	<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>

<body>
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}

?>	
	
	

<nav class="navbar navbar-dark bg-dark">
<a href="index.php">
      <img class="" href="index.html" src="/sistema/img/logo1.jpg" width="50" height="50" style="border-radius: 50% 50%;"  alt="Imagen logo"/>  </a>
      <a class="navbar-brand" style="margin-left: 1%;" href="../../panel.php">Inicio</a>
  <div class="container">
    <button  class="navbar-toggler" type="button" id="btnVistaMenu" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<ul class="navbar-nav" style="margin-left: 80%;">

<li class="nav-item active " >
	<a  class="nav-link" href="../../CerrarSession.php" style="color: white"> <?php echo "Cerrar ".$_SESSION['usuario'];  ?>
	
  </li>	
  </div>
	
</ul>
 

</nav>

	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	
	</header>



	
</body>


</html>
