<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="../sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Vista Personal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>	

<style>
.imgEfc{
  position: relative;
	
  width: 100px;
  height: 100px;

 border-radius: 50% 50%;
}

.imgEfc:hover {

	
width: 300px;
height: 300px;


}

</style>
</head>
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

echo $IdPersonal;
$IdPersonal=$_GET['IdPersonal'];
$varIdPersoanl = $IdPersonal=$_GET['IdPersonal'];
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `ComVistaEmpleado1`.`IdPersonal` = ".$IdPersonal.";");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>


<div align="">
  <table width="568" border="" class="table table-striped">
<thead>
<tr align="center">
     
		<td colspan="2" rowspan="2"> <img src="../sistema/img/Icono.png" alt="Logo" width="80" height="80"></td>
<td colspan="2" rowspan="2">   <div align="center"><h1>Informe Personal</h1>

  <h4><?php echo $row['Nombres']." "; 
   echo $row['Apellidos'];?></h4>
  <h4>Legajo: <?php echo $row['Legajo'];
	$varCuitPersonal = $row['CUIT_Empl']; ?>
 - Cuit: <?php echo $row['CUIT_Empl'];
	$varCuitPersonal = $row['CUIT_Empl']; ?>  
</h4>
  


</div> </td>
        <td colspan="2" rowspan="2"><div align="center" ><?php  
        //$varDir1= $row['Foto']; 
        echo '<img class="imgEfc" src="'.$row['Foto'].'" />';?>
        </div></td>
   
    </tr>
    
  </thead>
    
	 <tr>
     <th scope="row">Fecha de Ingreso:</th>
      <td> <?php echo $row['FechaIngreso']; ?></td>
	 <th scope="row">Fecha de nacimiento: </th>
      <td><?php echo $row['FechaNacimiento']; ?> </td>
	 <th scope="row">Edad: </th>
      <td><?php
	$Dia=date("Y-m-d");
		  $varEdad= $Dia-$row['FechaNacimiento'];
		  echo $varEdad; 
		  
		  ?> </td>
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
    <th scope="row">Telefono : </th>
      <td> <?php echo $row['Telefono']; ?></td>
     <th scope="row">Tel Urgencia : </th>
      <td> <?php echo $row['TelUrgencia']; ?></td>
     <th scope="row">E-mail: </th>
      <td> <?php echo $row['Email']; ?> </td>
    </tr>
    <tr>
          <th scope="row">Estado Civil:</th>
      <td> <?php echo $row['EstadoCivil']; ?> </td>
          <th scope="row">Ven Carnet:</th>
      <td> <?php echo $row['VenCarnet']; 
/*$varVenCarnet = $row['VenCarnet'];	
$fecha_actual = date("Y-m-d");

if($varVenCarnet <= $fecha_actual){
echo "<p style=\"color: red\">"."Vencido"."</p>";
}	 */
		  
		  
		  ?> </td>
          <th scope="row">Tipo Carnet:</th>
      <td> <?php echo $row['TipoCarnet']; ?> </td>
    </tr>

    <tr>
          <th scope="row">Sector:</th>
      <td> <?php echo $row['SectorFk']; ?> </td>
        
          <th scope="row">ART</th>
      <td> <?php echo $row['ART']; ?> </td>
        
      <th scope="row">Modalidad:</th>
      <td> <?php echo $row['Modalidad']; ?> </td>
    </tr>

    <tr>
      <th scope="row">Nacionalidad:</th>
		<td colspan="0"> <?php echo $row['Nacionalidad']; ?> </td>
    <th scope="row">Relacion:</th>
		<td colspan="0"> <?php echo $row['Relacion']; ?> </td>
<th scope="row">Obra Social</th>
      <td> <?php echo $row['ObraSocial']; ?> </td>
    </tr>

    <tr>
      <th scope="row">Observacion:</th>
		<td colspan="0"> <?php echo $row['Obs']; ?> </td>
	 <th scope="row">Fecha prueba</th>
      <td> <?php echo $row['FechaPrueba']; ?> </td>
