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


		

	
<form action="#" method="post" name="formFallaReclamo" enctype="multipart/form-data">

<div class="form-group"  >
	

 <table width=""   class="table table-striped">
<th colspan="4"   bgcolor="#5D81F5"><span class="">Imagenes</th>

<TR>
<TD><B>Num</B></TD>
<TD><B>Imagenes</B></TD>	
<TD><B>Edit</B></TD>	
<TD><B>Borrar</B></TD>	
</TR>
		
		<?php	
$NumReclamo=$_GET['NumReclamo'];
//echo $NumReclamo;

	
include("../Conexion/conexion.php");
$queryComImagenRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenRecl = mysqli_fetch_array($queryComImagenRecl))

{

	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenRecl['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenRecl['Imagen'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarImagen.php?NumReclamo=".$filaComImagenRecl['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenRecl['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
}
	  
$queryComImagenRecl1 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenRecl1 = mysqli_fetch_array($queryComImagenRecl1))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenRecl1['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenRecl1['Imagen1'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarImagen1.php?NumReclamo=".$filaComImagenRecl1['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenRecl1['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
}	
	  
$queryComImagenRecl2 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenRecl2 = mysqli_fetch_array($queryComImagenRecl2))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenRecl2['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenRecl2['Imagen2'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarImagen2.php?NumReclamo=".$filaComImagenRecl2['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenRecl2['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
}
	  
$queryComImagenRecl3 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenRecl3 = mysqli_fetch_array($queryComImagenRecl3))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenRecl3['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenRecl3['Imagen3'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarImagen3.php?NumReclamo=".$filaComImagenRecl3['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenRecl3['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
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
