<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Listado pedidos garantias</title>
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
	window.location.href = '/sistema/index.php';
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
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


<form action="#" method="post" name="formBuscarGarantia" >

<div align="">
  <table width="100%"  border="1">
    <tr>
      <td colspan="2" align="center"><label>Buscar</label></td>
    </tr>
    <tr>
      <th width="">Numero:</th>
      <td width=""><input name="txtId_gar" type="number" id="txtId_gar"/>
		</td>
	</tr>
    <tr>
	    <tr>
      <th width="">Serie:</th>
      <td width=""><input name="txtSerie" type="number" id="txtSerie"/>
		</td>
	</tr>

  <tr>
	    <tr>
      <th width="">Cliente:</th>
      <td width=""><input name="txtCliente" type="text" id="txtCliente" size="30"/>
		</td>
	</tr>
	  
    <tr>
	    <tr>
      <th width="">Telefono:</th>
      <td width=""><input name="txtTelefono" type="text" id="txtTelefono" size="30"/>
		</td>
	</tr>
	  
	
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
      </label>
			
		</td>
    </tr>
	</table>
	</div>

<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"10\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado Clientes</th>
 </thead>
</tr>
<TR>
<TD><B>Num</B></TD>
<TD><B>Serie</B></TD>
<TD><B>Cliente</B></TD>
<TD><B>Correo</B></TD>
<TD><B>Telefono</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>Contestacion</B></TD>
<TD><B>Obs</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Id_gar=$_POST['txtId_gar'];	
$Serie=$_POST['txtSerie'];	
$Cliente=$_POST['txtCliente'];	
$Telefono=$_POST['txtTelefono'];	
	
include("Conexion/conexion.php");	

$queryGarantiaB = $mysqli -> query ("SELECT * FROM `Garantia` WHERE `Id_gar` LIKE '%$Id_gar%' AND `Serie` LIKE '%$Serie%' AND `Cliente` LIKE '%$Cliente%' AND `Telefono` LIKE '%$Telefono%' ORDER BY `Garantia`.`Id_gar` DESC");

  
 while ($filaGarantiaB = mysqli_fetch_array($queryGarantiaB))

{
echo "<TR>\n";
echo "<td>".$filaGarantiaB['Id_gar']."</td>\n";
echo "<td>".$filaGarantiaB['Serie']."</td>\n";
echo "<td>".$filaGarantiaB['Cliente']."</td>\n";
echo "<td>".$filaGarantiaB['Correo']."</td>\n";
echo "<td>".$filaGarantiaB['Telefono']."</td>\n";	 
echo "<td>".$filaGarantiaB['Fecha']."</td>\n";
echo "<td>".$filaGarantiaB['FechaContestacion']."</td>\n";
echo "<td>".$filaGarantiaB['Observacion']."</td>\n";		 


echo "<td>"."<a href=\"/sistema/FormGaranConfir.php?Id_gar=".$filaGarantiaB['Id_gar']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormGarantiaBorrar.php?Id_gar=".$filaGarantiaB['Id_gar']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	</form>
	


    </div>
  </div>
</div>	

	
</body>
</html>