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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../layout/script/js/Archivo.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../layout/estilos/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link href="../img/Icono.png" rel="icon" type="image/png">
	<?php
include("../layout/header/header.php");
session_start();
$u = $_POST['txtUsuario'];
	?>
 <title>Maquinaria</title>
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
include("../Conexion/conexion.php");

	$idMaq=$_GET['idMaq'];

$queryItemEditar = $mysqli -> query ("SELECT * FROM `Maquinaria` WHERE `idMaq` = ".$idMaq.";");

$rowItemEditar = mysqli_fetch_assoc($queryItemEditar);
		?>

	<div class="container">


	<form action="#" method="post" name="formMaquinaria" enctype="multipart/form-data">
		<div id="respuesta"></div>
	<div class="form-group">

<div class="row">
<div class="col-2">
<input type="text" name="txtidMaq" id="idMaq" value="<?php print $rowItemEditar['idMaq'];?>">
		<label for="txtNumMaq">NumMaq</label>
    <input class="form-control" type="number" name="txtNumMaq" id="txtNumMaq" value="<?php print $rowItemEditar['NumMaq'];?>" >

	<label for="txtDiasManteni">Dias de mantenimiento</label>	
	<input class="form-control" type="number" name="txtDiasManteni" id="txtDiasManteni"   min="0"  value="<?php print $rowItemEditar['DiasManteni'];?>" >
	
	<label for="txtValorMaq">Valor</label>	
	<input class="form-control" type="number" name="txtValorMaq" id="txtValorMaq" value="<?php print $rowItemEditar['ValorMaq'];?>">
</div>
<div class="col">


<label for="txtMaquina">Maquina</label>
    <input class="form-control" type="text" name="txtMaquina" id="txtMaquina" value="<?php print $rowItemEditar['Maquina'];?>">

	<label for="txtModelo">Modelo</label>	
	<input class="form-control" type="text" id="txtModelo" name="txtModelo" value="<?php print $rowItemEditar['Modelo'];?>" >


	<label for="txtContactoMaq">Contacto</label>	
	<input class="form-control" type="text" name="txtContactoMaq" id="txtContactoMaq"  value="<?php print $rowItemEditar['ContactoMaq'];?>"  >

		</div>

<div class="col">

<label for="listProvedMaq">Proveedor</label>	
<select class="form-control"  name="listProvedMaq" size="1" id="listProvedMaq" required>
        <option value="<?php print $rowItemEditar['ProvedMaq'];?>" ><?php print $rowItemEditar['ProvedMaq'];?></option>
        <?php
include("Conexion/conexion.php");
$queryProv = $mysqli -> query ("SELECT * FROM `Proveedor` ORDER BY `Proveedor`.`Proveedor` ASC");
 while ($valoresProv = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresProv['IdProv'].'">'.$valoresProv['IdProv'].' - '.$valoresProv['Proveedor'].'</option>';
}
	?>
      </select>

<label for="listSector">Sector</label>	
<select class="form-control" name="listSector" size="1" id="listSector">
        <option value="<?php print $rowItemEditar['SectorMaq'];?>"><?php print $rowItemEditar['SectorMaq'];?></option>
        <?php
include("Conexion/conexion.php");
  
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresSector = mysqli_fetch_array($querySector))

		  
		  {

 echo '<option value="'.$valoresSector['IdSector'].'">'.$valoresSector['SectorFk'].'</option>';
}
	?>
      </select>

<label for="listClasificacion">Clasificacion</label>	
<select class="form-control"  name="listClasificacion" size="1" id="listClasificacion" >
        <option value="<?php print $rowItemEditar['Fk_Clasi'];?>"><?php print $rowItemEditar['Fk_Clasi'];?></option>
        <?php
include("Conexion/conexion.php");
$queryClasi = $mysqli -> query ("SELECT * FROM `Clasificacion` ORDER BY `Clasificacion`.`Clasificacion` ASC");
 while ($valoresClasi = mysqli_fetch_array($queryClasi))
{
echo '<option value="'.$valoresClasi['idClasi'].'">'.$valoresClasi['idClasi'].' - '.$valoresClasi['Clasificacion'].'</option>';
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
<label for="imagen" class="form-label">Imagen</label>
<img src='<?php print $rowItemEditar['imgMaq'];?>' alt='BtnIconoVer' width='20' height='20'>

</div>

<div class="col">



</div>

</div>

<div class="row">
	<div class="form-floating">
  <textarea class="form-control" placeholder="Observacion" name="txtObsMaq" id="txtObsMaq"> <?php print $rowItemEditar['ObsMaq'];?></textarea>
  <label for="txtObsMaq">Observacion</label>
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Link de manual" name="txtLink" id="txtLink"><?php print $rowItemEditar['Link'];?></textarea>
  <label for="txtLink">Link</label>

</div>

</div>

<input class="form-control" type="hidden" id="txtuserMAq" min="1" name="txtuserMAq" value="<?php echo $_SESSION['usuario'];  ?>">
	
	
      <button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Editar</button>
  

	  <!-- INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '1', 'Maquina', 'Modelo', 'Link', 'imgMaq', '1', '3', 'ContactoMaq', '4', '5.5', 'ObsMaq', 'userMAq', '6', 'Si'); -->

	  <?php
	  $idMaq=$_POST['txtidMaq'];
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
	
	echo "<h2>"."<a href=\"/sistema/Mantenimiento/Maquinaria.php\">Editado Volver?</a>"."</h2>";
include("Conexion/conexion.php");
$EditarMaquina = "UPDATE `Maquinaria` SET `NumMaq` = '$NumMaq', `Maquina` = '$Maquina', `Modelo` = '$Modelo', `Link` = '$Link', `ProvedMaq` = '$ProvedMaq', `Fk_Clasi` = '$Fk_Clasi', `DiasManteni` = '$DiasManteni', `ValorMaq` = '$ValorMa', `ObsMaq` = '$ObsMaq', `SectorMaq` = '$SectorMaq' WHERE `Maquinaria`.`idMaq` = '$idMaq';";

$ejecutar_insertar=mysqli_query($mysqli,$EditarMaquina);
 }		
		
mysqli_close($mysqli);	

	
?>
      </form>

	  <?php

	  ?>
	
  
</div>

</body>
</html>