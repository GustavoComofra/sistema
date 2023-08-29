<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
  <link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Prueba evaluacion </title>
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

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
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

<form action="#" method="post" name="formLocalidad" enctype="multipart/form-data">

<div align="">
  <table width=""  border="">
    <tr>
      <td colspan="2" align="center"><label>Formulario Evaluacion</label></td>
    </tr>
	  
 <tr>
      <th width="">Prod :</th>
   <td><select name="listProd" size="1" id="listProd">
        <option value="0">valor:</option>
        <?php
include("Conexion/conexion.php");
  
$queryEvalProd = $mysqli -> query ("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");


 while ($valoresEvalProd = mysqli_fetch_array($queryEvalProd))

		  
		  {

 echo '<option value="'.$valoresEvalProd[Valor].'">'.$valoresEvalProd[Valor].'</option>';
}
	?>
      </select>
		</td>
    </tr>		  
	  
	  
 <tr>
      <th width="">Calidad :</th>
   <td><select name="listCalidad" size="1" id="listCalidad">
        <option value="0">valor:</option>
        <?php
include("Conexion/conexion.php");
  
$queryEvalCalidad = $mysqli -> query ("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");


 while ($valoresEvalCalidad = mysqli_fetch_array($queryEvalCalidad))

		  
		  {

 echo '<option value="'.$valoresEvalCalidad[Valor].'">'.$valoresEvalCalidad[Valor].'</option>';
}
	?>
      </select>
		</td>
    </tr>
	  
	  
 <tr>
      <th width="">SyH :</th>
   <td><select name="listSyH" size="1" id="listSyH">
        <option value="0">valor:</option>
        <?php
include("Conexion/conexion.php");
  
$queryEvalSyH = $mysqli -> query ("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");


 while ($valoresEvalSyH = mysqli_fetch_array($queryEvalSyH))

		  
		  {

 echo '<option value="'.$valoresEvalSyH[Valor].'">'.$valoresEvalSyH[Valor].'</option>';
}
	?>
      </select>
		</td>
    </tr>
	  
	  
 <tr>
      <th width="">Compromiso :</th>
   <td><select name="listCompromiso" size="1" id="listCompromiso">
        <option value="0">valor:</option>
        <?php
include("Conexion/conexion.php");
  
$queryEvalCompromiso = $mysqli -> query ("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");


 while ($valoresEvalCompromiso = mysqli_fetch_array($queryEvalCompromiso))

		  
		  {

 echo '<option value="'.$valoresEvalCompromiso[Valor].'">'.$valoresEvalCompromiso[Valor].'</option>';
}
	?>
      </select>
		</td>
    </tr>	  
	  
  
	  
    <tr>
      <th width="">CUIT :</th>
    <td><select name="listCUIT" size="1" id="listCUIT">
        <option value="0">Apellido:</option>
        <?php
include("Conexion/conexion.php");
  
$queryCUIT = $mysqli -> query ("SELECT * FROM `ComEmpleado` ORDER BY `ComEmpleado`.`CUIT_Empl` ASC");


 while ($valoresCUIT = mysqli_fetch_array($queryCUIT))

		  
		  {

 echo '<option value="'.$valoresCUIT[CUIT_Empl].'">'.$valoresCUIT[Apellidos].'</option>';
}
	?>
      </select>
	<!--
	-->	
		</td>
    </tr>
	  
    <tr>
      <td>Fecha:</td>
      <td><input name="txtFecha" type="date" id="txtFecha" size="50" value="<?php echo date("Y-m-d");?>" /></td>
    </tr>	  
	 
    <tr>
      <td>Obser: </td>
      <td><input name="txtObser" type="text" id="txtObser" size="50" />
		
		
			  <label>
  <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
</label>
		  
	<!--	  <input type="range">
		  
		  
<style>
.box-minmax{
  margin-top: 30px;
  width: 608px;
  display: flex;
  justify-content: space-between;
  font-size: 20px;
  color: black;
  span:first-child{
    margin-left: 10px;
  }
}	
	
.rs-range {
    margin-top: 29px;
    width: 600px;
    -webkit-appearance: none;
    &:focus {
        outline: none;
    }	
	
    &::-webkit-slider-runnable-track {
        width: 100%;
        height: 1px;
        cursor: pointer;
        box-shadow: none;
        background: red;
        border-radius: 0px;
        border: 0px solid #010101;
    }
	
    &::-moz-range-track {
        width: 100%;
        height: 1px;
        cursor: pointer;
        box-shadow: none;
        background:red;
        border-radius: 0px;
        border: 0px solid #010101;
    }
	
&::-webkit-slider-thumb {
        box-shadow: none;
        border: 0px solid black;
        box-shadow: 0px 10px 10px rgba(0,0,0,0.25);
        height: 42px;
        width: 22px;
        border-radius: 22px;
        background: red;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -20px;
    }
	
&::-moz-range-thumb{
        box-shadow: none;
        border: 0px solid black;
        box-shadow: 0px 10px 10px rgba(0,0,0,0.25);
        height: 42px;
        width: 22px;
        border-radius: 22px;
        background: red;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -20px;
  }
  &::-moz-focus-outer {
    border: 0;
    }
}
	
	
.rs-label {
    
    position: relative;
    transform-origin: center center;
    display: block;
    width: 98px;
    height: 98px;
    background: transparent;
    border-radius: 50%;
    line-height: 30px;
    text-align: center;
    font-weight: bold;
    padding-top: 22px;
    box-sizing: border-box;
    border: 2px solid black;
    margin-top: 20px;
    margin-left: -38px;
    left: attr(value);
    color: black;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 36px;
    &::after {
        content: "kg";
        display: block;
        font-size: 20px;
        letter-spacing: 0.07em;
        margin-top: -2px;
    }
    
}	
</style>
  
  <div class="range-slider">
    <span id="rs-bullet" class="rs-label">0</span>
      <input id="rs-range-line" class="rs-range" type="range" value="0" min="0" max="5" step="1">
    
  </div>

  <div class="box-minmax">
  <span>0</span> <span>5</span>
  </div>
  
  <script>
