<?php	
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
?>	

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
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Mantenimiento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
.imgEfcListPersonal{
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50% 50%;

}
.Advertencia{
  color: red;
}


</style>
<?php	

include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
  

?>
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



	<?php	
include ("MarcoIzquierdo.php");

?>	

	<div class="container">


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
include("Conexion/conexion.php");
$queryProv = $mysqli -> query ("SELECT * FROM `VistMaquinaria` ORDER BY `Maquina` ASC");
 while ($valoresMaq = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresMaq[idMaq].'">'.$valoresMaq[Maquina].' - '.$valoresMaq[NumMaq].'</option>';
}
	?>
      </select>

	  <label for="listFk_Tipo">Tipo</label>	
<select class="form-control"  name="listFk_Tipo" size="1" id="listFk_Tipo" required>
        <option value=1>Seleccione Tipo</option>
        <?php
include("Conexion/conexion.php");
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
include("Conexion/conexion.php");
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
include("Conexion/conexion.php");
  
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
  

	  <!-- INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '1', 'Maquina', 'Modelo', 'Link', 'imgMaq', '1', '3', 'ContactoMaq', '4', '5.5', 'ObsMaq', 'userMAq', '6', 'Si'); -->

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

// echo "NumMaq ".$NumMaq."<br>";	
// echo "Maquina ".$Maquina."<br>";	
// echo "DiasManteni ".$DiasManteni."<br>";	
// echo "ValorMaq ".$ValorMaq."<br>";
// echo "Modelo ".$Modelo."<br>";
// echo "ContactoMaq ".$ContactoMaq."<br>";	
// echo "ProvedMaq ".$ProvedMaq."<br>";		
// echo "SectorMaq ".$SectorMaq."<br>";
// echo "Fk_Clasi ".$Fk_Clasi."<br>";
// echo "imgMaq ".$imgMaq."<br>";
// echo "ObsMaq ".$ObsMaq."<br>";
// echo "Link ".$Link."<br>";	

if(!$Maquina==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");
$insertarMaquina = "INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '$NumMaq', '$Maquina', '$Modelo', '$Link', '$imgMaq', '$ProvedMaq', '$Fk_Clasi', '$ContactoMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', 'userMAq', '$SectorMaq', 'Si');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarMaquina);
 }		
		
mysqli_close($mysqli);	

	
?>
      </form>

	  <?php

	  ?>
	
  
</div>
<div class="col-md-auto">
<?php
include ("ListarMaquinariaFondend.php");

?>
</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="appMaq.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
</body>
</html>