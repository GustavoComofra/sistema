<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <!-- Script JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
  <title>Nuevo item de proceso</title>
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

      <?php
      include("Conexion/conexion.php");
      $id_proceso = $_GET['id_proceso'];

      $queryprocesoItem = $mysqli->query("SELECT * FROM `VisProceso` WHERE `id_proceso` = " . $id_proceso . ";");

      $rowprocesoItem = mysqli_fetch_assoc($queryprocesoItem);
      ?>

      <div class="">
        <form action="/sistema/insertarProcesoItem.php" method="post" name="formNuevoItemProceso" enctype="multipart/form-data">


        
          <div class="form-group">

            <table class="table">
              <tr>
                <td colspan="2" align="left">
                  <label>Nuevo item de proceso</label>
                </td>

              </tr>

              <tr>
                <td>
                  <label for="txtid_proceso">
                    <p>id_proceso</p>
                  </label>
                  <input name="txtid_proceso" type="text" id="txtid_proceso" size="10" value="<?php print $rowprocesoItem['id_proceso']; ?>" />
                </td>

                <td>
                  <figure class="figure imgEfc">
                    <?php echo '<img class="imgEfc" src="' . $rowprocesoItem['imgprod'] . '" alt=\"imgprod\" width=\"50\" height=\"50\"/>'; ?>
                    <figcaption class="figure-caption">Imagen principal</figcaption>

                </td>

              </tr>

              <tr>
                <td>
                  <label for="txtProceso">
                    <p>Proceso</p>
                  </label>
                  <input name="txtProceso" type="text" id="txtProceso" size="50" value="<?php print $rowprocesoItem['Proceso']; ?>" />
                </td>

                <td>
                  <label for="txtProducto">
                    <p>Producto</p>
                  </label>
                  <input name="txtProducto" type="text" id="txtProducto" size="50" value="<?php print $rowprocesoItem['Producto']; ?>" />
                </td>
              </tr>
              <tr>
              </tr>


            </table>
            <table class="table">
              <tr>
                <td colspan="11" align="center"><label>Procesos</label></td>
              </tr>
              <tr>
                <td width="">Op</td>
                <td width="">Proceso</td>
                <td width="">Cant Op</td>
                <td width="">Tiempo</td>
                <td width="">Imagen</td>
                <td width="20">Prod</td>
                <td width="">Herramienta</td>
                <td width="">Advertencia</td>
                <td width="">Ineficiencia</td>
                <td width="">Inicio</td>
                <td width="">Final</td>
                
                
                
              </tr>

              <!--Item 0 -->
              <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp" id="txtOp" type="text" max="200" size="3" value="10" >
                  </div>
                </td>
                <td><textarea name="txtItemProceso" rows="2" cols="20" id="txtItemProceso" title="ItemProceso"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper" id="txtCantOper" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi" id="txtTiempoEstandarMi" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce" id="img_itemproce"></td>

                <td>
                  <select name="listProductoProc"  id="listProductoProc" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[CodSistema] . " - " . $valoresProductosProc[Producto] . '</option>';
                    }
                    ?>
                  </select>
 <!-- Modal -->
   <!-- Inicio Trabajo -->
 <dialog id="favDialog">


  <form method="post" action="#" id="formBusqueda" >

  
<div >
  <table class="table">
    <tr>
      <td colspan="" align="center"><label>Buscar Productos</label></td>
    </tr>
    <tr>
    <th width="">CodSistema:</th>
      <td width=""><input name="txtCodSistemaB" type="text" id="txtCodSistemaB" size="11"/>
      <th width="">Productos:</th>
      <td width=""><input name="txtProductoB" type="text" id="txtProductoB" size="50"/>

<label>
   <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" formaction=""/>

</label>	

			
		</td>
    </tr>
	</table>
	</div>

<div id="resBusq">

<?php
echo "
<table class=\"table table-striped\">
  <thead>
<th colspan=\"4\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Herramientas cargadas</th>
 </thead>
</tr>
<TR>
<TD><B>Selec</B></TD>
<TD><B>Cod</B></TD>
<TD><B>Producto</B></TD>
<TD><B>imagen</B></TD>
</TR>
";		
$CodSistemaB=$_POST['txtCodSistemaB'];	
$ProductoB=$_POST['txtProductoB'];


include("Conexion/conexion.php");	

$queryProdB = $mysqli -> query ("SELECT * FROM `Productos` WHERE `Producto` LIKE '%$ProductoB%' AND `CodSistema` LIKE '%$CodSistemaB%'");
  
 while ($filaProdB = mysqli_fetch_array($queryProdB))

