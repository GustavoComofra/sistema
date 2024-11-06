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


<title>Editar consecionario</title>
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
	$id_Conce=$_GET['id_Conce'];
echo $id_Conce; 
$queryConcesio = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `id_Conce` = ".$id_Conce.";");

$rowConcesio = mysqli_fetch_assoc($queryConcesio);
		?>
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formEsditarConsec" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Concesionario</label></td>
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
include("../Conexion/conexion.php");	

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
	
include("../Conexion/conexion.php");	
$queryConcesionarioB = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `id_Conce` = ".$id_Conce.";");
  
 while ($filaConcesionarioB = mysqli_fetch_array($queryConcesionarioB))

{
echo "<TR>\n";
echo "<td>".$filaConcesionarioB['id_Conce']."</td>\n";
echo "<td>".$filaConcesionarioB['Concesionario']."</td>\n";
echo "<td>".$filaConcesionarioB['Direccion']."</td>\n";
echo "<td>".$filaConcesionarioB['Telefono']."</td>\n";
echo "<td>".$filaConcesionarioB['Email']."</td>\n";	 


echo "<td>"."<a href=\"/sistema/Venta/FormClienEditar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormConsecBorrar.php?id_Conce=".$filaConcesionarioB['id_Conce']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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