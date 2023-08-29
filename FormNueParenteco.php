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
        
         <label for="txtCuil_Pers">CUIL:</label>
   <input name="txtCuil_Pers" type="text" id="txtCuil_Pers" size="35" value="<?php print $Cuil_Pers;?>" > 
		
		</td>
    </tr>
    <tr>
      <td >Nombre Apellido</td>
      <td >FechaNac</td>
      <td >DNI</td>
      <td >Parentesco</td>
    </tr>
    <tr>
      <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" /></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" /></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" /></td>
      <td>
        
      <select name="listParentesco" size="1" id="listParentesco">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
	?>
      </select>    
      </td>
    

	  </tr>
  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>
	</form>
<br>
<?php

$Cuil_Pers=$_POST['txtCuil_Pers'];
$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];	
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];

		  
		  

if(!$NombreApellido==null){
			  
  include("Conexion/conexion.php");	

$insertarConvive = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) 
VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive);		
//echo "Parentezco agregado" + $NombreApellido + "<br>";
echo "Items agregado";
}
		  else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>	

	
<?php
	

echo "
<table border=1 class=\"table table-striped\">
  <thead>
<tr>
<td colspan=\"6\" align=\"center\" bgcolor=\"\"><span class=\"\">Nueva persona con quien convives</td>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Nombre Apellido</B></TD>
<TD><B>FechaNac</B></TD>
<TD><B>Parentesco</B></TD>
<TD><B>Cuil_Pers</B></TD>
<TD><B>Apellidos</B></TD>
</TR>
  </thead>
";
	
include("Conexion/conexion.php");	
$queryComParentesco = $mysqli -> query ("SELECT * FROM `ComVistParentesco` WHERE `Cuil_Pers` = ".$Cuil_Pers." ORDER BY `NombreApellido` ASC;");
 
 while ($filaComParentesco = mysqli_fetch_array($queryComParentesco))

{
echo "<TR>\n";

$varCuit=$fila['Cuit_EstuPers'];

echo "<td>".$filaComParentesco['idConvive']."</td>\n";	 
echo "<td>".$filaComParentesco['NombreApellido']."</td>\n";	
echo "<td>".$filaComParentesco['FechaNac']."</td>\n";	

echo "<td>".$filaComParentesco['Parentesco']."</td>\n";	 
echo "<td>".$filaComParentesco['Cuil_Pers']."</td>\n";	
echo "<td>".$filaComParentesco['Apellidos']."</td>\n";	

echo "</TR>\n";

}
	 
	 
mysqli_close($mysqli);
	 
	





?>		
	
    </div>
	</div>
</div>	

	
</body>
</html>