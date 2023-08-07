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
 <title>Editar Items falla</title>
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
	$Id_FallaRecl=$_GET['Id_FallaRecl'];
//echo $Id_FallaRecl; 
$queryReclamoItem = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Id_FallaRecl` = ".$Id_FallaRecl.";");

$rowReclamoItem = mysqli_fetch_assoc($queryReclamoItem);

	?>			

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="3" align="center"><label for="txtFalla">Falla</label></td>
    </tr>
    <tr>
	<td width="156">Num</td>	
	<td width="156">Id</td>
    <td width="156">Falla</td>
    <td width="353">Detalle</td>
    </tr>
    <tr>
		<td><input name="txtFk_NumRecl" type="text" id="txtFk_NumRecl" title="Fk_NumRecl" size="10" value="<?php print $rowReclamoItem['Fk_NumRecl'];?>" /></td>
		<td><input name="txtId_FallaRecl" type="text" id="txtId_FallaRecl" title="Id_FallaRecl" size="10" value="<?php print $rowReclamoItem['Id_FallaRecl'];?>" /></td>
      <td><select name="listFalla" size="1" id="listFalla">
     <option value="<?php print $rowReclamoItem['Id_FallaRecl'];?>"><?php print $rowReclamoItem['ItemFalla'];?></option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` ORDER BY `ComItemFalla`.`ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';

}
		  mysqli_close($mysqli);

	?>
		  
	  
      </select></td>

      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50" value="<?php print $rowReclamoItem['Detalle'];?>" />

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
	
$Id_FallaRecl=$_POST['txtId_FallaRecl'];	
$Fk_NumRecl=$_POST['txtFk_NumRecl'];		
$Falla=$_POST['listFalla'];	
$Detalle=$_POST['txtDetalle'];	

if(!$Falla==null){
	
	echo "<h1>"."<a href=\"/RRHH/FormReclamoEditar.php?NumReclamo=".$Fk_NumRecl."\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");	

$EditarRegistro = "UPDATE `ComFallaRecl` SET `Falla` = '$Falla', `Detalle` = '$Detalle' WHERE `ComFallaRecl`.`Id_FallaRecl` = 25";

$ejecutar_EditarRegistro=mysqli_query($mysqli,$EditarRegistro);

	
}	
	

	
	
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>