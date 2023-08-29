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
 <title>Concesionario</title>
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

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Concesionario</label></td>
    </tr>
    <tr>
      <th width="">Concesionario:</th>
      <td width=""><input name="txtConcesionario" type="text" id="txtConcesionario" size="50" required/>
		</td>
    </tr>
    <tr>
      <th width="">Direccion:</th>
      <td width=""><input name="txtDireccion" type="text" id="txtDireccion" size="50"/>
		</td>
    </tr>
	  
    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefono" type="text" id="txtTelefono" size="50"/>
		</td>
    </tr>	
	  
    <tr>
      <th width="">Email:</th>
      <td width=""><input name="txtEmail" type="email" id="txtEmail" size="50"/>
		</td>
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

$Concesionario=$_POST['txtConcesionario'];	
$Direccion=$_POST['txtDireccion'];	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];		
//$Provincia=$_POST['listProvincia'];	
		
if(!$Concesionario==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");	  
$insertarConcesionario = "INSERT INTO `ComConcesionario` (`id_Conce`, `Concesionario`, `Direccion`, `Telefono`, `Email`) VALUES (NULL, '$Concesionario	', '$Direccion', '$Telefono', '$Email');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConcesionario);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarConcesionario" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Concesionario:</th>
      <td width=""><input name="txtConcesionarioB" type="text" id="txtConcesionarioB" size="30"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">Descripcion:</th>
      <td width=""><input name="txtDescripcionB" type="text" id="txtDescripcionB" size="30"/>
		</td>
	</tr>
	  
    <tr>
	    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefonoB" type="text" id="txtTelefonoB" size="30"/>
		</td>
	</tr>
	  
    <tr>
	    <tr>
      <th width="">Email:</th>
      <td width=""><input name="txtEmailB" type="text" id="txtEmailB" size="30"/>
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
<th colspan=\"8\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Concesionarios</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Concesionario</B></TD>
<TD><B>Direccion</B></TD>
<TD><B>Telefono</B></TD>
<TD><B>Email</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Concesionario=$_POST['txtConcesionarioB'];	
$Direccion=$_POST['txtDireccionB'];	
$Telefono=$_POST['txtTelefonoB'];	
$Email=$_POST['txtEmailB'];	
	
include("Conexion/conexion.php");	
$queryConcesionarioB = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `Concesionario` LIKE '%$Concesionario%' AND `Direccion` LIKE '%$Direccion%' AND `Telefono` LIKE '%$Telefono%' AND `Email` LIKE '%$Email%' AND `Suspendido` LIKE 'No' ORDER BY `Concesionario` ASC");
  
 while ($filaConcesionarioB = mysqli_fetch_array($queryConcesionarioB))

{
echo "<TR>\n";
echo "<td>".$filaConcesionarioB['id_Conce']."</td>\n";
echo "<td>".$filaConcesionarioB['Concesionario']."</td>\n";
echo "<td>".$filaConcesionarioB['Direccion']."</td>\n";
echo "<td>".$filaConcesionarioB['Telefono']."</td>\n";
echo "<td>".$filaConcesionarioB['Email']."</td>\n";	 


echo "<td>"."<a href=\"/sistema/FormConsecEditar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormConsecBorrar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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