<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
 <title>Cliente</title>
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
				<?php
	$Id_ItemFalla=$_GET['Id_ItemFalla'];
echo $Id_ItemFalla; 
$queryItemFalla = $mysqli -> query ("SELECT * FROM `ComItemFalla` WHERE `Id_ItemFalla` = ".$Id_ItemFalla.";");

$rowItemFalla = mysqli_fetch_assoc($queryItemFalla);
		?>
		
		
		
    </div>
    <div class="col-md-auto">

<form action="#" method="post" name="formItemsFalla" enctype="multipart/form-data">

<div align="">
  <table width="100%"  border="">
    <tr>
      <td colspan="2" align="center"><label>Items Falla</label></td>
    </tr>
	  
    <tr>
      <th width="">Id:</th>
      <td width=""><input name="txtId_ItemFalla" type="text" id="txtId_ItemFalla" size="50" value="<?php print $rowItemFalla['Id_ItemFalla'];?>"/>
		</td>
    </tr>	  
	  
    <tr>
      <th width="">Item:</th>
      <td width=""><input name="txtItemFalla" type="text" id="txtItemFalla" size="50" value="<?php print $rowItemFalla['ItemFalla'];?>"/>
		</td>
    </tr>
	  
 <tr>
      <th width="">Tipo Falla:</th>
   <td><select name="listFkTipoFalla" size="1" id="listFkTipoFalla" required>
      <option value="<?php print $rowItemFalla['FkTipoFalla'];?>"><?php print $rowItemFalla['FkTipoFalla'];?></option>
        <?php

include("Conexion/conexion.php");
  
$queryTipoFallaRecl = $mysqli -> query ("SELECT * FROM `ComTipoFallaRecl` ORDER BY `ComTipoFallaRecl`.`Tipo_Falla` ASC");


 while ($valoresTipoFallaRecl = mysqli_fetch_array($queryTipoFallaRecl))

		  
		  {

 echo '<option value="'.$valoresTipoFallaRecl[Id_TipoFallaRecl].'">'.$valoresTipoFallaRecl[Tipo_Falla].'</option>';
	 
$varvaloresTipoFallaRecl = $valoresTipoFallaRecl[Tipo_Falla];
  
}

  
	?>
	   
      </select>
	   <?php   
	echo $varvaloresTipoFallaRecl;   
	   ?>
 
		</td>
    </tr	  
	  
	<tr>
	<td>
		<label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar" />
      </label>
			
		</td>	
		
		 </tr>

	</table>
	</div>

<hr>

<?php
$Id_ItemFalla=$_POST['txtId_ItemFalla'];	
$ItemFalla=$_POST['txtItemFalla'];	
$TipoFallaRecl=$_POST['listFkTipoFalla'];	

		
if(!$ItemFalla==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");

	
$insertarItemFalla = "UPDATE `ComItemFalla` SET `ItemFalla` = '$ItemFalla', `FkTipoFalla` = '$TipoFallaRecl' WHERE `ComItemFalla`.`Id_ItemFalla` = ".$Id_ItemFalla.";";	

$ejecutar_insertar=mysqli_query($mysqli,$insertarItemFalla);
}		
		
mysqli_close($mysqli);	
		
?>

	</form>
	
	
		

		


<?php
echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Listado items de fallas</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Items</B></TD>
<TD><B>NumTipo</B></TD>
<TD><B>Tipo</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";		
$Id_ItemFalla=$_POST['txtId_ItemFalla'];		
$ItemFalla=$_POST['txtItemFallaB'];	

	
include("Conexion/conexion.php");	//SELECT * FROM `ComVisCliente` WHERE `Id_Cliente` = ".$Id_Cliente.";
$queryComVistaItemFallaB = $mysqli -> query ("SELECT * FROM `ComVistaItemFalla` WHERE `Susp` LIKE 'No' AND `Id_ItemFalla` = ".$Id_ItemFalla.";");
  
 while ($filaComVistaItemFallaB = mysqli_fetch_array($queryComVistaItemFallaB))

{
echo "<TR>\n";
echo "<td>".$filaComVistaItemFallaB['Id_ItemFalla']."</td>\n";
echo "<td>".$filaComVistaItemFallaB['ItemFalla']."</td>\n";
echo "<td>".$filaComVistaItemFallaB['Id_TipoFallaRecl']."</td>\n";	 
echo "<td>".$filaComVistaItemFallaB['Tipo_Falla']."</td>\n";
	 


echo "<td>"."<a href=\"/sistema/FormItemEditar.php?Id_ItemFalla=".$filaComVistaItemFallaB['Id_ItemFalla']."\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 

echo "<td>"."<a onClick=\"AlertarBorra()\" href=\"/sistema/FormItemBorrar.php?Id_ItemFalla=".$filaComVistaItemFallaB['Id_ItemFalla']."\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
	 
	 
echo "</TR>\n";
}
	 
echo "</table>"	 ;
mysqli_close($mysqli);
		
?>

	


    </div>
  </div>
</div>	

	
</body>
</html>