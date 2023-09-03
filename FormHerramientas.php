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
  <link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Herramientas</title>
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

<form action="#" method="post" name="formHerramientas" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario Herramientas</label></td>
    </tr>
    <tr>
      <th width="">Herramienta:</th>
      <td width=""><input name="txtHerramienta" type="text" id="txtHerramienta" size="30" required/>
      <label>
      <input type="file" name="img_herr" id="img_herr">
      </label>	
   </tr>
    <tr>
      <th width="">Obs:</th>
      <td width=""><input name="txtObs" type="text" id="txtObs" size="50"/>

<label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
</label>		
		</td>
    </tr>

	</table>
	</div>

<hr>

<?php

$Herramienta=$_POST['txtHerramienta'];	

$nombre_img_herr=$_FILES['img_herr']['name'];
$tipo_img_herr=$_FILES['img_herr']['type'];
$tamagno_img_herr=$_FILES['img_herr']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/procesos/' . $nombre_img_herr;
move_uploaded_file($_FILES['img_herr']['tmp_name'],"img/procesos/".$nombre_img_herr);
$Imagenimg_herr = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_img_herr;

$Obs=$_POST['txtObs'];	
		
if(!$Herramienta==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");		  

/*
INSERT INTO `Herramienta` (`id_herr`, `Herramienta`, `img_herr`, `Obs`, `baja`) VALUES (NULL, 'Herramienta', 'img_herr', 'Obs', 'No');
*/
$insertarHerramienta = "INSERT INTO `Herramienta` (`id_herr`, `Herramienta`, `img_herr`, `Obs`, `baja`) VALUES (NULL, '$Herramienta', '$Imagenimg_herr', '$Obs', 'No');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarHerramienta);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscarHerramienta" enctype="multipart/form-data">

<div align="">
  <table width=""  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar herramientas</label></td>
    </tr>
    <tr>
      <th width="">Herramienta:</th>
      <td width=""><input name="txtHerramientaB" type="text" id="txtHerramientaB" size="11"/>
      </select></td>
      <td><strong>Baja: </strong><select name="listbaja" size="1" id="listbaja">
        <option value="No" selected>No</option>
        <option value="Si">Si</option>
        <option value="%%">Todos</option>
      </select>
      <label>
   <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
</label>	
		</td>

	</table>
	</div>

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"5\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramientas cargadas</th>
 </thead>
</tr>
<TR>
<TD><B>id_herr</B></TD>
<TD><B>Herramienta</B></TD>
<TD><B>img_herr</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Baja</B></TD>
<TD><B>Editar</B></TD>
</TR>
";		
$HerramientaB=$_POST['txtHerramientaB'];	
$bajaB=$_POST['listbaja'];


include("Conexion/conexion.php");	

$queryHerra = $mysqli -> query ("SELECT * FROM `Herramienta` WHERE `Herramienta` LIKE '%$HerramientaB%' AND `baja` LIKE '$bajaB' ORDER BY `Herramienta` ASC");
  
 while ($filaHerra = mysqli_fetch_array($queryHerra))

{
echo "<TR>\n";
echo "<td>".$filaHerra['id_herr']."</td>\n";
$varHerra=$filaHerra['Herramienta'];
echo "<td>".$filaHerra['Herramienta']."</td>\n";
echo "<td>".'<img  src="'.$filaHerra['img_herr'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "<td>".$filaHerra['Obs']."</td>\n";
echo "<td>".$filaHerra['baja']."</td>\n";

echo "<td>"."<a href=\"/sistema/FormHerrEditar.php?id_herr=".$filaHerra['id_herr']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

//echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormEstudBorrar.php?id_herr=".$filaHerra['id_herr']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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