<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
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
 <title>Provincia</title>
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

<form action="#" method="post" name="formProvincia" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario Provincia</label></td>
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
include("Conexion/conexion.php");
  
$queryPais = $mysqli -> query ("SELECT * FROM `Pais`");


 while ($valoresPais = mysqli_fetch_array($queryPais))

		  
		  {

 echo '<option value="'.$valoresPais[Id_Pais].'">'.$valoresPais[Pais].'</option>';
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
include("Conexion/conexion.php");		  
$insertarProvincia = "INSERT INTO `Provincia` (`Id_Provincia`, `Provincia`, `PaisP`) VALUES (NULL, '$Provincia', '$Pais');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarProvincia);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscar" enctype="multipart/form-data">

<div align="">
  <table width=""  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
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

include("Conexion/conexion.php");	
$queryProvinciaB = $mysqli -> query ("SELECT * FROM `ComVisProvPais` WHERE `Provincia` LIKE '%$Provincia%' AND `Pais` LIKE '%$Pais%' AND `Borrar` LIKE 'No'");
  
 while ($filaProvinciaB = mysqli_fetch_array($queryProvinciaB))

{
echo "<TR>\n";
echo "<td>".$filaProvinciaB['Id_Provincia']."</td>\n";
echo "<td>".$filaProvinciaB['Provincia']."</td>\n";
echo "<td>".$filaProvinciaB['Pais']."</td>\n";

echo "<td>"."<a href=\"/sistema/FormProvEditar.php?Id_Provincia=".$filaProvinciaB['Id_Provincia']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormProvBorrar.php?Id_Provincia=".$filaProvinciaB['Id_Provincia']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoBorrar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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