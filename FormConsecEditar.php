<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
 <title>Concesionario Editar</title>
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
	window.location.href = "/RRHH/index.php";
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
	$id_Conce=$_GET['id_Conce'];
echo $id_Conce; 
$queryConcesio = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `id_Conce` = ".$id_Conce.";");

$rowConcesio = mysqli_fetch_assoc($queryConcesio);
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
      <th width="">Id:</th>
      <td width=""><input name="txtid_Conce" type="text" id="txtid_Conce" size="50" value="<?php print $rowConcesio['id_Conce'];?>" />
		</td>
    </tr>	
	  
    <tr>
      <th width="">Concesionario:</th>
      <td width=""><input name="txtConcesionario" type="text" id="txtConcesionario" size="50" value="<?php print $rowConcesio['Concesionario'];?>" />
		</td>
    </tr>
    <tr>
      <th width="">Direccion:</th>
      <td width=""><input name="txtDireccion" type="text" id="txtDireccion" size="50" value="<?php print $rowConcesio['Direccion'];?>" />
		</td>
    </tr>
	  
    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefono" type="text" id="txtTelefono" size="50" value="<?php print $rowConcesio['Telefono'];?>" />
		</td>
    </tr>	
	  
    <tr>
      <th width="">Email:</th>
      <td width=""><input name="txtEmail" type="email" id="txtEmail" size="50" value="<?php print $rowConcesio['Email'];?>" />
		</td>
    </tr>	  
	  
	<tr>
		<!--
    </tr>	
	
 <td>	
	<label for="txtSuspendido"><p>Suspendido:</p></label>	
	<select name="listSuspendido" size="1" id="listSuspendido">
	 <option>Si</option>
	 <option selected="selected">No</option>
	 </select>
	</td>
    </tr>	

-->
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar" />
      </label>
			
		</td>	  
    </tr> 
		
		

	</table>
	</div>

<hr>

<?php
$id_Conce=$_POST['txtid_Conce'];
$Concesionario=$_POST['txtConcesionario'];	
$Direccion=$_POST['txtDireccion'];	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];	//txtSuspendido	
$Suspendido=$_POST['txtSuspendido'];	
		
if(!$Concesionario==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");	
//$insertarConcesionario = "INSERT INTO `ComConcesionario` (`id_Conce`, `Concesionario`, `Direccion`, `Telefono`, `Email`) VALUES (NULL, '$Concesionario	', '$Direccion', '$Telefono', '$Email');";	
$insertarConcesionario = "UPDATE `ComConcesionario` SET `Concesionario` = '$Concesionario', `Direccion` = '$Direccion', `Telefono` = '$Telefono', `Email` = '$Email', `Suspendido` = 'No' WHERE `ComConcesionario`.`id_Conce` = ".$id_Conce.";";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConcesionario);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		

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
	  
$id_Conce=$_POST['txtid_Conce'];	  
$Concesionario=$_POST['txtConcesionarioB'];	
$Direccion=$_POST['txtDireccionB'];	
$Telefono=$_POST['txtTelefonoB'];	
$Email=$_POST['txtEmailB'];	
	
include("Conexion/conexion.php");	
$queryConcesionarioB = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `id_Conce` = ".$id_Conce.";");
  
 while ($filaConcesionarioB = mysqli_fetch_array($queryConcesionarioB))

{
echo "<TR>\n";
echo "<td>".$filaConcesionarioB['id_Conce']."</td>\n";
echo "<td>".$filaConcesionarioB['Concesionario']."</td>\n";
echo "<td>".$filaConcesionarioB['Direccion']."</td>\n";
echo "<td>".$filaConcesionarioB['Telefono']."</td>\n";
echo "<td>".$filaConcesionarioB['Email']."</td>\n";	 


echo "<td>"."<a href=\"/RRHH/FormClienEditar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"../RRHH/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/RRHH/FormConsecBorrar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"../RRHH/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>