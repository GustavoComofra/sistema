<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="padding: 0; margin: 0;" lang="es">


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/estiloHome.css">  
	<link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/css/general.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="../img/Icono.png" rel="icon" type="image/png">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

	<title>Nuevo Personal</title>
  </head>
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
		
<form action="/sistema/Rrhh/insertarPersonal.php" method="post" name="formPersonal" enctype="multipart/form-data">

<div >
  <table class="table table-hover">
    <tr>
    <td colspan="4" class="text-center"><strong><h3>Datos Personal</h3></strong></td>

    </tr>

    <tr>
      <td >Legajo:<strong style="color: Red;">*</strong> </td>
      <td ><input name="txtLegajo" type="number" id="txtLegajo" minlength="11" maxlength="12" size="50" required  />
		</td> 
    
    <td >CUIL:<strong style="color: Red;">*</strong> </td>
      <td ><input name="txtCUIT_Empl" type="number" id="txtCUIT_Empl" minlength="11" maxlength="12" size="50" required />
		</td>

    </tr>
   
    <tr>
      <td>Nombres: <strong style="color: Red;">*</strong> </td>
      <td>
        <input name="txtNombres" type="text" id="txtNombres" size="50"  required />
     </td>

     <td>Apellidos:  <strong style="color: Red;">*</strong> </td>
      <td><input name="txtApellidos" type="text" id="txtApellidos" size="50"  required /></td>

    </tr>

    <tr>
      <td>Fecha de Ingreso:</td>
      <td><input name="txtFechaIngreso" type="date" id="txtFechaIngreso" size="50" value="<?php echo date("Y-m-d");?>" /></td>

      <td>Fecha prueba</td>
      <td><input name="txtFechaPrueba" type="date" id="txtFechaPrueba" size="50" value="<?php 
		  $fecha_actual = date("Y-m-d");
//resto 30 día
$varFechaPrueba = date("Y-m-d",strtotime($fecha_actual."+ 120 days"));
		  echo $varFechaPrueba;
		  
		  ?>"  /></td>

    </tr>

    <tr>
      <td>Foto :</td>
      <td><p>
        <input type="file" name="imagen" id="imagen">
        </p></td>

        <td>Fecha de nacimiento:<strong style="color: Red;">*</strong>  </td>
      <td><input name="txtFechaNacimiento" type="date" id="txtFechaNacimiento" title="FechaNacimiento" size="50" required  /></td>

    </tr>

    <tr>
      <td>Domicilio: <strong style="color: Red;">*</strong> </td>
      <td><input name="txtDomicilio" type="text" id="txtDomicilio" size="50" required  /></td>

      <td>Localidad:</td>
      <td><select name="listLocalidad"   id="listLocalidad">
        <option value="0">Seleccione:</option>
        <?php
include("../Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores['Localidad'].'">'.$valores['Localidad'].'</option>';
}
	?>
      </select></td>

    </tr>

    <tr>
      <td width="">Provincia :</td>
   <td><select name="listProvincia" id="listProvincia">
        <option value="0">Seleccione:</option>
        <?php
//include("Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia['Provincia'].'">'.$valoresProvincia['Provincia'].'</option>';
}
	?>
      </select>	 
      
      <td>Nacionalidad:</td>
      <td><select name="listNacionalidad" id="listNacionalidad">
        <option value="Argentina">Seleccione:</option>
        <?php
//include("Conexion/conexion.php");
  
$queryNacionalidad = $mysqli -> query ("SELECT * FROM `ComNacion` ORDER BY `ComNacion`.`Nacionalidad` ASC");


 while ($valoresNacionalidad = mysqli_fetch_array($queryNacionalidad))

		  
		  {

 echo '<option value="'.$valoresNacionalidad['Nacionalidad'].'">'.$valoresNacionalidad['Nacionalidad'].'</option>';
}
	?>
      </select></td>
	  
	</tr>  

      <tr>
      <td>Estado Civil:</td>
      <td><select name="listEstadoCivil" id="listEstadoCivil">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$queryEstadoCivil = $mysqli -> query ("SELECT * FROM `ComEstadoCivil` ORDER BY `EstadoCivil` ASC");
 while ($valoresEstadoCivil = mysqli_fetch_array($queryEstadoCivil))
 
		  {

 echo '<option value="'.$valoresEstadoCivil['EstadoCivil'].'">'.$valoresEstadoCivil['EstadoCivil'].'</option>';
}
	?>
      </select></td>

      <td>Grupo sanguineo:</td>
      <td><select name="listGs" id="listGs">
        <option value="0">Seleccione:</option>
        <?php
