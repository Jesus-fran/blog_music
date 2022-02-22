@extends('index')

@section('btns')

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
                                    <input type="email" class="form-control" id="correo_ini" data-span="span_correo_ini" minlength="6" maxlength="50"
                                    value=" {{ old('correo') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <span class="text-success" style="display: none" id="span_correo_ini">Ingrese un correo
                                    válido ya registrado.</span>
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                    <input type="password" class="form-control" id="pass_ini" data-span="span_pass_ini" minlength="8" maxlength="30"
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    <input type="button" class="btn btn-secondary" value="show" onclick="show_pass('pass_ini', this)">
                                </div>
                                <span class="text-success" style="display: none" id="span_pass_ini">Debe tener al menos
                                    8 caracteres
                                    mínimo, una minúscula, una mayúscula, un número, un carácter
                                    especial</span>
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ url('/administracion') }}" role="button">Ingresar como admin</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ url('/crear_publicacion') }}" role="button">Ingresar como redactor</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ url('/publicacion') }}" role="button">Ingresar como lector</a>
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