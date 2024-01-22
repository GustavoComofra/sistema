<?php
	include ("../../Conexion/conexion.php");
$search = $_POST['search'];
if(!empty($search)){
    $query = "SELECT * FROM `Maquinaria` WHERE `Maquina` LIKE '%$search%'";

    $resul = mysqli_query($mysqli, $query);
    if(!$resul){
        die('Error' . mysqli_error($mysqli));
    }else{
        
    }

    $json = array();
    while ($row = mysqli_fetch_array($resul)){
        $json[] = array(
            'idMaq' => $row['idMaq'],
            'Maquina'=> $row['Maquina'],
            'Modelo'=> $row['Modelo'],
            'DiasManteni'=> $row['DiasManteni'],
            'Link'=> $row['Link'],
            'imgMaq'=> $row['imgMaq'],
        );
    }
   $jsonstring = json_encode($json);
   echo $jsonstring;
}else {

}


?>