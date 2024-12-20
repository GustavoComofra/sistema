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
		
	    <style>
       /* #DialogCamara {
             display: flex;  
            flex-direction: column;
            align-items: center;
        } */

        #videoview {
        position: relative;
        display: none
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

        #barcodeScanner {
            text-align: center;
            font-size: medium;
            height: 40vh;
            width: 40vw;
        }

    </style>	
	
<!-- Script de buscar Productos -->    
<script >
$(obtener_registros());

function obtener_registros(productoscmg)
{
   $.ajax({
       url : 'https://interno.comofrasrl.com.ar/sistema/Compartidos/Producto/consultaProductos.php',
       type : 'POST',
       dataType : 'html',
       data : { productoscmg: productoscmg },
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

    <?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>

	 <?php	

session_start();
	$u = $_POST['txtUsuario'];
?>	


<div class="container">


<dialog id="favDialog">
<section>
<input type="text" class="ClassBusqueda" name="namebusqueda"  id="busqueda" placeholder="Buscar..." formaction=""/>
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
    <script src="https://interno.comofrasrl.com.ar/sistema/js/overlay.js"></script>


<div>
<button type="button" class="btn btn-danger" id="cerrarCamara" >cerrar</button>
Resultado del codigo de barras: <h1 id='result'>N/A</h1>
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


<form id="app-form" name="formInventario" >
<input type="hidden" id="idInventario">

<div class="row justify-content-start">
    <div class="col-auto">
     <button type="button" class="btn btn-info"  name="updateDetails" id="updateDetails" ><span class="glyphicon glyphicon glyphicon-search"></span> - Buscar</button>
    </div>
    <div class="col-auto">
    <button type="button" class="btn btn-info" name="MostrarCamara" id="MostrarCamara" ><span class="glyphicon glyphicon glyphicon-barcode"></span> - Scanner</button>
    </div>

</div>

<div class="row justify-content-start">
    <div class="col-auto">
    <input type="number" id="ModalBuscarBody" placeholder="Valor Seleccionado" required>
   <label for=""></label>
    <input type="number" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" step="any" required >
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>
    </div>
</div>

<div class="row">
<div class="col">
   <input type="text" id="txtObsInv" size="46" name="txtObsInv" placeholder="Observacion">
    <input type="hidden" id="txtUser" min="1" name="txtUser" value="<?php echo $_SESSION['usuario'];  ?>">
</div>

</div>

   



      </form>
     
      <div class="">

      <table class="table table-bordered table-sm">
            <thead>
                <tr>
                <td>id</td>
                    <td>CodCmg</td>
                    <td>Prod</td>
                    <td>UM</td>
                    <td>Cant</td>

                    <td>Stock</td>
                    <td>Acum</td>
                    <td>Impor</td>
                    <td>Alm</td>

                    <td>ObsInv</td>
                    <td colspan="2"></td>
                </tr>
            </thead>
            <tbody id="tb_inventario">

            </tbody>
        </table>
    </div>


      </div>


    </div>
<!-- Inicio Modal -->   

<script>

function obtener_registrosBody(valorBusquedaBody) {
   $.ajax({
       url: 'https://interno.comofrasrl.com.ar/sistema/Compartidos/Producto/consultaProductos.php',  // Cambia esta URL si es necesario
       type: 'POST',
       dataType: 'html',
       data: { valorBusquedaBody: valorBusquedaBody },
       success: function(resultado) {
           $("#tabla_resultado").html(resultado);
       },
       error: function() {
           console.error("Error al cargar los datos");
       }
   });
}



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
  var openCamara= false;
  varMostrarCamara.addEventListener('click', function() {
    DialogCamara.showModal();
    var btnPresionado = true;
   openCamara= true;
 

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

   
  });
  
});
</script>

<!-- Fin Modal --> 

<script>
        // Make sure to set the key before you call any other APIs under Dynamsoft.DBR
        //You can register for a free 30-day trial here: https://www.dynamsoft.com/customer/license/trialLicense?product=dbr&deploymenttype=browser.
        // Licencia gratuita de lectora de codigo:
       //  Dynamsoft.DBR.BarcodeReader.license = "DLS2eyJoYW5kc2hha2VDb2RlIjoiMjAwMDAxLTE2NDk4Mjk3OTI2MzUiLCJvcmdhbml6YXRpb25JRCI6IjIwMDAwMSIsInNlc3Npb25QYXNzd29yZCI6IndTcGR6Vm05WDJrcEQ5YUoifQ==";

        Dynamsoft.DBR.BarcodeReader.license = "DLS2eyJoYW5kc2hha2VDb2RlIjoiMTAyMjE3NDAzLVRYbFhaV0pRY205cSIsIm1haW5TZXJ2ZXJVUkwiOiJodHRwczovL21kbHMuZHluYW1zb2Z0b25saW5lLmNvbSIsIm9yZ2FuaXphdGlvbklEIjoiMTAyMjE3NDAzIiwic3RhbmRieVNlcnZlclVSTCI6Imh0dHBzOi8vc2Rscy5keW5hbXNvZnRvbmxpbmUuY29tIiwiY2hlY2tDb2RlIjoxMzM4NzkxMTE2fQ==";


        window.onload = async function () {
            try {
                await Dynamsoft.DBR.BarcodeScanner.loadWasm();
                await initBarcodeScanner();
            } catch (ex) {
                //alert(ex.message);
                throw ex;
            }
        };

        
        let scanner = null;
        async function initBarcodeScanner() {
            scanner = await Dynamsoft.DBR.BarcodeScanner.createInstance();
            scanner.onFrameRead = results => {
                //console.log(results);
                for (let result of results) {
                    document.getElementById('result').innerHTML = result.barcodeFormatString + ", " + result.barcodeText;


var valorBody = document.getElementById('result').innerHTML = result.barcodeText;
document.getElementById('ModalBuscarBody').value=valorBody;    
if(valorBody=true){
sonido.play();
DialogCamara.close();
//videoContainer.close();

} 

                    
                }
            };
            scanner.onUnduplicatedRead = (txt, result) => { };
            let openCamara;
if (DialogCamara) {
    document.getElementById('barcodeScanner').appendChild(scanner.getUIElement()).hidden= false; 

    
}else {document.getElementById('barcodeScanner').appendChild(scanner.getUIElement()).hidden= true;}
            
            document.getElementById('loading-status').hidden = true;
            document.getElementsByClassName('dce-sel-camera')[0].hidden = true;
            document.getElementsByClassName('dce-sel-resolution')[0].hidden = true;
            document.getElementsByClassName('dce-btn-close')[0].hidden = true;
            await scanner.show()
            
        }



var sonido = new Audio();
sonido.src="../Compartidos/sound_short.mp3";

        
    </script>
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

	<!-- Script JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script> -->

    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

	</body>
</html>