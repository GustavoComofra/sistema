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
 <title>Proveedor</title>
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
	<form id="app-form" name="formProv" >
	<div id="respuesta"></div>
	<div class="form-group">
	<!-- <label for="IdProv">IdProv</label> -->
    <input class="form-control" type="hidden" id="IdProv">
	<label for="txtProveedor">Proveedor</label>
    <input class="form-control" type="text" id="txtProveedor" placeholder="Proveedor" require>
	<label for="txtDireccion">Direccion</label>	
	<input class="form-control" type="text" id="txtDireccion" placeholder="Direccion" >
	<label for="listFk_Localidad">Localidad</label>	
	<select class="form-control"  size="1" id="listFk_Localidad" required>
	<option value=2>Monte Buey</option>
        <?php

include("Conexion/conexion.php");
  
$queryLocalidad = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad))

		  
		  {

 echo '<option value="'.$valoresLocalidad[Id_Localidad].'">'.$valoresLocalidad[Localidad].'</option>';
}


	?>
      </select>

	  <label for="listProvincia">Provincia</label>	
	<select class="form-control"  size="1" id="listProvincia" required>
	<option value=9>Cordoba</option>
        <?php

include("Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia[Id_Provincia].'">'.$valoresProvincia[Provincia].'</option>';
}


	?>
      </select>


	 <label for="txtTelefono">Telefono</label>	
	<input class="form-control" type="text" id="txtTelefono"  placeholder="Telefono"  >
	<label for="txtEmail">Email</label>	
	<input class="form-control" type="email" id="txtEmail"  placeholder="Email">
	<label for="txtContacto">Contacto</label>	
	<input class="form-control" type="text" id="txtContacto"  placeholder="Contacto"  >
	<label for="txtActivo">Activo</label>	
	<select id="txtActivo">
		<option value="Si" selected>Si</option>
		<option value="No" >No</option>
	</select>
	<label for="txtObsProv">Observacion</label>	
	<textarea rows="2" cols="50" id="txtObsProv" title="Observacion" ></textarea>
   
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
<h3>Listado Proveedores</h3>

<table class="table table-bordered table-sm ">
	<thead>
		<tr>
			<td>IdProv</td>
			<td>Proveedor</td>
			<td>Direccion</td>
			<td>Localidad</td>
			<td>Provincia</td>
			 <td>Telefono</td>
			 <td>Email</td>
			<td>Contacto</td>
			<td>Activo</td>
			 <td>ObsProv</td>

			 <td colspan="2" >Opciones</td>
			 
		</tr>
	</thead>
	<tbody id="tb_proveedor">

	</tbody>
</table>
</div>

<div class="col-md-7" id="containerBuscar">
        <h3>Resultado de busqueda</h3>
        <table class="table table-bordered table-sm ">
            <thead>
                <tr>
			<td>IdProv</td>
			<td>Proveedor</td>
			<td>Direccion</td>
			<td>Localidad</td>
			<td>Provincia</td>
			 <td>Telefono</td>
			 <td>Email</td>
			<td>Contacto</td>
			<td>Activo</td>
			 <td>ObsProv</td>
                     
                </tr>
            </thead>
            <tbody id="container">

            </tbody>
        </table>
    </div>

     
    </div>
</div>
    </div>
  </div>
</div>	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="appProv.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>
</html>