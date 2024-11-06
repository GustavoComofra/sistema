<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>
	<title>Editar Formulario categoria de sueldo</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<div class="col-9 mt-0" style="margin-left: 20px">
<?php
include("../Conexion/conexion.php");


$Id_LiqSueldo=$_GET['Id_LiqSueldo'];
$queryId_LiqSueldo = $mysqli -> query ("SELECT * FROM `ComLiqSueldo` WHERE `Id_LiqSueldo` = ".$Id_LiqSueldo." AND `Anular` LIKE 'No'");
$rowId_LiqSueldo = mysqli_fetch_assoc($queryId_LiqSueldo);

$CUIT_Empl=$_GET['Cuit_LiqSueldo'];
$varId_LiqSueldo = $rowId_LiqSueldo['Cuit_LiqSueldo'];
$queryPersoCuil = $mysqli -> query ("SELECT * FROM `ComEmpleado` WHERE `CUIT_Empl` = ".$varId_LiqSueldo.";");
$rowPersoCuil = mysqli_fetch_assoc($queryPersoCuil);

?>
<?php //echo $_SERVER['PHP_SELF'] ?>	


<form action="#" method="post" name="formLiqSueldo" enctype="multipart/form-data">

<div>
  <table width=""   class="table-responsive-xl table table-bordered table-hover">
<thead>
    <tr>
      <td colspan="8"  ><label>Editar Concepto x categoria</label></td>
	
    </tr>
  </thead>
 
	  
	<tr>
    <th>CUIT: </th>	
<td><input type="text" name="txtCUIT_Empl"  id="txtCUIT_Empl" value="<?php echo $rowPersoCuil['CUIT_Empl'];
	$varCUIT_Empl = $rowPersoCuil['CUIT_Empl']; ?>" size="11"/></td>		

	<th>Nombres: </th>
<td><input type="text" name="txtNombres"  id="txtNombres" value="<?php echo $rowPersoCuil['Nombres'];
	$varNombres = $row['Nombres']; ?>" size="10" /></td>
		
	<th>Apellidos: </th>
<td><input type="text" name="txtApellidos"  id="txtApellidos" value="<?php echo $rowPersoCuil['Apellidos'];
	$varApellidos = $row['Apellidos']; ?>" size="10" /></td>
		
	<th>CategSueld: </th>
<td><input type="text" name="txtFk_CategSueld"  id="txtFk_CategSueld" value="<?php echo $rowPersoCuil['Fk_CategSueld']; $varFk_CategSueld = $rowPersoCuil['Fk_CategSueld']; ?>" size="2" /></td>
		
    </tr>
 </table>
  </div>	
	
	
<div  >
  <table width="" border="1" class="table table-striped">
    <tr>
      <td colspan="5"  ><label>ComLiqSueldo</label>
		
		</td>
    </tr>
    <tr>
	  <td>Id</td>
      <td>Concepto</td>
      <td>HabDeb</td>
<!--      <td>Cant</td>-->
      <td>Valor</td>
      <td>Porc</td>
    </tr>
 <tr>
<td><input type="text" name="txtId_LiqSueldo"  id="txtId_LiqSueldo" title="Id" size="2" value="<?php echo $rowId_LiqSueldo['Id_LiqSueldo']; ?>" /></td>
     <td><select name="listConcepto" size="1" id="listConcepto">
        <option value="<?php echo $rowId_LiqSueldo['Concepto']; ?>"><?php echo $rowId_LiqSueldo['Concepto']; ?>:</option>
        <?php
//include("Conexion/conexion.php");
$queryConcepto = $mysqli -> query ("SELECT * FROM `ComConceptos` WHERE `SupConcepto` LIKE 'No' ORDER BY `Concepto` ASC");
while ($valoresConcepto = mysqli_fetch_array($queryConcepto))
{

 echo '<option value="'.$valoresConcepto['Concepto'].'">'.$valoresConcepto['Concepto'].'</option>';
}
	?>
</select></td>
<td><input type="number" name="txtHabDeb"  id="txtHabDeb" title="HabDeb" size="2" min="-1" max="1" value="<?php echo $rowId_LiqSueldo['HabDeb']; ?>" /></td>
<!--<td><input name="txtCantidad" type="number" step="any" id="txtCantidad" title="Cantidad" size="2" value="<?php echo $rowId_LiqSueldo['Cantidad']; ?>" /></td>-->
<td>$<input name="txtValor" type="number" id="txtValor" title="Valor" size="" step="any" value="<?php echo $rowId_LiqSueldo['Valor']; ?>"  /></td>
<td><input name="txtPorc" type="number" id="txtPorc" title="Porcentaje" size="" step="any" max="100" value="<?php echo $rowId_LiqSueldo['Porc']; ?>" /></td>
</tr>
	  
<tr>
	
      <td colspan="7"><label>
        <input type="submit" class="btn-outline-info" name="btnEnviar" id="btnEnviar" value="Editar concepto" />
      </label></td></tr>
    
  </table>
	  </div>
	
<?php
$Id_LiqSueldo=$_POST['txtId_LiqSueldo'];
$CUIT_Empl=$_POST['txtCUIT_Empl'];
$Nombres=$_POST['txtNombres'];	
$Apellidos=$_POST['txtApellidos'];
$Fk_CategSueld=$_POST['txtFk_CategSueld'];

$Concepto=$_POST['listConcepto'];
$HabDeb=$_POST['txtHabDeb'];	
//$Cantidad=$_POST['txtCantidad'];	
$Valor=$_POST['txtValor'];	
$Porc=$_POST['txtPorc'];	

if(!$Concepto==null){

//include("Conexion/conexion.php");	
$EditarConcepto = "UPDATE `ComLiqSueldo` SET `Concepto` = '$Concepto',`HabDeb` = '$HabDeb', `Valor` = '$Valor', `Porc` = '$Porc', `Fk_CatSueldLiq` = '$Fk_CategSueld' WHERE `ComLiqSueldo`.`Id_LiqSueldo` = '$Id_LiqSueldo';";

$ejecutar_Editar=mysqli_query($mysqli,$EditarConcepto);
	
		
mysqli_close($mysqli);		
	
}

$CUIT_Empl=$_POST['txtCUIT_Empl'];
echo "
<table border=1 align=\"\" class=\"table table-striped\">
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Categoria: $Fk_CategSueld</th>
  <thead>
<tr>
	 </thead>
	 
<TR>
<TD><B>Concepto</B></TD>
<TD><B>HabDeb</B></TD>

<TD><B>Valor</B></TD>
<TD><B>%</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Anular</B></TD>
</TR>
";
$CUIT_Empl=$_POST['txtCUIT_Empl'];	
	
//include("Conexion/conexion.php");	
$queryConcepto = $mysqli -> query ("SELECT * FROM `ComLiqSueldo` WHERE `Cuit_LiqSueldo` LIKE '%$CUIT_Empl%' AND `Anular` LIKE 'No' ORDER BY `Concepto` ASC");
  
 while ($filaConcepto = mysqli_fetch_array($queryConcepto))

{
echo "<TR>\n";
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

	<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!-- <script src="js/dataTables.bootstrap.js"></script> -->
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

	<!-- datatables-->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- datatables extension SELECT -->
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	<!-- extension BOTONES -->
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

	<!-- para botenes de exportar -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

</body>
</html>