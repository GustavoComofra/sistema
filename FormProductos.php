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
 <title>Productos</title>
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
	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formProductos" enctype="multipart/form-data">
<div align="">
  <table class="table table-hover">
    <tr>
      <td colspan="4" align="center"><label>Formulario Productos</label></td>
    </tr>
    <tr>
    <th width="">CodSistema:</th>
      <td width=""><input name="txtCodSistema" type="number" id="txtCodSistema" size="20"/>
      <th width="">Producto:</th>
      <td width=""><input name="txtProducto" type="text" id="txtProducto" size="100" required/>
      
   </tr>

   <tr>

      <th width="">UM:</th>
      <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="listUM" id="listUM">
        <option value="Und" selected>Und</option>
        <option value="Mt">Mt</option>
        <option value="Kg">Kg</option>
        <option value="Lt">Lt</option>
      </select>
      <th width="">Destalle:</th>
      <td width=""><input name="txtDetalle" type="text" id="txtDetalle" size="100"/>
   </tr>

    <tr>
     <th width="" colspan="3">Cargar Img:</th>
<td colspan=""> 
<label>
      <input type="file" name="imagen" id="imagen">
      <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>	

		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$CodSistema=$_POST['txtCodSistema'];	
$Producto=$_POST['txtProducto'];	
$UM=$_POST['listUM'];	
$Detalle=$_POST['txtDetalle'];	
//$imagen=$_POST['txtimg_herr'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamagno_imagen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre_imagen);
$imagen = 'https://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen;

if(!$Producto==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");		  

$insertarProd = "INSERT INTO `Productos` (`id_Prod`, `Producto`, `CodSistema`, `Detalle`, `imagen`, `Tipo`, `Origen`, `Netea`, `UM`) VALUES (NULL, '$Producto', '$CodSistema', 'Detalle', '$imagen', '2', '', '', '$UM');";

$ejecutar_insertarProd=mysqli_query($mysqli,$insertarProd);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarProd" enctype="multipart/form-data">

<div align="">
  <table class="table">
    <tr>
      <td colspan="" align="center"><label>Buscar Productos</label></td>
    </tr>
    <tr>
    <th width="">CodSistema:</th>
      <td width=""><input name="txtCodSistemaB" type="text" id="txtCodSistemaB" size="11"/>
      <th width="">Productos:</th>
      <td width=""><input name="txtProductoB" type="text" id="txtProductoB" size="50"/>

<label>
   <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
</label>	
			
		</td>
    </tr>
	</table>
	</div>

<?php
echo "
<table class=\"table table-striped\">
  <thead>
<th colspan=\"5\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramientas cargadas</th>
 </thead>
</tr>
<TR>
<TD><B>id</B></TD>
<TD><B>Cod</B></TD>
<TD><B>Producto</B></TD>
<TD><B>imagen</B></TD>
<TD><B>UM</B></TD>
<TD><B>inactivo</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		
$CodSistemaB=$_POST['txtCodSistemaB'];	
$ProductoB=$_POST['txtProductoB'];


include("Conexion/conexion.php");	

$queryProdB = $mysqli -> query ("SELECT * FROM `Productos` WHERE `Producto` LIKE '%$ProductoB%' AND `CodSistema` LIKE '%$CodSistemaB%'");
  
 while ($filaProdB = mysqli_fetch_array($queryProdB))

{
echo "<TR>\n";
echo "<td>".$filaProdB['id_Prod']."</td>\n";
echo "<td>".$filaProdB['CodSistema']."</td>\n";
echo "<td>".$filaProdB['Producto']."</td>\n";
echo "<td>".'<img  src="'.$filaProdB['imagen'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaProdB['UM']."</td>\n";
echo "<td>".$filaProdB['inactivo']."</td>\n";
echo "<td>"."<a href=\"/sistema/FormProdEditar.php?id_Prod=".$filaProdB['id_Prod']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
//echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$filaProceso['id_proceso']."\" ><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";		 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>