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

	<title>Nuevo Personal</title>
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


		<?php
include("../Conexion/conexion.php");
$Dia=date("Y-m-d");
$res=mysqli_query($con,"SELECT * FROM `ComHorario`");
$CUIT=$_POST["codigo"];		  
$insertarIngreso = "INSERT INTO `ComHorario` (`idComHorario`, `CUIT`, `Times`, `Dia`, `DiaIngr`, `DiaSal`) VALUES (NULL, '$CUIT', CURRENT_TIMESTAMP, '$Dia', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

$ejecutar_insertar=mysqli_query($mysqli,$insertarIngreso);

mysqli_close($mysqli);

//include("Conexion/conexion.php");

$query1 = $mysqli -> query ("SELECT * FROM `ComVistaHoras` ORDER BY `ComVistaHoras`.`Times` DESC LIMIT 1");

  while ($fila = mysqli_fetch_array($query1))

{
echo "<TR>\n";
echo "<td>".$fila['idComHorario']."</td>\n";
echo "<td>".$fila['CUIT_Empl']."</td>\n";
echo "<td>".$fila['Nombres']."</td>\n";
echo "<td>".$fila['Apellidos']."</td>\n";
echo "<td>".$fila['DiaIngr']."</td>\n";
echo "<td>".$fila['DiaSal']."</td>\n";
echo "<td>".$fila['Horas']."</td>\n";
echo "</TR>\n";

}
mysqli_close($mysqli);
	

  ?>  

      </div>
</div>
  </section>
	  
	  
</main>
  
<br>

		
	<footer>


  </footer>

</body>

</html>
	
<script type="text/javascript">
window.location.href = "https://interno.comofrasrl.com.ar/sistema/Ingresar.php";
</script>