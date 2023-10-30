<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
  <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/garantia/css/styles.css" >
  <link rel="stylesheet" href="https://interno.comofrasrl.com.ar/sistema/garantia/css/home.component.css" >

  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garantia Comofra SRL</title>
  <style>
				.CssImage{
    position: relative;
	margin-left: 40%;
    width: 70px;
    height: 70px;
	
   border-radius: 50% 50%;
}
			</style>
</head>
<body>
<div class="container py-5 h-100">

<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-12 col-md-8 col-lg-6 col-xl-5">

    <div class="card p-5 text-center" style="border-radius: 1rem;">
    <img class="CssImage" href="" src="https://interno.comofrasrl.com.ar/sistema/img/IconoMovimiento.gif"  alt="Imagen logo"/>
      <div class="card-body p-5 text-center">
        <!-- <div ngForm class="form-control"> -->
        <form class="row g-3 needs-validation" action="enviado.php" method="post">


         <h3 class="mb-5">Habilitacion de Garantia</h3>
      <h3 class="mb-5">Ingresar datos del implemento</h3>
      <p><label for="Serie">N° Serie</label> -


        <a class="" href="#"><img class="imagenConsulta" href="" src="../garantia/imgGarantia/iconoPregunta.png" width="30" height="30" alt="Consulta de chasis"/>
          <img class="imagenResultado" href="" src="../garantia/imgGarantia/ChapaSerie.jpg"  alt="Consulta de chasis"/>
        </a>

      </p>

        <input type="number" class="form-control" id="Serie" name="Serie" minlength="6" placeholder="Numero de Serie del implemento" aria-describedby="inputGroupPrepend" required>

        <label for="Cliente">Cliente</label>
        <input type="text" class="form-control"  id="Cliente" name="Cliente" placeholder="Ingrese el Cliente" aria-describedby="inputGroupPrepend" required>

        <label for="Correo">Correo Electronico</label>
        <input type="email" class="form-control"  id="Correo" name="Correo" placeholder="Ingrese su Correo electronico" aria-describedby="inputGroupPrepend" required>




        <label for="Telefono">Telefono</label>
        <input type="number" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese su Telefono" aria-describedby="inputGroupPrepend" required>


      <button type="submit" class="btn btn-primary btn-lg btn-block" >Pedir Garantia</button>

</form>
<!-- </div> -->
</div>
</div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


</body>
</html>
