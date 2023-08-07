<?php	
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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
	
<link href="http://interno.comofrasrl.com.ar/sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Listado de personal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
.imgEfcListPersonal{
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50% 50%;

}
.Advertencia{
  color: red;
}


</style>
<?php	

include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
  

?>
<body>

<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">


	
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="10" align="Left" bgcolor=#5D81F5>

 <form name="formPersonal" method="post" action="#">



        <p>

    <label for="txtCuit">CUIL:</label>
   <input type="text" name="txtCuit" value="<?= isset($_POST['txtCuit']) ? $_POST['txtCuit'] : '' ?>" size="11" > 
   <label for="txtLegajo">Legajo:</label>
   <input type="text" name="txtLegajo" value="<?= isset($_POST['txtLegajo']) ? $_POST['txtLegajo'] : '' ?>" size="11"> 
    </p>
    <p>
   <label for="txtNombre">Nombre:</label>
      <input type="text" name="txtNombre" value="<?= isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '' ?>">      
      <label for="txtApellido">Apellido:</label>
   <input type="text" name="txtApellido" value="<?= isset($_POST['txtApellido']) ? $_POST['txtApellido'] : '' ?>"  >

   <label for="txtBaja">Baja:</label>
   <input type="text" name="txtBaja" value="<?= isset($_POST['txtBaja']) ? $_POST['txtBaja'] : '' ?>"  size="5">
	  </p>

    <input type="submit" class="btn btn-success" target="_blank" name="btnEnviar" id="btnEnviar" value="Buscar" />
    <a href="/sistema/GraficoPersonal.php" target="_blank">
      <img src="../sistema/img/iconoGrafico.png" alt="iconoGrafico"  width="40" height="40"></a>

      <a href="/sistema/VistaInformePersonal.php" target="_blank">
      <img src="../sistema/img/iconoInforme.png" alt="iconoInforme" width="40" height="40"></a>

      <a href="/sistema/VistaOrganigrama.php" target="_blank">
      <img src="../sistema/img/IconoOrganigrama.png" alt="IconoOrganigrama" width="40" height="40"></a>
      <a href="/sistema/InforCumple.php" target="_blank">
      <img class="imgEfcListPersonal" src="../sistema/img/imgCumple.JPG" alt="imgCumple" ></a>
  </form>
  <p>Listado Personal</p>
  </td>
</tr>
<TD ><B>Imagen</B></TD>
<TD><B>Legajo</B></TD>
<TD><B>Cuit</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Sector</B></TD>
<TD><B>Relacion</B></TD>
<TD><B>Baja</B></TD>
<TD><B>ver</B></TD>
<TD><B>Editar</B></TD>

</TR>

<p>
	</div>
  
</div>	 
  <?php

$FechaIngreso=$_POST["txtDesde"];
$Legajo=$_POST["txtLegajo"];
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];
$Baja=$_POST["txtBaja"];

	
include("Conexion/conexion.php");

$queryComEmpleado = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `CUIT_Empl` LIKE '%$Cuit%' AND `Legajo` LIKE '%$Legajo%' AND `Nombres` LIKE '%$Nombre%' AND `Aprobado` NOT LIKE 'No' AND `Apellidos` LIKE '%$Apellido%' AND `Baja` LIKE '%$Baja%' ORDER BY `Apellidos` ASC");



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

echo "<td>".$filaComEmpleado['Baja']."</td>\n";

echo "<td>"."<a href=\"/sistema/VistaPersonal.php?IdPersonal=".$filaComEmpleado['IdPersonal']."\" target=\"_blank\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n";
echo "<td>"."<a href=\"/sistema/FormPersonalEditar.php?IdPersonal=".$filaComEmpleado['IdPersonal']."\" target=\"_blank\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";

echo "</TR>\n";

 }

?>

    </div>
  </div>
</div>	

</body>
</html>