	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<meta charset="utf-8">
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Formulario proceso editar</title>
<link href="../sistema/css/estiloHome.css" rel="stylesheet" type="text/css">
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

    <?php
        include("Conexion/conexion.php");
        $id_proceso = $_GET['id_proceso'];
        //echo $id_proceso; 
        $queryproceso = $mysqli->query("SELECT * FROM `VisProceso` WHERE `id_proceso` = " . $id_proceso . ";");

        $rowproceso = mysqli_fetch_assoc($queryproceso);
                    

//Items Procesos
$id_proceso=$_POST['txtid_proceso'];
$Proceso=$_POST['txtProceso'];
$FechaInicio=$_POST['txtFechaInicio'];
$FechaFinal=$_POST['txtFechaFinal'];
$Producto=$_POST['listProducto'];
$Implemento=$_POST['listImplemento'];
$Plano=$_POST['txtPlano'];
$Observacion=$_POST['txtObservacion'];
$Baja=$_POST['txtBaja'];

$imgprod=$_POST['txtimgprod'];
echo "<td>"."<a href=\"/sistema/ListProceso.php\"><img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a></td>\n";


$EditarProceso = "UPDATE `Proceso` SET `Proceso` = '$Proceso',`ProductoProceso` = '$Producto',`Implemento` = '$Implemento', `FechaInicio` = '$FechaInicio', `FechaFinal` = '$FechaFinal', `imgprod` = '$imgprod',
`Plano` = '$Plano',  `Baja` = '$Baja' WHERE `Proceso`.`id_proceso` = '$id_proceso';";


$ejecutar_EditarProceso=mysqli_query($mysqli,$EditarProceso);

mysqli_close($mysqli);

?>

	
		
    </div>
  </div>
</div>		
	

	
</body>
</html>