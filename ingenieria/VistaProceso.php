<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

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
.imgEfc{
  position: relative;
  width: 50px;
  height: 50px;

}
.imgPrincipal{
  position: relative;
  width: 650px;
  height: 300px;

}
.imgEfcProcesoChico{
  border-radius: 10% 10%;
  border-radius: 10% 10%;
  height: 50px;
  width: 100px;
  object-fit: cover;
  
}

.imgEfcProcesoMediano{
  border-radius: 10% 10%;
  border-radius: 10% 10%;
  height: 100px;
  width: 200px;
  object-fit: cover;
  
}

.imgEfcProcesoGrande{
  border-radius: 10% 10%;
  height: 100px;
  width: 300px;
  object-fit: cover;


}
.Advertencia{
  color: red;
}

.algCentral{
  text-align: center;
  align-items: center;
  align-content: center;
}

</style>

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

	<title>Nuevo Personal</title>
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

$id_proceso=$_GET['id_proceso'];
$varid_proceso = $id_proceso=$_GET['id_proceso'];
$queryvarid_proceso = $mysqli -> query ("SELECT * FROM `VisProceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoproceso = mysqli_fetch_assoc($queryvarid_proceso);

$id_procesouser=$_GET['id_proceso'];
$queryvarid_procesUser = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoprocesoUser = mysqli_fetch_assoc($queryvarid_procesUser);



?>
    </div>
<div class="container">
  <div class="row">


     <table class="table table-bordered">
      <tr>
        <td class="algCentral"><img src="../img/Logotipo2023.JPG" alt="Logo" width="180" height="60"></td>
        <td ><h3 class="algCentral"><strong class="algCentral">  Estudio de Metodos y Tiempos</strong></h3></td>
        <td >
        <p>I.07.19 / Rev.01</p>
        <p>Fecha: <?php echo $rowprocesoproceso['FechaInicio']; ?></p>
        <p>Realizo: <?php echo $rowprocesoprocesoUser['user']; ?>/ Valida: <?php echo $rowprocesoprocesoUser['Valida']; ?></p>
      </td>
      </tr>
  
      </tr>
<tr>
  <td>
  <h5><strong>Cod: </strong><?php echo $rowprocesoproceso['ProductoProceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Producto: </strong><?php echo $rowprocesoproceso['Producto']; ?></h5>
  </td>
  <td>
    <h5><strong>Implemento: <?php echo $rowprocesoprocesoUser['Implemento']; ?></strong></h5>
  </td>
</tr>

<tr>
  <td >
  <h5> <strong>Num: </strong><?php echo $rowprocesoproceso['id_proceso']; ?></h5>
  </td>
  <td>
  <h5> <strong>Proceso: </strong><?php echo $rowprocesoproceso['Proceso']; ?></h5>
  </td>

</tr>
<figure></figure>
<!-- <tr colspan="4"> -->
<td colspan="3" class="algCentral">
<?php
echo '<img class="imgPrincipal"  src="'.$rowprocesoproceso['imgprod'].'"/>';
?>
</td>

    
<tr>
     <table class="table table-striped">
  <thead>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">ItemProceso</th>
      <th scope="col"><p>Cant</p>
      <p>op</p></th>
      <th scope="col">img</th>
      <th scope="col">Min</th>
      <th scope="col">Total</th>
      <!-- <th scope="col">Prod</th> -->
      <th scope="col">Herr</th>
      <th scope="col">Adver</th>
      <th scope="col">Ok</th>
    </tr>
  </thead>
  <tbody>

<?php 
  $queryItemproceso = $mysqli -> query ("SELECT * FROM `VistItemProceso` WHERE `Fk_Proceso` =".$id_proceso." ORDER BY `VistItemProceso`.`Op` ASC;");
    while ($filaItemproceso = mysqli_fetch_array($queryItemproceso))
  {
   echo "<TR>\n"; 
 echo "<td>".$filaItemproceso['Op']."</td>\n";
 echo "<td>".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['CantOper']."</td>\n";
$varExisteImagen = $filaItemproceso['img_itemproce'];
if ($varExisteImagen=="http://interno.comofrasrl.com.ar/sistema/" OR $varExisteImagen=="http://interno.comofrasrl.com.ar/sistema/img/procesos/" OR $varExisteImagen=="https://interno.comofrasrl.com.ar/sistema/img/procesos/") {
 
  echo "<td>"."-"."</td>\n";
}else{


  if($filaItemproceso['tamanio']=="Grande"){
    echo "<td class=\"imgEfcProcesoGrande\">".'<img class="img-responsive img-thumbnail img-fluid"  src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="400" heigth="300"/>'."</td>\n";
   }else if($filaItemproceso['tamanio']=="Mediano"){
    echo "<td class=\"imgEfcProcesoMediano\">".'<img class="img-responsive img-thumbnail" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="200" heigth="100"/>'."</td>\n";
   }else{
    echo "<td class=\"imgEfcProcesoChico\">".'<img class="img-responsive img-thumbnail" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="100" heigth="50"/>'."</td>\n";
   }
}

 echo "<td>".$filaItemproceso['TiempoEstandarMi']."</td>\n";
 $varTotal=($filaItemproceso['TiempoEstandarMi']*$filaItemproceso['CantOper']);
 
 echo "<td>".$varTotal." Min"."</td>\n";

 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	 
 echo "<td style='border: 1px;'>".""."</td>\n";
 
 $varSumaMin +=$varTotal;
 $varSumaHor +=($varTotal/60);
 $varSumaHor_number = number_format($varSumaHor, 2, '.', '');
 echo "</TR>\n";

 }
 echo "<td>"."<strong>"."Totales"."</strong>"."</td>\n";
 echo "<td>"."</td>\n";
 echo "<td>"."</td>\n";

  echo "<td>"."</td>\n";
  echo "<td>"."</td>\n";
  echo "<td>"."<strong>".$varSumaMin." Min"."</strong>"."</td>\n";
  echo "<td>"."<strong>".$varSumaHor_number." Hr"."</strong>"."</td>\n";
  echo "<td>"."</td>\n";
  echo "<td>"."</td>\n";
 ?>

   </tbody>
</table> 
</tr> </table>

</div>

</div>	

<?php

include("../Conexion/conexion.php");
//Validar proceso
$id_proceso=$_POST['txtid_proceso'];
$FechaValidacion=$_POST['txtFechaValidacion'];
$Valida=$_POST['txtValida'];

if (!$Valida == null) {
$EditarValidaProceso = "UPDATE `Proceso` SET `Valida` = '$Valida', `FechaValidacion` = '$FechaValidacion' WHERE `Proceso`.`id_proceso`  = '$id_proceso';";


$ejecutar_EditarValidaProceso=mysqli_query($mysqli,$EditarValidaProceso);

mysqli_close($mysqli);
echo "<a href=\"/sistema/ingenieria/ListProceso.php\"><img src=\"../img/BtnVolver.png\" alt=\"BtnVolver\" width=\"60\" height=\"40\"></a>";
}

?>

<?php 

$varPlano = $rowprocesoproceso['ProductoProceso']; 

$queryvarProcePlano = $mysqli -> query ("SELECT * FROM `productoscmg` WHERE `CodSistema` = '$varPlano';");
$rowProcePlano = mysqli_fetch_assoc($queryvarProcePlano);
if($rowProcePlano['Plano'])
{
 
  $varPlano =  $rowProcePlano['Plano'];

echo "
<div class=\"container\">

<iframe src=\"$varPlano/preview\" width=\"90%\" height=\"1000px\" ></iframe>
</div>
";

}
else
{
  echo "
  <div class=\"container\">
  
  <h2>No hay plano asignado al producto</h2>
  </div>
  ";
}
?>

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