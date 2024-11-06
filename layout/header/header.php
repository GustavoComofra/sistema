<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/sistema/js/Archivo.js"></script>	
	<!-- Estilo Alertas -->

	<!-- CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
	
	
<link href="../sistema/img/favicon.png" rel="icon" type="image/png">
 <title>Industria Comofra SRL</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

	
	<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>

<body>
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}

?>	
	
	
<header class="" >
 
	  

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		 <a href="index.php">
        <!--  <img class="CssImage" href="index.html" src="img/LogoIdearSin_Fondo.png" width="50" height="50" alt="Imagen logo"/>-->
			 <img class="" href="index.html" src="/sistema/img/logo1.jpg" width="50" height="50" style="border-radius: 50% 50%;"  alt="Imagen logo"/>        </a>
  <a class="navbar-brand" href="../../panel.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

          <!-- Inicio venta -->
      
 <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
        Venta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white" >
	
<?php
		
		
$varUser=$_SESSION['usuario'];
				

include("../Conexion/conexion.php");

$queryventa = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'venta' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaventa = mysqli_fetch_array($queryventa))

{
$varClase = $filaventa['Clase'];  
$varLink = 	$filaventa['Link'];  
$varNombre = $filaventa['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;


}
echo" 
<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"/sistema/garantia/imgGarantia/qrcode-PedidoGarantia.png\" target=\"_blank\"><img src=\"../garantia/imgGarantia/qrcode-PedidoGarantia.png\" alt=\"iconoInforme\" width=\"20\" height=\"20\"> - Codigo QR</a>
";		

?>	


      </li>
<!-- Fin venta -->

 <!-- Inicio Calidad -->
      
 <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
        Calidad
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white" >
	
<?php

				
$varUser=$_SESSION['usuario'];
				



$queryman = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'calidad'");

  while ($filaman = mysqli_fetch_array($queryman))

{
$varClase = $filaman['Clase'];  
$varLink = 	$filaman['Link'];  
$varNombre = $filaman['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;
}


?>			

      </li>
<!-- Fin calidad -->


  <!-- Inicio Ingenieria -->
      
  <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
        Ing
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white" >
	
<?php

				
$varUser=$_SESSION['usuario'];
				



$querying = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'Ingenieria' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaing = mysqli_fetch_array($querying))

{
$varClase = $filaing['Clase'];  
$varLink = 	$filaing['Link'];  
$varNombre = $filaing['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;
}

?>			

      </li>
<!-- Fin Ingenieria -->


   <!-- Inicio RRHH -->
      
   <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
        RRHH
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white" >
	
<?php

				
$varUser=$_SESSION['usuario'];



$queryrrhh = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'rrhh' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filarrhh = mysqli_fetch_array($queryrrhh))

{
$varClase = $filarrhh['Clase'];  
$varLink = 	$filarrhh['Link'];  
$varNombre = $filarrhh['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;
}


?>			

      </li>
<!-- Fin RRHH -->

      <!-- Inicio Mantenimiento -->
      
      <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
        Manten
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white" >
	
<?php
				
$varUser=$_SESSION['usuario'];



$queryman = $mysqli -> query ("SELECT * FROM `VistMenu` WHERE `usuario` LIKE '$varUser' AND `Clase` LIKE 'mantenimiento' ORDER BY `VistMenu`.`Nombre` ASC");

  while ($filaman = mysqli_fetch_array($queryman))

{
$varClase = $filaman['Clase'];  
$varLink = 	$filaman['Link'];  
$varNombre = $filaman['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;
}

?>			

      </li>
<!-- Fin Mantenimiento -->



		
      <li class="nav-item dropdown navbar-dark bg-dark">
        <a class="nav-link dropdown-toggle navbar-dark bg-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
          Listados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			
	<?php
		
				
$varUser=$_SESSION['usuario'];
				
$query1 = $mysqli -> query ("SELECT * FROM `PrUsuario` WHERE `usuario` LIKE '$varUser' ");


  while ($fila = mysqli_fetch_array($query1))
				
{
$varTipoUsuario = $fila['TipoUser'];
//echo $fila['usuario']." tipo: ".$fila['TipoUser'];

}
//mysqli_close($mysqli);	
	

if($varTipoUsuario==1){

$query1 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($fila1 = mysqli_fetch_array($query1))

{
$varClase = $fila1['Clase'];  
$varLink = 	$fila1['Link'];  
$varNombre = $fila1['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLink \">$varNombre</a>"	;
}
 	
 	

}
			
			
if($varTipoUsuario==2){

$queryForm2 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `TipoUserFK` = 2 AND `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($filaForm2 = mysqli_fetch_array($queryForm2))

{
$varClase = $filaForm2['Clase'];  
$varLinkForm2 = $filaForm2['Link'];  
$varNombreForm2 = $filaForm2['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLinkForm2 \"$varNombreForm2 </a>"	;
}		
}
			
if($varTipoUsuario==3){

$queryForm3 = $mysqli -> query ("SELECT * FROM `ComVistaPanel` WHERE `TipoUserFK` = 3 AND `Clase` LIKE 'Listado' ORDER BY `ComVistaPanel`.`Nombre` ASC");

  while ($filaForm3 = mysqli_fetch_array($queryForm3))

{
$varClase = $filaForm3['Clase'];  
$varLinkForm3 = $filaForm3['Link'];  
$varNombreForm3 = $filaForm3['Nombre'];
echo "<a class=\"dropdown-item \" style=\"color: white; background: grey;\" href=\"$varLinkForm3\">$varNombreForm3</a>"	;
}		
}			
 	
			
			
?>			
<a class="dropdown-item" style="color: white; background: grey;" href="../sistema/Listado/inventarioCom.php">Carga_Inventario1</a>
<a class="dropdown-item" style="color: white; background: grey;" href="../sistema/Listado/ListadoInventario.php">Listado_Inventario</a>
		  <a class="dropdown-item" style="color: white; background: grey;" href="../sistema/VistaOrganigrama.php">Organigrama</a>
      <a class="dropdown-item" style="color: white; background: grey;" href="../sistema/GraficoPersonal.php">GraficoPersonal</a>  
			<a class="dropdown-item" style="color: white; background: grey;" href="javascript:window.print()">Imprimir</a>
</li>	
		  
		  
		

	<!-- <li class="nav-item active">
        <a class="nav-link" href="#" style="color: white">ayuda <span class="sr-only">(current)</span></a>
      </li>	 -->
		
	<li class="nav-item active">
        <a class="nav-link" href="../../CerrarSession.php" style="color: white"> <?php echo "Cerrar ".$_SESSION['usuario'];  ?>
			<span class="sr-only">(current)</span></a>
      </li>	
				
		
    </ul>
  </div>
</nav>
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	</header>



	
</body>


</html>
