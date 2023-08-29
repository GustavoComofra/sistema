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
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Listado horarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<form action="#" method="post" name="formHoraVsTeorica" >
<?php


include("Conexion/conexion.php");

$CUIT_Empl=$_GET['CUIT_Empl'];

//echo $DatoFechaFinal;
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComVisEmplHorarioTeor` WHERE `CUIT_Empl` = ".$CUIT_Empl." ");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>	
<br>
<div>
	<table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead> </thead>
    <tr>
      <td colspan="8" align="center"><label>Personal: </label>
		</td>
	
    </tr>
 

	  <tr>
    <th>CUIT: </th>	
<td><input type="text" name="txtCUIT_Empl"  id="txtCUIT_Empl" value="<?php echo $row['CUIT_Empl'];
	$varCUIT_Empl = $row['CUIT_Empl']; ?>" size="11"/></td>		

	<th>Nombres: </th>
<td><input type="text" name="txtNombres"  id="txtNombres" value="<?php echo $row['Nombres'];
	$varNombres = $row['Nombres']; ?>" size="10" /></td>
		
	<th>Apellidos: </th>
<td><input type="text" name="txtApellidos"  id="txtApellidos" value="<?php echo $row['Apellidos'];
	$varApellidos = $row['Apellidos']; ?>" size="10" /></td>
		
	<th>CategSueld: </th>
<td><input type="text" name="txtFk_CategSueld"  id="txtFk_CategSueld" value="<?php echo $row['Fk_CategSueld']; $varFk_CategSueld = $row['Fk_CategSueld']; ?>" size="2" /></td>
		  
    </tr>
 </table>
  </div>

		
<table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead> </thead>
    <tr>
		
    <p>
      <label>
    <label for="txtInicio">Fecha Inicio:</label>
        <input name="txtInicio" type="datetime-local" id="txtInicio"  size="15">
      </label>
      <label>
    <label for="txtFinal">Fecha Final:</label>

        <input name="txtFinal" type="datetime" id="txtFinal"  size="15" autocomplete="on" name="partydate" value="<?php echo date("Y-m-d H:i:s");  ?>" >
	
      </label>
	<input type="submit" name="Submit" value="Buscar">	
    </p>		
		
      <td colspan="7" align="center"><label>Listado horario: </label>
  </td>
</tr>
<TD><B>CuitTeor</B></TD>
<TD><B>CuitReal</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>DiaTeor</B></TD>
<TD><B>IngrTeor</B></TD>
<TD><B>IngrReal</B></TD>
<TD><B>SalTeor</B></TD>
<TD><B>Sal</B></TD>
<TD><B>Horas</B></TD>
<TD><B>Suma</B></TD>
<!--<TD><B>Dia</B></TD>
<TD><B>Valor</B></TD>
<TD><B>Tipo</B></TD>-->
</TR>

  <?php

$CUIT=$varCUIT_Empl;	
$DatoFechaInicio=$_POST["txtInicio"];
$DatoFechaFinal=$_POST["txtFinal"];
	
$DatoFecha=$_POST["txtDesde"];
$DatoHasta=$_POST["txtHasta"];
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];
$NumValor=$_POST["NumValor"];

include("Conexion/conexion.php");
//SELECT * FROM `ComHorarioTeorico` WHERE `CuitTeor` = '$CUIT' AND `DiaTeor` >= '$DatoFechaInicio' AND `DiaTeor` <= '$DatoFechaFinal' ORDER BY `ComHorarioTeorico`.`DiaIngrTeor` ASC

$query1 = $mysqli -> query ("SELECT * FROM `ComVistaHoraVsTeor` WHERE `CUIT` = '$CUIT' AND `CuitTeor` = '$CUIT' AND `DiaTeor` >= '$DatoFechaInicio' AND `DiaTeor` <= '$DatoFechaFinal' ORDER BY `ComVistaHoraVsTeor`.`DiaTeor` ASC");


 while ($fila = mysqli_fetch_array($query1))

{
echo "<TR>\n";
echo "<td>".$fila['CuitTeor']."</td>\n";
echo "<td>".$fila['CUIT']."</td>\n";
echo "<td>".$fila['FkTipoHorario']."</td>\n";
$varCuit=$fila['CuitTeor'];
echo "<td>".$fila['DiaTeor']."</td>\n";
echo "<td>".$fila['DiaIngrTeor']."</td>\n";
echo "<td>".$fila['DiaIngr']."</td>\n";
$DiaIngr = 	 $fila['DiaIngr'];
echo "<td>".$fila['DiaSalTeor']."</td>\n";
echo "<td>".$fila['DiaSal']."</td>\n"; 
$DiaSal = 	 $fila['DiaSal'];
echo "<td>".$fila['Horas']."</td>\n";
//echo "<td>".$fila['CUIT']."</td>\n";
//echo "<td>".$fila['Dia']."</td>\n";

	 
 $varHoras=round($fila['Horas']);
$varSumaHoras+=$fila['Horas'];
echo "<td>".$varSumaHoras."</td>\n";

/*	 if($varHoras >= 9){
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
$varSumaCalculoHora+=$varCalculoHora;*/

  }
	
echo "<TR>\n";	  
echo "<td colspan=\"6\" align=\"right\">".""."</td>\n";
//echo "<td>".""."</td>\n";
echo "<td>".$varSumaHoras."</td>\n";
//echo "<td>".$varSumaExtras."</td>\n";
	

//echo "<td>".money_format('%.2n', $varSumaCalculoHora)."</td>\n";
  
echo "</TR>\n";


?>
     </form>
    </div>
  </div>
</div>	

</body>
</html>
