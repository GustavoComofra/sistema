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
 <title>Nuevas personas con quien convives</title>
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

function volverPare()
{
	window.location.href = "/sistema/ListParentesco.php";
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

		<?php
$Cuil_Pers=$_GET['Cuil_Pers'];
echo $Cuit;	
include("Conexion/conexion.php");	
$queryEstudPersonal = $mysqli -> query ("SELECT * FROM `Convive` WHERE `Cuil_Pers` = ".$Cuil_Pers.";");
	
$row = mysqli_fetch_assoc($queryEstudPersonal);
		
	?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formParentesco" enctype="multipart/form-data">
<p align="center">&nbsp;</p>
<div align="left">
  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center">
		  <label>Parentesco </label>
        
		
   <?php

$idConvive=$_GET['idConvive'];
echo $idConvive;	
include("Conexion/conexion.php");	
		
$queryConvive = $mysqli -> query ("SELECT * FROM `Convive` WHERE `idConvive` =".$idConvive.";");
	
$rowConvive = mysqli_fetch_assoc($queryConvive);

?>	

<!-- INICIO CONVIVE -->
<table width="583" border="1">
    <tr>
      <td colspan="5" align="center"><label>Personas con quien convives 
        
      </label>
		
		</td>
    </tr>
    <tr>
    <td width="209">id</td>
      <td width="209">Nombre Apellido</td>
      <td width="209">Fecha Nac</td>
      <td width="209">DNI</td>
      <td width="209">Parentesco</td>
    </tr>
    <tr>
    <td><input name="txtidConvive" type="text" id="txtidConvive" title="idConvive" size="10" value="<?php print $rowConvive['idConvive'];?>"/></td>
     <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" value="<?php print $rowConvive['NombreApellido'];?>"/></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" value="<?php print $rowConvive['FechaNac'];?>"/></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" value="<?php print $rowConvive['DNI'];?>"/></td>

   <td><select name="listParentesco" size="1" id="listParentesco">
   <option value="<?php print $rowConvive['FkParentesco'];?>"><?php print $rowConvive['FkParentesco'];?></option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>
  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
	</form>
<br>
<?php
$idConvive=$_POST['txtidConvive'];
$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido==null){

			  include("Conexion/conexion.php");	
	

$insertarConvive = "UPDATE `Convive` SET `NombreApellido` = '$NombreApellido', `FechaNac` = '$FechaNac', 
`DNI` = '$DNI', `FkParentesco` = '$Parentesco' WHERE `Convive`.`idConvive` = ".$idConvive.";";

return "volverPare()";

$ejecutar_UPDATE=mysqli_query($mysqli,$insertarConvive);		

echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverPare()\">volver</button>";	
}
	
mysqli_close($mysqli);

?>	

	

    </div>
	</div>
</div>	

	
</body>
</html>