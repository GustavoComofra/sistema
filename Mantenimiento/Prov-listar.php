<?php
include("../Conexion/conexion.php");
$query = "SELECT * FROM `Proveedor` LIMIT 20";
$result = mysqli_query($mysqli, $query);

    if(!$result){
        die('Error' . mysqli_error($mysqli));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)){
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
echo  $jsonstring;


?>