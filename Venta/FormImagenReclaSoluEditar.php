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
<th colspan="4"   bgcolor="#5D81F5"><span class="">Imagenes solucion</th>

<TR>
<TD><B>Num</B></TD>
<TD><B>Solucion</B></TD>	
<TD><B>Edit</B></TD>	
<TD><B>Borrar</B></TD>	
</TR>
		
		<?php	
$NumReclamo=$_GET['NumReclamo'];
//echo $NumReclamo;

	
include("../Conexion/conexion.php");
$queryComImagenSoluRecl = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenSoluRecl = mysqli_fetch_array($queryComImagenSoluRecl))

	 
	 
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenSoluRecl['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenSoluRecl['ImagenSolu'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarSoluImagen.php?NumReclamo=".$filaComImagenSoluRecl['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenSoluRecl['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
}
	  
$queryComImagenSoluRecl1 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenSoluRecl1 = mysqli_fetch_array($queryComImagenSoluRecl1))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenSoluRecl1['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenSoluRecl1['ImagenSolu1'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarSoluImagen1.php?NumReclamo=".$filaComImagenSoluRecl1['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenSoluRecl1['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
	 
}	
	  
$queryComImagenSoluRecl2 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenSoluRecl2 = mysqli_fetch_array($queryComImagenSoluRecl2))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenSoluRecl2['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenSoluRecl2['ImagenSolu2'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarSoluImagen2.php?NumReclamo=".$filaComImagenSoluRecl2['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenSoluRecl2['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
echo "</TR>\n";
	 
}
	  
$queryComImagenSoluRecl3 = $mysqli -> query ("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = ".$NumReclamo."; ");
  
 while ($filaComImagenSoluRecl3 = mysqli_fetch_array($queryComImagenSoluRecl3))	  
	  
{

 
	 
echo "<TR>\n";
	 
echo "<td>".$filaComImagenSoluRecl3['NumReclamo']."</td>\n";
echo "<td>".'<img  src="'.$filaComImagenSoluRecl3['ImagenSolu3'].'" style="border-radius: " width="100" heigth="100"/>'."</td>\n";
echo "<td>"."<a href=\"/sistema/Venta/FormEditarSoluImagen3.php?NumReclamo=".$filaComImagenSoluRecl3['NumReclamo']."\"><img src=\"/sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 
	 
echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/#?NumReclamo=".$filaComImagenSoluRecl3['NumReclamo']."\"><img src=\"/sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n"; 	 
	 
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
