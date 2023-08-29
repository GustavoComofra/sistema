<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
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
	<link rel="stylesheet" href="/sistema/css/estiloHome.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	
	<!-- Logo Icono -->
<link href="img/Icono.png" rel="icon" type="image/png">
 <title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>

<?php	
//include ("header.php");
/*session_start();
	$u = $_POST['txtUsuario'];*/
?>

<!--<div class="row g-1">
<div id="Lateral" class="col-2 col-md-2 IdBarraLateral">


</div>-->


<!-- Section: Design Block -->
<section class="vh-100" style="background-image: url(../sistema/img/FonfoComofra.PNG);
background-repeat: no-repeat;
background-position: center;
background-size: cover;
">
  <div class="container py-5 h-100">
 
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
	 
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
		
          <div class="card-body p-5 text-center">
		  <form method="post" action="../sistema/validar.php" name="form1">
			<style>
				.CssImage{
    position: relative;
	
    width: 50px;
    height: 50px;
	
   border-radius: 50% 50%;
}
			</style>
		  <img class="CssImage" href="index.html" src="../sistema/img/IconoMovimiento.gif" width="100%" height="100%" alt="Imagen logo"/>
            <h3 class="mb-5">Iniciar sesion</h3>

            <div class="form-outline mb-4">
              <input type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">User</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="txtClave"  id="txtClave" placeholder="password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

           

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">
			</form>
          

          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Section: Design Block -->
	<div class="container">
	
<!--   <div class="claseIndex" style=" align-items: center; ">
	  <form method="post" action="../validar.php" name="form1">
       
              <div class="row">
                <div class="col-sm-6">
			         <input class="" type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario" >
                  <input class="" type="password" name="txtClave"  id="txtClave" placeholder="password" >
					<button class="btn btn-primary" type="submit" name="">Ingresar</button>
                </div>
              </div>
              
              
 
				
    </form>
	<img class="align-content-center" src="https://planidear.com.ar/RRHH/img/FondoPanel1.jpeg" width="100%" height="100%" alt="" id="IdImagenEntrada" />    
   </div>
</div>
	
	</div>-->

<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
	

	</body>
</html>