{
echo "<TR>\n";


echo "<td>".$filaProdB['CodSistema']."<input type=\"checkbox\" id=\"Select\" name=\"Select[]\" value=".$filaProdB['CodSistema'].">"."<script>

function miFuncion() {
  var valor = document.getElementById(\"Select\").value;
  console.log(valor);
  document.getElementById(\"listProductoProc\").value=valor;
  document.getElementById(\"ModalBuscar\").value=valor;
}
</script>"."</td>";
$varCod = $filaProdB['CodSistema'];
echo "<td>"."<input type=\"checkbox\" name=\"checktodos1[]\"  id=\"checktodos1\" class=\"lista1\" value=\"$varCod\"> </td>\n";
echo "<td>".$filaProdB['Producto']."</td>\n";
echo "<td>".'<img  src="'.$filaProdB['imagen'].'" style="border-radius: 50% 50%" width="50" heigth="50"/>'."</td>\n";
echo "</TR>\n";


}



echo "</table>" ;
mysqli_close($mysqli);
		
?>

<script>
$(document).ready(function(){
	$('#checktodos1').click(function(){
var val = this.checked;
//alert(val);
$('.lista1').each(function(){
$(this).prop('checked',val);
	});
 });
});	
	
</script>

<input type="text" name="txtCUIT_Empl1"  id="txtCUIT_Empl1" size="11" value="<?php 
																			 
 foreach($_POST['checktodos1'] as $selected)	
	
  {
echo "$selected";
	
  } 																			 
?>" />	


</div>



    <section>
      <p><label for="ModalBuscar">Valor Seleccionado:</label>
      <input type="number" id="ModalBuscar">
    <menu>
      <button id="cancel" type="reset">Cancel</button>
      <button type="button" onclick="miFuncion()" >Confirm</button>
      <button type="button" id="cerrar" >cerrar</button>
    </menu>
  </form>
</dialog>
<input type="button" class="btn btn-info" name="updateDetails" id="updateDetails" value="Buscar" ></button>

<script>

(function() {
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
    favDialog.close();
  });

          // El botón de cancelar formulario cierra el cuadro de diálogo
          cerrarButton.addEventListener('click', function() {
    favDialog.close();
    
  });

})();


</script>

<!-- Final Trabajo -->
                </td>

                <td>
                  <select name="listFk_Herramienta"  id="listFk_Herramienta" size="1">
                    <option value="1" selected="selected">-</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryHerramienta = $mysqli->query("SELECT * FROM `Herramienta`");
                    while ($valoresHerramienta = mysqli_fetch_array($queryHerramienta)) {
                      echo '<option value="' . $valoresHerramienta[id_herr] . '">' . $valoresHerramienta[Herramienta] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td><textarea name="txtAdvertencia"  id="txtAdvertencia" title="Advertencia" rows="2" cols="20"></textarea></td>
                <td><input name="txtTiempoInefMi" type="text" id="txtTiempoInefMi" title="TiempoInefMi" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio" id="txtInicio" value="" /></td>
                <td><input type="datetime-local" name="txtFinal" id="txtFinal" value="" /></td>
              </tr>
              <!--Fin Item 0 -->
              <!--Item 1 -->
              <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp1" id="txtOp1" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso1" id="txtItemProceso1" title="ItemProceso1" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper1" id="txtCantOper1" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi1" id="txtTiempoEstandarMi1" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce1" id="img_itemproce1"></td>

                <td>
                  <select name="listProductoProc1" size="1" id="listProductoProc1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[CodSistema] . " - " . $valoresProductosProc[Producto] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta1" size="1" id="listFk_Herramienta1">
                    <option value="1" selected="selected">-</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryHerramienta = $mysqli->query("SELECT * FROM `Herramienta`");
                    while ($valoresHerramienta = mysqli_fetch_array($queryHerramienta)) {
                      echo '<option value="' . $valoresHerramienta[id_herr] . '">' . $valoresHerramienta[Herramienta] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td><textarea name="txtAdvertencia1" id="txtAdvertencia1" title="Advertencia" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi1" id="txtTiempoInefMi1" title="TiempoInefMi1" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio1" id="txtInicio1" value="" /></td>
                <td><input type="datetime-local" name="txtFinal1" id="txtFinal1" value="" /></td>
              </tr>
              <!--Fin Item 1 -->
              <!--Item 2 -->
              <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp2" id="txtOp2" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso2" id="txtItemProceso2" title="ItemProceso2" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper2" id="txtCantOper2" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi2" id="txtTiempoEstandarMi2" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce2" id="img_itemproce2"></td>

                <td>
                  <select name="listProductoProc2"  id="listProductoProc2" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[CodSistema] . " - " . $valoresProductosProc[Producto] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta2" size="2" id="listFk_Herramienta2">
                    <option value="1" selected="selected">-</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryHerramienta = $mysqli->query("SELECT * FROM `Herramienta`");
                    while ($valoresHerramienta = mysqli_fetch_array($queryHerramienta)) {
                      echo '<option value="' . $valoresHerramienta[id_herr] . '">' . $valoresHerramienta[Herramienta] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td><textarea name="txtAdvertencia2" id="txtAdvertencia2" title="Advertencia" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi2" id="txtTiempoInefMi2" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio2" id="txtInicio2" value="" /></td>
                <td><input type="datetime-local" name="txtFinal2" id="txtFinal2" value="" /></td>
              </tr>
              <!--Fin Item 2 -->
              <!--Item 3 -->
              <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp3" id="txtOp3" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso3" id="txtItemProceso3" title="ItemProceso3" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper3" id="txtCantOper3" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi3" id="txtTiempoEstandarMi3" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce3" id="img_itemproce3"></td>

                <td>
                  <select name="listProductoProc3"  id="listProductoProc3" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[CodSistema] . " - " . $valoresProductosProc[Producto] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta3" size="2" id="listFk_Herramienta3">
                    <option value="1" selected="selected">-</option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryHerramienta = $mysqli->query("SELECT * FROM `Herramienta`");
                    while ($valoresHerramienta = mysqli_fetch_array($queryHerramienta)) {
                      echo '<option value="' . $valoresHerramienta[id_herr] . '">' . $valoresHerramienta[Herramienta] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td><textarea name="txtAdvertencia3" id="txtAdvertencia3" title="Advertencia3" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi3" id="txtTiempoInefMi3" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio3" id="txtInicio3" value="" /></td>
                <td><input type="datetime-local" name="txtFinal3" id="txtFinal3" value="" /></td>
              </tr>
              <!--Fin Item 3 -->
            </table>

            <label>
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Nuevo Item" />
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>