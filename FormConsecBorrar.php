<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Concesionario Borrar</title>
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

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
}
	
</script>	
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
	
				<?php
	$id_Conce=$_GET['id_Conce'];
echo $id_Conce; 
$queryConcesio = $mysqli -> query ("SELECT * FROM `ComConcesionario` WHERE `Suspendido` LIKE 'No' AND `id_Conce` = ".$id_Conce.";");

$rowConcesio = mysqli_fetch_assoc($queryConcesio);
		?>
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Concesionario</label></td>
    </tr>
	  
    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtid_Conce" type="text" id="txtid_Conce" size="50" value="<?php print $rowConcesio['id_Conce'];?>" />
		</td>
    </tr>	
	  
    <tr>
      <th width="">Concesionario:</th>
      <td width=""><input name="txtConcesionario" type="text" id="txtConcesionario" size="50" value="<?php print $rowConcesio['Concesionario'];?>" />
		</td>
    </tr>

	<tr>

	<tr>
	<td>
		<label>
         <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	  
    </tr> 
		
		

	</table>
	</div>

<hr>

<?php
$id_Conce=$_POST['txtid_Conce'];
$Concesionario=$_POST['txtConcesionario'];	
$Direccion=$_POST['txtDireccion'];	
$Telefono=$_POST['txtTelefono'];	
$Email=$_POST['txtEmail'];	//txtSuspendido	
$Suspendido=$_POST['txtSuspendido'];	
		
if(!$Concesionario==null){
	
echo "<h1>"."Borrado"."</h1>";
include("Conexion/conexion.php");	
$id_Conce=$_GET['id_Conce'];//UPDATE `ComConcesionario` SET `Suspendido` = 'No' WHERE `ComConcesionario`.`id_Conce` = ".$id_Conce.";
	
	$Borrar = "UPDATE `ComConcesionario` SET `Suspendido` = 'Si' WHERE `ComConcesionario`.`id_Conce` = ".$id_Conce.";";

$ejecutar_insertar=mysqli_query($mysqli,$Borrar);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
  </div>
  </div>
</div>	

	
</body>
</html>