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
 <title>Implemento Borrar</title>
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
	
	
function AlertarAnulacion()
{
	window.location.replace = "http://planidear.com.ar/sistema/FormImpleInser.php";
	alert('Usted a anulado un registro!!');

	
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
	$Id_Implemento=$_GET['Id_Implemento'];//SELECT * FROM `ComImplemento` WHERE `Id_Implemento` = ".$Id_Implemento.";
echo $Id_Implemento; 
$queryImplemento = $mysqli -> query ("SELECT * FROM `ComImplemento` WHERE `Id_Implemento` = ".$Id_Implemento.";");

$rowImplemento = mysqli_fetch_assoc($queryImplemento);
		
		
?>			
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formImplementos" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
	  
	  
	  
    <tr>
      <td colspan="2" align="center"><label>Implementos</label></td>
    </tr>

    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_Implemento" type="text" id="txtId_Implemento" size="50" value="<?php print $rowImplemento['Id_Implemento'];?>"  />
		</td>
    </tr>
	  	  
	  
    <tr>
      <th width="">Implemento:</th>
      <td width=""><input name="txtImplemento" type="text" id="txtImplemento" size="50" value="<?php print $rowImplemento['Implemento'];?>"  />
		</td>
    </tr>
	  
	  
	  
    <tr>
      <th width="">Numero implemento en CMG:</th>
      <td width=""><input name="NumNumImpl" type="numb" id="NumNumImpl" size="50" value="<?php print $rowImplemento['NumImpl'];?>"/>
		</td>
    </tr>
	  

	  
 	  
	  
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
	
$Id_Implemento=$_POST['txtId_Implemento'];
$Implemento=$_POST['txtImplemento'];
$NumImpl=$_POST['NumNumImpl'];
$Familia=$_POST['listFamilia'];	
$SubFamilia=$_POST['listSubFamilia'];	
$Descripcion=$_POST['txtDescripcion'];	

		
if(!$Implemento==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");/*UPDATE `ComImplemento` SET `NumImpl` = '$NumImpl', `Implemento` = '$Implemento', `Fk_Familia` = '$Fk_Familia', `Fk_SubFamilia` = '$Fk_SubFamilia',
	 `Descripcion` = '$Descripcion' WHERE `ComImplemento`.`Id_Implemento` = ".$Id_Implemento.";*/
	
	
$BorrarImplemento = "DELETE FROM `ComImplemento` WHERE `ComImplemento`.`Id_Implemento` = ".$Id_Implemento.";";

$ejecutar_insertar=mysqli_query($mysqli,$BorrarImplemento);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	


	


    </div>
  </div>
</div>	

	
</body>
</html>