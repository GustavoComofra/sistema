<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

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

	<title>Insertar proceso</title>
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
			<div >
  <table class="table table-hover">
<thead>
    <tr>
	<?php
include("../Conexion/conexion.php");
$queryProcesoVista = $mysqli -> query ("SELECT * FROM `VistItemProceso1` ORDER BY `id_proceso` DESC LIMIT 1");
$rowProcesoVistaProcesoVista = mysqli_fetch_assoc($queryProcesoVista);
?>
	
    </tr>
  </thead>
  </table>
	

</div>
<?php
//Items Procesos

$Fk_Proceso=$_POST['txtFk_Proceso'];
$Op=$_POST['txtOp'];
$ItemProceso=$_POST['txtItemProceso'];
$ProductoProc=$_POST['listProductoProc'];
$CantOper=$_POST['txtCantOper'];
$TiempoEstandarMi=$_POST['txtTiempoEstandarMi'];
$TiempoInefMi=$_POST['txtTiempoInefMi'];
$Inicio=$_POST['txtInicio'];
$Final=$_POST['txtFinal'];		
$Fk_Herramienta=$_POST['listFk_Herramienta'];	
$Advertencia=$_POST['txtAdvertencia'];

$nombre_imagen=$_FILES['img_itemproce']['name'];
$tipo_iamgen=$_FILES['img_itemproce']['type'];
$tamagno_imegen=$_FILES['img_itemproce']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen;
move_uploaded_file($_FILES['img_itemproce']['tmp_name'],"img/procesos/".$nombre_imagen);
$img_itemproce = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen;

$Op1=$_POST['txtOp1'];
$ItemProceso1=$_POST['txtItemProceso1'];
$ProductoProc1=$_POST['listProductoProc1'];
$CantOper1=$_POST['txtCantOper1'];
$TiempoEstandarMi1=$_POST['txtTiempoEstandarMi1'];
$TiempoInefMi1=$_POST['txtTiempoInefMi1'];
$Inicio1=$_POST['txtInicio1'];
$Final1=$_POST['txtFinal1'];		
$Fk_Herramienta1=$_POST['listFk_Herramienta1'];	
$Advertencia1=$_POST['txtAdvertencia1'];

$nombre_imagen1=$_FILES['img_itemproce1']['name'];
$tipo_iamgen=$_FILES['img_itemproce1']['type'];
$tamagno_imegen=$_FILES['img_itemproce1']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen1;
move_uploaded_file($_FILES['img_itemproce1']['tmp_name'],"img/procesos/".$nombre_imagen1);
$img_itemproce1 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen1;

$Op2=$_POST['txtOp2'];
$ItemProceso2=$_POST['txtItemProceso2'];
$ProductoProc2=$_POST['listProductoProc2'];
$CantOper2=$_POST['txtCantOper2'];
$TiempoEstandarMi2=$_POST['txtTiempoEstandarMi2'];
$TiempoInefMi2=$_POST['txtTiempoInefMi2'];
$Inicio2=$_POST['txtInicio2'];
$Final2=$_POST['txtFinal2'];		
$Fk_Herramienta2=$_POST['listFk_Herramienta2'];	
$Advertencia2=$_POST['txtAdvertencia2'];

$nombre_imagen2=$_FILES['img_itemproce2']['name'];
$tipo_iamgen=$_FILES['img_itemproce2']['type'];
$tamagno_imegen=$_FILES['img_itemproce2']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen2;
move_uploaded_file($_FILES['img_itemproce2']['tmp_name'],"img/procesos/".$nombre_imagen2);
$img_itemproce2 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen2;

$Op3=$_POST['txtOp3'];
$ItemProceso3=$_POST['txtItemProceso3'];
$ProductoProc3=$_POST['listProductoProc3'];
$CantOper3=$_POST['txtCantOper3'];
$TiempoEstandarMi3=$_POST['txtTiempoEstandarMi3'];
$TiempoInefMi3=$_POST['txtTiempoInefMi3'];
$Inicio3=$_POST['txtInicio3'];
$Final3=$_POST['txtFinal3'];		
$Fk_Herramienta3=$_POST['listFk_Herramienta3'];	
$Advertencia3=$_POST['txtAdvertencia3'];

$nombre_imagen3=$_FILES['img_itemproce3']['name'];
$tipo_iamgen=$_FILES['img_itemproce3']['type'];
$tamagno_imegen=$_FILES['img_itemproce3']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen3;
move_uploaded_file($_FILES['img_itemproce3']['tmp_name'],"img/procesos/".$nombre_imagen3);
$img_itemproce3 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen3;

