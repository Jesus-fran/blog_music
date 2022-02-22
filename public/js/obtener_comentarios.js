$(document).ready(function() {


    var id_publicacion = "1";

    var token = $('input[name="_token"]').val();
    console.log(token);

    if (id_publicacion != "" && id_publicacion != null) {
        $.ajax({
            url: '/obtener_comentarios',
            async: true,
            data: { id_publicacion: id_publicacion, _token: token },
            type: 'POST',
            dataType: 'html',
            success: function(data) {

                if (data) {
                    if (data == "") {
                        $('#message_error').attr('class', 'text-danger bg-light');
                        $('#message_error').html('Error al obtener comentarios');
                        $('#message_error').show('slow');
                    } else {
                        $("#comentarios").append(data);
                        $('#comentarios').show('slow');
                    }
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al obtener comentarios");
                    $('#message_error').show('slow');
                }

            },
            error: function(xhr, status) {
                console.log("Hubo un problema!");
            },
        });
    } else {
        $('#message_error').attr('class', 'text-danger bg-light');
        $('#message_error').html("Error al obtener comentarios");
        $('#message_error').show('slow');

    }

});