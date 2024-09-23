<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Ingreso de datos</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
  <body onload="startTime()">
<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
  
<div id="clockdate">

	 
  <div class="clockdate-wrapper">
<form name="formIng" method="post" action="../sistema/InsIng.php" enctype="multipart/form-data">
	
<table width="200" border="1"  >
   <tbody>
     <tr>
       <th   scope="col"><h1 class="alert-link EncaDescrip"><strong>INGRESO</strong></h1>
        <p Class="DescParrafo"><strong>ingresar su CUIT</strong></p></th>
     </tr>
     <tr>
       <td>	
<input class="red-input"  name="codigo" type="text" autofocus="autofocus" id="codigo" title="Codigo"  onkeyup="validaCuit()">
<h1 id="AvPrueba" class="ColorAvPrueba"></h1>
 <?php
$DiaIng = date("Y-m-d"); 
$HoraIng = date("H:i:s"); 
$time = time();
?></td>
     </tr>
   </tbody>
 </table>	
</form>	
	 <div id="clock"></div>
    <div id="date"></div>
  </div>
</div> 		
		

    </div>
  </div>
</div>	
	
     

 
</body>
</html>
