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
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Editar Items Costo</title>
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
include("Conexion/conexion.php");		
	$IdCosto=$_GET['IdCosto'];
//echo $Id_CostoRecl; 
$queryEditarCosto = $mysqli -> query ("SELECT * FROM `CostoReclamo` WHERE `IdCosto` = ".$IdCosto.";");

$rowEditarCosto = mysqli_fetch_assoc($queryEditarCosto);

	?>			

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formCostoReclamo" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="8" align="center"><label for="txtCosto">Costo de reclamo</label></td>
    </tr>
    <tr>
	<td width="156">Num</td>	
	<td width="156">Id</td>
    <td width="156">Cantidad</td>
    <td width="353">Detalle</td>
	</tr>

    <tr>
		<td><input name="txtFk_Num_Recl_Cost" type="text" id="txtFk_Num_Recl_Cost" title="Fk_Num_Recl_Cost" size="10" value="<?php print $rowEditarCosto['Fk_Num_Recl_Cost'];?>" /></td>
		<td><input name="txtIdCosto" type="text" id="txtIdCosto" title="IdCosto" size="10" value="<?php print $rowEditarCosto['IdCosto'];?>" /></td>
		<td><input name="txtCantidad" type="number" id="txtCantidad" title="Cantidad" size="10" value="<?php print $rowEditarCosto['Cantidad'];?>" /></td>
      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50" value="<?php print $rowEditarCosto['Detalle'];?>" /></td>
	  </tr>
	  <tr>
	<td width="156">Pesos</td>
    <td width="156">Dolar</td>
	<td width="156">Chasis</td>
    <td width="353">Observacion</td>
    </tr>
	<tr>
	  <td><input name="txtPesos" type="number" id="txtPesos" title="Pesos" size="10" value="<?php print $rowEditarCosto['Pesos'];?>" /></td>
	  <td><input name="txtDolar" type="number" id="txtDolar" title="Dolar" size="10" value="<?php print $rowEditarCosto['Dolar'];?>" /></td>
	  <td><input name="txtFk_Chasis" type="number" id="txtFk_Chasis" title="Fk_Chasis" size="10" value="<?php print $rowEditarCosto['Fk_Chasis'];?>" /></td>
	  <td><input name="txtObservacion" type="text" id="txtObservacion" title="Observacion" size="50" value="<?php print $rowEditarCosto['Observacion'];?>" /></td>
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

$EditarRegistro = "UPDATE `CostoReclamo` SET `Cantidad` = '$Cantidad', `Detalle` = '$Detalle', `Pesos` = '$Pesos', `Dolar` = '$Dolar', `Fk_Chasis` = '$Fk_Chasis', `Observacion` = '$Observacion' WHERE `CostoReclamo`.`IdCosto` = '$IdCosto'";


$ejecutar_EditarRegistro=mysqli_query($mysqli,$EditarRegistro);

	
}	
	

	
	
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>