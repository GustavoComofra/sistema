<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	<title>Mantenimiento</title>
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
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->

			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">


	<form action="#" method="post" name="formMaquinaria" enctype="multipart/form-data">
		<div id="respuesta"></div>
	<div class="form-group">

<div class="row">
<div class="col-2">
<input type="hidden" name="txtIdPM" id="IdPM">
		<label for="txtFechaSolicitada">Fecha Solicitada</label>
    <input class="form-control" type="date" name="txFechaSolicitada" id="txtFechaSolicitada">

	<label for="txtFechaFinalizado">Fecha Finalizado</label>	
	<input class="form-control" type="date" name="txtFechaFinalizado" id="txtFechaFinalizado"  >
	</div>

	<div class="col">

<label for="txtFk_Maquinaria">Maquinaria</label>
<select class="form-control"  name="listProvedMaq" size="1" id="listProvedMaq" required>
        <option value=1>Seleccione herramienta</option>
        <?php
$queryProv = $mysqli -> query ("SELECT * FROM `VistMaquinaria` ORDER BY `Maquina` ASC");
 while ($valoresMaq = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresMaq[idMaq].'">'.$valoresMaq[Maquina].' - '.$valoresMaq[NumMaq].'</option>';
}
	?>
</select>

	</div>
<div class="col">

	  <label for="listFk_Tipo">Tipo</label>	
<select class="form-control"  name="listFk_Tipo" size="1" id="listFk_Tipo" required>
        <option value=1>Seleccione Tipo</option>
        <?php
$queryTipoPM = $mysqli -> query ("SELECT * FROM `TipoPM` WHERE `Activo` LIKE 'Si' ORDER BY `Tipo` ASC");
 while ($valoresTipoPM = mysqli_fetch_array($queryTipoPM))
{
echo '<option value="'.$valoresTipoPM[idTipoPM].'">'.$valoresTipoPM[Tipo].' - '.$valoresTipoPM[idTipoPM].'</option>';
}
	?>
      </select>



		</div>

</div>

<div class="row">

<div class="col">



</div>

<div class="col">


</div>

</div>

<div class="row">

<div class="col">
<label for="ImagenInicial" class="form-label">Imagen Inicial</label>
  <input class="form-control" type="file" id="ImagenInicial" name="ImagenInicial">

</div>

<div class="col">
<label for="ImagenFinal" class="form-label">Imagen Final</label>
  <input class="form-control" type="file" id="ImagenFinal" name="ImagenFinal">

</div>

<div class="col">



</div>

</div>

<div class="row">
	<div class="form-floating">
  <textarea class="form-control" placeholder="Observacion" name="txtObsPM" id="txtObsPM"></textarea>
  <label for="txtObsPM">Observacion</label>
  </div>
  </div>
  <div class="row">
  <div class="col">
  <label for="txtUsuarioRequerido">UsuarioRequerido</label>	
  <select class="form-control"  name="listUsuarioRequerido" size="1" id="listUsuarioRequerido" required>
        <option value=2>Seleccione Usuario</option>
        <?php
include("Conexion/conexion.php");
$queryusuarioReq = $mysqli -> query ("SELECT * FROM `PrUsuario` ORDER BY `PrUsuario`.`usuario` ASC");
 while ($valoresusuarioReq = mysqli_fetch_array($queryusuarioReq))
{
echo '<option value="'.$valoresusuarioReq[usuario].'">'.$valoresusuarioReq[usuario].' </option>';
}
	?>
      </select>	 
	</div>
	<div class="col">
	<label for="txtUsuarioFinalizado">Usuario Finalizado</label>	
	<select class="form-control"  name="listUsuarioFinalizado" size="1" id="listUsuarioFinalizado" required>
        <option value=2>Seleccione Usuario</option>
        <?php
$queryusuario = $mysqli -> query ("SELECT * FROM `PrUsuario` ORDER BY `PrUsuario`.`usuario` ASC");
 while ($valoresusuario = mysqli_fetch_array($queryusuario))
{
echo '<option value="'.$valoresusuario[usuario].'">'.$valoresusuario[usuario].' </option>';
}
	?>
      </select>	  
	</div>
	<div class="col">
	<label for="listFk_Sector">Sector</label>	
<select class="form-control" name="listFk_Sector" size="1" id="listFk_Sector">
        <option value="1">Sector</option>
        <?php
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresSector = mysqli_fetch_array($querySector))

		  
		  {

 echo '<option value="'.$valoresSector[IdSector].'">'.$valoresSector[SectorFk].'</option>';
}
	?>
      </select>
	  </div>
</div>

</div>

<input class="form-control" type="hidden" id="txtuserMAq" min="1" name="txtuserMAq" value="<?php echo $_SESSION['usuario'];  ?>">
	
	
      <button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>


	  <?php
$NumMaq=$_POST['txtNumMaq'];	
$Maquina=$_POST['txtMaquina'];	
$DiasManteni=$_POST['txtDiasManteni'];	
$ValorMaq=$_POST['txtValorMaq'];
$Modelo=$_POST['txtModelo'];	
$ContactoMaq=$_POST['txtContactoMaq'];	
$ProvedMaq=$_POST['listProvedMaq'];	
$SectorMaq=$_POST['listSector'];

$Fk_Clasi=$_POST['listClasificacion'];	
$imgMaq=$_POST['imagen'];	
$ObsMaq=$_POST['txtObsMaq'];	
$Link=$_POST['txtLink'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/manten/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/manten/".$nombre_imagen);

$ImagenNombre = 'https://interno.comofrasrl.com.ar/sistema/img/manten/'.$nombre_imagen;

if ($ImagenNombre == 'https://interno.comofrasrl.com.ar/sistema/img/manten/') {
    $imgMaq = 'iconoMant.png';
}else {
    $imgMaq = $ImagenNombre;
}


if(!$Maquina==null){
	
echo "<p>"."cargado"."</p>";
$insertarMaquina = "INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '$NumMaq', '$Maquina', '$Modelo', '$Link', '$imgMaq', '$ProvedMaq', '$Fk_Clasi', '$ContactoMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', 'userMAq', '$SectorMaq', 'Si');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarMaquina);
 }		
		
mysqli_close($mysqli);	

	
?>
      </form>

	  <?php

	  ?>

	  
	<div class="col-md-auto">
<?php
include ("../Mantenimiento/ListarMaquinariaFondend.php");

?>
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
	<!--botones DataTables-->
	<!-- <script src="js/dataTables.buttons.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap.js"></script> -->
	<!-- <script src="js/buttons.bootstrap.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap.min.js"></script> -->
	<!--Libreria para exportar Excel-->
	<!-- <script src="js/jszip.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
	<!--Librerias para exportar PDF-->
	<!-- <script src="js/pdfmake.min.js"></script> -->
	<!-- <script src="js/vfs_fonts.js"></script> -->
	<!--Librerias para botones de exportación-->
	<!-- <script src="js/buttons.html5.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script> -->



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