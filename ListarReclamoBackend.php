
<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `ComVisReclamo` WHERE `Sup` LIKE 'No' ORDER BY `ComVisReclamo`.`IdReclamo` DESC;";
	$resultadoReclamo = mysqli_query($mysqli, $query);

if (!$resultadoReclamo) {
    die("Error");
}else{
    while($dataReclamo= mysqli_fetch_assoc($resultadoReclamo)){
$arreglo["data"][]=array_map("utf8_encode", $dataReclamo);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoReclamo);
//cerrar conexion
mysqli_close($mysqli);
    ?>