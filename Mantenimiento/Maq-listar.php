<?php
include('Conexion/conexion.php');
session_start();
$varCerrarSession = $_SESSION['usuario'];

$query = "SELECT * FROM `vistaInventarioProduct` WHERE `UsuarioInventario` LIKE '$varCerrarSession' ORDER BY `vistaInventarioProduct`.`idInventario` DESC";
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