//include("Conexion/conexion.php");
  
$queryGs = $mysqli -> query ("SELECT * FROM `ComGrupoSan` ORDER BY `ComGrupoSan`.`Grupo` ASC");
 while ($valoresGs = mysqli_fetch_array($queryGs))
 		  {

 echo '<option value="'.$valoresGs['Grupo'].'">'.$valoresGs['Grupo'].'</option>';
}
	?>
      </select></td>
    </tr>

<tr>
      <td>Venimiento Carnet:</td>
      <td><input name="txtVenCarnet" type="date" id="txtVenCarnet" size="50" /></td>

      <td>Tipo Carnet:</td>
      <td><select name="listTipoCarnet"   id="listTipoCarnet">
        <option value="0">Seleccione:</option>
        <?php
include("../Conexion/conexion.php");
  
$queryTipoCarnet = $mysqli -> query ("SELECT * FROM `ComTipoCarnet` ORDER BY `TipoCarnet` ASC");


 while ($valoresTipoCarnet = mysqli_fetch_array($queryTipoCarnet))

		  
		  {

 echo '<option value="'.$valoresTipoCarnet['TipoCarnet'].'">'.$valoresTipoCarnet['TipoCarnet'].'</option>';
}
	?>
      </select></td>

    </tr>	  
	  
    <tr>
      <td>Telefono:<strong style="color: Red;">*</strong>  </td>
      <td><p>
        <input name="txtTelefono" type="text" id="txtTelefono" size="50" required/>
      </p></td>

      <td>Telefono Urgencia: </td>
      <td><p>
        <input name="txtTelUrgencia" type="text" id="txtTelUrgencia" size="50"/>
      </p></td>

    </tr>

    <tr>
      <td>E-mail: </td>
      <td><input name="txtEmail" type="email" id="txtEmail" size="50" /></td>

        <td>Observacion:</td>
      <td><textarea name="txtObs" cols="50" id="txtObs" ></textarea></td>

    </tr>

<tr>
      <td>CategSueld:</td>
      <td><select name="listCategSueld"   id="listCategSueld">
        <option value="1">Normal</option>
        <?php
//include("../Conexion/conexion.php");
$queryCategSuel = $mysqli -> query ("SELECT * FROM `ComCategSuel` ORDER BY `ComCategSuel`.`CategSuel` ASC");
 while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel))
		  {
 echo '<option value="'.$valoresCategSuel['Id_CategSuel'].'">'.$valoresCategSuel['CategSuel'].'</option>';
}
	?>
      </select></td>

      <td>Obra Social: </td>
      <td><input name="txtObraSocial" type="text" id="txtObraSocial" size="50" /></td>

    </tr>
     
    <tr>

      <td>Sector:</td>
      <td><select name="listSector"   id="listSector">
        <option value="1">Sector</option>
        <?php
//include("../Conexion/conexion.php");
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");
 while ($valoresSector = mysqli_fetch_array($querySector))
		  {
 echo '<option value="'.$valoresSector['IdSector'].'">'.$valoresSector['SectorFk'].'</option>';
}
	?>
      </select></td>

      <td>ART: </td>
      <td><input name="txtART" type="text" id="txtART" /></td>
      
    <tr>

      <td>Modalidad: </td>
      <td><input name="txtModalidad" type="text" id="txtModalidad" size="50" /></td>

      <td>Relacion:</td>
      <td>
        <select name="listRelacion"   id="listRelacion">
        <option value="1">Seleccione</option>
        <?php
