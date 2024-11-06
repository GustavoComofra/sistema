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


<title>Implementos</title>
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

<form action="#" method="post" name="formImplementos" enctype="multipart/form-data">

<div  >
  <table width="100%"   >
    <tr>
      <td colspan="2"  ><label>Implementos</label></td>
    </tr>
    <tr>
      <th width="">Implemento:</th>
      <td width=""><input name="txtImplemento" type="text" id="txtImplemento" size="50" required/>
		</td>
    </tr>
	  
    <tr>
      <th width="">Numero implemento en CMG:</th>
      <td width=""><input name="NumNumImpl" type="numb" id="NumNumImpl" size="50" required/>
		</td>
    </tr>
	  

	  
 <tr>
      <th width="">Familia:</th>
   <td><select name="listFamilia" size="1" id="listFamilia">
        <option value="0">Seleccione:</option>
        <?php

include("../Conexion/conexion.php");
  
$queryFamilia = $mysqli -> query ("SELECT * FROM `ComFamiImple` ORDER BY `ComFamiImple`.`Familia` ASC");


 while ($valoresFamilia = mysqli_fetch_array($queryFamilia))

		  
		  {

 echo '<option value="'.$valoresFamilia['Id_FamiImple'].'">'.$valoresFamilia['Familia'].'</option>';
}


	?>
      </select>

		</td>
    </tr	  
	  
 <tr>
      <th width="">SubFamilia :</th>
   <td><select name="listSubFamilia" size="1" id="listSubFamilia">
        <option value="0">Seleccione:</option>
        <?php

include("../Conexion/conexion.php");
  
$querySubFamilia = $mysqli -> query ("SELECT * FROM `ComSubFamiImple` ORDER BY `ComSubFamiImple`.`SubFamilia` ASC");


 while ($valoresSubFamilia = mysqli_fetch_array($querySubFamilia))

		  
		  {

 echo '<option value="'.$valoresSubFamilia['Id_SubFamiImple'].'">'.$valoresSubFamilia['SubFamilia'].'</option>';
}


	?>
      </select>

		</td>
    </tr>	  
	  
	  
    <tr>
      <th width="">Descripcion:</th>
      <td width=""><input name="txtDescripcionImp" type="text" id="txtDescripcionImp" size="50"/>
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

$Implemento=$_POST['txtImplemento'];
$NumImpl=$_POST['NumNumImpl'];
$Familia=$_POST['listFamilia'];	
$SubFamilia=$_POST['listSubFamilia'];	
$DescripcionImp=$_POST['txtDescripcionImp'];	

		
if(!$Implemento==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");
$insertarImplemento = "INSERT INTO `ComImplemento` (`Id_Implemento`, `NumImpl`, `Implemento`, `Fk_Familia`, `Fk_SubFamilia`, `DescripcionImp`) VALUES (NULL, '$NumImpl', '$Implemento', '$Familia', '$SubFamilia', '$DescripcionImp');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarImplemento);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

<form action="#" method="post" name="formBuscarImplemento" enctype="multipart/form-data">

<div  >
  <table width="100%"  border="1">
    <tr>
      <td colspan="2"  ><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Implemento:</th>
      <td width=""><input name="txtImplementoB" type="text" id="txtImplementoB" size="30"/>
		</td>
	</tr>

    <tr>
      <th width="">Numero implemento:</th>
      <td width=""><input name="NumNumImplB" type="text" id="NumNumImplB" size="30"/>
		</td>
    </tr>	  
	  
<tr>
      <th width="">Familia:</th>
   <td width=""><input name="TextFamiliaB" type="text" id="TextFamiliaB" size="30"/>
    </tr	  
	  
 <tr>
      <th width="">SubFamilia :</th>
     <td width=""><input name="TextSubFamiliaB" type="text" id="TextSubFamiliaB" size="30"/>
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
<th colspan=\"8\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Implementos</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>NumImpl</B></TD>
<TD><B>Implemento</B></TD>
<TD><B>Familia</B></TD>
<TD><B>SubFamilia</B></TD>
<TD><B>Descripcion</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Implemento=$_POST['txtImplementoB'];
$NumImpl=$_POST['NumNumImplB'];
$Familia=$_POST['TextFamiliaB'];	
$SubFamilia=$_POST['TextSubFamiliaB'];	

	
include("../Conexion/conexion.php");
$queryImplementoB = $mysqli -> query ("SELECT * FROM `VistaImplemento` WHERE `NumImpl` LIKE '%$NumImpl%' AND `Implemento` LIKE '%$Implemento%' AND `Familia` LIKE '%$Familia%' AND `SubFamilia` LIKE '%$SubFamilia%'  ORDER BY `Implemento` ASC");
  
 while ($filaImplementoB = mysqli_fetch_array($queryImplementoB))

{
echo "<TR>\n";
echo "<td>".$filaImplementoB['Id_Implemento']."</td>\n";
echo "<td>".$filaImplementoB['NumImpl']."</td>\n";
echo "<td>".$filaImplementoB['Implemento']."</td>\n";
echo "<td>".$filaImplementoB['Familia']."</td>\n";
echo "<td>".$filaImplementoB['SubFamilia']."</td>\n";	 
echo "<td>".$filaImplementoB['DescripcionImp']."</td>\n";		 


echo "<td>"."<a href=\"/sistema/Venta/FormImpleEditar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormImpleBorrar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoBorrar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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