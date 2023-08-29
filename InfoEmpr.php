<?php

session_start();
$Usuario=$_POST['txtUsuario'];
$_SESSION['usuario']= $Usuario; 


$mysqli = new mysqli("168.197.48.110","c2110488_PrIspc","98movadoDO","c2110488_PrIspc");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$Usuario=$_POST['txtUsuario'];			
$Clave=$_POST['txtClave'];
$query = $mysqli -> query ("SELECT * FROM `PrUsuario` WHERE `Clave` LIKE '$Clave' AND `usuario` LIKE '$Usuario'");
		
            $filas = mysqli_num_rows($query);

            // Comparo cantidad de registros encontrados
            if($filas == 0){
echo "<script>alert('Error: usuario y/o clave incorrectos!!');</script>";
echo "<script type=\"text/javascript\">
window.location.href = \"/sistema/index.php\";
</script>";	
				
            }else{

echo "<script type=\"text/javascript\">
window.location.href = \"../sistema/header.php\";
</script>";

            }

				

?>