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
 <title>Cliente</title>
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
	window.location.href = "/sistema/panel.php";
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
	$idMaq=$_GET['idMaq'];

$queryItemBorrar = $mysqli -> query ("SELECT * FROM `Maquinaria` WHERE `idMaq` = ".$idMaq.";");

$rowItemBorrar = mysqli_fetch_assoc($queryItemBorrar);
		?>
		
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formItemsBorrar" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Maquina a borrar</label></td>
    </tr>
	  
    <tr>
      <th width="">idMaq:</th>
      <td width=""><input name="txtidMaq" type="text" id="txtidMaq" size="50" value="<?php print $rowItemBorrar['idMaq'];?>"/>
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Maquina:</th>
      <td width=""><input name="txtMaquina" type="text" id="txtMaquina" size="50" value="<?php print $rowItemBorrar['Maquina'];?>"/>
		</td>
    </tr>

	<tr>
      <th width="">Modelo:</th>
      <td width=""><input name="txtModelo" type="text" id="txtModelo" size="50" value="<?php print $rowItemBorrar['Modelo'];?>"/>
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
$idMaq=$_POST['txtidMaq'];	

		
if(!$idMaq==null){
	

echo "<h2>"."<a href=\"/sistema/Maquinaria.php\">Borrado Volver?</a>"."</h2>";
include("Conexion/conexion.php");

	
$BorraMAquinaria = "DELETE FROM Maquinaria WHERE `Maquinaria`.`idMaq` = ".$idMaq.";";	

$ejecutar_BorraMAquinaria=mysqli_query($mysqli,$BorraMAquinaria);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>


    </div>
  </div>
</div>	

	
</body>
</html>