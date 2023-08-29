<?php	
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
?>	

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/RRHH/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">

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

 <form name="form1" method="post" action="#">
    <p>

        <label for="txtDesde">Desde:</label>
        <input name="txtDesde" type="date" id="txtDesde" value="<?php echo date("Y-m-d");?>" size="15">
 <label for="txtHasta">Hasta:</label>
        <input name="txtHasta" type="date" id="txtHasta" value="<?php echo date("Y-m-d");?>" size="15"> 

    </p>
    <p>
   <label for="txtNombre">Nombre:</label>
      <input name="txtNombre" type="text" id="txtNombre" size="30">
  <label for="txtApellido">Apellido:</label>
   <input name="txtApellido" type="text" id="txtApellido" value="" size="30">
    <label for="txtCuit">Cuit:</label>
   <input name="txtCuit" type="text" id="txtCuit" size="20">
    </p>
    <p> 
      <label for="NumValor">Valor extra:</label>
      <input type="number" name="NumValor" id="NumValor" value="0">
<input type="submit" name="Submit" value="Buscar">
  </p>
  </form>
  <p>Listado horario</p>
  </td>
</tr>
<TD ><B>Cuit</B></TD>
<TD><B>Nombres</B></TD>
<TD><B>Apellidos</B></TD>
<TD><B>DiaIngr</B></TD>
<TD><B>DiaSal</B></TD>
<TD><B>Horas</B></TD>
<TD><B>Suma</B></TD>
<TD><B>Extras</B></TD>
<TD><B>Valor</B></TD>
<TD><B>Tipo</B></TD>
</TR>

<p>
	</div>
  
</div>	 
  <?php

$DatoFecha=$_POST["txtDesde"];
$DatoHasta=$_POST["txtHasta"];
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];
$NumValor=$_POST["NumValor"];

include("Conexion/conexion.php");


$query1 = $mysqli -> query ("SELECT * FROM `ComVistaHorarios` WHERE `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' AND `Dia` >= '$DatoFecha' AND `Dia` <= '$DatoHasta' AND `CUIT_Empl` LIKE '%$Cuit%' ORDER BY `ComVistaHorarios`.`Dia` ASC");


 while ($fila = mysqli_fetch_array($query1))

{
echo "<TR>\n";
echo "<td>".$fila['CUIT_Empl']."</td>\n";
$varCuit=$fila['CUIT_Empl'];
echo "<td>".$fila['Nombres']."</td>\n";
echo "<td>".$fila['Apellidos']."</td>\n";
echo "<td>".$fila['DiaIngr']."</td>\n";
echo "<td>".$fila['DiaSal']."</td>\n";
echo "<td>".$fila['Horas']."</td>\n";
$varHoras=round($fila['Horas']);
$varSumaHoras+=$fila['Horas'];
 echo "<td>".$varSumaHoras."</td>\n";

	
	  if($varHoras >= 9){
	$varExtras=round($varHoras-9);
}else{$varCero=0;}  
	  
//$varExtras=$varHoras-9;

$varLimExtra=9;

if($varExtras <= 0){
	echo "<td>".$varCero."</td>\n";
}else{echo "<td>".abs($varExtras)."</td>\n";	}	  
$varCalculoHora=$NumValor*$varExtras;

// formato nacional italiano con 2 decimales`
setlocale(LC_MONETARY, 'en_US.utf8');
//echo money_format('%.2n', $varCalculoHora) . "\n";
	  
echo "<td>".money_format('%.2n', $varCalculoHora)."</td>\n";
$varSumaExtras+=$varExtras;
echo "<td>".$fila['TipoHora']."</td>\n";
echo "</TR>\n";
$varSumaTotal+=$varSumaHoras;
$varSumaCalculoHora+=$varCalculoHora;

  }
	
echo "<TR>\n";	  
echo "<td colspan=\"6\" align=\"right\">".""."</td>\n";
//echo "<td>".""."</td>\n";
echo "<td>".$varSumaHoras."</td>\n";
echo "<td>".$varSumaExtras."</td>\n";
	

echo "<td>".money_format('%.2n', $varSumaCalculoHora)."</td>\n";
  
echo "</TR>\n";


?>
   
    </div>
  </div>
</div>	

</body>
</html>
