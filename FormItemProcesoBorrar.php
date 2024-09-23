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
</head>
</script>	

<style>
.imgEfc{
  position: relative;
  width: 50px;
  height: 50px;

}
.Advertencia{
  color: red;
}



</style>
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
        $id_itemproceso= $_GET['id_itemproceso'];
        //echo $id_itemproceso; 
        $queryitemproproceso = $mysqli->query("SELECT * FROM `item_proceso` WHERE `id_itemproceso` = ".$id_itemproceso.";");

        $rowitemproproceso = mysqli_fetch_assoc($queryitemproproceso);
                    ?>

  <div class="container-fluid">
    <div class="row">

      <div class="col col-lg-2">
        <?php
        include("MarcoIzquierdo.php");

        ?>
      </div>
      <div class="col-md-auto">
        <form action="#" method="post" name="formEditarItemProceso" enctype="multipart/form-data">
          <div class="form-group">
            
          <table class="table">
              <tr>
                <td colspan="6"  ><label><h2>Borrar Item de proceso Procesos?</h2></label></td>
              </tr>
              <tr>
              <td width="">Id</td>
                <td width="">Op</td>
                <td width="">Proceso</td>
                <td width="">Prod</td>
                <td width="">Imagen</td>
                <td width="">Proce</td>
              </tr>

              <tr>
              <td><input name="txtid_itemproceso" type="text" id="txtid_itemproceso" title="id_itemproceso" size="5" value="<?php print $rowitemproproceso['id_itemproceso']; ?>"/></td>
                <td><input name="txtOp" type="text" id="txtOp" title="Op" size="5" value="<?php print $rowitemproproceso['Op']; ?>"/></td>
                <td><textarea name="txtItemProceso" rows="2" cols="20" id="txtItemProceso" title="ItemProceso"  value="<?php print $rowitemproproceso['ItemProceso']; ?>"><?php print $rowitemproproceso['ItemProceso']; ?></textarea></td>
 <td><input name="txtFk_ProdProc" type="text" id="txtFk_ProdProc" title="Fk_ProdProc" size="5" value="<?php print $rowitemproproceso['Fk_ProdProc']; ?>"/></td> 

 <td width="">
                <a href="<?php print "FormItemImgProcesoEditar.php?id_itemproceso=".$rowitemproproceso['id_itemproceso']; ?>"><img class="imgEfc" name="img_itemproce" id="img_itemproce" src="<?php print $rowitemproproceso['img_itemproce']; ?>"/></a>

                </td>
                <td><input name="txtFk_Proceso" type="text" id="txtFk_Proceso" title="Fk_Proceso" size="5" value="<?php print $rowitemproproceso['Fk_Proceso']; ?>"/></td>

              </tr>


          </table>
          </div>

          <label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" value="Borrar item" />
      </label>

        <?php
        include("Conexion/conexion.php");

//Items Procesos
$form = $_POST['formEditarItemProceso'];
$id_itemproceso=$_POST['txtid_itemproceso'];
$Op=$_POST['txtOp'];
$ItemProceso=$_POST['txtItemProceso'];
$Fk_ProdProc=$_POST['listFk_ProdProc'];
$CantOper=$_POST['txtCantOper'];
$TiempoEstandarMi=$_POST['txtTiempoEstandarMi'];
$TiempoInefMi=$_POST['txtTiempoInefMi'];
$Inicio=$_POST['txtInicio'];
$Final=$_POST['txtFinal'];

$Fk_Herramienta=$_POST['listFk_Herramienta'];
$Fk_Proceso=$_POST['txtFk_Proceso'];
$Advertencia=$_POST['txtAdvertencia'];
$img_itemproce=$_POST['img_itemproce'];

echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$rowitemproproceso['Fk_Proceso']."\">
<img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnEditar\" width=\"90\" height=\"40\"></a></td>\n";

$BorrarItemProceso = "DELETE FROM item_proceso WHERE `item_proceso`.`id_itemproceso` = '$id_itemproceso';";



$ejecutar_BorrarItemProceso=mysqli_query($mysqli,$BorrarItemProceso);

mysqli_close($mysqli);

?>

</form>
      </div>
    </div>
  </div>


</body>

</html>