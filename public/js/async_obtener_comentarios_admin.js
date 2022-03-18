function obtener_comentarios() {


    var token = $('input[name="_token"]').val();
    // console.log(token);


    $.ajax({
        url: '/obtener-comentarios-admin',
        async: true,
        data: { _token: token },
        type: 'GET',
        dataType: 'html',
        success: function(data) {

            if (data) {
                $('#animacion').remove();
                if (data == "") {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html('Error al obtener comentarios');
                    $('#message_error').show('slow');
                } else {
                    $('#animacion').remove();
                    $("#comentarios").append(data);
                    $('#comentarios').show('slow');
                }
            } else {
                $('#animacion').remove();
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al obtener comentarios");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });

}

$(document).ready(function() {
    $('#div_animacion').append("<div class='row lign-items-center' id='animacion'><div class = 'col offset-md-5 offset-sm-4 offset-3' ><div class = 'spinner-grow spiner_1'role = 'status' ></div> <div class = 'spinner-grow spiner_2'role = 'status' ></div> <div class = 'spinner-grow spiner_3'role = 'status' ></div> <div class = 'spinner-grow spiner_4'role = 'status' ></div> <div class = 'spinner-grow spiner_5'role = 'status' ></div> </div> </div>");
    obtener_comentarios();
});