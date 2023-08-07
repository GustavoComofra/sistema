<body>
<div class="spinner-border" style="width: 10rem; height: 10rem;" role="status">
<img class="" href="index.html" src="img/loading.gif" width="150" height="150" style="border-radius: 50% 50%;"  alt="Imagen logo"/> 
  <span class="visually-hidden">Cargando...</span>
</div>


</body>

<?php

session_start();
$Usuario=$_POST['txtUsuario'];
$_SESSION['usuario']= $Usuario; 

$host = "198.27.76.221";
$usr = "comofras_sistema";
$clave = "Comofra05!";
$db = "comofras_bdinterno";


$mysqli = new mysqli($host,$usr,$clave,$db);
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
window.location.href = \"/sistema/panel.php\";
</script>";

            }

				

?>