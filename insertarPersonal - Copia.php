<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>Titulo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<script type="text/javascript">

function volver()
{
	window.location.href = "/RRHH/index.php";
}

</script>	
<body>
	
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>	


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

  
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];


$carpetas_destino='ftp.planidear.com.ar/img/' . $nombre_imagen;

move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre_imagen);


$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Nombres=$_POST['txtNombres'];
$Apellidos= $_POST['txtApellidos'];
$FechaIngreso= $_POST['txtFechaIngreso'];
$FechaPrueba= $_POST['txtFechaPrueba'];
$Imagen = 'http://planidear.com.ar/RRHH/'.$nombre_imagen;
$FechaNacimiento=$_POST['txtFechaNacimiento'];
$Domicilio=$_POST['txtDomicilio'];
$Localidad=$_POST['listLocalidad'];
$Provincia=$_POST['listProvincia'];
$Nacionalidad=$_POST['listNacionalidad'];
$EstadoCivil=$_POST['listEstadoCivil'];
$VenCarnet=$_POST['txtVenCarnet'];
$TipoCarnet=$_POST['listTipoCarnet'];		
$Telefono=$_POST['txtTelefono'];
$Email=$_POST['txtEmail'];
$Obs=$_POST['txtObs'];
$CategSueld=$_POST['listCategSueld'];		
		
$insertarPersonal = "INSERT INTO `ComEmpleado` (`IdPersonal`, `CUIT_Empl`, `Nombres`, `Apellidos`, `FechaIngreso`, `FechaPrueba`, `Aprobado`, `FechaSalida`, `Foto`, `FechaNacimiento`, `Domicilio`, `Localidad`, `Provincia`, `Nacionalidad`, `EstadoCivil`, `VenCarnet`, `TipoCarnet`, `Telefono`, `Email`, `Obs`, `Fk_CategSueld`, `Baja`) VALUES (NULL, '$CUIT_Empl', '$Nombres', '$Apellidos', '$FechaIngreso', '$FechaPrueba', '', '2022-03-13', '$Imagen', '$FechaNacimiento', '$Domicilio', '$Localidad', '$Provincia', '$Nacionalidad', '$EstadoCivil', '$VenCarnet', '$TipoCarnet', '$Telefono', '$Email', '$Obs', '$CategSueld', 'No');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarPersonal);



//mysqli_close($mysqli);

?>

<?php
include("Conexion/conexion.php");

$query2 = $mysqli -> query ("SELECT * FROM `ComEmpleado` ORDER BY `IdPersonal` DESC LIMIT 1");


$row = mysqli_fetch_assoc($query2);


?>


<div align="">
  <table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead>
    <tr>
      <td colspan="6" align="center"><label>Formulario Personal</label><br><?php echo '<img class="CssImage" src="'.$row['Foto'].'" width="50" heigth="50"/>'; ?></td>
	
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
<?php
		  

echo "
<table border=1 class=\"table table-striped\">
  <thead>
<tr>
<td colspan=\"3\" align=\"center\" bgcolor=\"\"><span class=\"\">Estudios</td>
</tr>
<TR>
<TD><B>Estudio</B></TD>
<TD><B>Estado</B></TD>
<TD><B>Anios</B></TD>
</TR>
  </thead>
";
	
include("Conexion/conexion.php");	
$CUIT_Empl=$_POST['txtCUIT_Empl'];
$queryComEstudPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `Cuit_EstuPers` = ".$CUIT_Empl.";");
 
 while ($filaComEstudPersonal = mysqli_fetch_array($queryComEstudPersonal))

{
echo "<TR>\n";

$varCuit=$fila['Cuit_EstuPers'];

echo "<td>".$filaComEstudPersonal['EstudioPersonal']."</td>\n";	 
echo "<td>".$filaComEstudPersonal['Estado']."</td>\n";	
echo "<td>".$filaComEstudPersonal['Anios']."</td>\n";	
echo "</TR>\n";

}
	 
	 
mysqli_close($mysqli);


?>		
		
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
			  
			  include("Conexion/conexion.php");	
	
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);		
//echo "estudio agregado";
		  
		  }if(!$EstudioPersonal2==null){
		$insertarComEstudPersonal2 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal2', '$Estado2', '$Anios2', '$Obs2');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComEstudPersonal2);		  
			  
		  }if(!$EstudioPersonal3==null){
		$insertarComEstudPersonal3 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal3', '$Estado3', '$Anios3', '$Obs3');";

$ejecutar_insertar3=mysqli_query($mysqli,$insertarComEstudPersonal3);		  
			  
		  }if(!$EstudioPersonal4==null){
		$insertarComEstudPersonal4 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal4', '$Estado4', '$Anios4', '$Obs4');";

$ejecutar_insertar4=mysqli_query($mysqli,$insertarComEstudPersonal4);		  
			  
		  }
// else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>	

<?php
/*echo "<script type=\"text/javascript\">
window.location.href = \"../RRHH/PruebaFormulario.php\";
</script>";	*/
	
?>
</div>
    </div>
  </div>
</div>	

	
</body>
</html>