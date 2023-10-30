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
 <title>Garantia Borrar</title>
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
	$Id_gar=$_GET['Id_gar'];
$queryGarantBorr = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `Id_gar` = ".$Id_gar.";");

$rowGarantBorr = mysqli_fetch_assoc($queryGarantBorr);
		?>
				
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formBorrarGarantia">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Garantia a borrar:</label></td>
    </tr>
    <tr>
      <th width="">Num:</th>
      <td width=""><input name="txtId_gar" type="number" id="txtId_gar" size="50" value="<?php print $rowGarantBorr['Id_gar'];?>"/>
		</td>
    </tr>	 
    <tr>
      <th width="">Serie:</th>
      <td width=""><input name="txtSerie" type="number" id="txtSerie" size="50" value="<?php print $rowGarantBorr['Serie'];?>" required/>
		</td>
    </tr>

    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="50" value="<?php print $rowGarantBorr['Cliente'];?>"/>
		</td>
    </tr> 
	  
	<tr>
	<td>
		<label>
       <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	  
	  

      </select>
		
		</td>
    </tr> 
	</table>
	</div>

<hr>

<?php
$Id_gar=$_POST['txtId_gar'];	
$Serie=$_POST['txtSerie'];	
$Cliente=$_POST['txtCliente'];	
		
if(!$Serie==null){
	

	echo "<h2>"."<a href=\"/sistema/ListadoGarantias.php\">Borrado Volver?</a>"."</h2>";
include("Conexion/conexion.php");

$Borrar = "DELETE FROM Garantia WHERE `Garantia`.`Id_gar` = ".$Id_gar.";";

$ejecutar_Borrar=mysqli_query($mysqli,$Borrar);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>