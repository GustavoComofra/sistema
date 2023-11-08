<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Maquinaria</title>
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
	</head>
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
<input type="hidden" name="txtidMaq" id="idMaq">
		<label for="txtNumMaq">NumMaq</label>
    <input class="form-control" type="number" name="txtNumMaq" id="txtNumMaq" placeholder="Numero de Maquina" >

	<label for="txtDiasManteni">Dias de mantenimiento</label>	
	<input class="form-control" type="number" name="txtDiasManteni" id="txtDiasManteni"   min="0"  value="0" >
	
	<label for="txtValorMaq">Valor</label>	
	<input class="form-control" type="number" name="txtValorMaq" id="txtValorMaq" placeholder="Dolar" min="0"  value="0">
</div>
<div class="col">


<label for="txtMaquina">Maquina</label>
    <input class="form-control" type="text" name="txtMaquina" id="txtMaquina" placeholder="Maquinaria" require>

	<label for="txtModelo">Modelo</label>	
	<input class="form-control" type="text" id="txtModelo" name="txtModelo" placeholder="Modelo" >


	<label for="txtContactoMaq">Contacto</label>	
	<input class="form-control" type="text" name="txtContactoMaq" id="txtContactoMaq"  placeholder="Contacto"  >

		</div>

<div class="col">

<label for="listProvedMaq">Proveedor</label>	
<select class="form-control"  name="listProvedMaq" size="1" id="listProvedMaq" required>
        <option value=1>Seleccione Proveedor</option>
        <?php
include("Conexion/conexion.php");
$queryProv = $mysqli -> query ("SELECT * FROM `Proveedor` ORDER BY `Proveedor`.`Proveedor` ASC");
 while ($valoresProv = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresProv[IdProv].'">'.$valoresProv[IdProv].' - '.$valoresProv[Proveedor].'</option>';
}
	?>
      </select>

<label for="listSector">Sector</label>	
<select class="form-control" name="listSector" size="1" id="listSector">
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

<label for="listClasificacion">Clasificacion</label>	
<select class="form-control"  name="listClasificacion" size="1" id="listClasificacion" required>
        <option value=2>Seleccione Clasificacion</option>
        <?php
include("Conexion/conexion.php");
$queryClasi = $mysqli -> query ("SELECT * FROM `Clasificacion` ORDER BY `Clasificacion`.`Clasificacion` ASC");
 while ($valoresClasi = mysqli_fetch_array($queryClasi))
{
echo '<option value="'.$valoresClasi[idClasi].'">'.$valoresClasi[idClasi ].' - '.$valoresClasi[Clasificacion].'</option>';
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
  <input class="form-control" type="file" id="imagen" name="imagen">

</div>

<div class="col">



</div>

</div>

<div class="row">
	<div class="form-floating">
  <textarea class="form-control" placeholder="Observacion" name="txtObsMaq" id="txtObsMaq"></textarea>
  <label for="txtObsMaq">Observacion</label>
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Link de manual" name="txtLink" id="txtLink"></textarea>
  <label for="txtLink">Link</label>

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

<div class="container">
<form action=""  id="formMaquinaria" enctype="multipart/form-data">
		<div id="respuesta"></div>
	<div class="form-group">

<div class="row">
<h3>Buscar</h3>

		<label for="txtNumMaqB">NumMaq</label>
    <input class="form-control" type="number" name="txtNumMaqB" id="txtNumMaqB" placeholder="Numero de Maquina" >

<label for="txtMaquinaB">Maquina</label>
    <input class="form-control" type="text" name="txtMaquinaB" id="txtMaquinaB" placeholder="" require>

	<label for="txtModeloB">Modelo </label>	
	<input class="form-control" type="text" id="txtModeloB" name="txtModeloB" placeholder="" >

	<label for="listClasificacionB">Clasificacion</label>	
<select class="form-control"  name="listClasificacionB" size="1" id="listClasificacionB" required>
        <option value=2>Seleccione Clasificacion a buscar</option>
        <?php
include("Conexion/conexion.php");
$queryClasi = $mysqli -> query ("SELECT * FROM `Clasificacion` ORDER BY `Clasificacion`.`Clasificacion` ASC");
 while ($valoresClasi = mysqli_fetch_array($queryClasi))
{
echo '<option value="'.$valoresClasi[idClasi].'">'.$valoresClasi[idClasi ].' - '.$valoresClasi[Clasificacion].'</option>';
}
	?>
      </select>	  

	  <label for="listSectorB">Sector</label>	
<select class="form-control" name="listSectorB" size="1" id="listSectorB">
        <option value="1">Sector a buscar</option>
        <?php
include("Conexion/conexion.php");
  
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresSector = mysqli_fetch_array($querySector))

		  
		  {

 echo '<option value="'.$valoresSector[IdSector].'">'.$valoresSector[SectorFk].'</option>';
}
	?>
      </select>

	  <label for="listProvedMaqB">Proveedor</label>	
