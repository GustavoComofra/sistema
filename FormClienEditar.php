<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
 <title>Cliente Editar</title>
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
	$Id_Cliente=$_GET['Id_Cliente'];
echo $Id_Cliente; 
$queryCliente = $mysqli -> query ("SELECT * FROM `ComCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";");

$rowCliente = mysqli_fetch_assoc($queryCliente);
		?>
				
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Cliente</label></td>
    </tr>
    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_Cliente" type="text" id="txtId_Cliente" size="50" value="<?php print $rowCliente['Id_Cliente'];?>"/>
		</td>
    </tr>	  
    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="50" value="<?php print $rowCliente['Cliente'];?>"/>
		</td>
    </tr>
    <tr>
      <th width="">Direccion:</th>
      <td width=""><input name="txtDireccion" type="text" id="txtDireccion" size="50" value="<?php print $rowCliente['Direccion'];?>"/>
		</td>
    </tr>
	  
 <tr>
      <th width="">Localidad:</th>
   <td>
    <select name="listLocalidad" size="1" id="listLocalidad">
       <option value="<?php print $rowCliente['Fk_Localidad'];?>"><?php print $rowCliente['Fk_Localidad'];?></option>
        <?php

include("Conexion/conexion.php");
  
$queryLocalidad = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad))

		  
		  {

 echo '<option value="'.$valoresLocalidad[Id_Localidad].'">'.$valoresLocalidad[Localidad].'</option>';
}


	?>
      </select>

		</td>
  
	  
 <tr>
      <th width="">Provincia :</th>
   <td>
    <select name="listProvincia" size="1" id="listProvincia">
        <option value="<?php print $rowCliente['FK_Provincia'];?>"><?php print $rowCliente['FK_Provincia'];?></option>
        <?php

include("Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia[Id_Provincia].'">'.$valoresProvincia[Provincia].'</option>';
}


	?>
      </select>

		</td>
    </tr>	  
	  
	  
    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefono" type="text" id="txtTelefono" size="50" value="<?php print $rowCliente['Telefono'];?>"/>
		</td>
    </tr>	
	  
    <tr>
      <th width="">Email:</th>
      <td width=""><input name="txtEmail" type="email" id="txtEmail" size="50" value="<?php print $rowCliente['Email'];?>" />
		</td>
    </tr>	
	  
    <tr>
      <th width="">Contacto:</th>
      <td width=""><input name="txtContacto" type="text" id="txtContacto" size="50" value="<?php print $rowCliente['Contacto'];?>" />
		</td>
    </tr>	  
	  
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
			
		</td>	  
	  

      </select>
		
		</td>
    </tr> 
	</table>
	</div>

<hr>

<?php
$Id_Cliente=$_POST['txtId_Cliente'];	
$Cliente=$_POST['txtCliente'];	
$Direccion=$_POST['txtDireccion'];	
$Localidad=$_POST['listLocalidad'];	
$Provincia=$_POST['listProvincia'];	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];		
$Contacto=$_POST['txtContacto'];
		
if(!$Cliente==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");

$insertarCliente = "UPDATE `ComCliente` SET `Cliente` = '$Cliente', `Direccion` = '$Direccion', `Fk_Localidad` = '$Localidad', `FK_Provincia` = '$Provincia', `Telefono` = '$Telefono', `Email` = '$Email', `Contacto` = '$Contacto' WHERE `ComCliente`.`Id_Cliente` = ".$Id_Cliente.";";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCliente);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"10\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Clientes</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Direccion</B></TD>
<TD><B>Localidad</B></TD>
<TD><B>Provincia</B></TD>
<TD><B>Telefono</B></TD>

<TD><B>Email</B></TD>
<TD><B>Contacto</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";	
	
$Id_Cliente=$_POST['txtId_Cliente'];	
$Cliente=$_POST['txtClienteB'];	
$Direccion=$_POST['txtDireccionB'];	
$Localidad=$_POST['txtLocalidadB'];	
$Provincia=$_POST['txtProvinciaB'];	
	
include("Conexion/conexion.php");	
$queryClienteB = $mysqli -> query ("SELECT * FROM `ComVisCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";");
  
 while ($filaClienteB = mysqli_fetch_array($queryClienteB))

{
echo "<TR>\n";
echo "<td>".$filaClienteB['Id_Cliente']."</td>\n";
echo "<td>".$filaClienteB['Cliente']."</td>\n";
echo "<td>".$filaClienteB['Direccion']."</td>\n";
echo "<td>".$filaClienteB['Localidad']."</td>\n";
echo "<td>".$filaClienteB['Provincia']."</td>\n";	 
echo "<td>".$filaClienteB['Telefono']."</td>\n";
echo "<td>".$filaClienteB['Email']."</td>\n";
echo "<td>".$filaClienteB['Contacto']."</td>\n";		 


echo "<td>"."<a href=\"/sistema/FormClienEditar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormClienBorrar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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