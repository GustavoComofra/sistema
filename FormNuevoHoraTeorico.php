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
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Horario teorico nuevo</title>
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

<?php
include("Conexion/conexion.php");

echo $IdPersonal;
$IdPersonal=$_GET['IdPersonal'];
$varIdPersoanl = $IdPersonal=$_GET['IdPersonal'];
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `ComEmpleado`.`IdPersonal` = ".$IdPersonal.";");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>
	

<form action="#" method="post" name="FormInsHorTeor" >

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

	 
<div>
  <table width="" border="1" class="table table-striped">
    <tr>
      <td colspan="4" align="center"><label>Agregar horarios</label></td>	
    </tr>
<tr>
      <td>Ingreso</td>
      <td>Salida</td>
      <td>Tipo</td>
    </tr>

<?php 
$HorarioInicio=date("Y-m-d 06:00:00"); 
//echo $HorarioInicio;	  
$HorarioFinal=date("Y-m-d 15:00:00"); 
//echo $HorarioFinal; 
?>
 <tr>
<td><input type="datetime-local" name="txtDiaIngr"  id="txtDiaIngr"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal"  id="txtDiaSal"  value=""  /></td>
<td>
	<select name="listTipo" size="1" id="listTipo">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>

 <tr>
<td><input type="datetime-local" name="txtDiaIngr1"  id="txtDiaIngr1"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal1"  id="txtDiaSal1"  value="" /></td>
<td>
	<select name="listTipo1" size="1" id="listTipo1">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>

 <tr>
<td><input type="datetime-local" name="txtDiaIngr2"  id="txtDiaIngr2"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal2"  id="txtDiaSal2"  value="" /></td>
<td>
	<select name="listTipo2" size="1" id="listTipo2">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>
	  
 <tr>
<td><input type="datetime-local" name="txtDiaIngr3"  id="txtDiaIngr3"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal3"  id="txtDiaSal3"  value="" /></td>
<td>
	<select name="listTipo3" size="1" id="listTipo3">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>
	  
 <tr>
<td><input type="datetime-local" name="txtDiaIngr4"  id="txtDiaIngr4"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal4"  id="txtDiaSal4"  value="" /></td>
<td>
	<select name="listTipo4" size="1" id="listTipo4">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>
	  
 <tr>
<td><input type="datetime-local" name="txtDiaIngr5"  id="txtDiaIngr5"  value="" /></td>	 
<td><input type="datetime-local" name="txtDiaSal5"  id="txtDiaSal5"  value="" /></td>
<td>
	<select name="listTipo5" size="1" id="listTipo5">
        <option value="Normal">Normal</option>
        <?php
include("Conexion/conexion.php");
$queryTipoHorario = $mysqli -> query ("SELECT * FROM `ComTipoHorario` ORDER BY `ComTipoHorario`.`TipoHorario` ASC");
while ($valoresTipoHorario = mysqli_fetch_array($queryTipoHorario))
{

 echo '<option value="'.$valoresTipoHorario[TipoHorario].'">'.$valoresTipoHorario[TipoHorario].'</option>';
}
	?>
</select></td>

</tr>
	  
<tr>
	
      <td colspan="7"><label>
        <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label></td></tr>
    
  </table>
	  </div>
	 
<?php
$CUIT=$varCUIT_Empl;
//$Dia=date("Y-m-d");
$check=$_POST['check'];
$DiaIngr=$_POST['txtDiaIngr'];	
//CONVIERTE EL DATIME EN DATE
$Dia =  date( "Y-m-d",strtotime($DiaIngr));	
$DiaSal=$_POST['txtDiaSal'];
$TipoHora=1;
$FkTipoHorario=$_POST['listTipo'];

if(!$DiaIngr==null){
		//echo "<h1>".$Dia. "</h1>";
include("Conexion/conexion.php");	
//INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '12345678910', CURRENT_TIMESTAMP, '2022-04-21', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', 'Normal');
$insertarComHorarioTeorico = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia', '$DiaIngr', '$DiaSal', 1, '$FkTipoHorario');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComHorarioTeorico);	
}	
	 
	
$DiaIngr1=$_POST['txtDiaIngr1'];	
//CONVIERTE EL DATIME EN DATE
$Dia1 =  date( "Y-m-d",strtotime($DiaIngr1));

$DiaSal1=$_POST['txtDiaSal1'];
$FkTipoHorario1=$_POST['listTipo1'];
	 
if(!$DiaIngr1==null){
include("Conexion/conexion.php");		  
$insertarComHorarioTeorico1 = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia1', '$DiaIngr1', '$DiaSal1', '$TipoHora', '$FkTipoHorario1');";

$ejecutar_insertar1=mysqli_query($mysqli,$insertarComHorarioTeorico1);	
}
	
	

$DiaIngr2=$_POST['txtDiaIngr2'];
//CONVIERTE EL DATIME EN DATE
$Dia2 =  date( "Y-m-d",strtotime($DiaIngr2));
$DiaSal2=$_POST['txtDiaSal2'];
$FkTipoHorario2=$_POST['listTipo2'];
	 
if(!$DiaIngr2==null){
include("Conexion/conexion.php");		  
$insertarComHorarioTeorico2 = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia2', '$DiaIngr2', '$DiaSal2', '$TipoHora', '$FkTipoHorario2');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComHorarioTeorico2);	
}
	

$DiaIngr3=$_POST['txtDiaIngr3'];
//CONVIERTE EL DATIME EN DATE
$Dia3 =  date( "Y-m-d",strtotime($DiaIngr3));
$DiaSal3=$_POST['txtDiaSal3'];
$FkTipoHorario3=$_POST['listTipo3'];
	 
