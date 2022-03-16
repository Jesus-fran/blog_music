textarea = false;

function MostrarTextarea(elemento) {
    if (!textarea) {
        textarea = true;
        var card_footer = elemento.parentNode;
        var node_textarea = card_footer.getElementsByTagName('div')[0];
        $(node_textarea).show();
    } else {
        var card_footer = elemento.parentNode;
        var node_textarea = card_footer.getElementsByTagName('div')[0];
        $(node_textarea).hide();
        textarea = false;
        // $('#textarea_respuesta').remove();
    }

}

function SubirRespuesta(elemento) {
    $('#saveResp').attr('disabled', true);
    var node_boton = elemento.parentNode;
    var node_textarea = node_boton.getElementsByTagName('textarea')[0];
    var node_h5 = node_boton.getElementsByTagName('h5')[0];
    var respuesta = $(node_textarea).val();
    var id_comentario = $(elemento).data('id');
    var token = $('input[name="_token"]').val();

    if (respuesta != "" && respuesta != null && id_comentario != "" && id_comentario != null) {
        console.log(respuesta.length);
        if (respuesta.length < 2) {
            $('#saveResp').removeAttr('disabled');
            $(node_h5).text('Ingrese al menos 4 caracteres.');
        } else {

            function isKeyExists(obj, key) {
                if (obj[key] == undefined) {
                    return false;
                } else {
                    return true;
                }
            }

            $.ajax({
                url: '/guardar-respuesta',
                async: true,
                data: { id_comentario: id_comentario, respuesta: respuesta, _token: token },
                type: 'POST',
                dataType: 'XHR',
                success: function(data) {

                    if (data) {
                        console.log(data);
                    } else {
                        console.log(data);
                    }

                },
                error: function(XHR, estado, error) {
                    // console.log(estado);
                    if (estado == "error") {
                        $(node_h5).text('');
                        $('#saveResp').removeAttr('disabled');
                        var errores = JSON.parse(XHR.responseText)['errors'];
                        if (isKeyExists(errores, 'id_comentario')) {
                            $(node_h5).attr('class', 'text-danger bg-light');
                            $(node_h5).html(errores['id_comentario'][0]);
                        }
                        if (isKeyExists(errores, 'respuesta')) {
                            $(node_h5).attr('class', 'text-danger bg-light');
                            $(node_h5).html(errores['respuesta'][0]);

                        }
                    } else {
                        console.log(XHR);
                        $(node_h5).text('');
                        $('#saveResp').removeAttr('disabled');
                        $(node_textarea).val('');
                        $(node_h5).attr('class', 'text-success bg-light');
                        $(node_h5).text('Se realizó la respuesta correctamente');
                        var comentarios = document.getElementById('comentarios');
                        setTimeout(() => {
                            while (comentarios.firstChild) {
                                comentarios.removeChild(comentarios.firstChild);
                            }
                            $('#div_animacion').append("<div class='row lign-items-center' id='animacion'><div class = 'col offset-md-5 offset-sm-4 offset-3' ><div class = 'spinner-grow spiner_1'role = 'status' ></div> <div class = 'spinner-grow spiner_2'role = 'status' ></div> <div class = 'spinner-grow spiner_3'role = 'status' ></div> <div class = 'spinner-grow spiner_4'role = 'status' ></div> <div class = 'spinner-grow spiner_5'role = 'status' ></div> </div> </div>");
                            obtener_comentarios();
                        }, 1500);


                    }


                },
            });




        }
    } else {
        $('#saveResp').removeAttr('disabled');
        $(node_h5).text('Ingrese el contenido de tu respuesta');
    }

}