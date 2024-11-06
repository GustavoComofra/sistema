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


<title>Localidad</title>
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

<form action="#" method="post" name="formLocalidad" enctype="multipart/form-data">

  <table  >
    <tr>
      <td colspan="2"  ><label>Formulario Localidad</label></td>
    </tr>
    <tr>
      <th  >Localidad :</th>
      <td  ><input name="txtLocalidad" type="text" id="txtLocalidad" size="30" required/>
		</td>
    </tr>
    <tr>
      <th  >CP :</th>
      <td  ><input name="txtCP" type="text" id="txtCP" size="30"/>
		</td>
    </tr>
	<tr>
   <th>Provincia :</th>
   <td>
      <select name="listProvincia" id="listProvincia">
         <option value="0">Seleccione:</option>
         <?php
         include("./Conexion/conexion.php");

         $queryProvincia = $mysqli->query("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");
         if ($queryProvincia) {
            while ($valoresProvincia = mysqli_fetch_array($queryProvincia)) {
               echo '<option value="' . htmlspecialchars($valoresProvincia['Provincia']) . '">' . htmlspecialchars($valoresProvincia['Provincia']) . '</option>';
            }
         } else {
            echo '<option value="0">Error al cargar provincias</option>';
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


<hr>

<?php

$Localidad=$_POST['txtLocalidad'];	
$CP=$_POST['txtCP'];	
$Provincia=$_POST['listProvincia'];	
		
if(!$Localidad==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");		  
$insertarLocalidad = "INSERT INTO `Localidad` (`Id_Localidad`, `Localidad`, `CP`, `Provincia`) VALUES (NULL, '$Localidad', '$CP', '$Provincia');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarLocalidad);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
		
<form action="#" method="post" name="formBuscar" enctype="multipart/form-data">
  <table  class="table" >
    <tr>
      <td colspan="2" ><label>Buscar</label></td>
    </tr>
    <tr>
      <th  >Localidad :</th>
      <td  ><input name="txtLocalidadB" type="text" id="txtLocalidadB"  />
		</td>
	</tr>
    <tr>
	    <tr>
      <th  >CP :</th>
      <td  ><input name="txtCPB" type="text" id="txtCPB"  />
		</td>
	</tr>
      <th  >Provincia :</th>
      <td  ><input name="txtProvinciaB" type="text" id="txtProvinciaB"  />

			
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


<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Localidades</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Localidad</B></TD>
<TD><B>CP</B></TD>
<TD><B>Provincia</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Localidad=$_POST['txtLocalidadB'];	
$CP=$_POST['txtCPB'];	
$Provincia=$_POST['listProvinciaB'];

include("../Conexion/conexion.php");	
$queryLocalidadB = $mysqli -> query ("SELECT * FROM `Localidad` WHERE `Localidad` LIKE '%$Localidad%' AND `CP` LIKE '%$CP%' AND `Provincia` LIKE '%$Provincia%' ORDER BY `Localidad`.`Localidad` ASC");
  
 while ($filaLocalidadB = mysqli_fetch_array($queryLocalidadB))

{
echo "<TR>\n";
echo "<td>".$filaLocalidadB['Id_Localidad']."</td>\n";
echo "<td>".$filaLocalidadB['Localidad']."</td>\n";
echo "<td>".$filaLocalidadB['CP']."</td>\n";
echo "<td>".$filaLocalidadB['Provincia']."</td>\n";

echo "<td>"."<a href=\"/sistema/Venta/FormLocaEditar.php?Id_Localidad=".$filaLocalidadB['Id_Localidad']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormLocaBorrar.php?Id_Localidad=".$filaLocalidadB['Id_Localidad']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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