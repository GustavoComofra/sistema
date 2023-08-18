<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
<style type="text/css">
body {
    background-image: url(/sistema/img/FondoPanel1.jpeg);
}
</style>
<title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
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
	

	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
	
<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">

<?php 

include("Conexion/conexion.php");

  
$queryNumRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `ComReclamo`.`NumReclamo` DESC LIMIT 1");


 while ($valoresNumRecl = mysqli_fetch_array($queryNumRecl))

		  
		  {
$varNumRecl = $valoresNumRecl['NumReclamo']+1;
 //echo $varNumRecl;
}	


$NumTipoReclamo=$_POST['listTipoReclamo'];
$Reclamo=$_POST['txtReclamo'];
$Fecha= $_POST['txtFecha'];
$FechaFinal= $_POST['txtFechaFinal'];
$FechaCierre= $_POST['txtFechaCierre'];
$IdConce= $_POST['listIdConce'];

$IdCliente=$_POST['listIdCliente'];
$IdRepacion=$_POST['listIdRepacion'];
$Descripcion= $_POST['txtDescripcion'];
$Chasis= $_POST['txtChasis'];
$Serie= $_POST['txtSerie'];
//$TipoImplemento= $_POST['listTipoImplemento'];
$Implemento= $_POST['listImplemento'];



$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.comofrasrl.com.ar/img/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre_imagen);
$Imagen = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen;

$nombre_imagen1=$_FILES['imagen1']['name'];
$tipo_iamgen1=$_FILES['imagen1']['type'];
$tamagno_imegen1=$_FILES['imagen1']['size'];
$carpetas_destino1='ftp.comofrasrl.com.ar/img/' . $nombre_imagen1;
move_uploaded_file($_FILES['imagen1']['tmp_name'],$nombre_imagen1);
$Imagen1 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen1;

$nombre_imagen2=$_FILES['imagen2']['name'];
$tipo_iamgen2=$_FILES['imagen2']['type'];
$tamagno_imegen2=$_FILES['imagen2']['size'];
$carpetas_destino2='ftp.comofrasrl.com.ar/img/' . $nombre_imagen2;
move_uploaded_file($_FILES['imagen2']['tmp_name'],$nombre_imagen2);
$Imagen2 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen2;

$nombre_imagen3=$_FILES['imagen3']['name'];
$tipo_iamgen3=$_FILES['imagen3']['type'];
$tamagno_imegen3=$_FILES['imagen3']['size'];
$carpetas_destino3='ftp.comofrasrl.com.ar/img/' . $nombre_imagen3;
move_uploaded_file($_FILES['imagen3']['tmp_name'],$nombre_imagen3);
$Imagen3 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagen3;




$AnalisisCausa=$_POST['txtAnalisisCausa'];
$RequiereAsistencia=$_POST['listRequiereAsistencia'];
$RespAccion=$_POST['txtRespAccion'];


$nombre_imagenSolu=$_FILES['imagenSolu']['name'];
$tipo_iamgenSolu=$_FILES['imagenSolu']['type'];
$tamagno_imegenSolu=$_FILES['imagenSolu']['size'];
$carpetas_destinoSolu='ftp.comofrasrl.com.ar/img/' . $nombre_imagenSolu;
move_uploaded_file($_FILES['imagenSolu']['tmp_name'],$nombre_imagenSolu);
$ImagenSolu = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagenSolu;

$nombre_imagenSolu1=$_FILES['imagenSolu1']['name'];
$tipo_iamgenSolu1=$_FILES['imagenSolu1']['type'];
$tamagno_imegenSolu1=$_FILES['imagenSolu1']['size'];
$carpetas_destinoSolu1='ftp.comofrasrl.com.ar/img/' . $nombre_imagenSolu1;
move_uploaded_file($_FILES['imagenSolu1']['tmp_name'],$nombre_imagenSolu1);
$ImagenSolu1 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagenSolu1;

$nombre_imagenSolu2=$_FILES['imagenSolu2']['name'];
$tipo_iamgenSolu2=$_FILES['imagenSolu2']['type'];
$tamagno_imegenSolu2=$_FILES['imagenSolu2']['size'];
$carpetas_destinoSolu2='ftp.comofrasrl.com.ar/img/' . $nombre_imagenSolu2;
move_uploaded_file($_FILES['imagenSolu2']['tmp_name'],$nombre_imagenSolu2);
$ImagenSolu2 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagenSolu2;

