//console.log("Estamos en app.js-1");
let edit = false;

$(document).ready(function(e){

    obtenerListado();

    //AGREGAR


        $('#app-form').submit(function(e){
             //console.log("Enviando");
            const postData = {
            CodCmg: $('#ModalBuscarBody').val(),
            Cantidad: $('#txtCantidad').val(),
            ObsInv: $('#txtObsInv').val(),
            idInventario: $('#idInventario').val(),
            UsuarioInventario: $('#txtUser').val(),
            }
            
  
    let url = edit === false  ? 'inventario-agregar.php' : 'inventario-Editar.php';
            // console.log(url);

            
var sonido = new Audio();
sonido.src="https://interno.comofrasrl.com.ar/sistema/Compartidos/perder-incorrecto-no-valido.mp3";
            $.post(url, postData, function(response){
           console.log(response);
           if (response === " Error " ) {
            sonido.play();
            alert("Error al cargar");
   
           }
           //console.log(response);
           
            obtenerListado();
            //para resetear el formulario
             $('#app-form').trigger('reset');
            });
             //para evitar que se refresque la pagina
             e.preventDefault();
         
         
         });
    



//ELIMINAR
    $(document).on('click', ".list-inve", function(e){
if (confirm('Estas seguro de eliminar el registro?')) {
    let elemento = $(this)[0].parentElement.parentElement;
    let id = $(elemento).attr('atrInventarioId');
      //console.log(id);
    $.post('inventario-borrar.php', {id}, function(response){
     console.log(response);
     obtenerListado();
     $('#app-form').trigger('reset');
     });
      //para evitar que se refresque la pagina
      e.preventDefault();//invetEditarinvetEditar
   // console.log(id);
}
    })

    //EDITAR
    $(document).on('click', ".inve-item", function(e){
        let elemento = $(this)[0].parentElement.parentElement;
        let idInventario = $(elemento).attr('atrInventarioId');

        $.post('inventario-Unico.php', {idInventario}, function(response){
            let invetEditar = JSON.parse(response);
            $('#idInventario').val(invetEditar.idInventario);         
            $('#ModalBuscarBody').val(invetEditar.CodCmg);
            $('#txtCantidad').val(invetEditar.Cantidad);
            $('#txtObsInv').val(invetEditar.ObsInv);
            $('#txtUser').val(invetEditar.UsuarioInventario	);
            edit = true;
            });
             //para evitar que se refresque la pagina
             e.preventDefault();
     
    })  

//Listar
    function obtenerListado(){
        $.ajax({
            url: 'https://interno.comofrasrl.com.ar/sistema/Listado/inventario-listar.php',
            type: 'GET',
            success: function(response){
  
               // JSON.parse(response); //respuestas del servidor
                let inventlist = JSON.parse(response);
                let template ='';
                inventlist.forEach(inventario => {
                    template +=`<tr atrInventarioId="${inventario.idInventario }">
                    <td>${inventario.idInventario }</td>
                    <td>${inventario.CodCmg}</td>
                    <td>${inventario.Producto}</td>
                    <td>${inventario.UM}</td>
                    <td>${inventario.Cantidad}</td>

                    <td>${inventario.CantidadStock}</td>
                    <td>${inventario.Acumulado}</td>
                    <td>${inventario.Importe}</td>
                    <td>${inventario.Almacen}</td>

                    <td>${inventario.ObsInv}</td>
                    <td><button class="list-inve btn btn-danger">Borrar</button></td>
                    <td>
                    <button class="inve-item btn btn-warning">Editar</button>
                    </td>
   
                    </tr>`
    
                });
                $('#tb_inventario').html(template);
            }
        })
    }

});
