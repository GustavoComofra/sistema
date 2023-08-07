<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');

include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$ListUsuario=mysqli_query($mysqli ,"SELECT * FROM `usersandroid`");
$vec=[];
while($reg=mysqli_fetch_array($ListUsuario)){
    $vec[]=$reg;
}
$cad = json_encode($vec);
echo $cad;

?>
