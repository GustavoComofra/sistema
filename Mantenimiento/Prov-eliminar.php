<?php
include("../Conexion/conexion.php");

if(isset($_POST['IdProv'])){

    $IdProv=$_POST['IdProv'];

    $query = "DELETE FROM Proveedor WHERE `Proveedor`.`IdProv` = $IdProv";
    $result = mysqli_query($mysqli, $query);
    if(!$result){
    die('Error');
    }
    echo "Registro eliminado";
}



?>