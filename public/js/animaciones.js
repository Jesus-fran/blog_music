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

function show_pass(id_input, e) {
    if (hide) {
        $('#' + id_input).attr('type', 'text');
        $(e).val('hide');
        hide = false;
    } else {
        $('#' + id_input).attr('type', 'password');
        $(e).val('show');
        hide = true;
    }

}

// Animaciones

posicionarMenu();

$(window).scroll(function() {
    posicionarMenu();
    CambiarColorHome();
});

function posicionarMenu() {
    var altura_del_menu = $('.bar_nav').outerHeight(true);

    if ($(window).scrollTop() >= altura_del_menu) {

        $('#bar_bread').css('position', 'fixed');
        $('#bar_bread').css('top', '0');
        $('#bar_bread').css('max-width', 'inherit');

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
    console.log(altura_del_div);
    console.log($(window).scrollTop());
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