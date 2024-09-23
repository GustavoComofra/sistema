<?php

include("../Conexion/conexion.php");

// Obtener el primer día del mes y año actual
$fechaInicioMes = date('Y-m-01 00:00:00'); // Formato: YYYY-MM-01 00:00:00

session_start();
$varCerrarSession = $_SESSION['usuario'];

$query = "SELECT * FROM `visInveProdStock` WHERE `UsuarioInventario` LIKE '$varCerrarSession' AND `FechaInventario`  >= '2024-09-01 10:23:16' ORDER BY `visInveProdStock`.`idInventario` DESC";
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
            'UM'=> $row['UM'],
            'Cantidad'=> $row['Cantidad'],

'CantidadStock'=> $row['CantidadStock'],
'Acumulado'=> $row['Acumulado'],
'Importe'=> $row['Importe'],
'Almacen'=> $row['Almacen'],

            'ObsInv'=> $row['ObsInv'],
            'FechaInventario'=> $row['FechaInventario']
        );
    }
   $jsonstring = json_encode($json);
echo  $jsonstring;
?>