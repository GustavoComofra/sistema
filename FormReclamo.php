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
<meta charset="utf-8">
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Formulario Reclamo</title>
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

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
		
<form action="/sistema/insertarReclamo.php" method="post" name="formReclamo" enctype="multipart/form-data">


	
<div class="form-group" align="">
  <table class="table" width=""  border="0">
    <tr>
      <td colspan="2" align="left">
		 <label for="txtReclamo">Formulario Reclamo</label>
		</td>
    </tr>
	  
<tr>
      <td>
		  <label for="txtTipoReclamo"><p>Tipo Reclamo <strong style="color:red;">*</strong></p></label>	
<select name="listTipoReclamo" size="1" id="listTipoReclamo" required>
        <option value=1 >Seleccione reclamo</option>
        <?php
include("Conexion/conexion.php");
  
$queryTipoReclamo = $mysqli -> query ("SELECT * FROM `ComTipoRecla` ORDER BY `ComTipoRecla`.`TipoReclamo` ASC");


 while ($valoresTipoReclamo = mysqli_fetch_array($queryTipoReclamo))

		  
		  {

 echo '<option value="'.$valoresTipoReclamo['Id_TipoRecla'].'">'.$valoresTipoReclamo['TipoReclamo'].'</option>';
}
	?>
      </select>
	
	
	N° <?php
		  
include("Conexion/conexion.php");
  
$queryNumRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `ComReclamo`.`NumReclamo` DESC LIMIT 1");


 while ($valoresNumRecl = mysqli_fetch_array($queryNumRecl))

		  
		  {
$varNumRecl = $valoresNumRecl['NumReclamo']+1;
 echo $varNumRecl;
}		  
		  
		  ?>
	</td>
    </tr>		  
	  

    <tr>
      <td>
		  
		  <label for="txtReclamo"><p>Reclamo <strong style="color:red;">*</strong></p></label>	
		  <input name="txtReclamo" type="text" id="txtReclamo" size="100" required />
     </td>
    </tr>

    <tr>
      <td>
		  <label for="txtFecha"><p>Fecha <strong style="color:red;">*</strong></p></label>		  
		  <input name="txtFecha" type="date" id="txtFecha" size="50" value="<?php echo date("Y-m-d");?>" required />
	  </td>
    </tr>
    <tr>
      <td>
	<label for="txtFechaFinal"><p>Fecha finalizado</p></label>	  
		  <input name="txtFechaFinal" type="date" id="txtFechaFinal" size="50" value="<?php 
		  $fecha_actual = date("Y-m-d");

$varFechaFinal = date("Y-m-d",strtotime($fecha_actual."+ 30 days"));
		  echo $varFechaFinal;
		  
		  ?>"  />
		</td>
    </tr>
	  
<tr>
      <td>
		  <label for="txtIdConce"><p>Consecionaria:<strong style="color:red;">*</strong></p></label>	
<select name="listIdConce" size="1" id="listIdConce">
        <option value=3>Seleccione Consecionaria:</option>
        <?php
include("Conexion/conexion.php");
  
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComConcesionario` ORDER BY `ComConcesionario`.`Concesionario` ASC");


 while ($valoresIdConce = mysqli_fetch_array($queryIdConce))

		  
		  {

 echo '<option value="'.$valoresIdConce['id_Conce'].'">'.$valoresIdConce['Concesionario'].'</option>';
}
	?>
      </select>
</td>
    </tr>	
	  
<tr>
      <td>	
	<label for="txtIdCliente"><p>Cliente:<strong style="color:red;">*</strong></p></label>	
      <select name="listIdCliente" size="1" id="listIdCliente" required>
        <option value=6>Seleccione Cliente:</option>
        <?php
include("Conexion/conexion.php");
  
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComCliente` ORDER BY `ComCliente`.`Cliente` ASC");


 while ($valoresIdConce = mysqli_fetch_array($queryIdConce))

		  
		  {

 echo '<option value="'.$valoresIdConce[Id_Cliente].'">'.$valoresIdConce[Cliente].'</option>';
}
	?>
      </select></td>
    </tr>	
	  
	  
    </tr>	
	  
<tr>
      <td>	
	<label for="txtIdRepacion"><p>Reparacion:<strong style="color:red;">*</strong></p></label>	
	<select name="listIdRepacion" size="1" id="listIdRepacion" required>
        <option value=1>Seleccione Repacion</option>
        <?php
