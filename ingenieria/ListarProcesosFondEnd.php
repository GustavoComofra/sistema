<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nuevo Personal</title>

    <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">
    <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <div class="container-fluid m-0">
        <div class="row">

            <div class="col-9 mt-0" style="margin-left: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3 class="text-center "> <strong> Procesos</strong>
                        <a href="/sistema/ingenieria/FormProcesoNuevo.php"><img src="../img/NuevoIcono.png" alt="Nuevo Proceso" width="40" height="40"></a>
                        <a href="/sistema/ingenieria/GraficoProcesos.php" target="_blank">
                            <img src="../img/iconoGrafico.png" alt="iconoGrafico" width="40" height="40"></a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-offset-2 col-sm-8">
                <h3 class="text-center"> <small class="mensaje"></small></h3>
            </div>
            <div class="table-responsive col-sm-12">
                <table id="dt_proceso" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Proceso</th>
                            <th>CodProd</th>
                            <th>Implemento</th>
                            <th>Fecha</th>
                            <th>Valida</th>
                            <th>Img</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            listar();
        });

        var listar = function() {
            var table = $("#dt_proceso").DataTable({
                "order": [
                    [0, 'desc']
                ],
                "ajax": {
                    "method": "POST",
                    "url": "/sistema/ingenieria/ListarProcesosBackCom.php",
                },
                "columns": [{
                        "data": "id_proceso"
                    },
                    {
                        "data": "Proceso"
                    },
                    {
                        "data": "ProductoProceso"
                    },
                    {
                        "data": "Implemento"
                    },
                    {
                        "data": "FechaInicio"
                    },
                    {
                        "data": "FechaValidacion"
                    },
                    {
                        "render": function(data, type, JsonResultRow, meta) {
                            return "<img class='imgEfcPanel' width='50' height='50' src='" + JsonResultRow.imgprod + "'>" + "&emsp;" +
                                "<a href='/sistema/ingenieria/VistaProceso.php?id_proceso=" + JsonResultRow.id_proceso + "' target='_blank'><img src='../img/VerIcono.png' alt='BtnIconoVer' width='20' height='20'></a>" +
                                " &emsp;" + "<a href='/sistema/ingenieria/VistaProcesoCadena.php?id_proceso=" + JsonResultRow.id_proceso + "' target='_blank'><img src='../img/iconoCadena.png' alt='iconoCadena' width='20' height='20' ></a>" +
                                " &emsp;" + "<a href='/sistema/ingenieria/FormProcesoEditar.php?id_proceso=" + JsonResultRow.id_proceso + "' target='_blank'><img src='../img/EditIcono.png' alt='EditIcono.png' width='20' height='20' ></a>" +
                                " &emsp;" + "<a href='/sistema/ingenieria/ValidaProceso.php?id_proceso=" + JsonResultRow.id_proceso + "' target='_blank'><img src='../img/iconoValidar.png' alt='EditIcono.png' width='20' height='20' ></a>";
                        }
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    //'selected',
                    'excel',
                    'pdf',
                    'copy',
                    /* 'selectedSingle',
                     'selectAll',
                     'selectNone',
                     'selectRows',
                     'selectColumns',
                     'selectCells'*/
                ],
            });
            obtener_data("#dt_proceso", table);
        }

        var obtener_data = function(tbody, table) {
            $(tbody).on("click", "button.ver", function() {
                var data = table.row($(this).parents("tr")).data();
                console.log(data.imgprod);
                //var imagen = (data.imgprod);
            });
        }
    </script>
</body>

</html>
