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

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
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

$CUIT_Empl=$_GET['CUIT_Empl'];
$varCUIT_Empl = $CUIT_Empl=$_GET['CUIT_Empl'];
$queryvarCUIT_Empl = $mysqli -> query ("SELECT * FROM `ComVistaEstuEmp` WHERE `CUIT_Empl` = ".$varCUIT_Empl.";");

$row = mysqli_fetch_assoc($queryvarCUIT_Empl);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formEstudio" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario Estudio</label></td>
    </tr>
    <tr>
      <th width="">Estudio :</th>
      <td width=""><input name="txtEstudio" type="text" id="txtEstudio" size="30" required/>
		</td>
    </tr>
    <tr>
      <th width="">Institucion :</th>
      <td width=""><input name="txtInstitucion" type="text" id="txtInstitucion" size="30"/>
		</td>
    </tr>
    <tr>
      <th width="">Descripcion :</th>
      <td width=""><input name="txtDescripcion" type="text" id="txtDescripcion" size="30"/>
		
<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$Estudio=$_POST['txtEstudio'];	
$Institucion=$_POST['txtInstitucion'];	
$Descripcion=$_POST['txtDescripcion'];	
		
if(!$Estudio==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");		  
$insertarEstudio = "INSERT INTO `ComEstudios` (`IdEstudio`, `Estudio`, `Institucion`, `Descripcion`) VALUES (NULL, '$Estudio', '$Institucion', '$Descripcion');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarEstudio);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscar" enctype="multipart/form-data">

<div align="">
  <table width=""  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Estudio :</th>
      <td width=""><input name="txtEstudioB" type="text" id="txtEstudioB" size="11"/>
		</td>
    <tr>
      <th width="">Institucion :</th>
      <td width=""><input name="txtInstitucionB" type="text" id="txtInstitucionB" size="11"/>
		
<label>
        <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
      </label>	
			
		</td>
    </tr>
	</table>
	</div>

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Estudios</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Estudio</B></TD>
<TD><B>Institucion</B></TD>
<TD><B>Descripcion</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Estudio=$_POST['txtEstudioB'];	
$Institucion=$_POST['txtInstitucionB'];

include("Conexion/conexion.php");	
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `Estudio` LIKE '%$Estudio%' AND `Institucion` LIKE '%$Institucion%' ORDER BY `ComEstudios`.`Estudio` ASC");
  
 while ($filaEstudio = mysqli_fetch_array($queryEstudio))

{
echo "<TR>\n";
echo "<td>".$filaEstudio['IdEstudio']."</td>\n";
$varCuit=$filaEstudio['IdEstudio'];
echo "<td>".$filaEstudio['Estudio']."</td>\n";
echo "<td>".$filaEstudio['Institucion']."</td>\n";
echo "<td>".$filaEstudio['Descripcion']."</td>\n";

echo "<td>"."<a href=\"/sistema/FormEstudEditar.php?IdEstudio=".$filaEstudio['IdEstudio']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormEstudBorrar.php?IdEstudio=".$filaEstudio['IdEstudio']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>