$nombre_imagenSolu3=$_FILES['imagenSolu3']['name'];
$tipo_iamgenSolu3=$_FILES['imagenSolu3']['type'];
$tamagno_imegenSolu3=$_FILES['imagenSolu3']['size'];
$carpetas_destinoSolu3='ftp.comofrasrl.com.ar/img/' . $nombre_imagenSolu3;
move_uploaded_file($_FILES['imagenSolu3']['tmp_name'],$nombre_imagenSolu3);
$ImagenSolu3 = 'http://interno.comofrasrl.com.ar/sistema/'.$nombre_imagenSolu3;




$EvalEfica=$_POST['txtEvalEfica'];
$RespEvaluc=$_POST['txtRespEvaluc'];


$insertarComReclamo = "INSERT INTO `ComReclamo` (`IdReclamo`, `NumReclamo`, `Reclamo`, `NumTipoReclamo`, `Fecha`, `FechaFinal`, `IdConce`, `IdCliente`, `IdRepacion`, `Descripcion`, `Chasis`, `Serie`, `TipoImplemento`, `NumImplemento`, `Falla`, `FallaTerminacion`, `FallaMecanica`, `FallaSistHid`, `FallaSistElect`, `Imagen`, `Imagen1`, `Imagen2`, `Imagen3`, `AnalisisCausa`, `RequiereAsistencia`, `RespAccion`, `ImagenSolu`, `ImagenSolu1`, `ImagenSolu2`, `ImagenSolu3`, `EvalEfica`, `RespEvaluc`, `FechaCierre`) 
VALUES (NULL, '$varNumRecl', '$Reclamo', '$NumTipoReclamo', '$Fecha', '$FechaFinal', '$IdConce', '$IdCliente', '$IdRepacion', '$Descripcion', '$Chasis', '$Serie', '', '$Implemento', '', '', '', '', '', '$Imagen', '$Imagen1', '$Imagen2', '$Imagen3', '$AnalisisCausa', '$RequiereAsistencia', '$RespAccion', '$ImagenSolu', '$ImagenSolu1', '$ImagenSolu2', '$ImagenSolu3',  '$EvalEfica', '$RespEvaluc',  '$FechaCierre');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComReclamo);

$titulo="Reclamo Num ".$varNumRecl;
$mensaje="Reclamo: ".$_POST['txtReclamo']." Chasis: ".$_POST['txtChasis']." Fecha: ".$_POST['txtFecha']."Para revisarlo: http://interno.comofrasrl.com.ar/sistema/";
$para="gustavog@live.com.ar,sgc@comofrasrl.com.ar,calidad2@comofrasrl.com.ar,producto@comofrasrl.com.ar,repuestos@comofrasrl.com.ar,gerenciageneral@comofrasrl.com.ar
,gerenciaproduccion@comofrasrl.com.ar,producto1@comofrasrl.com.ar,procesos@comofrasrl.com.ar";
//$para="gustavog@live.com.ar";

$cabeceras = 'From: industrial@comofrasrl.com.ar>';
$enviado = mail($para, $titulo, $mensaje,$cabeceras);

if ($enviado)
  echo 'Email enviado correctamente: '.$para;
else
  echo 'Error en el envio del email';

mysqli_close($mysqli);

?>

<?php
include("Conexion/conexion.php");

$query2 = $mysqli -> query ("SELECT * FROM `ComReclamo` ORDER BY `IdReclamo` DESC LIMIT 1");


$row = mysqli_fetch_assoc($query2);


?>


