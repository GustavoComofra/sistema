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
	<title>Editar Estudio</title>
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

$IdEstudio=$_GET['IdEstudio'];
echo $IdEstudio;	
include("../Conexion/conexion.php");
		
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `IdEstudio` = ".$IdEstudio.";");
	
$rowEstudio = mysqli_fetch_assoc($queryEstudio);

?>	
		


<form action="#" method="post" name="formEstudio" enctype="multipart/form-data">

<div  >
  <table class="table table-hover">
    <tr>
      <td colspan="2"  ><label>Editar Estudio</label></td>
    </tr>

    <tr>
      <th >IdEstudio :</th>
      <td ><input name="txtIdEstudio" type="text" id="txtIdEstudio" size="10" value="<?php print $rowEstudio['IdEstudio'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th >Estudio :</th>
      <td ><input name="txtEstudio" type="text" id="txtEstudio" size="30" value="<?php print $rowEstudio['Estudio'];?>"/>
		</td>
    </tr>
    <tr>
      <th >Institucion :</th>
      <td ><input name="txtInstitucion" type="text" id="txtInstitucion" size="30" value="<?php print $rowEstudio['Institucion'];?>"/>
		</td>
    </tr>
    <tr>
      <th >Descripcion :</th>
      <td ><input name="txtDescripcion" type="text" id="txtDescripcion" size="30" value="<?php print $rowEstudio['Descripcion'];?>"/>
		
<label>
  <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Editar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$IdEstudio=$_POST['txtIdEstudio'];	
$Estudio=$_POST['txtEstudio'];	
$Institucion=$_POST['txtInstitucion'];	
$Descripcion=$_POST['txtDescripcion'];	
		
if(!$Estudio==null){

  include("../Conexion/conexion.php");  
$EditarEstudio = "UPDATE `ComEstudios` SET `Estudio` = '$Estudio', `Institucion` = '$Institucion', `Descripcion` = '$Descripcion' WHERE `ComEstudios`.`IdEstudio` = '$IdEstudio';";

$ejecutar_Editar=mysqli_query($mysqli,$EditarEstudio);
}		
		
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Estudio editado</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Estudio</B></TD>
<TD><B>Institucion</B></TD>
<TD><B>Descripcion</B></TD>
</TR>
";		

//include("Conexion/conexion.php");	
$queryEstudio = $mysqli -> query ("SELECT * FROM `ComEstudios` WHERE `IdEstudio` = ".$IdEstudio.";");
  
 while ($filaEstudio = mysqli_fetch_array($queryEstudio))

{
echo "<TR>\n";
echo "<td>".$filaEstudio['IdEstudio']."</td>\n";
echo "<td>".$filaEstudio['Estudio']."</td>\n";
echo "<td>".$filaEstudio['Institucion']."</td>\n";
echo "<td>".$filaEstudio['Descripcion']."</td>\n";
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>

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