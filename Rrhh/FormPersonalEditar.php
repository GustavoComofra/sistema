<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: -100; margin: 0;" lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
	<title>Editar Personal</title>
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
        <?php
include("../Conexion/conexion.php");
        $IdPersonal = $_GET['IdPersonal'];

        $queryPersonal = $mysqli->query("SELECT * FROM `ComEmpleado` WHERE `IdPersonal` = " . $IdPersonal . ";");
        $rowPersonal = mysqli_fetch_assoc($queryPersonal);
        ?>

<?php
        $IdPersonal = $_GET['IdPersonal'];
        $queryPersonalVista = $mysqli->query("SELECT * FROM `ComVistaEmpleado1` WHERE `IdPersonal` = " . $IdPersonal . ";");
        $rowPersonalVista = mysqli_fetch_assoc($queryPersonalVista);
?>

			<div class="col-9 mt-0" style="margin-left: 20px">

        <form action="/sistema/Rrhh/EditarPersonal.php" method="post" name="formEditarPersonal" enctype="multipart/form-data">

        <div >
        <table class="table table-hover">
        <tr>
      <td colspan="4"  ><strong><h3>Editar Personal </h3></strong></td>

      <td>
        <figure class="figure imgEfc">
  <?php  echo '<img class="imgEfc" src="'.$rowPersonal['Foto'].'" alt=\"imgprod\" width=\"50\" height=\"50\"/>';?>
  <figcaption class="figure-caption">Foto</figcaption>
  <?php
