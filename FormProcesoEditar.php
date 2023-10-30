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
	<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
  <title>Editar Proceso</title>
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
    function AlertarBorraItem()
{
	
	alert('Usted esta por borra un Item de proceso');
}
  </script>
</head>
</script>	

<style>
.imgEfc{
  position: relative;
  width: 50px;
  height: 50px;

}
.Advertencia{
  color: red;
}

.imgEfc:hover {

	
/*width: 100%;
height: 100%;*/


}

</style>
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
<?php
        include("Conexion/conexion.php");
        $id_proceso = $_GET['id_proceso'];
        //echo $id_proceso; 
        $queryproceso = $mysqli->query("SELECT * FROM `VisProceso` WHERE `id_proceso` = " . $id_proceso . ";");
        $rowproceso = mysqli_fetch_assoc($queryproceso);   

$id_procesouser=$_GET['id_proceso'];
$queryvarid_proces2 = $mysqli -> query ("SELECT * FROM `Proceso` WHERE `id_proceso` = ".$id_proceso.";");
$rowprocesoproceso2 = mysqli_fetch_assoc($queryvarid_proces2);

?>

  <div class="container-fluid">
    <div class="row">

      <div class="col col-lg-2">
        <?php
        include("MarcoIzquierdo.php");

        ?>
      </div>
      <div class="col-md-auto">
        <form action="/sistema/EditarProceso.php" method="post" name="formEditarProceso" enctype="multipart/form-data">
          <div class="form-group">
            <table class="table">
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
                  <!-- <select name="listProducto" size="1" id="listProducto">
                    <option value="0">Seleccione:</option>
                    <?php
                   /* include("Conexion/conexion.php");
                    $queryProductos = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductos = mysqli_fetch_array($queryProductos)) {
                      echo '<option value="' . $valoresProductos[CodSistema] . '">' . $valoresProductos[CodSistema] . "-" . $valoresProductos[Producto] . '</option>';
                    }*/
                    ?>
                  </select> -->

<!-- Inicio Trabajo -->

<!-- Inicio llamado base de datos productos-->
<script >
$(obtener_registros());

function obtener_registros(productoscmg)
{
   $.ajax({
       url : 'consultaProductos.php',
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
                  <option value="<?php print $rowprocesoproceso2['Implemento']; ?>"><?php print $rowprocesoproceso2['Implemento']; ?></option>
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
              <td >
<figure class="figure imgEfc">
  <?php  echo '<img class="imgEfc" src="'.$rowproceso['imgprod'].'" alt=\"imgprod\" width=\"50\" height=\"50\"/>';?>
  
</figure>
<input name="txtimgprod" type="text" id="txtimgprod" size="100" value="<?php print $rowproceso['imgprod']; ?>"/>
  <?php
echo "<td>"."<a href=\"/sistema/FormEditImgProceso.php?id_proceso=".$rowproceso['id_proceso']."\" target=\"_blank\">
<img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
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
 echo "<td>"."<a href=\"/sistema/FormItemProcesoNuevo.php?id_proceso=".$rowproceso['id_proceso']."\"><img src=\"../sistema/img/NuevoIcono.png\" alt=\"HoraTeorico\" width=\"40\" height=\"40\"></a></td>\n";
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
 echo "<td>"."<a href=\"/sistema/FormItemProcesoEditar.php?id_itemproceso=".$filaItemproceso['id_itemproceso']."\">
 <img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n"; 

 echo "<td>"."<a onClick=\"AlertarBorraItem()\" href=\"/sistema/FormItemProcesoBorrar.php?id_itemproceso=".$filaItemproceso['id_itemproceso']."\">
 <img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";
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


</body>

</html>