<!-- https://youtu.be/RInf8KPptO0 -->
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

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
.highcharts-figure,
.highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
<body>
	<div class="row fondo">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center "> <strong> Reclamos</strong>
			<a href="/sistema/FormReclamo.php">
      <img src="../sistema/img/NuevoIcono.png" alt="Nuevo" width="40" height="40"></a>
      <a href="/sistema/GraficoReclamo.php">
      <img src="../sistema/img/iconoGrafico.png" alt="iconoGrafico" width="40" height="40"></a>
      <a href="/sistema/ListCostoReclamo.php">
      <img src="../sistema/img/IconoPesos.png" alt="IconoPesos" width="40" height="40"></a>

		</h3>
		</div>
	</div>
	

	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_reclamo" class="table table-striped" width="100%">
					<thead>
						<tr>								
							<th>Num</th>
							<th>Reclamo</th>
							<th>Tipo</th>		
                            <th>Implemento</th>
							<th>Fecha</th>
							<th>Final</th>
							<th>Cierre</th>		
                            <th>Chasis</th>
							<th>Cliente</th>		
                            <th>Consec</th>
							<th>Opcion</th>
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
    var table = $("#dt_reclamo").DataTable({
		"order": [[ 0, 'desc' ], ],
"ajax": {
    "method": "POST",
    "url": "ListarReclamoBackend.php",
},
"columns":[
    //para accedera los valores
    {"data": "NumReclamo"},
    {"data": "Reclamo"},
    {"data": "TipoReclamo"},
    {"data": "Implemento"},
	{"data": "Fecha"},
    {"data": "FechaFinal"},
    {"data": "FechaCierre"},
    {"data": "Chasis"},
	{"data": "Cliente"},
    {"data": "Concesionario"},
	{
	"render": function (data, type, JsonResultRow, meta) {
		 return "<a href='/sistema/VistaReclamo.php?NumReclamo="+JsonResultRow.NumReclamo+"' target='_blank'><img src='/sistema/img/VerIcono.png' alt='BtnIconoVer' width='20' height='20'></a>"
		 +" &emsp;"+"<a href='/sistema/FormReclamoEditar.php?NumReclamo="+JsonResultRow.NumReclamo+"' target='_blank'><img src='/sistema/img/EditIcono.png' alt='EditIcono.png' width='20' height='20' ></a>"; 
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
obtener_data("#dt_reclamo", table);
}
var obtener_data= function(tbody, table){
$(tbody).on("click", "button.ver", function(){
var data=table.row($(this).parents("tr")).data();
console.log(data.imgprod);

});
}
	</script>
   <!-- Fin Grafico -->
   <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Chart showing data loaded dynamically. The individual data points can
        be clicked to display more information.
    </p>
</figure>
   <script>
// Un evento de clic en un punto que utiliza el renderizador para dibujar una etiqueta al lado del punto
// En clics posteriores, mueva la etiqueta existente en lugar de crear una nueva.
Highcharts.addEvent(Highcharts.Point, 'click', function () {
    if (this.series.options.className.indexOf('popup-on-click') !== -1) {
        const chart = this.series.chart;
        const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
        const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

        const anchorX = this.plotX + this.series.xAxis.pos;
        const anchorY = this.plotY + this.series.yAxis.pos;
        const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
        const x = align === 'left' ? anchorX + 10 : anchorX - 10;
        const y = anchorY - 30;
        if (!chart.sticky) {
            chart.sticky = chart.renderer
                .label(text, x, y, 'callout',  anchorX, anchorY)
                .attr({
                    align,
                    fill: 'rgba(0, 0, 0, 0.75)',
                    padding: 10,
                    zIndex: 7 // Above series, below tooltip
                })
                .css({
                    color: 'white'
                })
                .on('click', function () {
                    chart.sticky = chart.sticky.destroy();
                })
                .add();
        } else {
            chart.sticky
                .attr({ align, text })
                .animate({ anchorX, anchorY, x, y }, { duration: 250 });
        }
    }
});


Highcharts.chart('container', {

    chart: {
        scrollablePlotArea: {
            minWidth: 700
        }
    },

    data: {
        csvURL: 'https://interno.comofrasrl.com.ar/sistema/ListarReclamoBackendGrafico.php',
        beforeParse: function () {
            return csv.replace(/\n\n/g, '\n');
        }
    },

    title: {
        text: 'Daily sessions at www.highcharts.com',
        align: 'left'
    },

    subtitle: {
        text: 'Source: Google Analytics',
        align: 'left'
    },

    xAxis: {
        tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },

    yAxis: [{ // left y axis
        title: {
            text: null
        },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],

    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },

    tooltip: {
        shared: true,
        crosshairs: true
    },

    plotOptions: {
        series: {
            cursor: 'pointer',
            className: 'popup-on-click',
            marker: {
                lineWidth: 1
            }
        }
    },

    series: [{
        name: 'All sessions',
        lineWidth: 4,
        marker: {
            radius: 4
        }
    }, {
        name: 'New users'
    }]
});




   </script>
</body>
</html>