<div align="">
  <table width="471" border="0">
    <tr>
      <td colspan="2" align="center"><label>Reclamo Creado</label></td>
    </tr>

    
		<tr>
      <td width="131">IdReclamo: </td>	
		    <td width="166">	
	<?php
		echo $row['IdReclamo'];
			?></td>
    </tr>
	
	<tr>
      <td>Reclamo: </td>
      <td>		
		  <?php
		echo $row['Reclamo'];
			?></td>
    </tr>
    <tr>
      <td>TipoReclamo:</td>
      <td>
		  <?php
		echo $row['TipoReclamo'];
			?>
	</td>
	
    </tr>
    <tr>
      <td>Fecha:</td>
      <td>
			  <?php
		echo $row['Fecha'];
			?>	
		
	</td>
    </tr>
    <tr>
      <td>Fecha Final</td>
      <td>
		
			  <?php
		echo $row['FechaFinal'];
			?>			
		</td>
    </tr>
    <tr>
      <td>Imagenes :</td>
      <td>
					  <?php
		  
		  echo '<img src="'.$row['Imagen'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['Imagen1'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['Imagen2'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['Imagen3'].'" width="50" heigth="50"/>';
		  
			?>	
	</td>
    </tr>
    <tr>
      <td>Analisis Causa: </td>
      <td>
					  <?php
		echo $row['AnalisisCausa'];
			?>			
		
		</td>
    </tr>
    <tr>
      <td>Requiere Asistencia: </td>
      <td>
					  <?php
		echo $row['RequiereAsistencia'];
			?>			
		
		</td>
    </tr>
    <tr>
      <td>Resp Accion:</td>
      <td>
						  <?php
		echo $row['RespAccion'];
			?>		
		</td>
    </tr>
 <tr>
	 
    <tr>
      <td>Imagen Solucion :</td>
      <td>
					  <?php
		  
		  echo '<img src="'.$row['ImagenSolu'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['ImagenSolu1'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['ImagenSolu2'].'" width="50" heigth="50"/>';
		  echo '<img src="'.$row['ImagenSolu3'].'" width="50" heigth="50"/>';
		  
			?>	
	</td>
    </tr>
	  
	 
	 
     
    </tr>
    <tr>
      <td>Evaluacion Eficaz:</td>
      <td>
<?php
echo $row['EvalEfica'];
?>		
		</td>
    </tr>
    <tr>
      <td>Respuesta Evalucion:</td>
      <td>
<?php
echo $row['RespEvaluc'];
?>		
		</td>
    </tr>
    
    <tr>
      <td colspan="2">
<?php
		  

?>		
		
		</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
     <td>&nbsp;</td>
    </tr>
  </table>
	
<?php

$varNumRecl;

$Fallamec=$_POST['listFallamec'];
$Detallemec=$_POST['txtDetallemec'];

$Falla1mec=$_POST['listFalla1mec'];
$Detalle1mec=$_POST['txtDetalle1mec'];

$Falla2mec=$_POST['listFalla2mec'];
$Detalle2mec=$_POST['txtDetalle2mec'];

  

		  if(!$Fallamec==null){
			  
			  include("Conexion/conexion.php");	
			  
echo "<td>"."<a href=\"http://interno.comofrasrl.com.ar/sistema/panel.php\"><img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a></td>\n";			  
	
$insertarComFallaRecl = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Fallamec', '$Detallemec');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComFallaRecl);		
//echo "estudio agregado";
		  
		  }if(!$Falla1mec==null){
		$insertarComFallaRecl1 = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Fallamec', '$Detallemec');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1);		  
			  
		  }if(!$Falla2mec==null){
		$insertarComFallaRecl1 = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Fallamec', '$Detallemec');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1);		  
			  
		  }
// else{echo "Agregar items";}
	
mysqli_close($mysqli);


$FallaTer=$_POST['listFallaTer'];
$DetalleTer=$_POST['txtDetalleTer'];

$Falla1Ter=$_POST['listFalla1Ter'];
$Detalle1Ter=$_POST['txtDetalle1Ter'];

$Falla2Ter=$_POST['listFalla2Ter'];
$Detalle2Ter=$_POST['txtDetalle2Ter'];

  

		  if(!$FallaTer==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComFallaReclTer = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$FallaTer', '$DetalleTer');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComFallaReclTer);		
//echo "estudio agregado";
		  
		  }if(!$Falla1Ter==null){
		$insertarComFallaRecl1Ter = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla1Ter', '$Detalle1Ter');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1Ter);		  
			  
		  }if(!$Falla2Ter==null){
		$insertarComFallaRecl1Ter = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla2Ter', '$Detalle2Ter');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1Ter);		  
			  
		  }
// else{echo "Agregar items";}
	
mysqli_close($mysqli);



$FallaHid=$_POST['listFallaHid'];
$DetalleHid=$_POST['txtDetalleHid'];

$Falla1Hid=$_POST['listFalla1Hid'];
$Detalle1Hid=$_POST['txtDetalle1Hid'];

$Falla2Hid=$_POST['listFalla2Hid'];
$Detalle2Hid=$_POST['txtDetalle2Hid'];

		  if(!$FallaHid==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComFallaReclHid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$FallaHid', '$DetalleHid');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComFallaReclHid);		

		  
		  }if(!$Falla1Hid==null){
		$insertarComFallaRecl1Hid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla1Hid', '$Detalle1Hid');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1Hid);		  
			  
		  }if(!$Falla2Hid==null){
		$insertarComFallaRecl1Hid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla2Hid', '$Detalle2Hid');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1Hid);		  
			  
		  }
// else{echo "Agregar items";}
	
mysqli_close($mysqli);




$FallaHid=$_POST['listFallaEle'];
$DetalleHid=$_POST['txtDetalleHid'];

$Falla1Hid=$_POST['listFalla1Ele'];
$Detalle1Hid=$_POST['txtDetalle1Hid'];

$Falla2Hid=$_POST['listFalla2Ele'];
$Detalle2Hid=$_POST['txtDetalle2Hid'];

		  if(!$FallaHid==null){
			  
			  include("Conexion/conexion.php");	
	
$insertarComFallaReclHid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$FallaHid', '$DetalleHid');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarComFallaReclHid);		
//echo "estudio agregado";
		  
		  }if(!$Falla1Hid==null){
		$insertarComFallaRecl1Hid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla1Hid', '$Detalle1Hid');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl1Hid);		  
			  
		  }if(!$Falla2Hid==null){
		$insertarComFallaRecl2Hid = "INSERT INTO `ComFallaRecl` (`Id_FallaRecl`, `Fk_NumRecl`, `Falla`, `Detalle`) VALUES (NULL, '$varNumRecl', '$Falla2Hid', '$Detalle2Hid');";

$ejecutar_insertar2=mysqli_query($mysqli,$insertarComFallaRecl2Hid);		  
			  
		  }
// else{echo "Agregar items";}


//mysqli_close($mysqli);



// $varNumReclCosto = $valoresNumRecl['NumReclamo']+1;
//$varNumReclCosto = 143;
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

$Cantidad4=$_POST['txtCantidad4'];
$Detalle4=$_POST['txtDetalle4'];
$Pesos4=$_POST['txtPesos4'];
$Dolar4=$_POST['txtDolar4'];
$Observacion4=$_POST['txtObservacion4'];

$Cantidad5=$_POST['txtCantidad5'];
$Detalle5=$_POST['txtDetalle5'];
$Pesos5=$_POST['txtPesos5'];
$Dolar5=$_POST['txtDolar5'];
$Observacion5=$_POST['txtObservacion5'];

if(!$Detalle==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos', '$Dolar', '$Cantidad', '$Detalle', '$Chasis', '$Observacion');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl);		
//echo "estudio agregado";

}if(!$Detalle1==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl1 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos1', '$Dolar1', '$Cantidad1', '$Detalle1', '$Chasis', '$Observacion1');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl1);		
//echo "estudio agregado";

}if(!$Detalle2==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl2 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos2', '$Dolar2', '$Cantidad2', '$Detalle2', '$Chasis', '$Observacion2');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl2);		
//echo "estudio agregado";

}if(!$Detalle3==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl3 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos3', '$Dolar3', '$Cantidad3', '$Detalle3', '$Chasis', '$Observacion3');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl3);		
//echo "estudio agregado";

}if(!$Detalle4==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl4 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos4', '$Dolar4', '$Cantidad4', '$Detalle4', '$Chasis', '$Observacion4');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl4);		
//echo "estudio agregado";

}if(!$Detalle5==null){
			  
  include("Conexion/conexion.php");	

$insertarCorteRecl5 = "INSERT INTO `CostoReclamo` (`IdCosto`, `Fk_Num_Recl_Cost`, `Pesos`, `Dolar`, `Cantidad`, `Detalle`, `Fk_Chasis`, `Observacion`) VALUES (NULL, '$varNumRecl', '$Pesos5', '$Dolar5', '$Cantidad5', '$Detalle5', '$Chasis', '$Observacion5');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarCorteRecl5);		
//echo "estudio agregado";

}

mysqli_close($mysqli);

?>

<?php
/*echo "<script type=\"text/javascript\">
window.location.href = \"../sistema/PruebaFormulario.php\";
</script>";	*/
	
?>
</div>
	 </div>
	   
	  </body>
</html>