<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
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
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Tipo de reclamo Borrar</title>
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
	window.location.href = "/sistema/panel.php";
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
	$Id_TipoRecla=$_GET['Id_TipoRecla'];
echo $Id_TipoRecla; 
$queryTipoRecla = $mysqli -> query ("SELECT * FROM `ComTipoRecla` WHERE `Id_TipoRecla` = ".$Id_TipoRecla.";");

$rowTipoRecla = mysqli_fetch_assoc($queryTipoRecla);
		?>
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formTipoReclamo" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Editar Tipo de reclamo</label></td>
    </tr>
	  
    <tr>
      <th width="">Id :</th>
      <td width=""><input name="txtId_TipoRecla" type="text" id="txtId_TipoRecla" size="30" value="<?php print $rowTipoRecla['Id_TipoRecla'];?>" />
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Tipo :</th>
      <td width=""><input name="txtTipoReclamo" type="text" id="txtTipoReclamo" size="30" value="<?php print $rowTipoRecla['TipoReclamo'];?>" />
		</td>
    </tr>
    <tr>
      <th width="">Descripcion :</th>
      <td width=""><input name="txtDescripcion" type="text" id="txtDescripcion" size="30" value="<?php print $rowTipoRecla['Descripcion'];?>"/>
		</td>
    </tr>
	  
	<tr>
	<td>
		<label>
     <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	  
	
	</table>
	</div>

<hr>

<?php
$Id_TipoRecla=$_POST['txtId_TipoRecla'];
$TipoReclamo=$_POST['txtTipoReclamo'];	
$Descripcion=$_POST['txtDescripcion'];	
//$Provincia=$_POST['listProvincia'];	
		
if(!$TipoReclamo==null){
	
echo "<h1>"."Borrado"."</h1>";
include("Conexion/conexion.php");
$insertarTipoRecla = "DELETE FROM `ComTipoRecla` WHERE `ComTipoRecla`.`Id_TipoRecla` =  ".$Id_TipoRecla.";";

$ejecutar_insertar=mysqli_query($mysqli,$insertarTipoRecla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	

    </div>
  </div>
</div>	

	
</body>
</html>