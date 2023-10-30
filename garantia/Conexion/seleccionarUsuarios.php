<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$registro=mysqli_query($mysqli ,"SELECT * FROM `users` WHERE `users`.`id` = $_GET[id]");


if($reg=mysqli_fetch_array($registro)){
  $vec[]=$reg;
}

$cad = json_encode($vec);
echo $cad;


/*header('Content-Type: application/json');
echo json_encode($response);*/

?>
