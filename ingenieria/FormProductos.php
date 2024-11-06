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

	<title>Productos</title>
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

<form action="#" method="post" name="formProductos" enctype="multipart/form-data">
<div  >
  <table class="table table-hover">
    <tr>
      <td colspan="4"  ><strong><h3>Formulario Productos</h3></strong></td>
    </tr>
    <tr>
    <th >CodSistema:</th>
      <td ><input name="txtCodSistema" type="number" id="txtCodSistema" size="20" required/>
      <th >Producto:</th>
      <td ><input name="txtProducto" type="text" id="txtProducto" size="100" required/>
      
   </tr>

   <tr>

      <th >UM:</th>
      <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="listUM" id="listUM">
        <option value="Und" selected>Und</option>
        <option value="Mt">Mt</option>
        <option value="Kg">Kg</option>
        <option value="Lt">Lt</option>
      </select>
      <th >Destalle:</th>
      <td ><input name="txtDetalle" type="text" id="txtDetalle" size="100"/>

   </tr>

    <tr>
     <th >Cargar Img:</th>
<td > 
<label>
      <input type="file" name="imagen" id="imagen">
      <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>	
      <th width="">Plano:</th>
      <td width=""><input name="txtPlano" type="text" id="txtPlano" size="100"/>
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
$Plano=$_POST['txtPlano'];	

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamagno_imagen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.interno.comofrasrl.com.ar/sistema/img/procesos/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'], "img/procesos/".$nombre_imagen);
$imagen = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen;


if(!$Producto==null){
	
echo "<p>"."cargado"."</p>";
include("../Conexion/conexion.php");	  
$insertarProd = "INSERT INTO `productoscmg` (`id`, `CodSistema`, `Producto`, `Origen`, `UM`, `inactivo`, `Plano`, `Detalle`, `imagen`, `Neta`, `Tipo`) VALUES (NULL, '$CodSistema', '$Producto', 'Fabricado', '$UM', 'No', '$Plano', '$Detalle', '$imagen', '', NULL);";


$ejecutar_insertarProd=mysqli_query($mysqli,$insertarProd);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
<form action="#" method="post" name="formBuscarProd" enctype="multipart/form-data">

<div  >
  <table class="table">
    <tr>
      <td colspan=""  ><label>Buscar Productos</label></td>
    </tr>
    <tr>
    <th width="">CodSistema:</th>
      <td width=""><input name="txtCodSistemaB" type="text" id="txtCodSistemaB" size="11" value="<?= isset($_POST['txtCodSistemaB']) ? $_POST['txtCodSistemaB'] : '' ?>"/>
      <th width="">Productos:</th>
      <td width=""><input name="txtProductoB" type="text" id="txtProductoB" size="50" value="<?= isset($_POST['txtProductoB']) ? $_POST['txtProductoB'] : '' ?>"/>

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
<th colspan=\"8\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramientas cargadas</th>
 </thead>
</tr>
<TR>
<TD><B>id</B></TD>
<TD><B>Cod</B></TD>
<TD><B>Producto</B></TD>
<TD><B>imagen</B></TD>
<TD><B>Plano</B></TD>
<TD><B>UM</B></TD>
<TD><B>inactivo</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		
$CodSistemaB=$_POST['txtCodSistemaB'];	
$ProductoB=$_POST['txtProductoB'];

include("../Conexion/conexion.php");

$queryProdB = $mysqli -> query ("SELECT * FROM `productoscmg` WHERE `Producto` LIKE '%$ProductoB%' AND `CodSistema` LIKE '%$CodSistemaB%' ORDER BY `productoscmg`.`Producto` ASC LIMIT 20");
  
 while ($filaProdB = mysqli_fetch_array($queryProdB))

{
echo "<TR>\n";
echo "<td>".$filaProdB['id']."</td>\n";
echo "<td>".$filaProdB['CodSistema']."</td>\n";
echo "<td>".$filaProdB['Producto']."</td>\n";
echo "<td>".'<img  src="'.$filaProdB['imagen'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
if ($filaProdB['Plano']) {
  echo "<td>"."<a href=".$filaProdB['Plano']." target=\"_blank\"><img src=\"../img/iconoPdf.png\" alt=\"BtniconoPdf\" width=\"20\" height=\"20\"></a></td>\n";
}else {
  echo "<td>"."-"."</td>\n";
}

echo "<td>".$filaProdB['UM']."</td>\n";
echo "<td>".$filaProdB['inactivo']."</td>\n";
echo "<td>"."<a href=\"/sistema/ingenieria/FormProdEditar.php?id=".$filaProdB['id']."\"><img src=\"../img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
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