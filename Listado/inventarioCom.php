<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">
<!doctype html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../sistema/img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<title>Carga Inventario</title>


	<?php
	session_start();
	$u = $_POST['txtUsuario'];

	$varCerrarSession = $_SESSION['usuario'];

	if ($varCerrarSession == null || $varCerrarSession = '') {
		echo "<H1>" . "Usted no tiene autorizacion" . "<H1>";
		echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";

		die();
	}
	?>
	<script type="text/javascript">
		function volver() {
			window.location.href = "/sistema/index.php";
		}
	</script>
</head>

<body>
	<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
	</div>

	<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div><!-- Fin Menu Lateral -->

			<!-- Centro Pagina -->
			<div class="col-8 mt-0" style="margin-left: 20px">
				<?php
				include("inventario.php");

				?>
			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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