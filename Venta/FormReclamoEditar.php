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


<title>Editar Reclamo</title>
<body>
	
<div class="m-0">
		<?php

		include("../layout/header/header-Top.php");

		?>
	</div>
	
	<div class="container-fluid m-0">
		<div class="row"><!-- Inicio Fila -->

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
			<!-- Centro Pagina -->
			<div class="col-9 mt-0" style="margin-left: 20px">

 <?php
        include("../Conexion/conexion.php");
        $NumReclamo = $_GET['NumReclamo'];
        //echo $NumReclamo; 
        $queryReclamo = $mysqli->query("SELECT * FROM `ComReclamo` WHERE `NumReclamo` = " . $NumReclamo . ";");

        $rowReclamo = mysqli_fetch_assoc($queryReclamo);

        ?>
    
      <div class="col-md-auto">

        <form action="/sistema/Venta/EditarReclamo.php" method="post" name="formEditarReclamo" enctype="multipart/form-data">

          <div class="form-group"  >
            <table class="table" width="" border="0">
              <tr>
                <td colspan="2" align="left">
                  <label for="txtReclamo">Formulario Reclamo editar</label>
                </td>
              </tr>
              <tr>
                <td>

                  <label for="txtIdReclamo">
                    <p>Id</p>
                  </label>
                  <input name="txtIdReclamo" type="text" id="txtIdReclamo" size="10" value="<?php print $rowReclamo['IdReclamo']; ?>" />
                  <label for="txtNumReclamo">
                    <p>Num</p>
                  </label>
                  <input name="txtNumReclamo" type="text" id="txtNumReclamo" size="10" value="<?php print $rowReclamo['NumReclamo']; ?>" />

                </td>
              </tr>

              <tr>
                <td>
                  <label for="listNumTipoReclamo">
                    <p>Tipo Reclamo</p>
                  </label>
                  <select name="listTipoReclamo" size="1" id="listTipoReclamo">
                    <option value="<?php print $rowReclamo['NumTipoReclamo']; ?>"><?php print $rowReclamo['NumTipoReclamo']; ?></option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryTipoReclamo = $mysqli->query("SELECT * FROM `ComTipoRecla` ORDER BY `ComTipoRecla`.`TipoReclamo` ASC");


                    while ($valoresTipoReclamo = mysqli_fetch_array($queryTipoReclamo)) {

                      echo '<option value="' . $valoresTipoReclamo['Id_TipoRecla'] . '">' . $valoresTipoReclamo['TipoReclamo'] . '</option>';
                    }
                    ?>
                  </select>
                  <?php
                  //Inicio Acalaracion del valor	
                  $rowReclamoTipo = $rowReclamo['NumTipoReclamo'];

                  include("../Conexion/conexion.php");

                  $queryTipoReclamo1 = $mysqli->query("SELECT * FROM `ComVistRecl_Tipo` WHERE `NumTipoReclamo` = " . $rowReclamoTipo . ";");


                  while ($valoresTipoReclamo1 = mysqli_fetch_array($queryTipoReclamo1)) {
                    $rowReclamoTipoImprNum = $valoresTipoReclamo1['Id_TipoRecla'];
                    $rowReclamoTipoImpr = $valoresTipoReclamo1['TipoReclamo'];
                  }
                  echo $rowReclamoTipoImprNum . "-" . $rowReclamoTipoImpr;

                  //Final Acalaracion del valor		  
                  ?>


                </td>
              </tr>


              <tr>
                <td>

                  <label for="txtReclamo">
                    <p>Reclamo </p>
                  </label>
                  <input name="txtReclamo" type="text" id="txtReclamo" rows="2" size="100" value="<?php print $rowReclamo['Reclamo']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtFecha">
                    <p>Fecha</p>
                  </label>
                  <input name="txtFecha" type="date" id="txtFecha" size="50" value="<?php print $rowReclamo['Fecha']; ?>" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="txtFechaFinal">
                    <p>Fecha finalizado</p>
                  </label>
                  <input name="txtFechaFinal" type="date" id="txtFechaFinal" size="50" value="<?php print $rowReclamo['FechaFinal']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtIdConce">
                    <p>Consecionaria:</p>
                  </label>
                  <select name="listIdConce" size="1" id="listIdConce">
                    <option value="<?php print $rowReclamo['IdConce']; ?>"><?php print $rowReclamo['IdConce']; ?></option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryIdConce = $mysqli->query("SELECT * FROM `ComConcesionario` ORDER BY `ComConcesionario`.`Concesionario` ASC");


                    while ($valoresIdConce = mysqli_fetch_array($queryIdConce)) {

                      echo '<option value="' . $valoresIdConce['id_Conce'] . '">' . $valoresIdConce['Concesionario'] . '</option>';
                    }
                    ?>
                  </select>

                  <?php
                  //Inicio Acalaracion del valor		  
                  $NumReclamo = $_GET['NumReclamo'];
                  include("../Conexion/conexion.php");

                  $queryConcesionario1 = $mysqli->query("SELECT * FROM `ComVistaConsec` WHERE `NumReclamo` = " . $NumReclamo . ";");


                  while ($valoresConcesionario1 = mysqli_fetch_array($queryConcesionario1)) {

                    $valoresConcesionario1['Concesionario'];
                    $varvaloresConcesionarioNum = $valoresConcesionario1['id_Conce'];
                    $varvaloresConcesionario = $valoresConcesionario1['Concesionario'];
                  }
                  echo $varvaloresConcesionarioNum . "-" . $varvaloresConcesionario;

                  //Final Acalaracion del valor		  
                  ?>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtIdCliente">
                    <p>Cliente:</p>
                  </label>
                  <select name="listIdCliente" size="1" id="listIdCliente">
                    <option value="<?php print $rowReclamo['IdCliente']; ?>"><?php print $rowReclamo['IdCliente']; ?></option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryIdConce = $mysqli->query("SELECT * FROM `ComCliente` ORDER BY `ComCliente`.`Cliente` ASC");


                    while ($valoresIdConce = mysqli_fetch_array($queryIdConce)) {

                      echo '<option value="' . $valoresIdConce['Id_Cliente'] . '">' . $valoresIdConce['Cliente'] . '</option>';
                    }
                    ?>
                  </select>
                  <?php
                  //Inicio Acalaracion del valor		  
                  $NumReclamo = $_GET['NumReclamo'];
                  include("../Conexion/conexion.php");

                  $queryCliente1 = $mysqli->query("SELECT * FROM `ComVisReclamo` WHERE `NumReclamo` = " . $NumReclamo . "; ");


                  while ($valoresCliente1 = mysqli_fetch_array($queryCliente1)) {


                    $varvaloresClienteNum = $valoresCliente1['IdCliente'];
                    $varvaloresCliente = $valoresCliente1['Cliente'];
                  }
                  echo $varvaloresClienteNum . "-" . $varvaloresCliente;

                  //Final Acalaracion del valor		  
                  ?>

                </td>
              </tr>


              </tr>

              <tr>
                <td>
                  <label for="listIdRepacion">
                    <p>Reparacion:</p>
                  </label>
                  <select name="listIdRepacion" size="1" id="listIdRepacion">
                    <option value="<?php print $rowReclamo['IdRepacion']; ?>"><?php print $rowReclamo['IdRepacion']; ?></option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryReparacion = $mysqli->query("SELECT * FROM `ComReparacion` ORDER BY `ComReparacion`.`Reparacion` ASC");


                    while ($valoresReparacion = mysqli_fetch_array($queryReparacion)) {

                      echo '<option value="' . $valoresReparacion['Id_Reparacion'] . '">' . $valoresReparacion['Reparacion'] . '</option>';
                    }
                    ?>
                  </select>

                  <?php
                  //Inicio Acalaracion del valor	
                  $rowReclamoIdRepacion = $rowReclamo['IdRepacion'];

                  include("../Conexion/conexion.php");

                  $queryTipoReclamoIdRepacion = $mysqli->query("SELECT * FROM `ComVistRepara_Recl` WHERE `IdRepacion` = " . $rowReclamoIdRepacion . ";");


                  while ($valoresTipoReclamoIdRepacion = mysqli_fetch_array($queryTipoReclamoIdRepacion)) {
                    $rowReclamoIdRepacionImprNum = $valoresTipoReclamoIdRepacion['IdRepacion'];
                    $rowReclamoIdRepacionImpr = $valoresTipoReclamoIdRepacion['Reparacion'];
                  }
                  echo $rowReclamoIdRepacionImprNum . "-" . $rowReclamoIdRepacionImpr;

                  //Final Acalaracion del valor		  
                  ?>

                </td>
              </tr>


              <tr>
                <td>
                  <label for="txtDescripcion">
                    <p>Descripcion: </p>
                  </label>
                  <input name="txtDescripcion" type="text" id="txtDescripcion" size="100" title="Descripcion" value="<?php print $rowReclamo['Descripcion']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtChasis">
                    <p>Chasis:<strong style="color:red;">*</strong></p>
                  </label>
                  <input name="txtChasis" type="number" id="txtChasis" title="Chasis" value="<?php print $rowReclamo['Chasis']; ?>" required />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtSerie">
                    <p>Serie:</p>
                  </label>

                  <input name="txtSerie" type="number" id="txtSerie" title="Serie" value="<?php print $rowReclamo['Serie']; ?>" />
                </td>
              </tr>


              <tr>
                <td>
                  <label for="txtTipoImplemento">
                    <p>Implemento:<strong style="color:red;">*</strong></p>
                  </label>
                  <select name="listImplemento" size="1" id="listImplemento" required>
                    <option value="<?php print $rowReclamo['NumImplemento']; ?>"><?php print $rowReclamo['NumImplemento']; ?></option>
                    <?php
                    include("../Conexion/conexion.php");

                    $queryIdConce = $mysqli->query("SELECT * FROM `ComImplemento` ORDER BY `ComImplemento`.`Implemento` ASC");


                    while ($valoresIdConce = mysqli_fetch_array($queryIdConce)) {

                      echo '<option value="' . $valoresIdConce['Id_Implemento'] . '">' . $valoresIdConce['Implemento'] . '</option>';
                    }
                    ?>
                  </select>
                  <?php
                  //Inicio Acalaracion del valor		  
                  $NumReclamo = $_GET['NumReclamo'];
                  include("../Conexion/conexion.php");

                  $queryImplemento1 = $mysqli->query("SELECT * FROM `ComVistImpleRecl` WHERE `NumReclamo` = " . $NumReclamo . "; ");


                  while ($valoresImplemento1 = mysqli_fetch_array($queryImplemento1)) {

                    $varvaloresImplementoNum = $valoresImplemento1['Id_Implemento'];
                    $varvaloresImplemento = $valoresImplemento1['Implemento'];
                  }
                  echo $varvaloresImplementoNum . "-" . $varvaloresImplemento;

                  //Final Acalaracion del valor		  
                  ?>

                </td>
              </tr>



              <tr>
                <td>

                  <?php
                  include("FormFallaReclaEditar.php");

                  ?>
                </td>
              </tr>


              <tr>
                <td>

                  <?php
                  include("FormImagenReclaEditar.php");

                  ?>

                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtAnalisisCausa">Analisis Causa:</label>
                  <textarea class="form-control" formControlName="txtAnalisisCausa" name="txtAnalisisCausa" id="txtAnalisisCausa" rows="3" value="<?php print $rowReclamo['AnalisisCausa']; ?>"><?php print $rowReclamo['AnalisisCausa']; ?></textarea>
                </td>

              </tr>

              <tr>
                <td>
                  <p><label for="txtAcciones">Acciones:</label>
                    <textarea class="form-control" formControlName="txtAcciones" name="txtAcciones" id="txtAcciones" rows="3" value="<?php print $rowReclamo['RespAccion']; ?>"><?php print $rowReclamo['RespAccion']; ?></textarea>
                </td>
                </p>
              </tr>

              <tr>
                <td>
                  <?php
                  include("FormImagenReclaSoluEditar.php");

                  ?>
                </td>
              </tr>


              <tr>
                <td>
                  <label for="txtEvalEfica">Evaluacion Eficaz:</label>
                  <textarea class="form-control" formControlName="txtEvalEfica" name="txtEvalEfica" id="txtEvalEfica" rows="3" value="<?php print $rowReclamo['EvalEfica']; ?>">
