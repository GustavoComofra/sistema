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
 <title>Cliente</title>
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
	window.location.href = '/sistema/index.php';
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
      <td colspan="2" align="center"><label>Cliente</label></td>
    </tr>
    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="50" required/>
		</td>
    </tr>
    <tr>
      <th width="">Direccion:</th>
      <td width=""><input name="txtDireccion" type="text" id="txtDireccion" size="50"/>
		</td>
    </tr>
	  
 <tr>
      <th width="">Localidad:<strong style="color:red;">*</strong></th>
   <td><select name="listLocalidad" size="1" id="listLocalidad" required>
     <option value="0">Monte Buey</option>
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
	  </tr>	  
	  
 <tr>
      <th width="">Provincia :<strong style="color:red;">*</strong></th>
   <td><select name="listProvincia" size="1" id="listProvincia" required>
     <option value="0">Cordoba</option>
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
      <td width=""><input name="txtTelefono" type="text" id="txtTelefono" size="50"/>
		</td>
    </tr>	
	  
    <tr>
      <th width="">Email:</th>
      <td width=""><input name="txtEmail" type="email" id="txtEmail" size="50"/>
		</td>
    </tr>	
	  
    <tr>
      <th width="">Contacto:</th>
      <td width=""><input name="txtContacto" type="text" id="txtContacto" size="50"/>
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

$Cliente=$_POST['txtCliente'];	
$Direccion=$_POST['txtDireccion'];	
$Localidad=2;	
$Provincia=9;	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];		
$Contacto=$_POST['txtContacto'];
		
if(!$Cliente==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");
$insertarCliente = "INSERT INTO `ComCliente` (`Id_Cliente`, `Cliente`, `Direccion`, `Fk_Localidad`, `FK_Provincia`, `Telefono`, `Email`, `Contacto`) VALUES (NULL, '$Cliente', '$Direccion', '$Localidad', '$Provincia', '$Telefono', '$Email', '$Contacto');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCliente);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarCliente" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtClienteB" type="text" id="txtClienteB" size="30"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">Direccion:</th>
      <td width=""><input name="txtDireccionB" type="text" id="txtDireccionB" size="30"/>
		</td>
	</tr>
	  
    <tr>
	    <tr>
      <th width="">Localidad:</th>
      <td width=""><input name="txtLocalidadB" type="text" id="txtLocalidadB" size="30"/>
		</td>
	</tr>
	  
    <tr>
	    <tr>
      <th width="">Provincia:</th>
      <td width=""><input name="txtProvinciaB" type="text" id="txtProvinciaB" size="30"/>
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
$Cliente=$_POST['txtClienteB'];	
$Direccion=$_POST['txtDireccionB'];	
$Localidad=$_POST['txtLocalidadB'];	
$Provincia=$_POST['txtProvinciaB'];	
	
include("Conexion/conexion.php");	
$queryClienteB = $mysqli -> query ("SELECT * FROM `ComVisCliente` WHERE `Cliente` LIKE '%$Cliente%' AND `Direccion` LIKE '%$Direccion%' AND `Localidad` LIKE '%$Localidad%' AND `Provincia` LIKE '%$Provincia%' ORDER BY `Cliente` ASC LIMIT 20");
  
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

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>