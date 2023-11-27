<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `VistMaquinaria` ORDER BY `VistMaquinaria`.`Maquina` ASC";
	$resultadoMaquina = mysqli_query($mysqli, $query);

if (!$resultadoMaquina) {
    die("Error");
}else{
    while($dataMaquina= mysqli_fetch_assoc($resultadoMaquina)){
$arreglo["data"][]=array_map("utf8_encode", $dataMaquina);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoMaquina);
//cerrar conexion
mysqli_close($mysqli);
    ?>