$Op4=$_POST['txtOp4'];
$ItemProceso4=$_POST['txtItemProceso4'];
$ProductoProc4=$_POST['listProductoProc4'];
$CantOper4=$_POST['txtCantOper4'];
$TiempoEstandarMi4=$_POST['txtTiempoEstandarMi4'];
$TiempoInefMi4=$_POST['txtTiempoInefMi4'];
$Inicio4=$_POST['txtInicio4'];
$Final4=$_POST['txtFinal4'];		
$Fk_Herramienta4=$_POST['listFk_Herramienta4'];	
$Advertencia4=$_POST['txtAdvertencia4'];

$nombre_imagen4=$_FILES['img_itemproce4']['name'];
$tipo_iamgen=$_FILES['img_itemproce4']['type'];
$tamagno_imegen=$_FILES['img_itemproce4']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen4;
move_uploaded_file($_FILES['img_itemproce4']['tmp_name'],"img/procesos/".$nombre_imagen4);
$img_itemproce4 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen4;

$Op5=$_POST['txtOp5'];
$ItemProceso5=$_POST['txtItemProceso5'];
$ProductoProc5=$_POST['listProductoProc5'];
$CantOper5=$_POST['txtCantOper5'];
$TiempoEstandarMi5=$_POST['txtTiempoEstandarMi5'];
$TiempoInefMi5=$_POST['txtTiempoInefMi5'];
$Inicio5=$_POST['txtInicio5'];
$Final5=$_POST['txtFinal5'];		
$Fk_Herramienta5=$_POST['listFk_Herramienta5'];	
$Advertencia5=$_POST['txtAdvertencia5'];

$nombre_imagen5=$_FILES['img_itemproce5']['name'];
$tipo_iamgen=$_FILES['img_itemproce5']['type'];
$tamagno_imegen=$_FILES['img_itemproce5']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen5;
move_uploaded_file($_FILES['img_itemproce5']['tmp_name'],"img/procesos/".$nombre_imagen5);
$img_itemproce5 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen5;

$Op6=$_POST['txtOp6'];
$ItemProceso6=$_POST['txtItemProceso6'];
$ProductoProc6=$_POST['listProductoProc6'];
$CantOper6=$_POST['txtCantOper6'];
$TiempoEstandarMi6=$_POST['txtTiempoEstandarMi6'];
$TiempoInefMi6=$_POST['txtTiempoInefMi6'];
$Inicio6=$_POST['txtInicio6'];
$Final6=$_POST['txtFinal6'];		
$Fk_Herramienta6=$_POST['listFk_Herramienta6'];	
$Advertencia6=$_POST['txtAdvertencia6'];

$nombre_imagen6=$_FILES['img_itemproce6']['name'];
$tipo_iamgen=$_FILES['img_itemproce6']['type'];
$tamagno_imegen=$_FILES['img_itemproce6']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen6;
move_uploaded_file($_FILES['img_itemproce6']['tmp_name'],"img/procesos/".$nombre_imagen6);
$img_itemproce6 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen6;

$Op7=$_POST['txtOp7'];
$ItemProceso7=$_POST['txtItemProceso7'];
$ProductoProc7=$_POST['listProductoProc7'];
$CantOper7=$_POST['txtCantOper7'];
$TiempoEstandarMi7=$_POST['txtTiempoEstandarMi7'];
$TiempoInefMi7=$_POST['txtTiempoInefMi7'];
$Inicio7=$_POST['txtInicio7'];
$Final7=$_POST['txtFinal7'];		
$Fk_Herramienta7=$_POST['listFk_Herramienta7'];	
$Advertencia7=$_POST['txtAdvertencia7'];

$nombre_imagen7=$_FILES['img_itemproce7']['name'];
$tipo_iamgen=$_FILES['img_itemproce7']['type'];
$tamagno_imegen=$_FILES['img_itemproce7']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen7;
move_uploaded_file($_FILES['img_itemproce7']['tmp_name'],"img/procesos/".$nombre_imagen7);
$img_itemproce7 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen7;

$Op8=$_POST['txtOp8'];
$ItemProceso8=$_POST['txtItemProceso8'];
$ProductoProc8=$_POST['listProductoProc8'];
$CantOper8=$_POST['txtCantOper8'];
$TiempoEstandarMi8=$_POST['txtTiempoEstandarMi8'];
$TiempoInefMi8=$_POST['txtTiempoInefMi8'];
$Inicio8=$_POST['txtInicio8'];
$Final8=$_POST['txtFinal8'];		
$Fk_Herramienta8=$_POST['listFk_Herramienta8'];	
$Advertencia8=$_POST['txtAdvertencia8'];

$nombre_imagen8=$_FILES['img_itemproce8']['name'];
$tipo_iamgen=$_FILES['img_itemproce8']['type'];
$tamagno_imegen=$_FILES['img_itemproce8']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen8;
move_uploaded_file($_FILES['img_itemproce8']['tmp_name'],"img/procesos/".$nombre_imagen8);
$img_itemproce8 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen8;

