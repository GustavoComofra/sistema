<?php
//https://www.youtube.com/watch?v=IHVQX52W-LQ
// CONEXIÓN A LA BASE DE DATOS 
require 'Conexion/conexion.php';

if ($mysqli-> connect_errno)
{
    echo "Fallo al conectar a MySQL: (" .$Consulta->connect_errno . ") " .$Consulta->connect_error;
}



$tabla="";
$query="SELECT * FROM `productoscmg` ORDER BY `productoscmg`.`CodSistema` ASC LIMIT 20";


if(isset($_POST['productoscmg']))
{
	$q=$mysqli->real_escape_string($_POST['productoscmg']);
	$query="SELECT * FROM productoscmg WHERE 
		CodSistema LIKE '%".$q."%' OR
		Producto LIKE '%".$q."%'";
}
	/*<tr class="bg-primary">*/
	
$buscarProductos=$mysqli->query($query);
if ($buscarProductos->num_rows > 0)
{
	$tabla.= 
	'<table id="TbProductos" class="table table-bordered table-striped" style="width:100%">
	<thead>
		<tr>
			<th>Select</th>
			<th>CodSistema</th>
			<th>Producto</th>
			<th>UM</th>
  		</tr>
		</thead>';

	while($filaProductos= $buscarProductos->fetch_assoc())
	{
		$tabla.=
		'<tr>
		<td>'.'<input type="checkbox" class="form-check-input" name="checked" id="checked" data-idRegristro="'.$filaProductos['CodSistema'].'">'.'</td>
		<td>'.$filaProductos['CodSistema'].'</td>
		<td>'.$filaProductos['Producto'].'</td>
		<td>'.$filaProductos['UM'].'</td>
		<td>'.$filaProductos['inactivo'].'</td>

		</tr>
		';

	}
	

	$tabla.='</table>';

} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

//liberar memoria
mysqli_free_result($buscarProductos);
//cerrar conexion
mysqli_close($mysqli);
echo $tabla;

?>