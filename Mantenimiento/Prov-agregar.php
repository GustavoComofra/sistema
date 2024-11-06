<?php
// Prov-agregar.php
//var_dump($_POST); // Muestra los datos enviados
//exit; // Para probar si los datos están siendo recibidos correctamente

include("../Conexion/conexion.php");

$Proveedor = mysqli_real_escape_string($mysqli, $_POST['Proveedor']);
$Direccion = mysqli_real_escape_string($mysqli, $_POST['Direccion']);
$Fk_Localidad = mysqli_real_escape_string($mysqli, $_POST['Fk_Localidad']);
$FK_Provincia = mysqli_real_escape_string($mysqli, $_POST['FK_Provincia']);
$Telefono = mysqli_real_escape_string($mysqli, $_POST['Telefono']);
$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
$Contacto = mysqli_real_escape_string($mysqli, $_POST['Contacto']);
$ObsProv = mysqli_real_escape_string($mysqli, $_POST['ObsProv']);

/*
$query = "INSERT INTO `Proveedor` (`IdProv`, `Proveedor`, `Direccion`, `Fk_Localidad`, `FK_Provincia`, `Telefono`, `Email`, `Contacto`, `Activo`, `FechaProv`, `ObsProv`) 
          VALUES (NULL, '$Proveedor', '$Direccion', '$Fk_Localidad', '$FK_Provincia', '$Telefono', '$Email', '$Contacto', 'Si', current_timestamp(), '$ObsProv');";
          */

$query = "INSERT INTO `Proveedor` (`IdProv`, `Proveedor`, `Direccion`, `Fk_Localidad`, `FK_Provincia`, `Telefono`, `Email`, `Contacto`, `Activo`, `FechaProv`, `ObsProv`) VALUES (NULL, '$Proveedor', '$Direccion', '$Fk_Localidad', '$FK_Provincia', '$Telefono', '$Email', '$Contacto', 'Si', current_timestamp(), '$ObsProv ');";





$result = mysqli_query($mysqli, $query);

if (!$result) {
    die('Error: ' . mysqli_error($mysqli));
}

echo "Agregado satisfactoriamente: " . htmlspecialchars($Proveedor);

?>
