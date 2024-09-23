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
	<title>Persona con quien convive</title>
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

	
<form action="#" method="post" name="formConvive" enctype="multipart/form-data">

<div  >
  <table class="table table-hover">
    <tr>
    <td colspan="4"  ><strong><h2>Personas con quien convives:</h2></strong>	</td>
    </tr>
    <tr>
      <td width="209">Nombre Apellido</td>
      <td width="209">Fecha Nac</td>
      <td width="209">DNI</td>
      <td width="209">Parentesco</td>
    </tr>
    <tr>
     
     <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" /></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" /></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" /></td>

   <td><select name="listParentesco" size="1" id="listParentesco">
       <option value="0">Seleccione:</option>
       <?php
include("../Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>
    <tr>
     
      <td><input name="txtNombreApellido1" type="text" id="txtNombreApellido1" title="NombreApellido1" size="50" /></td>
      <td><input name="txtFechaNac1" type="date" id="txtFechaNac1" title="FechaNac1" size="30" /></td>
      <td><input name="txtDNI1" type="number" id="txtDNI1" title="DNI1" size="30" /></td>

    <td><select name="listParentesco1" size="1" id="listParentesco1">
        <option value="0">Seleccione:</option>
        <?php
//include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
	?>
      </select></td>

    </tr>

    <tr>
     
     <td><input name="txtNombreApellido2" type="text" id="txtNombreApellido2" title="NombreApellido2" size="50" /></td>
     <td><input name="txtFechaNac2" type="date" id="txtFechaNac2" title="FechaNac2" size="30" /></td>
     <td><input name="txtDNI2" type="number" id="txtDNI2" title="DNI2" size="30" /></td>

   <td><select name="listParentesco2" size="1" id="listParentesco2">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido3" type="text" id="txtNombreApellido3" title="NombreApellido3" size="50" /></td>
     <td><input name="txtFechaNac3" type="date" id="txtFechaNac3" title="FechaNac3" size="30" /></td>
     <td><input name="txtDNI3" type="number" id="txtDNI3" title="DNI3" size="30" /></td>

   <td><select name="listParentesco3" size="1" id="listParentesco3">
       <option value="0">Seleccione:</option>
       <?php
//include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

  </table>
  <?php


$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido==null){
			  
			//  include("Conexion/conexion.php");	
	
$insertarConvive = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive);		
echo "Parentezco agregado";
}

$NombreApellido1=$_POST['txtNombreApellido'];
$FechaNac1=$_POST['txtFechaNac'];
$DNI1=$_POST['txtDNI'];
$Parentesco1=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido1==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive1 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive1);		
echo "Parentezco agregado 1";
}

$NombreApellido2=$_POST['txtNombreApellido'];
$FechaNac2=$_POST['txtFechaNac'];
$DNI2=$_POST['txtDNI'];
$Parentesco2=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido2==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive2 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive2);		
echo "Parentezco agregado 2";
}

$NombreApellido3=$_POST['txtNombreApellido'];
$FechaNac3=$_POST['txtFechaNac'];
$DNI3=$_POST['txtDNI'];
$Parentesco3=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido2==null){
			  
			 // include("Conexion/conexion.php");	
	
$insertarConvive3 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive3);		
echo "Parentezco agregado 2";
}

?>

</div>
</form>

    </div>
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