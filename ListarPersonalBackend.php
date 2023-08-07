<?php

	include ("Conexion/conexion.php");

	$query = "SELECT * FROM `ComVistaEmpleado1` WHERE  `Aprobado` NOT LIKE 'No'  ORDER BY `ComVistaEmpleado1`.`Apellidos` ASC;";
	$resultadoPersonal = mysqli_query($mysqli, $query);

if (!$resultadoPersonal) {
    die("Error");
}else{
    while($dataPersonal= mysqli_fetch_assoc($resultadoPersonal)){
$arreglo["data"][]=array_map("utf8_encode", $dataPersonal);
    }
   echo json_encode($arreglo);
}
//liberar memoria
mysqli_free_result($resultadoPersonal);
//cerrar conexion
mysqli_close($mysqli);
    ?>