echo "<td>"."<a href=\"/sistema/Rrhh/FormEditFoto.php?IdPersonal=".$rowPersonal['IdPersonal']."\" >
<img src=\"../img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
  ?>
      </td>

    </tr>
              
              <tr>
                <td>IdPersonal</td>
                <td><input name="txtIdPersonal" type="text" id="txtIdPersonal" value="<?php print $rowPersonal['IdPersonal']; ?>" /></td>
                <td>Legajo</td>
                <td><input name="txtLegajo" type="text" id="txtLegajo" value="<?php print $rowPersonal['Legajo']; ?>" /></td>
                <td>CUIL</td>
                <td><input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" value="<?php print $rowPersonal['CUIT_Empl']; ?>" /></td>
              </tr>

              <tr>
                <td> Nombres:</td>
                <td><input name="txtNombres" type="text" id="txtNombres" value="<?php print $rowPersonal['Nombres']; ?>" /></td>
                <td> Apellidos:</td>
                <td><input name="txtApellidos" type="text" id="txtApellidos" value="<?php print $rowPersonal['Apellidos']; ?>" /></td>
                <td>Aprobado</td>
                <td> <input name="txtAprobado" type="text" id="txtAprobado" value="<?php print $rowPersonal['Aprobado']; ?>" /></td>
              </tr>

              <tr>
                <td>Fecha Ingreso</td>
                <td> <input name="txtFechaIngreso" type="date" id="txtFechaIngreso" value="<?php print $rowPersonal['FechaIngreso']; ?>" /></td>
                <td>Fecha Prueba</td>
                <td><input name="txtFechaPrueba" type="date" id="txtFechaPrueba" value="<?php print $rowPersonal['FechaPrueba']; ?>" /></td>
                <td>Fecha Nacimiento</td>
              <td><input name="txtFechaNacimiento" type="date" id="txtFechaNacimiento" value="<?php print $rowPersonal['FechaNacimiento']; ?>" /></td>
              </tr>
       
              <tr>

              </tr>

              <tr>
                <td>Domicilio </td>
                <td><input name="txtDomicilio" type="text" id="txtDomicilio" value="<?php print $rowPersonal['Domicilio']; ?>" />          </td>
    
                <td>Localidad </td>
                <td><select name="listLocalidad" id="listLocalidad">
                    <option value="<?php print $rowPersonal['Localidad']; ?>"><?php print $rowPersonal['Localidad']; ?></option>
                    <?php
                   // include("Conexion/conexion.php");
                    $queryLocalidad = $mysqli->query("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");
                    while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad)) {
                      echo '<option value="' . $valoresLocalidad['Localidad'] . '">' . $valoresLocalidad['Localidad'] . '</option>';
                    }
                    ?>
                  </select></td>

                  <td>Provincia:</td>
                  <td>
                    <select name="listProvincia" id="listProvincia">
                    <option value="<?php print $rowPersonal['Provincia']; ?>"><?php print $rowPersonal['Provincia']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryProvincia = $mysqli->query("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");
                    while ($valoresProvincia = mysqli_fetch_array($queryProvincia)) {
                      echo '<option value="' . $valoresProvincia['Provincia'] . '">' . $valoresProvincia['Provincia'] . '</option>';
                    }
                    ?>
                  </select>
                  </td>

                  </tr>
                  <tr>
                  <td>Nacionalidad:</td>
                  <td>
                    <select name="listNacionalidad" id="listNacionalidad">
                    <option value="<?php print $rowPersonal['Nacionalidad']; ?>"><?php print $rowPersonal['Nacionalidad']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryPais = $mysqli->query("SELECT * FROM `ComNacion` ORDER BY `ComNacion`.`Nacionalidad` ASC");
                    while ($valoresPais = mysqli_fetch_array($queryPais)) {
                      echo '<option value="' . $valoresPais['Nacionalidad'] . '">' . $valoresPais['Nacionalidad'] . '</option>';
                    }
                    ?>
                  </select>
                  </td>

                  <td>Estado Civil:</td>
                   <td>
                  <select name="listEstadoCivil" id="listEstadoCivil">
                    <option value="<?php print $rowPersonal['EstadoCivil']; ?>"><?php print $rowPersonal['EstadoCivil']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryEstadoCivil = $mysqli->query("SELECT * FROM `ComEstadoCivil` ORDER BY `ComEstadoCivil`.`EstadoCivil` ASC");
                    while ($valoresEstadoCivil = mysqli_fetch_array($queryEstadoCivil)) {
                      echo '<option value="' . $valoresEstadoCivil['EstadoCivil'] . '">' . $valoresEstadoCivil['EstadoCivil'] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>Grupo sanguineo:</td>
                <td><select name="listGS" id="listGS">
                    <option value="<?php print $rowPersonal['GS']; ?>"><?php print $rowPersonal['GS']; ?></option>
                    <?php
                   // include("Conexion/conexion.php");
                    $queryGS = $mysqli->query("SELECT * FROM `ComGrupoSan` ORDER BY `Grupo` ASC");
                    while ($valoresGS = mysqli_fetch_array($queryGS)) {
                      echo '<option value="' . $valoresGS['Grupo'] . '">' . $valoresGS['Grupo'] . '</option>';
                    }
                    ?>
                  </select>
                  </td>

                  </tr>

              <tr>
              <td>Venimiento Carnet:</td>
              <td> <input name="txtVenCarnet" type="date" id="txtVenCarnet" value="<?php print $rowPersonal['VenCarnet']; ?>" /></td>
              
              <td>Tipo Carnet:</td>
              <td>    
              <select name="listTipoCarnet" id="listTipoCarnet">
                    <option value="<?php print $rowPersonal['TipoCarnet']; ?>"><?php print $rowPersonal['TipoCarnet']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryTipoCarnet = $mysqli->query("SELECT * FROM `ComTipoCarnet` ORDER BY `ComTipoCarnet`.`TipoCarnet` ASC");
                    while ($valoresTipoCarnet = mysqli_fetch_array($queryTipoCarnet)) {
                      echo '<option value="' . $valoresTipoCarnet['TipoCarnet'] . '">' . $valoresTipoCarnet['TipoCarnet'] . '</option>';
                    }
                    ?>
                  </select>
                  </td>

                  <td>Obra Social: </td>
                <td> <input name="txtObraSocial" type="text" id="txtObraSocial" rows="2" value="<?php print $rowPersonal['ObraSocial']; ?>" />
                </td>

                </tr>

              <tr>
                <td>Telefono:<strong style="color: Red;">*</strong>  </td>
                <td><input name="txtTelefono" type="text" id="txtTelefono" rows="2" value="<?php print $rowPersonal['Telefono']; ?>" /> </td>

                <td>Telefono Urgencia: </td>
                <td> <input name="txtTelUrgencia" type="text" id="txtTelUrgencia" rows="2" value="<?php print $rowPersonal['TelUrgencia']; ?>" />
               </td>

               <td>E-mail: </td>
               <td><input name="txtEmail" type="email" id="txtEmail" rows="2" value="<?php print $rowPersonal['Email']; ?>" /> </td>

              </tr>
           <tr>
              <td>Categoria Sueldo:</td>
              <td>
                <select name="listCategSueld" id="listCategSueld">
                    <option value="<?php print $rowPersonal['Fk_CategSueld']; ?>"><?php print $rowPersonal['Fk_CategSueld']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryCategSuel = $mysqli->query("SELECT * FROM `ComCategSuel` ORDER BY `ComCategSuel`.`CategSuel` ASC");
                    while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel)) {
                      echo '<option value="' . $valoresCategSuel['Id_CategSuel'] . '">' . $valoresCategSuel['CategSuel'] . '</option>';
                    }
                    ?>
                  </select>
                </td>
   
                <td>Sector:</td>
                <td>
                  <select name="listSector" id="listSector">
                    <option value="<?php print $rowPersonal['Sector']; ?>"><?php print $rowPersonalVista['SectorFk']; ?></option>
                    <?php
                   // include("Conexion/conexion.php");
                    $queryCategSuel = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel)) {
                      echo '<option value="' . $valoresCategSuel['IdSector'] . '">' . $valoresCategSuel['SectorFk'] . '</option>';
                    }
                    ?>
                  </select>
              </td>

              <td>ART: </td>
              <td> <input name="txtART" type="text" id="txtART" rows="2" value="<?php print $rowPersonal['ART']; ?>" /> </td>

                </tr>

              <tr>

              <td>Modalidad: </td>
              <td>  <input name="txtModalidad" type="text" id="txtModalidad"  value="<?php print $rowPersonal['Modalidad']; ?>" /></td>
              <td>Relacion:</td>
              <td>
                  <select name="listRelacion" id="listRelacion">
       
                    <option value="<?php print $rowPersonalVista['RelacionFk']; ?>"><?php print $rowPersonalVista['Relacion']; ?></option>
                    <?php
                   // include("Conexion/conexion.php");

                    $queryRelacion = $mysqli->query("SELECT * FROM `RelacionPersonal` ORDER BY `RelacionPersonal`.`Relacion` ASC");

                    while ($valoresRelacion = mysqli_fetch_array($queryRelacion)) {

                      echo '<option value="' . $valoresRelacion['idRelacion'] . '">' . $valoresRelacion['Relacion'] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>Baja: </td>
                <td>
                  <select name="txtBaja" id="txtBaja">
                    <option value="<?php print $rowPersonal['Baja']; ?>"><?php print $rowPersonal['Baja']; ?></option>
                    <option value="No">No</option>
                    <option value="Si">Si</option>             
                  </select>
                  </td>

              </tr>

              <tr>
              <td>Encargado:</td>
              <td>
                <select name="listEncargado" id="listEncargado">
                    <option value="<?php print $rowPersonal['Encargado']; ?>"><?php print $rowPersonal['Encargado']; ?></option>
                    <?php
                   // include("Conexion/conexion.php");
                    $queryCategSuelEnc = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuelEnc = mysqli_fetch_array($queryCategSuelEnc)) {
                      echo '<option value="' . $valoresCategSuelEnc['IdSector'] . '">' . $valoresCategSuelEnc['IdSector']. "-". $valoresCategSuelEnc['SectorFk'] . '</option>';
                    }
                    ?>
                  </select>
                  </td>
                  <td>Gerente:</td>
                  <td>
                    <select name="listGerente" id="listGerente">
                    <option value="<?php print $rowPersonal['Gerente']; ?>"><?php print $rowPersonal['Gerente']; ?></option>
                    <?php
                    //include("Conexion/conexion.php");
                    $queryCategSuelGer = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuelGer = mysqli_fetch_array($queryCategSuelGer)) {
                      echo '<option value="' . $valoresCategSuelGer['IdSector'] . '">' . $valoresCategSuelGer['IdSector']. "-". $valoresCategSuelGer['SectorFk'] . '</option>';
                    }
                    ?>
                  </select>
                </td>

                <td>Fecha Salida</td>
                  <td><input name="txtFechaSalida" type="date" id="txtFechaSalida" value="<?php print $rowPersonal['FechaSalida']; ?>" /></td>

              </tr>

             <tr>
              <td>Calle Norte: </td>
              <td><input name="txtCalleNorte" type="text" id="txtCalleNorte" value="<?php print $rowPersonal['CalleNorte']; ?>" /> </td>
              <td>Calle Sur: </td>
              <td><input name="txtCalleSur" type="text" id="txtCalleSur" value="<?php print $rowPersonal['CalleSur']; ?>" /> </td>
             </tr>

              <tr>
              <td>Calle Este: </td>
              <td><input name="txtCalleEste" type="text" id="txtCalleEste" value="<?php print $rowPersonal['CalleEste']; ?>" /> </td>
              <td>Calle Oeste: </td>
              <td><input name="txtCalleOeste" type="text" id="txtCalleOeste"  value="<?php print $rowPersonal['CalleOeste']; ?>" /></td>
              </tr>

              <tr>
               <td>Observacion:</td>
                <td colspan="5" > <input name="txtObs" type="text" id="txtObs" rows="2" value="<?php print $rowPersonal['Obs']; ?>" /> </td>
              </tr>

            </table>
            <input type="submit" class="btn btn-success btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Editar" />
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