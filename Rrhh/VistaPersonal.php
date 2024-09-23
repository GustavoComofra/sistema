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

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
	<title>Vista personal</title>

<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>	

<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

	?>
	</div>

  </head>
<body>
	


<div class="container-fluid">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
    <div class="col-md-auto">
 <?php
include("../Conexion/conexion.php");

echo $IdPersonal;
$IdPersonal=$_GET['IdPersonal'];
$varIdPersoanl = $IdPersonal=$_GET['IdPersonal'];
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComVistaEmpleado1` WHERE `ComVistaEmpleado1`.`IdPersonal` = ".$IdPersonal.";");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>


<div  >
  <table width="568"   class="table table-striped">
<thead>
<tr  >
     
		<td colspan="2" rowspan="2"> <img src="../img/Icono.png" alt="Logo" width="80" height="80"></td>
<td colspan="2" rowspan="2">   <div  ><h1>Informe Personal</h1>

</div> </td>

        <td colspan="2" rowspan="2"><div   ><?php  
        //$varDir1= $row['Foto']; 
        echo '<img class="imgEfc" src="'.$row['Foto'].'" />';?>
        </div></td>
   
    </tr>
    
  </thead>
  <tr>
  <td colspan="6">
<h4><?php echo $row['Nombres']." "; 
   echo $row['Apellidos'];?> - Legajo: <?php echo $row['Legajo'];
	$varCuitPersonal = $row['CUIT_Empl']; ?>
 - Cuit: <?php echo $row['CUIT_Empl'];
	$varCuitPersonal = $row['CUIT_Empl']; ?>  
</h4>
</td>
  </tr>
    
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
        
      include("../Conexion/conexion.php");
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
	
include("../Conexion/conexion.php");
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


</div>

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
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>	

</body>
</html>