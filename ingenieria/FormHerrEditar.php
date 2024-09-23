<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
function volverherr()
{
	window.location.href = "/sistema/ingenieria/FormHerramientas.php";
}



</script>

	<title>Editar Personal</title>

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

$id_herr=$_GET['id_herr'];

include("../Conexion/conexion.php");
		
$queryHerr = $mysqli -> query ("SELECT * FROM `Herramienta` WHERE `id_herr` = ".$id_herr.";");
	
$rowHerr = mysqli_fetch_assoc($queryHerr);

?>	
		


<form action="#" method="post" name="formHerr" enctype="multipart/form-data">

<div  >
<table width=""   >
    <tr>
      <td colspan="2"  ><label>Formulario editar Herramientas</label></td>
    </tr>
    <tr>
      <th width="">Herramienta:</th>
      <td width="">
      <input name="txtid_herr" type="text" id="txtid_herr" size="5" value="<?php print $rowHerr['id_herr'];?>"/>  - 
      <input name="txtHerramienta" type="text" id="txtHerramienta" size="30" value="<?php print $rowHerr['Herramienta'];?>"/>

   </tr>
    <tr>
      <th width="">Obs:</th>
      <td width=""><input name="txtObs" type="text" id="txtObs" size="50" value="<?php print $rowHerr['Obs'];?>"/>
      <th width="">Baja:</th>
      <td width=""><input name="txtbaja" type="text" id="txtbaja" size="5" value="<?php print $rowHerr['baja'];?>"/>
<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
</label>	
<label>


      <img class="imgEfc" name="img_herr" id="img_herr" src="<?php print $rowHerr['img_herr']; ?>"/>
      </label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$id_herr=$_POST['txtid_herr'];	
$Herramienta=$_POST['txtHerramienta'];	
$Obs=$_POST['txtObs'];	
$baja=$_POST['txtbaja'];	


		
if(!$Herramienta==null){

  include("../Conexion/conexion.php");	  
$EditarHerramienta = "UPDATE `Herramienta` SET `Herramienta` = '$Herramienta', `Obs` = '$Obs', `baja` = '$baja' WHERE `Herramienta`.`id_herr` = '$id_herr';";

$ejecutar_Editar=mysqli_query($mysqli,$EditarHerramienta);
}		
		
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramienta editada</th>
 </thead>
</tr>
<TR>
<TD><B>id_herr</B></TD>
<TD><B>Herramienta</B></TD>
<TD><B>img_herr</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Baja</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		

//include("Conexion/conexion.php");	
$queryHerraEd = $mysqli -> query ("SELECT * FROM `Herramienta` WHERE `id_herr` = ".$id_herr." ORDER BY `id_herr` DESC;");
  
 while ($filaHerraEd = mysqli_fetch_array($queryHerraEd))

{
echo "<TR>\n";
echo "<td>".$filaHerraEd['id_herr']."</td>\n";
$varHerraEd=$filaHerraEd['Herramienta'];
echo "<td>".$filaHerraEd['Herramienta']."</td>\n";
echo "<td>".'<img  src="'.$filaHerraEd['img_herr'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaHerraEd['Obs']."</td>\n";
echo "<td>".$filaHerraEd['baja']."</td>\n";
echo "<td>"."<a href=\"/sistema/ingenieria/FormHerrEditar.php?id_herr=".$filaHerraEd['id_herr']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverherr()\">volver herramienta</button>";
?>

	</form>
	
<?php

		
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