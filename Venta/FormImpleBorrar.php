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


<title>Borrar Implemento</title>
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
	$Id_Implemento=$_GET['Id_Implemento'];
echo $Id_Implemento; 
$queryImplemento = $mysqli -> query ("SELECT * FROM `ComImplemento` WHERE `Id_Implemento` = ".$Id_Implemento.";");

$rowImplemento = mysqli_fetch_assoc($queryImplemento);
				
?>			
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formImplementos" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
	  	  
    <tr>
      <td colspan="2"  ><label>Implementos</label></td>
    </tr>

    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_Implemento" type="text" id="txtId_Implemento" size="50" value="<?php print $rowImplemento['Id_Implemento'];?>"  />
		</td>
    </tr>
	  	  
	  
    <tr>
      <th width="">Implemento:</th>
      <td width=""><input name="txtImplemento" type="text" id="txtImplemento" size="50" value="<?php print $rowImplemento['Implemento'];?>"  />
		</td>
    </tr>
	  
    <tr>
      <th width="">Numero implemento en CMG:</th>
      <td width=""><input name="NumNumImpl" type="numb" id="NumNumImpl" size="50" value="<?php print $rowImplemento['NumImpl'];?>"/>
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
	
$Id_Implemento=$_POST['txtId_Implemento'];
$Implemento=$_POST['txtImplemento'];
$NumImpl=$_POST['NumNumImpl'];
$Familia=$_POST['listFamilia'];	
$SubFamilia=$_POST['listSubFamilia'];	
$Descripcion=$_POST['txtDescripcion'];	

		
if(!$Implemento==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");
$BorrarImplemento = "DELETE FROM `ComImplemento` WHERE `ComImplemento`.`Id_Implemento` = ".$Id_Implemento.";";

$ejecutar_insertar=mysqli_query($mysqli,$BorrarImplemento);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>
	
</body>
</html>