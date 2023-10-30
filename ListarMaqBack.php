<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `Maquinaria` WHERE `Activo` LIKE 'Si'";
	$resultadoMaquinaria = mysqli_query($mysqli, $query);

if (!$resultadoMaquinaria) {
    die("Error");
}else{
    while($dataMaquinaria= mysqli_fetch_assoc($resultadoMaquinaria)){
$arreglo["data"][]=array_map("utf8_encode", $dataMaquinaria);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoMaquinaria);
//cerrar conexion
mysqli_close($mysqli);
    ?>