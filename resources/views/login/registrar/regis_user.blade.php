@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/regis_user') }}
@endsection
@section('contenido')


<div class="container">
    <br>
    <div class="row">
        <div class="col">
        <label class="form-label">Ingrese su información personal</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre de usuario</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        </div>
        <div class="col">
        Column
        </div>

        <div class="col">
        Column
        </div>
        
    </div>
</div>

@endsection