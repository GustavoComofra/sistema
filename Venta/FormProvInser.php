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


<title>Provincia</title>
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

<form action="#" method="post" name="formProvincia" enctype="multipart/form-data">

<div  >
  <table width=""   >
    <tr>
      <td colspan="2"  ><label>Formulario Provincia</label></td>
    </tr>
    <tr>
      <th width="">Provincia :</th>
      <td width=""><input name="txtProvincia" type="text" id="txtProvincia" size="30" required/>
		</td>
    </tr>

    <tr>
      <th width="">Pais :</th>
   <td>
    <select name="listPais" size="1" id="listPais">
        <option value="0">Seleccione:</option>
        <?php
include("../Conexion/conexion.php");
  
$queryPais = $mysqli -> query ("SELECT * FROM `Pais`");

 while ($valoresPais = mysqli_fetch_array($queryPais))

		  {

 echo '<option value="'.$valoresPais['Id_Pais'].'">'.$valoresPais['Pais'].'</option>';
}
	?>
      </select>
	
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

$Provincia=$_POST['txtProvincia'];	
$Pais=$_POST['listPais'];	
		
if(!$Provincia==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");		  
$insertarProvincia = "INSERT INTO `Provincia` (`Id_Provincia`, `Provincia`, `PaisP`) VALUES (NULL, '$Provincia', '$Pais');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarProvincia);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

<form action="#" method="post" name="formBuscar" enctype="multipart/form-data">

<div  >
  <table width=""  border="1">
    <tr>
      <td colspan="2"  ><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Provincia :</th>
      <td width=""><input name="txtProvinciaB" type="text" id="txtProvinciaB" size="11"/>
		</td>
	</tr>
    <tr>

		
      <th width="">Pais :</th>
      <td width=""><input name="txtPaisB" type="text" id="txtPaisB" size="11"/>

			
		</td>
    </tr>
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
<th colspan=\"5\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Provincias</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Provincia</B></TD>
<TD><B>Pais</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Provincia=$_POST['txtProvinciaB'];	
$Pais=$_POST['listPaisB'];

include("../Conexion/conexion.php");	
$queryProvinciaB = $mysqli -> query ("SELECT * FROM `ComVisProvPais` WHERE `Provincia` LIKE '%$Provincia%' AND `Pais` LIKE '%$Pais%' AND `Borrar` LIKE 'No'");
  
 while ($filaProvinciaB = mysqli_fetch_array($queryProvinciaB))

{
echo "<TR>\n";
echo "<td>".$filaProvinciaB['Id_Provincia']."</td>\n";
echo "<td>".$filaProvinciaB['Provincia']."</td>\n";
echo "<td>".$filaProvinciaB['Pais']."</td>\n";

echo "<td>"."<a href=\"/sistema/Venta/FormProvEditar.php?Id_Provincia=".$filaProvinciaB['Id_Provincia']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormProvBorrar.php?Id_Provincia=".$filaProvinciaB['Id_Provincia']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoBorrar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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