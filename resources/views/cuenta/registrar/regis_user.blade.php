@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/regis_user') }}
@endsection
@section('contenido')


<div class="container">


    <div class="row justify-content-md-center">
        <div class="col-md-5">
    
            <br><br><br>
            <div class="card text-center">
                <form  action="/validar_form" method="GET">

                    {{ csrf_field() }}

                    <div class="card-header text-light card_header_sesion">
                    Registrarme
                    </div>
                    
                    <div class="card-body">

                        <label for="inputEmail4" class="form-label">Ingresa tu información personal</label>
                        <br><br>
                        <div class="row">
                            <div class="col">
        
                                <div class="input-group mb-3">                           
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre de usuario</span>
                                    <input type="text" class="form-control" name="nombre_user" id="nombre_user" pattern="[a-z|A-Z]{4,20}" value=" {{ old('nombre_user') }}" max aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required> 
                                </div>
                                @if ($errors->has('nombre_user'))
                                        
                                <span class="text-danger">{{ $errors->first('nombre_user')}}</span>
                                
                                @endif
                            </div>           
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                    <input type="email" class="form-control" name="correo" id="correo" minlength="6" maxlength="50" value=" {{ old('correo') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    
                                </div>
                                @if ($errors->has('correo'))
                                    
                                        <span class="text-danger" for="input-correo">{{ $errors->first('correo')}}</span>
                                @endif
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                    <input type="password" class="error_pass form-control" name="pass_1" id="pass_1" minlength="8" maxlength="30" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <p class="text-danger" style="display: none"> Debe tener al menos 8 caracteres 
                                    mínimo, una minúscula, una mayúscula, un número, un carácter 
                                    especial
                                </p>
                                @if ($errors->has('pass_1'))
                                        <span class="text-danger" for="input-pass_1">{{ $errors->first('pass_1')}}</span>
                                @endif
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="inputEmail4" class="form-label">Repite la contraseña</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                    <input type="password" class="error_pass form-control"  name="pass_2" id="pass_2" minlength="8" maxlength="30" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                   
                                </div>
                                <p class="text-danger"  style="display: none"> Debe tener al menos 8 caracteres 
                                    mínimo, una minúscula, una mayúscula, un número, un carácter 
                                    especial
                                </p>
                                @if ($errors->has('pass_2'))
                                <span class="text-danger" for="input-pass_2">{{ $errors->first('pass_2')}}</span>
                                @endif
                            </div>           
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="perms" id="perms" value="1" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Acepto los terminos y condiciones de privacidad
                                    </label>
                                    
                                </div>
                                @if ($errors->has('nombre_user'))
                                        <span class="text-danger" for="input-perms">{{ $errors->first('perms')}}</span>
                                @endif
                            </div>
                        </div>

                        
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-primary" type="submit">Finalizar registro
                        </button>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <a class="card-text" href="{{ url('/ini_sesion') }}">Ya tengo una cuenta</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                <br><br><br>
                <br><br><br>
            
        </div>
    </div>


</div>

@endsection