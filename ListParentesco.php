<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<script src="../dir/js/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="../dir/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Listado Parentesco</title>
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
		
 <form name="formEstudios" method="post" action="/sistema/ListParentesco.php">
    <p>
   <label for="txtNombreApellido">Nombre Apellido:</label>
      <input name="txtNombreApellido" type="text" id="txtNombreApellido" size="50">
    </p>
    <p>
   <label for="txtApellidos">Apellido:</label>
      <input name="txtApellidos" type="text" id="txtApellidos" size="35">
	  <label for="txtParentesco">Parentesco:</label>
   <input name="txtParentesco" type="text" id="txtParentesco" value="" size="35">
   <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Buscar" />	
	  </p>
 
		
<?php
	
$Cuil_Pers=$_POST['txtCuil_Pers'];	
 echo $Cuil_Pers;
$NombreApellido=$_POST['txtNombreApellido'];	
$Apellidos=$_POST['txtApellidos'];
$Parentesco=$_POST['txtParentesco'];

echo "
</tr>
<TR>
<h3>Parentescos<h3>
<TD><B>Num</B></TD>
<TD><B>NombreApellido</B></TD>
<TD><B>FechaNac</B></TD>
<TD><B>Edad</B></TD>
<TD><B>Apellidos</B></TD>
<TD><B>Parentesco</B></TD>
<TD><B>Cuil</B></TD>
<TD><B>Nuevo</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";
	
	
include("Conexion/conexion.php");	
$queryComEstudPersonal = $mysqli -> query ("SELECT * FROM `ComVistParentesco` WHERE `NombreApellido` LIKE '%$NombreApellido%' AND `Parentesco` LIKE '%$Parentesco%' 
AND `Apellidos` LIKE '%$Apellidos%' ORDER BY `ComVistParentesco`.`NombreApellido` ASC");
  
 while ($filaComParentesco = mysqli_fetch_array($queryComEstudPersonal))

{
echo "<TR>\n";
echo "<td>".$filaComParentesco['idConvive']."</td>\n";
$varidConvive=$fila['idConvive'];
echo "<td>".$filaComParentesco['NombreApellido']."</td>\n";
echo "<td>".$filaComParentesco['FechaNac']."</td>\n";
$varNac = $filaComParentesco['FechaNac'];	
$Dia = date("Y-m-d");
$varEdad= $Dia-$varNac;
echo "<td>".$varEdad."</td>\n";
echo "<td>".$filaComParentesco['Apellidos']."</td>\n";	
echo "<td>".$filaComParentesco['Parentesco']."</td>\n";	 
echo "<td>".$filaComParentesco['Cuil_Pers']."</td>\n";	


echo "<td>"."<a href=\"/sistema/FormNueParenteco.php?Cuil_Pers=".$filaComParentesco['Cuil_Pers']."\"><img src=\"../sistema/img/NuevoIcono.png\" alt=\"BtnIconoNuevo\" width=\"20\" height=\"20\"></a></td>\n";

echo  "<td>"."<a href=\"/sistema/FormEdtParenteco.php?idConvive=".$filaComParentesco['idConvive']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
echo  "<td>"."<a href=\"/sistema/FormBorrParenteco.php?idConvive=".$filaComParentesco['idConvive']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoBorrar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
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