include("Conexion/conexion.php");
  
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComReparacion` ORDER BY `ComReparacion`.`Reparacion` ASC");


 while ($valoresIdConce = mysqli_fetch_array($queryIdConce))

		  
		  {

 echo '<option value="'.$valoresIdConce[Id_Reparacion].'">'.$valoresIdConce[Reparacion].'</option>';
}
	?>
      </select></td>
    </tr>			  
	
	
	<tr>
	<td>	
	<label for="txtDescripcion"><p>Descripcion:</p></label>		 
		<textarea name="txtDescripcion" rows="2" cols="100" id="txtDescripcion" title="Descripcion" ></textarea></td>
	</tr>
	
	    <tr>
	<td>	
	<label for="txtChasis"><p>Chasis:<strong style="color:red;">*</strong></p></label>	      
			<input name="txtChasis" type="number" id="txtChasis" title="Chasis" required /></td>
    </tr>
	
	    <tr>
	<td>	
	<label for="txtSerie"><p>Serie:</p></label>	      
		
			<input name="txtSerie" type="number" id="txtSerie" title="Serie"/></td>
    </tr>	
	
	
	
      <td>	
	<label for="txtTipoImplemento"><p>Implemento:<strong style="color:red;">*</strong></p></label>	
	<select name="listImplemento" size="1" id="listImplemento" required>
        <option value=16>Seleccione </option>
        <?php
include("Conexion/conexion.php");
  
$queryIdConce = $mysqli -> query ("SELECT * FROM `ComImplemento` ORDER BY `ComImplemento`.`Implemento` ASC");


 while ($valoresIdConce = mysqli_fetch_array($queryIdConce))

		  
		  {

 echo '<option value="'.$valoresIdConce[Id_Implemento].'">'.$valoresIdConce[Implemento].'</option>';
}
	?>
      </select></td>
    </tr>	
  


	<tr>
		<td>
		
	<?php	
include ("FormFallaRecla.php");		

?>		
	<?php	
include ("FormCostoRecla.php");		

?>	
		</td>
	</tr>
	
	
    <tr>
      <td>
		  
		  <label for="fileImagen"><p>imagen:</p></label>	 <p>
        <input type="file" name="imagen" id="imagen">
		  <input type="file" name="imagen1" id="imagen1">
		   <input type="file" name="imagen2" id="imagen2">
		  <input type="file" name="imagen3" id="imagen3">

        </p>
		
		
		</td>
    </tr>

	    <tr>
	<td>	
	<label for="txtAnalisisCausa"><p>Analisis Causa:</p></label>	      
			
			<textarea name="txtAnalisisCausa" rows="3" cols="100" id="txtAnalisisCausa" title="Analisis Causa" ></textarea></td>
    </tr>	
	
 <td>	
	<label for="txtRequiereAsistencia"><p>Requiere Asistencia	:</p></label>	
	<select name="listRequiereAsistencia" size="1" id="listRequiereAsistencia">
	 <option>Si</option>
	 <option selected="selected">No</option>
	 </select>
	</td>
    </tr>	
		
 <tr>
	<td>	
	<label for="txtRespAccion"><p>Accion correctiva:</p></label>		 
		<textarea name="txtRespAccion" rows="3" cols="100" id="txtRespAccion" title="RespAccion" ></textarea></td>
	</tr>
	
      <td>
		  
		  <label for="txtImagenSolu"><p>imagen solucion:</p></label>	 <p>
        <input type="file" name="imagenSolu" id="imagen">
		  <input type="file" name="imagenSolu1" id="imagenSolu1">
		   <input type="file" name="imagenSolu2" id="imagenSolu2">
		  <input type="file" name="imagenSolu3" id="iImagenSolu3">

        </p>
		
		
		</td>
    </tr
		

	  
	    <tr>
	<td>	
	<label for="txtEvalEfica"><p>Evaluacion Eficaz:</p></label>	      
<textarea name="txtEvalEfica" rows="3" cols="100" id="txtEvalEfica" title="EvalEfica" ></textarea></td>
    </tr>
	
	    <tr>
	<td>	
	<label for="txtRespEvaluc"><p>Respuesta Evalucion:</p></label>	      
<textarea name="txtRespEvaluc" rows="3" cols="100" id="txtRespEvaluc" title="Resp Evaluc" ></textarea></td>
    </tr>
		  

<!-- 
    <tr>
      <td colspan="2">&nbsp;
		  
		  
		  
		  </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
-->
	  
    <tr>
      <td>
		  <label for="txtFechaCierre"><p>Fecha Cierre</label>		  
		  <input name="txtFechaCierre" type="date" id="txtFechaCierre" size="50" value="" />
	  </td>
    </tr>
	  
	  
    <tr>
      <td>
		  <label>
          <input type="submit" class="btn btn-success btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label></td>
    </tr>
  </table>

</div>
	  </form>
		
		
    </div>
  </div>
</div>		
	

	
</body>
</html>