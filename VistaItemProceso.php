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
.imgItemPrincipalProce{
  position: relative;
  width: 150px;
  height: 150px;

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

$id_itemproceso=$_GET['id_itemproceso'];
$queryvarid_itemproceso = $mysqli -> query ("SELECT * FROM `item_proceso` WHERE `id_itemproceso` = ".$id_itemproceso.";");
$rowid_itemproceso = mysqli_fetch_assoc($queryvarid_itemproceso);

$varFk_Proceso = $rowid_itemproceso['Fk_Proceso'];
$queryvarid_itemprocesoProce = $mysqli -> query ("SELECT * FROM `VisProceso` WHERE `id_proceso` =  ".$varFk_Proceso.";");
$rowid_itemprocesoProce = mysqli_fetch_assoc($queryvarid_itemprocesoProce);

?>
    </div>
<div class="container">
  <div class="row">


     <table class="table table-bordered">
     <tr>
        <td class="algCentral"><img src="/sistema/img/logoAmplio.jpg" alt="Logo" width="180" height="60"></td>
        <td ><h3 class="algCentral"><strong class="algCentral">Items de Metodos y Tiempos</strong></h3></td>
        <td >
        <p>Registro N 01</p>
        <p>Fecha: <?php echo $rowid_itemprocesoProce['FechaInicio']; ?></p>
        
      </td>
      </tr>
  
      </tr>
<tr>
  <td>
  <h5>   <strong>Cod: </strong><?php echo $rowid_itemprocesoProce['ProductoProceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Producto: </strong><?php echo $rowid_itemprocesoProce['Producto']; ?></h5>
  </td>
  <td rowspan="2">

<?php
echo '<img class="imgItemPrincipalProce"  src="'.$rowid_itemprocesoProce['imgprod'].'"/>';
?>
</td>

</tr>

<tr>
  <td >
  <h5> <strong>Num: </strong><?php echo $rowid_itemprocesoProce['id_proceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Proceso: </strong><?php echo $rowid_itemprocesoProce['Proceso']; ?></h5>
    </td>

</tr>
    
<tr>
     <table class="table table-striped">
  <thead>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">ItemProceso</th>
      <th scope="col"><p>Cant</p>
      <p>operarios</p></th>
      <th scope="col"><p>Tiempo</p><p>Estandar</p></th>
      <th scope="col">Total </th>
      <th scope="col">Prod</th>
      <th scope="col">Herr</th>
      <th scope="col">Adver</th>
    </tr>
  </thead>
  <tbody>
<?php 
  $queryItemproceso = $mysqli -> query ("SELECT * FROM `VistItemProceso1` WHERE `id_itemproceso` =".$id_itemproceso." ORDER BY `VistItemProceso1`.`Op` ASC;");
    while ($filaItemproceso = mysqli_fetch_array($queryItemproceso))
  {
   echo "<TR>\n"; 
 echo "<th>".$filaItemproceso['Op']."</th>\n";
 echo "<td>".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['CantOper']."</td>\n";

 echo "<td>".$filaItemproceso['TiempoEstandarMi']."</td>\n";
 $varTotal=($filaItemproceso['TiempoEstandarMi']*$filaItemproceso['CantOper']);
 
 echo "<td>".$varTotal." Min"."</td>\n";
 echo "<td>".$filaItemproceso['Fk_ProdProc']."-".$filaItemproceso['Producto']."</td>\n";
 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	 

 
 $varSumaMin +=$varTotal;
 $varSumaHor +=($varTotal/60);
 $varSumaHor_number = number_format($varSumaHor, 2, '.', '');
 echo "</TR>\n";

 }

 ?>

   </tbody>
</table> 
</tr> 
<!-- <tr colspan="4"> -->
<td colspan="3" class="algCentral">
<?php
echo '<img class=\"imgEfcProceso\" src="'.$rowid_itemproceso['img_itemproce'].'" style="border-radius: " width="600" heigth="400"/>';
?>
</td>

</table>
  

</div>

</div>	


</body>
</html>