$Op9=$_POST['txtOp9'];
$ItemProceso9=$_POST['txtItemProceso9'];
$ProductoProc9=$_POST['listProductoProc9'];
$CantOper9=$_POST['txtCantOper9'];
$TiempoEstandarMi9=$_POST['txtTiempoEstandarMi9'];
$TiempoInefMi9=$_POST['txtTiempoInefMi9'];
$Inicio9=$_POST['txtInicio9'];
$Final9=$_POST['txtFinal9'];		
$Fk_Herramienta9=$_POST['listFk_Herramienta9'];	
$Advertencia9=$_POST['txtAdvertencia9'];

$nombre_imagen9=$_FILES['img_itemproce9']['name'];
$tipo_iamgen=$_FILES['img_itemproce9']['type'];
$tamagno_imegen=$_FILES['img_itemproce9']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen9;
move_uploaded_file($_FILES['img_itemproce9']['tmp_name'],"img/procesos/".$nombre_imagen9);
$img_itemproce9 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen9;

if (!$ItemProceso == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
VALUES (NULL, '$Op', '$ItemProceso', '$ProductoProc', '$CantOper', '$img_itemproce', '$TiempoEstandarMi', '$TiempoInefMi', '$Inicio', '$Final', '$Fk_Herramienta', '$Fk_Proceso', '$Advertencia');";
	$ejecutar_insertarItemProceso = mysqli_query($mysqli, $insertarItemProceso);
}
if (!$ItemProceso1 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso1 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
	, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
	VALUES (NULL, '$Op1', '$ItemProceso1', '$ProductoProc1', '$CantOper1', '$img_itemproce1', '$TiempoEstandarMi1', '$TiempoInefMi1', '$Inicio1', '$Final1'
	, '$Fk_Herramienta1', '$Fk_Proceso', '$Advertencia1');";
	$ejecutar_insertarItemProceso1 = mysqli_query($mysqli, $insertarItemProceso1);
}
if (!$ItemProceso2 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso2 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op2', '$ItemProceso2', '$ProductoProc2', '$CantOper2', '$img_itemproce2', '$TiempoEstandarMi2', '$TiempoInefMi2', '$Inicio2', '$Final2'
		, '$Fk_Herramienta2', '$Fk_Proceso', '$Advertencia2');";
	$ejecutar_insertarItemProceso2 = mysqli_query($mysqli, $insertarItemProceso2);
}
if (!$ItemProceso3 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso3 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op3', '$ItemProceso3', '$ProductoProc3', '$CantOper3', '$img_itemproce3', '$TiempoEstandarMi3', '$TiempoInefMi3', '$Inicio3', '$Final3'
		, '$Fk_Herramienta3', '$Fk_Proceso', '$Advertencia3');";
	$ejecutar_insertarItemProceso3 = mysqli_query($mysqli, $insertarItemProceso3);
}
if (!$ItemProceso4 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso4 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op4', '$ItemProceso4', '$ProductoProc4', '$CantOper4', '$img_itemproce4', '$TiempoEstandarMi4', '$TiempoInefMi4', '$Inicio4', '$Final4'
		, '$Fk_Herramienta4', '$Fk_Proceso', '$Advertencia4');";
	$ejecutar_insertarItemProceso4 = mysqli_query($mysqli, $insertarItemProceso4);
}

if (!$ItemProceso5 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso5 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op5', '$ItemProceso5', '$ProductoProc5', '$CantOper5', '$img_itemproce5', '$TiempoEstandarMi5', '$TiempoInefMi5', '$Inicio5', '$Final5'
		, '$Fk_Herramienta5', '$Fk_Proceso', '$Advertencia5');";
	$ejecutar_insertarItemProceso5 = mysqli_query($mysqli, $insertarItemProceso5);
}
if (!$ItemProceso6 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso6 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op6', '$ItemProceso6', '$ProductoProc6', '$CantOper6', '$img_itemproce6', '$TiempoEstandarMi6', '$TiempoInefMi6', '$Inicio6', '$Final6'
		, '$Fk_Herramienta6', '$Fk_Proceso', '$Advertencia6');";
	$ejecutar_insertarItemProceso6 = mysqli_query($mysqli, $insertarItemProceso6);
}
if (!$ItemProceso7 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso7 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op7', '$ItemProceso7', '$ProductoProc7', '$CantOper7', '$img_itemproce7', '$TiempoEstandarMi7', '$TiempoInefMi7', '$Inicio7', '$Final7'
		, '$Fk_Herramienta7', '$Fk_Proceso', '$Advertencia7');";
	$ejecutar_insertarItemProceso7 = mysqli_query($mysqli, $insertarItemProceso7);
}
if (!$ItemProceso8 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso8 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op8', '$ItemProceso8', '$ProductoProc8', '$CantOper8', '$img_itemproce8', '$TiempoEstandarMi8', '$TiempoInefMi8', '$Inicio8', '$Final8'
		, '$Fk_Herramienta8', '$Fk_Proceso', '$Advertencia8');";
	$ejecutar_insertarItemProceso8 = mysqli_query($mysqli, $insertarItemProceso8);
}
if (!$ItemProceso9 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso9 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op9', '$ItemProceso9', '$ProductoProc9', '$CantOper9', '$img_itemproce9', '$TiempoEstandarMi9', '$TiempoInefMi9', '$Inicio9', '$Final9'
		, '$Fk_Herramienta9', '$Fk_Proceso', '$Advertencia9');";
	$ejecutar_insertarItemProceso9 = mysqli_query($mysqli, $insertarItemProceso9);
}

