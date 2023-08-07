<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="/sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-2">
	<?php	
include ("MarcoCentral.php");

?>	
    </div>

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formConvive" enctype="multipart/form-data">
<p align="center">&nbsp;</p>
<div align="left">
  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center"><label>Personas con quien convives 
        
      </label>
		
		</td>
    </tr>
    <tr>
      <td width="209">Nombre Apellido</td>
      <td width="209">Fecha Nac</td>
      <td width="209">DNI</td>
      <td width="209">Parentesco</td>
    </tr>
    <tr>
     
     <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" /></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" /></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" /></td>

   <td><select name="listParentesco" size="1" id="listParentesco">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>
    <tr>
     
      <td><input name="txtNombreApellido1" type="text" id="txtNombreApellido1" title="NombreApellido1" size="50" /></td>
      <td><input name="txtFechaNac1" type="date" id="txtFechaNac1" title="FechaNac1" size="30" /></td>
      <td><input name="txtDNI1" type="number" id="txtDNI1" title="DNI1" size="30" /></td>

    <td><select name="listParentesco1" size="1" id="listParentesco1">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
	?>
      </select></td>

    </tr>

    <tr>
     
     <td><input name="txtNombreApellido2" type="text" id="txtNombreApellido2" title="NombreApellido2" size="50" /></td>
     <td><input name="txtFechaNac2" type="date" id="txtFechaNac2" title="FechaNac2" size="30" /></td>
     <td><input name="txtDNI2" type="number" id="txtDNI2" title="DNI2" size="30" /></td>

   <td><select name="listParentesco2" size="1" id="listParentesco2">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido3" type="text" id="txtNombreApellido3" title="NombreApellido3" size="50" /></td>
     <td><input name="txtFechaNac3" type="date" id="txtFechaNac3" title="FechaNac3" size="30" /></td>
     <td><input name="txtDNI3" type="number" id="txtDNI3" title="DNI3" size="30" /></td>

   <td><select name="listParentesco3" size="1" id="listParentesco3">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>

  </table>
  <?php


$NombreApellido=$_POST['txtNombreApellido'];
$FechaNac=$_POST['txtFechaNac'];
$DNI=$_POST['txtDNI'];
$Parentesco=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive);		
echo "Parentezco agregado";
}

$NombreApellido1=$_POST['txtNombreApellido'];
$FechaNac1=$_POST['txtFechaNac'];
$DNI1=$_POST['txtDNI'];
$Parentesco1=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido1==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive1 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive1);		
echo "Parentezco agregado 1";
}

$NombreApellido2=$_POST['txtNombreApellido'];
$FechaNac2=$_POST['txtFechaNac'];
$DNI2=$_POST['txtDNI'];
$Parentesco2=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido2==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive2 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive2);		
echo "Parentezco agregado 2";
}

$NombreApellido3=$_POST['txtNombreApellido'];
$FechaNac3=$_POST['txtFechaNac'];
$DNI3=$_POST['txtDNI'];
$Parentesco3=$_POST['listParentesco'];	
$Cuil_Pers=$_POST['txtCUIT_Empl'];
  

		  if(!$NombreApellido2==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarConvive3 = "INSERT INTO `Convive` (`idConvive`, `NombreApellido`, `FechaNac`, `DNI`, `FkParentesco`, `Cuil_Pers`) VALUES (NULL, '$NombreApellido', '$FechaNac', '$DNI', '$Parentesco', '$Cuil_Pers');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarConvive3);		
echo "Parentezco agregado 2";
}

?>

</div>
</form>

    </div>
  </div>
</div>	




</body>
</html>
