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

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formEstudios" enctype="multipart/form-data">
<p align="center">&nbsp;</p>
<div align="left">
  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center"><label>Estudios Personal 
        
      </label>
		
		</td>
    </tr>
    <tr>
      <td width="209">Estudio</td>
      <td width="209">Estado</td>
      <td width="209">Años</td>
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
        <option value="Finalizado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios" type="number" id="txtAnios" title="Anios" size="10" /></td>
      <td><input name="txtObs" type="text" id="txtObs" title="Obs" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal2" size="1" id="listEstudioPersonal2">
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
      <td><select name="listEstado2" size="1" id="listEstado2">
        <option value="Activo">Activo</option>
        <option value="Terminado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios2" type="number" id="txtAnios2" title="Anios2" size="10" /></td>
      <td><input name="txtObs2" type="text" id="txtObs2" title="Obs2" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal3" size="1" id="listEstudioPersonal3">
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
      <td><select name="listEstado3" size="1" id="listEstado3">
        <option value="Activo">Activo</option>
        <option value="Terminado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios3" type="number" id="txtAnios3" title="Anios3" size="10" /></td>
      <td><input name="txtObs3" type="text" id="txtObs3" title="Obs3" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal4" size="1" id="listEstudioPersonal4">
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
      <td><select name="listEstado4" size="1" id="listEstado4">
        <option value="Activo">Activo</option>
        <option value="Terminado">Terminado</option>
        <option value="Abandonado">Abandonado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios4" type="number" id="txtAnios4" title="Anios4" size="10" /></td>
      <td>
        <input name="txtObs4" type="text" id="txtObs4" title="Obs4" size="30" />
      </td>
    </tr>
  </table>
  <?php

$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Cuit_EstuPers=$_POST['txtCuit_EstuPers'];
$EstudioPersonal=$_POST['listEstudioPersonal'];	
$Estado=$_POST['listEstado'];
$Anios=$_POST['txtAnios'];
$Obs=$_POST['txtObs'];
		  
$Cuit_EstuPers2=$_POST['txtCuit_EstuPers2'];
$EstudioPersonal2=$_POST['listEstudioPersonal2'];	
$Estado2=$_POST['listEstado2'];
$Anios2=$_POST['txtAnios2'];
$Obs2=$_POST['txtObs2'];		  
		  
$Cuit_EstuPers3=$_POST['txtCuit_EstuPers3'];
$EstudioPersonal3=$_POST['listEstudioPersonal3'];	
$Estado3=$_POST['listEstado3'];
$Anios3=$_POST['txtAnios3'];
$Obs3=$_POST['txtObs3'];		  
		  
$Cuit_EstuPers4=$_POST['txtCuit_EstuPers4'];
$EstudioPersonal4=$_POST['listEstudioPersonal4'];	
$Estado4=$_POST['listEstado4'];
$Anios4=$_POST['txtAnios4'];
$Obs4=$_POST['txtObs4'];		  

		  if(!$EstudioPersonal==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComEstudPersonal = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) 
VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal', '$Estado', '$Anios', '$Obs');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComEstudPersonal);		

echo "estudio agregado 1";
		  
		  }if(!$EstudioPersonal2==null){
		$insertarComEstudPersonal2 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`)
     VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal2', '$Estado2', '$Anios2', '$Obs2');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComEstudPersonal2);		  
			  
		  }if(!$EstudioPersonal3==null){
		$insertarComEstudPersonal3 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal3', '$Estado3', '$Anios3', '$Obs3');";

$ejecutar_insertar3=mysqli_query($mysqli,$insertarComEstudPersonal3);		  
			  
		  }if(!$EstudioPersonal4==null){
		$insertarComEstudPersonal4 = "INSERT INTO `ComEstudPersonal` (`IdEstudPersonal`, `Cuit_EstuPers`, `EstudioPersonal`, `Estado`, `Anios`, `Obs`) VALUES (NULL, '$CUIT_Empl', '$EstudioPersonal4', '$Estado4', '$Anios4', '$Obs4');";

$ejecutar_insertar4=mysqli_query($mysqli,$insertarComEstudPersonal4);		  
			  
		  }
		  
		  else{echo "Agregar items";}
	
mysqli_close($mysqli);

?>

  <?php
		  

?>

      <label>
        <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>
</div>
</form>

    </div>
  </div>
</div>	




</body>
</html>
