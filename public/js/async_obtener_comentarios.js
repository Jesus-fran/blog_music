function obtener_comentarios() {
    var id_publicacion = $('#id_pub').data('id');

    var token = $('input[name="_token"]').val();
    // console.log(token);

    if (id_publicacion != "" && id_publicacion != null) {
        $.ajax({
            url: '/obtener-comentarios',
            async: true,
            data: { id_publicacion: id_publicacion, _token: token },
            type: 'POST',
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
    } else {
        $('#animacion').remove();
        $('#message_error').attr('class', 'text-danger bg-light');
        $('#message_error').html("Error al obtener comentarios");
        $('#message_error').show('slow');

    }
}

$(document).ready(function() {
    obtener_comentarios();
});