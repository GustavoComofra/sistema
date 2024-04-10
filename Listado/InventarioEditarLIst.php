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
        $idInventario = $_GET['idInventario'];
        //echo $idInventario; 
        $queryInventario = $mysqli->query("SELECT * FROM `Inventario` WHERE `idInventario` = " . $idInventario . ";");

        $rowInventario = mysqli_fetch_assoc($queryInventario);

        ?>



      </div>
      <div class="col-md-auto">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="formEditInventario">
        <div class="form-group" align="">
            <table class="table" width="" border="0">
              <tr>
                <td colspan="2" align="left">

                  <label >Formulario inventario editar</label>
                </td></tr>
                <tr>
                <td colspan="2" align="left">
                  <label for="txtidInventario">Id</label>
                  <input name="txtidInventario" type="text" id="txtidInventario" size="10" value="<?php print $rowInventario['idInventario']; ?>" />
                  </td></tr>
                <tr>
                <td colspan="2" align="left">
                  <label for="txtCodCmg">
                    <p>CodCmg</p>
                  </label>
                  <input name="txtCodCmg" type="number" id="txtCodCmg" value="<?php print $rowInventario['CodCmg']; ?>" />
                  </td></tr>
                <tr>
                <td colspan="2" align="left">
                  <label for="txtCantidad">
                    <p>Cantidad</p>
                  </label>
                  <input name="txtCantidad" type="number" id="txtCantidad"  value="<?php print $rowInventario['Cantidad']; ?>" />
                  </td></tr>
                <tr>
                <td colspan="2" align="left">
                  <label for="txtObsInv">
                    <p>ObsInv</p>
                  </label>
                  <input name="txtObsInv" type="text" id="txtObsInv" size="50" value="<?php print $rowInventario['ObsInv']; ?>" />
                  </td></tr>
                <tr>
                <td colspan="2" align="left">
                  <label for="txtActCMG">
                    <p>Sacar Listado</p>
                  </label>
                  <select name="txtActCMG" size="1" id="txtActCMG">
                    <option value="<?php print $rowInventario['ActCMG']; ?>"><?php print $rowInventario['ActCMG']; ?></option>
<option value="No">No</option>
<option value="Si">Si</option>             
                  </select>
                  </td></tr>
                <tr>
                <td colspan="2" align="left">
          <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Editar"  />
          </td></tr>
            </table>
          </div>

        </form>
<?php
$idInventario=$_POST['txtidInventario'];
$CodCmg=$_POST['txtCodCmg'];	
$Cantidad=$_POST['txtCantidad'];	
$ObsInv=$_POST['txtObsInv'];
$ActCMG=$_POST['txtActCMG'];	


if(!$idInventario==null){
	
	echo "<h1>"."<a href=\"/sistema/ListadoInventario.php\">Volver</a>"."</h1>";
	echo "
	
	";
	
include("Conexion/conexion.php");	//UPDATE `Inventario` SET `ActCMG` = 'Si' WHERE `Inventario`.`idInventario` = 138;
//actualizar todo a `ActCMG` = 'Si'
//UPDATE `Inventario` SET `ActCMG` = 'Si' WHERE `ActCMG` LIKE 'No' 
$EditarRegistroInventario = "UPDATE `Inventario` SET `CodCmg` = '$CodCmg', `Cantidad` = '$Cantidad', `ObsInv` = '$ObsInv', `ActCMG` = '$ActCMG' WHERE `Inventario`.`idInventario` = ".$idInventario.";";



$ejecutar_EditarRegistroInventario=mysqli_query($mysqli,$EditarRegistroInventario);

	
}	
	

	
	
mysqli_close($mysqli);


?>

      </div>
    </div>
  </div>

</body>

</html>