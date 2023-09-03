<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Editar productos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<script type="text/javascript">
function volverProd()
{
	window.location.href = "/sistema/FormProductos.php";
}


function volver()
{
	window.location.href = "/sistema/index.php";
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

$id=$_GET['id'];

include("Conexion/conexion.php");	
		
$queryProd = $mysqli -> query ("SELECT * FROM `productoscmg` WHERE `id` = ".$id.";");
	
$rowProd = mysqli_fetch_assoc($queryProd);

?>	
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formProdEdit" enctype="multipart/form-data">

<div align="">
  <table class="table table-hover">
    <tr>
      <td colspan="4" align="center"><label>Formulario Productos</label></td>
    </tr>
    <tr>
    <th width="">id</th>
      <td width=""><input name="txtid_Prod" type="number" id="txtid_Prod" value="<?php print $rowProd['id'];?>"/>
    <th width="">CodSistema:</th>
      <td width=""><input name="txtCodSistema" type="number" id="txtCodSistema" value="<?php print $rowProd['CodSistema'];?>"/>
      <th width="">Producto:</th>
      <td width=""><input name="txtProducto" type="text" id="txtProducto" size="50" value="<?php print $rowProd['Producto'];?>"/>
      
   </tr>

   <tr>

      <th width="">UM:</th>
      <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="listUM" id="listUM">
      <option value="<?php print $rowProd['UM']; ?>"><?php print $rowProd['UM']; ?></option>  
      <option value="Und">Und</option>
        <option value="Mt">Mt</option>
        <option value="Kg">Kg</option>
        <option value="Lt">Lt</option>
      </select></td>
      <th width="">Inactivo:</th>
      <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="listInactivo" id="listInactivo">
      <option value="<?php print $rowProd['inactivo']; ?>"><?php print $rowProd['inactivo']; ?></option>  
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select></td>
      <th width="">Destalle:</th>
      <td width=""><input name="txtDetalle" type="text" id="txtDetalle" size="50" value="<?php print $rowProd['Detalle'];?>"/>


   </tr>

    <tr>
     <th width="" colspan="">Imagen:</th>
<td colspan=""> 
<label>
      <a href="<?php print "FormImgProdEditar.php?id_Prod=".$rowProd['id_Prod']; ?>">
      <img name="imagen" id="imagen" style="border-radius: 50% 50%" width="100" heigth="100" src="<?php print $rowProd['imagen']; ?>"/></a>
      </label>	
	
		</td>
    <th width="">Plano:</th>
      <td width=""><input name="txtPlano" type="text" id="txtPlano" size="50" value="<?php print $rowProd['Plano'];?>"/>
    </tr>
<tr>
  <td>
<label>
  <input type="submit" class="btn btn-danger" name="btnEnviar" id="btnEnviar" value="Borrar" />
</label>
</td>
</tr>
	</table>
	</div>

<hr>

<?php
$id=$_POST['txtid_Prod'];	

		
if(!$Producto==null){
  include("Conexion/conexion.php");		 
  
  //DELETE FROM productoscmg WHERE `productoscmg`.`id` =
  $EditarProd = "DELETE FROM productoscmg WHERE `productoscmg`.`id` = '$id';";
  
  $ejecutar_Editar=mysqli_query($mysqli,$EditarProd);

}	
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramienta editada</th>
 </thead>
</tr>
<TR>
<TD><B>id</B></TD>
<TD><B>Cod</B></TD>
<TD><B>Producto</B></TD>
<TD><B>img</B></TD>
<TD><B>UM</B></TD>
<TD><B>Inactivo</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		

include("Conexion/conexion.php");	
$queryProdEd = $mysqli -> query ("SELECT * FROM `productoscmg` WHERE `id` = ".$id.";");
  
 while ($filaProdEd = mysqli_fetch_array($queryProdEd))

{
echo "<TR>\n";
echo "<td>".$filaProdEd['id']."</td>\n";
echo "<td>".$filaProdEd['CodSistema']."</td>\n";
echo "<td>".$filaProdEd['Producto']."</td>\n";
echo "<td>".'<img  src="'.$filaProdEd['imagen'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaProdEd['UM']."</td>\n";
echo "<td>".$filaProdEd['inactivo']."</td>\n";
echo "<td>"."<a href=\"/sistema/FormProdEditar.php?id=".$filaProdEd['id']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverProd()()\">volver productos</button>";
?>

	</form>
	
    </div>
  </div>
</div>	

	
</body>
</html>