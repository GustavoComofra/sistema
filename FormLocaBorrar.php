<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Borrar Localidad</title>
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
	<?php

$Id_Localidad=$_GET['Id_Localidad'];
echo $Id_Localidad;
$queryLocalidad = $mysqli -> query ("SELECT * FROM `Localidad` WHERE `Id_Localidad` = ".$Id_Localidad.";");

$rowLocalidad = mysqli_fetch_assoc($queryLocalidad);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formBorrar" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Borrar Localidad</label></td>
    </tr>

    <tr>
      <th width="">Id_Localidad :</th>
      <td width=""><input name="txtId_Localidad" type="text" id="txtId_Localidad" size="10" value="<?php print $rowLocalidad['Id_Localidad'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Localidad :</th>
      <td width=""><input name="txtLocalidad" type="text" id="txtLocalidad" size="30" value="<?php print $rowLocalidad['Localidad'];?>"/>
		</td>
    </tr>
    <tr>
      <th width="">CP :</th>
      <td width=""><input name="txtCP" type="text" id="txtCP" size="30" value="<?php print $rowLocalidad['CP'];?>"/>
		</td>
    </tr>
    <tr>
      <th width="">Provincia :</th>
      <td width=""><input name="txtProvincia" type="text" id="txtProvincia" size="30" value="<?php print $rowLocalidad['Provincia'];?>"/>
		
<label>
  <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Borrar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$Id_Localidad=$_POST['txtId_Localidad'];
$Localidad=$_POST['txtLocalidad'];	
$CP=$_POST['txtCP'];	
$Provincia=$_POST['listProvincia'];	
		
if(!$Localidad==null){

include("Conexion/conexion.php");		  

	$BorrarLocalidad = "DELETE FROM `Localidad` WHERE `Localidad`.`Id_Localidad` = '$Id_Localidad'";
	
$ejecutar_Borrar=mysqli_query($mysqli,$BorrarLocalidad);

	echo "<script>
window.location.href = \"/sistema/FormLocaInser.php\";

</script>";			
	
}		
		

mysqli_close($mysqli);
		
?>

	</form>
	
	
		

		

<?php

		
?>
	

    </div>
  </div>
</div>	

	
</body>
</html>