<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="../sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Vista Reclamo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

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

</script>	
	
	<style>
	
		/*
		img:hover{
			width: 200%;
			height: 200%;
		}
	*/
	</style>
	
	
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
 <?php
include("Conexion/conexion.php");

echo $NumReclamo;
$NumReclamo=$_GET['NumReclamo'];
$varNumReclamo = $NumReclamo=$_GET['NumReclamo'];
$queryvarNumReclamo = $mysqli -> query ("SELECT * FROM `ComVerReclamo` WHERE `NumReclamo`  = ".$NumReclamo.";");

$row = mysqli_fetch_assoc($queryvarNumReclamo);


?>


<div class="container-fluid">
  <table width="" border="" class="table-responsive-xl table table-bordered table-hover">
<thead>
<tr>
        <td class="algCentral"><img src="/sistema/img/Logotipo2023.JPG" alt="Logo" width="180" height="60"></td>
        <td colspan="4" ><h3 style="text-align: center;" ><strong class="algCentral"> <b>Informe de reclamo</b> </strong></h3></td>
        <td ><p>R.03.00.04</p>
        <p>Fecha: <?php echo $row['Fecha']; ?> - N°:<?php echo $row['NumReclamo']; ?></p>
        <p>Usuario: <?php echo $row['Usuario']; ?></p> 
        </td >

</tr>


  </thead>
    <tr>
	  <th scope="row">Reclamo: </th>
       <td colspan="5"> <?php echo $row['Reclamo']; ?></td>
	  </tr>
	<tr>
    <th scope="row" width=""><p>Tipo 
		Reclamo: </p></th>	
	  <td colspan="3" width=""> <?php echo $row['TipoReclamo'];
	$varTipoReclamo = $row['TipoReclamo']; ?></td>
	
	<th scope="row">Implemento: </th>
       <td> <?php echo $row['Implemento']; ?> </td>
    </tr>

	 <tr>
     <th scope="row">Fecha :</th>
      <td> <?php echo $row['Fecha']; ?></td>
	 <th scope="row">Fecha Final: </th>
      <td><?php echo $row['FechaFinal']; ?> </td>
		 
 <th scope="row">Fecha Cierre: </th>
      <td><?php echo $row['FechaCierre']; ?> </td>
    </tr>
	  
    <tr>
          <th scope="row">Descripcion:</th>
      <td colspan="5"> <p><?php echo $row['Descripcion']; ?> </p></td>
         
    </tr>	  

    <tr>
     <th scope="row">Consecionaria: </th>
      <td> <?php echo $row['Concesionario']; ?>	 </td>
 	 <th scope="row">Cliente:</th>
      <td> <?php echo $row['Cliente']; ?> </td>
 	 <th scope="row">Repacion:</th>
      <td> <?php echo $row['Reparacion']; ?> </td>
    </tr>
	  
    <tr>
      <th scope="row">Chasis:</th>
      <td><?php echo $row['Chasis']; ?></td>
     <th scope="row">Serie: </th>
      <td> <?php echo $row['Serie']; ?></td>
     <th scope="row"><p>Requiere
		 Asistencia: </p></th>
      <td> <?php echo $row['RequiereAsistencia']; ?> </td>
    </tr>
<tr>

	<td colspan="6">
	
		<?php	

$varNumReclamo = $row['NumReclamo'];	
	
include("Conexion/conexion.php");	//SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = 1 AND `FkTipoFalla` = 2 ORDER BY `Id_ItemFalla` ASC
$queryComVistFallaRecl2 = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = '$varNumReclamo' AND `FkTipoFalla` = 2 ORDER BY `Id_ItemFalla` ASC");
  
 while ($filaComVistFallaRecl2 = mysqli_fetch_array($queryComVistFallaRecl2))

	 
	 
