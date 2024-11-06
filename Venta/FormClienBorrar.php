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


<title>Borrar Cliente</title>
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
<?php
	$Id_Cliente=$_GET['Id_Cliente'];
//echo $Id_Cliente; 
$queryCliente = $mysqli -> query ("SELECT * FROM `ComCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";");

$rowCliente = mysqli_fetch_assoc($queryCliente);
		?>
				
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formBorraCliente" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Cliente</label></td>
    </tr>
    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_Cliente" type="text" id="txtId_Cliente" size="50" value="<?php print $rowCliente['Id_Cliente'];?>"/>
		</td>
    </tr>	  
    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="50" value="<?php print $rowCliente['Cliente'];?>"/>
		</td>
    </tr>
    	
	  
    <tr>
      <th width="">Contacto:</th>
      <td width=""><input name="txtContacto" type="text" id="txtContacto" size="50" value="<?php print $rowCliente['Contacto'];?>" />
		</td>
    </tr>	  
	  
	<tr>
	<td>
		<label>
       <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	  
	  

      </select>
		
		</td>
    </tr> 
	</table>
	</div>

<hr>

<?php
$Id_Cliente=$_POST['txtId_Cliente'];	
$Cliente=$_POST['txtCliente'];	
$Direccion=$_POST['txtDireccion'];	
$Localidad=$_POST['listLocalidad'];	
$Provincia=$_POST['listProvincia'];	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];		
$Contacto=$_POST['txtContacto'];
		
if(!$Cliente==null){
	

	echo "<h1>"."<a href=\"/sistema/Venta/FormClienInser.php\">Borrado Volver?</a>"."</h1>";
include("../Conexion/conexion.php");

$Borrar = "DELETE FROM `ComCliente` WHERE `ComCliente`.`Id_Cliente` = ".$Id_Cliente.";";

$ejecutar_insertar=mysqli_query($mysqli,$Borrar);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>


			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	
</body>
</html>