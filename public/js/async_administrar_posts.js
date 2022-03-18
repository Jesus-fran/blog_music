$(document).ready(function() {


    var token = $('input[name="_token"]').val();

    $.ajax({
        url: '/obtener-publicaciones-admin',
        async: true,
        data: { _token: token },
        type: 'POST',
        dataType: 'html',
        success: function(data) {

            if (data) {
                if (data == "") {

                    console.log("Datos vacios");
                    // $('#message_error').attr('class', 'text-danger bg-light');
                    // $('#message_error').html('Error al obtener comentarios');
                    // $('#message_error').show('slow');
                } else {
                    // console.log(data);

                    $('#row_publicaciones').append(data);
                    $('#row_publicaciones').show('slow');
                    setTimeout(() => {
                        $('#espacio').remove();
                    }, 500);

                }
            } else {
                $('#message_error').attr('class', 'text-danger bg-light');
                $('#message_error').html("Error al obtener las publicaciones");
                $('#message_error').show('slow');
            }

        },
        error: function(xhr, status) {
            console.log("Hubo un problema!");
        },
    });
});

function EliminarPost(elemento) {
    var id_post = $(elemento).data('id');
    // console.log(id_post);


    $(elemento).attr('disabled', true);

    var token = $('input[name="_token"]').val();
    var col_pub = elemento.parentNode.parentNode.parentNode.parentNode;


    $.ajax({
        url: '/eliminar-publicacion',
        async: true,
        data: { id_post: id_post, _token: token },
        type: 'POST',
        dataType: 'html',
        success: function(data) {

            if (data) {
                console.log(data)
                if (data == "ELIMINADO") {
                    $(col_pub).hide('slow');
                    setTimeout(() => {
                        $(col_pub).remove();
                    }, 2000);
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al eliminar el post");
                    $('#message_error').show('slow');
                }
            } else {
                $('#animacion').remove();
                $('#cargando').attr('class', 'text-danger bg-light');
                $('#cargando').html("Error al eliminar el post");
                $('#cargando').show('slow');
            }

        },
        error: function(xhr, status) {

            console.log("Hubo un problema!");
        },
    });
}