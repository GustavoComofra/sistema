<?php
include('../Conexion/conexion.php');

$idInventario= $_POST['idInventario'];

$json = array();
$query = "SELECT * FROM `Inventario` WHERE `idInventario` = '$idInventario'";
$result = mysqli_query($mysqli, $query);

if(!$result){
    die('Error unico');
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)){
        $json[] = array(
            'idInventario' => $row['idInventario'],
            'CodCmg'=> $row['CodCmg'],
            'Cantidad'=> $row['Cantidad'],
            'ObsInv'=> $row['ObsInv'],
           
        );
    }
   $jsonstring = json_encode($json[0]);
echo  $jsonstring;





?>