var rangeSlider = document.getElementById("rs-range-line");
var rangeBullet = document.getElementById("rs-bullet");

rangeSlider.addEventListener("input", showSliderValue, false);

function showSliderValue() {
  rangeBullet.innerHTML = rangeSlider.value;
  var bulletPosition = (rangeSlider.value /rangeSlider.max);
  rangeBullet.style.left = (bulletPosition * 578) + "px";
}		  
		  
 </script> 
		  -->
		</td>

    </tr>	  


	</table>
	</div>

<hr>

<?php

$Prod=$_POST['listProd'];
$Calidad=$_POST['listCalidad'];
$SyH=$_POST['listSyH'];
$Compromiso=$_POST['listCompromiso'];
$CUIT=$_POST['listCUIT'];	
$Fecha=$_POST['txtFecha'];	
$Obser=$_POST['txtObser'];
		
	

	
if(!$CUIT==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");	
	
$insertarValEval = "INSERT INTO `ComEvaluacion` (`Id_Eval`, `Prod`, `Calidad`, `SyH`, `Compromiso`, `CUIT_Eval`, `FechaEval`, `Obs`) VALUES (NULL, '$Prod', '$Calidad', '$SyH', '$Compromiso', '$CUIT', '$Fecha', '$Obser');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarValEval);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		
<form action="#" method="post" name="formBuscar" enctype="multipart/form-data">

<div align="">
  <table width=""  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
    </tr>
	      <tr>
			  
      <th width="">Fecha :</th>
      <td width="">
		  
		      <p>

        <label for="txtDesde">Desde:</label>
        <input name="txtDesde" type="date" id="txtDesde" value="<?php echo date("Y-m-d");?>" size="15">
 <label for="txtHasta">Hasta:</label>
        <input name="txtHasta" type="date" id="txtHasta" value="<?php echo date("Y-m-d");?>" size="15"> 

    </p>
		  
		</td>
	</tr>
	  
	  
    <tr>
      <th width="">CUIT :</th>
      <td width=""><input name="txtCUITB" type="text" id="txtCUITB" size="11"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">Nombre :</th>
      <td width=""><input name="txtNombreB" type="text" id="txtNombreB" size="11"/>
		</td>
	</tr>
      <th width="">Apellido :</th>
      <td width=""><input name="txtApellidoB" type="text" id="txtApellidoB" size="11"/>
		
<label>
        <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
      </label>	
			
		</td>
    </tr>
	</table>
	</div>

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Localidades</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>CUIT</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Prod</B></TD>
<TD><B>Calidad</B></TD>
<TD><B>SyH</B></TD>
<TD><B>Comp</B></TD>
<TD><B>Total</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$NombreB=$_POST['txtNombreB'];
$ApellidoB=$_POST['txtApellidoB'];
$CUITB=$_POST['txtCUITB'];	
$FechaDesde=$_POST['txtDesde'];	
$FechaHasta=$_POST['txtHasta'];	


include("Conexion/conexion.php");	
$queryEvaluacionB = $mysqli -> query ("SELECT * FROM `ComEval` WHERE `CUIT_Eval` LIKE '%$CUITB%' AND `FechaEval` >= '$FechaDesde' AND `Apellidos` LIKE '%$ApellidoB%' AND `Nombres` LIKE '%$NombreB%' ORDER BY `FechaEval` DESC");
  
/*		
$query1 = $mysqli -> query ("SELECT * FROM `ComVistaHorarios` WHERE `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' AND `Dia` >= '$DatoFecha' AND `Dia` <= '$DatoHasta' AND `CUIT_Empl` LIKE '%$Cuit%' ORDER BY `ComVistaHorarios`.`Dia` ASC");		
		*/
		
 while ($filaEvaluacionB = mysqli_fetch_array($queryEvaluacionB))

{
echo "<TR>\n";
echo "<td>".$filaEvaluacionB['Id_Eval']."</td>\n";
echo "<td>".$filaEvaluacionB['FechaEval']."</td>\n";
echo "<td>".$filaEvaluacionB['CUIT_Eval']."</td>\n";
echo "<td>".$filaEvaluacionB['Apellidos']."</td>\n";
echo "<td>".$filaEvaluacionB['Nombres']."</td>\n";
echo "<td>".$filaEvaluacionB['Prod']."</td>\n";
echo "<td>".$filaEvaluacionB['Calidad']."</td>\n";
echo "<td>".$filaEvaluacionB['SyH']."</td>\n";
echo "<td>".$filaEvaluacionB['Compromiso']."</td>\n";
echo "<td>".(($filaEvaluacionB['Compromiso']+$filaEvaluacionB['Prod']+$filaEvaluacionB['Calidad']+$filaEvaluacionB['Compromiso'])/4)."</td>\n";


echo "<td>"."<a href=\"/sistema/FormLocaEditar.php?Id_Eval=".$filaEvaluacionB['Id_Eval']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormLocaBorrar.php?Id_Eval=".$filaEvaluacionB['Id_Eval']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>