mysqli_close($mysqli);

?>



    </div>
  </div>
</div>	
<div class="col">
 <?php
include("../Conexion/conexion.php");

$id_procesouser=$_POST['id_proceso'];
echo $id_procesoNuevo;
$queryvarid_procesNuevo = $mysqli -> query ("SELECT * FROM `Proceso` ORDER BY `id_proceso` DESC LIMIT 1;");
$rowprocesoprocesoNuevo = mysqli_fetch_assoc($queryvarid_procesNuevo);

?>
    </div>
<div class="container">
  <div class="row">


     <table class="table table-bordered">
      <tr>
        <td class="algCentral"><img src="../img/logoAmplio.jpg" alt="Logo" width="200" height="60"></td>
        <td ><h3 class="algCentral"><strong class="algCentral">  Estudio de Metodos y Tiempos</strong></h3></td>
        <td >
        <p>Registro N 01</p>
        <p>Fecha: <?php echo $rowprocesoprocesoNuevo['FechaInicio']; ?></p>
        <p>Realizo: <?php echo $rowprocesoprocesoNuevo['user']; ?></p>
      </td>
      </tr>
  
      </tr>
<tr>
  <td>
  <h5>   <strong>Cod: </strong><?php echo $rowprocesoprocesoNuevo['ProductoProceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Producto: </strong><?php echo $rowprocesoprocesoNuevo['Producto']; ?></h5>
  </td>
</tr>

<tr>
  <td>
  <h5> <strong>Num: </strong><?php echo $rowprocesoprocesoNuevo['id_proceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Proceso: </strong><?php echo $rowprocesoprocesoNuevo['Proceso']; ?></h5>
  </td>
</tr>

<tr>
  <td colspan="8" class="algCentral">
  <figure class="figure">
  <?php  echo '<img src="'.$rowprocesoprocesoNuevo['imgprod'].'" alt=\"imgprod\" width=\"300\" height=\"100\"/>';?>
  <figcaption class="figure-caption">Imagen principal</figcaption>
</figure>
  </td>
</tr>

    
<tr>
     <table class="table table-striped">
  <thead>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">ItemProceso</th>
      <th scope="col"><p>Cantidad operarios</p></th>
      <th scope="col">img</th>
      <th scope="col">Tiempo Estandar</th>
      <th scope="col">Total</th>
      <th scope="col">Prod</th>
      <th scope="col">Herramienta</th>
      <th scope="col">Advertencia</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $queryItemproceso = $mysqli -> query ("SELECT * FROM `VistItemProceso1` WHERE `Fk_Proceso` =".$rowprocesoprocesoNuevo['id_proceso']." ORDER BY `VistItemProceso1`.`Op` ASC;");
    while ($filaItemproceso = mysqli_fetch_array($queryItemproceso))
  {
   echo "<TR>\n"; 
 echo "<th>".$filaItemproceso['Op']."</th>\n";
 echo "<td>".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['CantOper']."</td>\n";
 echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: " width="50" heigth="50"/>'."</td>\n";
 echo "<td>".$filaItemproceso['TiempoEstandarMi']." Min"."</td>\n";
 $varTotal=round($filaItemproceso['TiempoEstandarMi']*$filaItemproceso['CantOper']);
 echo "<td>".$varTotal."</td>\n";
 echo "<td>".$filaItemproceso['Fk_ProdProc']."-".$filaItemproceso['Producto']."</td>\n";
 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	 

 
 $varSumaMin +=$varTotal;
 $varSumaHor +=round($varTotal/60);
 echo "</TR>\n";

 }
 echo "<td>"."<strong>"."Totales"."</strong>"."</td>\n";
 echo "<td>"."</td>\n";
 echo "<td>"."</td>\n";

  echo "<td>"."</td>\n";
  echo "<td>"."<strong>".$varSumaMin." Min"."</strong>"."</td>\n";
  echo "<td>"."<strong>".$varSumaHor." Hr"."</strong>"."</td>\n";
 ?>

   </tbody>
</table> 
</tr> </table>
  

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