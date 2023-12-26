<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `ComVerReclamo` ORDER BY `NumReclamo` DESC ;";
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