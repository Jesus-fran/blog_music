document.querySelector('#saveComent').addEventListener("click", function() {
    $('#saveComent').attr('disabled', true);
    $('#message_error').hide();
    $('#saveComent').append('<span class="spinner-border spinner-border-sm text-dark" id="span_btn_comentario" role="status" aria-hidden="true"></span>');

    var comentario = "";
    var id_pub = $('#saveComent').data('id');
    var comentario = $('#comentario').val();
    var token = $('input[name="_token"]').val();
    // console.log(token);
    // console.log(id_pub);



    function isKeyExists(obj, key) {
        if (obj[key] == undefined) {
            return false;
        } else {
            return true;
        }
    }

    if (comentario != "" && comentario != null) {
        // console.log(comentario);
        $.ajax({
            url: '/guardar-comentario',
            async: true,
            data: { id_pub: id_pub, comentario: comentario, _token: token },
            type: 'POST',
            dataType: 'XHR',
            // cache: false,
            // contentType: false,
            // processData: false,
            success: function(data) {

                if (data) {
                    console.log(data);
                    if (data == "") {
                        $('#saveComent').removeAttr('disabled');
                        $('#span_btn_comentario').remove();
                        $('#message_error').attr('class', 'text-warning bg-light');
                        $('#message_error').html('Haga un comentario primero');
                        $('#message_error').show('slow');
                    } else {
                        $('#saveComent').removeAttr('disabled');
                        $('#span_btn_comentario').remove();
                        $('#message_error').attr('class', 'text-success bg-light');
                        $('#message_error').html('Comentario realizado correctamente');
                        $('#message_error').show('slow');
                    }

                    // window.location.replace('publicaciones');
                } else {
                    $('#span_btn_comentario').remove();
                    $('#saveComent').removeAttr('disabled');
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al almacenar en la base de datos");
                    $('#message_error').show('slow');
                }

            },
            error: function(XHR, estado, error) {
                // console.log(estado);
                if (estado == "error") {
                    $('#span_btn_comentario').remove();
                    $('#saveComent').removeAttr('disabled');
                    var errores = JSON.parse(XHR.responseText)['errors'];
                    if (isKeyExists(errores, 'id_pub')) {
                        $('#message_error').attr('class', 'text-danger bg-light');
                        $('#message_error').html(errores['id'][0]);
                        $('#message_error').show('slow');

                    }
                    if (isKeyExists(errores, 'comentario')) {
                        $('#message_error').attr('class', 'text-danger bg-light');
                        $('#message_error').html(errores['comentario'][0]);
                        $('#message_error').show('slow');

                    }
                } else {
                    // console.log(XHR);
                    $('#span_btn_comentario').remove();
                    $('#saveComent').removeAttr('disabled');
                    $('#message_error').html("");
                    document.getElementById("comentario").value = "";
                    $('#message_error').attr('class', 'text-success bg-light');
                    $('#message_error').html('comentario realizado correctamente');
                    $('#message_error').show('slow');
                    var comentarios = document.getElementById('comentarios');
                    setTimeout(() => {
                        while (comentarios.firstChild) {
                            comentarios.removeChild(comentarios.firstChild);
                        }
                        $('#div_animacion').append("<div class='row lign-items-center' id='animacion'><div class = 'col offset-md-5 offset-sm-4 offset-3' ><div class = 'spinner-grow spiner_1'role = 'status' ></div> <div class = 'spinner-grow spiner_2'role = 'status' ></div> <div class = 'spinner-grow spiner_3'role = 'status' ></div> <div class = 'spinner-grow spiner_4'role = 'status' ></div> <div class = 'spinner-grow spiner_5'role = 'status' ></div> </div> </div>");
                        obtener_comentarios();
                        $('#message_error').hide('slow');
                    }, 2000);
                }


            },
        });
    } else {
        $('#span_btn_comentario').remove();
        $('#saveComent').removeAttr('disabled');
        $('#message_error').attr('class', 'text-warning bg-light');
        $('#message_error').html("Haga un comentario primero");
        $('#message_error').show('slow');

    }



})