<?php print $rowReclamo['EvalEfica']; ?></textarea>

                </td>
              </tr>

              <tr>
                <td>

                  <label for="txtRespEvaluc">Respuesta Evalucion:</label>
                  <textarea class="form-control" formControlName="txtRespEvaluc" name="txtRespEvaluc" id="txtRespEvaluc" rows="3" value="<?php print $rowReclamo['RespEvaluc']; ?>">
<?php print $rowReclamo['RespEvaluc']; ?></textarea>

                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtFechaCierre">
                    <p>Fecha Cierre</p>
                  </label>
                  <input name="txtFechaCierre" type="date" id="txtFechaCierre" size="50" value="<?php print $rowReclamo['FechaCierre']; ?>" />
                </td>
              </tr>
              <tr>



              <tr>
                <td>
                  <label for="txtSup">
                    <p>Suspender :</p>
                  </label>
                  <select name="txtSup" id="txtSup">
                    <option value="<?php print $rowReclamo['Sup']; ?>"><?php print $rowReclamo['Sup']; ?></option>
                    <option value="No">No</option>
                    <option value="Si">Si</option>             
                  </select>
                </td>

              </tr>


              <tr>
                <td>
                  <label>
                    <input type="submit" class="btn btn-success btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Editar" />
                  </label>
                </td>
              </tr>
            </table>

          </div>

        </form>

			</div><!-- Fin Centro Pagina -->
		</div><!-- Fin Fila -->
	</div>


</body>

</html>