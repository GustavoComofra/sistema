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

	<title>Nuevo estudio</title>
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
$Cuit=$_GET['CUIT_Empl'];
echo $Cuit;	
include("../Conexion/conexion.php");
$queryEstudPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `Cuit_EstuPers` = ".$Cuit.";");
	
$row = mysqli_fetch_assoc($queryEstudPersonal);
		
	?>

<form action="#" method="post" name="formEstudiosPersonal" enctype="multipart/form-data">
<div  >
  <table class="table table-hover">
    <tr>
    <td colspan="4"  ><strong><h3>Estudios Personal </h3></strong>
        
         <label for="txtCUIT_Empl">Cuit:</label>
   <input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" size="35" value="<?php print $Cuit;?>" > 
		
		</td>
    </tr>
    <tr>
      <td width="209">Estudio</td>
      <td width="209">Estado</td>
      <td width="209">Anios</td>
      <td width="209">Obs</td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal" size="1" id="listEstudioPersonal">
        <option value="0">Seleccione:</option>
        <?php
//include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");

 while ($valores = mysqli_fetch_array($query1))
	  
		  {

 echo '<option value="'.$valores['Estudio'].'">'.$valores['Estudio'].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado" size="1" id="listEstado" title="Estado">
        <option value="Activo">Activo</option>
        <option value="Terminado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios" type="number" id="txtAnios" title="Anios" size="10" /></td>
      <td><input name="txtObs" type="text" id="txtObs" title="Obs" size="30" /></td>
    

	  </tr>
  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>
	</form>
<br>
<?php

$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Estado=$_POST['listEstado'];
$Anios=$_POST['txtAnios'];
$Obs=$_POST['txtObs'];
		  
		  

		  if(!$CUIT_Empl==null){
			  
			  //include("Conexion/conexion.php");	
	
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);		
		
echo "estudio agregado";
		  
		  }
		  else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>	
	
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
	
//include("Conexion/conexion.php");	
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