let editProv = false;

$(document).ready(function() {
    obtenerListado();

    // Agregar o Editar
    $('#app-form-Prov').submit(function(e) {
        e.preventDefault(); // Previene que el formulario se envíe normalmente
        
        const postData = {
            IdProv: $('#IdProv').val(),
            Proveedor: $('#txtProveedor').val(),
            Direccion: $('#txtDireccion').val(),
            Fk_Localidad: $('#listLocalidad').val(),
            FK_Provincia: $('#listProvincia').val(),
            Telefono: $('#txtTelefono').val(),
            Email: $('#txtEmail').val(),
            Contacto: $('#txtContacto').val(),
            Activo: $('#txtActivo').val(),
            ObsProv: $('#txtObsProv').val(),
        };
        
        let url = editProv ? './Prov-Editar.php' : './Prov-agregar.php';
    
        // Enviar datos con depuración para verificar que se envían correctamente
        $.post(url, postData, function(response) {
            console.log("Respuesta del servidor:", response); // Verifica la respuesta
            obtenerListado();
            $('#app-form-Prov').trigger('reset');
            editProv = false;
        }).fail(function(xhr, status, error) {
            console.error("Error:", error); // Verifica errores de solicitud
            alert("Hubo un problema con la solicitud: " + error);
        });
    });
    

    // Buscar
    $('#containerBuscar').hide();
    $('#search').keyup(function() {
        let search = $('#search').val();
        if (search.trim()) { // Verifica que no esté vacío
            $.ajax({
                url: './Prov-Buscar.php',
                type: 'POST',
                data: {search},
                success: function(response) {
                    let proveedorlist = JSON.parse(response);
                    let template = '';
                    proveedorlist.forEach(proveedor => {
                        template += `<tr atrproveedorIdProv="${proveedor.IdProv}">
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
                        </tr>`;
                    });
                    $('#container').html(template);
                    $('#containerBuscarProv').show();
                    $('#containerListadoProv').hide();
                }
            });
        }
    });

    // Eliminar
    $(document).on('click', ".list-borrar", function() {
        if (confirm('¿Estás seguro de eliminar el registro?')) {
            let elemento = $(this).closest('tr');
            let IdProv = $(elemento).attr('atrproveedorIdProv');
            $.post('./Prov-eliminar.php', {IdProv}, function(response) {
                console.log(response);
                obtenerListado();
                $('#containerBuscar').hide();
                $('#app-form-Prov').trigger('reset');
            });
        }
    });

    // Editar
    $(document).on('click', ".prov-item", function() {
        let elemento = $(this).closest('tr');
        let IdProv = $(elemento).attr('atrproveedorIdProv');
        $.post('./Prov-Unico.php', {IdProv}, function(response) {
            let ProvEditar = JSON.parse(response);
            $('#IdProv').val(ProvEditar.IdProv);       
            $('#txtProveedor').val(ProvEditar.Proveedor);
            $('#txtDireccion').val(ProvEditar.Direccion);
            $('#listLocalidad').val(ProvEditar.Fk_Localidad);
            $('#listProvincia').val(ProvEditar.FK_Provincia);
            $('#txtTelefono').val(ProvEditar.Telefono);
            $('#txtEmail').val(ProvEditar.Email);
            $('#txtContacto').val(ProvEditar.Contacto);
            $('#txtActivo').val(ProvEditar.Activo);
            $('#txtObsProv').val(ProvEditar.ObsProv);
            editProv = true;
        });
    });

    // Listar
    function obtenerListado() {
        $.ajax({
            url: './Prov-listar.php',
            type: 'GET',
            success: function(response) {
                let proveedorlist = JSON.parse(response);
                let template = '';
                proveedorlist.forEach(proveedor => {
                    template += `<tr atrproveedorIdProv="${proveedor.IdProv}">
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
                    </tr>`;
                });
                $('#tb_proveedor').html(template);
                $('#containerListado').show();
            }
        });
    }
});
