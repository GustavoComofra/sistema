<?php
include("Conexion/conexion.php");
$idMaq= $_POST['idMaq'];

$json = array();
$query = "SELECT * FROM `Maquinaria` WHERE `idMaq` = $idMaq";
$result = mysqli_query($mysqli, $query);

if(!$result){
    die('Error');
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)){
        $json[] = array(
            'idMaq' => $row['idMaq'],
            'Maquina'=> $row['Maquina'],
            'Modelo'=> $row['Modelo'],
            'DiasManteni'=> $row['DiasManteni'],
            'Link'=> $row['Link'],


            'ProvedMaq' => $row['ProvedMaq'],
            'Fk_Clasi'=> $row['Fk_Clasi'],
            'ContMaq'=> $row['ContMaq'],
            'ValorMaq'=> $row['ValorMaq'],
            'ObsMaq'=> $row['ObsMaq'],

            'imgMaq'=> $row['imgMaq'],
        );
    }
   $jsonstring = json_encode($json[0]);
echo  $jsonstring;


?>