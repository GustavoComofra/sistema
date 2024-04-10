<?php
//http://localhost/ConexionAndroid/db.php

$host = "198.27.76.221";
$usr = "comofras_sistema";
$clave = "Comofra05!";
$db = "comofras_bdinterno";

/*
$host = "127.0.0.1";
$usr = "root";
$clave = "";
$db = "angularcon";*/

$mysqli = new mysqli($host,$usr,$clave,$db);


//$mysqli = new mysqli($host,$usr,$clave,$db);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
   // echo "conectado";
}

//echo $mysqli->host_info . "\n";

?>