//include("../Conexion/conexion.php");
$queryRelacion = $mysqli -> query ("SELECT * FROM `RelacionPersonal` ORDER BY `RelacionPersonal`.`Relacion` ASC");
while ($valoresRelacion = mysqli_fetch_array($queryRelacion))
		  {
 echo '<option value="'.$valoresRelacion['idRelacion'].'">'.$valoresRelacion['Relacion'].'</option>';
}
	?>
      </select></td>

    </tr>    
  
    <tr>
      <td>Encargado:</td>
      <td>
      <select name="listEncargado"   id="listEncargado">
        <option value="0">Seleccione</option>
        <?php
//include("../Conexion/conexion.php");
$queryEncargado = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");
while ($valoresEncargado = mysqli_fetch_array($queryEncargado))
	  
		  {
 echo '<option value="'.$valoresEncargado['IdSector'].'">'.$valoresEncargado['SectorFk'].'</option>';
}
	?>
      </select>    
    </td>

    <td>Gerente:</td>
      <td>
      <select name="listGerente"   id="listGerente">
        <option value="0">Seleccione</option>
        <?php
//include("../Conexion/conexion.php");
$queryGerente = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");
while ($valoresGerente = mysqli_fetch_array($queryGerente))
		  {
 echo '<option value="'.$valoresGerente['IdSector'].'">'.$valoresGerente['SectorFk'].'</option>';
}
	?>
      </select>    
    </td>
    </tr>

    <tr>
      <td>Calle Norte: </td>
      <td><input name="txtCalleNorte" type="text" id="txtCalleNorte" /></td>

      <td>Calle Sur: </td>
      <td><input name="txtCalleSur" type="text" id="txtCalleSur" /></td>

    </tr> 
    
    <tr>
      <td>Calle Este: </td>
      <td><input name="txtCalleEste" type="text" id="txtCalleEste" /></td>

      <td>Calle Oeste: </td>
      <td><input name="txtCalleOeste" type="text" id="txtCalleOeste"  /></td>

    </tr> 

 <br>
<!-- INICIO CONVIVE -->
<table class="table table-hover">
<br>
    <tr>
      <td colspan="4"  ><strong><h2>Personas con quien convives </h2></strong></td>
    </tr>
    <tr>
      <td width="209">Nombre Apellido</td>
      <td width="209">Fecha Nac</td>
      <td width="209">DNI</td>
      <td width="209">Parentesco</td>
    </tr>
    <tr>
     
     <td><input name="txtNombreApellido" type="text" id="txtNombreApellido" title="NombreApellido" size="50" /></td>
     <td><input name="txtFechaNac" type="date" id="txtFechaNac" title="FechaNac" size="30" /></td>
     <td><input name="txtDNI" type="number" id="txtDNI" title="DNI" size="30" /></td>

   <td><select name="listParentesco"   id="listParentesco">
       <option value="0">Seleccione:</option>
       <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");
