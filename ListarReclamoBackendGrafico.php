
<?php

include ("Conexion/conexion.php");
/*
 	$query = "SELECT * FROM `ComVistCuentaImpRecl`;";
 	$resultadoReclamo = mysqli_query($mysqli, $query);

 if (!$resultadoReclamo) {
     die("Error");
 }else{
     while($dataReclamo= mysqli_fetch_assoc($resultadoReclamo)){
 $arregloGrafico[]=$dataReclamo;
     }
    echo json_encode($arregloGrafico);
 }
 //liberar memoria
 mysqli_free_result($resultadoReclamo);
 //cerrar conexion
 mysqli_close($mysqli);
*/
$query = $mysqli -> query ("SELECT * FROM `ComVistCuentaImpRecl1`;");
  
 while ($fila = mysqli_fetch_array($query))

{
//https://parzibyte.me/blog/2021/01/04/graficas-chart-js-ajax-php/

echo "json_encode([$fila[Implemento])";
echo "json_encode([$fila[CuentaImp])";
$varCuentaImp =[$fila['CuentaImp']];
$respuesta = [
    "etiquetas" => $varEtiqueta,
    "datos" => $varCuentaImp,
];
echo "etiquetas".json_encode($varEtiqueta)."datos".json_encode($varCuentaImp);
}


echo "<tr>";
//echo $varEtiqueta;
// Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
$etiquetas = [$varEtiqueta];
$datosVentas = [$varCuentaImp];
// Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
$respuesta1 = [
    "etiquetas" => $etiquetas,
    "datos" => $datosVentas,
];
//echo json_encode($respuesta1);
    ?>