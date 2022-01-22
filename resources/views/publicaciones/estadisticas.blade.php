@extends('index')

@section('btn_sesion')
@endsection

@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/estadisticas') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h6> Cantidad de publicaciones realizadas: </h6>
    <br><br><br>
    <br><br><br>
    <h6> Cantidad de vistas por publicación: </h6>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
@endsection