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


<title>Cliente</title>
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
	$Id_FallaRecl=$_GET['Id_FallaRecl'];
//echo $Id_FallaRecl; 
$queryReclamoItem = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Id_FallaRecl` = ".$Id_FallaRecl.";");

$rowReclamoItem = mysqli_fetch_assoc($queryReclamoItem);

	?>			

<form action="#" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group"  >
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="3"  ><label for="txtFalla">Falla</label></td>
    </tr>
    <tr>
	<td width="156">Num</td>	
	<td width="156">Id</td>
    <td width="156">Falla</td>
    <td width="353">Detalle</td>
    </tr>
    <tr>
		<td><input name="txtFk_NumRecl" type="text" id="txtFk_NumRecl" title="Fk_NumRecl" size="10" value="<?php print $rowReclamoItem['Fk_NumRecl'];?>" /></td>
		<td><input name="txtId_FallaRecl" type="text" id="txtId_FallaRecl" title="Id_FallaRecl" size="10" value="<?php print $rowReclamoItem['Id_FallaRecl'];?>" /></td>
      <td><select name="listFalla" size="1" id="listFalla">
     <option value="<?php print $rowReclamoItem['Id_FallaRecl'];?>"><?php print $rowReclamoItem['ItemFalla'];?></option>
        <?php
include("../Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` ORDER BY `ComItemFalla`.`ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  {

 echo '<option value="'.$valores['Id_ItemFalla'].'">'.$valores['ItemFalla'].'</option>';

}
		  mysqli_close($mysqli);

	?>
		  
	  
      </select></td>

      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50" value="<?php print $rowReclamoItem['Detalle'];?>" />

		</td>
    </tr>
	 <tr> 
	  
  <td>		
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar"  />

		</td>

      <td>&nbsp;</td>
    </tr>	

  </table>
	 
</div>
</form>

<?php
	
$Id_FallaRecl=$_POST['txtId_FallaRecl'];	
$Fk_NumRecl=$_POST['txtFk_NumRecl'];		
$Falla=$_POST['listFalla'];	
$Detalle=$_POST['txtDetalle'];	

if(!$Falla==null){
	
	echo "<h1>"."<a href=\"/sistema/Venta/FormReclamoEditar.php?NumReclamo=".$Fk_NumRecl."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("../Conexion/conexion.php");	

$EditarRegistro = "UPDATE `ComFallaRecl` SET `Falla` = '$Falla', `Detalle` = '$Detalle' WHERE `ComFallaRecl`.`Id_FallaRecl` = 25";

$ejecutar_EditarRegistro=mysqli_query($mysqli,$EditarRegistro);

}	

mysqli_close($mysqli);
		
?>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>
    </div>
  </div>
</div>	

	
</body>
</html>