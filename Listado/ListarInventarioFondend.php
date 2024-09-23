<!DOCTYPE html>
<html lang="es">
	<head>
		<title>inventario Comofra SRL</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link href="../sistema/img/Icono.png" rel="icon" type="image/png">
		<!-- ESTILOS -->
		<!-- <link href="css/estilo.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
		<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


</head>
<style>
.imgEfcPanel{

  width: 40px;
  height: 40px;
  border-radius: 50% 50%;

}
</style>
<body>

	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_Inventario" class="table table-striped" width="100%">
					<thead>
						<tr>								
						<th>Id</th>
							<th>CodCmg</th>
							<th>Producto</th>
							<th>UM</th>
							<th>Cantidad</th>
							<th>Usuario</th>		
							<th>Fecha</th>
							<th>ObsInv</th>
							<th></th>
					</tr>
					</thead>					
				</table>
			</div>			
		</div>		
	</div>

	
	<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!-- <script src="js/dataTables.bootstrap.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>
	<!--botones DataTables-->	
	<!-- <script src="js/dataTables.buttons.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap.js"></script> -->
	<!-- <script src="js/buttons.bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap.min.js"></script> -->
	<!--Libreria para exportar Excel-->
	<!-- <script src="js/jszip.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
	<!--Librerias para exportar PDF-->
	<!-- <script src="js/pdfmake.min.js"></script> -->
	<!-- <script src="js/vfs_fonts.js"></script> -->
	<!--Librerias para botones de exportación-->
	<!-- <script src="js/buttons.html5.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script> -->



    <!-- datatables-->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
    <!-- datatables extension SELECT -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    
    <!-- extension BOTONES -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>    

    <!-- para botenes de exportar -->
    <script type="text/javascript"
src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript"
src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"
src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript"
src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript"
src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript"
src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>


	<script>		
		$(document).on("ready", function(){
			listar();
		});
var listar = function(){
    var table = $("#dt_Inventario").DataTable({
		"order": [[ 0, 'desc' ], ],
"ajax": {
    "method": "POST",
    "url": "ListarInventarioBackend.php",
},
"columns":[
    //para accedera los valores
    {"data": "idInventario"},
	{"data": "CodCmg"},
	{"data": "Producto"},
	{"data": "UM"},
    {"data": "Cantidad"},
	{"data": "UsuarioInventario"},
	{"data": "FechaInventario"},
	{"data": "ObsInv"},



	 {
	 "render": function (data, type, JsonResultRow, meta) {
	 	 return "<a  class='list-alumnos' href='/sistema/InventarioEditarLIst.php?idInventario="+JsonResultRow.idInventario+" ><img src='../img/EditIcono.png' alt='EditIcono' width='20' height='20'></a>"

	 	 +" &emsp;"+"<a href='/sistema/InventarioBorrarLIst.php?idInventario="+JsonResultRow.idInventario+" ><img src='http://interno.comofrasrl.com.ar/sistema/img/BorrIcono.png' alt='BorrIcono' width='20' height='20' ></a>" ; 
	 }},
],
dom: 'Bfrtip',
                buttons: [
                  //'selected',
                    'excel', 
                    'pdf', 
                    'copy',
                 /*   'selectedSingle',
                    'selectAll',
                    'selectNone',
                    'selectRows',
                    'selectColumns',
                    'selectCells'*/
                ],

    });
//obtener_data("#dt_Inventario", table);
}
var obtener_data= function(tbody, table){
$(tbody).on("click", "button.ver", function(){
var data=table.row($(this).parents("tr")).data();
console.log(data.imgprod);

});
}
	</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

</body>
</html>