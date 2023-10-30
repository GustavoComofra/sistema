

<!DOCTYPE html>

<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/garantia/css/home.component.css" >
  <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/garantia/css/styles.css" >
  <!-- <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/garantia/css/enviado.component.css" > -->
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garantia Comofra SRL</title>

  <style type="text/css">
h1, h2{
  color: white;
  text-align: center;
}
.alineado{
  /*margin-left: 40%;*/
  display: grid;
  /*place-items: center;*/
}
.imagenCarrusel{
 /* margin-left: 25%;*/
  /*align-items: center;*/
  width:300px;
  height:200px;
  border-radius: 10% 10%;
}
a{
  color: white;
}
</style>

</head>

<body>

<?php
$Serie=$_POST['Serie'];
$Cliente=$_POST['Cliente'];
$Correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];


include("Conexion/conexion.php");
$insertarGarantia = "INSERT INTO `Garantia` (`Id_gar`, `Serie`, `Cliente`, `Correo`, `Telefono`, `Fecha`, `FechaContestacion`, `Observacion`) VALUES (NULL, '$Serie', '$Cliente', '$Correo', '$Telefono', current_timestamp(), '', '');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarGarantia);

$titulo="Garantia solicitada, numero de serie: ". $Serie;
$mensaje="Por favor revisar en el sistema .Com, el cliente " . $Correo ." ha pedido habilitar la garantia del numero de serie:  ".$Serie . " - Para revisarlo los pedidos de garantia pendiente, ingresar a : https://interno.comofrasrl.com.ar/sistema/";
$para="gustavog@live.com.ar,industrial@comofrasrl.com.ar, comercial@comofrasrl.com.ar, sgc@comofrasrl.com.ar, gerenciageneral@comofrasrl.com.ar, gerenciaproduccion@comofrasrl.com.ar";


$cabeceras = 'From: comercial@comofrasrl.com.ar>';
$enviado = mail($para, "Pedido habilitar garantia", $mensaje,$cabeceras);

if ($enviado)
  echo 'Email enviado correctamente: '.$para;
else
  echo 'Error en el envio del email';

mysqli_close($mysqli);

?>

<h1>Gracias por confiar en nosotros</h1>
<h2><a href="https://www.comofrasrl.com.ar/">www.comofrasrl.com.ar</a></h2>
<h2>A la brevedad estaremos respondiendo la aprobación de la garantía

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
  <center>
    <div class="carousel-item active">
      <img class="d-block imagenCarrusel" src="../garantia/imgGarantia/COMOFRA 004.jpg"  alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block imagenCarrusel" src="../garantia/imgGarantia/COMOFRA 012.jpg"  alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block imagenCarrusel" src="../garantia/imgGarantia/COMOFRA 085.jpg"  alt="Third slide">
    </div>
    <div class="carousel-item ">
      <img class="d-block imagenCarrusel" src="../garantia/imgGarantia/COMOFRA 092.jpg"   alt="For slide">
    </div>
    </center>
  </div>

</div>

</h2>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>