while ($valores = mysqli_fetch_array($query1))
     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>
    <tr>
     
      <td><input name="txtNombreApellido1" type="text" id="txtNombreApellido1" title="NombreApellido1" size="50" /></td>
      <td><input name="txtFechaNac1" type="date" id="txtFechaNac1" title="FechaNac1" size="30" /></td>
      <td><input name="txtDNI1" type="number" id="txtDNI1" title="DNI1" size="30" /></td>

    <td><select name="listParentesco1"   id="listParentesco1">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");
 while ($valores = mysqli_fetch_array($query1))
		  {

 echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
	?>
      </select></td>

    </tr>

    <tr>
     
     <td><input name="txtNombreApellido2" type="text" id="txtNombreApellido2" title="NombreApellido2" size="50" /></td>
     <td><input name="txtFechaNac2" type="date" id="txtFechaNac2" title="FechaNac2" size="30" /></td>
     <td><input name="txtDNI2" type="number" id="txtDNI2" title="DNI2" size="30" /></td>

   <td><select name="listParentesco2"   id="listParentesco2">
       <option value="0">Seleccione:</option>
       <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");
while ($valores = mysqli_fetch_array($query1))
     {
echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido3" type="text" id="txtNombreApellido3" title="NombreApellido3" size="50" /></td>
     <td><input name="txtFechaNac3" type="date" id="txtFechaNac3" title="FechaNac3" size="30" /></td>
     <td><input name="txtDNI3" type="number" id="txtDNI3" title="DNI3" size="30" /></td>

   <td><select name="listParentesco3"   id="listParentesco3">
       <option value="0">Seleccione:</option>
       <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");

while ($valores = mysqli_fetch_array($query1))
  
     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido4" type="text" id="txtNombreApellido4" title="NombreApellido4" size="50" /></td>
     <td><input name="txtFechaNac4" type="date" id="txtFechaNac4" title="FechaNac4" size="30" /></td>
     <td><input name="txtDNI4" type="number" id="txtDNI4" title="DNI4" size="30" /></td>

   <td><select name="listParentesco4"   id="listParentesco4">
       <option value="0">Seleccione:</option>
       <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");
while ($valores = mysqli_fetch_array($query1))

     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido5" type="text" id="txtNombreApellido5" title="NombreApellido5" size="50" /></td>
     <td><input name="txtFechaNac5" type="date" id="txtFechaNac5" title="FechaNac5" size="30" /></td>
     <td><input name="txtDNI5" type="number" id="txtDNI5" title="DNI5" size="30" /></td>

   <td><select name="listParentesco5"   id="listParentesco5">
       <option value="0">Seleccione:</option>
       <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");

while ($valores = mysqli_fetch_array($query1))

     {

echo '<option value="'.$valores['idParentesco'].'">'.$valores['Parentesco'].'</option>';
}
 ?>
     </select></td>

   </tr>

  </table>

    <tr>
      <td colspan="2">&nbsp;
		  
		  </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>

    </tr>
  </table>

  <!-- INICIO fORMULARIO eSTUDIO -->

  <table class="table table-hover">
    <tr>
      <td colspan="4"  ><strong><h2>Estudios Personal </h2></strong>	</td>
    </tr>
    <tr>
      <td >Estudio</td>
      <td >Estado</td>
      <td >Anos</td>
      <td >Obs</td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal"   id="listEstudioPersonal">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");

 while ($valores = mysqli_fetch_array($query1))
  
		  {

 echo '<option value="'.$valores['Estudio'].'">'.$valores['Estudio'].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado"   id="listEstado" title="Estado">
      <option value="Activo">Activo</option>
        <option value="Completo">Finalizado</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios" type="number" id="txtAnios" title="Anios" size="10" /></td>
      <td><input name="txtObs" type="text" id="txtObs" title="Obs" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal2"   id="listEstudioPersonal2">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");
while ($valores = mysqli_fetch_array($query1))
		  {

 echo '<option value="'.$valores['Estudio'].'">'.$valores['Estudio'].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado2"   id="listEstado2">
      <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios2" type="number" id="txtAnios2" title="Anios2" size="10" /></td>
      <td><input name="txtObs2" type="text" id="txtObs2" title="Obs2" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal3"   id="listEstudioPersonal3">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");
while ($valores = mysqli_fetch_array($query1))
 		  {
 echo '<option value="'.$valores['Estudio'].'">'.$valores['Estudio'].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado3"   id="listEstado3">
      <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios3" type="number" id="txtAnios3" title="Anios3" size="10" /></td>
      <td><input name="txtObs3" type="text" id="txtObs3" title="Obs3" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal4"   id="listEstudioPersonal4">
        <option value="0">Seleccione:</option>
        <?php
//include("../Conexion/conexion.php");
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");

 while ($valores = mysqli_fetch_array($query1))
		  {
 echo '<option value="'.$valores['Estudio'].'">'.$valores['Estudio'].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado4"   id="listEstado4">
      <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios4" type="number" id="txtAnios4" title="Anios4" size="10" /></td>
      <td>
        <input name="txtObs4" type="text" id="txtObs4" title="Obs4" size="30" />
      </td>
    </tr>

  </table>

  <!-- FIN fORMULARIO eSTUDIO -->

        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Cargar" />

      <form>
</div>
	
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