<?php
include('Conexion/conexion.php');
//$search = $_POST['app-form'];
//echo $search=$_POST['nombre'];
if(isset($_POST['id'])){

    $idInventario= $_POST['id'];

    $query = "DELETE FROM Inventario WHERE `Inventario`.`idInventario` = $idInventario";
    $result = mysqli_query($mysqli, $query);
    if(!$result){
    die('Error');
    }
    echo "Registro eliminado";
}





?>