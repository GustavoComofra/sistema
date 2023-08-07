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
</form>

    </div>
  </div>
</div>	




</body>
</html>
