<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/favicon.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<style>
	.imgEfcListPersonal {
		position: relative;
		width: 50px;
		height: 50px;
		border-radius: 50% 50%;

	}

	.Advertencia {
		color: red;
	}

	/* Estilo opcional para ocultar el div inicialmente */
	#divLateral {
		display: none;
	}
</style>
	<title>Personal</title>
<body>
	<div class="row fondo">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center "> <strong> Personal</strong>
			<a href="../Rrhh/FormPersonal.php"><img src="../img/NuevoIcono.png" alt="Nuevo Personal" width="40" height="40"></a>

			<a href="../Rrhh/GraficoPersonal.php" target="_blank">
      <img src="../img/iconoGrafico.png" alt="iconoGrafico"  width="40" height="40"></a>

      <a href="/sistema/Rrhh/VistaInformePersonal.php" target="_blank">
      <img src="../img/iconoInforme.png" alt="iconoInforme" width="40" height="40"></a>

      <a href="../Rrhh/VistaOrganigrama.php" target="_blank">
      <img src="../img/IconoOrganigrama.png" alt="IconoOrganigrama" width="40" height="40"></a>
      <a href="../Rrhh/InforCumple.php" target="_blank">
      <img class="imgEfcListPersonal" src="../img/imgCumple.JPG" alt="imgCumple"  width="40" height="40" ></a>
		</h3>
		</div>
	</div>
	

	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">	
				
			<table id="dt_personal" class="table table-hover">
					<thead>
						<tr>								
							<th>Legajo</th>
							<th>CUIL</th>
							<th>Nombres</th>		
                            <th>Apellidos</th>
							<th>Nac</th>
							<th>Sector</th>
							<th>Relacion</th>		
                            <th>Baja</th>
							<th>Img</th>
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
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

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
    "url": "../Rrhh/ListarPersonalBackend.php",
},
"columns":[
    //para accedera los valores
    {"data": "Legajo"},
    {"data": "CUIT_Empl"},
    {"data": "Nombres"},
    {"data": "Apellidos"},
	{"data": "FechaNacimiento"},
    {"data": "SectorFk"},
    {"data": "Relacion"},
    {"data": "Baja"},
    {
        "render": function (data, type, JsonResultRow, meta) {
            return "<img class='imgEfcPanel' width='50' height='50' src='"+JsonResultRow.Foto+"'>"+"&emsp;"
            +"<a href='/sistema/Rrhh/VistaPersonal.php?IdPersonal="+JsonResultRow.IdPersonal+"' target='_blank'><img src='../img/VerIcono.png' alt='BtnIconoVer' width='20' height='20'></a>"
            +"&emsp;<a href='/sistema/Rrhh/FormPersonalEditar.php?IdPersonal="+JsonResultRow.IdPersonal+"' target='_blank'><img src='../img/EditIcono.png' alt='EditIcono' width='20' height='20'></a>"; 
        }
	},
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
