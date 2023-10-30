<?php
	
	require 'phpqrcode/qrlib.php';
	
	$dir = 'temp/';
	
	if(!file_exists($dir))
		mkdir($dir);
	
	$filename = $dir.'test.png';
	
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = 'http://www.codigosdeprogramacion.com';

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
	
	echo '<img src="'.$contenido.'" />';
	echo "prueba".$filename;

?>