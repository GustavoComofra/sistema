<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Borrar Provincia</title>
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

$Id_Provincia=$_GET['Id_Provincia'];
echo $Id_Provincia; 
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` WHERE `Id_Provincia` = ".$Id_Provincia.";");

$rowProvincia = mysqli_fetch_assoc($queryProvincia);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formBorrar" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Borrar Provincia</label></td>
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

include("Conexion/conexion.php");		  
$BorrarProvincia = "UPDATE `Provincia` SET `Borrar` = 'Si' WHERE `Provincia`.`Id_Provincia` = '$Id_Provincia';";
$ejecutar_Borrar=mysqli_query($mysqli,$BorrarProvincia);

echo "<script>
window.location.href = \"/sistema/FormProvInser.php\";

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