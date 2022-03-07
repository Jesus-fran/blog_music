@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/admin-redactores') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h4>Usuarios redactores</h4>
    <a class="btn btn-success" href="{{ route('home') }}" role="button">Nuevo redactor <i class="bi bi-person-plus"></i></a>
    <br><br>
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Jesus Gomez Lopez
              <a class="btn btn-primary" href="{{ route('home') }}" role="button">Editar</a>
              <a class="btn btn-warning" href="{{ route('home') }}" role="button">Eliminar</a>     
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Adrian Diaz Lopez
              <a class="btn btn-primary" href="{{ route('home') }}" role="button">Editar</a>
              <a class="btn btn-warning" href="{{ route('home') }}" role="button">Eliminar</a>     
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Marce Lopez Santiz
              <a class="btn btn-primary" href="{{ route('home') }}" role="button">Editar</a>
              <a class="btn btn-warning" href="{{ route('home') }}" role="button">Eliminar</a>               
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nicodemo Perez Lopez
                <a class="btn btn-primary" href="{{ route('home') }}" role="button">Editar</a>
                <a class="btn btn-warning" href="{{ route('home') }}" role="button">Eliminar</a>
              </li>
          </ul>
    </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
@endsection