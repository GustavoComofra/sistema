<?php

include("../Conexion/conexion.php");

	$query = "SELECT * FROM `vistaInventarioProduct` WHERE `ActCMG` LIKE 'No'  AND `FechaInventario`  >= '2024-09-01 10:23:16' ORDER BY `idInventario` DESC;";

    
	$resultadoInventario = mysqli_query($mysqli, $query);

if (!$resultadoInventario) {
    die("Error");
}else{
    while($dataInventario= mysqli_fetch_assoc($resultadoInventario)){
$arreglo["data"][]=array_map("utf8_encode", $dataInventario);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoInventario);
//cerrar conexion
mysqli_close($mysqli);
    ?>