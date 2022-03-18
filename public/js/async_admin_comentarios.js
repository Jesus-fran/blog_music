function EliminarComentario(elemento) {
    // console.log(elemento);
    var id_comentario = $(elemento).data('id');
    // alert("Estas apunto de elimianr este comentario");
    var row_comentario = elemento.parentNode.parentNode.parentNode.parentNode;
    // console.log(row_comentario);

    var token = $('input[name="_token"]').val();


    $.ajax({
        url: '/eliminar-comentarios',
        async: true,
        data: { id_comentario: id_comentario, _token: token },
        type: 'POST',
        dataType: 'html',
        success: function(data) {

            if (data) {
                console.log(data)
                if (data == "ELIMINADO") {
                    $(row_comentario).hide('slow');
                    setTimeout(() => {
                        $(row_comentario).remove();
                    }, 1500);
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al eliminar el  comentario");
                    $('#message_error').show('slow');
                }
            } else {
                $('#animacion').remove();
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al eliminar el comentario");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });

}

function EliminaRespuesta(elemento) {
    // console.log(elemento);
    var id_respuesta = $(elemento).data('id');
    // alert("Estas apunto de eliminar esta respuesta");
    $(elemento).attr('disabled', true);
    var token = $('input[name="_token"]').val();
    var col_respuesta = elemento.parentNode.parentNode.parentNode;
    // console.log(col_respuesta);


    $.ajax({
        url: '/eliminar-respuestas',
        async: true,
        data: { id_respuesta: id_respuesta, _token: token },
        type: 'POST',
        dataType: 'html',
        success: function(data) {

            if (data) {
                console.log(data)
                if (data == "ELIMINADO") {
                    $(col_respuesta).hide('slow');
                    setTimeout(() => {
                        $(col_respuesta).remove();
                    }, 1500);
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al eliminar la respuesta");
                    $('#message_error').show('slow');
                }
            } else {
                $('#animacion').remove();
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al eliminar la respuesta");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });

}