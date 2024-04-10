let edit = false;

$(document).ready(function(e){
obtenerListado();

//AGREGAR

$('#app-form').submit(function(e){
    //console.log("Enviando");
   const postData = {
    IdProv: $('#IdProv').val(),
    Proveedor: $('#txtProveedor').val(),
    Direccion: $('#txtDireccion').val(),
    Fk_Localidad: $('#listFk_Localidad').val(),
    FK_Provincia: $('#listProvincia').val(),
    Telefono: $('#txtTelefono').val(),
    Email: $('#txtEmail').val(),
    Contacto: $('#txtContacto').val(),
    Activo: $('#txtActivo').val(),
    ObsProv: $('#txtObsProv').val(),

   }
   

   let url = edit == false  ? 'Prov-agregar.php' : 'Prov-Editar.php';
   console.log(url);

   $.post(url, postData, function(response){
  console.log(response);
  obtenerListado();
   //para resetear el formulario
    $('#app-form').trigger('reset');
   });
    //para evitar que se refresque la pagina
    e.preventDefault();


});

    //Buscar     
   $('#containerBuscar').hide();
    $('#search').keyup(function(e){
        if($('#search').val() || $('#search').val('')){
            
        let search = $('#search').val()+'';
        console.log(search);
         $.ajax({
             url: 'Prov-Buscar.php',
             type: 'POST',
             data: {search},
             success: function(response){
                //JSON.parse(response); respuestas del servidor
                let proveedorlist = JSON.parse(response);
                let template ='';
                proveedorlist.forEach(proveedor => {
                    template +=`<tr atrproveedorIdProv="${proveedor.IdProv}">
                    <td>${proveedor.IdProv}</td>
                    <td>${proveedor.Proveedor}</td>
                    <td>${proveedor.Direccion}</td>
                    <td>${proveedor.Fk_Localidad}</td>
                    <td>${proveedor.FK_Provincia}</td>
                    <td>${proveedor.Telefono}</td>
                    <td>${proveedor.Email}</td>
                    <td>${proveedor.Contacto}</td>
                    <td>${proveedor.Activo}</td>
                    <td>${proveedor.ObsProv}</td>
                    <td><button class="list-borrar btn btn-danger">Borrar</button></td>
                    <td><button class="prov-item btn btn-warning">Editar</button></td>
    
                    </tr>`
    
                });
                 $('#container').html(template);
                 $('#containerBuscar').show();
                 $('#containerListado').hide();
             }
         })
        }
    })

    

//ELIMINAR
$(document).on('click', ".list-borrar", function(e){
    if (confirm('Estas seguro de eliminar el registro?')) {
        let elemento = $(this)[0].parentElement.parentElement;
        let IdProv = $(elemento).attr('atrproveedorIdProv');
         // console.log(id);
        $.post('Prov-eliminar.php', {IdProv}, function(response){
         console.log(response);
         obtenerListado();
         $('#containerBuscar').hide();
         $('#app-form').trigger('reset');
         });
          //para evitar que se refresque la pagina
          e.preventDefault();
        console.log(IdProv);
    }
        })

   
    //EDITAR
    $(document).on('click', ".prov-item", function(e){
        let elemento = $(this)[0].parentElement.parentElement;
        let IdProv = $(elemento).attr('atrproveedorIdProv');
console.log(IdProv);
        $.post('Prov-Unico.php', {IdProv}, function(response){
            let ProvEditar = JSON.parse(response);
            $('#IdProv').val(ProvEditar.IdProv);       
            $('#txtProveedor').val(ProvEditar.Proveedor);
            $('#txtDireccion').val(ProvEditar.Direccion);
            $('#listFk_Localidad').val(ProvEditar.Fk_Localidad);
            $('#listProvincia').val(ProvEditar.FK_Provincia);
            $('#txtTelefono').val(ProvEditar.Telefono);
            $('#txtEmail').val(ProvEditar.Email);
            $('#txtContacto').val(ProvEditar.Contacto);
            $('#txtActivo').val(ProvEditar.Activo);
            $('#txtObsProv').val(ProvEditar.ObsProv);
            console.log("Num " + IdProv);
            edit = true;
            });
             //para evitar que se refresque la pagina
            e.preventDefault();
     
    })  

//Listar
function obtenerListado(){
    $.ajax({
        url: 'Prov-listar.php',
        type: 'GET',
        success: function(response){
            JSON.parse(response); //respuestas del servidor
            let proveedorlist = JSON.parse(response);
            let template ='';
            proveedorlist.forEach(proveedor => {
                template +=`<tr atrproveedorIdProv="${proveedor.IdProv}">
                <td>${proveedor.IdProv}</td>
                <td>${proveedor.Proveedor}</td>
                <td>${proveedor.Direccion}</td>
                <td>${proveedor.Fk_Localidad}</td>
                <td>${proveedor.FK_Provincia}</td>

                <td >${proveedor.Telefono}</td>
                <td>${proveedor.Email}</td>
                <td>${proveedor.Contacto}</td>
                <td>${proveedor.Activo}</td>
                <td>${proveedor.ObsProv}</td>
                <td><button class="list-borrar btn btn-danger">Borrar</button></td>
                <td><button class="prov-item btn btn-warning">Editar</button></td>

                </tr>`

            });
            $('#tb_proveedor').html(template);
            $('#containerListado').show();
        }
    })
}

});
