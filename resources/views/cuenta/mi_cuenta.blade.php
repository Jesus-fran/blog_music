@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/mi_cuenta') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h6>Editar informacion personal de mi cuenta</h6>
    <a href="{{ url('/edit_cuenta') }}">Editar información</a>
    <br><br><br>
    <h6>Ver o cambiar ajustes de privacidad</h6>
    <a href="{{ url('/privacidad') }}">Ajustes de privacidad</a>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
@endsection