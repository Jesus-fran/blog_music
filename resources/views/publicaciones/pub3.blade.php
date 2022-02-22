@extends('index')

@section('btn_sesion')
@endsection

@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/publicacion') }}
@endsection
@section('contenido')

<div class="container">
    @csrf

    <br><br><br>
    <h4>¿Qué es la música clasica?</h4>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <h4>Ingrese un comentario</h4>
        <br><br><br>
        <div id="comentarios"  style="display:none;">
            {{-- Aqui se agregan los comentarios --}}
        </div>
        
        <br><br>
        {{-- incluye editor de texto --}}
        <!-- Include the default theme -->
        <link rel="stylesheet" href="{{ asset('minified/themes/default.min.css') }}" />

        <!-- Include the editors JS -->
        <script src=" {{ asset('minified/sceditor.min.js') }}"></script>

        <!-- Include the BBCode or XHTML formats -->
        <script src="{{ asset('minified/formats/bbcode.js') }}"></script>
        <script src="{{ asset('minified/formats/xhtml.js') }}"></script>

        <br><br><br>
        <textarea name="comentario" id="comentario" cols="80" rows="15"></textarea>
        <br>
        <div class="row">
            <div class="col"><button id="saveComent" class="btn btn-success">Subir comentario</button></div>
            <h5 id="message_error" style="text-align:center; display:none;"></h5>

        </div>
        <br><br><br>
        <br><br><br>
        <br><br><br>

        <script src="{{ asset('javascript/crear_editor_comentario.js') }}"></script>
        <script src="{{ asset('javascript/subir_comentario.js') }}"></script>
        <script src="{{ asset('javascript/obtener_comentarios.js') }}"></script>

    
</div>
@endsection