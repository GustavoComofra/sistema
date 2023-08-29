	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<meta charset="utf-8">
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Formulario reclamo editar</title>
<link href="../sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
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

<?php 

include("Conexion/conexion.php");

  
$queryPersonal = $mysqli -> query ("SELECT * FROM `ComEmpleado` ORDER BY `ComEmpleado`.`IdPersonal` DESC LIMIT 1");


 while ($valoresPersonal = mysqli_fetch_array($queryPersonal))

		  
		  {
$varPersonal = $valoresPersonal['IdPersonal'];

}	


$IdPersonal=$_POST['txtIdPersonal'];
$Legajo=$_POST['txtLegajo'];
$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Nombres=$_POST['txtNombres'];
$Apellidos= $_POST['txtApellidos'];
$FechaIngreso= $_POST['txtFechaIngreso'];
$FechaPrueba= $_POST['txtFechaPrueba'];
$FechaSalida= $_POST['txtFechaSalida'];
//$Imagen = '../sistema/'.$nombre_imagen;
$FechaNacimiento=$_POST['txtFechaNacimiento'];
$Domicilio=$_POST['txtDomicilio'];
$Localidad=$_POST['listLocalidad'];
$Provincia=$_POST['listProvincia'];
$Nacionalidad=$_POST['listNacionalidad'];
$EstadoCivil=$_POST['listEstadoCivil'];
$VenCarnet=$_POST['txtVenCarnet'];
$TipoCarnet=$_POST['listTipoCarnet'];		
$GS=$_POST['listGS'];	
$Telefono=$_POST['txtTelefono'];
$TelUrgencia=$_POST['txtTelUrgencia'];
$Email=$_POST['txtEmail'];
$Obs=$_POST['txtObs'];
$ART=$_POST['txtART'];
$Modalidad=$_POST['txtModalidad'];
$ObraSocial=$_POST['txtObraSocial'];
$Sector=$_POST['listSector'];	
$Telefono=$_POST['txtTelefono'];
$Baja=$_POST['txtBaja'];	
$Aprobado=$_POST['txtAprobado'];	
$Fk_CategSueld=$_POST['listCategSueld'];	

$CalleNorte=$_POST['txtCalleNorte'];
$CalleSur=$_POST['txtCalleSur'];
$CalleEste=$_POST['txtCalleEste'];	
$CalleOeste=$_POST['txtCalleOeste'];
$RelacionFk=$_POST['listRelacion'];

$Encargado=$_POST['listEncargado'];
$Gerente=$_POST['listGerente'];

echo "<td>"."<a href=\"/sistema/ListPersonal.php\"><img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a></td>\n";
	
/*
$EditarComPersonal = "UPDATE `ComEmpleado` SET `Legajo` = '$Legajo', `Nombres` = '$Nombres', `Apellidos` = '$Apellidos', `FechaIngreso` = '$FechaIngreso'
, `FechaPrueba` = '$FechaPrueba', `Aprobado` = '$Aprobado', `FechaSalida` = '$FechaSalida', `FechaNacimiento` = '$FechaNacimiento'
, `Domicilio` = '$Domicilio', `Localidad` = '$Localidad', `Provincia` = '$Provincia', `Nacionalidad` = '$Nacionalidad', `EstadoCivil` = '$EstadoCivil'
, `VenCarnet` = '$VenCarnet', `TipoCarnet` = '$TipoCarnet', `GS` = '$GS', `Telefono` = '$Telefono', `TelUrgencia` = '$TelUrgencia', `Email` = '$Email'
, `Obs` = '$Obs', `Fk_CategSueld` = '$Fk_CategSueld', `ObraSocial` = '$ObraSocial', `Sector` = '$Sector', `ART` = '$ART', `Modalidad` = '$Modalidad'
, `CalleNorte` = '$CalleNorte', `CalleSur` = '$CalleSur', `CalleEste` = '$CalleEste', `CalleOeste` = '$CalleOeste', `RelacionFk` = '$RelacionFk'
, `Baja` = '$Baja' WHERE `ComEmpleado`.`IdPersonal` = '$IdPersonal';";
*/