if(!$DiaIngr3==null){
include("Conexion/conexion.php");		  
$insertarComHorarioTeorico3 = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia3', '$DiaIngr3', '$DiaSal3', '$TipoHora', '$FkTipoHorario3');";

$ejecutar_insertar3=mysqli_query($mysqli,$insertarComHorarioTeorico3);	
}


$DiaIngr4=$_POST['txtDiaIngr4'];
//CONVIERTE EL DATIME EN DATE
$Dia4 =  date( "Y-m-d",strtotime($DiaIngr4));
$DiaSal4=$_POST['txtDiaSal4'];
$FkTipoHorario4=$_POST['listTipo4'];
	 
if(!$DiaIngr4==null){
include("Conexion/conexion.php");		  
$insertarComHorarioTeorico4 = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia4', '$DiaIngr4', '$DiaSal4', '$TipoHora', '$FkTipoHorario4');";

$ejecutar_insertar4=mysqli_query($mysqli,$insertarComHorarioTeorico4);	
}
	
$DiaIngr5=$_POST['txtDiaIngr5'];
//CONVIERTE EL DATIME EN DATE
$Dia5 =  date( "Y-m-d",strtotime($DiaIngr5));
$DiaSal5=$_POST['txtDiaSal5'];
$FkTipoHorario5=$_POST['listTipo5'];
	 
if(!$DiaIngr5==null){
include("Conexion/conexion.php");		  
$insertarComHorarioTeorico5 = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia5', '$DiaIngr5', '$DiaSal5', '$TipoHora', '$FkTipoHorario5');";

$ejecutar_insertar5=mysqli_query($mysqli,$insertarComHorarioTeorico5);	
}
	 
?>
		</form>
		

<form name="FormSelecc" method="post" action="">
<script>
$(document).ready(function(){
	$('#checktodos').click(function(){
var val = this.checked;
//alert(val);
$('.lista').each(function(){
$(this).prop('checked',val);
	});
 });
});	
	
</script>
	

</form>	
		
<form name="FormBuscar" method="post" action="#">
<table border=1 class="table table-striped">
<th colspan="7" align="center" bgcolor="#5D81F5">
    <p>
      <label>
    <label for="txtInicio">Fecha Inicio:</label>
        <input name="txtInicio" type="date" id="txtInicio"  size="15">
      </label>
      <label>
    <label for="txtFinal">Fecha Final:</label>

        <input name="txtFinal" type="date" id="txtFinal"  size="15" autocomplete="on" name="partydate" value="<?php echo date("Y-m-d");  ?>" >
      </label>
<input type="submit" name="enviar" value="Buscar">		
    </p>

</th>


	</th>
<TR>

<TD><B>Num</B></TD>
<TD><B>Dia</B></TD>
<TD><B>Ingreso</B></TD>
<TD><B>Salida</B></TD>
<TD><B>Tipo</B>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>

</TR>	
	
	

<?php
	
$DatoFechaInicio=$_POST["txtInicio"];
$DatoFechaFinal=$_POST["txtFinal"];	
	
$CUIT_Empl1=$_POST['txtCUIT_Empl1'];
echo $CUIT_Empl1;
$CUIT=$varCUIT_Empl;	

include("Conexion/conexion.php");	
$queryComHorarioTeorico = $mysqli -> query ("SELECT * FROM `ComHorarioTeorico` WHERE `CuitTeor` = '$CUIT' AND `DiaTeor` >= '$DatoFechaInicio' AND `DiaTeor` <= '$DatoFechaFinal' ORDER BY `ComHorarioTeorico`.`DiaIngrTeor` ASC");
  
 while ($filaComHorarioTeorico = mysqli_fetch_array($queryComHorarioTeorico))
	{
echo "<TR>\n";


echo "<td>".$filaComHorarioTeorico['idComHoraTeor']."</td>\n";
//echo "<td>"."<input type=\"text\" name=\"txtidComHoraTeor\"  id=\"txtidComHoraTeor\" value=\"$var\" size=\"2\"/>"."</td>\n";
echo "<td>".$filaComHorarioTeorico['DiaTeor']."</td>\n";
	
echo "<td>".$filaComHorarioTeorico['DiaIngrTeor']."</td>\n";
echo "<td>".$filaComHorarioTeorico['DiaSalTeor']."</td>\n";
$var = $filaComHorarioTeorico['idComHoraTeor'];
$varCUIT = $filaComHorarioTeorico['CuitTeor'];
$varTimes = $filaComHorarioTeorico['Times'];//Times
$varDia = $filaComHorarioTeorico['DiaTeor'];
$varDiaIngr = $filaComHorarioTeorico['DiaIngrTeor'];
$varDiaSal = $filaComHorarioTeorico['DiaSalTeor'];
$varTipoHora = $filaComHorarioTeorico['TipoHora'];
$varFkTipoHorario = $filaComHorarioTeorico['FkTipoHorario'];
$CUIT=$_POST['txtCUIT_Empl'];
echo "<td>".$filaComHorarioTeorico['FkTipoHorario']."</td>\n";

	 
	 
echo "<td>"."<a href=\"/sistema/FormCategSueldoEditar.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";	 	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormCategSueldoAnular.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoAnular\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";
//echo  $var;

}

mysqli_close($mysqli);		
		
?>


	
		</form>
    </div>
  </div>
</div>	

</body>

	</html>