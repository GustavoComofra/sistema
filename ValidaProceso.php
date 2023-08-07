<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="http://interno.comofrasrl.com.ar/sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Vista Proceso</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

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

<style>
.imgEfc{
  position: relative;
  width: 50px;
  height: 50px;

}
.Advertencia{
  color: red;
}

.algCentral{
  text-align: center;
  align-items: center;
  align-content: center;
}


</style>
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


    <div class="col">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col">
 <?php
include("Conexion/conexion.php");

echo $id_proceso ;
$id_proceso=$_GET['id_proceso'];
$varid_proceso = $id_proceso=$_GET['id_proceso'];
$queryvarid_proceso = $mysqli -> query ("SELECT * FROM `VisProceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoproceso = mysqli_fetch_assoc($queryvarid_proceso);

$id_procesouser=$_GET['id_proceso'];
$queryvarid_procesUser = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoprocesoUser = mysqli_fetch_assoc($queryvarid_procesUser);

?>
    </div>
<div class="container">
  <div class="row">


     <table class="table table-bordered">
      <tr>
        <td class="algCentral"><img src="/sistema/img/logoAmplio.jpg" alt="Logo" width="180" height="60"></td>
        <td ><h3 class="algCentral"><strong class="algCentral">  Validar: Estudio de Metodos y Tiempos</strong></h3></td>
        <td >
        <p>Registro N 01</p>
        <p>Fecha: <?php echo $rowprocesoproceso['FechaInicio']; ?></p>
        <p>Realizo: <?php echo $rowprocesoprocesoUser['user']; ?></p>
        <p>Valida: <?php echo $rowprocesoprocesoUser['Valida']; ?></p>
      </td>
      </tr>
  
      </tr>
<tr>
  <td>
  <h5>   <strong>Cod: </strong><?php echo $rowprocesoproceso['ProductoProceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Producto: </strong><?php echo $rowprocesoproceso['Producto']; ?></h5>
  </td>
  <td>
    <h5><strong>Implemento: <?php echo $rowprocesoprocesoUser['Implemento']; ?></strong></h5>
  </td>
</tr>

<tr>
  <td>
  <h5> <strong>Num: </strong>
  
  <input name="txtid_proceso" type="text" id="txtid_proceso" value="<?php print $rowprocesoproceso['id_proceso']; ?>"/>
 </h5>
  </td>
  <td>s
  <h5> <strong>Proceso: </strong><?php echo $rowprocesoproceso['Proceso']; ?></h5>
  </td>

  <td>
  <form action="#" method="post" name="formValidarProceso" enctype="multipart/form-data">
<p>Fecha Inicio</p>
<input name="txtFechaValidacion" type="date" id="txtFechaValidacion" value="<?php print $rowprocesoprocesoUser['FechaValidacion']; ?>"/><p>Usuario:</p>  
<input name="txtValida" type="text" id="txtValida" value="<?php print $_SESSION['usuario']; ?>"/>
<label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Validar" />
      </label>

      <?php

include("Conexion/conexion.php");
//Validar proceso
$id_proceso=$rowprocesoproceso['id_proceso'];
$FechaValidacion=$_POST['txtFechaValidacion'];
$Valida=$_POST['txtValida'];

if (!$Valida == null) {
$EditarValidaProceso = "UPDATE `Proceso` SET `Valida` = '$Valida', `FechaValidacion` = '$FechaValidacion' WHERE `Proceso`.`id_proceso`  = '$id_proceso';";


$ejecutar_EditarValidaProceso=mysqli_query($mysqli,$EditarValidaProceso);

mysqli_close($mysqli);
echo "<a href=\"/sistema/ListProceso.php\"><img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a>";
}

?>

</form>
  </td>

</tr>

<tr>
  <td colspan="8" class="algCentral">
  <figure class="figure">
  <?php  echo '<img src="'.$rowprocesoproceso['imgprod'].'" alt=\"imgprod\" width=\"300\" height=\"100\"/>';?>
  <figcaption class="figure-caption">Imagen principal</figcaption>
</figure>
  </td>
</tr>

    
<tr>
     <table class="table table-striped">
  <thead>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">ItemProceso</th>
      <th scope="col"><p>Cantidad operarios</p></th>
      <th scope="col">img</th>
      <th scope="col">Tiempo Estandar</th>
      <th scope="col">Total  </th>
      <th scope="col">Prod</th>
      <th scope="col">Herramienta</th>
      <th scope="col">Advertencia</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $queryItemproceso = $mysqli -> query ("SELECT * FROM `VistItemProceso1` WHERE `Fk_Proceso` =".$id_proceso." ORDER BY `VistItemProceso1`.`Op` ASC;");
    while ($filaItemproceso = mysqli_fetch_array($queryItemproceso))
  {
   echo "<TR>\n"; 
 echo "<th>".$filaItemproceso['Op']."</th>\n";
 echo "<td>".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['CantOper']."</td>\n";
 echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: " width="50" heigth="50"/>'."</td>\n";
 echo "<td>".$filaItemproceso['TiempoEstandarMi']."</td>\n";
 $varTotal=round($filaItemproceso['TiempoEstandarMi']*$filaItemproceso['CantOper']);
 echo "<td>".$varTotal." Min"."</td>\n";
 echo "<td>".$filaItemproceso['Fk_ProdProc']."-".$filaItemproceso['Producto']."</td>\n";
 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	 

 
 $varSumaMin +=$varTotal;
 $varSumaHor +=round($varTotal/60);
 echo "</TR>\n";

 }
 echo "<td>"."<strong>"."Totales"."</strong>"."</td>\n";
 echo "<td>"."</td>\n";
 echo "<td>"."</td>\n";

  echo "<td>"."</td>\n";
  echo "<td>"."</td>\n";
  echo "<td>"."<strong>".$varSumaMin." Min"."</strong>"."</td>\n";
  echo "<td>"."<strong>".$varSumaHor." Hr"."</strong>"."</td>\n";
  echo "<td>"."</td>\n";
  echo "<td>"."</td>\n";
 ?>

   </tbody>
</table> 
</tr> </table>
  

</div>

</div>	

	
</body>
</html>