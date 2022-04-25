function FiltrarCategoria(categoria) {

    var publicaciones = document.getElementById('row_publicaciones');
    while (publicaciones.firstChild) {
        publicaciones.removeChild(publicaciones.firstChild);
    }
    let valor_categoria = $(categoria).html();
    $('#text-categoria').text(valor_categoria);

    let id_categoria = $(categoria).data('cate');

    $('#text-categoria').attr('data-categoria', id_categoria);

    var token = $('input[name="_token"]').val();


    $('#espacio').css('display', 'block');
    $.ajax({
        type: "GET",
        url: "/filtro-categoria",
        data: { id_categoria: id_categoria, _token: token },
        dataType: "html",
        success: function(response) {

            if (response) {
                if (response == "") {
                    console.log("Datos vacios");
                } else {

                    $('#row_publicaciones').append(response);
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
        }
    });
}


function ObtenerPost(page, categoria) {

    var publicaciones = document.getElementById('row_publicaciones');
    while (publicaciones.firstChild) {
        publicaciones.removeChild(publicaciones.firstChild);
    }

    $('#espacio').css('display', 'block');

    var token = $('input[name="_token"]').val();
    if (!page) {
        var page = 1;
    }

    if (categoria != 1) {

        // console.log('CATEGORIA: ' + categoria);
        $.ajax({
            url: '/filtro-categoria?page=' + page,
            async: true,
            data: { _token: token, id_categoria: categoria },
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


    } else {


        $.ajax({
            url: '/obtener-publicaciones?page=' + page,
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


    }


}

$(document).on('click', '.pagination a', function(event) {


    event.preventDefault();


    var page = $(this).attr('href').split('page=')[1];
    // console.log('PAGINA ' + page);
    var publicaciones = document.getElementById('row_publicaciones');
    while (publicaciones.firstChild) {
        publicaciones.removeChild(publicaciones.firstChild);
    }

    let id_cat = $('#text-categoria').attr('data-categoria');
    ObtenerPost(page, id_cat);
});