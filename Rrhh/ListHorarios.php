<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

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

	<title>Listado horarios</title>
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
		


	
      <table class="table table-hover">
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

include("../Conexion/conexion.php");

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
