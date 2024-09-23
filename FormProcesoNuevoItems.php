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
 <?php 

include("Conexion/conexion.php");

//Procesos
$Proceso=$_POST['txtProceso'];
$Producto= $_POST['listProducto'];
$Implemento= $_POST['listImplemento'];
$FechaInicio=$_POST['txtFechaInicio'];
$FechaFinal=$_POST['txtFechaFinal'];

$nombre_imagenProce=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.interno.comofrasrl.com.ar/sistema/img/procesos/' . $nombre_imagenProce;
move_uploaded_file($_FILES['imagen']['tmp_name'], "img/procesos/".$nombre_imagenProce);
$imgProce = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagenProce;

$Plano= $_POST['txtPlano'];
$Observacion= $_POST['txtObservacion'];

$user =$_SESSION['usuario'];

$insertarProceso = "INSERT INTO `Proceso` (`id_proceso`, `Proceso`, `ProductoProceso`, `Implemento`, `FechaInicio`, `FechaFinal`, `imgprod`, `plano`, `Observacion`, `Baja`, `user`) VALUES (NULL, '$Proceso', '$Producto', '$Implemento', '$FechaInicio', '$FechaFinal', '$imgProce', '$Plano', '$Observacion', 'No', '$user');";

$ejecutar_Proceso=mysqli_query($mysqli,$insertarProceso);

?>

  <div class="container-fluid">
    <div class="row">

      <div class="col col-lg-2">
        <?php
        include("MarcoIzquierdo.php");

        ?>
        <?php
        include("Conexion/conexion.php");

$id_procesouser=$_POST['id_proceso'];
echo $id_procesoNuevo;
$queryvarid_procesNuevo = $mysqli -> query ("SELECT * FROM `Proceso` ORDER BY `id_proceso` DESC LIMIT 1;");
$rowprocesoprocesoNuevo = mysqli_fetch_assoc($queryvarid_procesNuevo);

?>
      </div>
      <div class="col-md-auto">
        <form action="/sistema/insertarProceso.php" method="post" name="formNuevoProceso" enctype="multipart/form-data">
          <div class="form-group">
            <table class="table">
              <tr>
                <td colspan="2" align="left">
                  <label>Formulario Nuevo Proceso</label>
                </td>

              </tr>

              <tr>
                <td>
                <label for="txtFk_Proceso">
                    <p>Num:</p>
                  </label>
                  <input name="txtFk_Proceso" type="text" id="txtFk_Proceso" value="<?php print $rowprocesoprocesoNuevo['id_proceso']; ?>" />
                  <label for="txtProceso">
                    <p>Proceso</p>
                  </label>
                  <input name="txtProceso" type="text" id="txtProceso" value="<?php print $rowprocesoprocesoNuevo['Proceso']; ?>"/>
                </td>
              </tr>
              <tr>
              </tr>
            </table>

            <table class="table">
              <tr>
                <td colspan="11"  ><label>Procesos</label></td>
              </tr>
              <tr>
                <td width="">Op</td>
                <td width="">Proceso</td>
                
                <td width="">Cant Op</td>
                <td width="">Tiempo</td>
                <td width="">Imagen</td>
  
                <td width="">Prod</td>
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
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
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
                    <input name="txtTiempoEstandarMi1" id="txtTiempoEstandarMi1"type="text" max="200" size="3" value="1">
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
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
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
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
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
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
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


  <!--Item 4 -->
              <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp4" id="txtOp4" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso4" id="txtItemProceso4" title="ItemProceso4" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper4" id="txtCantOper4" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi4" id="txtTiempoEstandarMi4" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce4" id="img_itemproce4"></td>

                <td>
                  <select name="listProductoProc4"  id="listProductoProc4" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta4" size="2" id="listFk_Herramienta4">
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

                <td><textarea name="txtAdvertencia4" id="txtAdvertencia4" title="Advertencia4" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi3" id="txtTiempoInefMi3" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio3" id="txtInicio3" value="" /></td>
                <td><input type="datetime-local" name="txtFinal3" id="txtFinal3" value="" /></td>
              </tr>
              <!--Fin Item 4 -->

 <!--Item 5 -->
 <tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp5" id="txtOp5" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso5" id="txtItemProceso5" title="ItemProceso5" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper5" id="txtCantOper5" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi5" id="txtTiempoEstandarMi5" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce5" id="img_itemproce5"></td>

                <td>
                  <select name="listProductoProc5"  id="listProductoProc5" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta5" size="2" id="listFk_Herramienta5">
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

                <td><textarea name="txtAdvertencia5" id="txtAdvertencia5" title="Advertencia5" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi5" id="txtTiempoInefMi5" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio5" id="txtInicio5" value="" /></td>
                <td><input type="datetime-local" name="txtFinal5" id="txtFinal5" value="" /></td>
              </tr>
              <!--Fin Item 5 -->
