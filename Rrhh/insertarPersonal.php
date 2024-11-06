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

	<title>Agregar Personal</title>
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
  
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];


$carpetas_destino='ftp.comofrasrl.com.ar/img/rrhh/' . $nombre_imagen;

move_uploaded_file($_FILES['imagen']['tmp_name'],"img/rrhh/".$nombre_imagen);

$Legajo=$_POST['txtLegajo'];
$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Nombres=$_POST['txtNombres'];
$Apellidos= $_POST['txtApellidos'];
$FechaIngreso= $_POST['txtFechaIngreso'];
$FechaPrueba= $_POST['txtFechaPrueba'];
$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/rrhh/'.$nombre_imagen;
$FechaNacimiento=$_POST['txtFechaNacimiento'];
$Domicilio=$_POST['txtDomicilio'];
$Localidad=$_POST['listLocalidad'];
$Provincia=$_POST['listProvincia'];
$Nacionalidad=$_POST['listNacionalidad'];
$EstadoCivil=$_POST['listEstadoCivil'];
$VenCarnet=$_POST['txtVenCarnet'];
$TipoCarnet=$_POST['listTipoCarnet'];		
$GS=$_POST['listGs'];	
$Telefono=$_POST['txtTelefono'];
$TelUrgencia=$_POST['txtTelUrgencia'];
$Email=$_POST['txtEmail'];
$Obs=$_POST['txtObs'];
$CategSueld=$_POST['listCategSueld'];	

$Modalidad=$_POST['txtModalidad'];
$ART=$_POST['txtART'];
$Sector=$_POST['listSector'];	
$ObraSocial=$_POST['txtObraSocial'];

$CalleNorte=$_POST['txtCalleNorte'];
$CalleSur=$_POST['txtCalleSur'];
$CalleEste=$_POST['txtCalleEste'];	
$CalleOeste=$_POST['txtCalleOeste'];
$RelacionFk=$_POST['listRelacion'];

$Encargado=$_POST['listEncargado'];
$Gerente=$_POST['listGerente'];

		
$insertarPersonal = "INSERT INTO `ComEmpleado` (`IdPersonal`, `Legajo`, `CUIT_Empl`, `Nombres`, `Apellidos`, `FechaIngreso`, `FechaPrueba`, `Aprobado`
, `FechaSalida`, `Foto`, `FechaNacimiento`, `Domicilio`, `Localidad`, `Provincia`, `Nacionalidad`, `EstadoCivil`, `VenCarnet`, `TipoCarnet`, `GS`
, `Telefono`, `TelUrgencia`, `Email`, `Obs`, `Fk_CategSueld`, `ObraSocial`, `Sector`, `ART`, `Modalidad`, `CalleNorte`, `CalleSur`, `CalleEste`
, `CalleOeste`, `RelacionFk`, `Encargado`, `Gerente`, `Gerente_General`, `Baja`) VALUES (NULL, '$Legajo', '$CUIT_Empl', '$Nombres', '$Apellidos', '$FechaIngreso', '$FechaPrueba', 'Aprobado', '', '$Imagen', '$FechaNacimiento'
, '$Domicilio', '$Localidad', '$Provincia', '$Nacionalidad', '$EstadoCivil', '$VenCarnet', '$TipoCarnet', '$GS', '$Telefono', '$TelUrgencia', '$Email', '$obs'
, '$CategSueld', '$ObraSocial', '$Sector', '$ART', '$Modalidad', '$CalleNorte', '$CalleSur', '$CalleEste', '$CalleOeste', '$RelacionFk', '$Encargado','$Gerente',29,'No');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarPersonal);
mysqli_close($mysqli);

?>

<?php
//include("Conexion/conexion.php");

$query2 = $mysqli -> query ("SELECT * FROM `ComEmpleado` ORDER BY `IdPersonal` DESC LIMIT 1");


$row = mysqli_fetch_assoc($query2);


?>


<div  >
  <table class="table table-hover">
<thead>
    <tr>
      <td colspan="6"  ><strong><h3>Formulario Personal Cargado</h3></strong><br><?php echo '<img class="CssImage" src="'.$row['Foto'].'" width="50" heigth="50"/>'; ?></td>
	
    </tr>
  </thead>
    
	<tr>
    <th scope="row" width="">CUIT: </th>	
	  <td width=""> <?php echo $row['CUIT_Empl'];
	$varCuitPersonal = $row['CUIT_Empl']; ?></td>
	<th scope="row">Nombres: </th>
       <td> <?php echo $row['Nombres']; ?></td>
	<th scope="row">Apellidos: </th>
       <td> <?php echo $row['Apellidos']; ?> </td>
    </tr>

	 <tr>
     <th scope="row">Fecha de Ingreso:</th>
      <td> <?php echo $row['FechaIngreso']; ?></td>
	 <th scope="row">Fecha prueba</th>
      <td> <?php echo $row['FechaPrueba']; ?> </td>
	 <th scope="row">Fecha de nacimiento: </th>
      <td><?php echo $row['FechaNacimiento']; ?> </td>
    </tr>

    <tr>
     <th scope="row">Domicilio: </th>
      <td> <?php echo $row['Domicilio']; ?>	 </td>
 	 <th scope="row">Localidad:</th>
      <td> <?php echo $row['Localidad']; ?> </td>
 	 <th scope="row">Provincia:</th>
      <td> <?php echo $row['Provincia']; ?> </td>
    </tr>
	  
    <tr>
      <th scope="row">Nacionalidad:</th>
      <td><?php echo $row['Nacionalidad']; ?></td>
     <th scope="row">Telefono : </th>
      <td> <?php echo $row['Telefono']; ?></td>
     <th scope="row">E-mail: </th>
      <td> <?php echo $row['Email']; ?> </td>
    </tr>
    <tr>
      <th scope="row">Observacion:</th>
		<td colspan="2"> <?php echo $row['Obs']; ?> </td>
          <th scope="row">Estado Civil:</th>
      <td> <?php echo $row['EstadoCivil']; ?> </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7">
	</tr>

		</td>

  </table>
	


	