{

  echo "    
  <table class=\"table table-striped\">
  <th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span >Falla Mecanicas</th>
  
  <TR>
  <TD><B>Id</B></TD>
  <TD><B>Num</B></TD>
  <TD><B>ItemFalla</B></TD>	
  <TD><B>Detalle</B></TD>
  </TR>"
  ;  
	 
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl2['Falla']."</td>\n";
echo "<td>".$filaComVistFallaRecl2['Fk_NumRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl2['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl2['Detalle']."</td>\n";	

echo "</TR>\n";
echo"</table>"; 
}
	

mysqli_close($mysqli);
	

?>	

	</td>
	  
</tr>
	  
<tr>

	<td colspan="6">
		
		<?php

	
	
include("Conexion/conexion.php");
$queryComVistFallaRecl3 = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = '$varNumReclamo' AND `FkTipoFalla` = 3 ORDER BY `Id_ItemFalla` ASC");
  
 while ($filaComVistFallaRecl3 = mysqli_fetch_array($queryComVistFallaRecl3))

{

  echo "    	
  <table class=\"table table-striped\">
  <th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span >Sistema Hidraulico</th>
  
  <TR>
  <TD><B>Id</B></TD>
  <TD><B>Num</B></TD>
  <TD><B>ItemFalla</B></TD>	
  <TD><B>Detalle</B></TD>
  </TR>"
  ; 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl3['Falla']."</td>\n";
echo "<td>".$filaComVistFallaRecl3['Fk_NumRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl3['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl3['Detalle']."</td>\n";	

echo "</TR>\n";
echo "</table>	"; 
}
	
	 
mysqli_close($mysqli);
	
 
?>	

	</td>
	  
</tr>	 
	  
<tr>

	<td colspan="6">
		

		<?php	

	
	
include("Conexion/conexion.php");	//= ".$NumReclamo."
$queryComVistFallaRecl4 = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = '$varNumReclamo' AND `FkTipoFalla` = 4 ORDER BY `Id_ItemFalla` ASC");
  
 while ($filaComVistFallaRecl4 = mysqli_fetch_array($queryComVistFallaRecl4))

{
  echo "  
  <table class=\"table table-striped\">  	
  <th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span >Sistema Electrica</th>
  
  <TR>
  <TD><B>Id</B></TD>
  <TD><B>Num</B></TD>
  <TD><B>ItemFalla</B></TD>	
  <TD><B>Detalle</B></TD>
  </TR>"
  ; 
 
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl4['Falla']."</td>\n";
echo "<td>".$filaComVistFallaRecl4['Fk_NumRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl4['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl4['Detalle']."</td>\n";
echo "</TR>\n";
echo "</table>	";
}
	
	 
mysqli_close($mysqli);
	

?>	
		
	</td>
	  
</tr>	
	  
<tr>

	<td colspan="6">
		
	
		<?php	

	
	
include("Conexion/conexion.php");	//= ".$NumReclamo."
$queryComVistFallaRecl1 = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = '$varNumReclamo' AND `FkTipoFalla` = 1 ORDER BY `Id_ItemFalla` ASC");
  
 while ($filaComVistFallaRecl1 = mysqli_fetch_array($queryComVistFallaRecl1))

{

  echo "  
  <table class=\"table table-striped\">  	
  <th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span >Sistema Terminacion</th>
  
  <TR>
  <TD><B>Id</B></TD>
  <TD><B>Num</B></TD>
  <TD><B>ItemFalla</B></TD>	
  <TD><B>Detalle</B></TD>
  </TR>"
  ; 
 
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl1['Falla']."</td>\n";
echo "<td>".$filaComVistFallaRecl1['Fk_NumRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl1['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl1['Detalle']."</td>\n";

echo "</TR>\n";
 echo "</table>	";
}
	
	 
mysqli_close($mysqli);
	

?>	
	
		</td>
	  
</tr>	  

	
		

    <tr>
      
		<td colspan="6"> <?php 
			
include("Conexion/conexion.php");	
$queryImagen = $mysqli -> query ("SELECT * FROM `ComVerReclamo` WHERE `NumReclamo` = '$varNumReclamo' ");
  
 while ($filaImagen = mysqli_fetch_array($queryImagen))

{
	 
	 echo "
 <table width=\"\" border=\"\" class=\"table table-striped\">

<TR>
<TD colspan=\"5\"><B>Imagenes</B></TD>

</TR>

";
echo "<TR>\n";
	 
$varDir = $filaImagen['Imagen'];
$varDir1 = $filaImagen['Imagen1'];
$varDir2 = $filaImagen['Imagen2'];
$varDir3 = $filaImagen['Imagen3'];

if ($varDir!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDir!="") {
  echo "<td>"."<a href=\"$varDir\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDir\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDir1!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDir1!="") {
  echo "<td>"."<a href=\"$varDir1\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDir1\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDir2!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDir2!="") {
  echo "<td>"."<a href=\"$varDir2\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDir2\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDir3!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDir3!="") {
  echo "<td>"."<a href=\"$varDir3\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDir3\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}
	 
echo "</TR>\n";
echo "</table>"; 		 
}
	
	 
mysqli_close($mysqli);
	
		
			
			?> </td>
    </tr>

    <tr>
          <th scope="row">Analisis Causa: </th>
      <td colspan="5"> <p><?php echo $row['AnalisisCausa']; ?> </p></td>
         
    </tr>		
	  
    <tr>
          <th scope="row">Acciones: </th>
      <td colspan="5"> <p><?php echo $row['RespAccion']; ?> </p></td>
         
    </tr>	
	  
 <tr>
      
		<td colspan="6"> <?php 
			
include("Conexion/conexion.php");	
$queryImagenSolu = $mysqli -> query ("SELECT * FROM `ComVerReclamo` WHERE `NumReclamo` = '$varNumReclamo' ");
  
 while ($filaImagenSolu = mysqli_fetch_array($queryImagenSolu))

{
	 
	 echo "
 <table width=\"\" border=\"\" class=\"table table-striped\">

<TR>
<TD colspan=\"5\"><B>Imagenes solucion</B></TD>

</TR>

";
echo "<TR>\n";

$varDirSolu = $filaImagenSolu['ImagenSolu'];
$varDirSolu1 = $filaImagenSolu['ImagenSolu1'];
$varDirSolu2 = $filaImagenSolu['ImagenSolu2'];
$varDirSolu3 = $filaImagenSolu['ImagenSolu3'];
	 
	

if ($varDirSolu!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDirSolu!="") {
  echo "<td>"."<a href=\"$varDirSolu\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDirSolu\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDirSolu1!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDirSolu1!="") {
  echo "<td>"."<a href=\"$varDirSolu1\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDirSolu1\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDirSolu2!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDirSolu2!="") {
  echo "<td>"."<a href=\"$varDirSolu2\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDirSolu2\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}

if ($varDirSolu3!="https://interno.comofrasrl.com.ar/sistema/img/venta/" && $varDirSolu3!="") {
  echo "<td>"."<a href=\"$varDirSolu3\" target=\"_blank\"><img class=\"img-fluid\" src=\"$varDirSolu3\" alt=\"ImagenSol2\" width=\"100\" height=\"100\"></a></td>\n";
}
 
	 
echo "</TR>\n";
echo "</table>"; 		 
}
	
	 
mysqli_close($mysqli);
	
		
			
			?> </td>
    </tr>	  
 
    <tr>
      <td colspan="6">&nbsp;</td>
	</tr>
  <!--  <tr>
          <th scope="row">Codigo Recurso utilizado: </th>
      <td colspan="5"> <p><?php echo $row['CodRecurUtil']; ?> </p></td>
         
    </tr>	-->
	  
    <tr>
          <th scope="row"> </th>
      <td colspan="5"> <p></p></td>
         
    </tr>	
	  
    <tr>
          <th scope="row">Respuesta Evalucion: </th>
      <td colspan="5"> <p><?php echo $row['RespEvaluc']; ?> </p></td>
         
    </tr>	  


  </table>
	

</div>
    </div>
  </div>
</div>	
<br>
	
</body>
</html>