<!-- https://youtu.be/RInf8KPptO0 -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
		<!-- ESTILOS -->
		<!-- <link href="css/estilo.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">


</head>
<style>
.imgEfcPanel{

  width: 40px;
  height: 40px;
  border-radius: 50% 50%;

}
</style>
<body>
	<!-- <div class="row fondo">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center "> <strong> Personal</strong>
			<a href="/sistema/FormPersonal.php"><img src="../sistema/img/NuevoIcono.png" alt="Nuevo Personal" width="40" height="40"></a>

			<a href="/sistema/GraficoPersonal.php" target="_blank">
      <img src="../sistema/img/iconoGrafico.png" alt="iconoGrafico"  width="40" height="40"></a>

      <a href="/sistema/VistaInformePersonal.php" target="_blank">
      <img src="../sistema/img/iconoInforme.png" alt="iconoInforme" width="40" height="40"></a>

      <a href="/sistema/VistaOrganigrama.php" target="_blank">
      <img src="../sistema/img/IconoOrganigrama.png" alt="IconoOrganigrama" width="40" height="40"></a>
      <a href="/sistema/InforCumple.php" target="_blank">
      <img class="imgEfcListPersonal" src="../sistema/img/imgCumple.JPG" alt="imgCumple"  width="40" height="40" ></a>
		</h3>
		</div>
	</div> -->
	

	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_personal" class="table table-striped" width="100%">
					<thead>
						<tr>								
							<th>idMaq</th>
							<th>Maquina</th>
							<th>Modelo</th>		
                            <th>DiasManteni</th>
							<th>img</th>
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
    var table = $("#dt_personal").DataTable({
		"order": [[ 3, 'asc' ], ],
"ajax": {
    "method": "POST",
    "url": "ListarMaqBack.php",
},
"columns":[
    //para accedera los valores
    {"data": "idMaq"},
    {"data": "Maquina"},
    {"data": "Modelo"},
    {"data": "DiasManteni"},
	{
	"render": function (data, type, JsonResultRow, meta) {
		 return "<img class='imgEfcPanel' width='50' height='50' src='"+JsonResultRow.imgMaq+"'>"+"&emsp;"
		 +"<a href='/sistema/#?idMaq="+JsonResultRow.idMaq+"' ><img src='/sistema/img/VerIcono.png' alt='BtnIconoVer' width='20' height='20'></a>"
		 +" &emsp;"+"<a href='/sistema/#?idMaq="+JsonResultRow.idMaq+"'><img src='/sistema/img/EditIcono.png' alt='EditIcono.png' width='20' height='20' ></a>"
		 +" &emsp;"+"<a href='/sistema/Maq-eliminar.php?idMaq="+JsonResultRow.idMaq+"'><button class='list-inve btn btn-danger' >Borrar</button>"; 
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
obtener_data("#dt_personal", table);
}
var obtener_data= function(tbody, table){
$(tbody).on("click", "button.ver", function(){
var data=table.row($(this).parents("tr")).data();
console.log(data.imgprod);

});
}
	</script>
</body>
</html>
