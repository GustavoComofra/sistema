<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <!-- Script JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/sistema/js/Archivo.js"></script>
  <!-- Estilo Alertas -->
  <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="/sistema/css/estiloHome.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">





  <!-- Logo Icono -->
  <link href="../sistema/img/Icono.png" rel="icon" type="image/png">
  <title>Editar imagen de item proceso</title>
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

    function volverProceso() {
      window.location.href = "/sistema/ListProceso.php";
          alert("Imagen actualizada");
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
        <form action="#" method="post" name="formEditarItemImgProceso" enctype="multipart/form-data">
          <div class="form-group">
            
          <table class="table">
              <tr>
                <td colspan="12" align="center"><label>Item de proceso Procesos</label></td>
              </tr>
              <tr>
              <td width="">Id</td>
                <td width="">Op</td>
                <td width="">Proceso</td>
                <td width="">img</td>
                <td width="">Nueva</td>
              </tr>

              <tr>
              <td><input name="txtid_itemproceso" type="text" id="txtid_itemproceso" title="id_itemproceso" size="5" value="<?php print $rowitemproproceso['id_itemproceso']; ?>"/></td>
                <td><input name="txtOp" type="text" id="txtOp" title="Op" size="5" value="<?php print $rowitemproproceso['Op']; ?>"/></td>
                <td><textarea name="txtItemProceso" rows="2" cols="20" id="txtItemProceso" title="ItemProceso"  value="<?php print $rowitemproproceso['ItemProceso']; ?>"><?php print $rowitemproproceso['ItemProceso']; ?></textarea></td>

                <td width="">
                <img class="imgEfc" name="img_itemproce" id="img_itemproce" src="<?php print $rowitemproproceso['img_itemproce']; ?>"/>

                </td>   
                <td>
                  <input type="file" name="imagen" id="imagen">

                </td>
              </tr>


          </table>
          </div>

          <label>
        <input type="submit" class="btn btn-success" name="btnEditar" id="btnEditar" onclick="volverProceso()" value="Editar Imagen" />
      </label>

        <?php
        include("Conexion/conexion.php");

//Items Procesos
$id_itemproceso=$_POST['txtid_itemproceso'];
$Op=$_POST['txtOp'];
$ItemProceso=$_POST['txtItemProceso'];
$Fk_ProdProc=$_POST['listFk_ProdProc'];

$img_itemproce=$_POST['img_itemproce'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_iamgen=$_FILES['imagen']['type'];
$tamagno_imegen=$_FILES['imagen']['size'];
$carpetas_destino='ftp.planidear.com.ar/img/procesos/' . $nombre_imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'],"img/procesos/".$nombre_imagen);
$Imagen = 'https://interno.comofrasrl.com.ar/sistema/img/procesos/'.$nombre_imagen;				

echo "<td>"."<a href=\"/sistema/FormProcesoEditar.php?id_proceso=".$rowitemproproceso['Fk_Proceso']."\">
<img src=\"../sistema/img/BtnVolver.png\" alt=\"BtnEditar\" width=\"90\" height=\"40\"></a></td>\n";

$EditarItemProceso = "UPDATE `item_proceso` SET `img_itemproce` = '$Imagen' WHERE `item_proceso`.`id_itemproceso` = '$id_itemproceso';";



$ejecutar_EditarItemProceso=mysqli_query($mysqli,$EditarItemProceso);

mysqli_close($mysqli);
header("Location: ListProceso.php");

?>

</form>
      </div>
    </div>
  </div>


</body>

</html>