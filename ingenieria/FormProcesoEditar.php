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

<script type="text/javascript">

function volver()
{
	window.location.href = "/sistema/index.php";
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un estudio?');
}
	
</script>	

	<title>Proceso editar</title>
<body>
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>

	</div>
	
  <div class="container-fluid m-0">
  <div class="row">

			<!-- Menu Lateral -->
			<div id="divLateral" class="col-md-2 bg-dark min-vh-100 mt-0" style="height: 100%;  margin: 0; display: block;">
				<nav class="navbar flex navbar-dark bg-dark ">
					<div class="container btn-group ">

						<?php

						include("../layout/header/header-Center.php");

						?>

					</div>
				</nav>
			</div>
			<!-- Fin Menu Lateral -->
			<div class="col-9 mt-0" style="margin-left: 20px">

      <?php
include("../Conexion/conexion.php");
        $id_proceso = $_GET['id_proceso'];
        //echo $id_proceso; 
        $queryproceso = $mysqli->query("SELECT * FROM `VisProceso` WHERE `id_proceso` = " . $id_proceso . ";");
        $rowproceso = mysqli_fetch_assoc($queryproceso);   

$id_procesouser=$_GET['id_proceso'];
$queryvarid_proces2 = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoproceso2 = mysqli_fetch_assoc($queryvarid_proces2);

?>

        <form action="/sistema/ingenieria/EditarProceso.php" method="post" name="formEditarProceso" enctype="multipart/form-data">
          <div class="form-group">
          <table class="table table-hover">
              <tr>
                <td colspan="2" align="left">
                  <label>Formulario Nuevo Proceso</label>
                </td>

              </tr>
              <tr>
                <td>
                  <label for="txtid_proceso">
                    <p>id_proceso</p>
                  </label>
                  <input name="txtid_proceso" type="text" id="txtid_proceso" size="10" value="<?php print $rowproceso['id_proceso']; ?>"/>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtProceso">
                    <p>Proceso</p>
                  </label>
                  <input name="txtProceso" type="text" id="txtProceso" size="100" value="<?php print $rowproceso['Proceso']; ?>"/>
                </td>
              </tr>


              <tr>
                <td>
                  <label for="txtFechaInicio">
                    <p>Fecha Inicio</p>
                  </label>
                  <input name="txtFechaInicio" type="date" id="txtFechaInicio" value="<?php print $rowproceso['FechaInicio']; ?>"/>

                  <label for="txtFechaFinal">
                    <p>Fecha Final</p>
                  </label>
                  <input name="txtFechaFinal" type="date" id="txtFechaFinal" value="<?php print $rowproceso['FechaFinal']; ?>"/>
                </td>
              </tr>

              <tr>
              <td>
                  <label for="listProducto">
                    <p>Producto</p>
                  </label>
                  <input name="listProducto" type="number" id="listProducto" value="<?php print $rowproceso['ProductoProceso']; ?>" />


<!-- Inicio Trabajo -->

<!-- Inicio llamado base de datos productos-->
<script >
$(obtener_registros());

