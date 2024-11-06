<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

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


<title>Confirmar Garantia</title>
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
	$Id_gar=$_GET['Id_gar'];
$queryGarant = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `Id_gar` = ".$Id_gar.";");

$rowGarant = mysqli_fetch_assoc($queryGarant);
		?>
				
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Actualizar estado de garantia</label></td>
    </tr>
    <tr>
      <th width="">Num:</th>
      <td width=""><input name="txtId_gar" type="number" id="txtId_gar" size="50" value="<?php print $rowGarant['Id_gar'];?>"/>
		</td>
    </tr>	 
    
    <tr>
      <th width="">Serie:</th>
      <td width=""><input name="txtSerie" type="number" id="txtSerie" size="50" value="<?php print $rowGarant['Serie'];?>" required/>
		</td>
    </tr>

    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="50" value="<?php print $rowGarant['Cliente'];?>"/>
		</td>
    </tr>

	  
    <tr>
      <th width="">Correo:</th>
      <td width=""><input name="txtCorreo" type="email" id="txtCorreo" size="50" value="<?php print $rowGarant['Correo'];?>"/>
		</td>
    </tr>


    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefono" type="number" id="txtTelefono" size="50" value="<?php print $rowGarant['Telefono'];?>"/>
		</td>
    </tr>
	  
	  
    <tr>
      <th width="">Fecha:</th>
      <td width=""><input name="txtFecha" type="datetime" id="txtFecha" size="50" value="<?php print $rowGarant['Fecha'];?>"/>
		</td>
    </tr>	
	  
    <tr>
      <th width="">Fecha Contestacion:</th>
      <td width=""><input name="txtFechaContestacion" type="date" id="txtFechaContestacion" size="50" value="<?php print $rowGarant['FechaContestacion'];?>"/>
		</td>
    </tr>	 

    <tr>
      <th width="">Observacion:</th>
      <td width=""><input name="txtObservacion" type="text" id="txtObservacion" size="50" value="<?php print $rowGarant['Observacion'];?>"/>
		</td>
    </tr>	 
	  
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Actualizar" />
      </label>
			
		</td>	  
	  

      </select>
		
		</td>
    </tr> 
	</table>
	</div>

<hr>

<?php
$Id_gar=$_POST['txtId_gar'];	
$Serie=$_POST['txtSerie'];	
$Cliente=$_POST['txtCliente'];	
$Correo=$_POST['txtCorreo'];	
$Telefono=$_POST['txtTelefono'];
$Fecha=$_POST['txtFecha'];	
$FechaContestacion=$_POST['txtFechaContestacion'];	
$Observacion=$_POST['txtObservacion'];	

		
if(!$Serie==null){
	
echo "<p>"."Actualizado"."</p>";
include("../Conexion/conexion.php");

$actualizarGarantia = "UPDATE `Garantia` SET `Serie` = '$Serie', `Cliente` = '$Cliente', `Correo` = '$Correo', `Telefono` = '$Telefono', `Fecha` = '$Fecha', `FechaContestacion` = '$FechaContestacion', `Observacion` = '$Observacion' WHERE `Garantia`.`Id_gar` = ".$Id_gar.";";

$ejecutar_actualizar=mysqli_query($mysqli,$actualizarGarantia);
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
<TD><B>Num</B></TD>
<TD><B>Serie</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Correo</B></TD>
<TD><B>Telefono</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>Contestacion</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";	
	
$Id_gar=$_POST['txtId_gar'];	
$Serie=$_POST['txtSerie'];	
$Cliente=$_POST['txtCliente'];	
$Correo=$_POST['txtCorreo'];	
$Telefono=$_POST['txtTelefono'];
$Fecha=$_POST['txtFecha'];	
$FechaContestacion=$_POST['txtFechaContestacion'];	
$Observacion=$_POST['txtObservacion'];	
	
include("../Conexion/conexion.php");	
$queryGarantiaB = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `Id_gar` =  ".$Id_gar.";");
  
 while ($filaGarantiaB = mysqli_fetch_array($queryGarantiaB))

{
  echo "<TR>\n";
  echo "<td>".$filaGarantiaB['Id_gar']."</td>\n";
  echo "<td>".$filaGarantiaB['Serie']."</td>\n";
  echo "<td>".$filaGarantiaB['Cliente']."</td>\n";
  echo "<td>".$filaGarantiaB['Correo']."</td>\n";
  echo "<td>".$filaGarantiaB['Telefono']."</td>\n";	 
  echo "<td>".$filaGarantiaB['Fecha']."</td>\n";
  echo "<td>".$filaGarantiaB['FechaContestacion']."</td>\n";
  echo "<td>".$filaGarantiaB['Observacion']."</td>\n";		 
  
  
  echo "<td>"."<a href=\"/sistema/Venta/FormGaranConfir.php?Id_gar=".$filaGarantiaB['Id_gar']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

  echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormGarantiaBorrar.php?Id_gar=".$filaGarantiaB['Id_gar']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
     
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