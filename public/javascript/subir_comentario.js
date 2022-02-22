document.querySelector('#saveComent').addEventListener("click", function() {
    var val = "";
    var val = sceditor.instance(textarea).val();
    console.log(val);
    var token = $('input[name="_token"]').val();
    console.log(token);

    if (val != "" && val != null) {
        $.ajax({
            url: '/guardar_comentario',
            async: true,
            data: { comentario: val, _token: token },
            type: 'POST',
            dataType: 'html',
            success: function(data) {

                if (data) {
                    if (data == "") {
                        $('#message_error').attr('class', 'text-warning bg-light');
                        $('#message_error').html('Haga un comentario primero');
                        $('#message_error').show('slow');
                    } else {
                        $('#message_error').attr('class', 'text-success bg-light');
                        $('#message_error').html('Datos almacenados correctamente');
                        $('#message_error').show('slow');
                    }

                    location.reload();
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al almacenar en la base de datos");
                    $('#message_error').show('slow');
                }

            },
            error: function(xhr, status) {
                console.log("Hubo un problema!");
            },
        });
    } else {
        $('#message_error').attr('class', 'text-warning bg-light');
        $('#message_error').html("Haga un comentario primero");
        $('#message_error').show('slow');

    }



})