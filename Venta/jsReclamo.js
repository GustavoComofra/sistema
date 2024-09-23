function obtenerSeleccion() {
    // Obtener el elemento select por su ID
    var select = document.getElementById("SelectCarga");
    // Obtener el valor seleccionado
    var valorSeleccionado = select.value;

    if (valorSeleccionado == 2) {
console.log("valor seleccionado 2");
var varVistaOculta2 = document.getElementById("VistaOculta2");
varVistaOculta2.style.display = "block";
    } else if (valorSeleccionado == 3) {
console.log( "valor seleccionado 3");
var varVistaOculta2 = document.getElementById("VistaOculta2");
varVistaOculta2.style.display = "block";
var varVistaOculta3 = document.getElementById("VistaOculta3");
varVistaOculta3.style.display = "block";
    } else {
        var varVistaOculta2 = document.getElementById("VistaOculta2");
        varVistaOculta2.style.display = "none";
        var varVistaOculta3 = document.getElementById("VistaOculta3");
        varVistaOculta3.style.display = "none";
    }
}
    

  