<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../layaut/script/js/Archivo.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../layaut/estilos/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link href="../img/Icono.png" rel="icon" type="image/png">
 <title>Cliente Editar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include("../layaut/header/header.php");
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
	$idMaq=$_GET['idMaq'];
echo $idMaq; 
$queryMaq = $mysqli -> query ("SELECT * FROM `Maquinaria` WHERE `idMaq` = ".$idMaq.";");

$rowMaq = mysqli_fetch_assoc($queryMaq);
		?>
				
	
		
    </div>
    <div class="col-md-auto">

    <form action="#" method="post" name="formMaquinaria" enctype="multipart/form-data">
		<div id="respuesta"></div>
	<div class="form-group">

<div class="row">
<div class="col-2">
<input type="number" name="txtidMaq" id="idMaq" value="<?php print $rowMaq['idMaq'];?>">
		<label for="txtNumMaq">NumMaq</label>
    <input class="form-control" type="number" name="txtNumMaq" id="txtNumMaq" placeholder="Numero de Maquina" value="<?php print $rowMaq['NumMaq'];?>">

	<label for="txtDiasManteni">Dias de mantenimiento</label>	
	<input class="form-control" type="number" name="txtDiasManteni" id="txtDiasManteni"   min="0"  value="<?php print $rowMaq['DiasManteni'];?>">
	
	<label for="txtValorMaq">Valor</label>	
	<input class="form-control" type="number" name="txtValorMaq" id="txtValorMaq" placeholder="Dolar" min="0"  value="<?php print $rowMaq['ValorMaq'];?>">
</div>
<div class="col">


<label for="txtMaquina">Maquina</label>
    <input class="form-control" type="text" name="txtMaquina" id="txtMaquina" value="<?php print $rowMaq['Maquina'];?>">

	<label for="txtModelo">Modelo</label>	
	<input class="form-control" type="text" id="txtModelo" name="txtModelo" value="<?php print $rowMaq['Modelo'];?>" >


	<label for="txtContactoMaq">Contacto</label>	
	<input class="form-control" type="text" name="txtContactoMaq" id="txtContactoMaq" value="<?php print $rowMaq['ContactoMaq'];?>" >

		</div>

<div class="col">

<label for="listProvedMaq">Proveedor</label>	
<select class="form-control"  name="listProvedMaq" size="1" id="listProvedMaq" required>
        <option value="<?php print $rowMaq['ProvedMaq'];?>" > <?php print $rowMaq['ProvedMaq'];?></option>
        <?php
include("Conexion/conexion.php");
$queryProv = $mysqli -> query ("SELECT * FROM `Proveedor` ORDER BY `Proveedor`.`Proveedor` ASC");
 while ($valoresProv = mysqli_fetch_array($queryProv))
{
echo '<option value="'.$valoresProv[IdProv].'">'.$valoresProv[IdProv].' - '.$valoresProv[Proveedor].'</option>';
}
	?>
      </select>

<label for="listSector">Sector</label>	
<select class="form-control" name="listSector" size="1" id="listSector">
        <option value="1">Sector</option>
        <?php
include("Conexion/conexion.php");
  
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresSector = mysqli_fetch_array($querySector))

		  
		  {

 echo '<option value="'.$valoresSector[IdSector].'">'.$valoresSector[SectorFk].'</option>';
}
	?>
      </select>

<label for="listClasificacion">Clasificacion</label>	
<select class="form-control"  name="listClasificacion" size="1" id="listClasificacion" required>
        <option value=2>Seleccione Clasificacion</option>
        <?php
include("Conexion/conexion.php");
$queryClasi = $mysqli -> query ("SELECT * FROM `Clasificacion` ORDER BY `Clasificacion`.`Clasificacion` ASC");
 while ($valoresClasi = mysqli_fetch_array($queryClasi))
{
echo '<option value="'.$valoresClasi[idClasi].'">'.$valoresClasi[idClasi ].' - '.$valoresClasi[Clasificacion].'</option>';
}
	?>
      </select>	  
	  
	  
</div>
</div>

<div class="row">

<div class="col">



</div>

<div class="col">


</div>

</div>

<div class="row">

<div class="col">
<label for="imagen" class="form-label">Imagen</label>
  <input class="form-control" type="file" id="imagen" name="imagen">

</div>

<div class="col">



</div>

</div>

<div class="row">
	<div class="form-floating">
  <textarea class="form-control" placeholder="Observacion" name="txtObsMaq" id="txtObsMaq"></textarea>
  <label for="txtObsMaq">Observacion</label>
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Link de manual" name="txtLink" id="txtLink" ></textarea>
  <label for="txtLink">Link</label>

