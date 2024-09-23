<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>

<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
}
	
</script>	

	<title>Liquidacion de sueldo</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<div class="col-9 mt-0" style="margin-left: 20px">

 <form name="formLiqSueldo" method="post" action="#">
 <table class="table table-hover">
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
 
    <table class="table table-hover">
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
include("../Conexion/conexion.php");

$queryComEmpleado = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `CUIT_Empl` LIKE '%$Cuit%' AND `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' ORDER BY `Nombres` ASC");

 while ($filaComEmpleado = mysqli_fetch_array($queryComEmpleado))

{
echo "<TR>\n";
echo "<td>".$filaComEmpleado['IdPersonal']."</td>\n";

echo "<td>".$filaComEmpleado['CUIT_Empl']."</td>\n";
$varCUit = $filaComEmpleado['CUIT_Empl'];
echo "<td>".$filaComEmpleado['Nombres']."</td>\n";
echo "<td>".$filaComEmpleado['Apellidos']."</td>\n";

echo "<td>"."<a href=\"/sistema/Rrhh/FormNuevoHoraTeorico.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../img/NuevoIcono.png\" alt=\"HoraTeorico\" width=\"20\" height=\"20\"></a></td>\n";
	 
echo "<td>"."<a href=\"/sistema/Rrhh/ListHorarVsTeor.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../img/BtnList.png\" alt=\"ListadoHorarios\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/Rrhh/FormHoraTeorico.php?CUIT_Empl=".$filaComEmpleado['CUIT_Empl']."\"><img src=\"../img/HoraTeoricoIcono1.png\" alt=\"HoraTeorico\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";

  }
	
?>

   </form> 
    </div>
  </div>
</div>	

<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!-- <script src="js/dataTables.bootstrap.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

	<!-- datatables-->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- datatables extension SELECT -->
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	<!-- extension BOTONES -->
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

	<!-- para botenes de exportar -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

</body>
</html>
