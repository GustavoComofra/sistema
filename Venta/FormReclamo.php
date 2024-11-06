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


<title>Reclamo</title>
<body>
	
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
	</div>
	
	<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

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
			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">

<form action="/sistema/Venta/insertarReclamo.php" method="post" name="formReclamo" enctype="multipart/form-data">
<div class="form-group">
<div class="row border border-1">
    <div class="col">
	<h1 style="text-align: center;">  Formulario Reclamo - 
	N° <?php
include("../Conexion/conexion.php");
$queryNumRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `ComReclamo`.`NumReclamo` DESC LIMIT 1");
 while ($valoresNumRecl = mysqli_fetch_array($queryNumRecl))
{
$varNumRecl = $valoresNumRecl['NumReclamo']+1;
 echo $varNumRecl;
}		  
	?>
	</h1>
    </div>
  </div>
  <div class="row border border-1">
    <div class="col-4">
    <label for="SelectCarga">Pre carga:</label>	
    <select class="form-select"  id="SelectCarga" onclick="obtenerSeleccion()" >

  <option value=1>Pre Carga Reclamo</option>
  <option value=2>Carga completa del Reclamo</option>
  <option value=3>Carga respuesta de Calidad</option>
  </select>
	</div>
	<div class="col-2">
	<label for="listRequiereAsistencia">Requiere Asistencia:</label>	
	<select class="form-select" name="listRequiereAsistencia" size="1" id="listRequiereAsistencia">
	 <option>Si</option>
	 <option selected="selected">No</option>
	 </select>
</div>
<div class="col-2">
<label for="SelectPrioridad" >Prioridad:</label>	
	<select class="form-select" id="SelectPrioridad" name="SelectPrioridad">
  <option value="Alta" selected>Alta</option>
  <option value="Media">Media</option>
  <option value="Baja">Baja</option>
  </select>
</div>
<div class="col-2">
	<label for="txtFecha">Fecha <strong style="color:red;">*</strong></label>	
  <input class="form-control" name="txtFecha" type="date" id="txtFecha" size="50"value="<?php 
$fecha_actual = date("Y-m-d");
$varFechaInicial = date("Y-m-d",strtotime($fecha_actual));
echo $varFechaInicial;
  ?>"/>
    </div>

    <div class="col-2">
    <label for="txtFechaFinal">Fecha finalizado</label>	  
<input class="form-control" name="txtFechaFinal" type="date" id="txtFechaFinal" size="50" value="<?php 
$fecha_actual = date("Y-m-d");
$varFechaFinal = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
echo $varFechaFinal;
  ?>"/>
    </div>

  </div>

  <div class="row border border-1">
    <div class="col-4">
<label for="listTipoReclamo"><p>Tipo Reclamo <strong style="color:red;">*</strong></p></label>	
<select class="form-select" name="listTipoReclamo" size="1" id="listTipoReclamo" required>
<option value=1 >Seleccione reclamo</option>
        <?php
include("../Conexion/conexion.php");
$queryTipoReclamo = $mysqli -> query ("SELECT * FROM `ComTipoRecla` ORDER BY `ComTipoRecla`.`TipoReclamo` ASC");
 while ($valoresTipoReclamo = mysqli_fetch_array($queryTipoReclamo))
{
 echo '<option value="'.$valoresTipoReclamo['Id_TipoRecla'].'">'.$valoresTipoReclamo['TipoReclamo'].'</option>';
}
	?>
      </select>
    </div>
    <div class="col-8">
	<div class="form-floating">
<textarea class="form-control" placeholder="Respuesta Evalucion" name="txtReclamo" id="txtReclamo" style="height: 100%"></textarea>
<label for="txtReclamo">Nombre de reclamo</label>
	</div>
  </div>
  </div>


  <div class="row border border-1">
    <div class="col-4">
<label for="listIdConce">Consecionaria:<strong style="color:red;">*</strong></label>	
<select class="form-select" name="listIdConce" id="listIdConce">
<option value=3>Seleccione Consecionaria:</option>
        <?php
