@extends('index')

@section('btns')
    <a class="btn btn-outline-info" href="{{ route('crear-publicacion') }}" role="button">Crear publicación
    </a>
@endsection


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/crear-publicacion') }}
@endsection
@section('contenido')
    <div class="container">

        @csrf

        {{-- incluye editor de texto --}}
        <!-- Include the default theme -->
        <link rel="stylesheet" href="{{ asset('minified/themes/default.min.css') }}" />

        <!-- Include the editors JS -->
        <script src=" {{ asset('minified/sceditor.min.js') }}"></script>

        <!-- Include the BBCode or XHTML formats -->
        <script src="{{ asset('minified/formats/bbcode.js') }}"></script>
        <script src="{{ asset('minified/formats/xhtml.js') }}"></script>

        <br><br><br>
        <h5 id="message_error" style="text-align:center; display:none;"></h5>
        <textarea name="editor" id="editor_post" cols="150" rows="15" class="editor"></textarea>
        <br>
        <div class="row">
            <div class="col offset-2"><button id="previaButton" class="btn btn-primary">Vista previa</button></div>
            <div class="col"><button id="saveButton" class="btn btn-success">Publicar</button></div>
        </div>
        <br><br>
        <div id="vista_prev"></div>
        <br><br><br>
        <script src="{{ asset('js/crear_editor_publicacion.js') }}"></script>
        <script src="{{ asset('js/async_subir_publicacion.js') }}"></script>
    </div>
@endsection
