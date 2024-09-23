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


<title>Cliente</title>
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
			

<form action="#" method="post" name="formEditarCliente" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Cliente</label></td>
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

include("../Conexion/conexion.php");
  
$queryLocalidad = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad))

		  
		  {

 echo '<option value="'.$valoresLocalidad['Id_Localidad'].'">'.$valoresLocalidad['Localidad'].'</option>';
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
include("../Conexion/conexion.php");
$insertarCliente = "INSERT INTO `ComCliente` (`Id_Cliente`, `Cliente`, `Direccion`, `Fk_Localidad`, `FK_Provincia`, `Telefono`, `Email`, `Contacto`) VALUES (NULL, '$Cliente', '$Direccion', '$Localidad', '$Provincia', '$Telefono', '$Email', '$Contacto');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCliente);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarCliente" enctype="multipart/form-data">

<div>
  <table width="100%" >
    <tr>
      <td colspan="2" ><label>Buscar</label></td>
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
	
include("../Conexion/conexion.php");	
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


echo "<td>"."<a href=\"/sistema/Venta/FormClienEditar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"https://interno.comofrasrl.com.ar/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistem/Venta/FormClienBorrar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"https://interno.comofrasrl.com.ar/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>

		
			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>


	
</body>
</html>