<select class="form-control"  name="listProvedMaqB" size="1" id="listProvedMaqB" required>
        <option value=1>Seleccione Proveedora buscar</option>
        <?php
include("Conexion/conexion.php");
$queryProv = $mysqli -> query ("SELECT * FROM `Proveedor` ORDER BY `Proveedor`.`Proveedor` ASC");
 while ($valoresProv = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresProv[IdProv].'">'.$valoresProv[IdProv].' - '.$valoresProv[Proveedor].'</option>';
}
	?>
      </select>



</div>

    <button type="submit"  type="button" class="btn btn-info"  name="btnBuscar" id="btnBuscar" ><span class="glyphicon glyphicon glyphicon-search"></span> - Buscar</button>

	</div>
	</form>

</div>

<div class="container">
<?php

echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"10\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Clientes</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>NumMaq</B></TD>
<TD><B>Maquina</B></TD>
<TD><B>Modelo</B></TD>
<TD><B>Clasi</B></TD>
<TD><B>Contacto</B></TD>
<TD><B>Sector</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		

$idMaqB=$_POST['txtidMaqB'];
$NumMaqB=$_POST['txtNumMaqB'];	
$MaquinaB=$_POST['txtMaquinaB'];	
$ModeloB=$_POST['txtModeloB'];	
$ProvedMaqB=$_POST['listProvedMaqB'];	
$SectorMaqB=$_POST['listSectorB'];
$Fk_ClasiB=$_POST['listClasificacionB'];	


		
include("Conexion/conexion.php");	
$queryMaquinaB = $mysqli -> query ("SELECT * FROM `VistMaquinaria` WHERE `NumMaq` LIKE '%$NumMaqB%' AND `Maquina` LIKE '%$MaquinaB%' AND `Modelo` LIKE '%$ModeloB%' AND `Clasificacion` LIKE '%$Fk_ClasiB%' AND `SectorFk` LIKE '%$SectorMaqB%'");
  
 while ($filaMaquinaB = mysqli_fetch_array($queryMaquinaB))

{
echo "<TR>\n";
echo "<td>".$filaMaquinaB['idMaq']."</td>\n";
echo "<td>".$filaMaquinaB['NumMaq']."</td>\n";
echo "<td>".$filaMaquinaB['Maquina']."</td>\n";
echo "<td>".$filaMaquinaB['Modelo']."</td>\n";
echo "<td>".$filaMaquinaB['Clasificacion']."</td>\n";	 
echo "<td>".$filaMaquinaB['ContactoMaq	']."</td>\n";
echo "<td>".$filaMaquinaB['SectorFk']."</td>\n";

echo "<td>"."<a href=\"/sistema/FormMaqEditar.php?idMaq=".$filaMaquinaB['idMaq']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormClienBorrar.php?idMaq=".$filaMaquinaB['idMaq']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="appMaq.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>
</html>