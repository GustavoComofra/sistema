let edit = false;

$(document).ready(function(e){

    obtenerListado();

    //Buscar     
    $('#containerBuscar').hide();
    $('#search').keyup(function(e){
        if($('#search').val() || $('#search').val('')){
            
        let search = $('#search').val()+'';
        // console.log(search);
         $.ajax({
             url: '../Mantenimiento/BackEnd/Maq-Buscar.php',
             type: 'POST',
             data: {search},
             success: function(response){
                //JSON.parse(response); respuestas del servidor
                let maquinarialist = JSON.parse(response);
                let template ='';
                maquinarialist.forEach(maquinaria => {
                    template +=`<tr atrmaquinariasidMaq="${maquinaria.idMaq}">
                    <td >${maquinaria.idMaq}</td>
                    <td>${maquinaria.Maquina}</td>
                    <td>${maquinaria.Modelo}</td>
                    <td>${maquinaria.DiasManteni}</td>
                    <td>${maquinaria.Link}</td>
                    <td>${maquinaria.ProvedMaq}</td>
                    <td>${maquinaria.Fk_Clasi}</td>
                    <td>${maquinaria.ContMaq}</td>
                    <td>${maquinaria.ValorMaq}</td>
                    <td>${maquinaria.ObsMaq}</td>
                    <td><img src="${maquinaria.imgMaq}" id="foto" style="width: 50px; high: 50px;"/></td>
                      <td><button class="list-borrar btn btn-danger">Borrar</button></td>
                    <td>
                    <button class="maqui-item btn btn-warning">Editar</button>
                    </td>
    
                    </tr>`
    
                });
                 $('#container').html(template);
                 $('#containerBuscar').show();
                 $('#containerListado').hide();
             }
         })
        }
    })


   // let validacion = edit === false  ? 'Prov-agregar.php' : 'Prov-Editar.php';


  //AGREGAR
  $('#formMaquinaria').submit(function(e){
    let url = edit === false  ? 'Maq-agregar.php' : 'Maq-Editar.php';
    var datos = new FormData( $('#formMaquinaria')[0])
    $('#respuesta').html("<img src='/sistema/img/loading.gif' >")
      $.ajax({
        url: url,
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#respuesta').html(datos)
        }
      })   
         
      obtenerListado();
      $('#containerBuscar').hide();
      //para resetear el formulario
      $('#formMaquinaria').trigger('reset');
      edit = true;
       //e.preventDefault();
         }); 
        

        

    //EDITAR
    
    $(document).on('click', ".maqui-item", function(e){
        let elemento = $(this)[0].parentElement.parentElement;
        let idMaq = $(elemento).attr('atrmaquinariasidMaq');
        console.log(idMaq);
        $.post('Maq-Unico.php', {idMaq}, function(response){
            let MaqEditar = JSON.parse(response);
            $('#idMaq').val(MaqEditar.idMaq);         
            $('#txtMaquina').val(MaqEditar.Maquina);
            $('#txtModelo').val(MaqEditar.Modelo);
            $('#txtDiasManteni').val(MaqEditar.DiasManteni);
            $('#txtLink').val(MaqEditar.Link);
            $('#listProvedMaq').val(MaqEditar.ProvedMaq);
            $('#listClasificacion').val(MaqEditar.Fk_Clasi);
            $('#txtContMaq').val(MaqEditar.ContMaq);
            $('#txtValorMaq').val(MaqEditar.ValorMaq);
            $('#txtObsMaq').val(MaqEditar.ObsMaq);
            $('#txtimagen').val(MaqEditar.imgMaq);

            
            });
            edit = true;
            console.log(edit);
             //para evitar que se refresque la pagina
             e.preventDefault();
     
    })  



//ELIMINAR
$(document).on('click', ".list-borrar", function(e){
    if (confirm('Estas seguro de eliminar el registro?')) {
        let elemento = $(this)[0].parentElement.parentElement;
        let idMaq = $(elemento).attr('atrmaquinariasidMaq');
         // console.log(id);
        $.post('Maq-eliminar.php', {idMaq}, function(response){
         console.log(response);
         obtenerListado();
         $('#containerBuscar').hide();
         $('#app-form').trigger('reset');
         });
          //para evitar que se refresque la pagina
          e.preventDefault();
        console.log(idMaq);
    }
        })

   


//Listar
function obtenerListado(){
    $.ajax({
        url: 'Maq-listar.php',
        type: 'GET',
        success: function(response){
            //JSON.parse(response); respuestas del servidor
            let maquinarialist = JSON.parse(response);
            let template ='';
            maquinarialist.forEach(maquinaria => {
                template +=`<tr atrmaquinariasidMaq="${maquinaria.idMaq}">
                <td >${maquinaria.idMaq}</td>
                <td>${maquinaria.Maquina}</td>
                <td>${maquinaria.Modelo}</td>
                <td>${maquinaria.DiasManteni}</td>
                <td>${maquinaria.Link}</td>
                <td>${maquinaria.ProvedMaq}</td>
                <td>${maquinaria.Fk_Clasi}</td>
                <td>${maquinaria.ContMaq}</td>
                <td>${maquinaria.ValorMaq}</td>
                <td>${maquinaria.ObsMaq}</td>

                <td><img src="${maquinaria.imgMaq}" id="foto" style="width: 50px; high: 50px;"/></td>
                  <td><button class="list-borrar btn btn-danger">Borrar</button></td>
                <td>
                <button class="maqui-item btn btn-warning">Editar</button>
                </td>

                </tr>`

            });
            $('#tb_maquinaria').html(template);
            $('#containerListado').show();
        }
    })
}

});
