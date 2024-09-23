<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

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
	<title>Estudio a eliminar</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

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
			<div class="col-9 mt-0" style="margin-left: 20px">
	<?php

$IdEstudio=$_GET['IdEstudio'];
echo $IdEstudio;
$Estudio=$_GET['Estudio'];
include("../Conexion/conexion.php");
		
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `IdEstudio` = ".$IdEstudio.";");
	
$rowEstudio = mysqli_fetch_assoc($queryEstudio);

?>	
		


<form action="#" method="post" name="formBorrar" enctype="multipart/form-data">

<div  >
  <table class="table table-hover">
    <tr>
      <td colspan="2"  ><label>Borrar Estudio</label></td>
    </tr>

    <tr>
      <th >IdEstudio :</th>
      <td ><input name="txtIdEstudio" type="text" id="txtIdEstudio" size="10" value="<?php print $rowEstudio['IdEstudio'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th >Estudio :</th>
      <td ><input name="txtEstudio" type="text" id="txtEstudio" size="30" value="<?php print $rowEstudio['Estudio'];?>"/>
		</td>
    </tr>
    <tr>
      <th >Institucion :</th>
      <td ><input name="txtInstitucion" type="text" id="txtInstitucion" size="30" value="<?php print $rowEstudio['Institucion'];?>"/>
		</td>
    </tr>
    <tr>
      <th >Descripcion :</th>
      <td ><input name="txtDescripcion" type="text" id="txtDescripcion" size="30" value="<?php print $rowEstudio['Descripcion'];?>"/>
		
<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Borrar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$IdEstudio=$_POST['txtIdEstudio'];	
$Estudio=$_POST['txtEstudio'];	
$Institucion=$_POST['txtInstitucion'];	
$Descripcion=$_POST['txtDescripcion'];	
		
if(!$Estudio==null){

  include("../Conexion/conexion.php");		  
$BorrarEstudio = "DELETE FROM `ComEstudios` WHERE `ComEstudios`.`IdEstudio` = '$IdEstudio'";

$ejecutar_Borrar=mysqli_query($mysqli,$BorrarEstudio);
echo "<script>
window.location.href = \"/sistema/Rrhh/FormEstudInser.php\";

</script>";			
	
}		

mysqli_close($mysqli);
		
?>

	</form>


    </div>
  </div>
</div>	

	
</body>
</html>