<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Implementos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
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
</head>
<body>
	
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>	


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formImplementos" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Implementos</label></td>
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

include("Conexion/conexion.php");
  
$queryFamilia = $mysqli -> query ("SELECT * FROM `ComFamiImple` ORDER BY `ComFamiImple`.`Familia` ASC");


 while ($valoresFamilia = mysqli_fetch_array($queryFamilia))

		  
		  {

 echo '<option value="'.$valoresFamilia[Id_FamiImple].'">'.$valoresFamilia[Familia].'</option>';
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

include("Conexion/conexion.php");
  
$querySubFamilia = $mysqli -> query ("SELECT * FROM `ComSubFamiImple` ORDER BY `ComSubFamiImple`.`SubFamilia` ASC");


 while ($valoresSubFamilia = mysqli_fetch_array($querySubFamilia))

		  
		  {

 echo '<option value="'.$valoresSubFamilia[Id_SubFamiImple].'">'.$valoresSubFamilia[SubFamilia].'</option>';
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
include("Conexion/conexion.php");
$insertarImplemento = "INSERT INTO `ComImplemento` (`Id_Implemento`, `NumImpl`, `Implemento`, `Fk_Familia`, `Fk_SubFamilia`, `DescripcionImp`) VALUES (NULL, '$NumImpl', '$Implemento', '$Familia', '$SubFamilia', '$DescripcionImp');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarImplemento);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarImplemento" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
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

	
include("Conexion/conexion.php");//SELECT * FROM `ComVistImplemento` WHERE `NumImpl` LIKE '%$NumImpl%' AND `Implemento` LIKE '%$Implemento%' AND `Familia` LIKE '%$Familia%' AND `SubFamilia` LIKE '%$SubFamilia%' ORDER BY `Implemento` ASC	
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


echo "<td>"."<a href=\"/sistema/FormImpleEditar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormImpleBorrar.php?Id_Implemento=".$filaImplementoB['Id_Implemento']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoBorrar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>
	
  

    </div>
  </div>
</div>	

	
</body>
</html>