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
include ("MarcoIzquierdo.php");

?>	
<?php
        include("Conexion/conexion.php");
        $id_proceso = $_GET['id_proceso'];
        //echo $id_proceso; 
        $queryprocesoImg = $mysqli->query("SELECT * FROM `VisProceso` WHERE `id_proceso` = " . $id_proceso . ";");

        $rowprocesoImg = mysqli_fetch_assoc($queryprocesoImg);
                    ?>		

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formProcesoImagen" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="3" align="center"><label for="txtimgprod">Imagen</label></td>
    </tr>
    <tr>
		<td width="156">id</td>
	<td width="">Proceso</td>	
	<td width="156">Imagen</td>
    <td width="156">Nueva</td>
   
    </tr>
    <tr>
		<td><input name="txtid_proceso" type="text" id="txtid_proceso" title="id_proceso" size="10" value="<?php print $rowprocesoImg['id_proceso'];?>" /></td>
		<td><input name="txtProceso" type="text" id="txtProceso" title="Proceso" size="80" value="<?php print $rowprocesoImg['Proceso'];?>" /></td>
		
			
			<?php 
			
echo "<td>".'<img  src="'.$rowprocesoImg['imgprod'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
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
	
	
$id_proceso=$_POST['txtid_proceso'];
$Proceso=$_POST['txtProceso'];	
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.planidear.com.ar/img/procesos/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/procesos/".$nombre_imagen);
$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen;		

if(!$id_proceso==null){
	
	echo "<h1>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$id_proceso."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");	//UPDATE `ComReclamo` SET `Imagen1` = '$Imagen' WHERE `ComFallaRecl`.`NumReclamo` = ".$Fk_NumRecl.";

//$EditarRegistroImgProce = "UPDATE `Proceso` SET `imgprod` = '$Imagen' WHERE `Proceso`.`id_proceso` = ".$id_proceso.";";
$EditarRegistroImgProce = "UPDATE `Proceso` SET `imgprod` = '$Imagen' WHERE `Proceso`.`id_proceso` = ".$id_proceso.";";
//UPDATE `Proceso` SET `imgprod` = 'http://interno.comofrasrl.com.ar/sistema/122001.JPG' WHERE `Proceso`.`id_proceso` = 39;


$ejecutar_EditarRegistroImgProce=mysqli_query($mysqli,$EditarRegistroImgProce);

	
}	
	

	
	
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>