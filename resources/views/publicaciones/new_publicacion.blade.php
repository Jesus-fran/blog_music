@extends('index')


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/publicacion', $id, $titulo) }}
@endsection
@section('contenido')
    <div class="container">

        @csrf

        <br>
        <h4>
            @isset($titulo)
                {{ $titulo }}
            @endisset
        </h4>
        <br><br>
        @isset($imagen)
            <img src="{{ $imagen }}" class="img-fluid rounded mx-auto d-block img_post" alt="" srcset="">
        @endisset
        <br><br><br>
        @isset($contenido)
            {!! $contenido !!}
        @endisset
        <br>
        <br>
        <br>
        <br>
        <br>
        <h5>Comentarios</h5>
        <br><br><br>
        <div id="comentarios" style="display:none;">
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
        <h5>Ingrese un comentario</h5>
        <textarea name="comentario" id="comentario" cols="80" rows="15"></textarea>
        <br>
        <div class="row">
            <div class="col"><button id="saveComent" class="btn btn-success">Subir comentario</button></div>
            <h5 id="message_error" style="text-align:center; display:none;"></h5>

        </div>
        <br><br><br>
        <br><br><br>
        <br><br><br>

        {{-- <script src="{{ asset('js/crear_editor_comentario.js') }}"></script> --}}
        <script src="{{ asset('js/async_subir_comentario.js') }}"></script>
        <script src="{{ asset('js/async_obtener_comentarios.js') }}"></script>




    </div>
@endsection
