<?php
/*
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
	*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	<title>Mantenimiento</title>
	<body>
	<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");
/*session_start();
$u = $_POST['txtUsuario']; */

		?>
	</div>
	<?php
	/*
session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
	*/
	?>



<div class="container-fluid m-0">
		<div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->

			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">

				<form action="#" method="post" name="formMaquinaria" enctype="multipart/form-data">
					<div id="respuesta"></div>
					<div class="form-group">

						<div class="row">
							<div class="col-2">
								<input type="hidden" name="txtidMaq" id="idMaq">
								<label for="txtNumMaq">NumMaq</label>
								<input class="form-control" type="number" name="txtNumMaq" id="txtNumMaq" placeholder="Numero de Maquina">

								<label for="txtDiasManteni">Dias de mantenimiento</label>
								<input class="form-control" type="number" name="txtDiasManteni" id="txtDiasManteni" min="0" value="0">

								<label for="txtValorMaq">Valor</label>
								<input class="form-control" type="number" name="txtValorMaq" id="txtValorMaq" placeholder="Dolar" min="0" value="0">
							</div>
							<div class="col">


								<label for="txtMaquina">Maquina</label>
								<input class="form-control" type="text" name="txtMaquina" id="txtMaquina" placeholder="Maquinaria" require>

								<label for="txtModelo">Modelo</label>
								<input class="form-control" type="text" id="txtModelo" name="txtModelo" placeholder="Modelo">


								<label for="txtContactoMaq">Contacto</label>
								<input class="form-control" type="text" name="txtContactoMaq" id="txtContactoMaq" placeholder="Contacto">

							</div>

							<div class="col">

								<label for="listProvedMaq">Proveedor</label>
								<select class="form-control" name="listProvedMaq" size="1" id="listProvedMaq" required>
									<option value=1>Seleccione Proveedor</option>
									<?php
									include("Conexion/conexion.php");
									$queryProv = $mysqli->query("SELECT * FROM `Proveedor` ORDER BY `Proveedor`.`Proveedor` ASC");
									while ($valoresProv = mysqli_fetch_array($queryProv)) {
										echo '<option value="' . $valoresProv[IdProv] . '">' . $valoresProv[IdProv] . ' - ' . $valoresProv[Proveedor] . '</option>';
									}
									?>
								</select>

								<label for="listSector">Sector</label>
								<select class="form-control" name="listSector" size="1" id="listSector">
									<option value="1">Sector</option>
									<?php


									$querySector = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


									while ($valoresSector = mysqli_fetch_array($querySector)) {

										echo '<option value="' . $valoresSector[IdSector] . '">' . $valoresSector[SectorFk] . '</option>';
									}
									?>
								</select>

								<label for="listClasificacion">Clasificacion</label>
								<select class="form-control" name="listClasificacion" size="1" id="listClasificacion" required>
									<option value=2>Seleccione Clasificacion</option>
									<?php

									$queryClasi = $mysqli->query("SELECT * FROM `Clasificacion` ORDER BY `Clasificacion`.`Clasificacion` ASC");
									while ($valoresClasi = mysqli_fetch_array($queryClasi)) {
										echo '<option value="' . $valoresClasi[idClasi] . '">' . $valoresClasi[idClasi] . ' - ' . $valoresClasi[Clasificacion] . '</option>';
									}
									?>
								</select>


							</div>
						</div>

						<div class="row">

							<div class="col">



							</div>

							<div class="col">


							</div>

						</div>

						<div class="row">

							<div class="col">
								<label for="imagen" class="form-label">Imagen</label>
								<input class="form-control" type="file" id="imagen" name="imagen">

							</div>

							<div class="col">



							</div>

						</div>

						<div class="row">
							<div class="form-floating">
								<textarea class="form-control" placeholder="Observacion" name="txtObsMaq" id="txtObsMaq"></textarea>
								<label for="txtObsMaq">Observacion</label>
							</div>
							<div class="form-floating">
								<textarea class="form-control" placeholder="Link de manual" name="txtLink" id="txtLink"></textarea>
								<label for="txtLink">Link</label>

							</div>

						</div>

						<input class="form-control" type="hidden" id="txtuserMAq" min="1" name="txtuserMAq" value="<?php echo $_SESSION['usuario'];  ?>">


						<button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar"><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>


						<!-- INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '1', 'Maquina', 'Modelo', 'Link', 'imgMaq', '1', '3', 'ContactoMaq', '4', '5.5', 'ObsMaq', 'userMAq', '6', 'Si'); -->

						<?php
						$NumMaq = $_POST['txtNumMaq'];
						$Maquina = $_POST['txtMaquina'];
						$DiasManteni = $_POST['txtDiasManteni'];
						$ValorMaq = $_POST['txtValorMaq'];
						$Modelo = $_POST['txtModelo'];
						$ContactoMaq = $_POST['txtContactoMaq'];
						$ProvedMaq = $_POST['listProvedMaq'];
						$SectorMaq = $_POST['listSector'];

						$Fk_Clasi = $_POST['listClasificacion'];
						$imgMaq = $_POST['imagen'];
						$ObsMaq = $_POST['txtObsMaq'];
						$Link = $_POST['txtLink'];

						$nombre_imagen = $_FILES['imagen']['name'];
						$tipo_iamgen = $_FILES['imagen']['type'];
						$tamagno_imegen = $_FILES['imagen']['size'];
						$carpetas_destino = 'ftp.comofrasrl.com.ar/img/manten/' . $nombre_imagen;
						move_uploaded_file($_FILES['imagen']['tmp_name'], "img/manten/" . $nombre_imagen);

						$ImagenNombre = 'https://interno.comofrasrl.com.ar/sistema/img/manten/' . $nombre_imagen;

						if ($ImagenNombre == 'https://interno.comofrasrl.com.ar/sistema/img/manten/') {
							$imgMaq = 'iconoMant.png';
						} else {
							$imgMaq = $ImagenNombre;
						}

						// echo "NumMaq ".$NumMaq."<br>";	
						// echo "Maquina ".$Maquina."<br>";	
						// echo "DiasManteni ".$DiasManteni."<br>";	
						// echo "ValorMaq ".$ValorMaq."<br>";
						// echo "Modelo ".$Modelo."<br>";
						// echo "ContactoMaq ".$ContactoMaq."<br>";	
						// echo "ProvedMaq ".$ProvedMaq."<br>";		
						// echo "SectorMaq ".$SectorMaq."<br>";
						// echo "Fk_Clasi ".$Fk_Clasi."<br>";
						// echo "imgMaq ".$imgMaq."<br>";
						// echo "ObsMaq ".$ObsMaq."<br>";
						// echo "Link ".$Link."<br>";	

						if (!$Maquina == null) {

							echo "<p>" . "cargado" . "</p>";

							$insertarMaquina = "INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '$NumMaq', '$Maquina', '$Modelo', '$Link', '$imgMaq', '$ProvedMaq', '$Fk_Clasi', '$ContactoMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', 'userMAq', '$SectorMaq', 'Si');";

							$ejecutar_insertar = mysqli_query($mysqli, $insertarMaquina);
						}

						mysqli_close($mysqli);


						?>
				</form>

				<?php

				?>


			</div>
			<div class="col-md-auto">
				<?php
				include("../Mantenimiento/FontEnd/ListarMaquinariaFondend.php");

				?>
			</div>


		</div>

	</div>
	</div>

	<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>