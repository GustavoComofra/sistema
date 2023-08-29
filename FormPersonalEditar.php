<?php
session_start();

$varCerrarSession = $_SESSION['usuario'];
if ($varCerrarSession == null || $varCerrarSession = '') {
  echo "<H1>" . "Usted no tiene autorizacion" . "<H1>";
  die();
}
?>

<!doctype html>
<html>

<head>
  <!-- Script JS -->
  <!-- <script src="../dir/js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Archivo.js"></script>
  <!-- Estilo Alertas -->
  <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- CSS -->
  <!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="css/estiloHome.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta charset="utf-8">
  <link href="img/Icono.png" rel="icon" type="image/png">
  <title>Editar Personal</title>
  <link href="/sistema/css/estiloHome.css" rel="stylesheet" type="text/css">

  <style>
.imgEfc{
  position: relative;
  width: 50px;
  height: 50px;

}


</style>

</head>
<?php
include("header.php");
session_start();
$u = $_POST['txtUsuario'];
?>

<body>


  <div class="container-fluid">
    <div class="row">

      <div class="col col-lg-2">
        <?php
        include("MarcoIzquierdo.php");

        ?>
        <?php
        include("Conexion/conexion.php");
        $IdPersonal = $_GET['IdPersonal'];
        //echo $CUIT_Empl; 
        $queryPersonal = $mysqli->query("SELECT * FROM `ComEmpleado` WHERE `IdPersonal` = " . $IdPersonal . ";");

        $rowPersonal = mysqli_fetch_assoc($queryPersonal);

        ?>

<?php
        include("Conexion/conexion.php");
        $IdPersonal = $_GET['IdPersonal'];
        //echo $CUIT_Empl; 
        $queryPersonalVista = $mysqli->query("SELECT * FROM `ComVistaEmpleado1` WHERE `IdPersonal` = " . $IdPersonal . ";");

        $rowPersonalVista = mysqli_fetch_assoc($queryPersonalVista);
                    ?>

      </div>
      <div class="col-md-auto">

        <form action="/sistema/EditarPersonal.php" method="post" name="formEditarPersonal" enctype="multipart/form-data">



          <div class="form-group">
            <table class="table">
              <tr>
                <td colspan="2" align="left">
                  <label >Formulario Personal editar</label>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="txtIdPersonal">
                    <p>IdPersonal</p>
                  </label>
                  <input name="txtIdPersonal" type="text" id="txtIdPersonal" size="10" value="<?php print $rowPersonal['IdPersonal']; ?>" />

                  <label for="txtIdPersonal">
                    <p>Legajo</p>
                  </label>
                  <input name="txtLegajo" type="text" id="txtLegajo" size="10" value="<?php print $rowPersonal['Legajo']; ?>" />

                  <label for="txtCUIT_Empl">
                    <p>CUIL</p>
                  </label>
                  <input name="txtCUIT_Empl" type="text" id="txtCUIT_Empl" size="10" value="<?php print $rowPersonal['CUIT_Empl']; ?>" />
                </td>
                <td >
<figure class="figure imgEfc">
  <?php  echo '<img class="imgEfc" src="'.$rowPersonal['Foto'].'" alt=\"imgprod\" width=\"50\" height=\"50\"/>';?>
  <figcaption class="figure-caption">Foto</figcaption>
  <?php
echo "<td>"."<a href=\"/sistema/FormEditFoto.php?IdPersonal=".$rowPersonal['IdPersonal']."\" >
<img src=\"../sistema/img/EditIcono.png\" alt=\"BtnEditar\" width=\"20\" height=\"20\"></a></td>\n";
  ?>
