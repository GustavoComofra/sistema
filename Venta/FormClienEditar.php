<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>

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


<title>Editar Cliente</title>
<body>
	
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
</div>


<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">
						<?php
						include("../layout/header/header-Center.php");
						?>
					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">

<?php
	$Id_Cliente=$_GET['Id_Cliente'];
echo $Id_Cliente; 
$queryCliente = $mysqli -> query ("SELECT * FROM `ComCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";");

$rowCliente = mysqli_fetch_assoc($queryCliente);
		?>
				
	
		


<form action="#" method="post" name="formEditarCliente" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Cliente</label></td>
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

include("../Conexion/conexion.php");
  
$queryLocalidad = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad))

		  
		  {

 echo '<option value="'.$valoresLocalidad['Id_Localidad'].'">'.$valoresLocalidad['Localidad'].'</option>';
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

include("../Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia['Id_Provincia'].'">'.$valoresProvincia['Provincia'].'</option>';
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
	
echo "<p>"."Editado"."</p>";
include("../Conexion/conexion.php");

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
	
include("../Conexion/conexion.php");	
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


echo "<td>"."<a href=\"/sistema/Venta/FormClienEditar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormClienBorrar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	
</body>
</html>