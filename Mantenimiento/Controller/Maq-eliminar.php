<?php
include("Conexion/conexion.php");


if(isset($_POST['idMaq'])){

    $idMaq=$_POST['idMaq'];

    $query = "DELETE FROM Maquinaria WHERE `Maquinaria`.`idMaq` = $idMaq";
    $result = mysqli_query($mysqli, $query);
    if(!$result){
    die('Error');
    }
    echo "Registro eliminado";
}



?>