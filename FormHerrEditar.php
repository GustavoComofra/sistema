<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Editar herramientas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<script type="text/javascript">
function volverherr()
{
	window.location.href = "/sistema/FormHerramientas.php";
}


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

$id_herr=$_GET['id_herr'];
echo $id_herr;	
include("Conexion/conexion.php");	
		
$queryHerr = $mysqli -> query ("SELECT * FROM `Herramienta` WHERE `id_herr` = ".$id_herr.";");
	
$rowHerr = mysqli_fetch_assoc($queryHerr);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formHerr" enctype="multipart/form-data">

<div align="">
<table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario editar Herramientas</label></td>
    </tr>
    <tr>
      <th width="">Herramienta:</th>
      <td width="">
      <input name="txtid_herr" type="text" id="txtid_herr" size="5" value="<?php print $rowHerr['id_herr'];?>"/>  - 
      <input name="txtHerramienta" type="text" id="txtHerramienta" size="30" value="<?php print $rowHerr['Herramienta'];?>"/>

   </tr>
    <tr>
      <th width="">Obs:</th>
      <td width=""><input name="txtObs" type="text" id="txtObs" size="50" value="<?php print $rowHerr['Obs'];?>"/>
      <th width="">Baja:</th>
      <td width=""><input name="txtbaja" type="text" id="txtbaja" size="5" value="<?php print $rowHerr['baja'];?>"/>
<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
</label>	
<label>
      <a href="<?php print "FormItemImgProcesoEditar.php?id_itemproceso=".$rowHerr['id_herr']; ?>">
      <img class="imgEfc" name="img_herr" id="img_herr" src="<?php print $rowHerr['img_herr']; ?>"/></a>
      </label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$id_herr=$_POST['txtid_herr'];	
$Herramienta=$_POST['txtHerramienta'];	
$Obs=$_POST['txtObs'];	
$baja=$_POST['txtbaja'];	


		
if(!$Herramienta==null){

include("Conexion/conexion.php");		  
$EditarHerramienta = "UPDATE `Herramienta` SET `Herramienta` = '$Herramienta', `Obs` = '$Obs', `baja` = '$baja' WHERE `Herramienta`.`id_herr` = '$id_herr';";

$ejecutar_Editar=mysqli_query($mysqli,$EditarHerramienta);
}		
		
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramienta editada</th>
 </thead>
</tr>
<TR>
<TD><B>id_herr</B></TD>
<TD><B>Herramienta</B></TD>
<TD><B>img_herr</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Baja</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		

include("Conexion/conexion.php");	
$queryHerraEd = $mysqli -> query ("SELECT * FROM `Herramienta` WHERE `id_herr` = ".$id_herr." ORDER BY `id_herr` DESC;");
  
 while ($filaHerraEd = mysqli_fetch_array($queryHerraEd))

{
echo "<TR>\n";
echo "<td>".$filaHerraEd['id_herr']."</td>\n";
$varHerraEd=$filaHerraEd['Herramienta'];
echo "<td>".$filaHerraEd['Herramienta']."</td>\n";
echo "<td>".'<img  src="'.$filaHerraEd['img_herr'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaHerraEd['Obs']."</td>\n";
echo "<td>".$filaHerraEd['baja']."</td>\n";
echo "<td>"."<a href=\"/sistema/FormHerrEditar.php?id_herr=".$filaHerraEd['id_herr']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverherr()()\">volver herramienta</button>";
?>

	</form>
	
	
		

		

<?php

		
?>
	

    </div>
  </div>
</div>	

	
</body>
</html>