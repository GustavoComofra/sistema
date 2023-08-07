<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/LogoPaginaIdearSF.png" rel="icon" type="image/png">
 <title>Titulo</title>
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
	window.location.href = "/RRHH/index.php";
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
<form>
	
	
<?php
$checktodos=$_POST['checktodos[]'];
$checktodos1=$_POST['checktodos1[]'];

/*$CantidadSeleccionados = count($checktodos1, COUNT_RECURSIVE);
echo $CantidadSeleccionados;*/

$CUIT_Empl1=$_POST['txtCUIT_Empl1'];
	
$checktodosDia=$_POST['checktodos[Dia]'];
$CUIT=$_POST['txtCUIT_Empl'];	

	//echo "Cantidad CUIT: ".$selected1;
/*$selected2 = $_POST['checktodos1[]'];
	
for($i = 0; $i < sizeof($selected2);$i++)
  {
echo "Cantidad CUIT ".$selected1;
  } 

$CantCuit = (sizeof($selected1));
echo "CantCuit".$CantCuit."<br>";*/	
	
/*for($i = 0; $i < count($CUIT_Empl1);$i++)
  {

  }	*/
		//echo $CUIT_Empl1."<br>";


	
	
	
foreach($_POST['checktodos'] as $checktodos)	
  {
	
echo $CUIT_Empl1.",".$checktodos."<br>";
include("Conexion/conexion.php");			
$insertarCopiaComHorarioTeorico = "INSERT INTO `ComHorarioTeorico` (`idComHoraTeor`, `CuitTeor`, `Times`, `DiaTeor`, `DiaIngrTeor`, `DiaSalTeor`, `TipoHora`, `FkTipoHorario`) VALUES (NULL, $checktodos);";
$ejecutar_insertar1=mysqli_query($mysqli,$insertarCopiaComHorarioTeorico);	
  }
//http://planidear.com.ar/RRHH/ListCatgSueldo.php
echo "<td>"."<a href=\"/RRHH/ListHorTeor.php\" ><img src=\"../RRHH/img/HoraTeoricoIcono1.png\" width=\"20\" height=\"20\" </a></td>\n";

?>

	
</form>
</div>
  </div>
</div>	

	
</body>
</html>