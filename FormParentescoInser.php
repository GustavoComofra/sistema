<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Parentesco</title>
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
	window.location.href = '/sistema/index.php';
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

<form action="#" method="post" name="formParentesco" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label><h3>Parentesco</h3></label></td>
    </tr>
    <tr>
      <th width="">Parentesco:</th>
      <td width=""><input name="txtParentesco" type="text" id="txtParentesco" size="50" required/>
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

$Parentesco=$_POST['txtParentesco'];	
		
if(!$Parentesco==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");
$insertarParentesco = "INSERT INTO `Parentesco` (`idParentesco`, `Parentesco`) VALUES (NULL, '$Parentesco');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarParentesco);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarParentesco" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="1">
    <tr>
      <td colspan="2" align="center"><label><h3>Buscar</h3></label></td>
    </tr>
    <tr>
      <th width="">Parentesco:</th>
      <td width=""><input name="txtParentescoB" type="text" id="txtParentescoB" size="30"/>
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
<th colspan=\"2\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Parentescos</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Parentesco</B></TD>
</TR>
";		
$ParentescoB=$_POST['txtParentescoB'];	

include("Conexion/conexion.php");	
$queryParentescoB = $mysqli -> query ("SELECT * FROM `Parentesco` WHERE `Parentesco` LIKE '%$ParentescoB%' ORDER BY `Parentesco` ASC");

 while ($filaParentescoB = mysqli_fetch_array($queryParentescoB))

{
echo "<TR>\n";
echo "<td>".$filaParentescoB['idParentesco']."</td>\n";
echo "<td>".$filaParentescoB['Parentesco']."</td>\n";

//echo "<td>"."<a href=\"/sistema/FormClienEditar.php?Id_Parentesco=".$filaParentescoB['Id_Parentesco']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

//echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormClienBorrar.php?Id_Parentesco=".$filaParentescoB['Id_Parentesco']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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