<!--Item 6 -->
<tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp6" id="txtOp6" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso6" id="txtItemProceso6" title="ItemProceso6" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper6" id="txtCantOper6" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi6" id="txtTiempoEstandarMi6" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce6" id="img_itemproce6"></td>

                <td>
                  <select name="listProductoProc6"  id="listProductoProc6" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta6" size="2" id="listFk_Herramienta6">
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

                <td><textarea name="txtAdvertencia6" id="txtAdvertencia6" title="Advertencia6" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi6" id="txtTiempoInefMi6" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio6" id="txtInicio6" value="" /></td>
                <td><input type="datetime-local" name="txtFinal6" id="txtFinal6" value="" /></td>
              </tr>
              <!--Fin Item 6 -->

<!--Item 7 -->
<tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp7" id="txtOp7" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso7" id="txtItemProceso7" title="ItemProceso7" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper7" id="txtCantOper7" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi7" id="txtTiempoEstandarMi7" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce7" id="img_itemproce7"></td>

                <td>
                  <select name="listProductoProc7"  id="listProductoProc7" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta7" size="2" id="listFk_Herramienta7">
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

                <td><textarea name="txtAdvertencia7" id="txtAdvertencia7" title="Advertencia7" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi7" id="txtTiempoInefMi7" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio7" id="txtInicio7" value="" /></td>
                <td><input type="datetime-local" name="txtFinal7" id="txtFinal7" value="" /></td>
              </tr>
              <!--Fin Item 7 -->


<!--Item 8 -->
<tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp8" id="txtOp8" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso8" id="txtItemProceso8" title="ItemProceso8" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper8" id="txtCantOper8" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi8" id="txtTiempoEstandarMi8" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce8" id="img_itemproce8"></td>

                <td>
                  <select name="listProductoProc8"  id="listProductoProc8" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta8" size="2" id="listFk_Herramienta8">
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

                <td><textarea name="txtAdvertencia8" id="txtAdvertencia8" title="Advertencia8" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi8" id="txtTiempoInefMi8" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio8" id="txtInicio8" value="" /></td>
                <td><input type="datetime-local" name="txtFinal8" id="txtFinal8" value="" /></td>
              </tr>
              <!--Fin Item 8 -->



<!--Item 9 -->
<tr>
                <td>
                  <div class="quantity">
                    <input name="txtOp9" id="txtOp9" type="text" max="200" size="3" value="0">
                  </div>
                </td>
                <td><textarea name="txtItemProceso9" id="txtItemProceso9" title="ItemProceso9" rows="2" cols="20"></textarea></td>
                <td>
                  <div class="quantity">
                    <input name="txtCantOper9" id="txtCantOper9" type="number" min="0" max="10" value="1">
                  </div>
                </td>
                <td>
                  <div class="quantity">
                    <input name="txtTiempoEstandarMi9" id="txtTiempoEstandarMi9" type="text" max="200" size="3" value="1">
                  </div>
                </td>
                <td width=""><input type="file" name="img_itemproce9" id="img_itemproce9"></td>

                <td>
                  <select name="listProductoProc9"  id="listProductoProc9" size="1">
                    <option value="0" selected="selected">- - 0</option>
                    <?php
                    $mysqli = new mysqli($host, $usr, $clave, $db);
                    if ($mysqli->connect_errno) {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $queryProductosProc = $mysqli->query("SELECT * FROM `Productos`");
                    while ($valoresProductosProc = mysqli_fetch_array($queryProductosProc)) {
                      echo '<option value="' . $valoresProductosProc[CodSistema] . '">' . $valoresProductosProc[Producto] . " - " . $valoresProductosProc[CodSistema] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>
                  <select name="listFk_Herramienta9" size="2" id="listFk_Herramienta9">
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

                <td><textarea name="txtAdvertencia9" id="txtAdvertencia9" title="Advertencia9" rows="2" cols="20"></textarea></td>
                <td><input  type="text" name="txtTiempoInefMi9" id="txtTiempoInefMi9" title="TiempoInefMi2" size="4" /></td>
                <td><input type="datetime-local" name="txtInicio9" id="txtInicio9" value="" /></td>
                <td><input type="datetime-local" name="txtFinal9" id="txtFinal9" value="" /></td>
              </tr>
              <!--Fin Item 9 -->




            </table>
            
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