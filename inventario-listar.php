<?php
include('Conexion/conexion.php');
$query = "SELECT * FROM `vistaInventarioProduct` ORDER BY `vistaInventarioProduct`.`idInventario` DESC";
$result = mysqli_query($mysqli, $query);

    if(!$result){
        die('Error' . mysqli_error($mysqli));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)){
        $json[] = array(
            'idInventario' => $row['idInventario'],
            'CodCmg'=> $row['CodCmg'],
            'Producto'=> $row['Producto'],
            'Cantidad'=> $row['Cantidad'],
            'ObsInv'=> $row['ObsInv'],
            'FechaInventario'=> $row['FechaInventario']
        );
    }
   $jsonstring = json_encode($json);
echo  $jsonstring;
?>