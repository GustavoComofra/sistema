<?php
$titulo="Prueba correo";
$mensaje="Mensaje de correo";
$para="gustavog@live.com.ar";
//$para="gustavog@live.com.ar";

$cabeceras = 'From: industrial@comofrasrl.com.ar>';
$enviado = mail($para, $titulo, $mensaje,$cabeceras);
?>
