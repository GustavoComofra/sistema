<?php

	include ("../Conexion/conexion.php");

	$query = "SELECT * FROM `vistaCostoReclamo`;";
	$resultadoCostoReclamo = mysqli_query($mysqli, $query);

if (!$resultadoCostoReclamo) {
    die("Error");
}else{
    while($dataCostoReclamo= mysqli_fetch_assoc($resultadoCostoReclamo)){
$arreglo["data"][]=array_map("utf8_encode", $dataCostoReclamo);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoCostoReclamo);
//cerrar conexion
mysqli_close($mysqli);
    ?>