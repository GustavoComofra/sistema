<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `Proceso` WHERE `Baja` LIKE 'No' AND `FechaValidacion` = '0000-00-00' ORDER BY `Proceso`.`id_proceso` DESC ;";
	$resultado = mysqli_query($mysqli, $query);

if (!$resultado) {
    die("Error");
}else{
    while($dataProceso= mysqli_fetch_assoc($resultado)){
$arreglo["data"][]=array_map("utf8_encode", $dataProceso);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultado);
//cerrar conexion
mysqli_close($mysqli);
    ?>