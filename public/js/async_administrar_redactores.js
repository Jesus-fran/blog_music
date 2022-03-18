function getData(page) {
    $('#message_error').hide('slow');

    $('#cargando').append("<div class='row lign-items-center' id='animacion'><div class = 'col offset-md-5 offset-sm-4 offset-3' ><div class = 'spinner-grow spiner_1'role = 'status' ></div> <div class = 'spinner-grow spiner_2'role = 'status' ></div> <div class = 'spinner-grow spiner_3'role = 'status' ></div> <div class = 'spinner-grow spiner_4'role = 'status' ></div> <div class = 'spinner-grow spiner_5'role = 'status' ></div> </div> </div>");

    var token = $('input[name="_token"]').val();

    if (!page) {
        var page = 1;
    }
    // $.get('obtener-redactores').success(function(data) { console.log(data) });   
    $.ajax({
        url: '/obtener-redactores?page=' + page,
        async: true,
        data: { _token: token },
        type: 'GET',
        dataType: 'html',
        success: function(data) {

            if (data) {
                if (data == "NINGUNO") {
                    $('#animacion').remove();
                    $('#message_error').attr('class', 'text-dardk bg-light');
                    $('#message_error').html("No hay usuarios redactores");
                    $('#message_error').show('slow');
                }
                $('#usuarios').append(data);
                $('#animacion').remove();

                // document.write(data.current_page);
            } else {
                $('#animacion').remove();
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al obtener los usuarios");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });
}



getData();


$(document).on('click', '.pagination a', function(event) {


    event.preventDefault();


    var page = $(this).attr('href').split('page=')[1];
    console.log(page);
    var usuarios = document.getElementById('usuarios');
    while (usuarios.firstChild) {
        usuarios.removeChild(usuarios.firstChild);
    }
    getData(page);
    // alert(page);


});


function eliminar(elemento) {
    $('#message_error').hide('slow');

    $(elemento).attr('disabled', true);
    var email_redactor = $(elemento).data('id');
    console.log(email_redactor);
    var token = $('input[name="_token"]').val();
    var div_coll = elemento.parentNode;
    var li = div_coll.parentNode;


    $.ajax({
        url: '/eliminar-redactor',
        async: true,
        data: { email_redactor: email_redactor, _token: token },
        type: 'POST',
        dataType: 'html',
        success: function(data) {

            if (data) {
                console.log(data)
                if (data == "ELIMINADO") {
                    $(li).hide('slow');
                    setTimeout(() => {
                        $(li).remove();
                    }, 1500);
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al eliminar el  usuario");
                    $('#message_error').show('slow');
                }
            } else {
                $('#animacion').remove();
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al eliminar el  usuario");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });
}