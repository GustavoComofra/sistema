<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$registro=mysqli_query($mysqli  ,"UPDATE `usersandroid` SET `name` = '$request->name', `password` = '$request->password ', `email` = '$request->email',
`rol` = '$request->rol' WHERE `usersandroid`.`id` = '$request->id';");


//UPDATE `users` SET `name` = '$request->name', `password` = '$request->password ', `email` = '$request->email', `rol` = '$request->rol' WHERE `users`.`id` = $request->id;

class Result{}

$response = new Result();
$response->resultado = 'OKM';
$response->mensaje ='usuario Modificado';

header('Content-Type: application/json');
echo json_encode($response);

?>
