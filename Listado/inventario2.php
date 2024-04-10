<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		
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
       url : 'consultaProductos.php',
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
<title>Inventario</title>
	</head>


	<body>

    <div class="m-0">
		<?php

		include("../layout/header/header-Top.php");
		/*session_start();
$u = $_POST['txtUsuario']; */

		?>
	</div>

    <div class="container-fluid m-0">
		<div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container-fluid btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->

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
//include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>	
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
    <script src="overlay.js"></script>


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

<div class="container-fluid">
<form id="app-form" name="formInventario" >
<input type="hidden" id="idInventario">
    <button type="button" class="btn btn-info"  name="updateDetails" id="updateDetails" ><span class="glyphicon glyphicon glyphicon-search"></span> - Buscar</button>
    <button type="button" class="btn btn-info" name="MostrarCamara" id="MostrarCamara" ><span class="glyphicon glyphicon glyphicon-barcode"></span> - Scanner</button>
    <input type="number" id="ModalBuscarBody" placeholder="Valor Seleccionado" required>
    <input type="number" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" step="any" required >
    <input type="text" id="txtObsInv" min="1" name="txtObsInv" size="50" placeholder="Observacion">
    <input type="hidden" id="txtUser" min="1" name="txtUser" size="50" value="<?php echo $_SESSION['usuario'];  ?>">
   <p>
      <button type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" ><span class="glyphicon glyphicon glyphicon-floppy-open"></span> - Guardar</button>
      </p>


      </form>
     
      <div class="">

      <table class="table table-bordered table-sm">
            <thead>
                <tr>
                <td>id</td>
                    <td>CodCmg</td>
                    <td>Prod</td>
                    <td>UM</td>
                    <td>Cantidad</td>
                    <td>ObsInv</td>
                    <td></td>
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
        // Dynamsoft.DBR.BarcodeReader.license = "DLS2eyJoYW5kc2hha2VDb2RlIjoiMjAwMDAxLTE2NDk4Mjk3OTI2MzUiLCJvcmdhbml6YXRpb25JRCI6IjIwMDAwMSIsInNlc3Npb25QYXNzd29yZCI6IndTcGR6Vm05WDJrcEQ5YUoifQ==";

        Dynamsoft.DBR.BarcodeReader.license = "t0068lQAAAKr5TRY0pYCChDjdezIQJvBMadl2T7B7Yd8OVoDitNsBAoL0xz2rtZPgZ1Y+4fHV3AMpt8+EImnEtCeWZNdFM7M=;t0068lQAAAIvyVDlbCJGGl6rZ/D8PAFe9ah5yN0WyvUHSDm0WAF7uwa/rn1iAZb5OwDYD135oGqkZFJ1fH0I7Uqlgz55mMU8=";


        window.onload = async function () {
            try {
                await Dynamsoft.DBR.BarcodeScanner.loadWasm();
                await initBarcodeScanner();
            } catch (ex) {
                alert(ex.message);
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
sonido.src="sound_short.mp3";

        
    </script>

</div>
</div>	


 <!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
    <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/app.js"></script>
    <script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/peticionProducto.js"></script>
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


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
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>


</body>
</html>