<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
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


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
	<div class="container">
  <div class="row">
    <div class="col-4">
	<form action=""  id="formMaquinaria" enctype="multipart/form-data">
		<div id="respuesta"></div>
	<div class="form-group">
<input type="hidden" name="txtidMaq" id="idMaq">
<label for="txtMaquina">Maquinaria</label>
    <input class="form-control" type="text" name="txtMaquina" id="txtMaquina" placeholder="Maquinaria" require>
	<label for="txtModelo">Modelo</label>	
	<input class="form-control" type="text" id="txtModelo" name="txtModelo" placeholder="Modelo" >
	<label for="txtLink">Link</label>	
	<input class="form-control" type="text" id="txtLink" name="txtLink" placeholder="Link Maquinaria" >
	<label for="imagen">Imagen</label>	
	<input type="file" class="form-control-file" name="imagen" id="imagen" >
	<label for="txtImagen">txtImagen</label>	
	<input class="form-control" type="text" id="txtImagen" name="txtLink" >
	<label for="ProvedMaq">Proveedor</label>	
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


	  <label for="Clasificacion">Clasificacion</label>	
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

	  <label for="txtContMaq">Contacto</label>	
	<input class="form-control" type="text" name="txtContMaq" id="txtContMaq"  placeholder="Contacto"  >
	<label for="txtDiasManteni">Dias de mantenimiento</label>	
	<input class="form-control" type="number" name="txtDiasManteni" id="txtDiasManteni"   min="0"  value="0" >
	<label for="txtValorMaq">Valor</label>	
	<input class="form-control" type="number" name="txtValorMaq" id="txtValorMaq" placeholder="Dolar" min="0"  value="0">
	<label for="txtObsMaq">Observacion</label>	
	<textarea name="txtObsMaq" rows="2" cols="50" id="txtObsMaq" title="Observacion" ></textarea>
    <input class="form-control" type="hidden" id="txtuserMAq" min="1" name="txtuserMAq" value="<?php echo $_SESSION['usuario'];  ?>">
   <p>
      <button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>
      </p>

	
      </form>
    </div>


  </div>
  <div class="col-8">
  <form class="d-flex" role="search">
    <input class="form-control me-2" id="search" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-success" type="submit">Buscar</button>
  </form>
  <div class="col-md-7" id="containerListado">
<h3>Listado Maquinarias </h3>

<table class="table table-bordered table-sm ">
	<thead>
		<tr>
			<td>idMaq</td>
			<td>Maquina</td>
			<td>Modelo</td>
			<td>DiasManteni</td>
			<td>Link</td>
            <td>ProvedMaq</td>
            <td>Clasi</td>
            <td>Contacto</td>
            <td>Valor</td>
            <td>Obs</td>
			 <td>imgMaq</td>
			 <td colspan="2" >Opciones</td>
			 
		</tr>
	</thead>
	<tbody id="tb_maquinaria">

	</tbody>
</table>
</div>

<div class="col-md-7" id="containerBuscar">
        <h3>Resultado de busqueda</h3>
        <table class="table table-bordered table-sm ">
            <thead>
                <tr>
				<td>idMaq</td>
			<td>Maquina</td>
			<td>Modelo</td>
			<td>DiasManteni</td>
			<td>Link</td>
            <td>ProvedMaq</td>
            <td>Clasi</td>
            <td>Contacto</td>
            <td>Valor</td>
            <td>Obs</td>
			 <td>imgMaq</td>
			 <td colspan="2" >Opciones</td>
                     
                </tr>
            </thead>
            <tbody id="container">

            </tbody>
        </table>
    </div>

	<?php

//include ("ListarMaqFond.php");


?>
     
    </div>
</div>
    </div>
  </div>
</div>	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="appMaq.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>
</html>