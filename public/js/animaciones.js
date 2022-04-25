// Mostrar texto de sugerencia de los inputs
$(document).ready(function() {

    $('#nombre_user, #correo, #pass_1, #pass_2, #pass_ini, #correo_ini').focus(function(e) {
        var span = $(e.target).data('span');
        e.preventDefault();
        $('#' + span).show('fast');
    });

    $('#nombre_user,  #correo, #pass_1, #pass_2, #pass_ini, #correo_ini ').focusout(function(e) {
        var span = $(e.target).data('span');
        e.preventDefault();
        $('#' + span).hide('fast');
    });
});

// mostrar y ocultar inputs password
var hide = true;

function show_pass(id_input, elemento) {


    if (hide) {
        let icon = elemento.childNodes[0];
        $('#' + id_input).attr('type', 'text');
        $(icon).remove();
        $(elemento).append('<i class="bi bi-eye-slash"></i>');
        hide = false;
    } else {

        let icon = elemento.childNodes[0];
        $('#' + id_input).attr('type', 'password');
        $(icon).remove();
        $(elemento).append('<i class="bi bi-eye"></i>');


        hide = true;
    }

}

// Animaciones

function show_menu() {

    $('#navbar_collapsed').css('height', '100vh');
    $('#navbar_collapsed').css('width', '100%');
    $('#navbar_collapsed').css('z-index', '99');
    $('#navbar_collapsed').css('text-align', 'center');
    $('#opcion, #opcion').css('margin-top', '20%');
}


function ShowCrearCuenta() {

    let altura_del_contenido = $('#div_img_home').outerHeight(true);

    if ($(window).scrollTop() >= altura_del_contenido) {

        $('#div_suscribete').fadeIn(2500);



    } else {

        $('#div_suscribete').fadeOut(700);

    }
}


posicionarMenu();

$(window).scroll(function() {
    posicionarMenu();
    CambiarColorHome();
    ShowCrearCuenta();
});

function posicionarMenu() {
    var altura_del_menu = $('.bar_nav').outerHeight(true);

    if ($(window).scrollTop() >= altura_del_menu) {

        $('#bar_bread').css('position', 'fixed');
        $('#bar_bread').css('top', '0');
        $('#bar_bread').css('max-width', 'inherit');
        $('#bar_bread').css('z-index', '95');

        $('#bar_bread').css('margin-right', '-50px');

    } else {
        $('#bar_bread').css('position', 'relative');
        $('#bar_bread').css('top', 'none');
        $('#bar_bread').css('width', '100%');
        // $('.wrapper').css('margin-top', '0');
    }
}


function CambiarColorHome() {
    var altura_del_div = $('#col_home').height() / 3;
    // console.log(altura_del_div);
    // console.log($(window).scrollTop());
    if ($(window).scrollTop() >= altura_del_div) {

        $('#col_home').fadeOut(700);


    } else {

        $('#col_home').fadeIn(1500);

    }
}


// Detectar giro de pantalla

var supportsOrientationChange = "onorientationchange" in window,
    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";
window.addEventListener(orientationEvent, function() {
    $('#editor').css('width', 'inherit');
}, false);