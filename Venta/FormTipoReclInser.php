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


<title>Tipo de reclamo</title>
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

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Tipo de reclamo</label></td>
    </tr>
    <tr>
      <th width="">Tipo :</th>
      <td width=""><input name="txtTipoReclamo" type="text" id="txtTipoReclamo" size="30" required/>
		</td>
    </tr>
    <tr>
      <th width="">Descripcion :</th>
      <td width=""><input name="txtDescripcion" type="text" id="txtDescripcion" size="30"/>
		</td>
    </tr>
	  
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Nuevo" />
      </label>
			
		</td>	  

	</table>
	</div>

<hr>

<?php

$TipoReclamo=$_POST['txtTipoReclamo'];	
$Descripcion=$_POST['txtDescripcion'];	
		
if(!$TipoReclamo==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");		  
$insertarTipoRecla = "INSERT INTO `ComTipoRecla` (`Id_TipoRecla`, `TipoReclamo`, `Descripcion`) VALUES (NULL, '$TipoReclamo', '$Descripcion');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarTipoRecla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

<form action="#" method="post" name="formBuscarTipoReclamo" enctype="multipart/form-data">

<div  >
  <table width="100%"  border="1">
    <tr>
      <td colspan="2"  ><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">TipoReclamo :</th>
      <td width=""><input name="txtTipoReclamoB" type="text" id="txtTipoReclamoB" size="11"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">Descripcion:</th>
      <td width=""><input name="txtDescripcionB" type="text" id="txtDescripcionB" size="11"/>
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
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado tipos de reclamo</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>Descripcion</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$TipoReclamo=$_POST['txtTipoReclamoB'];	
$Descripcion=$_POST['txtDescripcionB'];	

include("../Conexion/conexion.php");	
$queryTipoReclamoB = $mysqli -> query ("SELECT * FROM `ComTipoRecla` WHERE `TipoReclamo` LIKE '%$TipoReclamo%' AND `DescripcionTP` LIKE '%$Descripcion%' ORDER BY `TipoReclamo` ASC");

 while ($filaTipoReclamoB = mysqli_fetch_array($queryTipoReclamoB))

{
echo "<TR>\n";
echo "<td>".$filaTipoReclamoB['Id_TipoRecla']."</td>\n";
echo "<td>".$filaTipoReclamoB['TipoReclamo']."</td>\n";
echo "<td>".$filaTipoReclamoB['Descripcion']."</td>\n";


echo "<td>"."<a href=\"/sistema/Venta/FormTipoReclEditar.php?Id_TipoRecla=".$filaTipoReclamoB['Id_TipoRecla']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormTipoReclBorrar.php?Id_TipoRecla=".$filaTipoReclamoB['Id_TipoRecla']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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