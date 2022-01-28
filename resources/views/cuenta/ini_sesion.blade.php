@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/ini_sesion') }}
@endsection
@section('contenido')
<br>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-5">
    
            <br><br><br>
            <div class="card text-center">
                   
                    <div class="card-header text-light card_header_sesion">
                        Inicia sesión o registrate para continuar
                    </div>
                    <br><br>
                    
                    <div class="card-body">
                    
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ url('/mi_cuenta') }}" role="button">Ingresar</a>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <a class="card-text" href="{{ url('/') }}">Olvidé mi contraseña</a>
                            </div>
                        </div>

                        
                    </div>
                    <div class="card-footer text-muted">
                        <a class="btn btn-primary" href="{{ url('/regis_user') }}" role="button">Registrarme
                        </a>
                    </div>
            
            </div>
            <!-- <a href="{{ url('/regis_user') }}">Registrarse</a> -->
            <br><br><br>
            <br><br><br>
        </div>
    </div>
</div>
<br>
@endsection