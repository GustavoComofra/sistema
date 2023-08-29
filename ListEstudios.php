<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Listado estudios</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

</script>
</head>
<body>
	
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>	


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
<table border=1 align="" class="table table-striped">
  <thead>
<tr>
	 </thead>
<td colspan="10" align="Left" bgcolor=#5D81F5>
		
 <form name="formEstudios" method="post" action="/sistema/ListEstudios.php">
    <p>

    <label for="txtCuit">Cuit:</label>
   <input name="txtCuit" type="text" id="txtCuit" size="11" >
    </p>
    <p>
   <label for="txtNombre">Nombre:</label>
      <input name="txtNombre" type="text" id="txtNombre" size="35">
	  <label for="txtApellido">Apellido:</label>
   <input name="txtApellido" type="text" id="txtApellido" value="" size="35">
	  </p>
 <p> 
  <label for="txtEstudioPersonal">Estudio Personal</label>
   <input name="txtEstudioPersonal" type="text" id="txtEstudioPersonal" value="" size="35">
   <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Buscar" />	
    </p>




 
		
<?php
	
$Cuit=$_POST['txtCuit'];	
 echo $Cuit;
$Nombre=$_POST['txtNombre'];
$Apellido=$_POST['txtApellido'];
$EstudioPersonal=$_POST['txtEstudioPersonal'];

echo "
</tr>
<TR>
<h3>Estudios<h3>
<TD><B>Id</B></TD>
<TD><B>Cuit</B></TD>
<TD><B>Nombres</B></TD>
<TD><B>Apellidos</B></TD>
<TD><B>EstudioPersonal</B></TD>
<TD><B>Estado</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Nuevo</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";
	
	
include("Conexion/conexion.php");	
$queryComEstudPersonal = $mysqli -> query ("SELECT * FROM `ComVistaEstuEmp` WHERE `CUIT_Empl` LIKE '%$Cuit%' AND `Nombres` LIKE '%$Nombre%' AND `Apellidos` LIKE '%$Apellido%' AND `EstudioPersonal` LIKE '%$EstudioPersonal%'
ORDER BY `CUIT_Empl` ASC");
  
 while ($filaComEstudPersonal = mysqli_fetch_array($queryComEstudPersonal))

{
echo "<TR>\n";
echo "<td>".$filaComEstudPersonal['IdEstudPersonal']."</td>\n";
echo "<td>".$filaComEstudPersonal['CUIT_Empl']."</td>\n";
$varCuit=$fila['CUIT_Empl'];
echo "<td>".$filaComEstudPersonal['Nombres']."</td>\n";
echo "<td>".$filaComEstudPersonal['Apellidos']."</td>\n";	 
echo "<td>".$filaComEstudPersonal['EstudioPersonal']."</td>\n";	
echo "<td>".$filaComEstudPersonal['Estado']."</td>\n";	
echo "<td>".$filaComEstudPersonal['Obs']."</td>\n";	

echo "<td>"."<a href=\"/sistema/FormNueEstuPers.php?CUIT_Empl=".$filaComEstudPersonal['CUIT_Empl']."\"><img src=\"../sistema/img/NuevoIcono.png\" alt=\"BtnIconoNuevo\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/FormEdtEstuPers.php?IdEstudPersonal=".$filaComEstudPersonal['IdEstudPersonal']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"EditIcono\" width=\"20\" height=\"20\"></a></td>\n";

echo "<td>"."<a href=\"/sistema/FormBorrEstuPers.php?IdEstudPersonal=".$filaComEstudPersonal['IdEstudPersonal']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BorrarIcono\" width=\"20\" height=\"20\"></a></td>\n";

	 
echo "</TR>\n";
}
	 
	 
mysqli_close($mysqli);
	





?>		
	  </form>	
</td>
</tr>
	</table>	
    </div>
	</div>
</div>	

	
</body>
</html>