<?php

$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Estado=$_POST['listEstado'];
$Anios=$_POST['txtAnios'];
$Obs=$_POST['txtObs'];

 
$Cuit_EstuPers2=$_POST['txtCuit_EstuPers2'];
$EstudioPersonal2=$_POST['listEstudioPersonal2'];	
$Estado2=$_POST['listEstado2'];
$Anios2=$_POST['txtAnios2'];
$Obs2=$_POST['txtObs2'];		  
		  
$Cuit_EstuPers3=$_POST['txtCuit_EstuPers3'];
$EstudioPersonal3=$_POST['listEstudioPersonal3'];	
$Estado3=$_POST['listEstado3'];
$Anios3=$_POST['txtAnios3'];
$Obs3=$_POST['txtObs3'];		  
		  
$Cuit_EstuPers4=$_POST['txtCuit_EstuPers4'];
$EstudioPersonal4=$_POST['listEstudioPersonal4'];	
$Estado4=$_POST['listEstado4'];
$Anios4=$_POST['txtAnios4'];
$Obs4=$_POST['txtObs4'];		  

		  if(!$EstudioPersonal==null){
			  
			 // include("Conexion/conexion.php");	
	
        $insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) 
        VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";
        
        $ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);		
        
        //echo "estudio agregado" + $EstudioPersonal + "<br>";
		  
		  }if(!$EstudioPersonal2==null){
		$insertarComEstudPersonal2 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) 
    VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal2', '$Estado2', '$Anios2', '$Obs2');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComEstudPersonal2);		  
			  
		  }if(!$EstudioPersonal3==null){
		$insertarComEstudPersonal3 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) 
    VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal3', '$Estado3', '$Anios3', '$Obs3');";

$ejecutar_insertar3=mysqli_query($mysqli,$insertarComEstudPersonal3);		  
			  
		  }if(!$EstudioPersonal4==null){
		$insertarComEstudPersonal4 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) 
    VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal4', '$Estado4', '$Anios4', '$Obs4');";

$ejecutar_insertar4=mysqli_query($mysqli,$insertarComEstudPersonal4);		  
			  
		  }
// else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>	

<?php


$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido==null){
			  
			  //include("Conexion/conexion.php");	
	
$insertarConvive = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive);		
//echo "Parentezco agregado" + $NombreApellido + "<br>";
}

$NombreApellido1=$_POST['txtNombreApellido1'];
$FechaNac1=$_POST['txtFechaNac1'];
$DNI1=$_POST['txtDNI1'];
$Parentesco1=$_POST['listParentesco1'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido1==null){
			  
			 // include("Conexion/conexion.php");	
	
$insertarConvive1 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`)
 VALUES (NULL, '$NombreApellido1', '$FechaNac1', '$DNI1', '$Parentesco1', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive1);		
//echo "Parentezco agregado" + $NombreApellido1 + "<br>";
}

$NombreApellido2=$_POST['txtNombreApellido2'];
$FechaNac2=$_POST['txtFechaNac2'];
$DNI2=$_POST['txtDNI2'];
$Parentesco2=$_POST['listParentesco2'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido2==null){
			  
			  //include("Conexion/conexion.php");	
	
$insertarConvive2 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido2', '$FechaNac2', '$DNI2', '$Parentesco2', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive2);		

//echo "Parentezco agregado" + $NombreApellido2 + "<br>"; 
}

$NombreApellido3=$_POST['txtNombreApellido3'];
$FechaNac3=$_POST['txtFechaNac3'];
$DNI3=$_POST['txtDNI3'];
$Parentesco3=$_POST['listParentesco3'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido3==null){
			  
			 // include("Conexion/conexion.php");	
	
$insertarConvive3 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido3', '$FechaNac3', '$DNI3', '$Parentesco3', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive3);		
//echo "Parentezco agregado " + $NombreApellido3 + "<br>";
}

$NombreApellido4=$_POST['txtNombreApellido4'];
$FechaNac4=$_POST['txtFechaNac4'];
$DNI4=$_POST['txtDNI4'];
$Parentesco4=$_POST['listParentesco4'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido4==null){
			  
			  //include("Conexion/conexion.php");	
	
$insertarConvive4 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido4', '$FechaNac4', '$DNI4', '$Parentesco4', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive4);		
//echo "Parentezco agregado " + $NombreApellido4 + "<br>";
}

$NombreApellido5=$_POST['txtNombreApellido5'];
$FechaNac5=$_POST['txtFechaNac5'];
$DNI5=$_POST['txtDNI5'];
$Parentesco5=$_POST['listParentesco5'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido5==null){
			  
			  //include("Conexion/conexion.php");	
	
$insertarConvive5 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido5', '$FechaNac5', '$DNI5', '$Parentesco5', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive5);		
//echo "Parentezco agregado " + $NombreApellido5 + "<br>";
}

?>

<?php
/*echo "<script type=\"text/javascript\">
window.location.href = \"../sistema/PruebaFormulario.php\";
</script>";	*/
	
?>
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