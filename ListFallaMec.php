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
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>FallaMecanica</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
	/*
include ("header.php");
	
session_start();
	$u = $_POST['txtUsuario'];
	*/
?>

</head>
<body>
	
<?php	
/*
session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}*/
?>	


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
//include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="" align="Left" bgcolor=#5D81F5>
		
 
		
<?php
	
/*echo $NumReclamo;*/
$NumReclamo=$_GET['NumReclamo'];
$varNumReclamo = $NumReclamo=$_GET['NumReclamo'];
$queryvarNumReclamo = $mysqli -> query ("SELECT * FROM `ComVerReclamo` WHERE = ".$varNumReclamo.";");

$row = mysqli_fetch_assoc($queryvarNumReclamo);
echo "

<th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Falla Mecanicas</th>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Num</B></TD>
<TD><B>Falla</B></TD>
<TD><B>Detalle</B></TD>
</TR>
";
	
	
include("Conexion/conexion.php");	
$queryComVistFallaRecl = $mysqli -> query ("SELECT * FROM `ComVistFallaRecl` WHERE = ".$NumReclamo." AND `FkTipoFalla` = 2 ORDER BY `ItemFalla` ASC");
  
 while ($filaComVistFallaRecl = mysqli_fetch_array($queryComVistFallaRecl))

{
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl['Id_FallaRecl']."</td>\n";
$varCuit=$filaComVistFallaRecl['Id_FallaRecl'];

echo "<td>".$filaComVistFallaRecl['Reclamo']."</td>\n";
echo "<td>".$filaComVistFallaRecl['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl['Detalle']."</td>\n";	

echo "</TR>\n";
}
	 
	 
mysqli_close($mysqli);
	





?>		
	 	
</td>
</tr>
	</table>	
    </div>
	</div>
</div>	

	
</body>
</html>