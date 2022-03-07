@extends('index')

@section('btns')
@endsection


@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/mi-cuenta') }}
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

                        <form action="{{ route('iniciar-sesion') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                        <input type="email" name="correo" class="form-control" id="correo_ini"
                                            data-span="span_correo_ini" minlength="6" maxlength="50"
                                            value=" {{ old('correo') }}" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" required>
                                    </div>
                                    <span class="text-success" style="display: none" id="span_correo_ini">Ingrese un
                                        correo
                                        válido ya registrado.</span>
                                    @error('correo')
                                        <br><span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                        <input type="password" name="password" class="form-control" id="pass_ini"
                                            data-span="span_pass_ini" minlength="8" maxlength="30"
                                           
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            required>
                                        <input type="button" class="btn btn-secondary" value="show"
                                            onclick="show_pass('pass_ini', this)">
                                    {{--  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[|°¬;:,._#@$!%*?&])[A-Za-z\d Ññ|°¬;:,._#@$!%*?&]{8,30}$" --}}
                                        </div>
                                    <span class="text-success" style="display: none" id="span_pass_ini">Debe tener al
                                        menos
                                        8 caracteres
                                        mínimo, una minúscula, una mayúscula, un número, un carácter
                                        especial</span>

                                    @error('password')
                                        <br><span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-info" type="submit">Ingresar
                                    </button>
                                </div>
                            </div>
                            <br>

                        </form>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ route('administracion') }}" role="button">Ingresar como
                                    admin</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ route('crear-publicacion') }}" role="button">Ingresar
                                    como redactor</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-info" href="{{ route('publicaciones') }}" role="button">Ingresar como
                                    lector</a>
                            </div>
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="col">
                                <a class="card-text" href="{{ route('home') }}">Olvidé mi contraseña</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-muted">
                        <a class="btn btn-primary" href="{{ route('registrarse') }}" role="button">Registrarme
                        </a>
                    </div>

                </div>
                <br><br><br>
                <br><br><br>
            </div>
        </div>
    </div>
    <br>
@endsection
