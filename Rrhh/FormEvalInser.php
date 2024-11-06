<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;">

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
  function volver() {
    window.location.href = "/sistema/index.php";
  }

  function AlertarBorra() {

    alert('Esta seguro de borrar un estudio?');
  }
</script>

<title>Nuevo Personal</title>

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

        <form action="#" method="post" name="formLocalidad" enctype="multipart/form-data">

          <div  >
            <table class="table table-hover">
              <tr>
                <td colspan="2"  ><strong>
                    <h3>Formulario Evaluacion</h3>
                  </strong></td>
              </tr>

              <tr>
                <th>Prod :</th>
                <td><select name="listProd" size="1" id="listProd">
                    <option value="0">valor:</option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryEvalProd = $mysqli->query("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");


                    while ($valoresEvalProd = mysqli_fetch_array($queryEvalProd)) {

                      echo '<option value="' . $valoresEvalProd['Valor'] . '">' . $valoresEvalProd['Valor'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>


              <tr>
                <th>Calidad :</th>
                <td><select name="listCalidad" size="1" id="listCalidad">
                    <option value="0">valor:</option>
                    <?php
                    //include("Conexion/conexion.php");

                    $queryEvalCalidad = $mysqli->query("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");

                    while ($valoresEvalCalidad = mysqli_fetch_array($queryEvalCalidad)) {

                      echo '<option value="' . $valoresEvalCalidad['Valor'] . '">' . $valoresEvalCalidad['Valor'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>


              <tr>
                <th>SyH :</th>
                <td><select name="listSyH" size="1" id="listSyH">
                    <option value="0">valor:</option>
                    <?php
                    //include("Conexion/conexion.php");

                    $queryEvalSyH = $mysqli->query("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");

                    while ($valoresEvalSyH = mysqli_fetch_array($queryEvalSyH)) {

                      echo '<option value="' . $valoresEvalSyH['Valor'] . '">' . $valoresEvalSyH['Valor'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>


              <tr>
                <th width="">Compromiso :</th>
                <td><select name="listCompromiso" size="1" id="listCompromiso">
                    <option value="0">valor:</option>
                    <?php
                    //include("Conexion/conexion.php");

                    $queryEvalCompromiso = $mysqli->query("SELECT * FROM `ComValorEval` ORDER BY `ComValorEval`.`Valor` ASC");

                    while ($valoresEvalCompromiso = mysqli_fetch_array($queryEvalCompromiso)) {

                      echo '<option value="' . $valoresEvalCompromiso['Valor'] . '">' . $valoresEvalCompromiso['Valor'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>
                <th>CUIT :</th>
                <td><select name="listCUIT" size="1" id="listCUIT">
                    <option value="0">Apellido:</option>
                    <?php
                    //include("Conexion/conexion.php");

                    $queryCUIT = $mysqli->query("SELECT * FROM `ComEmpleado` ORDER BY `ComEmpleado`.`CUIT_Empl` ASC");

                    while ($valoresCUIT = mysqli_fetch_array($queryCUIT)) {

                      echo '<option value="' . $valoresCUIT['CUIT_Empl'] . '">' . $valoresCUIT['Apellidos'] . '</option>';
                    }
                    ?>
                  </select>

                </td>
              </tr>

              <tr>
                <td>Fecha:</td>
                <td><input name="txtFecha" type="date" id="txtFecha" size="50" value="<?php echo date("Y-m-d"); ?>" /></td>
              </tr>

              <tr>
                <td>Obser: </td>
                <td><input name="txtObser" type="text" id="txtObser" size="50" />


                  <label>
                    <input type="submit" class="btn btn-success" name="btnEnviar" id="btnEnviar" value="Cargar" />
                  </label>


                </td>

              </tr>


            </table>
          </div>

          <hr>

          <?php

          $Prod = $_POST['listProd'];
          $Calidad = $_POST['listCalidad'];
          $SyH = $_POST['listSyH'];
          $Compromiso = $_POST['listCompromiso'];
          $CUIT = $_POST['listCUIT'];
          $Fecha = $_POST['txtFecha'];
          $Obser = $_POST['txtObser'];

          if (!$CUIT == null) {

            echo "<p>" . "cargado" . "</p>";
            //include("Conexion/conexion.php");	

            $insertarValEval = "INSERT INTO `ComEvaluacion` (`Id_Eval`, `Prod`, `Calidad`, `SyH`, `Compromiso`, `CUIT_Eval`, `FechaEval`, `Obs`) VALUES (NULL, '$Prod', '$Calidad', '$SyH', '$Compromiso', '$CUIT', '$Fecha', '$Obser');";

            $ejecutar_insertar = mysqli_query($mysqli, $insertarValEval);
          }

          mysqli_close($mysqli);

          ?>

        </form>


        <form action="#" method="post" name="formBuscar" enctype="multipart/form-data">

          <div  >
            <table class="table table-hover">
              <tr>
                <td colspan="2"  ><strong>
                    <h3>Buscar</h3>
                  </strong></td>
              </tr>
              <tr>

                <th>Fecha :</th>
                <td>

                  <p>

                    <label for="txtDesde">Desde:</label>
                    <input name="txtDesde" type="date" id="txtDesde" value="<?php echo date("Y-m-d"); ?>" size="15">
                    <label for="txtHasta">Hasta:</label>
                    <input name="txtHasta" type="date" id="txtHasta" value="<?php echo date("Y-m-d"); ?>" size="15">

                  </p>

                </td>
              </tr>


              <tr>
                <th>CUIT :</th>
                <td><input name="txtCUITB" type="text" id="txtCUITB" size="11" />
                </td>
              </tr>
              <tr>
              <tr>
                <th>Nombre :</th>
                <td><input name="txtNombreB" type="text" id="txtNombreB" size="11" />
                </td>
              </tr>
              <th>Apellido :</th>
              <td><input name="txtApellidoB" type="text" id="txtApellidoB" size="11" />

                <label>
                  <input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Buscar" />
                </label>

              </td>
              </tr>
            </table>
          </div>

          <?php
          echo "
<table border=1 align=\"\" class=\"table table-striped\">
  <thead>
<th colspan=\"6\" align=\"center\" bgcolor=\"#5D81F5\"><span class=\"\">Localidades</th>
 </thead>
</tr>
<TR>
<TD><B>Id</B></TD>
<TD><B>Fecha</B></TD>
<TD><B>CUIT</B></TD>
<TD><B>Apellido</B></TD>
<TD><B>Nombre</B></TD>
<TD><B>Prod</B></TD>
<TD><B>Calidad</B></TD>
<TD><B>SyH</B></TD>
<TD><B>Comp</B></TD>
<TD><B>Total</B></TD>
<TD><B>Editar</B></TD>
<TD><B>Borrar</B></TD>
</TR>
";
          $NombreB = $_POST['txtNombreB'];
          $ApellidoB = $_POST['txtApellidoB'];
          $CUITB = $_POST['txtCUITB'];
          $FechaDesde = $_POST['txtDesde'];
          $FechaHasta = $_POST['txtHasta'];

          //include("Conexion/conexion.php");	
          $queryEvaluacionB = $mysqli->query("SELECT * FROM `ComEval` WHERE `CUIT_Eval` LIKE '%$CUITB%' AND `FechaEval` >= '$FechaDesde' AND `Apellidos` LIKE '%$ApellidoB%' AND `Nombres` LIKE '%$NombreB%' ORDER BY `FechaEval` DESC");

          while ($filaEvaluacionB = mysqli_fetch_array($queryEvaluacionB)) {
            echo "<TR>\n";
            echo "<td>" . $filaEvaluacionB['Id_Eval'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['FechaEval'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['CUIT_Eval'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['Apellidos'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['Nombres'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['Prod'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['Calidad'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['SyH'] . "</td>\n";
            echo "<td>" . $filaEvaluacionB['Compromiso'] . "</td>\n";
            echo "<td>" . (($filaEvaluacionB['Compromiso'] + $filaEvaluacionB['Prod'] + $filaEvaluacionB['Calidad'] + $filaEvaluacionB['Compromiso']) / 4) . "</td>\n";

            echo "<td>" . "<a href=\"/sistema/FormLocaEditar.php?Id_Eval=" . $filaEvaluacionB['Id_Eval'] . "\"><img src=\"../sistema/img/EditIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";

            echo "<td>" . "<a onClick=\"AlertarBorra()\" href=\"/sistema/FormLocaBorrar.php?Id_Eval=" . $filaEvaluacionB['Id_Eval'] . "\"><img src=\"../sistema/img/BorrIcono.png\" alt=\"BtnIconoEditar\" width=\"20\" height=\"20\"></a></td>\n";

            echo "</TR>\n";
          }

          echo "</table>";
          mysqli_close($mysqli);

          ?>

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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

</body>

</html>