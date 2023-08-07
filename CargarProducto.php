<?php

if(isset($_POST['txtbusca'])):
    include ("conexionProducto.php");	

    $prod=new ApptivaDB();
    $u=$prod->buscar("Productos", "`Producto` like '%".$_POST['txtbusca']."%'");
    $html="";
    foreach ($u as $v)
    $html.="<p>".$v['Producto']."</p>";
    echo $html;
else:
    echo "Error";
endif;

?>
