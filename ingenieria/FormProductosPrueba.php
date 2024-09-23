<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<!-- Script JS -->
	<!-- <script src="../dir/js/bootstrap.min.js" ></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/Archivo.js"></script>	
	<!-- Estilo Alertas -->
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../sistema/dir/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
  <link href="img/Icono.png" rel="icon" type="image/png">
 <title>Productos</title>
 <!-- <link rel="stylesheet" href="/sistem/lib/bootstrap.min.css">
	<script src="/sistem/lib/jquery.js"></script> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php	
include ("header.php");
session_start();
	$u = $_POST['txtUsuario'];
?>
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
</head>
<body>
	
<?php	

session_start();
	
$varCerrarSession = $_SESSION['usuario'];

	if($varCerrarSession == null || $varCerrarSession = ''){
	echo "<H1>"."Usted no tiene autorizacion"."<H1>";
echo "<button type=\"button\" class=\"btn btn-primary\"  onClick=\"volver()\">volver</button>";		
		
die();
	
	}
?>	


<div class="container-fluid">
  <div class="row">

    <div class="col col-lg-2">
	<?php	
include ("MarcoIzquierdo.php");

?>	
	
		
    </div>
    <div class="col-md-auto">

    <div class="container">
		<div class="jumbotron">
		<div class="input-group mb-3">
		  <input type="text" class="form-control" id="txtbusca" name="txtbusca" placeholder="Buscar" aria-label="buscar" aria-describedby="basic-addon2">
		  <div class="input-group-append">
		    <span class="input-group-text" id="basic-addon2">BUSCAR</span>
		  </div>
		</div>
		</div>
	</div>
	<div class="CargarProducto"></div>

	<script>
		$(document).ready(function(){
			$("#txtbusca").keyup(function(){
				var parametros="txtbusca="+$(this).val();
				$.ajax({
	                data:  parametros,
	                url:   'CargarProducto.php',
                  type:  'post',
	                beforeSend: function () { },
	                success:  function (response) {                	
	                    $(".CargarProducto").html(response);
	                },
	                error:function(){
	                	alert("error")
	                }
            	});
			})
		})
	</script>

<script>

document.getElementById("txtbusca").addEventListener("keyup", e=>{
  var parametros = {txtbusca : e.target.value}
  fetch("CargarProducto.php",{
    method:'POST',
    body:JSON.stringify(parametros),
    dataType: "json",
    headers:{
      'X-Request-With' : 'XMLHttpRequest',
      'Accept': 'application/json',
      'Content-Type' : 'application/json'
    }
  }).then(data=>{
    return response.json()
  }).then(data=>{
    CargarProducto.innerHTML = data
  }).catch(error=>console.error(error));
})

</script>

    </div>
  </div>
</div>	

	
</body>
</html>