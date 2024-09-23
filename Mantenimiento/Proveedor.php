<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

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
		/*session_start();
$u = $_POST['txtUsuario']; */

		?>
	</div>
	<?php
	/*
session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
	*/
	?>



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

<script src="https://interno.comofrasrl.com.ar/sistema/Mantenimiento/script/appMaq.js"></script>
<script src="https://interno.comofrasrl.com.ar/sistema/Mantenimiento/script/appProv.js"></script>
</body>
</html>