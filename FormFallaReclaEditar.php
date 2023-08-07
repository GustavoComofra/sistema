<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container-fluid">
  <div class="row">

  <!--  <div class="col col-lg-2">-->
	<?php	
//include ("MarcoCentral.php");

?>	


		

	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group" align="">
	

 <table width="" border="" class="table table-striped">
<th colspan="7" align="center" bgcolor="#5D81F5"><span class="">Fallas</th>

<TR>
<TD><B>Id</B></TD>
<TD><B>Num</B></TD>
<TD><B>ItemFalla</B></TD>	
<TD><B>Detalle</B></TD>
<TD><B>Edit</B></TD>	
<TD><B>Borrar</B></TD>	
<TD><B>Nuevo</B></TD>	
</TR>
		
		<?php	
$NumReclamo=$_GET['NumReclamo'];
//echo $NumReclamo;

	
include("Conexion/conexion.php");
$queryComVistFallaRecl = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Fk_NumRecl` = '$NumReclamo' ORDER BY `ComVistaItemFalla`.`Tipo_Falla` ASC");
  
 while ($filaComVistFallaRecl = mysqli_fetch_array($queryComVistFallaRecl))

	 
	 
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComVistFallaRecl['Id_FallaRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl['Fk_NumRecl']."</td>\n";
echo "<td>".$filaComVistFallaRecl['ItemFalla']."</td>\n";	 
echo "<td>".$filaComVistFallaRecl['Detalle']."</td>\n";	

echo "<td>"."<a href=\"/sistema/FormEditarItemFalla.php?Id_FallaRecl=".$filaComVistFallaRecl['Id_FallaRecl']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormBorrarItemFalla.php?Id_FallaRecl=".$filaComVistFallaRecl['Id_FallaRecl']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "<td>"."<a href=\"/sistema/FormNuevoItemFalla.php?Id_FallaRecl=".$filaComVistFallaRecl['Id_FallaRecl']."\"><img src=\"../sistema/img/NuevoIcono.png\" alt=\"HoraTeorico\" width=\"20\" height=\"20\"></a></td>\n";

echo "</TR>\n";
	 
}
	

mysqli_close($mysqli);
	

?>	
	</table>

		 

</div>
</form>

    <!--</div>-->
  </div>
</div>	




</body>
</html>