</div>

</div>

<input class="form-control" type="hidden" id="txtuserMAq" min="1" name="txtuserMAq" value="<?php echo $_SESSION['usuario'];  ?>">
	
	
      <button type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>
  

	  <?php
$NumMaq=$_POST['txtNumMaq'];	
$Maquina=$_POST['txtMaquina'];	
$DiasManteni=$_POST['txtDiasManteni'];	
$ValorMaq=$_POST['txtValorMaq'];
$Modelo=$_POST['txtModelo'];	
$ContactoMaq=$_POST['txtContactoMaq'];	
$ProvedMaq=$_POST['listProvedMaq'];	
$SectorMaq=$_POST['listSector'];

$Fk_Clasi=$_POST['listClasificacion'];	
$imgMaq=$_POST['imagen'];	
$ObsMaq=$_POST['txtObsMaq'];	
$Link=$_POST['txtLink'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/manten/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/manten/".$nombre_imagen);

$ImagenNombre = 'https://interno.comofrasrl.com.ar/sistema/img/manten/'.$nombre_imagen;

if ($ImagenNombre == 'https://interno.comofrasrl.com.ar/sistema/img/manten/') {
    $imgMaq = 'iconoMant.png';
}else {
    $imgMaq = $ImagenNombre;
}

// echo "NumMaq ".$NumMaq."<br>";	
// echo "Maquina ".$Maquina."<br>";	
// echo "DiasManteni ".$DiasManteni."<br>";	
// echo "ValorMaq ".$ValorMaq."<br>";
// echo "Modelo ".$Modelo."<br>";
// echo "ContactoMaq ".$ContactoMaq."<br>";	
// echo "ProvedMaq ".$ProvedMaq."<br>";		
// echo "SectorMaq ".$SectorMaq."<br>";
// echo "Fk_Clasi ".$Fk_Clasi."<br>";
// echo "imgMaq ".$imgMaq."<br>";
// echo "ObsMaq ".$ObsMaq."<br>";
// echo "Link ".$Link."<br>";	

if(!$Maquina==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");
$insertarMaquina = "INSERT INTO `Maquinaria` (`idMaq`, `NumMaq`, `Maquina`, `Modelo`, `Link`, `imgMaq`, `ProvedMaq`, `Fk_Clasi`, `ContactoMaq`, `DiasManteni`, `ValorMaq`, `ObsMaq`, `userMAq`, `SectorMaq`, `Activo`) VALUES (NULL, '$NumMaq', '$Maquina', '$Modelo', '$Link', '$imgMaq', '$ProvedMaq', '$Fk_Clasi', '$ContactoMaq', '$DiasManteni', '$ValorMaq', '$ObsMaq', 'userMAq', '$SectorMaq', 'Si');";

//$ejecutar_insertar=mysqli_query($mysqli,$insertarMaquina);
 }		
		
mysqli_close($mysqli);	

	
?>
      </form>
	
	

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"10\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Clientes</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Direccion</B></TD>
<TD><B>Localidad</B></TD>
<TD><B>Provincia</B></TD>
<TD><B>Telefono</B></TD>

<TD><B>Email</B></TD>
<TD><B>Contacto</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";	
	
$Id_Cliente=$_POST['txtId_Cliente'];	
$Cliente=$_POST['txtClienteB'];	
$Direccion=$_POST['txtDireccionB'];	
$Localidad=$_POST['txtLocalidadB'];	
$Provincia=$_POST['txtProvinciaB'];	
	
include("Conexion/conexion.php");	
$queryClienteB = $mysqli -> query ("SELECT * FROM `ComVisCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";");
  
 while ($filaClienteB = mysqli_fetch_array($queryClienteB))

{
echo "<TR>\n";
echo "<td>".$filaClienteB['Id_Cliente']."</td>\n";
echo "<td>".$filaClienteB['Cliente']."</td>\n";
echo "<td>".$filaClienteB['Direccion']."</td>\n";
echo "<td>".$filaClienteB['Localidad']."</td>\n";
echo "<td>".$filaClienteB['Provincia']."</td>\n";	 
echo "<td>".$filaClienteB['Telefono']."</td>\n";
echo "<td>".$filaClienteB['Email']."</td>\n";
echo "<td>".$filaClienteB['Contacto']."</td>\n";		 


echo "<td>"."<a href=\"/sistema/FormClienEditar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormClienBorrar.php?Id_Cliente=".$filaClienteB['Id_Cliente']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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