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
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Localidad</title>
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
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formLocalidad" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario Localidad</label></td>
    </tr>
    <tr>
      <th width="">Localidad :</th>
      <td width=""><input name="txtLocalidad" type="text" id="txtLocalidad" size="30" required/>
		</td>
    </tr>
    <tr>
      <th width="">CP :</th>
      <td width=""><input name="txtCP" type="text" id="txtCP" size="30"/>
		</td>
    </tr>
    <tr>
      <th width="">Provincia :</th>
   <td><select name="listProvincia" size="1" id="listProvincia">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia[Provincia].'">'.$valoresProvincia[Provincia].'</option>';
}
	?>
      </select>

    </tr>
	  <tr>
	  
	  			<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Nuevo" />
      </label>
			
		</td>	
	  </tr>

	</table>
	</div>

<hr>

<?php

$Localidad=$_POST['txtLocalidad'];	
$CP=$_POST['txtCP'];	
$Provincia=$_POST['listProvincia'];	
		
if(!$Localidad==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");		  
$insertarLocalidad = "INSERT INTO `Localidad` (`Id_Localidad`, `Localidad`, `CP`, `Provincia`) VALUES (NULL, '$Localidad', '$CP', '$Provincia');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarLocalidad);
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
      <th width="">Localidad :</th>
      <td width=""><input name="txtLocalidadB" type="text" id="txtLocalidadB" size="11"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">CP :</th>
      <td width=""><input name="txtCPB" type="text" id="txtCPB" size="11"/>
		</td>
	</tr>
      <th width="">Provincia :</th>
      <td width=""><input name="txtProvinciaB" type="text" id="txtProvinciaB" size="11"/>

			
		</td>
    </tr>
	
	<tr>
	<td>
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
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Localidades</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Localidad</B></TD>
<TD><B>CP</B></TD>
<TD><B>Provincia</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Localidad=$_POST['txtLocalidadB'];	
$CP=$_POST['txtCPB'];	
$Provincia=$_POST['listProvinciaB'];

include("Conexion/conexion.php");	
$queryLocalidadB = $mysqli -> query ("SELECT * FROM `Localidad` WHERE `Localidad` LIKE '%$Localidad%' AND `CP` LIKE '%$CP%' AND `Provincia` LIKE '%$Provincia%' ORDER BY `Localidad`.`Localidad` ASC");
  
 while ($filaLocalidadB = mysqli_fetch_array($queryLocalidadB))

{
echo "<TR>\n";
echo "<td>".$filaLocalidadB['Id_Localidad']."</td>\n";
echo "<td>".$filaLocalidadB['Localidad']."</td>\n";
echo "<td>".$filaLocalidadB['CP']."</td>\n";
echo "<td>".$filaLocalidadB['Provincia']."</td>\n";

echo "<td>"."<a href=\"/sistema/FormLocaEditar.php?Id_Localidad=".$filaLocalidadB['Id_Localidad']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormLocaBorrar.php?Id_Localidad=".$filaLocalidadB['Id_Localidad']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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