<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Nuevo Item Proceso</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
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
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>	


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
 

<?php
//Items Procesos
$Fk_Proceso=$_POST['txtid_proceso'];
$id_proceso=$_POST['txtid_proceso'];
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
//img
$nombre_imagen=$_FILES['img_itemproce']['name'];
$tipo_iamgen=$_FILES['img_itemproce']['type'];
$tamagno_imegen=$_FILES['img_itemproce']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen;
move_uploaded_file($_FILES['img_itemproce']['tmp_name'],$nombre_imagen);
$img_itemproce = 'https://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen;

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
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen1;
move_uploaded_file($_FILES['img_itemproce1']['tmp_name'],$nombre_imagen1);
$img_itemproce1 = 'https://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen1;

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
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen2;
move_uploaded_file($_FILES['img_itemproce2']['tmp_name'],$nombre_imagen2);
$img_itemproce2 = 'https://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen2;

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


$tamanio=$_POST['listtamanio'];
$tamanio1=$_POST['listtamanio1'];
$tamanio2=$_POST['listtamanio2'];
$tamanio3=$_POST['listtamanio3'];

$nombre_imagen3=$_FILES['img_itemproce3']['name'];
$tipo_iamgen=$_FILES['img_itemproce3']['type'];
$tamagno_imegen=$_FILES['img_itemproce3']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen3;
move_uploaded_file($_FILES['img_itemproce3']['tmp_name'],$nombre_imagen3);
$img_itemproce3 = 'https://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen3;


if (!$ItemProceso == null) {
	include("Conexion/conexion.php");
	$insertarItemProceso = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, 	`TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) VALUES (NULL, '$Op', '$ItemProceso', '$tamanio', '$ProductoProc', '$CantOper', 
	'$img_itemproce', '$TiempoEstandarMi', '$TiempoInefMi', '$Inicio', '$Final', '$Fk_Herramienta', '$Fk_Proceso', '$Advertencia');";
	
	$ejecutar_insertarItemProceso = mysqli_query($mysqli, $insertarItemProceso);
	
}
if (!$ItemProceso1 == null) {
	include("Conexion/conexion.php");
	$insertarItemProceso1 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`
	, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
	VALUES (NULL, '$Op1', '$ItemProceso1', '$ProductoProc1', '$CantOper1', '$img_itemproce1', $tamanio1', '$TiempoEstandarMi1', '$TiempoInefMi1', '$Inicio1', '$Final1'
	, '$Fk_Herramienta1', '$Fk_Proceso', '$Advertencia1');";
	$ejecutar_insertarItemProceso1 = mysqli_query($mysqli, $insertarItemProceso1);
}
if (!$ItemProceso2 == null) {
	include("Conexion/conexion.php");
	$insertarItemProceso2 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`
		, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op2', '$ItemProceso2', '$ProductoProc2', '$CantOper2', '$img_itemproce2', $tamanio2', '$TiempoEstandarMi2', '$TiempoInefMi2', '$Inicio2', '$Final2'
		, '$Fk_Herramienta2', '$Fk_Proceso', '$Advertencia2');";
	$ejecutar_insertarItemProceso2 = mysqli_query($mysqli, $insertarItemProceso2);
}
if (!$ItemProceso3 == null) {
	include("Conexion/conexion.php");
	$insertarItemProceso3 = "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_Proceso`, `Advertencia`) 
		VALUES (NULL, '$Op3', '$ItemProceso3', '$ProductoProc3', '$CantOper3', '$img_itemproce3', $tamanio3', '$TiempoEstandarMi3', '$TiempoInefMi3', '$Inicio3', '$Final3'
		, '$Fk_Herramienta3', '$Fk_Proceso', '$Advertencia3');";
	$ejecutar_insertarItemProceso3 = mysqli_query($mysqli, $insertarItemProceso3);
}

mysqli_close($mysqli);

?>

</div>
    <div class="col-md-auto">
	<div align="">
  <table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead>
    <tr>
	<?php
include("Conexion/conexion.php");
$queryProcesoVista = $mysqli -> query ("SELECT * FROM `VistItemProceso1` ORDER BY `id_itemproceso` DESC LIMIT 1");
$rowProcesoVistaItemProcesoVista = mysqli_fetch_assoc($queryProcesoVista);
?>
      <td colspan="6" align="center"><label>Item de proceso creado </label><br><?php echo '<img class="CssImage" src="'.$rowProcesoVistaItemProcesoVista['img_itemproce'].'" width="50" heigth="50"/>'; ?></td>
	
    </tr>
  </thead>
    
	<tr>
    <th scope="row" width=""><h1> Item Proceso Creado: </h1></th>	
	  <td width=""><h1> 
	<?php 
	  echo $rowProcesoVistaItemProcesoVista['id_itemproceso']."-".$rowProcesoVistaItemProcesoVista['ItemProceso']."<br>";

	  echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$rowProcesoVistaItemProcesoVista['Fk_Proceso']."\">
<img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnEditar\" width=\"90\" height=\"40\"></a></td>\n";
	 ?>
    </tr>

  </table>
	

</div>

    </div>
  </div>
</div>	

	
</body>
</html>