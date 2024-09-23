<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/RRHH/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
<style type="text/css">
body {
    background-image: url(/RRHH/img/FondoPanel1.jpeg);
}
</style>
<title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
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
	

	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
	
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
<td colspan="13" align="Left" bgcolor=#5D81F5>

 <form name="form1" method="post" action="#">
    <p>

        <label for="txtDesde">Desde:</label>
 <input name="txtDesde" type="date" id="txtDesde" size="50" value="<?php 
		  $fecha_actual = date("Y-m-d");

$varFechaFinal = date("Y-m-d",strtotime($fecha_actual."- 180 days"));
		  echo $varFechaFinal;
		  
		  ?>"  />
		
		
 <label for="txtHasta">Hasta:</label>
				  <input name="txtHasta" type="date" id="txtHasta" size="50" value="<?php 
		  $fecha_actual = date("Y-m-d");

$varFechaFinal = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
		  echo $varFechaFinal;
		  
		  ?>"  />



		
    </p>
    <p>
   <label for="txtCliente">Cliente:</label>
      <input name="txtCliente" type="text" id="txtCliente">
  <label for="txtConcesionario">Concesionario:</label>
   <input name="txtConcesionario" type="text" id="txtConcesionario">
    
    </p>
    <p> 
		<label for="txtChasis">Chasis</label>
		   <input name="txtChasis" type="text" id="txtChasis">
		      		<label for="txtReclamo">Reclamo</label>
		   <input name="txtReclamo" type="text" id="txtReclamo">
		
			<label for="txtImplemento">Implemento</label>
		   <input name="txtImplemento" type="text" id="txtImplemento">
		

  </p>
      <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Buscar" />	 
      <a href="/sistema/GraficoReclamo.php">
      <img src="../sistema/img/iconoGrafico.png" alt="iconoGrafico" width="40" height="40"></a>
  </form>
  <p>Listado reclamo</p>
  </td>
</tr>
<TD><B>Num</B></TD>
<TD><B>Reclamo</B></TD>
<TD><B>TipoReclamo</B></TD>
<TD><B>Implemneto</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>Final</B></TD>
<TD><B>Cierre</B></TD>
<TD><B>Chasis</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Consec</B></TD>		

<TD><B>Ver</B></TD>
<TD><B>Editar</B></TD>
<!--<TD><B>Supen</B></TD>-->
</TR>

<p>
	</div>
  
</div>	 
  <?php


$Reclamo=$_POST["txtReclamo"];
$FechaDesde=$_POST["txtDesde"];
$FechaHasta=$_POST["txtHasta"];
$Cliente=$_POST["txtCliente"];
$Concesionario=$_POST["txtConcesionario"];
$Chasis=$_POST["txtChasis"];
$Implemento=$_POST["txtImplemento"];
	


include("Conexion/conexion.php");	
$queryComVisReclamo = $mysqli -> query ("SELECT * FROM `ComVisReclamo` WHERE `Reclamo` LIKE '%$Reclamo%' AND `Fecha` >= '$FechaDesde' AND `Fecha` <= '$FechaHasta' AND `Concesionario` LIKE '%$Concesionario%' AND `Cliente` LIKE '%$Cliente%' AND `Chasis` LIKE '%$Chasis%' AND `Implemento` LIKE '%$Implemento%' AND `Sup` LIKE 'No' ORDER BY `Fecha` ASC");
	
	/*SELECT * FROM `ComVisReclamo` WHERE `Reclamo` LIKE '%%' AND `Concesionario` LIKE '%%' AND `Cliente` LIKE '%%' AND `Chasis` LIKE '%%' AND `NumImplemento` LIKE '%18%' AND `Sup` LIKE 'No' ORDER BY `Fecha` ASC
		
		$queryComVisReclamo = $mysqli -> query ("SELECT * FROM `ComVisReclamo` WHERE `Reclamo` LIKE '%%' AND `Concesionario` LIKE '%%' AND `Cliente` LIKE '%%' AND `Chasis` LIKE '%$Chasis%' AND `NumImplemento` LIKE '%$NumImplemento%' AND `Sup` LIKE 'No' ORDER BY `Fecha` ASC");*/
		
  
 while ($filaComVisReclamo = mysqli_fetch_array($queryComVisReclamo))

{
echo "<TR>\n";
//echo "<td>".$filaComVisReclamo['IdReclamo']."</td>\n";
$varComVisReclamo=$fila['IdReclamo'];
echo "<td>".$filaComVisReclamo['NumReclamo']."</td>\n";
echo "<td>".$filaComVisReclamo['Reclamo']."</td>\n";	 
echo "<td>".$filaComVisReclamo['TipoReclamo']."</td>\n";
echo "<td>".$filaComVisReclamo['Implemento']."</td>\n";	
$varImplemento=	$filaComVisReclamo['Implemento'];
echo "<td>".$filaComVisReclamo['Fecha']."</td>\n";
$varFecha=	$filaComVisReclamo['Fecha'];	 
echo "<td>".$filaComVisReclamo['FechaFinal']."</td>\n";
echo "<td>".$filaComVisReclamo['FechaCierre']."</td>\n";
echo "<td>".$filaComVisReclamo['Chasis']."</td>\n";	
echo "<td>".$filaComVisReclamo['Cliente']."</td>\n";	
echo "<td>".$filaComVisReclamo['Concesionario']."</td>\n";	 
	 

echo "<td>"."<a href=\"/sistema/VistaReclamo.php?NumReclamo=".$filaComVisReclamo['NumReclamo']."\"><img src=\"../sistema/img/VerIcono.png\" alt=\"BtnIconoVer\" width=\"20\" height=\"20\"></a></td>\n";
	 
echo "<td>"."<a href=\"/sistema/FormReclamoEditar.php?NumReclamo=".$filaComVisReclamo['NumReclamo']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
//echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/RRHH/#?NumReclamo=".$filaComVisReclamo['NumReclamo']."\"><img src=\"../RRHH/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "</TR>\n";
}
	 
	 
mysqli_close($mysqli);


?>

	<table border=0  >
<tr>
<td colspan="14"   bgcolor="#9DD3AF">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
	['Implemento', 'COUNT(`ComVistImpleRecl`.`Implemento`)'],
			<?php


$Reclamo=$_POST["txtReclamo"];
$FechaDesde=$_POST["txtDesde"];
$FechaHasta=$_POST["txtHasta"];
$Cliente=$_POST["txtCliente"];
$Concesionario=$_POST["txtConcesionario"];
$Chasis=$_POST["txtChasis"];
	


include("Conexion/conexion.php");	
$queryComVisReclamo1 = $mysqli -> query ("SELECT * FROM `ComVistCuentaImpRecl` ORDER BY `ComVistCuentaImpRecl`.`Implemento` ASC");
  
 while ($fila = mysqli_fetch_array($queryComVisReclamo1))
{
//echo $fila['NombreArticulo'];
//echo $fila['StockMaximo'];
echo "['".$fila["Implemento"]."', ".$fila["CuentaImp"]."],";
}

?>

        ]);
        var options = {
          title: 'Grafico Reclamos implementos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

   <div id="piechart_3d" style="width: 500px; height: 400px;"></div>

   



    </div>
  </div>
</div>	


	

</body>
</html>