include("../Conexion/conexion.php");
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComConcesionario` ORDER BY `ComConcesionario`.`Concesionario` ASC");
while ($valoresIdConce = mysqli_fetch_array($queryIdConce))
{
echo '<option value="'.$valoresIdConce['id_Conce'].'">'.$valoresIdConce['Concesionario'].'</option>';
}
		?>
</select>	
    </div>
    <div class="col-4">
	<label for="listIdCliente">Cliente:<strong style="color:red;">*</strong></label>	
      <select class="form-select" name="listIdCliente" id="listIdCliente" required>
        <option value=6>Seleccione Cliente:</option>
        <?php
include("../Conexion/conexion.php");
  $queryIdCliente = $mysqli -> query ("SELECT * FROM `ComCliente` ORDER BY `ComCliente`.`Cliente` ASC");
 while ($valoresIdCliente = mysqli_fetch_array($queryIdCliente))
{
 echo '<option value="'.$valoresIdCliente['Id_Cliente'].'">'.$valoresIdCliente['Cliente'].'</option>';
}
	    ?>
      </select>
    </div>
    <div class="col-4">
<label for="listIdRepacion">Reparacion:<strong style="color:red;">*</strong></label>	
	<select class="form-select" name="listIdRepacion" id="listIdRepacion" required>
<option value=1>Seleccione Repacion</option>
        <?php
include("../Conexion/conexion.php");
$queryIdRepacion = $mysqli -> query ("SELECT * FROM `ComReparacion` ORDER BY `ComReparacion`.`Reparacion` ASC");
while ($valoresIdRepacion = mysqli_fetch_array($queryIdRepacion))
{
echo '<option value="'.$valoresIdRepacion['Id_Reparacion'].'">'.$valoresIdRepacion['Reparacion'].'</option>';
}
	    ?>
    </select>
    </div>
  </div>

  <div class="row border border-1">
    <div class="col-12">
	<div class="form-floating">
<textarea class="form-control" placeholder="Descripcion:" name="txtDescripcion" id="txtDescripcion" style="height: 100%"></textarea>
<label for="txtDescripcion">Descripcion:</label>
	</div>
	</div>
  </div>

  <div class="row border border-1">
    <div class="col-4">
<label for="listImplemento"><p>Implemento:<strong style="color:red;">*</strong></p></label>	
<select class="form-select" name="listImplemento" size="1" id="listImplemento" required>
<option value=16>Seleccione </option>
        <?php
include("../Conexion/conexion.php");
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComImplemento` ORDER BY `ComImplemento`.`Implemento` ASC");
while ($valoresIdConce = mysqli_fetch_array($queryIdConce))
{
echo '<option value="'.$valoresIdConce['Id_Implemento'].'">'.$valoresIdConce['Implemento'].'</option>';
}
		?>
</select>
    </div>
    <div class="col-4">
<label for="txtChasis"><p>Chasis:</p></label>	      
<input class="form-control" name="txtChasis" type="number" id="txtChasis" title="Chasis" style="width: 100%" />
    </div>
    <div class="col-4">
<label for="txtSerie"><p>Serie:</p></label>	      
<input class="form-control" name="txtSerie" type="number" id="txtSerie" title="Serie" style="width: 100%"/>
    </div>
  </div>
  
  <div style="display: none;" id="VistaOculta2"><!-- Inicio VistaOculta2 -->
  <div class="row border border-1">
    <div class="col-12">
<?php	
include ("FormFallaRecla.php");		
?>		
  </div>
  </div>

  <div class="row border border-1">
  <label for="fileImagen"><p>imagenes de problema:</p></label>	
    <div class="col-6">
 
	<p>
      <input class="form-group" type="file" name="imagen" id="imagen">
	  <input class="form-group" type="file" name="imagen1" id="imagen1">
	  </p>
	  </div>
	  <div class="col-6">
	  <p> 
	  <input class="form-group" type="file" name="imagen2" id="imagen2">
	  <input class="form-group" type="file" name="imagen3" id="imagen3">
    </p>
    </div>
  </div>
  </div><!-- Final VistaOculta2 -->


  <div style="display: none;" id="VistaOculta3"><!-- Inicio VistaOculta3 -->


  <div class="row border border-1">
    <div class="col">
	<div class="form-floating">
  <textarea class="form-control" name="txtAnalisisCausa" placeholder="Analisis Causa" id="txtAnalisisCausa"></textarea>
  <label for="txtAnalisisCausa">Analisis Causa</label>
	</div>	
    </div>
  </div>

  <div class="row border border-1">
    <div class="col">
	<div class="form-floating">
  <textarea class="form-control" name="txtRespAccion" placeholder="Analisis Causa" id="txtRespAccion"></textarea>
  <label for="txtRespAccion">Respuesta de Accion</label>
	</div>	
    </div>
  </div>

  <div class="row border border-1">
  <label for="txtImagenSolu"><p>imagen solucion:</p></label>	 
    <div class="col">

<p>
<input class="form-group" type="file" name="imagenSolu" id="imagen">
<input class="form-group" type="file" name="imagenSolu1" id="imagenSolu1">
</p>
    </div>
<div class="col">
<p>
<input class="form-group" type="file" name="imagenSolu2" id="imagenSolu2">
<input class="form-group" type="file" name="imagenSolu3" id="iImagenSolu3">
</p>
    </div>
  </div>

  <div class="row border border-1">
    <div class="col">
		<div class="form-floating">
<textarea class="form-control" placeholder="Evaluacion Eficaz" id="txtEvalEfica"></textarea>
<label for="txtEvalEfica">Evaluacion Eficaz</label>
	 	</div>
    </div>
  </div>

  <div class="row border border-1">
    <div class="col">
		<div class="form-floating">
<textarea class="form-control" placeholder="Respuesta Evalucion" id="txtRespEvaluc"></textarea>
<label for="txtRespEvaluc">Respuesta Evalucion</label>
		</div>
    </div>
  </div>

  <div class="row border border-1">
    <div class="col">
<label for="txtFechaCierre"><p>Fecha Cierre</label>		  
<input name="txtFechaCierre" type="date" id="txtFechaCierre" size="50" value="" />
    </div>
    <div class="col">

    </div>
    <div class="col">
      
    </div>
  </div>

  </div><!-- Final VistaOculta3 -->

<div class="row border border-1">
    <div class="col">
	<div class="d-grid gap-2">
<button type="submit" class="btn btn-primary" tname="btnEnviar" id="btnEnviar" >Cargar</button>
	</div>
    </div>
  </div>
</div>
	  </form>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>	
	
<script type="text/javascript" src="jsReclamo.js"></script>
<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script> 

</body>
</html>