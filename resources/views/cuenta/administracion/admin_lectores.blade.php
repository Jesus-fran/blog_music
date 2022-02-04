@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/admin_lectores') }}
@endsection
@section('contenido')

<div class="container">
    <br><br><br>
    <h4>Usuarios lectores</h4>
    <br><br>
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Maria Hernandez
           
              <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>     
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Juan Garcia

              <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Luis Martinez

              <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a> 
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Francisco Lopez

                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jesus Gonzalez

                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Ana Perez
                
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Rosa Rodriguez
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Jorge Ramirez
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Miguel Cruz
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Carlos Flores
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Juana Gomez
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Martha Morales
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Guadalupe Vazquez
                 
                <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
              <a class="btn btn-danger" href="{{ url('') }}" role="button">Suspender</a>     

              </li>
          </ul>
    </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>

</div>
@endsection