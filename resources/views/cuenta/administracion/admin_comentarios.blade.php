@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/admin-comentarios') }}
@endsection
@section('contenido')
    <div class="container">
        @csrf


        <br><br><br>
        <h5>Comentarios de posts</h5>
        <br><br><br>
        <h5 id="message_error" style="text-align:center; display:none;"></h5>
        <div id="div_animacion">
        </div>
        <br><br><br>
        
        <div id="comentarios" style="display: none">
            {{-- Aqui se agregan los comentarios --}}
        </div>
        <script src="{{ asset('js/async_obtener_comentarios_admin.js') }}"></script>
        <script src="{{ asset('js/async_admin_comentarios.js') }}"></script>

    </div>
@endsection
