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
 <title>Nuevo Items falla</title>
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
	
	alert('Esta seguro de borrar Costo?');
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
	$Fk_Num_Recl_Cost=$_GET['NumReclamo'];
//echo $Id_CostoRecl; 
$queryNuevoCosto = $mysqli -> query ("SELECT * FROM `CostoReclamo` WHERE `Fk_Num_Recl_Cost` = ".$Fk_Num_Recl_Cost.";");

$rowNuevoCosto = mysqli_fetch_assoc($queryNuevoCosto);

	?>			

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formNuevoCosto" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="8" align="center"><label for="txtCosto">Costo de reclamo</label></td>
    </tr>
    <tr>
	<td width="156">Num</td>	
	<td width="156"></td>
    <td width="156">Cantidad</td>
    <td width="353">Detalle</td>
	</tr>

    <tr>
		<td><input name="txtFk_Num_Recl_Cost" type="text" id="txtFk_Num_Recl_Cost" title="Fk_Num_Recl_Cost" size="10" value="<?php print $Fk_Num_Recl_Cost;?>"  /></td>
		<td></td>
		<td><input name="txtCantidad" type="number" id="txtCantidad" title="Cantidad" size="10"  /></td>
      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50"  /></td>
	  </tr>
	  <tr>
	<td width="156">Pesos</td>
    <td width="156">Dolar</td>
	<td width="156">Chasis</td>
    <td width="353">Observacion</td>
    </tr>
	<tr>
	  <td><input name="txtPesos" type="number" id="txtPesos" title="Pesos" size="10"  /></td>
	  <td><input name="txtDolar" type="number" id="txtDolar" title="Dolar" size="10"  /></td>
	  <td><input name="txtFk_Chasis" type="number" id="txtFk_Chasis" title="Fk_Chasis" size="10"  /></td>
	  <td><input name="txtObservacion" type="text" id="txtObservacion" title="Observacion" size="50"  /></td>
    </tr>
	 <tr> 
	  
  <td>	
        <input type="submit" class="btn btn-success" name="btnNuevo" id="btnNuevo" value="Nuevo"  />
	  

		</td>

      <td>&nbsp;</td>
    </tr>	

	  
  </table>
	 

</div>
</form>
	
	

<?php
	
$IdCosto =$_POST['txtIdCosto'];	
$Fk_Num_Recl_Cost=$_POST['txtFk_Num_Recl_Cost'];		
$Cantidad=$_POST['txtCantidad'];	
$Pesos=$_POST['txtPesos'];	
$Dolar=$_POST['txtDolar'];	
$Fk_Chasis=$_POST['txtFk_Chasis'];	
$Observacion=$_POST['Observacion'];

$Detalle=$_POST['txtDetalle'];	

if(!$Fk_Num_Recl_Cost==null){
	
	echo "<h1>"."<a href=\"/sistema/FormReclamoEditar.php?NumReclamo=".$Fk_Num_Recl_Cost."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");	

$InsertarRegistro = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Cantidad`, `Detalle`, `Pesos`, `Dolar`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$Fk_Num_Recl_Cost', '$Cantidad', '$Detalle', '$Pesos', '$Dolar', '$Fk_Chasis', '$Observacion');";




$ejecutar_InsertarRegistro=mysqli_query($mysqli,$InsertarRegistro);

	
}	
	

	
	
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>