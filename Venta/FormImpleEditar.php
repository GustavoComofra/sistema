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

<?php
	$Id_Implemento=$_GET['Id_Implemento']; 
//echo $Id_Implemento; 
$queryImplemento = $mysqli -> query ("SELECT * FROM `ComImplemento` WHERE `Id_Implemento` = ".$Id_Implemento.";");

$rowImplemento = mysqli_fetch_assoc($queryImplemento);
		
		
?>			
		
<form action="#" method="post" name="formImplementos" enctype="multipart/form-data">

  <table width="100%"   >

    <tr>
      <td colspan="2"  ><label>Implementos</label></td>
    </tr>

    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_Implemento" type="text" id="txtId_Implemento" size="50" value="<?php print $rowImplemento['Id_Implemento'];?>"  />
		</td>
    </tr>
	  	  
	  
    <tr>
      <th width="">Implemento:</th>
      <td width=""><input name="txtImplemento" type="text" id="txtImplemento" size="50" value="<?php print $rowImplemento['Implemento'];?>"  />
		</td>
    </tr>

    <tr>
      <th width="">Numero implemento en CMG:</th>
      <td width=""><input name="NumNumImpl" type="numb" id="NumNumImpl" size="50" value="<?php print $rowImplemento['NumImpl'];?>"/>
		</td>
    </tr>

 <tr>
      <th width="">Familia:</th>
   <td><select name="listFamilia" size="1" id="listFamilia">
          <option value="<?php print $rowImplemento['Fk_Familia'];?>"><?php print $rowImplemento['Fk_Familia'];?></option>
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
</tr>  
	  
 <tr>
      <th width="">SubFamilia :</th>
   <td><select name="listSubFamilia" size="1" id="listSubFamilia">
        <option value="<?php print $rowImplemento['Fk_SubFamilia'];?>"><?php print $rowImplemento['Fk_SubFamilia'];?></option>
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
      <td width=""><input name="txtDescripcion" type="text" id="txtDescripcion" size="50" value="<?php print $rowImplemento['Descripcion'];?>" />
		</td>
    </tr>	  
	  
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
			
		</td>	
		
		 </tr>
	  
	</table>

<?php
	
$Id_Implemento=$_POST['txtId_Implemento'];
$Implemento=$_POST['txtImplemento'];
$NumImpl=$_POST['NumNumImpl'];
$Familia=$_POST['listFamilia'];	
$SubFamilia=$_POST['listSubFamilia'];	
$Descripcion=$_POST['txtDescripcion'];	

		
if(!$Implemento==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");
$insertarImplemento = "UPDATE `ComImplemento` SET `NumImpl` = '$NumImpl', `Implemento` = '$Implemento', `Fk_Familia` = '$Familia', `Fk_SubFamilia` = '$SubFamilia',
	 `Descripcion` = '$Descripcion' WHERE `ComImplemento`.`Id_Implemento` = ".$Id_Implemento.";";

$ejecutar_insertar=mysqli_query($mysqli,$insertarImplemento);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>

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

$queryImplementoB = $mysqli -> query ("SELECT * FROM `ComVistImplemento` WHERE `Id_Implemento` = ".$Id_Implemento.";");
  
 while ($filaImplementoB = mysqli_fetch_array($queryImplementoB))

{
echo "<TR>\n";
echo "<td>".$filaImplementoB['Id_Implemento']."</td>\n";
echo "<td>".$filaImplementoB['NumImpl']."</td>\n";
echo "<td>".$filaImplementoB['Implemento']."</td>\n";
echo "<td>".$filaImplementoB['Familia']."</td>\n";
echo "<td>".$filaImplementoB['SubFamilia']."</td>\n";	 
echo "<td>".$filaImplementoB['Descripcion']."</td>\n";		 


echo "<td>"."<a href=\"/sistema/Venta/FormImpleEditar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/Venta/FormImpleBorrar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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