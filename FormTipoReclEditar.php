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
 <title>Tipo de reclamo Editar</title>
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
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
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
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");
$insertarTipoRecla = "UPDATE `ComTipoRecla` SET `TipoReclamo` = '$TipoReclamo', `Descripcion` = '$Descripcion' WHERE `ComTipoRecla`.`Id_TipoRecla` = ".$Id_TipoRecla.";";

$ejecutar_insertar=mysqli_query($mysqli,$insertarTipoRecla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado tipos de reclamo</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>Descripcion</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Id_TipoRecla=$_POST['txtId_TipoRecla'];		
$TipoReclamo=$_POST['txtTipoReclamoB'];	
$Descripcion=$_POST['txtDescripcionB'];	

include("Conexion/conexion.php");	//UPDATE `TipoFallaRecl` SET `TipoReclamo` = '$TipoReclamo', `Descripcion` = '$Descripcion' WHERE `Id_TipoRecla`.`Id_TipoRecla` = ".$Id_TipoRecla.";
$queryTipoReclamoB = $mysqli -> query ("SELECT * FROM `ComTipoRecla` WHERE `Id_TipoRecla` = ".$Id_TipoRecla.";");
  
 while ($filaTipoReclamoB = mysqli_fetch_array($queryTipoReclamoB))

{
echo "<TR>\n";
echo "<td>".$filaTipoReclamoB['Id_TipoRecla']."</td>\n";
echo "<td>".$filaTipoReclamoB['TipoReclamo']."</td>\n";
echo "<td>".$filaTipoReclamoB['Descripcion']."</td>\n";


echo "<td>"."<a href=\"/sistema/FormTipoReclEditar.php?Id_TipoRecla=".$filaTipoReclamoB['Id_TipoRecla']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormTipoReclBorrar.php?Id_TipoRecla=".$filaTipoReclamoB['Id_TipoRecla']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>



    </div>
  </div>
</div>	

	
</body>
</html>