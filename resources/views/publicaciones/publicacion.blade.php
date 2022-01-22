@extends('index')
@section('btn_sesion')
@endsection

@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/publicacion') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h6>Crear una nueva publicación?</h6>
    <a href="{{ url('/crear_publicacion') }}">Crear publicación</a>
    <br><br><br>
    <br><br><br>
    <h6>Estadisticas de mis publicaciones</h6>
    <a href="{{ url('/estadisticas') }}">Mis estadisticas</a>
    <br><br><br>
    <br><br><br>
    <h6>Publicaciones recientes...</h6>
    <br><br><br>
    <br><br><br>
</div>
@endsection