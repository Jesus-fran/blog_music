$('#iniciar_sesion').submit(function() {
    $('#btn_submit').attr('disabled', 'disabled');
    $('#btn_submit').append('<span class="spinner-border spinner-border-sm text-dark" role="status" aria-hidden="true"></span>');
});


$('#registrarse').submit(function() {
    $('#btn_registrarse').attr('disabled', 'disabled');
    $('#btn_registrarse').append('<span class="spinner-border spinner-border-sm text-dark" role="status" aria-hidden="true"></span>');
});