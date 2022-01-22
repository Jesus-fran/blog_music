@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/ini_sesion') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h6>No tiene una cuenta? Registrese</h6>
<a href="{{ url('/regis_user') }}">Registrarse</a>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
@endsection