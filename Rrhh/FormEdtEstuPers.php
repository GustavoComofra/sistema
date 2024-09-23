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
	<title>Editar estudios personas</title>
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
$IdEstudPersonal=$_GET['IdEstudPersonal'];
//echo $IdEstudPersonal;	
include("Conexion/conexion.php");	
$queryEstudIdPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `IdEstudPersonal` = ".$IdEstudPersonal.";");
	
$rowid = mysqli_fetch_assoc($queryEstudIdPersonal);
		
	?>

<form action="#" method="post" name="formEstudiosIdPersonal" enctype="multipart/form-data">
<div  >
  <table class="table table-hover">
    <tr>
    <td colspan="4"  ><strong><h2>Editar estudios Personal </h2></strong></td>
   <td>IdEstudPersonal: <input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" value="<?php print $IdEstudPersonal;?>" > </td>
		
		
    </tr>
    <tr>
      <td width="10">Id</td>
      <td width="10">Cuit</td>
      <td width="50">Estudio</td>
      <td width="50">Estado</td>
      <td width="100">Obs</td>
    </tr>
    <tr>
      <td>
      <input name="txtIdEstudPersonal" type="text" id="txtIdEstudPersonal" title="IdEstudPersonal" size="10" value="<?php print $rowid['IdEstudPersonal'];?>"/>
      </td>

      <td>
      <input name="txtCuit_EstuPers" type="text" id="txtCuit_EstuPers" title="Cuit_EstuPers" size="10" value="<?php print $rowid['Cuit_EstuPers'];?>"/>
      </td>

      <td><select name="listEstudioPersonal" size="1" id="listEstudioPersonal">
        <option value="<?php print $rowid['EstudioPersonal'];?>"><?php print $rowid['EstudioPersonal'];?></option>
        <?php
include("../Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>



      <td>
      <select name="txtEstado" size="1" id="txtEstado" title="Estado">
      <option value="<?php print $rowid['Estado'];?>"><?php print $rowid['Estado'];?></option>
        <option value="Activo">Activo</option>
        <option value="Completo">Finalizado</option>
        <option value="EnCurso">EnCurso</option>
      </select>


      </td>
      
      <td>
      <input name="txtObs" type="text" id="txtObs" title="Obs" size="50" value="<?php print $rowid['Obs'];?>"/>
      </td>
    </tr>

  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
	</form>
<br>
<?php

$IdEstudPersonal=$_POST['txtIdEstudPersonal'];
$Estado=$_POST['txtEstado'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$Obs=$_POST['txtObs'];

		  if(!$IdEstudPersonal==null){
			  
	//		  include("Conexion/conexion.php");	

$UbdateComEstudPersonal = "UPDATE `ComEstudPersonal` SET `Cuit_EstuPers` = '$Cuit_EstuPers', `EstudioPersonal` = '$EstudioPersonal', `Estado` = '$Estado', `Obs` = '$Obs' WHERE `ComEstudPersonal`.`IdEstudPersonal` = ".$IdEstudPersonal.";";

$ejecutar_Ubdate=mysqli_query($mysqli,$UbdateComEstudPersonal);		

echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverPare()\">volver</button>";	
		  
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