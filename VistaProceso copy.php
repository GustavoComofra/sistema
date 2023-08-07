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


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
 <?php
include("Conexion/conexion.php");

echo $id_proceso ;
$id_proceso=$_GET['id_proceso'];
$varid_proceso = $id_proceso=$_GET['id_proceso'];
$queryvarid_proceso = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoproceso = mysqli_fetch_assoc($queryvarid_proceso);

?>
<div class="container-sm">
  <div class="row gx-5">


     <table class="table table-bordered">
      <tr>
        <td><img src="/sistema/img/logoAmplio.jpg" alt="Logo" width="200" height="60"></td>
        <td><h1>Estudio de Metodos y Tiempos</h1></td>
        <td>
        <p>Registro N 01</p>
        <p>Hoja N 1-1</p>
        <p>Actual     X</p>
        <p>Propuesto</p>
      </td>
      </tr>
  
      </tr>
<tr>
  <td>
    
  </td>
</tr>

     </table>

    <hr>

  <div class="row">
   <div class="col-10"><h4><strong>Proceso: </strong><?php echo $rowprocesoproceso['id_proceso']."-".$rowprocesoproceso['Proceso']; ?> </h4></div>
  </div>


  <div class="row">
  <div class="col-10">
    <h4><strong>Cod: </strong><?php echo $rowprocesoproceso['ProductoProceso']; ?> - <strong>Pieza: </strong><?php echo $rowprocesoproceso['ProductoProceso']; ?> </h4>
    </div>
  </div>


  <div class="row">
  <div class="col-md-auto align-self-center">
  <figure class="figure">
  <?php  echo '<img src="'.$rowprocesoproceso['imgprod'].'" alt=\"imgprod\" width=\"300\" height=\"100\"/>';?>
  <figcaption class="figure-caption">Imagen principal</figcaption>
</figure>

<div class="row">
  <div class="col-10">
  <table class="table table-striped">
  <thead>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">ItemProceso</th>
      <th scope="col">Prod</th>
      <th scope="col">img</th>
      <th scope="col">Min</th>
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
 //echo "<th>".$filaItemproceso['id_itemproceso']."</th>\n";
 echo "<th>".$filaItemproceso['Op']."</th>\n";
 echo "<td>".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['Fk_ProdProc']."-".$filaItemproceso['Producto']."</td>\n";
 echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: " width="50" heigth="50"/>'."</td>\n";
 echo "<td>".$filaItemproceso['TiempoEstandarMi']."</td>\n";
 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	 
 echo "</TR>\n";
  
 }

 ?>

   </tbody>
</table> 
  

    </div>
  </div>
  <hr>
  
  </div>
  </div>
<hr>






</div


    </div>
  </div>
</div>	

	
</body>
</html>