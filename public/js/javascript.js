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

// show and hide pass
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