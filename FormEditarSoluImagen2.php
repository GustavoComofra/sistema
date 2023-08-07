<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>Editar imagen Solucion2</title>
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
		
$NumReclamo=$_GET['NumReclamo'];
//echo $NumReclamo;		
		
include("Conexion/conexion.php");		
	$Id_FallaRecl=$_GET['Id_FallaRecl'];
//echo $Id_FallaRecl; 
$queryReclamoImagen = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");

$rowReclamoImagen = mysqli_fetch_assoc($queryReclamoImagen);

	?>			

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="3" align="center"><label for="txtFalla">Imagen Solucion 2</label></td>
    </tr>
    <tr>
		<td width="156">id</td>
	<td width="156">Num</td>	
	<td width="156">Imagen</td>
    <td width="156">Nueva</td>
   
    </tr>
    <tr>
		<td><input name="txtIdReclamo" type="text" id="txtIdReclamo" title="IdReclamo" size="10" value="<?php print $rowReclamoImagen['IdReclamo'];?>" /></td>
		<td><input name="txtFk_NumRecl" type="text" id="txtFk_NumRecl" title="Fk_NumRecl" size="10" value="<?php print $rowReclamoImagen['NumReclamo'];?>" /></td>
		
			
			<?php 
			
echo "<td>".'<img  src="'.$rowReclamoImagen['ImagenSolu2'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
			?>
			

      <td>
<input type="file" name="imagen" id="imagen">
	</td>

    </tr>
	 <tr> 
	  
  <td>		
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar"  />
	  

		</td>

      <td>&nbsp;</td>
    </tr>	

	  
  </table>
	 

</div>
</form>
	
	

<?php
	
	
$Fk_NumRecl=$_POST['txtFk_NumRecl'];
		$IdReclamo=$_POST['txtIdReclamo'];	

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.planidear.com.ar/img/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre_imagen);
$ImagenSolu2 = 'http://planidear.com.ar/RRHH/'.$nombre_imagen;		

if(!$Fk_NumRecl==null){
	
	echo "<h1>"."<a href=\"/RRHH/FormReclamoEditar.php?NumReclamo=".$Fk_NumRecl."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");	//UPDATE `ComReclamo` SET `Imagen1` = '$Imagen' WHERE `ComFallaRecl`.`NumReclamo` = ".$Fk_NumRecl.";

$EditarRegistro = "UPDATE `ComReclamo` SET `ImagenSolu2` = '$ImagenSolu2' WHERE `ComReclamo`.`IdReclamo` = ".$IdReclamo.";";

$ejecutar_EditarRegistro=mysqli_query($mysqli,$EditarRegistro);

	
}	
	

	
	
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>