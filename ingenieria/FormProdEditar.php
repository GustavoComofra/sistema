<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>

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

	<title>Editar Producto</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<div class="col-9 mt-0" style="margin-left: 20px">

    <?php

$id=$_GET['id'];

include("../Conexion/conexion.php");
		
$queryProd = $mysqli -> query ("SELECT * FROM `productoscmg` WHERE `id` = ".$id.";");
	
$rowProd = mysqli_fetch_assoc($queryProd);

?>	

<form action="#" method="post" name="formProdEdit" enctype="multipart/form-data">

<div  >
  <table class="table table-hover">
    <tr>
      <td colspan="4"  ><label>Formulario Productos</label></td>
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
      <td width=""><input name="txtPlano" type="text" id="txtPlano" size="100" value="<?php print $rowProd['Plano'];?>"/>
    </tr>
<tr>
  <td>
<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
</label>
</td>
</tr>
	</table>
	</div>

<hr>

<?php
$id=$_POST['txtid_Prod'];	
$CodSistema=$_POST['txtCodSistema'];	
$Producto=$_POST['txtProducto'];	
$UM=$_POST['listUM'];	
$Detalle=$_POST['txtDetalle'];
$Plano=$_POST['txtPlano'];
$Inactivo=$_POST['listInactivo'];	
	
if(!$Producto==null){
  include("../Conexion/conexion.php");
  
  //DELETE FROM productoscmg WHERE `productoscmg`.`id` =
  $EditarProd = "UPDATE `productoscmg` SET `CodSistema` = '$CodSistema', `Producto` = '$Producto', `UM` = '$UM', `inactivo` = '$Inactivo', `Plano` = '$Plano', `Detalle` = '$Detalle' WHERE `productoscmg`.`id` = '$id';";
  
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

include("../Conexion/conexion.php");
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
echo "<td>"."<a href=\"/sistema/ingenieria/FormProdEditar.php?id=".$filaProdEd['id']."\"><img src=\"../img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 
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

<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!-- <script src="js/dataTables.bootstrap.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

	<!-- datatables-->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- datatables extension SELECT -->
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	<!-- extension BOTONES -->
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

	<!-- para botenes de exportar -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
	
</body>
</html>