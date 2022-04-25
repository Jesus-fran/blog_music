$(document).ready(function() {


    var token = $('input[name="_token"]').val();

    $.ajax({
        url: '/obtener-publicaciones',
        async: true,
        data: { _token: token },
        type: 'GET',
        dataType: 'html',
        success: function(data) {

            if (data) {
                if (data == "") {

                    console.log("Datos vacios");
                } else {
                    // console.log(data);

                    $('#row_publicaciones').append(data);
                    $('#row_publicaciones').show('slow');
                    setTimeout(() => {
                        $('#espacio').css('display', 'none');
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