/*
$EditarComPersonal = "UPDATE `ComEmpleado` SET `Legajo` = '1', `Nombres` = '$Nombres', `Apellidos` = '$Apellidos', `FechaIngreso` = '$FechaIngreso', `FechaPrueba` = '$FechaPrueba', `Aprobado` = '$Aprobado'
, `FechaSalida` = '$FechaSalida', `FechaNacimiento` = '$FechaNacimiento', `Domicilio` = '$Domicilio', `Localidad` = '$Localidad', `Provincia` = '$Provincia', `Nacionalidad` = '$Nacionalidad'
, `EstadoCivil` = '$EstadoCivil', `VenCarnet` = '$VenCarnet', `TipoCarnet` = '$TipoCarnet', `GS` = '$GS', `Telefono` = '$Telefono', `Email` = '$Email', `Obs` = '$Obs', `Fk_CategSueld` = '$Fk_CategSueld'
, `ObraSocial` = '$ObraSocial', `Sector` = '$Sector', `ART` = 'ART',  `Modalidad` = 'Modalidad1', `CalleNorte` = 'CalleNorte', `CalleSur` = '$CalleSur', `CalleEste` = '$CalleEste'
, `CalleOeste` = '$CalleOeste', `RelacionFk` = '$RelacionFk', `Encargado` = '$Encargado', `Gerente` = '$Gerente',  `Baja` = 'No' WHERE `ComEmpleado`.`IdPersonal` = '$IdPersonal';";
*/

$EditarComPersonal = "UPDATE `ComEmpleado` SET `Legajo` = '$Legajo', `Nombres` = '$Nombres', `Apellidos` = '$Apellidos', `FechaIngreso` = '$FechaIngreso', `FechaPrueba` = '$FechaPrueba', `Aprobado` = '$Aprobado'
, `FechaSalida` = '$FechaSalida', `FechaNacimiento` = '$FechaNacimiento', `Domicilio` = '$Domicilio', `Localidad` = '$Localidad', `Provincia` = '$Provincia', `Nacionalidad` = '$Nacionalidad'
, `EstadoCivil` = '$EstadoCivil', `VenCarnet` = '$VenCarnet', `TipoCarnet` = '$TipoCarnet', `GS` = '$GS', `Telefono` = '$Telefono', `Email` = '$Email', `Obs` = '$Obs', `Fk_CategSueld` = '$Fk_CategSueld'
, `ObraSocial` = '$ObraSocial', `Sector` = '$Sector', `ART` = '$ART',  `Modalidad` = '$Modalidad', `CalleNorte` = '$CalleNorte', `CalleSur` = '$CalleSur', `CalleEste` = '$CalleEste'
, `CalleOeste` = '$CalleOeste', `RelacionFk` = '$RelacionFk', `Encargado` = '$Encargado', `Gerente` = '$Gerente',  `Baja` = '$Baja' WHERE `ComEmpleado`.`IdPersonal` = '$IdPersonal';";



/*
$EditarComPersonal = "UPDATE `ComEmpleado` SET `Legajo` = '1', `Nombres` = 'Nombres', `Apellidos` = 'Apellidos', `FechaIngreso` = '2023-04-01', `FechaPrueba` = '2023-04-02', `Aprobado` = 'Aprobado'
, `FechaSalida` = '2050-12-03', `FechaNacimiento` = '1984-02-05', `Domicilio` = 'Domicilio', `Localidad` = 'Localidad', `Provincia` = 'Provincia', `Nacionalidad` = 'Nacionalidad'
, `EstadoCivil` = 'EstadoCivil', `VenCarnet` = '2024-04-06', `TipoCarnet` = 'TipoCarnet', `GS` = 'GS', `Telefono` = 'Telefono', `Email` = 'Email1@gmail.com.ar', `Obs` = 'Obs', `Fk_CategSueld` = '5'
, `ObraSocial` = 'ObraSocial', `Sector` = '2', `ART` = 'ART', `Modalidad` = 'Modalidad', `CalleNorte` = 'CalleNorte', `CalleSur` = 'CalleSur', `CalleEste` = 'CalleEste', `CalleOeste` = 'CalleOeste'
, `RelacionFk` = '2', `Encargado` = '1', `Gerente` = '1', `Gerente_General` = '1', `Baja` = 'No' WHERE `ComEmpleado`.`IdPersonal` = 59;";

*/

$ejecutar_Editar=mysqli_query($mysqli,$EditarComPersonal);

mysqli_close($mysqli);

?>

	
		
    </div>
  </div>
</div>		
	

	
</body>
</html>