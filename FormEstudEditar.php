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
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>Estudios</title>
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

$IdEstudio=$_GET['IdEstudio'];
echo $IdEstudio;	
include("Conexion/conexion.php");	
		
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `IdEstudio` = ".$IdEstudio.";");
	
$rowEstudio = mysqli_fetch_assoc($queryEstudio);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formEstudio" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Editar Estudio</label></td>
    </tr>

    <tr>
      <th width="">IdEstudio :</th>
      <td width=""><input name="txtIdEstudio" type="text" id="txtIdEstudio" size="10" value="<?php print $rowEstudio['IdEstudio'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Estudio :</th>
      <td width=""><input name="txtEstudio" type="text" id="txtEstudio" size="30" value="<?php print $rowEstudio['Estudio'];?>"/>
		</td>
    </tr>
    <tr>
      <th width="">Institucion :</th>
      <td width=""><input name="txtInstitucion" type="text" id="txtInstitucion" size="30" value="<?php print $rowEstudio['Institucion'];?>"/>
		</td>
    </tr>
    <tr>
      <th width="">Descripcion :</th>
      <td width=""><input name="txtDescripcion" type="text" id="txtDescripcion" size="30" value="<?php print $rowEstudio['Descripcion'];?>"/>
		
<label>
  <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Editar" />
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

include("Conexion/conexion.php");		  
$EditarEstudio = "UPDATE `ComEstudios` SET `Estudio` = '$Estudio', `Institucion` = '$Institucion', `Descripcion` = '$Descripcion' WHERE `ComEstudios`.`IdEstudio` = '$IdEstudio';";

$ejecutar_Editar=mysqli_query($mysqli,$EditarEstudio);
}		
		
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Estudio editado</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Estudio</B></TD>
<TD><B>Institucion</B></TD>
<TD><B>Descripcion</B></TD>
</TR>
";		

include("Conexion/conexion.php");	
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `IdEstudio` = ".$IdEstudio.";");
  
 while ($filaEstudio = mysqli_fetch_array($queryEstudio))

{
echo "<TR>\n";
echo "<td>".$filaEstudio['IdEstudio']."</td>\n";
echo "<td>".$filaEstudio['Estudio']."</td>\n";
echo "<td>".$filaEstudio['Institucion']."</td>\n";
echo "<td>".$filaEstudio['Descripcion']."</td>\n";
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
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