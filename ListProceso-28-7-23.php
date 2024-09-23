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
 <title>Listado de Procesos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.imgEfcListProceso{

width: 40px;
height: 40px;
border-radius: 50% 50%;

}
.Advertencia{
color: red;
}

.imgEfcListProceso:hover {
width: 100%;
height: 100%;
}
</style>
</head>
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


	
<table border=1   class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="10" align="Left" bgcolor=#5D81F5>

 <form name="formPersonal" method="post" action="#">
        <p>

    <label for="txtProceso">Proceso:</label>
   <input name="txtProceso" type="text" id="txtProceso" size="30" value="<?= isset($_POST['txtProceso']) ? $_POST['txtProceso'] : '' ?>" >

   <label for="txtCod">Cod:</label>
   <input name="txtCod" type="text" id="txtCod" size="10" value="<?= isset($_POST['txtCod']) ? $_POST['txtCod'] : '' ?>" >
   <label for="txtProducto">Producto:</label>
   <input name="txtProducto" type="text" id="txtProducto" size="10" value="<?= isset($_POST['txtProducto']) ? $_POST['txtProducto'] : '' ?>" >
   <input type="submit" class="btn btn-success" target="_blank" name="btnEnviar" id="btnEnviar" value="Buscar" />
<a href="/sistema/FormProcesoNuevo.php"><img src="../sistema/img/NuevoIcono.png" alt="Nuevo Proceso" width="40" height="40"></a>
<a href="/sistema/GraficoProcesos.php" target="_blank">
      <img src="../sistema/img/iconoGrafico.png" alt="iconoGrafico"  width="40" height="40"></a>
    </p>
 
   
    
  </form>
  <p>Listado Procesos</p>
  </td>
</tr>
<TD ><B>Img</B></TD>
<TD ><B>Id</B></TD>
<TD><B>Proceso</B></TD>
<TD><B>Cod</B></TD>
<TD><B>Producto</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>ver</B></TD>
<TD><B>Cad</B></TD>
<TD><B>Editar</B></TD>
</TR>

<p>
	</div>
  
</div>	 
  <?php
$Cod=$_POST["txtCod"];
$Producto=$_POST["txtProducto"];
$Proceso=$_POST["txtProceso"];
$userVal=$_SESSION['usuario'];

	
include("Conexion/conexion.php");



$queryProceso = $mysqli -> query ("SELECT * FROM `VisProceso` WHERE `Proceso` LIKE '%$Proceso%' AND `ProductoProceso` LIKE '%$Cod%' AND `Producto` LIKE '%$Producto%' AND `Baja` LIKE 'No' ORDER BY `id_proceso` ASC");

 while ($filaProceso = mysqli_fetch_array($queryProceso))
 
{
echo "<TR>\n";
echo '<td>'.'<img class="imgEfcListProceso"  src="'.$filaProceso['imgprod'].'"/>'.'</td>';
echo "<td>".$filaProceso['id_proceso']."</td>\n";

echo "<td>".$filaProceso['Proceso']."</td>\n";
echo "<td>".$filaProceso['ProductoProceso']."</td>\n";
echo "<td>".$filaProceso['Producto']."</td>\n";

echo "<td>".$filaProceso['FechaInicio']."</td>\n";

echo "<td>"."<a href=\"/sistema/VistaProceso.php?id_proceso=".$filaProceso['id_proceso']."\" ><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a>"."</td>\n";

echo "<td>"."<a href=\"/sistema/VistaProcesoCadena.php?id_proceso=".$filaProceso['id_proceso']."\" ><img src=\"../sistema/img/iconoCadena.png\" alt=\"iconoCadena\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$filaProceso['id_proceso']."\" ><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a>"."</td>\n";

if($userVal=="BenjaS"||$userVal=="gustavog"||$userVal=="MarianoP"||$userVal=="EduardoP"||$userVal=="DiegoP"){
  echo "<td>"."<a href=\"/sistema/ValidaProceso.php?id_proceso=".$filaProceso['id_proceso']."\" ><img src=\"../sistema/img/iconoValidar.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a>"."</td>\n";
 }
echo "</TR>\n";

 }


?>

    </div>
  </div>
</div>	



</body>
</html>