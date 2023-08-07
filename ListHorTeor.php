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
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Liquidacion Sueldo</title>
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
        <input name="txtFinal" type="datetime-local" id="txtFinal"  size="15">
      </label>
    </p>
    <p>
   <label for="txtNombre">Nombre:</label>
      <input name="txtNombre" type="text" id="txtNombre" size="30">
  <label for="txtApellido">Apellido:</label>
   <input name="txtApellido" type="text" id="txtApellido" value="" size="30">
  <label for="txtCuit">CUIT:</label>
   <input name="txtCuit" type="text" id="txtCuit" value="" size="30">
    </p>
    <p> 

    <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
 
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="7" align="Left" bgcolor=#5D81F5>
  <p>Listado Personal</p>
  </td>
</tr>
<TD><B>Id</B></TD>
<TD><B>Cuit</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Nuevo</B></TD>
<TD><B>List</B></TD>
<TD><B>Teorico</B></TD>

</TR>

<p>
	</div>
  
</div>	 
  <?php

$DatoFechaInicio=$_POST["txtInicio"];

$DatoFechaFinal=$_POST["txtFinal"];
$Nombre=$_POST["txtNombre"];
$Apellido=$_POST["txtApellido"];
$Cuit=$_POST["txtCuit"];
echo $DatoFechaInicio;
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

echo "<td>"."<a href=\"/sistema/FormNuevoHoraTeorico.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../sistema/img/NuevoIcono.png\" alt=\"HoraTeorico\" width=\"20\" height=\"20\"></a></td>\n";
	 
echo "<td>"."<a href=\"/sistema/ListHorarVsTeor.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../sistema/img/BtnList.png\" alt=\"ListadoHorarios\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/FormHoraTeorico.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../sistema/img/HoraTeoricoIcono1.png\" alt=\"HoraTeorico\" width=\"20\" height=\"20\"></a></td>\n";
 

echo "</TR>\n";

  }
	


?>

<!-- <input type="button" class="btn-outline-info" name="btnEnviar" id="btnEnviar" onClick="FormHorarioTeorico()" value="Horario teorico" />-->

   </form> 
    </div>
  </div>
</div>	


</body>
</html>
