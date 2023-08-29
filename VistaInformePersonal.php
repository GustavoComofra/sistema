<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Listado Personal</title>
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

<style>
.imgEfc{
  position: relative;
	
  width: 100px;
  height: 100px;

 border-radius: 50% 50%;
}

.imgEfc:hover {

	
width: 300px;
height: 300px;


}

</style>
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


<div class="container">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
 <?php
include("Conexion/conexion.php");

echo $IdPersonal;
$IdPersonal=$_GET['IdPersonal'];
$varIdPersoanl = $IdPersonal=$_GET['IdPersonal'];
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `ComVistaEmpleado1`.`IdPersonal` = ".$IdPersonal.";");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>


<div align="">
  <table width="568" border="" class="table table-striped">
<thead>
<tr align="center">
     
		<td colspan="2" rowspan="2"> <img src="../sistema/img/Icono.png" alt="Logo" width="80" height="80"></td>
<td colspan="2" rowspan="2">   <div align="center"><h1>Informe Personal</h1>



</div> </td>
        <td colspan="2" rowspan="2"><div align="center" >
        </div></td>
   
    </tr>
    
  </thead>
    
	<TD ><B>Imagen</B></TD>
<TD><B>Legajo</B></TD>
<TD><B>Cuit</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Sector</B></TD>
<TD><B>Relacion</B></TD>

</TR>

<?php

$FechaIngreso=$_POST["txtDesde"];
$Legajo=$_POST["txtLegajo"];
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];

	
include("Conexion/conexion.php");

$queryComEmpleado = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `CUIT_Empl` LIKE '%$Cuit%' AND `Legajo` LIKE '%$Legajo%' AND `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' AND `Baja` LIKE 'No' ORDER BY `Nombres` ASC");



 while ($filaComEmpleado = mysqli_fetch_array($queryComEmpleado))

{
echo "<TR>\n";
echo "<td>".'<img  src="'.$filaComEmpleado['Foto'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaComEmpleado['Legajo']."</td>\n";

echo "<td>".$filaComEmpleado['CUIT_Empl']."</td>\n";
echo "<td>".$filaComEmpleado['Nombres']."</td>\n";
echo "<td>".$filaComEmpleado['Apellidos']."</td>\n";

echo "<td>".$filaComEmpleado['SectorFk']."</td>\n";
echo "<td>".$filaComEmpleado['Relacion']."</td>\n";


echo "</TR>\n";

 }

?>




  </table>
	

</div>
    </div>
  </div>
</div>	

	
</body>
</html>