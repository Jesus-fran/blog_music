$('#form_publicacion').on('submit', function(e) {
    e.preventDefault();

    // var frame = document.getElementsByTagName('iframe')[0];
    // // $(frame.target).html("<!DOCTYPE html><html class=\"><head><meta http-equiv=\"Content - Type \" content=\"text / html; charset = utf - 8 \"><link rel=\"stylesheet \" type=\"text / css \" href=\".. / minified / themes / content /default.min.css \"></head><body contenteditable=\"true \" dir=\"ltr \" class=\"\"><p>aaa</p></body></html>");
    // frame.parentNode.removeChild(frame);


    $('#saveButton').attr('disabled', true);
    $('#message_publicando').show();
    $('#message_publicando').append(" <div class='d-flex justify-content-md-center'>" +
        "<div class='spinner-border spinner_publicando' role='status'>" + "</div>" + "</div>" + "<h5 class='publicando'>Publicando...</h5>");

    var formData = new FormData(this);
    formData.append('_token', $('input[name=_token]').val());
    var categoria = Object.fromEntries(formData)['categoria'];
    var titulo = Object.fromEntries(formData)['titulo'];
    // var contenido = Object.fromEntries(formData)['editor_post'];
    var contenido = tinyMCE.get('editor_post').getContent();
    formData.append('editor_post', contenido);
    var imagen_file = Object.fromEntries(formData)['imagen_file']['name'];
    var imagen_url = Object.fromEntries(formData)['imagen_url'];
    var tags = Object.fromEntries(formData)['tags'];


    function isKeyExists(obj, key) {
        if (obj[key] == undefined) {
            return false;
        } else {
            return true;
        }
    }

    var scrooll = false;

    function ScroollAndErrorMsg(errores, name_elemento) {
        var height_element = document.getElementById(name_elemento).offsetHeight + 80;
        if (!scrooll) {
            $('html, body').animate({
                scrollTop: $('#' + name_elemento).offset().top - height_element
            }, 3000);
            scrooll = true;
        }
        $('#span_' + name_elemento).html(errores[name_elemento][0]);
    }



    if (categoria != "" && categoria != null && titulo != "" && titulo != null && contenido != "" && (imagen_file != "" && imagen_file != null || imagen_url != "" && imagen_url != null) && tags != "" && tags != null) {
        $('#message_error').hide();
        // console.log(categoria + " " + titulo + " " + contenido + " " + imagen_file + " " + imagen_url + " " + tags);
        $.ajax({
            url: '/guardar-publicacion',
            async: true,
            data: formData,
            type: 'POST',
            dataType: 'XHR',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {

                if (data) {
                    console.log(data);
                    if (data == "") {
                        $('#message_error').attr('class', 'text-warning bg-light');
                        $('#message_error').html('Haga una publicación primero');
                        $('#message_error').show('slow');
                    } else {
                        $('#message_error').attr('class', 'text-success bg-light');
                        $('#message_error').html('Publicación realizada correctamente');
                        $('#message_error').show('slow');
                    }

                    // window.location.replace('publicaciones');
                } else {
                    $('#message_error').attr('class', 'text-danger bg-light');
                    $('#message_error').html("Error al almacenar en la base de datos");
                    $('#message_error').show('slow');
                }

            },
            error: function(XHR, estado, error) {
                // console.log(estado);
                if (estado == "error") {
                    $('#saveButton').removeAttr('disabled');
                    $('#message_publicando').hide('fast');
                    var errores = JSON.parse(XHR.responseText)['errors'];
                    if (isKeyExists(errores, 'categoria')) {
                        ScroollAndErrorMsg(errores, 'categoria');
                    }
                    if (isKeyExists(errores, 'titulo')) {

                        ScroollAndErrorMsg(errores, 'titulo');
                    }
                    if (isKeyExists(errores, 'editor_post')) {
                        var height_element = document.getElementsByTagName('iframe')[0].offsetHeight + 100;
                        if (!scrooll) {
                            $('html, body').animate({
                                scrollTop: $('#span_editor_post').offset().top - height_element
                            }, 3000);
                            scrooll = true;
                        }
                        $('#span_editor_post').html(errores['editor_post'][0]);

                    }
                    if (isKeyExists(errores, 'imagen_file')) {
                        ScroollAndErrorMsg(errores, 'imagen_file');
                    }
                    if (isKeyExists(errores, 'imagen_url')) {
                        ScroollAndErrorMsg(errores, 'imagen_url');
                    }
                    if (isKeyExists(errores, 'tags')) {
                        ScroollAndErrorMsg(errores, 'tags');
                    }
                } else {
                    // console.log(XHR);
                    $('#saveButton').removeAttr('disabled');
                    $('#message_publicando').hide('fast');
                    $('#span_categoria').html("");
                    $('#span_titulo').html("");
                    tinyMCE.get('editor_post').setContent('');
                    $('#span_imagen_file').html("");
                    $('#span_imagen_url').html("");
                    $('#span_tags').html("");
                    document.getElementById("categoria").value = "";
                    document.getElementById("titulo").value = "";
                    document.getElementById("imagen_file").value = "";
                    document.getElementById("imagen_url").value = "";
                    document.getElementById("tags").value = "";
                    $('#message_error').attr('class', 'text-success bg-light');
                    $('#message_error').html('Publicación realizada correctamente');
                    $('#message_error').show('slow');
                    $('#btn-ver-pub').css('display', 'inline');
                    $('#btn-ver-pub').attr('href', XHR.responseText);
                }


            },
        });

    } else {
        $('#saveButton').removeAttr('disabled');
        $('#message_publicando').hide('fast');
        $('#message_error').attr('class', 'text-warning bg-light');
        $('#message_error').html("Haga una publicación primero");
        $('#message_error').show('slow');
        setTimeout(function() {
            $('#message_error').hide();
        }, 10000);
    }
});



var cargado = false;


// document.querySelector('#previaButton').addEventListener("click", function() {
//     var val = "";
//     var val = sceditor.instance(textarea).val();


//     if (val != "" && val != null) {

//         if (!cargado) {
//             $('#vista_prev').append(val);
//             cargado = true;
//         } else {
//             $('#vista_prev').html("");
//             cargado = false;

//         }

//     } else {
//         $('#message_error').attr('class', 'text-warning bg-light');
//         $('#message_error').html("Haga una publicación primero");
//         $('#message_error').show('slow');

//     }
// })