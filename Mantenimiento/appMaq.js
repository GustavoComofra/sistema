let edit = false;

$(document).ready(function(e){

    obtenerListado();

    //AGREGAR

    $('#formMaquinaria').submit(function(e){
        // console.log("Enviando");
        const postData = {
        Maquina: $('#txtMaquina').val(),
        Modelo: $('#txtModelo').val(),
        Link: $('#txtLink').val(),

        imagen: $('#imagen').val(),
        ProvedMaq: $('#listProvedMaq').val(),
        ContMaq: $('#txtContMaq').val(),

        DiasManteni: $('#txtDiasManteni').val(),
        ValorMaq: $('#txtValorMaq').val(),
        ObsMaq: $('#txtObsMaq').val(),

        idMaq: $('#idMaq').val(),
        userMAq: $('#txtuserMAq').val(),
        }
        
let url = edit === false  ? 'Maq-agregar.php' : './Mantenimiento/Maq-Editar.php';
        // console.log(url);
        $.post(url, postData, function(response){
       console.log(response);
        obtenerListado();
        //para resetear el formulario
         $('#formMaquinaria').trigger('reset');
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
            url: 'inventario-listar.php',
            type: 'GET',
            success: function(response){
                //JSON.parse(response); respuestas del servidor
                let inventlist = JSON.parse(response);
                let template ='';
                inventlist.forEach(inventario => {
                    template +=`<tr atrInventarioId="${inventario.idInventario }">
                    <td>${inventario.idInventario }</td>
                    <td>${inventario.CodCmg}</td>
                    <td>${inventario.Producto}</td>
                    <td>${inventario.Cantidad}</td>
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
