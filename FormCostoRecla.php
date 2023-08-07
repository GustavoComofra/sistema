<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
//include ("MarcoCentral.php");

?>	

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formCosto" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="5" align="center"><label for="txtFalla">Costo Reclamo</label></td>
    </tr>
    <tr>
      <td width="156">Cantidad</td>
      <td width="353">Detalle</td>
      <td width="156">Pesos</td>
      <td width="156">Dolar</td>
      <td width="353">Obs</td>
    </tr>
    <tr>
      <td><input name="txtCantidad" type="number" id="txtCantidad" title="Cantidad" size="10" /></td>
      <td><input name="txtDetalle" type="text" id="txtDetalle" title="Detalle" size="50" /></td>
      <td><input name="txtPesos" type="number" id="txtPesos" title="Pesos" size="10" /></td>
      <td><input name="txtDolar" type="number" id="txtDolar" title="Dolar" size="10" /></td>
      <td><input name="txtObservacion" type="text" id="txtObservacion" title="Observacion" size="50" /></td>
    </tr>	
    <tr>
      <td><input name="txtCantidad1" type="number" id="txtCantidad1" title="Cantidad1" size="10" /></td>
      <td><input name="txtDetalle1" type="text" id="txtDetalle1" title="Detalle1" size="50" /></td>
      <td><input name="txtPesos1" type="number" id="txtPesos1" title="Pesos1" size="10" /></td>
      <td><input name="txtDolar1" type="number" id="txtDolar1" title="Dolar1" size="10" /></td>
      <td><input name="txtObservacion1" type="text" id="txtObservacion1" title="Observacion1" size="50" /></td>
    </tr>	
    <tr>
      <td><input name="txtCantidad2" type="number" id="txtCantidad2" title="Cantidad2" size="10" /></td>
      <td><input name="txtDetalle2" type="text" id="txtDetalle2" title="Detalle2" size="50" /></td>
      <td><input name="txtPesos2" type="number" id="txtPesos2" title="Pesos2" size="10" /></td>
      <td><input name="txtDolar2" type="number" id="txtDolar2" title="Dolar2" size="10" /></td>
      <td><input name="txtObservacion2" type="text" id="txtObservacion2" title="Observacion2" size="50" /></td>
    </tr>	
    <tr>
      <td><input name="txtCantidad3" type="number" id="txtCantidad3" title="Cantidad3" size="10" /></td>
      <td><input name="txtDetalle3" type="text" id="txtDetalle3" title="Detalle3" size="50" /></td>
      <td><input name="txtPesos3" type="number" id="txtPesos3" title="Pesos3" size="10" /></td>
      <td><input name="txtDolar3" type="number" id="txtDolar3" title="Dolar3" size="10" /></td>
      <td><input name="txtObservacion3" type="text" id="txtObservacion3" title="Observacion3" size="50" /></td>
    </tr>	
    <tr>
      <td><input name="txtCantidad4" type="number" id="txtCantidad4" title="Cantidad4" size="10" /></td>
      <td><input name="txtDetalle4" type="text" id="txtDetalle4" title="Detalle4" size="50" /></td>
      <td><input name="txtPesos4" type="number" id="txtPesos4" title="Pesos4" size="10" /></td>
      <td><input name="txtDolar4" type="number" id="txtDolar4" title="Dolar4" size="10" /></td>
      <td><input name="txtObservacion4" type="text" id="txtObservacion4" title="Observacion4" size="50" /></td>
    </tr>	
    <tr>
      <td><input name="txtCantidad5" type="number" id="txtCantidad5" title="Cantidad5" size="10" /></td>
      <td><input name="txtDetalle5" type="text" id="txtDetalle5" title="Detalle5" size="50" /></td>
      <td><input name="txtPesos5" type="number" id="txtPesos5" title="Pesos5" size="10" /></td>
      <td><input name="txtDolar5" type="number" id="txtDolar5" title="Dolar5" size="10" /></td>
      <td><input name="txtObservacion5" type="text" id="txtObservacion5" title="Observacion5" size="50" /></td>
    </tr>	
  </table>
	
  <!-- <label>
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Nuevo Item" />
            </label> -->
</div>
</form>
-->
    </div>
  </div>
</div>	
<?php
/*
$varNumRecl=143;
$Cantidad=$_POST['txtCantidad'];
$Detalle=$_POST['txtDetalle'];
$Pesos=$_POST['txtPesos'];
$Dolar=$_POST['txtDolar'];
$Observacion=$_POST['txtObservacion'];

$Cantidad1=$_POST['txtCantidad1'];
$Detalle1=$_POST['txtDetalle1'];
$Pesos1=$_POST['txtPesos1'];
$Dolar1=$_POST['txtDolar1'];
$Observacion1=$_POST['txtObservacion1'];

$Cantidad2=$_POST['txtCantidad2'];
$Detalle2=$_POST['txtDetalle2'];
$Pesos2=$_POST['txtPesos2'];
$Dolar2=$_POST['txtDolar2'];
$Observacion2=$_POST['txtObservacion2'];

$Cantidad3=$_POST['txtCantidad3'];
$Detalle3=$_POST['txtDetalle3'];
$Pesos3=$_POST['txtPesos3'];
$Dolar3=$_POST['txtDolar3'];
$Observacion3=$_POST['txtObservacion3'];

$Cantidad4=$_POST['txtCantidad'];
$Detalle4=$_POST['txtDetalle'];
$Pesos4=$_POST['txtPesos'];
$Dolar4=$_POST['txtDolar'];
$Observacion4=$_POST['txtObservacion'];

$Cantidad5=$_POST['txtCantidad5'];
$Detalle5=$_POST['txtDetalle5'];
$Pesos5=$_POST['txtPesos5'];
$Dolar5=$_POST['txtDolar5'];
$Observacion5=$_POST['txtObservacion5'];

if(!$Detalle==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos', '$Dolar', '$Cantidad', '$Detalle', '$Observacion');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl);		
//echo "estudio agregado";

}if(!$Detalle1==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl1 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos1', '$Dolar1', '$Cantidad1', '$Detalle1', '$Observacion1');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl1);		
//echo "estudio agregado";

}if(!$Detalle2==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl2 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos2', '$Dolar2', '$Cantidad2', '$Detalle2', '$Observacion2');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl2);		
//echo "estudio agregado";

}if(!$Detalle3==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl3 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos3', '$Dolar3', '$Cantidad3', '$Detalle3', '$Observacion3');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl3);		
//echo "estudio agregado";

}if(!$Detalle4==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl4 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos4', '$Dolar4', '$Cantidad4', '$Detalle4', '$Observacion4');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl4);		
//echo "estudio agregado";

}if(!$Detalle5==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl5 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Observacion`) VALUES (NULL, '$varNumRec', '$Pesos5', '$Dolar5', '$Cantidad5', '$Detalle5', '$Observacion5');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl5);		
//echo "estudio agregado";

}

mysqli_close($mysqli);
*/
?>



</body>
</html>
