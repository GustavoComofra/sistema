<?php	
session_start();
	
$varCerrarSession = $_SESSION['usuario'];
	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
		die();
		
	}
?>	

<!doctype html lang="es">
<html>
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<meta charset="utf-8">
<link href="../sistema/img/Icono.png" rel="icon" type="image/png">
 <title>Formulario personal</title>
<link href="/css/estiloHome.css" rel="stylesheet" type="text/css">
</head>
<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
<body>

	
<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
//include ("MarcoIzquierdo.php");

?>	
    </div>
    <div class="col-md-auto">
		
<form action="/sistema/insertarPersonal.php" method="post" name="formPersonal" enctype="multipart/form-data">

<div align="">
  <table width=""  border="0">
    <tr>
      <td colspan="2" align="center"><label>Formulario Personal</label></td>
    </tr>

    <tr>
      <td width="226">Legajo:<strong style="color: Red;">*</strong> </td>
      <td width="317"><input name="txtLegajo" type="number" id="txtLegajo" minlength="11" maxlength="12" size="11" require  />
		</td>    

    <tr>
      <td width="226">CUIL:<strong style="color: Red;">*</strong> </td>
      <td width="317"><input name="txtCUIT_Empl" type="number" id="txtCUIT_Empl" minlength="11" maxlength="12" size="11" require />
		</td>
    </tr>
    <tr>
      <td>Nombres: <strong style="color: Red;">*</strong> </td>
      <td>
        <input name="txtNombres" type="text" id="txtNombres" size="50"  require />
     </td>
    </tr>
    <tr>
      <td>Apellidos:  <strong style="color: Red;">*</strong> </td>
      <td><input name="txtApellidos" type="text" id="txtApellidos" size="50"  require /></td>
    </tr>
    <tr>
      <td>Fecha de Ingreso:</td>
      <td><input name="txtFechaIngreso" type="date" id="txtFechaIngreso" size="50" value="<?php echo date("Y-m-d");?>" /></td>
    </tr>
    <tr>
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
        <input type="submit" name="submit" value="enviar">
        </p></td>
    </tr>
    <tr>
      <td>Fecha de nacimiento:<strong style="color: Red;">*</strong>  </td>
      <td><input name="txtFechaNacimiento" type="date" id="txtFechaNacimiento" title="FechaNacimiento" size="50" require  /></td>
    </tr>
    <tr>
      <td>Domicilio: <strong style="color: Red;">*</strong> </td>
      <td><input name="txtDomicilio" type="text" id="txtDomicilio" size="50" require  /></td>
    </tr>
    <tr>
      <td>Localidad:</td>
      <td><select name="listLocalidad" size="1" id="listLocalidad">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Localidad` ORDER BY `Localidad`.`Localidad` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Localidad].'">'.$valores[Localidad].'</option>';
}
	?>
      </select></td>
    </tr>
	  
<tr>
      <td width="">Provincia :</td>
   <td><select name="listProvincia" size="1" id="listProvincia">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryProvincia = $mysqli -> query ("SELECT * FROM `Provincia` ORDER BY `Provincia`.`Provincia` ASC");


 while ($valoresProvincia = mysqli_fetch_array($queryProvincia))

		  
		  {

 echo '<option value="'.$valoresProvincia[Provincia].'">'.$valoresProvincia[Provincia].'</option>';
}
	?>
      </select>	  
	  
	</tr>  
	  
    <tr>
      <td>Nacionalidad:</td>
      <td><select name="listNacionalidad" size="1" id="listNacionalidad">
        <option value="Argentina">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryNacionalidad = $mysqli -> query ("SELECT * FROM `ComNacion` ORDER BY `ComNacion`.`Nacionalidad` ASC");


 while ($valoresNacionalidad = mysqli_fetch_array($queryNacionalidad))

		  
		  {

 echo '<option value="'.$valoresNacionalidad[Nacionalidad].'">'.$valoresNacionalidad[Nacionalidad].'</option>';
}
	?>
      </select></td>
    </tr>
    <tr>
      <td>Estado Civil:</td>
      <td><select name="listEstadoCivil" size="1" id="listEstadoCivil">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryEstadoCivil = $mysqli -> query ("SELECT * FROM `ComEstadoCivil` ORDER BY `EstadoCivil` ASC");


 while ($valoresEstadoCivil = mysqli_fetch_array($queryEstadoCivil))

		  
		  {

 echo '<option value="'.$valoresEstadoCivil[EstadoCivil].'">'.$valoresEstadoCivil[EstadoCivil].'</option>';
}
	?>
      </select></td>
    </tr>
	  
<tr>
      <td>Venimiento Carnet:</td>
      <td><input name="txtVenCarnet" type="date" id="txtVenCarnet" size="50" /></td>
    </tr>	  

 <tr>
      <td>Tipo Carnet:</td>
      <td><select name="listTipoCarnet" size="1" id="listTipoCarnet">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryTipoCarnet = $mysqli -> query ("SELECT * FROM `ComTipoCarnet` ORDER BY `TipoCarnet` ASC");


 while ($valoresTipoCarnet = mysqli_fetch_array($queryTipoCarnet))

		  
		  {

 echo '<option value="'.$valoresTipoCarnet[TipoCarnet].'">'.$valoresTipoCarnet[TipoCarnet].'</option>';
}
	?>
      </select></td>
    </tr>	  

    <tr>
      <td>Grupo sanguineo:</td>
      <td><select name="listGs" size="1" id="listGs">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$queryGs = $mysqli -> query ("SELECT * FROM `ComGrupoSan` ORDER BY `ComGrupoSan`.`Grupo` ASC");


 while ($valoresGs = mysqli_fetch_array($queryGs))

		  
		  {

 echo '<option value="'.$valoresGs[Grupo].'">'.$valoresGs[Grupo].'</option>';
}
	?>
      </select></td>
    </tr>	    
	  
    <tr>
      <td>Telefono:<strong style="color: Red;">*</strong>  </td>
      <td><p>
        <input name="txtTelefono" type="text" id="txtTelefono" size="50" require/>
      </p></td>
    </tr>

    <tr>
      <td>Telefono Urgencia: </td>
      <td><p>
        <input name="txtTelUrgencia" type="text" id="txtTelUrgencia" size="50"/>
      </p></td>
    </tr>

    <tr>
      <td>E-mail: </td>
      <td><input name="txtEmail" type="email" id="txtEmail" size="50" /></td>
    </tr>
    <tr>
      <td>Observacion:</td>
      <td><textarea name="txtObs" cols="50" id="txtObs" ></textarea></td>
    </tr>
<tr>
      <td>CategSueld:</td>
      <td><select name="listCategSueld" size="1" id="listCategSueld">
        <option value="1">Normal</option>
        <?php
include("Conexion/conexion.php");
  
$queryCategSuel = $mysqli -> query ("SELECT * FROM `ComCategSuel` ORDER BY `ComCategSuel`.`CategSuel` ASC");


 while ($valoresCategSuel = mysqli_fetch_array($queryCategSuel))

		  
		  {

 echo '<option value="'.$valoresCategSuel[Id_CategSuel].'">'.$valoresCategSuel[CategSuel].'</option>';
}
	?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

    <tr>
      <td>Obra Social: </td>
      <td><input name="txtObraSocial" type="text" id="txtObraSocial" size="50" /></td>
    </tr> 
    
    
    <tr>
      <td>Sector:</td>
      <td><select name="listSector" size="1" id="listSector">
        <option value="1">Sector</option>
        <?php
include("Conexion/conexion.php");
  
$querySector = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresSector = mysqli_fetch_array($querySector))

		  
		  {

 echo '<option value="'.$valoresSector[IdSector].'">'.$valoresSector[SectorFk].'</option>';
}
	?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        
    <tr>
      <td>ART: </td>
      <td><input name="txtART" type="text" id="txtART" size="50" /></td>
    </tr>    

    <tr>
      <td>Modalidad: </td>
      <td><input name="txtModalidad" type="text" id="txtModalidad" size="50" /></td>
    </tr>    
    <br>
    <tr>
      <td>Calle Norte: </td>
      <td><input name="txtCalleNorte" type="text" id="txtCalleNorte" size="50" /></td>
    </tr> 
    
    <tr>
      <td>Calle Sur: </td>
      <td><input name="txtCalleSur" type="text" id="txtCalleSur" size="50" /></td>
    </tr>    
    
    <tr>
      <td>Calle Este: </td>
      <td><input name="txtCalleEste" type="text" id="txtCalleEste" size="50" /></td>
    </tr> 
    
    <tr>
      <td>Calle Oeste: </td>
      <td><input name="txtCalleOeste" type="text" id="txtCalleOeste" size="50" /></td>
    </tr>     
    
     
    <tr>
      <td>Relacion:</td>
      <td>
        <select name="listRelacion" size="1" id="listRelacion">
        <option value="1">Seleccione</option>
        <?php
include("Conexion/conexion.php");
  
$queryRelacion = $mysqli -> query ("SELECT * FROM `RelacionPersonal` ORDER BY `RelacionPersonal`.`Relacion` ASC");


 while ($valoresRelacion = mysqli_fetch_array($queryRelacion))

		  
		  {

 echo '<option value="'.$valoresRelacion[idRelacion].'">'.$valoresRelacion[Relacion].'</option>';
}
	?>
      </select></td>
    </tr>

    <tr>
      <td>Encargado:</td>
      <td>
      <select name="listEncargado" size="1" id="listEncargado">
        <option value="0">Seleccione</option>
        <?php
include("Conexion/conexion.php");
  
$queryEncargado = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresEncargado = mysqli_fetch_array($queryEncargado))

		  
		  {

 echo '<option value="'.$valoresEncargado[IdSector].'">'.$valoresEncargado[SectorFk].'</option>';
}
	?>
      </select>    
    </td>
    </tr>

    <tr>
      <td>Gerente:</td>
      <td>
      <select name="listGerente" size="1" id="listGerente">
        <option value="0">Seleccione</option>
        <?php
include("Conexion/conexion.php");
  
$queryGerente = $mysqli -> query ("SELECT * FROM `ComSector` ORDER BY `ComSector`.`SectorFk` ASC");


 while ($valoresGerente = mysqli_fetch_array($queryGerente))

		  
		  {

 echo '<option value="'.$valoresGerente[IdSector].'">'.$valoresGerente[SectorFk].'</option>';
}
	?>
      </select>    
    </td>
    </tr>


    <td colspan="2">
		
    </td>
 <br>
<!-- INICIO CONVIVE -->
<table width="583" border="1">
<br>
    <tr>
      <td colspan="4" align="center"><label>Personas con quien convives </label></td>
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

   <td><select name="listParentesco" size="1" id="listParentesco">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>
    <tr>
     
      <td><input name="txtNombreApellido1" type="text" id="txtNombreApellido1" title="NombreApellido1" size="50" /></td>
      <td><input name="txtFechaNac1" type="date" id="txtFechaNac1" title="FechaNac1" size="30" /></td>
      <td><input name="txtDNI1" type="number" id="txtDNI1" title="DNI1" size="30" /></td>

    <td><select name="listParentesco1" size="1" id="listParentesco1">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
	?>
      </select></td>

    </tr>

    <tr>
     
     <td><input name="txtNombreApellido2" type="text" id="txtNombreApellido2" title="NombreApellido2" size="50" /></td>
     <td><input name="txtFechaNac2" type="date" id="txtFechaNac2" title="FechaNac2" size="30" /></td>
     <td><input name="txtDNI2" type="number" id="txtDNI2" title="DNI2" size="30" /></td>

   <td><select name="listParentesco2" size="1" id="listParentesco2">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido3" type="text" id="txtNombreApellido3" title="NombreApellido3" size="50" /></td>
     <td><input name="txtFechaNac3" type="date" id="txtFechaNac3" title="FechaNac3" size="30" /></td>
     <td><input name="txtDNI3" type="number" id="txtDNI3" title="DNI3" size="30" /></td>

   <td><select name="listParentesco3" size="1" id="listParentesco3">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido4" type="text" id="txtNombreApellido4" title="NombreApellido4" size="50" /></td>
     <td><input name="txtFechaNac4" type="date" id="txtFechaNac4" title="FechaNac4" size="30" /></td>
     <td><input name="txtDNI4" type="number" id="txtDNI4" title="DNI4" size="30" /></td>

   <td><select name="listParentesco4" size="1" id="listParentesco4">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
}
 ?>
     </select></td>

   </tr>

   <tr>
     
     <td><input name="txtNombreApellido5" type="text" id="txtNombreApellido5" title="NombreApellido5" size="50" /></td>
     <td><input name="txtFechaNac5" type="date" id="txtFechaNac5" title="FechaNac5" size="30" /></td>
     <td><input name="txtDNI5" type="number" id="txtDNI5" title="DNI5" size="30" /></td>

   <td><select name="listParentesco5" size="1" id="listParentesco5">
       <option value="0">Seleccione:</option>
       <?php
include("Conexion/conexion.php");
 
$query1 = $mysqli -> query ("SELECT * FROM `Parentesco` ORDER BY `Parentesco`.`Parentesco` ASC");


while ($valores = mysqli_fetch_array($query1))

     
     {

echo '<option value="'.$valores[idParentesco].'">'.$valores[Parentesco].'</option>';
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

  <table width="583" border="1">
    <tr>
      <td colspan="4" align="center"><label>Estudios Personal 
        
      </label>
		
		</td>
    </tr>
    <tr>
      <td width="209">Estudio</td>
      <td width="209">Estado</td>
      <td width="209">Años</td>
      <td width="209">Obs</td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal" size="1" id="listEstudioPersonal">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado" size="1" id="listEstado" title="Estado">
        <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios" type="number" id="txtAnios" title="Anios" size="10" /></td>
      <td><input name="txtObs" type="text" id="txtObs" title="Obs" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal2" size="1" id="listEstudioPersonal2">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado2" size="1" id="listEstado2">
      <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios2" type="number" id="txtAnios2" title="Anios2" size="10" /></td>
      <td><input name="txtObs2" type="text" id="txtObs2" title="Obs2" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal3" size="1" id="listEstudioPersonal3">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado3" size="1" id="listEstado3">
      <option value="Activo">Completo</option>
        <option value="Finalizado">Incompleto</option>
        <option value="EnCurso">EnCurso</option>
      </select></td>
      <td><input name="txtAnios3" type="number" id="txtAnios3" title="Anios3" size="10" /></td>
      <td><input name="txtObs3" type="text" id="txtObs3" title="Obs3" size="30" /></td>
    </tr>
    <tr>
      <td><select name="listEstudioPersonal4" size="1" id="listEstudioPersonal4">
        <option value="0">Seleccione:</option>
        <?php
include("Conexion/conexion.php");
  
$query1 = $mysqli -> query ("SELECT * FROM `ComEstudios` ORDER BY `ComEstudios`.`Estudio` ASC");


 while ($valores = mysqli_fetch_array($query1))

		  
		  {

 echo '<option value="'.$valores[Estudio].'">'.$valores[Estudio].'</option>';
}
	?>
      </select></td>
      <td><select name="listEstado4" size="1" id="listEstado4">
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
  <label>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnEnviar" id="btnEnviar" value="Cargar" />
      </label>
      <form>
</div>
	
    </div>
  </div>
</div>		
	

	
</body>
</html>