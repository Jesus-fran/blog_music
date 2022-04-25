@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/admin-redactores') }}
@endsection
@section('contenido')
    <div class="container">
        @csrf
        <br><br><br>
        <h5 class="sub-font">Usuarios redactores</h5>
        <br><br>
        <h5 id="message_error" style="text-align:center; display:none;"></h5>
        <div class="col-8 col-md-8 col-lg-8">
            <ul class="list-group" id="usuarios">
            </ul>
            <div id="cargando">
              
            </div>
        </div>
        <br><br><br>
        <br><br><br>
        <br><br><br>
    </div>
    <script src="{{ asset('js/async_administrar_redactores.js') }}"></script>
@endsection
