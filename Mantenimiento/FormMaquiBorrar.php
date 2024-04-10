<?php
session_start();
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
	}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<title>Mantenimiento</title>

<body>
	<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");
		/*session_start();
$u = $_POST['txtUsuario']; */

		?>
	</div>
	<?php
	/*
session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
	*/
	?>



	<div class="container-fluid m-0">
  <div class="row">

    <div class="col col-lg-2">

				<?php
include("../Conexion/conexion.php");

	$idMaq=$_GET['idMaq'];

$queryItemBorrar = $mysqli -> query ("SELECT * FROM `Maquinaria` WHERE `idMaq` = ".$idMaq.";");

$rowItemBorrar = mysqli_fetch_assoc($queryItemBorrar);
		?>
		
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formItemsBorrar" enctype="multipart/form-data">

<div >
  <table width="100%"  >
    <tr>
      <td colspan="2" align="center"><label>Maquina a borrar</label></td>
    </tr>
	  
    <tr>
      <th width="">idMaq:</th>
      <td width=""><input name="txtidMaq" type="text" id="txtidMaq" size="50" value="<?php print $rowItemBorrar['idMaq'];?>"/>
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Maquina:</th>
      <td width=""><input name="txtMaquina" type="text" id="txtMaquina" size="50" value="<?php print $rowItemBorrar['Maquina'];?>"/>
		</td>
    </tr>

	<tr>
      <th width="">Modelo:</th>
      <td width=""><input name="txtModelo" type="text" id="txtModelo" size="50" value="<?php print $rowItemBorrar['Modelo'];?>"/>
		</td>
    </tr>
	  
	  
	<tr>
	<td>
		<label>
     <input type="submit" class="btn btn-success btn-lg btn-block" name="btnBorrar" id="btnBorrar" onClick="AlertarAnulacion()" value="Borrar" />
      </label>
			
		</td>	
		
		 </tr>

	</table>
	</div>

<hr>

<?php

include("../Conexion/conexion.php");
$idMaq=$_POST['txtidMaq'];	
		
if(!$idMaq==null){
	

echo "<h2>"."<a href=\"/sistema/Mantenimiento/Maquinaria.php\">Borrado Volver?</a>".$idMaq."</h2>";
include("../Conexion/conexion.php");

	
$BorraMAquinaria = "DELETE FROM Maquinaria WHERE `Maquinaria`.`idMaq` = ".$idMaq.";";	

$ejecutar_BorraMAquinaria=mysqli_query($mysqli,$BorraMAquinaria);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>


    </div>
  </div>
</div>	

	
</body>
</html>