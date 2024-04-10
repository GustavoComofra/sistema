<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Buscador en Tiempo Real con AJAX</title>
		<meta charset="utf-8">


		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        
		<!-- ESTILOS -->
		<!-- <link href="css/estilo.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
		<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
		
	    <style>
       /* #DialogCamara {
             display: flex;  
            flex-direction: column;
            align-items: center;
        } */

        #videoview {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        #videoContainer {
            position: relative;
            width: 100%;
            height: 100%;
           /* z-index: 1*/
        }

        #overlay {
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            object-fit: contain
        }

    </style>	
	
<!-- Script de buscar Productos -->    
<script >
$(obtener_registros());

function obtener_registros(Productos)
{
   $.ajax({
       url : 'consultaProductos.php',
       type : 'POST',
       dataType : 'html',
       data : { Productos: Productos },
	   "language": {
"url": "/Scripts/datatables/spanish.json"

},      })
	       

   .done(function(resultado){
       $("#tabla_resultado").html(resultado);
   })
}

$(document).on('keyup', '#busqueda', function()
{
   var valorBusqueda=$(this).val();
   if (valorBusqueda!="")
   {
       obtener_registros(valorBusqueda);
   }
   else
       {
           obtener_registros();
       }
});

		</script>
<!-- Fin Script de buscar Productos -->  

<!-- Script de buscar Body -->    
<script >
$(obtener_registrosBody());

function obtener_registrosBody(Productos)
{
   $.ajax({
       url : 'consultaProductosBody.php',
       type : 'POST',
       dataType : 'html',
       data : { Productos: Productos },
	   "language": {
"url": "/Scripts/datatables/spanish.json"

},      })
	       

   .done(function(resultadoBody){
       $("#tabla_resultadoBody").html(resultadoBody);
   })
}

$(document).on('keyup', '#ModalBuscarBody', function()
{
   var valorBusquedaBody=$(this).val();
   if (valorBusquedaBody!="")
   {
       obtener_registrosBody(valorBusquedaBody);
   }
   else
       {
           obtener_registrosBody();
       }
});

		</script>
<!-- Fin Script de buscar Body --> 

	</head>
	<body>
		<!-- <header>
			<div class="alert alert-info">
			<h2>Buscador Productos</h2>
			</div>
		</header> -->
		
<dialog id="favDialog">
<section>
<input type="text" name="busqueda" id="busqueda" placeholder="Buscar..." formaction=""/>
<button id="cancel" type="reset">Cancel</button>
<button type="button" id="cerrar" >cerrar</button>
</section>
<div id="favDialog">
<section id="tabla_resultado">
<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
</section>
</div>
</div>
</dialog>

<dialog id="DialogCamara" >

<script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@9.6.20/dist/dbr.js"></script>
    <script src="overlay.js"></script>

<div>
<button type="button" class="btn btn-danger" id="cerrarCamara" >cerrar</button>
Resultado del código de barras: <h1 id='result'>N/A</h1>
    </div>
    <div id="barcodeScanner">
        <span id='loading-status' style='font-size:x-large'>Loading Library...</span>
    </div>

    <div class="select">
        <label for="videoSource">Fuente de vídeo: </label>
        <select id="videoSource"></select>
    </div>

    <div id="videoview">
        <div class="dce-video-container" id="videoContainer"></div>
        <canvas id="overlay"></canvas>
    </div>

   



</dialog>

<div class=".container-fluid">
<form action="#" method="post" name="formInventario" >
        <input type="button" class="btn btn-info" name="updateDetails" id="updateDetails" value="Buscar" ></button>
        <input type="button" class="btn btn-info" name="MostrarCamara" id="MostrarCamara"  value="Camara" ></button> 
      <input type="text" id="ModalBuscarBody" name="ModalBuscarBody" placeholder="Valor Seleccionado">
      <input type="number" id="txtCantidad" name="txtCantidad" placeholder="Cantidad">
      <select name="listSector" size="1" id="listSector">
        <option value="1">Agropartes</option>
        <?php
