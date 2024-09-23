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
	<title>Editar parentesco</title>
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
$Cuil_Pers=$_GET['Cuil_Pers'];
echo $Cuit;	
include("../Conexion/conexion.php");
$queryEstudPersonal = $mysqli -> query ("SELECT * FROM `Convive` WHERE `Cuil_Pers` = ".$Cuil_Pers.";");
	
$row = mysqli_fetch_assoc($queryEstudPersonal);
		
	?>

<form action="#" method="post" name="formParentesco" enctype="multipart/form-data">
<div  >
  <table class="table table-hover">
    <tr>

      <td colspan="4"  ><strong><h2>Parentesco </h2></strong></td>
		
   <?php

$idConvive=$_GET['idConvive'];
echo $idConvive;	
//include("Conexion/conexion.php");	
$queryConvive = $mysqli -> query ("SELECT * FROM `Convive` WHERE `idConvive` =".$idConvive.";");
$rowConvive = mysqli_fetch_assoc($queryConvive);
?>	

<!-- INICIO CONVIVE -->
  <table class="table table-hover">
    <tr>
    <td colspan="4"  ><strong><h2>Personas con quien convives </h2></strong></td>
    </tr>
    <tr>
    <td width="209">id</td>
      <td width="209">Nombre Apellido</td>
      <td width="209">Fecha Nac</td>
      <td width="209">DNI</td>
      <td width="209">CUIL Empl</td>
      <td width="209">Parentesco</td>
    </tr>
    <tr>
    <td><input name="txtidConvive" type="text" id="txtidConvive" title="idConvive" size="10" value="<?php print $rowConvive['idConvive'];?>"/></td>
     <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" value="<?php print $rowConvive['NombreApellido'];?>"/></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" value="<?php print $rowConvive['FechaNac'];?>"/></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" value="<?php print $rowConvive['DNI'];?>"/></td>
     <td><input name="txtCUIT_Empl" type="number" id="txtCUIT_Empl" title="CUIT_Empl" size="30" value="<?php print $rowConvive['Cuil_Pers'];?>"/></td>
   <td><select name="listParentesco" size="1" id="listParentesco">
   <option value="<?php print $rowConvive['FkParentesco'];?>"><?php print $rowConvive['FkParentesco'];?></option>
       <?php
//include("Conexion/conexion.php");
 //txtCUIT_Empl
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");

while ($valores = mysqli_fetch_array($query1))
     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[idParentesco].'. - .'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>
  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
	</form>
<br>
<?php
$idConvive=$_POST['txtidConvive'];
$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido==null){

			  //include("Conexion/conexion.php");	
	

$insertarConvive = "UPDATE `Convive` SET `NombreApellido` = '$NombreApellido', `FechaNac` = '$FechaNac', `DNI` = '$DNI', `FkParentesco` = '$Parentesco', `Cuil_Pers` = '$Cuil_Pers' WHERE `Convive`.`idConvive` = ".$idConvive.";";

//return "volverPare()";

$ejecutar_UPDATE=mysqli_query($mysqli,$insertarConvive);		

echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverPare()\">volver</button>";	
}
	
mysqli_close($mysqli);

?>	

	

    </div>
	</div>
</div>	
<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

function volverPare()
{
	window.location.href = "/sistema/Rrhh/ListParentesco.php";
}

</script>
	
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