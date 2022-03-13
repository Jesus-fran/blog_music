@extends('index')
@section('btn_sesion')
@endsection

@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/publicaciones') }}
@endsection
@section('contenido')
    <div class="container">
        @csrf


        <h5>Posts recientes</h5>
        
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 rows-cols-xs-1 g-4" id="row_publicaciones"
            style="display: none">
        </div>

        <div id="espacio" style="height: 100vh;">
            <div class="row lign-items-center cargando_posts" style="margin-top: 40vh">
                <div class="col offset-md-5 offset-sm-4 offset-3">
                    <div class="spinner-grow spiner_1" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spiner_2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spiner_3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spiner_4" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spiner_5" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/async_obtener_publicaciones.js') }}"></script>

        <br><br><br>
    </div>
@endsection
