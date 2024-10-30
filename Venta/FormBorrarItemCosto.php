<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

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


<title>Borrar item de costo</title>
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
include("../Conexion/conexion.php");		
	$IdCosto=$_GET['IdCosto'];
//echo $Id_CostoRecl; 
$queryBorrarCosto = $mysqli -> query ("SELECT * FROM `CostoReclamo` WHERE `IdCosto` = ".$IdCosto.";");

$rowBorrarCosto = mysqli_fetch_assoc($queryBorrarCosto);

	?>			
	
<form action="#" method="post" name="formFallaCosto" enctype="multipart/form-data">

<div class="form-group"  >
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="8"  ><label for="txtCosto">Borrar Costo de reclamo</label></td>
    </tr>
    <tr>
	<td width="156">Num</td>	
	<td width="156">Id</td>
    <td width="156">Cantidad</td>
    <td width="353">Detalle</td>
	</tr>

    <tr>
		<td><input name="txtFk_Num_Recl_Cost" type="text" id="txtFk_Num_Recl_Cost" title="Fk_Num_Recl_Cost" size="10" value="<?php print $rowBorrarCosto['Fk_Num_Recl_Cost'];?>" /></td>
		<td><input name="txtIdCosto" type="text" id="txtIdCosto" title="IdCosto" size="10" value="<?php print $rowBorrarCosto['IdCosto'];?>" /></td>
		<td><input name="txtCantidad" type="number" id="txtCantidad" title="Cantidad" size="10" value="<?php print $rowBorrarCosto['Cantidad'];?>" /></td>
      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50" value="<?php print $rowBorrarCosto['Detalle'];?>" /></td>
	  </tr>
	  <tr>
	<td width="156">Pesos</td>
    <td width="156">Dolar</td>
	<td width="156">Chasis</td>
    <td width="353">Observacion</td>
    </tr>
	<tr>
	  <td><input name="txtPesos" type="number" id="txtPesos" title="Pesos" size="10" value="<?php print $rowBorrarCosto['Pesos'];?>" /></td>
	  <td><input name="txtDolar" type="number" id="txtDolar" title="Dolar" size="10" value="<?php print $rowBorrarCosto['Dolar'];?>" /></td>
	  <td><input name="txtFk_Chasis" type="number" id="txtFk_Chasis" title="Fk_Chasis" size="10" value="<?php print $rowBorrarCosto['Fk_Chasis'];?>" /></td>
	  <td><input name="txtObservacion" type="text" id="txtObservacion" title="Observacion" size="50" value="<?php print $rowBorrarCosto['Observacion'];?>" /></td>
    </tr>
	 <tr> 
	  
  <td>		
        <input type="submit" class="btn btn-danger" name="btnBorrar" id="btnBorrar" value="Borrar"  />
	  

		</td>

      <td>&nbsp;</td>
    </tr>	

	  
  </table>
	 

</div>
</form>

<?php
	
$IdCosto =$_POST['txtIdCosto'];	
$Fk_Num_Recl_Cost=$_POST['txtFk_Num_Recl_Cost'];		
$Cantidad=$_POST['txtCantidad'];	
$Pesos=$_POST['txtPesos'];	
$Dolar=$_POST['txtDolar'];	
$Fk_Chasis=$_POST['txtFk_Chasis'];	
$Observacion=$_POST['Observacion'];

$Detalle=$_POST['txtDetalle'];	

if(!$Fk_Num_Recl_Cost==null){
	
	echo "<h1>"."<a href=\"../sistema/Venta/FormReclamoEditar.php?NumReclamo=".$Fk_Num_Recl_Cost."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("../Conexion/conexion.php");	

$BorrarRegistro = "DELETE FROM CostoReclamo WHERE `CostoReclamo`.`IdCosto` = '$IdCosto'";


$ejecutar_BorrarRegistro=mysqli_query($mysqli,$BorrarRegistro);
	
}	

mysqli_close($mysqli);
		
?>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	
</body>
</html>