<!DOCTYPE html>
<html lang="es">
	<!-- caracter en lenguaje humano -->
  <meta charset="UTF-8">
	<!-- Vista distintas ventanas -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
	<!-- Informacion de la pagina -->
  <meta name="Sistema web para gimnasio" content="Pagina de inicio"/>
	<!-- Etiquetas para los bucadores -->
  <meta name="keywords" content="Sistema web, gimnasio, entrenamiento"/>
	
<head>
	<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>
	<script type="text/javascript" src="../Comofra/js/funcionesGrupo6.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link rel="stylesheet" href="../Comofra/css/Formregistro.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
    <link href="../sistema/img/Icono.png" rel="icon" type="image/png">
	
<title>Usuario - a5-g6-gimnasio</title>

</head>
	

<body id="estiloBody">

	<header class="menu container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark estilo_navbar">
      <div class="container-fluid"> <!--container-fluid para que ocupe todo el ancho disponible-->
        <a href="../Comofra/index.html">
          <img class="CssImage" href="index.html" src="../sistema/img/Icono.png" width="70" height="70" alt="Imagen logo"/>
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div id="MenuNavegacion" class="collapse navbar-collapse">
          <ul class="navbar-nav ms-3">
            <li class="nav-item"><a href="../Comofra/index.html"> Home </a></li>
            <li class="nav-item"><a href="../Comofra/sobre_nosotros.html">Equipo</a></li>
            <li class="nav-item"><a href="../Comofra/contacto.html"> Contacto </a></li>
            <li class="nav-item"><a href="../Comofra/form_ingreso.html"> Login </a></li>
            <li class="nav-item"><a href="../Comofra/alta_cliente.html"> Alta Cliente </a></li>
            <li class="nav-item"><a href="../Comofra/help.html"> Ayuda </a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
	

  <?php

include("Conexion/conexion.php");
$Clave=$_POST['txtClave'];
$usuario=$_POST['txtUsuario'];
				
$query1 = $mysqli -> query ("SELECT * FROM `PrUsuario`);


  while ($fila4 = mysqli_fetch_array($query1))
{
echo " TipoUser: ".$fila4['TipoUser']";

};

?>
</body>

</html>