<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
	<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Editar imagen</title>
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
	window.location.href = "/sistema/index.php";
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
//include ("MarcoIzquierdo.php");

?>	
<?php
        include("Conexion/conexion.php");
        $IdPersonal = $_GET['IdPersonal'];
        $queryFoto = $mysqli->query("SELECT * FROM `ComEmpleado` WHERE `IdPersonal` = ".$IdPersonal.";");

        $rowFoto = mysqli_fetch_assoc($queryFoto);
                    ?>		

	<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formProcesoImagen" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width=""  border="0">
    <tr>
      <td colspan="4" align="center"><label for="txtimgprod">Foto</label></td>
    </tr>
    <tr>
	<td >id</td>
	<td >Nombre</td>	
	<td >Apellido</td>	
	<td >Foto</td>
    <td>Nueva</td>
   
    </tr>
    <tr>
		<td><input name="txtIdPersonal" type="text" id="txtIdPersonal" title="IdPersonal" value="<?php print $rowFoto['IdPersonal'];?>" /></td>
		<td><input name="txtNombres" type="text" id="txtNombres" title="Nombres" value="<?php print $rowFoto['Nombres'];?>" /></td>
		<td><input name="txtApellidos" type="text" id="txtApellidos" title="Apellidos" value="<?php print $rowFoto['Apellidos'];?>" /></td>
		
			
			<?php 
			
echo "<td>".'<img  src="'.$rowFoto['Foto'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
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
</div>	
	

<?php
		
$IdPersonal=$_POST['txtIdPersonal'];
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.planidear.com.ar/img/rrhh/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/rrhh/".$nombre_imagen);
$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/rrhh/'.$nombre_imagen;		

if($IdPersonal<>null){
	
	echo "<h1>"."<a href=\"/sistema/FormPersonalEditar.php?IdPersonal=".$IdPersonal."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");

$EditarRegistroFoto = "UPDATE `ComEmpleado` SET `Foto` = '$Imagen'  WHERE `ComEmpleado`.`IdPersonal` = ".$IdPersonal.";";

$ejecutar_EditarRegistroFotoe=mysqli_query($mysqli,$EditarRegistroFoto);
	
}	
		
mysqli_close($mysqli);
		
?>

    </div>
  </div>
</div>	

	
</body>
</html>