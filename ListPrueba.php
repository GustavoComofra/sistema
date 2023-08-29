<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ListGrafico</title>
<script type="text/javascript" src="/sistema/js/Archivo.js"></script>
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>
  <body>
	  
	 	<section>

</section>
<table border=1 align="center">
<tr>
<td colspan="6" align="center" bgcolor="#9DD3AF">

  <form name="form1" method="post" action="/sistema//FormArticulos/ListadoArticulos.php">
    <input class="red-input"  name="codigo" type="text" autofocus="autofocus" id="codigo" title="Codigo"  onkeyup="validaCuit()">
<h1 id="AvPrueba"></h1>
 <?php
$time = time();
$Dia=date("Y-m-d");
echo $Dia;
//echo "-";
//echo "Hora: ".date("H:i:s");	  
?>
	  
  </form>
  <p>Listado horario</p>
  </td>
</tr>
<TR bgcolor="#E6E7E8">

<TD><B>Id</B></TD>
<TD><B>CUIT</B></TD>
<TD><B>Times</B></TD>
<TD><B>Dia</B></TD>
<TD><B>DiaIngr</B></TD>
<TD><B>DiaSal</B></TD>
<!-- <TD><B>Horas</B></TD> -->

</TR>
<?php
$CUIT=$_POST["codigoSal"];
echo $CUIT;
include("Conexion/conexion.php");

$query1 = $mysqli -> query ("SELECT * FROM `ComHorario` WHERE `CUIT` = '$CUIT' ORDER BY `ComHorario`.`Times` DESC LIMIT 1");

  while ($fila = mysqli_fetch_array($query1))

{
echo "<TR>\n";
echo "<td>".$fila['idComHorario']."</td>\n";
echo "<td>".$fila['CUIT']."</td>\n";
echo "<td>".$fila['Times']."</td>\n";
echo "<td>".$fila['Dia']."</td>\n";
echo "<td>".$fila['DiaIngr']."</td>\n";
echo "<td>".$fila['DiaSal']."</td>\n";
//$varDiaSal = $fila['DiaSal'];
//$varDiaIngr = $fila['DiaIngr'];
//$varHoras = $varDiaSal-$varDiaIngr;
//echo "<td>".$varHoras."</td>\n";
echo "</TR>\n";
}
	


?>



</body>
</html>
