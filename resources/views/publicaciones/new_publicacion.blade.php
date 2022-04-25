@extends('index')


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/publicacion', $id, $titulo) }}
@endsection
@section('contenido')
    <div class="container">

        @csrf
        <input type="hidden" id="id_pub" data-id="{{ $id }}">

        <br>
        <div class="row bg-dark text-light align-items-end color-titulo-post" style="height: 20vh">
            <div class="col-12">
                <h4 class="titulo-post">
                    @isset($titulo)
                        {{ $titulo }}
                    @endisset
                </h4>
            </div>
            <div class="col-2">
                <div class="badge">
                    Categoria:&nbsp &nbsp<span class="{{ $color_categoria }}">{{ $categoria }}</span>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 2vh">

            <div class="col-6 col-sm-6 col-md-auto col-md-auto col-lg-auto col-xl-auto col-xxl-auto ">
                <div class="badge  text-secondary">
                    Autor: {{ $nombre_autor }}
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-auto col-md-auto col-lg-auto col-xl-auto col-xxl-auto">
                <div class="badge text-wrap text-secondary">
                    Publicado: {{ $fecha_creacion }}
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-auto col-md-auto col-lg-auto col-xl-auto col-xxl-auto">
                <div class="badge text-wrap text-secondary">
                    <i class="bi bi-chat-square-text"></i>
                    @if ($comentarios == 1)
                        {{ $comentarios }} Comentario
                    @else
                        {{ $comentarios }} Comentarios
                    @endif
                </div>
            </div>
            {{-- <div class="col-6 col-sm-6 col-md-auto col-md-auto col-lg-auto col-xl-auto col-xxl-auto">
                <div class="badge text-wrap text-secondary">
                    Actualizado: 
                </div>
            </div> --}}

        </div>

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
        <h5 class="sub-font">Etiquetas: </h5>
        @isset($tags)
            <h6>{{ $tags }}</h6>
        @endisset
        <br>
        <br>
        <h5 class="sub-font">Ingrese un comentario</h5>
        <div class="form-group">
            @if (session('email'))
                <textarea class="form-control comentario" id="comentario" rows="6"></textarea>
            @else
                <a href="{{ route('mi-cuenta', ['redirect_to' => url()->current()]) }}" style="text-decoration: none">
                    <textarea class="form-control comentario" id="comentario" rows="6"
                        placeholder="Inicie sesión primero para comentar, ¡Click aqui!"></textarea>
                </a>
            @endif
        </div>
        <br>
        <div class="row">
            <div class="col"><button id="saveComent" class="btn btn-success" data-id="{{ $id }}">Subir
                    comentario</button></div>
            <h5 id="message_error" style="text-align:center; display:none;"></h5>
        </div>
        <br><br><br>

        <div class="row">
            <div class="col-6 offset-5">
                <h5 class="sub-font">Comentarios</h5>
            </div>
        </div>
        <br><br><br>
        <div id="div_animacion">
            <div class="row lign-items-center" id="animacion">
                <div class="col offset-md-5 offset-sm-4 offset-3">
                    <div class="spinner-grow spiner_1" role="status">

                    </div>
                    <div class="spinner-grow spiner_2" role="status">

                    </div>
                    <div class="spinner-grow spiner_3" role="status">

                    </div>
                    <div class="spinner-grow spiner_4" role="status">

                    </div>
                    <div class="spinner-grow spiner_5" role="status">

                    </div>
                </div>
            </div>
        </div>
        <div id="comentarios" style="display: none">
            {{-- Aqui se agregan los comentarios --}}
        </div>

        <br><br><br>
        <br><br>

        <script src="{{ asset('js/async_obtener_comentarios.js') }}"></script>
        <script src="{{ asset('js/async_subir_comentario.js') }}"></script>
        <script src="{{ asset('js/async_subir_respuesta.js') }}"></script>




    </div>
@endsection
