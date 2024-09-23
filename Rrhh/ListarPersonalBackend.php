<?php
include("../Conexion/conexion.php");

$query = "SELECT * FROM `ComVistaEmpleado1` WHERE  `Aprobado` NOT LIKE 'No'  ORDER BY `ComVistaEmpleado1`.`Apellidos` ASC;";
$resultadoPersonal = mysqli_query($mysqli, $query);

if (!$resultadoPersonal) {
    die("Error en la consulta");
} else {
    $arreglo["data"] = array();
    while ($dataPersonal = mysqli_fetch_assoc($resultadoPersonal)) {
        // No es necesario convertir los datos a UTF-8 si ya están en ese formato en la base de datos
        $arreglo["data"][] = $dataPersonal;
    }
    // Liberar memoria
    mysqli_free_result($resultadoPersonal);
    // Cerrar conexión
    mysqli_close($mysqli);
    
    // Enviar respuesta JSON sin modificar los datos
    echo json_encode($arreglo);
}
?>
