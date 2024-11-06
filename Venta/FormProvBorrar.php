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


<title>Borrar Provincia</title>
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

$Id_Provincia=$_GET['Id_Provincia'];
echo $Id_Provincia; 
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` WHERE `Id_Provincia` = ".$Id_Provincia.";");

$rowProvincia = mysqli_fetch_assoc($queryProvincia);

?>	

    <div class="col-md-auto">

<form action="#" method="post" name="formBorrar" enctype="multipart/form-data">

<div  >
  <table width=""   >
    <tr>
      <td colspan="2"  ><label>Borrar Provincia</label></td>
    </tr>

    <tr>
      <th width="">Id_Provincia :</th>
      <td width=""><input name="txtId_Provincia" type="text" id="txtId_Provincia" size="10" value="<?php print $rowProvincia['Id_Provincia'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Provincia :</th>
      <td width=""><input name="txtProvincia" type="text" id="txtProvincia" size="30" value="<?php print $rowProvincia['Provincia'];?>"/>
		</td>
    </tr>
   
    <tr>
     
      <td width="">
<label>
  <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Borrar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$Id_Provincia=$_POST['txtId_Provincia'];	
$Provincia=$_POST['txtProvincia'];	

		
if(!$Provincia==null){

include("../Conexion/conexion.php");		  
$BorrarProvincia = "UPDATE `Provincia` SET `Borrar` = 'Si' WHERE `Provincia`.`Id_Provincia` = '$Id_Provincia';";
$ejecutar_Borrar=mysqli_query($mysqli,$BorrarProvincia);

echo "<script>
window.location.href = \"/sistema/FormProvInser.php\";

</script>";			
	
}		
		

mysqli_close($mysqli);
		
?>

	</form>
			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	
</body>
</html>