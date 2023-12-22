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

		
		
<!-- Fin de conteiner-->
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group" align="">
  <table class="table" width="423"  border="0">
    <tr>
      <td colspan="2" align="center"><label for="txtFalla">Fallas mecanica</label></td>
    </tr>
    <tr>
      <td width="156">Falla</td>
      <td width="353">Detalle</td>
    </tr>
    <tr>
      <td><select name="listFallamec" size="1" id="listFallamec">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 2 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetallemec" type="text" id="txtDetallemec" title="Detalle" size="50" /></td>
    </tr>
	 <tr> 
	  
  <td><select name="listFalla1mec" size="1" id="listFalla1mec">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 2 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle1mec" type="text" id="txtDetalle1mec" title="Detalle1mec" size="50" /></td>
    </tr>	
	  
	  
	 <tr> 
	  
  <td><select name="listFalla2mec" size="1" id="listFalla2mec">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 2 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle2mec" type="text" id="txtDetalle2mec" title="Detalle2mec" size="50" /></td>
    </tr>
	  	  
  </table>
	
	 <table class="table" width="423"  border="0">
    <tr>
      <td colspan="2" align="center"><label for="txtFalla">Fallas Terminacion</label></td>
    </tr>
    <tr>
      <td width="156">Falla</td>
      <td width="353">Detalle</td>
    </tr>
    <tr>
      <td><select name="listFallaTer" size="1" id="listFallaTer">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 1 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalleTer" type="text" id="txtDetalleTer" title="DetalleTer" size="50" /></td>
    </tr>
	 <tr> 
	  
  <td><select name="listFalla1Ter" size="1" id="listFalla1Ter">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 1 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))
		  {
 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle1Ter" type="text" id="txtDetalle1Ter" title="Detalle1Ter" size="50" /></td>
    </tr>	
	  
	  
	 <tr> 
	  
  <td><select name="listFalla2Ter" size="1" id="listFalla2Ter">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  $query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 1 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");
 while ($valores = mysqli_fetch_array($query1))
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle2Ter" type="text" id="txtDetalle2Ter" title="Detalle2Ter" size="50" /></td>
    </tr>
	 
	</table>
	
	<table class="table" width="423"  border="0">
    <tr>
      <td colspan="2" align="center"><label for="txtFalla">Fallas Sistema Hidraulico</label></td>
    </tr>
    <tr>
      <td width="156">Falla</td>
      <td width="353">Detalle</td>
    </tr>
    <tr>
      <td><select name="listFallaHid" size="1" id="listFallaHid">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 3 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalleHid" type="text" id="txtDetalleHid" title="DetalleHid" size="50" /></td>
    </tr>
	 <tr> 
	  
  <td><select name="listFalla1Hid" size="1" id="listFalla1Hid">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 3 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle1Hid" type="text" id="txtDetalle1Hid" title="Detalle1Hid" size="50" /></td>
    </tr>	
	  
	 <tr> 
	  
  <td><select name="listFalla2Hid" size="1" id="listFalla2Hid">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 3 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle2Hid" type="text" id="txtDetalle2Hid" title="Detalle2Hid" size="50" /></td>
    </tr>
	  
	</table>
	
	<table class="table" width="423"  border="0">
    <tr>
      <td colspan="2" align="center"><label for="txtFalla">Fallas Sistema Electrico</label></td>
    </tr>
    <tr>
      <td width="156">Falla</td>
      <td width="353">Detalle</td>
    </tr>
    <tr>
      <td><select name="listFallaEle" size="1" id="listFallaEle">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 4 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalleEle" type="text" id="txtDetalleEle" title="DetalleEle" size="50" /></td>
    </tr>
	 <tr> 
	  
  <td><select name="listFalla1Ele" size="1" id="listFalla1Ele">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 4 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle1Ele" type="text" id="txtDetalle1Ele" title="Detalle1Ele" size="50" /></td>
    </tr>	
	  
	  
	 <tr> 
	  
  <td><select name="listFalla2Ele" size="1" id="listFalla2Ele">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `FkTipoFalla` = 4 AND `Susp` LIKE 'No' ORDER BY `ItemFalla` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Id_ItemFalla].'">'.$valores[ItemFalla].'</option>';
}
	?>
      </select></td>

      <td><input name="txtDetalle2Ele" type="text" id="txtDetalle2Ele" title="Detalle2Ele" size="50" /></td>
    </tr>
	  
	</table>
		 

</div>

<div class="form-group" align="">
  <table class="table"  border="0">
    <tr>
      <td colspan="5" align="center"><label for="txtFalla"><strong> <h2>Costo</h2></strong></label></td>
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
<!-- Fin de conteiner-->
    </div>

    </div>
  </div>
</div>	




</body>
</html>