<th scope="row">Categ Sueldo</th>
      <td> <?php echo $row['Fk_CategSueld']; ?> </td>
    </tr>

    <tr>
      <th scope="row">Calle Norte:</th>
		<td colspan="0"> <?php echo $row['CalleNorte']; ?> </td>
	 <th scope="row"></th>
      <td> <?php echo $row['']; ?> </td>
<th scope="row">Calle Sur</th>
      <td> <?php echo $row['CalleSur']; ?> </td>
    </tr>

    <tr>
      <th scope="row">Calle Este:</th>
		<td colspan="0"> <?php echo $row['CalleEste']; ?> </td>
	 <th scope="row"></th>
      <td> <?php echo $row['']; ?> </td>
<th scope="row">Calle Oeste</th>
      <td> <?php echo $row['CalleOeste']; ?> </td>
    </tr>



    </tr>

<td colspan="6">&nbsp;</td>
	</tr>  
    <tr>
      <td colspan="7">
	</tr>


  <?php
		  

      echo "
      <table border=1 class=\"table table-striped\">
        <thead>
      <tr>
      <td colspan=\"4\" align=\"center\" bgcolor=\"\"><h3>Personas con quien convive</h3></td>
      </tr>
      <TR>
      <TD><B>Nombre Apellido</B></TD>
      <TD><B>Fecha Nac</B></TD>
      <TD><B>DNI</B></TD>
      <TD><B>Parentesco</B></TD>
      </TR>
        </thead>
      ";
        
      include("Conexion/conexion.php");	
      $queryConvive = $mysqli -> query ("SELECT * FROM `ComVisConvive` WHERE `Cuil_Pers` = ".$varCuitPersonal.";");
       
       while ($filaConvive = mysqli_fetch_array($queryConvive))
      
      {
      echo "<TR>\n";
      
      $varCuit=$fila['Cuit_EstuPers'];
      
      echo "<td>".$filaConvive['NombreApellido']."</td>\n";	 
      echo "<td>".$filaConvive['FechaNac']."</td>\n";	
      echo "<td>".$filaConvive['DNI']."</td>\n";	
      echo "<td>".$filaConvive['Parentesco']."</td>\n";
      echo "</TR>\n";
      
      }
         
         
      mysqli_close($mysqli);
      
      
      ?>		
      

<?php
		  

echo "
<table border=1 class=\"table table-striped\">
  <thead>
<tr>
<td colspan=\"3\" align=\"center\" bgcolor=\"\"><h3>Estudios</h3></td>
</tr>
<TR>
<TD><B>Estudio</B></TD>
<TD><B>Estado</B></TD>
<TD><B>Obs</B></TD>
</TR>
  </thead>
";
	
include("Conexion/conexion.php");	
$queryComEstudPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `Cuit_EstuPers` = ".$varCuitPersonal.";");
 
 while ($filaComEstudPersonal = mysqli_fetch_array($queryComEstudPersonal))

{
echo "<TR>\n";

$varCuit=$fila['Cuit_EstuPers'];

echo "<td>".$filaComEstudPersonal['EstudioPersonal']."</td>\n";	 
echo "<td>".$filaComEstudPersonal['Estado']."</td>\n";	
echo "<td>".$filaComEstudPersonal['Obs']."</td>\n";	
echo "</TR>\n";

}
	 
	 
mysqli_close($mysqli);


?>		

		</td>

  </table>
  <?php
/*
	require '/sistema/phpqrcode/qrlib.php';
	
	$dir = './sistema/temp';
	echo 	"Direccion " . $dir;
	if(!file_exists($dir))
		mkdir($dir);
	
	$filename = $dir.'test.png';
	
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = 'https://interno.comofrasrl.com.ar/sistema/';

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
	
	echo '<img src="'.$filename.'" />';
*/
?>

</div>

</div>
    </div>
  </div>
</div>	

	
</body>
</html>