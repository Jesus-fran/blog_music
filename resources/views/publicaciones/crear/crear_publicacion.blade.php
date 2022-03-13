@extends('index')

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
        <form action="" id="form_publicacion">
            <div class="row">
                <div class="col-md-4">
                    <label>Categoria:</label><br>
                    <select class="form-select" name="categoria" id="categoria" aria-label="Default select example">
                        <option value="CONCIERTOS" {{ old('categoria') == 'Conciertos' ? 'selected' : '' }}>Conciertos
                        </option>
                        <option value="MUSICA POPULAR MODERNA"
                            {{ old('categoría') == 'Música popular moderna' ? 'selected' : '' }}>Música popular moderna
                        </option>
                        <option value="MUSICA INSTRUMENTAL"
                            {{ old('categoría') == 'Música instrumental' ? 'selected' : '' }}>
                            Música instrumental</option>
                        <option value="MUSICA REGIONAL" {{ old('categoria') == 'Música regional' ? 'selected' : '' }}>
                            Música
                            regional</option>
                    </select>

                    <br><span class="text-danger" id="span_categoria"></span>

                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-9">
                    <label>Titulo de la publicación:</label><br>
                    <input type="text" name="titulo" id="titulo" class="form-control" maxlength="60" minlength="10"
                        placeholder="Titulo" aria-label="titulo" aria-describedby="addon-wrapping" required>

                    <br><span class="text-danger" id="span_titulo"></span>

                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col">
                    <label>Contenido de la publicación:</label><br>

                    <textarea name="editor_post" id="editor_post" cols="150" rows="15" class="editor"></textarea>
                    <br>
                    <br><span class="text-danger" id="span_editor_post"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <label>Sube una imagen o ingresa una URL para una imagen de la publicación:</label><br><br>
                <div class="col-md-auto">

                    <input type="file" class="form-control" name="imagen_file" id="imagen_file">
                    <br><span class="text-danger" id="span_imagen_file"></span>
                </div>
                <div class="col">
                    <input type="url" placeholder="Ingresa la url aqui" minlength="10" class="form-control"
                        name="imagen_url" id="imagen_url">

                    <br><span class="text-danger" id="span_imagen_url"></span>

                </div>

            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Ingrese sus tags:</label><br>
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="tags" aria-label="titulo"
                        aria-describedby="addon-wrapping">

                    <br><span class="text-danger" id="span_tags"></span>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="col">
                    <h5 id="message_error" style="text-align:center; display:none;"></h5>
                    <div id="message_publicando">
                       
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">

                    <button id="saveButton" class="btn btn-success" type="submit">
                        Publicar
                    </button>

                </div>
            </div>
        </form>
        {{-- <h5 id="message_error" style="text-align:center; display:none;"></h5>
        <div class="row">
            <div class="col offset-2"><button id="previaButton" class="btn btn-primary">Vista previa</button></div>
            <div class="col"><button id="saveButton" class="btn btn-success">Publicar</button></div>
        </div> --}}

    </div>
    <br><br>
    <div id="vista_prev"></div>
    <br><br><br>
    <script src="{{ asset('js/crear_editor_publicacion.js') }}"></script>
    <script src="{{ asset('js/async_subir_publicacion.js') }}"></script>
    </div>
@endsection
