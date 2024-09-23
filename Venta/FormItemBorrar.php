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
	$Id_ItemFalla=$_GET['Id_ItemFalla'];
echo $Id_ItemFalla; 
$queryItemFalla = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `Id_ItemFalla` = ".$Id_ItemFalla.";");

$rowItemFalla = mysqli_fetch_assoc($queryItemFalla);
		?>
		
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formItemsFalla" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Items Falla</label></td>
    </tr>
	  
    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_ItemFalla" type="text" id="txtId_ItemFalla" size="50" value="<?php print $rowItemFalla['Id_ItemFalla'];?>"/>
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Item:</th>
      <td width=""><input name="txtItemFalla" type="text" id="txtItemFalla" size="50" value="<?php print $rowItemFalla['ItemFalla'];?>"/>
		</td>
    </tr>
	  
	  
	<tr>
	<td>
		<label>
     <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	
		
		 </tr>

	</table>
	</div>

<hr>

<?php
$Id_ItemFalla=$_POST['txtId_ItemFalla'];	
$ItemFalla=$_POST['txtItemFalla'];	
$TipoFallaRecl=$_POST['listFkTipoFalla'];	

		
if(!$ItemFalla==null){
	
echo "<h1>"."Borrado"."</h1>";
include("../Conexion/conexion.php");

	
$insertarItemFalla = "UPDATE `ComItemFalla` SET `Susp` = 'Si' WHERE `ComItemFalla`.`Id_ItemFalla` = ".$Id_ItemFalla.";";	

$ejecutar_insertar=mysqli_query($mysqli,$insertarItemFalla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	
</body>
</html>