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
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>Horario teorico por personal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
	
<script type="text/javascript">

function volver()
{
	window.location.href = "/RRHH/index.php";
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


	

<form name="formLiqSueldo" method="post" action="#">
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
 </thead>
<td colspan="10" align="Left" bgcolor=#5D81F5>
    <p>
      <label>
    <label for="txtInicio">Fecha Inicio:</label>
        <input name="txtInicio" type="datetime-local" id="txtInicio"  size="15">
      </label>
      <label>
    <label for="txtFinal">Fecha Final:</label>

        <input name="txtFinal" type="datetime" id="txtFinal"  size="15" autocomplete="on" name="partydate" value="<?php echo date("Y-m-d H:i:s");  ?>" >
      </label>
		
    </p>
    <p>
   <label for="txtNombre">Nombre:</label>
      <input name="txtNombre" type="text" id="txtNombre" size="">
  <label for="txtApellido">Apellido:</label>
   <input name="txtApellido" type="text" id="txtApellido" value="" size="">
  <label for="txtCuit">CUIT:</label>
   <input name="txtCuit" type="text" id="txtCuit" value="" size="">
<input type="submit" name="enviar" value="Buscar">
    </p>
  

 
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="7" align="Left" bgcolor=#5D81F5>
	
<script>
$(document).ready(function(){
	$('#checktodos1').click(function(){
var val = this.checked;
//alert(val);
$('.lista1').each(function(){
$(this).prop('checked',val);
	});
 });
});	
	
</script>
	
<!--  <p>Seleccionar personal: 
<input id="checktodos1" name="checktodos1[]" type="checkbox" class="lista1" value="" /></p>-->

  </td>
</tr>
<TD><B>Id</B></TD>
<TD><B>Cuit</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Selc</B></TD>
</TR>
	</div>
  
</div>	 
  <?php
$checktodos1=$_POST["checktodos1"];
 
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];
	  
include("Conexion/conexion.php");

$queryComEmpleado = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `CUIT_Empl` LIKE '%$Cuit%' AND `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' ORDER BY `Nombres` ASC");


 while ($filaComEmpleado = mysqli_fetch_array($queryComEmpleado))

{
echo "<TR>\n";
echo "<td>".$filaComEmpleado['IdPersonal']."</td>\n";
echo "<td>".$filaComEmpleado['CUIT_Empl']."</td>\n";
$varCUit = $filaComEmpleado['CUIT_Empl'];
	 
echo "<td>".$filaComEmpleado['Nombres']."</td>\n";
echo "<td>".$filaComEmpleado['Apellidos']."</td>\n";
	 
echo "<td>"."<input type=\"checkbox\" name=\"checktodos1[]\"  id=\"checktodos1\" class=\"lista1\" value=\"$varCUit\"> </td>\n";

echo "</TR>\n";

  }



?>
  
   </form> 
	<br>	

<form name="FormSelecc" method="post" action="InsSeleccCuitHorTeor.php">
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
      <td colspan="8" align="center"><label>Horario teorico personal: </label>
		</td>
	
    </tr>
 

	  <tr>
    <th>CUIT: </th>	
<td><input type="text" name="txtCUIT_Empl2"  id="txtCUIT_Empl2" value="<?php echo $row['CUIT_Empl'];
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
	
<table border=1 class="table table-striped">
<th colspan="8" align="center" bgcolor="#5D81F5">
<label for="txtCUIT_Empl1">Cuit seleccionado</label>
<input type="text" name="txtCUIT_Empl1"  id="txtCUIT_Empl1" size="11" value="<?php 
																			 
 foreach($_POST['checktodos1'] as $selected)	
	
  {
echo "'".$selected."',";
	
  } 																			 
?>" />	
<span class="">Marcar todos
<input id="checktodos" name="checktodos[]" type="checkbox" class="lista" value="" />
 <input type="submit" class="btn-outline-info" name="btnCopiar" id="btnCopiar" value="Copiar seleccion" />	
</th>


	</th>
<TR>

<TD><B>Id</B></TD>
<TD><B>Dia</B></TD>
<TD><B>Ingreso</B></TD>
<TD><B>Salida</B></TD>
<!--<TD><B>Tipo</B></TD>-->
<TD><B>Editar</B></TD>
<TD><B>Copiar</B></TD>
<TD><B>Borrar</B></TD>
<TD><B>Sel</B></TD>
</TR>		

<?php
 foreach($_POST['checktodos1'] as $selected1)	

  {
//echo "'".$selected1."',";

  } 

	
//echo $CUIT_Empl1;
$CUIT=$varCUIT_Empl;
	
$DatoFechaInicio=$_POST["txtInicio"];
$DatoFechaFinal=$_POST["txtFinal"];


include("Conexion/conexion.php");
	
$queryComHorarioTeorico = $mysqli -> query ("SELECT * FROM `ComHorarioTeorico` WHERE `CuitTeor` = '$CUIT' AND `DiaTeor` >= '$DatoFechaInicio' AND `DiaTeor` <= '$DatoFechaFinal' ORDER BY `ComHorarioTeorico`.`DiaIngrTeor` ASC");	
	

 while ($filaComHorarioTeorico = mysqli_fetch_array($queryComHorarioTeorico))
	{
echo "<TR>\n";
echo "<td>".$filaComHorarioTeorico['idComHoraTeor']."</td>\n";
echo "<td>".$filaComHorarioTeorico['DiaTeor']."</td>\n";	
echo "<td>".$filaComHorarioTeorico['DiaIngrTeor']."</td>\n";
echo "<td>".$filaComHorarioTeorico['DiaSalTeor']."</td>\n";
$var = $filaComHorarioTeorico['idComHoraTeor'];
$varCUIT = $filaComHorarioTeorico['CUIT'];
$varTimes = $filaComHorarioTeorico['Times'];//Times
$varDia = $filaComHorarioTeorico['DiaTeor'];
$varDiaIngr = $filaComHorarioTeorico['DiaIngrTeor'];
$varDiaSal = $filaComHorarioTeorico['DiaSalTeor'];
$varTipoHora = $filaComHorarioTeorico['TipoHora'];
$varFkTipoHorario = $filaComHorarioTeorico['FkTipoHorario'];
$CUIT=$_POST['txtCUIT_Empl'];
//echo "<td>".$filaComHorarioTeorico['FkTipoHorario']."</td>\n";
$varSleccion = $checktodos1;
echo "<td>"."<a href=\"/RRHH/FormCategSueldoEditar.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../RRHH/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";	 
	 
echo "<td>"."<a href=\"/RRHH/PruebaSeleccion.php?idComHoraTeor=".$filaComHorarioTeorico['idComHoraTeor']."\"><img src=\"../RRHH/img/CopiarIcono.png\" alt=\"BtnIconoCopiar\" width=\"20\" height=\"20\"></a></td>\n";	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/RRHH/FormCategSueldoAnular.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../RRHH/img/BorrIcono.png\" alt=\"BtnIconoAnular\" width=\"20\" height=\"20\"></a></td>\n";
 
 
echo "<td>"."<input type=\"checkbox\" name=\"checktodos[]\"  id=\"checktodos\" class=\"lista\" value=\" '$selected','$varTimes', '$varDia', '$varDiaIngr', '$varDiaSal', '$varTipoHora', '$varFkTipoHorario'\"> </td>\n";
	 

echo "</TR>\n";


}

mysqli_close($mysqli);		
		
?>


	
 </form>
    </div>
  </div>
</div>	

</body>

	</html>