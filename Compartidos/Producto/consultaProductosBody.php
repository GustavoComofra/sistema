<?php
//https://www.youtube.com/watch?v=IHVQX52W-LQ
// CONEXIÓN A LA BASE DE DATOS 
require '../Conexion/conexion.php';

if ($mysqli-> connect_errno)
{
    echo "Fallo al conectar a MySQL: (" .$Consulta->connect_errno . ") " .$Consulta->connect_error;
}



$tabla="";
$query="SELECT * FROM `Productos` ORDER BY `Productos`.`Producto` ASC  LIMIT 1";


if(isset($_POST['Productos']))
{
	$qBody=$mysqli->real_escape_string($_POST['Productos']);
	$query="SELECT * FROM Productos WHERE 
		CodSistema LIKE '%".$qBody."%' OR
		Producto LIKE '%".$qBody."%' OR
		UM LIKE '%".$qBody."%' OR
		inactivo LIKE '%".$qBody."%'";
}
	/*<tr class="bg-primary">*/
	
$buscarProductosBody=$mysqli->query($query);
if ($buscarProductosBody->num_rows > 0)
{
	$tabla.= 
	'<table id="TbProductosBody" class="table table-bordered table-striped" style="width:100%">
	<thead>
		<tr>
		<th>CodSistema</th>
		<th>Producto</th>

  		</tr>
		</thead>';

	while($filaProductosBody= $buscarProductosBody->fetch_assoc())
	{
		$tabla.=
		'<tr>
		<td>'.$filaProductosBody['CodSistema'].'</td>
		<td>'.$filaProductosBody['Producto'].'</td>

		</tr>
		';

	}
	
	$tabla.='</table>';

} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

//liberar memoria
mysqli_free_result($buscarProductosBody);
//cerrar conexion
mysqli_close($mysqli);
echo $tabla;

?>