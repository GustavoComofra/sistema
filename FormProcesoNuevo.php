<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <!-- Script JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Archivo.js"></script>
  <!-- Estilo Alertas -->
  <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="css/estiloHome.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Logo Icono -->
  <link href="http://interno.comofrasrl.com.ar/sistema/img/Icono.png" rel="icon" type="image/png">
  <title>Proceso Nuevo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <?php
  include("header.php");
  session_start();
  $u = $_POST['txtUsuario'];
  ?>
  <script type="text/javascript">
    function volver() {
      window.location.href = "/sistema/index.php";
    }
  </script>
  <style>


  </style>
</head>

<body>

  <?php

  session_start();

  $varCerrarSession = $_SESSION['usuario'];

  if ($varCerrarSession == null || $varCerrarSession = '') {
    echo "<H1>" . "Usted no tiene autorizacion" . "<H1>";
    echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";

    die();
  }
  ?>


  <div class="container-fluid">
    <div class="row">

      <div class="col col-lg-2">
        <?php
        include("MarcoIzquierdo.php");

        ?>
      </div>
      <div class="col-md-auto">
        <form action="/sistema/FormProcesoNuevoItems.php" method="post" name="formNuevoProceso" enctype="multipart/form-data">
          <div class="form-group">
            <table class="table">
              
              <tr>
                <td colspan="2" align="left">
                  <label>Formulario Nuevo Proceso</label>
                </td>

              </tr>

              <tr>
                <td>
                  <label for="txtProceso">
                    <p>Proceso</p>
                  </label>
                  <input name="txtProceso" type="text" id="txtProceso" size="100" />
                </td>
              </tr>


              <tr>
                <td>
                  <label for="txtFechaInicio">
                    <p>Fecha Inicio</p>
                  </label>
                  <input name="txtFechaInicio" type="date" id="txtFechaInicio" value="<?php echo date("Y-m-d");?>"/>

                  <label for="txtFechaFinal">
                    <p>Fecha Final</p>
                  </label>
                  <input name="txtFechaFinal" type="date" id="txtFechaFinal" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="listProducto">
                    <p>Producto</p>
                  </label>
                  <select name="listProducto" size="1" id="listProducto">
                    <option value="0">Seleccione:</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryProductos = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductos = mysqli_fetch_array($queryProductos)) {
                      echo '<option value="' . $valoresProductos[CodSistema] . '">' . $valoresProductos[CodSistema] . "-" . $valoresProductos[Producto] . '</option>';
                    }
                    ?>
                  </select>

<!-- Inicio Trabajo -->

<!-- Inicio llamado base de datos productos-->
<script >
$(obtener_registros());

function obtener_registros(Productos)
{
   $.ajax({
       url : 'consultaProductos.php',
       type : 'POST',
       dataType : 'html',
       data : { Productos: Productos },
     })
	    //muestra los resultados en la tabla   
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
<!-- Fin llamado base de datos de productos -->

                  <input type="button" class="btn btn-secondary btn-sm" name="updateDetails" id="updateDetails" value="Buscar" ></button>
 <!-- Modal -->
 <dialog id="favDialog">
 <header>
			<div class="alert alert-info">
			<h2>Buscador Productos</h2>
			</div>
		</header>

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
 <!-- Fin Modal -->
<script>

//Inicio Boton seleccion 
 //https://youtu.be/MeCEJOVJyDs
$(function(){
    $('body').on('click','#TbProductos input[type=checkbox]', function(event){
       var idRegistro0 = $(this).attr('data-idRegristro');
       alert("Codigo seleccionado " +  idRegistro0);
       document.getElementById("listProducto").value=idRegistro0;
    });
  var updateButton = document.getElementById('updateDetails');
  var cancelButton = document.getElementById('cancel');
  var cerrarButton = document.getElementById('cerrar');
  var favDialog = document.getElementById('favDialog');

  // El botón Actualizar abre un cuadro de diálogo modal
  updateButton.addEventListener('click', function() {
    favDialog.showModal();
    
  });

  // El botón de cancelar formulario cierra el cuadro de diálogo
  cancelButton.addEventListener('click', function() {

   //document.Reset();
   // document.getElementById("busqueda").value="";
    //favDialog.close();
  });

          // El botón de cancelar formulario cierra el cuadro de diálogo
          cerrarButton.addEventListener('click', function() {
			favDialog.close();
    
  });
});
</script>
<!-- Fin Funciones  -->  

<!-- Inicio Tabla Ajax  -->  

<script>
     $('document').ready(function(){
         $('#TbProductos').DataTable({
              info: true,
              paging: true,
         });
        
     })
    </script>
<!-- Final Trabajo -->

                </td>

                <td>
                  <label for="listImplemento">
                    <p>Implemento</p>
                  </label>
                  <select name="listImplemento" size="1" id="listImplemento">
                    <option value="0">Seleccione:</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryImplemento = $mysqli->query("SELECT * FROM `ComImplemento` ORDER BY `ComImplemento`.`Implemento` ASC");
                    while ($valoresImplemento = mysqli_fetch_array($queryImplemento)) {
                      echo '<option value="' . $valoresImplemento[Implemento] . '">' . $valoresImplemento[Implemento] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="imagen">
                    <p>Imagen</p>
                  </label>
                  <input type="file" name="imagen" id="imagen">
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtPlano">
                    <p>Plano</p>
                  </label>
                  <input name="txtPlano" type="text" id="txtPlano" size="50" />
                </td>
              </tr>

              <tr>

              </tr>


            </table>
           
            <tr>
              <td>
                <label for="txtObservacion">
                  <p>Observacion</p>
                </label>
                <textarea name="txtObservacion" rows="2" cols="100" id="txtObservacion" title="Observacion"></textarea>
              </td>
              </td>
            </tr>
            <label>
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Cargar" />
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>

</html>