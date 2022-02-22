document.querySelector('#saveButton').addEventListener("click", function() {
    var val = "";
    var val = sceditor.instance(textarea).val();
    console.log(val);
    var token = $('input[name="_token"]').val();
    console.log(token);

    if (val != "" && val != null) {
        $.ajax({
            url: '/guardar_pub',
            async: true,
            data: { pub: val, _token: token },
            type: 'POST',
            dataType: 'html',
            success: function(data) {

                if (data) {
                    if (data == "") {
                        $('#message_error').attr('class', 'text-warning bg-light');
                        $('#message_error').html('Haga una publicación primero');
                        $('#message_error').show('slow');
                    } else {
                        $('#message_error').attr('class', 'text-success bg-light');
                        $('#message_error').html('Datos almacenados correctamente');
                        $('#message_error').show('slow');
                    }

                    window.location.replace('/publicacion');
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
        $('#message_error').html("Haga una publicación primero");
        $('#message_error').show('slow');

    }



})




var cargado = false;


document.querySelector('#previaButton').addEventListener("click", function() {
    var val = "";
    var val = sceditor.instance(textarea).val();


    if (val != "" && val != null) {

        if (!cargado) {
            $('#vista_prev').append(val);
            cargado = true;
        } else {
            $('#vista_prev').html("");
            cargado = false;

        }

    } else {
        $('#message_error').attr('class', 'text-warning bg-light');
        $('#message_error').html("Haga una publicación primero");
        $('#message_error').show('slow');

    }



})