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
 <title>Listado estudios</title>
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
$Cuit=$_GET['CUIT_Empl'];
echo $Cuit;	
include("Conexion/conexion.php");	
$queryEstudPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `Cuit_EstuPers` = ".$Cuit.";");
	
$row = mysqli_fetch_assoc($queryEstudPersonal);
		
	?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formEstudiosPersonal" enctype="multipart/form-data">
<p align="center">&nbsp;</p>
<div align="left">
  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center">
		  <label>Estudios Personal </label>
        
         <label for="txtCUIT_Empl">Cuit:</label>
   <input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" size="35" value="<?php print $Cuit;?>" > 
		
		</td>
    </tr>
    <tr>
      <td width="209">Estudio</td>
      <td width="209">Estado</td>
      <td width="209">Anios</td>
      <td width="209">Obs</td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal" size="1" id="listEstudioPersonal">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado" size="1" id="listEstado" title="Estado">
        <option value="Activo">Activo</option>
        <option value="Terminado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios" type="number" id="txtAnios" title="Anios" size="10" /></td>
      <td><input name="txtObs" type="text" id="txtObs" title="Obs" size="30" /></td>
    

	  </tr>
  </table>
	  <label>
        <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>
	</form>
<br>
<?php

$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Estado=$_POST['listEstado'];
$Anios=$_POST['txtAnios'];
$Obs=$_POST['txtObs'];
		  
		  

		  if(!$CUIT_Empl==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);		
			  
			  
			  

echo "estudio agregado";
		  
		  }
		  else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>	

	
<?php
	

echo "
<table border=1 class=\"table table-striped\">
  <thead>
<tr>
<td colspan=\"3\" align=\"center\" bgcolor=\"\"><span class=\"\">Estudios</td>
</tr>
<TR>
<TD><B>Estudio</B></TD>
<TD><B>Estado</B></TD>
<TD><B>Anios</B></TD>
</TR>
  </thead>
";
	
include("Conexion/conexion.php");	
$queryComEstudPersonal = $mysqli -> query ("SELECT * FROM `ComEstudPersonal` WHERE `Cuit_EstuPers` = ".$CUIT_Empl.";");
 
 while ($filaComEstudPersonal = mysqli_fetch_array($queryComEstudPersonal))

{
echo "<TR>\n";

$varCuit=$fila['Cuit_EstuPers'];

echo "<td>".$filaComEstudPersonal['EstudioPersonal']."</td>\n";	 
echo "<td>".$filaComEstudPersonal['Estado']."</td>\n";	
echo "<td>".$filaComEstudPersonal['Anios']."</td>\n";	
echo "</TR>\n";

}
	 
	 
mysqli_close($mysqli);
	 
	





?>		
	
    </div>
	</div>
</div>	

	
</body>
</html>