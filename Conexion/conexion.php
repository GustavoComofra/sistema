 <?php
$host = "198.27.76.221";
$usr = "comofras_sistema";
$clave = "Comofra05!";
$db = "comofras_bdinterno";

$mysqli = new mysqli($host,$usr,$clave,$db);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>