function obtener_registros(productoscmg)
{
   $.ajax({
       url : '../Compartidos/Producto/consultaProductos.php',
       type : 'POST',
       dataType : 'html',
       data : { productoscmg: productoscmg },
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
                  <option value="<?php print $rowprocesoproceso2['Implemento']; ?>"><?php print $rowprocesoproceso2['Implemento']; ?></option>
                    <?php
include("../Conexion/conexion.php");
                    $queryImplemento = $mysqli->query("SELECT * FROM `ComImplemento` ORDER BY `ComImplemento`.`Implemento` ASC");
                    while ($valoresImplemento = mysqli_fetch_array($queryImplemento)) {
                      echo '<option value="' . $valoresImplemento['Implemento'] . '">' . $valoresImplemento['Implemento'] . '</option>';
                    }
                    ?>
                  </select>
                </td>


              </tr>

              <tr>
              <td >
<figure class="figure imgEfc">
  <?php  echo '<img class="imgEfc" src="'.$rowproceso['imgprod'].'" alt=\"imgprod\" width=\"50\" height=\"50\"/>';?>
  
</figure>
<input name="txtimgprod" type="text" id="txtimgprod" size="100" value="<?php print $rowproceso['imgprod']; ?>"/>
  <?php
echo "<td>"."<a href=\"/sistema/ingenieria/FormEditImgProceso.php?id_proceso=".$rowproceso['id_proceso']."\" target=\"_blank\">
<img src=\"../img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
  ?>
  <!-- <figcaption class="figure-caption">Imagen principal</figcaption> -->
 

</td>
              </tr>

                <td>
                  <label for="txtPlano">
                    <p>Plano</p>
                  </label>
                  <input name="txtPlano" type="hidden" id="txtPlano" size="100" value="<?php print $rowproceso['Plano']; ?>"/>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtObservacion">
                    <p>Observacion</p>
                  </label>
                  <input name="txtObservacion" type="text" id="txtObservacion" size="100" value="<?php print $rowproceso['Observacion']; ?>"/>
                </td>
              </tr>     
              
              <tr>
                <td>
                  <label for="txtBaja">
                    <p>Baja</p>
                  </label>
                  <input name="txtBaja" type="text" id="txtBaja" size="10" value="<?php print $rowproceso['Baja']; ?>"/>
                </td>
              </tr>                   

              <tr>
              <table class="table table-striped">
  <thead>
  <?php 
 echo "<td>"."<a href=\"/sistema/ingenieria/FormItemProcesoNuevo.php?id_proceso=".$rowproceso['id_proceso']."\"><img src=\"../img/NuevoIcono.png\" alt=\"HoraTeorico\" width=\"40\" height=\"40\"></a></td>\n";
  ?>
    <tr>
  
      <th scope="col">Op</th>
      <th scope="col">Item</th>
      <th scope="col">Prod</th>
      <th scope="col">img</th>
      <th scope="col">Min</th>
      <th scope="col">Herr</th>
      <th scope="col">Adv</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
<?php 

  $queryItemproceso = $mysqli -> query ("SELECT * FROM `VistItemProceso` WHERE `Fk_Proceso` =".$id_proceso." ORDER BY `VistItemProceso`.`Op` ASC;");
  
  while ($filaItemproceso = mysqli_fetch_array($queryItemproceso))
 
 {
  
 echo "<TR>\n"; 
 //echo "<th>".$filaItemproceso['id_itemproceso']."</th>\n";
 echo "<th>".$filaItemproceso['Op']."</th>\n";
 echo "<td>".$filaItemproceso['id_itemproceso']."-".$filaItemproceso['ItemProceso']."</td>\n";
 echo "<td>".$filaItemproceso['Fk_ProdProc']."-".$filaItemproceso['Producto']."</td>\n";
 
 if($filaItemproceso['tamanio']=="Grande"){
  echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="300" heigth="300"/>'. $filaItemproceso['img_itemproce']."</td>\n";

 }else if($filaItemproceso['tamanio']=="Mediano"){
  echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="200" heigth="200"/>'. $filaItemproceso['img_itemproce']."</td>\n";
 }else{
  echo "<td >".'<img class=\"imgEfcProceso\" src="'.$filaItemproceso['img_itemproce'].'" style="border-radius: 10% 10%;" width="100" heigth="100"/>'. $filaItemproceso['img_itemproce']."</td>\n";
 }


 echo "<td>".$filaItemproceso['TiempoEstandarMi']."</td>\n";
 echo "<td>".$filaItemproceso['Herramienta']."</td>\n";
 echo "<td class=\"Advertencia\">"."<strong class=\"Advertencia\">".$filaItemproceso['Advertencia']."</strong>"."</td>\n";	
 echo "<td>"."<a href=\"/sistema/ingenieria/FormItemProcesoEditar.php?id_itemproceso=".$filaItemproceso['id_itemproceso']."\">
 <img src=\"../img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n"; 

 echo "<td>"."<a onClick=\"AlertarBorraItem()\" href=\"/sistema/ingenieria/FormItemProcesoBorrar.php?id_itemproceso=".$filaItemproceso['id_itemproceso']."\">
 <img src=\"../img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
 echo "</TR>\n";
  
 }

 ?>

   </tbody>
</table> 
              </tr>


            </table>
           
            <label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar" />
      </label>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Script JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/Archivo.js"></script>
	<script type="text/javascript" src="https://interno.comofrasrl.com.ar/sistema/js/general.js"></script>
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

	<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>

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