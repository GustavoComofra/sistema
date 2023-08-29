<?php	
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
?>	

<!doctype html>
<html>
<head>
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<meta charset="utf-8">
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Cargar Concepto x categoria</title>
<link href="/sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
</head>
<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<body>

	
<div class="container-fluid">
  <div class="row">

    <div class="col-md-auto">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
<?php
include("Conexion/conexion.php");

echo $IdPersonal;
$IdPersonal=$_GET['IdPersonal'];
$varIdPersoanl = $IdPersonal=$_GET['IdPersonal'];
$queryvarIdPersoanl = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `ComEmpleado`.`IdPersonal` = ".$IdPersonal.";");

$row = mysqli_fetch_assoc($queryvarIdPersoanl);


?>
<?php //echo $_SERVER['PHP_SELF'] ?>	


<form action="#" method="post" name="formLiqSueldo" enctype="multipart/form-data">

<div>
  <table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead>
    <tr>
      <td colspan="8" align="center"><label>Cargar Concepto x categoria</label><?php  ?></td>
	
    </tr>
  </thead>
 
	  
	<tr>
    <th>CUIT: </th>	
<td><input type="text" name="txtCUIT_Empl"  id="txtCUIT_Empl" value="<?php echo $row['CUIT_Empl'];
	$varCUIT_Empl = $row['CUIT_Empl']; ?>" size="11"/></td>		

	<th>Nombres: </th>
<td><input type="text" name="txtNombres"  id="txtNombres" value="<?php echo $row['Nombres'];
	$varNombres = $row['Nombres']; ?>" size="10" /></td>
		
	<th>Apellidos: </th>
<td><input type="text" name="txtApellidos"  id="txtApellidos" value="<?php echo $row['Apellidos'];
	$varApellidos = $row['Apellidos']; ?>" size="10" /></td>
		
	<th>CategSueld: </th>
<td><input type="text" name="txtFk_CategSueld"  id="txtFk_CategSueld" value="<?php echo $row['Fk_CategSueld']; $varFk_CategSueld = $row['Fk_CategSueld']; ?>" size="2" /></td>
		
    </tr>
 </table>
  </div>	
	
	
<div align="">
  <table width="" border="1" class="table table-striped">
    <tr>
      <td colspan="4" align="center"><label>ComLiqSueldo</label>
		
		</td>
    </tr>
    <tr>
      <td>Conc</td>
      <td>HabDeb</td>
<!--      <td>Cant</td>-->
      <td>Valor</td>
      <td>Porc</td>
    </tr>
 <tr>
     <td><select name="listConcepto" size="1" id="listConcepto">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
$queryConcepto = $mysqli -> query ("SELECT * FROM `ComConceptos` WHERE `SupConcepto` LIKE 'No' ORDER BY `Concepto` ASC");
while ($valoresConcepto = mysqli_fetch_array($queryConcepto))
{

 echo '<option value="'.$valoresConcepto[Concepto].'">'.$valoresConcepto[Concepto].'</option>';
}
	?>
</select></td>
<td><input type="number" name="txtHabDeb"  id="txtHabDeb" title="HabDeb" size="2" min="-1" max="1" value="1" required /></td>
<!--<td><input name="txtCantidad" type="number" id="txtCantidad" title="Cantidad" size="4" min="1" max="100" value="1" required /></td>-->
<td>$<input name="txtValor" type="number" id="txtValor" title="Valor" size="4" value="0" step="any"  required /></td>
<td><input name="txtPorc" type="number" id="txtPorc" title="Porcentaje" size="4" step="any"  max="100" value="1"  required/></td>
</tr>
	  
<tr>
	
      <td colspan="7"><label>
        <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label></td></tr>
    
  </table>
	  </div>
	
<?php
	
$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Nombres=$_POST['txtNombres'];	
$Apellidos=$_POST['txtApellidos'];
$Fk_CategSueld=$_POST['txtFk_CategSueld'];

$Concepto=$_POST['listConcepto'];
$HabDeb=$_POST['txtHabDeb'];	
$Cantidad=$_POST['txtCantidad'];	
$Valor=$_POST['txtValor'];	
$Porc=$_POST['txtPorc'];	

if(!$Concepto==null){

include("Conexion/conexion.php");	
	
$insertarLocalidad = "INSERT INTO `ComLiqSueldo` (`Id_LiqSueldo`, `Cuit_LiqSueldo`, `Concepto`, `HabDeb`, `Valor`, `Porc`, `Fk_CatSueldLiq`) VALUES (NULL, '$CUIT_Empl', '$Concepto', '$HabDeb', '$Valor', '$Porc', '$Fk_CategSueld');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarLocalidad);
	
		
mysqli_close($mysqli);		
	
}

$CUIT_Empl=$_POST['txtCUIT_Empl'];
echo "
<table border=1 align=\"\" class=\"table table-striped\">
<th colspan=\"7\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Categoria: $Fk_CategSueld</th>
  <thead>
<tr>
	 </thead>
	 
<TR>
<TD><B>Id</B></TD>
<TD><B>Concepto</B></TD>
<TD><B>HabDeb</B></TD>

<TD><B>Valor</B></TD>
<TD><B>%</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Anular</B></TD>
</TR>
";
$CUIT_Empl=$_POST['txtCUIT_Empl'];	
	
include("Conexion/conexion.php");	
$queryConcepto = $mysqli -> query ("SELECT * FROM `ComLiqSueldo` WHERE `Cuit_LiqSueldo` LIKE '%$CUIT_Empl%' AND `Anular` LIKE 'No' ORDER BY `Concepto` ASC");
  
 while ($filaConcepto = mysqli_fetch_array($queryConcepto))

{
echo "<TR>\n";
echo "<td>".$filaConcepto['Id_LiqSueldo']."</td>\n";
echo "<td>".$filaConcepto['Concepto']."</td>\n";
//echo "<td>".$filaConcepto['Cuit_LiqSueldo']."</td>\n";
$varCuit_LiqSueldo=$filaConcepto['Cuit_LiqSueldo'];
$varId_LiqSueldo=$filaConcepto['Id_LiqSueldo'];
echo "<td>".$filaConcepto['HabDeb']."</td>\n";
//echo "<td>".$filaConcepto['Cantidad']."</td>\n";	 
echo "<td>".$filaConcepto['Valor']."</td>\n";	
echo "<td>".$filaConcepto['Porc']."</td>\n";	

echo "<td>"."<a href=\"/sistema/FormCategSueldoEditar.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormCategSueldoAnular.php?Id_LiqSueldo=".$filaConcepto['Id_LiqSueldo']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoAnular\" width=\"20\" height=\"20\"></a></td>\n";
	 
echo "</TR>\n";
}
	 
	 
mysqli_close($mysqli);	

?>	
	
	
</form>	
    </div>
  </div>
</div>	
    </div>

	
</body>
</html>