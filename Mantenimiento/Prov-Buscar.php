<?php
include("../Conexion/conexion.php");
$search = $_POST['search'];
if(!empty($search)){
    //$query = "SELECT * FROM `Maquinaria` WHERE `Maquina` LIKE '%$search%'";
    $query = "SELECT * FROM `Proveedor` WHERE `Proveedor` LIKE '%$search%' OR `Direccion` LIKE '%$search%' OR `Email` LIKE '%$search%' OR `Contacto` LIKE '%$search%'";

    

    $resul = mysqli_query($mysqli, $query);
    if(!$resul){
        die('Error' . mysqli_error($mysqli));
    }else{
        
    }

    $json = array();
    while ($row = mysqli_fetch_array($resul)){
        $json[] = array(
            'IdProv' => $row['IdProv'],
            'Proveedor'=> $row['Proveedor'],
            'Direccion'=> $row['Direccion'],
            'Fk_Localidad'=> $row['Fk_Localidad'],
            'FK_Provincia'=> $row['FK_Provincia'],
            'Telefono'=> $row['Telefono'],

            'Email'=> $row['Email'],
            'Contacto'=> $row['Contacto'],
            'Activo'=> $row['Activo'],
            'ObsProv'=> $row['ObsProv'],
        );
    }
   $jsonstring = json_encode($json);
   echo $jsonstring;
}else {

}


?>