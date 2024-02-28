function pruebaExterna() {
    alert('al actualizar Un mensaje de prueba desde un archivo externo');
}

/* Selecciona cualquier <input> cuando se enfoca */


//funciones js
//valida la edad despues de enviar los datos desde 
//http://planidear.com.ar/a5-g6-gimnasio/form_registro.html
function EresMayoEdad(){
	alert("Eres mayor de edad");
	//swal ( "Eres mayor de edad" ) ;
}

function EresMenorEdad(){
	alert("Eres Menor de edad se enviara un correo!!!");
	//swal ( "Eres Menor de edad se enviara un correo!!!" ) ;
	
}

//Esta funcion esta en la pagina index.html
//cuando se pasa el mouse por encima del logo en el cuero de la pagina
//esta cambia de tamaÃ±o
function CambiarImagen(){
	document.getElementById("logo").style.height="200px"
	document.getElementById("logo").style.width="200px"
	
}


//las validadciones validar conmvre y apellido lo hace cuando exite un cambio
//en el formulario registro, si tiene  menos de los caracteres da un aviso, ademas cambia el DOM h4
	function validaNombre(){
		if(document.getElementById("txtNombre").value.length <= 2 ){
document.getElementById ("AvNombre"). innerHTML = "ingrese un nombre de minimo 2 caracteres" ;		
			swal ( "ingrese un nombre de minimo 2 caracteres" ) ;
			return false;
		}else{
			document.getElementById ("AvNombre"). innerHTML = "ok con el ingreso nombre" ;
			
		}
	}
function validaApellido(){
		if(document.getElementById("txtApellido").value.length <= 2){
document.getElementById ("AvApellido"). innerHTML = "OK" ;	
			return false;
		}else{
			document.getElementById ("AvApellido"). innerHTML = "ok con el ingreso apellido" ;
			
		}
	}

function validaCuit(){
		if(document.getElementById("codigo").value.length == 11 ){
document.getElementById ("AvPrueba"). innerHTML = "ingreso su CUIT de Entrada" ;
document.formIng.submit();
			return false;
		}else{
			 
			document.getElementById ("AvPrueba"). innerHTML = "ERROR" ;
			
		}
	}


function validaCuitSal(){
		if(document.getElementById("codigoSal").value.length == 11 ){
document.getElementById ("AvPruebaSal"). innerHTML = "ingreso su CUIT de salida" ;
document.formSal.submit();
return false;
		}else{
			 
			document.getElementById ("AvPruebaSal"). innerHTML = "ERROR" ;
			
		}
	}

//Reloj digital
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function volver()
{
	window.location.href = "/RRHH/index.php";
}

function AlertarBorra()
{
	
	alert('Esta seguro de borrar un registro?');
}
function AlertarAnulacion()
{
	
	alert('Usted a anulado un registro!!');
	window.location.href = "../sistema/";
}

function FormHorarioTeorico()
{
	window.location.href = "../sistema/FormHoraTeorico.php";
}