</td>

              </tr>
              <tr>
                <td>
                  <label for="txtNombres">
                    <p>Nombres</p>
                  </label>
                  <input name="txtNombres" type="text" id="txtNombres" size="100" value="<?php print $rowPersonal['Nombres']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtApellidos">
                    <p>Apellidos </p>
                  </label>
                  <input name="txtApellidos" type="text" id="txtApellidos" rows="2" size="100" value="<?php print $rowPersonal['Apellidos']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtFechaIngreso">
                    <p>Fecha Ingreso</p>
                  </label>
                  <input name="txtFechaIngreso" type="date" id="txtFechaIngreso" value="<?php print $rowPersonal['FechaIngreso']; ?>" />

                  <label for="txtFechaPrueba">
                    <p>Fecha Prueba</p>
                  </label>
                  <input name="txtFechaPrueba" type="date" id="txtFechaPrueba" value="<?php print $rowPersonal['FechaPrueba']; ?>" />
      
                  <label for="txtFechaNacimiento">
                    <p>Fecha Nacimiento</p>
                  </label>
                  <input name="txtFechaNacimiento" type="date" id="txtFechaNacimiento" size="50" value="<?php print $rowPersonal['FechaNacimiento']; ?>" />
                </td>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtAprobado">
                    <p>Aprobado </p>
                  </label>
                  <input name="txtAprobado" type="text" id="txtAprobado" size="50" value="<?php print $rowPersonal['Aprobado']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtDomicilio">
                    <p>Domicilio </p>
                  </label>
                  <input name="txtDomicilio" type="text" id="txtDomicilio" rows="2" size="100" value="<?php print $rowPersonal['Domicilio']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="listLocalidad">
                    <p>Localidad </p>
                  </label>
                  <select name="listLocalidad" size="1" id="listLocalidad">
                    <option value="<?php print $rowPersonal['Localidad']; ?>"><?php print $rowPersonal['Localidad']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryLocalidad = $mysqli->query("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");
                    while ($valoresLocalidad = mysqli_fetch_array($queryLocalidad)) {
                      echo '<option value="' . $valoresLocalidad[Localidad] . '">' . $valoresLocalidad[Localidad] . '</option>';
                    }
                    ?>
                  </select>

                  <label for="listProvincia">
                    <p>Provincia:</p>
                  </label>
                  <select name="listProvincia" size="1" id="listProvincia">
                    <option value="<?php print $rowPersonal['Provincia']; ?>"><?php print $rowPersonal['Provincia']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryProvincia = $mysqli->query("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");
                    while ($valoresProvincia = mysqli_fetch_array($queryProvincia)) {
                      echo '<option value="' . $valoresProvincia[Provincia] . '">' . $valoresProvincia[Provincia] . '</option>';
                    }
                    ?>
                  </select>

                  <label for="listNacionalidad">
                    <p>Nacionalidad:</p>
                  </label>
                  <select name="listNacionalidad" size="1" id="listNacionalidad">
                    <option value="<?php print $rowPersonal['Nacionalidad']; ?>"><?php print $rowPersonal['Nacionalidad']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryPais = $mysqli->query("SELECT * FROM `ComNacion` ORDER BY `ComNacion`.`Nacionalidad` ASC");
                    while ($valoresPais = mysqli_fetch_array($queryPais)) {
                      echo '<option value="' . $valoresPais[Nacionalidad] . '">' . $valoresPais[Nacionalidad] . '</option>';
                    }
                    ?>
                  </select>

 
                  <label for="listEstadoCivil">
                    <p>EstadoCivil</p>
                  </label>
                  <select name="listEstadoCivil" size="1" id="listEstadoCivil">
                    <option value="<?php print $rowPersonal['EstadoCivil']; ?>"><?php print $rowPersonal['EstadoCivil']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryEstadoCivil = $mysqli->query("SELECT * FROM `ComEstadoCivil` ORDER BY `ComEstadoCivil`.`EstadoCivil` ASC");
                    while ($valoresEstadoCivil = mysqli_fetch_array($queryEstadoCivil)) {
                      echo '<option value="' . $valoresEstadoCivil[EstadoCivil] . '">' . $valoresEstadoCivil[EstadoCivil] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtVenCarnet">
                    <p>VenCarnet</p>
                  </label>
                  <input name="txtVenCarnet" type="date" id="txtVenCarnet" value="<?php print $rowPersonal['VenCarnet']; ?>" />

                  <label for="listTipoCarnet">
                    <p>TipoCarnet</p>
                  </label>
                  <select name="listTipoCarnet" size="1" id="listTipoCarnet">
                    <option value="<?php print $rowPersonal['TipoCarnet']; ?>"><?php print $rowPersonal['TipoCarnet']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryTipoCarnet = $mysqli->query("SELECT * FROM `ComTipoCarnet` ORDER BY `ComTipoCarnet`.`TipoCarnet` ASC");
                    while ($valoresTipoCarnet = mysqli_fetch_array($queryTipoCarnet)) {
                      echo '<option value="' . $valoresTipoCarnet[TipoCarnet] . '">' . $valoresTipoCarnet[TipoCarnet] . '</option>';
                    }
                    ?>
                  </select>

                  <label for="listGS">
                    <p>Grupo sanguineo</p>
                  </label>
                  <select name="listGS" size="1" id="listGS">
                    <option value="<?php print $rowPersonal['GS']; ?>"><?php print $rowPersonal['GS']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryGS = $mysqli->query("SELECT * FROM `ComGrupoSan` ORDER BY `Grupo` ASC");
                    while ($valoresGS = mysqli_fetch_array($queryGS)) {
                      echo '<option value="' . $valoresGS[Grupo] . '">' . $valoresGS[Grupo] . '</option>';
                    }
                    ?>
                  </select>

                  <label for="listCategSueld">
                    <p>Categoria Sueldo </p>
                  </label>
                  <select name="listCategSueld" size="1" id="listCategSueld">
                    <option value="<?php print $rowPersonal['Fk_CategSueld']; ?>"><?php print $rowPersonal['Fk_CategSueld']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryCategSuel = $mysqli->query("SELECT * FROM `ComCategSuel` ORDER BY `ComCategSuel`.`CategSuel` ASC");
                    while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel)) {
                      echo '<option value="' . $valoresCategSuel[Id_CategSuel] . '">' . $valoresCategSuel[CategSuel] . '</option>';
                    }
                    ?>
                  </select>

                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtTelefono">
                    <p>Telefono </p>
                  </label>
                  <input name="txtTelefono" type="text" id="txtTelefono" rows="2" size="100" value="<?php print $rowPersonal['Telefono']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtTelUrgencia">
                    <p>Tel Urgencia </p>
                  </label>
                  <input name="txtTelUrgencia" type="text" id="txtTelUrgencia" rows="2" size="100" value="<?php print $rowPersonal['TelUrgencia']; ?>" />
                </td>
              </tr>


              <td>
                <label for="txtCalleNorte">
                  <p>Calle Norte</p>
                </label>
                <input name="txtCalleNorte" type="text" id="txtCalleNorte" size="50" value="<?php print $rowPersonal['CalleNorte']; ?>" />
              </td>
              </tr>

              <tr>

                <td>
                  <label for="txtCalleSur">
                    <p>Calle Sur</p>
                  </label>
                  <input name="txtCalleSur" type="text" id="txtCalleSur" size="50" value="<?php print $rowPersonal['CalleSur']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtCalleEste">
                    <p>Calle Este</p>
                  </label>
                  <input name="txtCalleEste" type="text" id="txtCalleEste" size="50" value="<?php print $rowPersonal['CalleEste']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtCalleOeste">
                    <p>Calle Oeste</p>
                  </label>
                  <input name="txtCalleOeste" type="text" id="txtCalleOeste" size="50" value="<?php print $rowPersonal['CalleOeste']; ?>" />
                </td>
              </tr>

              </tr>

              <tr>
                <td>
                  <label for="txtEmail">
                    <p>Email </p>
                  </label>
                  <input name="txtEmail" type="email" id="txtEmail" rows="2" size="100" value="<?php print $rowPersonal['Email']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtObs">
                    <p>Obs</p>
                  </label>
                  <input name="txtObs" type="text" id="txtObs" rows="2" size="100" value="<?php print $rowPersonal['Obs']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtART">
                    <p>ART</p>
                  </label>
                  <input name="txtART" type="text" id="txtART" rows="2" size="50" value="<?php print $rowPersonal['ART']; ?>" />

                  <label for="txtModalidad">
                    <p>Modalidad</p>
                  </label>
                  <input name="txtModalidad" type="text" id="txtModalidad" rows="2" size="50" value="<?php print $rowPersonal['Modalidad']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="txtObraSocial">
                    <p>Obra Social </p>
                  </label>
                  <input name="txtObraSocial" type="text" id="txtObraSocial" rows="2" size="100" value="<?php print $rowPersonal['ObraSocial']; ?>" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="listSector">
                    <p>Sector</p>
                  </label>
                  <select name="listSector" size="1" id="listSector">
                    <option value="<?php print $rowPersonal['Sector']; ?>"><?php print $rowPersonalVista['SectorFk']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryCategSuel = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel)) {
                      echo '<option value="' . $valoresCategSuel[IdSector] . '">' . $valoresCategSuel[SectorFk] . '</option>';
                    }
                    ?>
                  </select>
                  <label for="listRelacion">Relacion: 


                  <select name="listRelacion" size="1" id="listRelacion">
       
                    <option value="<?php print $rowPersonalVista['RelacionFk']; ?>"><?php print $rowPersonalVista['Relacion']; ?></option>
                    <?php
                    include("Conexion/conexion.php");

                    $queryRelacion = $mysqli->query("SELECT * FROM `RelacionPersonal` ORDER BY `RelacionPersonal`.`Relacion` ASC");


                    while ($valoresRelacion = mysqli_fetch_array($queryRelacion)) {

                      echo '<option value="' . $valoresRelacion[idRelacion] . '">' . $valoresRelacion[Relacion] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td>
                  <label for="listEncargado">
                    <p>Encargado</p>
                  </label>
                  <select name="listEncargado" size="1" id="listEncargado">
                    <option value="<?php print $rowPersonal['Encargado']; ?>"><?php print $rowPersonal['Encargado']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryCategSuelEnc = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuelEnc = mysqli_fetch_array($queryCategSuelEnc)) {
                      echo '<option value="' . $valoresCategSuelEnc[IdSector] . '">' . $valoresCategSuelEnc[IdSector]. "-". $valoresCategSuelEnc[SectorFk] . '</option>';
                    }
                    ?>
                  </select>


                  <label for="listGerente">Gerente: 
                    <select name="listGerente" size="1" id="listGerente">
                    <option value="<?php print $rowPersonal['Gerente']; ?>"><?php print $rowPersonal['Gerente']; ?></option>
                    <?php
                    include("Conexion/conexion.php");
                    $queryCategSuelGer = $mysqli->query("SELECT * FROM `ComSector` ORDER BY `SectorFk` ASC");
                    while ($valoresCategSuelGer = mysqli_fetch_array($queryCategSuelGer)) {
                      echo '<option value="' . $valoresCategSuelGer[IdSector] . '">' . $valoresCategSuelGer[IdSector]. "-". $valoresCategSuelGer[SectorFk] . '</option>';
                    }
                    ?>
                  </select>
                </td>
              </tr>              

              <tr>
                <td>
                  <label for="txtBaja">
                    <p>Baja</p>
                  </label>
                  <select name="txtBaja" size="1" id="txtBaja">
                    <option value="<?php print $rowPersonal['Baja']; ?>"><?php print $rowPersonal['Baja']; ?></option>
<option value="No">No</option>
<option value="Si">Si</option>             
                  </select>

                  <label for="txtFechaSalida">
                    <p>Fecha Salida</p>
                  </label>
                  <input name="txtFechaSalida" type="date" id="txtFechaSalida" value="<?php print $rowPersonal['FechaSalida']; ?>" />
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


      </div>
    </div>
  </div>

</body>

</html>