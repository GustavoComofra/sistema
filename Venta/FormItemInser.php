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


<title>Item de Fallas</title>
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

<form action="#" method="post" name="formItemsFalla" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Items Falla</label></td>
    </tr>
    <tr>
      <th width="">Item:</th>
      <td width=""><input name="txtItemFalla" type="text" id="txtItemFalla" size="50" required/>
		</td>
    </tr>
	  
 <tr>
      <th width="">Tipo Falla:</th>
   <td><select name="listFkTipoFalla" size="1" id="listFkTipoFalla" required>
        <option value="0">Seleccione:</option>
        <?php

include("../Conexion/conexion.php");
  
$queryLocalidad = $mysqli -> query ("SELECT * FROM `ComTipoFallaRecl` ORDER BY `ComTipoFallaRecl`.`Tipo_Falla` ASC");


 while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad))

		  
		  {

 echo '<option value="'.$valoresLocalidad['Id_TipoFallaRecl'].'">'.$valoresLocalidad['Tipo_Falla'].'</option>';
}


	?>
      </select>

		</td>
    </tr	  
	  
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

$ItemFalla=$_POST['txtItemFalla'];	
$TipoFallaRecl=$_POST['listFkTipoFalla'];	

		
if(!$ItemFalla==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");
$insertarItemFalla = "INSERT INTO `ComItemFalla` (`Id_ItemFalla`, `ItemFalla`, `FkTipoFalla`) VALUES (NULL, '$ItemFalla', '$TipoFallaRecl');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarItemFalla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarItemFalla" enctype="multipart/form-data">

<div  >
  <table width="100%"  border="1">
    <tr>
      <td colspan="2"  ><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Items:</th>
      <td width=""><input name="txtItemFallaB" type="text" id="txtItemFallaB" size="30"/>

   		  
		</td>
	</tr>
          

	<br>
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
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado items de fallas</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Items</B></TD>
<TD><B>NumTipo</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$ItemFalla=$_POST['txtItemFallaB'];	

	
include("../Conexion/conexion.php");	
$queryComVistaItemFallaB = $mysqli -> query ("SELECT * FROM `ComVistaItems2` WHERE `ItemFalla` LIKE '%$ItemFalla%'");

 while ($filaComVistaItemFallaB = mysqli_fetch_array($queryComVistaItemFallaB))

{
echo "<TR>\n";
echo "<td>".$filaComVistaItemFallaB['Id_ItemFalla']."</td>\n";
echo "<td>".$filaComVistaItemFallaB['ItemFalla']."</td>\n";
echo "<td>".$filaComVistaItemFallaB['Id_TipoFallaRecl']."</td>\n";	 
echo "<td>".$filaComVistaItemFallaB['Tipo_Falla']."</td>\n";

echo "<td>"."<a href=\"/sistema/Venta/FormItemEditar.php?Id_ItemFalla=".$filaComVistaItemFallaB['Id_ItemFalla']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormItemBorrar.php?Id_ItemFalla=".$filaComVistaItemFallaB['Id_ItemFalla']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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