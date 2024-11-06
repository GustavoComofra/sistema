<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

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

	<title>Nuevo Personal</title>
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


$tamanio=$_POST['listtamanio'];
$tamanio1=$_POST['listtamanio1'];
$tamanio2=$_POST['listtamanio2'];
$tamanio3=$_POST['listtamanio3'];

$nombre_imagen3=$_FILES['img_itemproce3']['name'];
$tipo_iamgen=$_FILES['img_itemproce3']['type'];
$tamagno_imegen=$_FILES['img_itemproce3']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_imagen3;
move_uploaded_file($_FILES['img_itemproce3']['tmp_name'],"img/procesos/".$nombre_imagen3);
$img_itemproce3 = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen3;


if (!$ItemProceso == null) {
	include("../Conexion/conexion.php");

$insertarItemProceso= "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_CodMadreProceso`, `Fk_Proceso`, `Advertencia`) VALUES (NULL, '$Op', '$ItemProceso', '0', '$CantOper', '$img_itemproce', '$tamanio', '$TiempoEstandarMi', '$TiempoInefMi', '$Inicio', '$Final', '$Fk_Herramienta', '0', '$Fk_Proceso', '$Advertencia');";
	
	$ejecutar_insertarItemProceso = mysqli_query($mysqli, $insertarItemProceso);
	
}
if (!$ItemProceso1 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso1= "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_CodMadreProceso`, `Fk_Proceso`, `Advertencia`) VALUES (NULL, '$Op1', '$ItemProceso1', '0', '$CantOper1', '$img_itemproce1', '$tamanio1', '$TiempoEstandarMi1', '$TiempoInefMi1', '$Inicio1', '$Final1', '$Fk_Herramienta1', '0', '$Fk_Proceso', '$Advertencia1');";
	$ejecutar_insertarItemProceso1 = mysqli_query($mysqli, $insertarItemProceso1);
}
if (!$ItemProceso2 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso2= "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_CodMadreProceso`, `Fk_Proceso`, `Advertencia`) VALUES (NULL, '$Op2', '$ItemProceso2', '0', '$CantOper2', '$img_itemproce2', '$tamanio2', '$TiempoEstandarMi2', '$TiempoInefMi2', '$Inicio2', '$Final2', '$Fk_Herramienta2', '0', '$Fk_Proceso', '$Advertencia2');";
	$ejecutar_insertarItemProceso2 = mysqli_query($mysqli, $insertarItemProceso2);
}
if (!$ItemProceso3 == null) {
	//include("Conexion/conexion.php");
	$insertarItemProceso3= "INSERT INTO `item_proceso` (`id_itemproceso`, `Op`, `ItemProceso`, `Fk_ProdProc`, `CantOper`, `img_itemproce`, `tamanio`, `TiempoEstandarMi`, `TiempoInefMi`, `Inicio`, `Final`, `Fk_Herramienta`, `Fk_CodMadreProceso`, `Fk_Proceso`, `Advertencia`) VALUES (NULL, '$Op3', '$ItemProceso3', '0', '$CantOper3', '$img_itemproce3', '$tamanio3', '$TiempoEstandarMi3', '$TiempoInefMi3', '$Inicio3', '$Final3', '$Fk_Herramienta3', '0', '$Fk_Proceso', '$Advertencia3');";
	$ejecutar_insertarItemProceso3 = mysqli_query($mysqli, $insertarItemProceso3);
}

mysqli_close($mysqli);

?>

</div>
    <div class="col-md-auto">
	<div >
  <table class="table-responsive-xl table table-bordered table-hover">
<thead>
    <tr>
	<?php
include("../Conexion/conexion.php");
$queryProcesoVista = $mysqli -> query ("SELECT * FROM `VistItemProceso1` ORDER BY `id_itemproceso` DESC LIMIT 1");
$rowProcesoVistaItemProcesoVista = mysqli_fetch_assoc($queryProcesoVista);
?>
      <td colspan="6"  ><label>Item de proceso creado </label><br><?php echo '<img class="CssImage" src="'.$rowProcesoVistaItemProcesoVista['img_itemproce'].'" width="50" heigth="50"/>'; ?></td>
	
    </tr>
  </thead>
    
	<tr>
    <th scope="row" ><h1> Item Proceso Creado: </h1></th>	
	  <td ><h1> 
	<?php 
	  echo $rowProcesoVistaItemProcesoVista['id_itemproceso']."-".$rowProcesoVistaItemProcesoVista['ItemProceso']."<br>";

	  echo "<td>"."<a href=\"/sistema/ingenieria/FormProcesoEditar.php?id_proceso=".$rowProcesoVistaItemProcesoVista['Fk_Proceso']."\">
<img src=\"../img/BtnVolver.png\" alt=\"BtnEditar\" width=\"90\" height=\"40\"></a></td>\n";
	 ?>
    </tr>

  </table>
	
  </div>
</div>

    </div>
  </div>
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