include("Conexion/conexion.php");
  
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` WHERE `Inventario` LIKE 'Si'  ORDER BY `ComSector`.`SectorFk` ASC");
 while ($valoresSector = mysqli_fetch_array($querySector))
		  {
 echo '<option value="'.$valoresSector[IdSector].'">'.$valoresSector[SectorFk].'</option>';
          }
	?>
      </select>
      <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />

      <?php
error_reporting(0);
$CodCmg=$_POST['ModalBuscarBody'];	
$Cantidad=$_POST['txtCantidad'];	
$Sectorinv=$_POST['listSector'];	
$fechaActual = date("Y-m-d");
$FechaInventario=$fechaActual;
$UsuarioInventario="";
		
if(!$CodCmg==null){
	
echo "<p>"."cargado"."</p>";
include("Conexion/conexion.php");		  

$insertarInventario = "INSERT INTO `Inventario` (`idInventario`, `CodCmg`, `Cantidad`, `Sectorinv`, `FechaInventario`, `UsuarioInventario`) VALUES (NULL, '$CodCmg', '$Cantidad', '$Sectorinv', '$FechaInventario', '$UsuarioInventario');";

$ejecutar_insertar=mysqli_query($mysqli,$insertarInventario);
mysqli_close($mysqli);	
}		
		

		
?>

      </form>
      <section id="tabla_resultadoBody">
		<!-- Tabla de Body -->
		</section>

    </div>
<!-- Inicio Modal -->    
<script>
$(function(){
    $('body').on('click','#TbProductos input[type=checkbox]', function(event){
       var idRegistro = $(this).attr('data-idRegristro');
       //alert(idRegistro);
       document.getElementById("ModalBuscarBody").value=idRegistro;
    });
  var updateButton = document.getElementById('updateDetails');
  var varMostrarCamara = document.getElementById('MostrarCamara');
  var cancelButton = document.getElementById('cancel');
  var cerrarButton = document.getElementById('cerrar');
  var cerrarBtnCamara = document.getElementById('cerrarCamara');
  var favDialog = document.getElementById('favDialog');

  // El botón Actualizar abre un cuadro de diálogo modal
  updateButton.addEventListener('click', function() {
    favDialog.showModal();
    
  });

  varMostrarCamara.addEventListener('click', function() {
    DialogCamara.showModal();
    var btnPresionado = true;
  
 

  });


  // El botón de cancelar formulario cierra el cuadro de diálogo
  cancelButton.addEventListener('click', function() {

   //document.Reset();
    document.getElementById("busqueda").value="";
    //favDialog.close();
  });

          // El botón de cancelar formulario cierra el cuadro de diálogo
          cerrarButton.addEventListener('click', function() {
			favDialog.close();
    
  });

 
 // El botón de cancelar formulario cierra el cuadro de diálogo
  cerrarBtnCamara.addEventListener('click', function() {
DialogCamara.close();
//alert("presionado");
   
  });




  
  
});
</script>

<!-- Fin Modal --> 

<script>
        // Make sure to set the key before you call any other APIs under Dynamsoft.DBR
        //You can register for a free 30-day trial here: https://www.dynamsoft.com/customer/license/trialLicense?product=dbr&deploymenttype=browser.
        // Dynamsoft.DBR.BarcodeReader.license = "DLS2eyJoYW5kc2hha2VDb2RlIjoiMjAwMDAxLTE2NDk4Mjk3OTI2MzUiLCJvcmdhbml6YXRpb25JRCI6IjIwMDAwMSIsInNlc3Npb25QYXNzd29yZCI6IndTcGR6Vm05WDJrcEQ5YUoifQ==";

        Dynamsoft.DBR.BarcodeReader.license = "DLS2eyJoYW5kc2hha2VDb2RlIjoiMTAyMTMyNDA1LVRYbFhaV0pRY205cVgyUmljZyIsIm1haW5TZXJ2ZXJVUkwiOiJodHRwczovL21kbHMuZHluYW1zb2Z0b25saW5lLmNvbSIsIm9yZ2FuaXphdGlvbklEIjoiMTAyMTMyNDA1Iiwic3RhbmRieVNlcnZlclVSTCI6Imh0dHBzOi8vc2Rscy5keW5hbXNvZnRvbmxpbmUuY29tIiwiY2hlY2tDb2RlIjotMTMxNjMxMzI3fQ==";


       var videoSelect = document.querySelector('select#videoSource');
        var cameraInfo = {};
        var scanner = null;
        initOverlay(document.getElementById('overlay'));
        async function openCamera() {
            clearOverlay();
            let deviceId = videoSelect.value;
            if (scanner) {
                await scanner.setCurrentCamera(cameraInfo[deviceId]);
            }
        }

        videoSelect.onchange = openCamera;

        window.onload = async function () {
            try {
                await Dynamsoft.DBR.BarcodeScanner.loadWasm();
               await initBarcodeScanner();
            } catch (ex) {
                alert(ex.message);
                throw ex;
            }
        };

        function updateResolution() {
            if (scanner) {
                let resolution = scanner.getResolution();
                updateOverlay(resolution[0], resolution[1]);
            }
        }
        
        function listCameras(deviceInfos) {
            for (var i = 0; i < deviceInfos.length; ++i) {
                var deviceInfo = deviceInfos[i];
                var option = document.createElement('option');
                option.value = deviceInfo.deviceId;
                option.text = deviceInfo.label;
                cameraInfo[deviceInfo.deviceId] = deviceInfo;
                videoSelect.appendChild(option);
            }
        }

        async function initBarcodeScanner() {
            scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
            await scanner.updateRuntimeSettings("speed");
            await scanner.setUIElement(document.getElementById('videoContainer'));

            let cameras = await scanner.getAllCameras();
            listCameras(cameras);
            await openCamera();
            scanner.onFrameRead = results => {
                clearOverlay();

                let txts = [];
                try {
                    let localization;
                    if (results.length > 0) {
                        for (var i = 0; i < results.length; ++i) {
                            txts.push(results[i].barcodeText);
                            localization = results[i].localizationResult;
                            drawOverlay(localization, results[i].barcodeText);
                        }
                        document.getElementById('result').innerHTML = txts.join(', ');

var valorBody = document.getElementById('result').innerHTML = txts.join(', ');
document.getElementById('ModalBuscarBody').value=valorBody;    
if(valorBody=true){

DialogCamara.close();
videoContainer.close();
} 


                    }
                    else {
                        document.getElementById('result').innerHTML = "No barcode found";
                    }

                } catch (e) {
                  //  alert(e);
                }
            };
            scanner.onUnduplicatedRead = (txt, result) => { };
            document.getElementById('loading-status').hidden = true;
            scanner.onPlayed = function() {
                updateResolution();
            }
            await scanner.show();
            
        }
        
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

	</body>
</html>