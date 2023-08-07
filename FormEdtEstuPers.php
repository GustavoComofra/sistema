<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Estudios a editar</title>
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
	window.location.href = "/sistema/ListEstudios.php";
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
$IdEstudPersonal=$_GET['IdEstudPersonal'];
echo $IdEstudPersonal;	
include("Conexion/conexion.php");	
$queryEstudIdPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `IdEstudPersonal` = ".$IdEstudPersonal.";");
	
$rowid = mysqli_fetch_assoc($queryEstudIdPersonal);
		
	?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formEstudiosIdPersonal" enctype="multipart/form-data">
<p align="center">&nbsp;</p>
<div align="left">
  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center">
		  <label>Editar Estudio Personal </label>
        
         <label for="txtCUIT_Empl">Id:</label>
   <input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" size="35" value="<?php print $IdEstudPersonal;?>" > 
		
		</td>
    </tr>
    <tr>
      <td width="10">Id</td>
      <td width="10">Cuit</td>
      <td width="50">Estudio</td>
      <td width="50">Estado</td>
      <td width="100">Obs</td>
    </tr>
    <tr>
      <td>
      <input name="txtIdEstudPersonal" type="text" id="txtIdEstudPersonal" title="IdEstudPersonal" size="10" value="<?php print $rowid['IdEstudPersonal'];?>"/>
      </td>

      <td>
      <input name="txtCuit_EstuPers" type="text" id="txtCuit_EstuPers" title="Cuit_EstuPers" size="10" value="<?php print $rowid['Cuit_EstuPers'];?>"/>
      </td>

      <td><select name="listEstudioPersonal" size="1" id="listEstudioPersonal">
        <option value="<?php print $rowid['EstudioPersonal'];?>"><?php print $rowid['EstudioPersonal'];?></option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>



      <td>
      <input name="txtEstado" type="text" id="txtEstado" title="Estado" size="10" value="<?php print $rowid['Estado'];?>"/>
      </td>
      
      <td>
      <input name="txtObs" type="text" id="txtObs" title="Obs" size="10" value="<?php print $rowid['Obs'];?>"/>
      </td>
    </tr>

  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Editar" />
      </label>
	</form>
<br>
<?php

$IdEstudPersonal=$_POST['txtIdEstudPersonal'];
$Estado=$_POST['txtEstado'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$Obs=$_POST['txtObs'];
		  
		  

		  if(!$IdEstudPersonal==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";

$UbdateComEstudPersonal = "UPDATE `ComEstudPersonal` SET `Cuit_EstuPers` = '$Cuit_EstuPers', `EstudioPersonal` = '$EstudioPersonal ', `Estado` = '$Estado',
 `Obs` = '$Obs' WHERE `ComEstudPersonal`.`IdEstudPersonal` = ".$IdEstudPersonal.";";

$ejecutar_Ubdate=mysqli_query($mysqli,$UbdateComEstudPersonal);		
			  
			  
			  

echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volverPare()\">volver</button>";	
		  
		  }
	
mysqli_close($mysqli);

?>	

	
	
    </div>
	</div>
</div>	

	
</body>
</html>