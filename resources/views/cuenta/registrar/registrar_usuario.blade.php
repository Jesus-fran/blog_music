@extends('index')

@section('btn_sesion')
@endsection

@section('breadcrumbs')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('/registrarse') }}
@endsection

@section('contenido')
    <div class="container">


        <div class="row justify-content-md-center">
            <div class="col-md-5">

                <br><br><br>
                <div class="card text-center">

                    @if (isset($redirect_to))
                    <form action="{{ route('registrar-usuario', ['redirect_to'=>$redirect_to]) }}" method="POST" id="registrarse">
                    @else
                    <form action="{{ route('registrar-usuario') }}" method="POST" id="registrarse">
                    @endif

                        {{ csrf_field() }}

                        <div class="card-header text-light card_header_sesion">
                            Registrarme
                        </div>

                        <div class="card-body">

                            {{-- @isset($status)
                                @if ($status == 'true')
                                    <label class="form-label text-success bg-light h4">¡Registrado correctamente!</label><br>
                                    <label class="form-label text-success bg-light h6">Ya puedes <a
                                            href="{{ route('mi-cuenta') }}">Iniciar sesión</a></label><br>
                                @endif
                            @endisset --}}
                            <label for="inputEmail4" class="form-label">Ingresa tu información personal
                            </label>

                            <br><br>
                            <div class="row">
                                <div class="col">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre de
                                            usuario</span>
                                        <input type="text" class="form-control" pattern="[a-z|A-Z ñ]{4,20}" minlength="4"
                                            maxlength="20" name="nombre_user" id="nombre_user" data-span="span_user"
                                            value="{{ old('nombre_user') }}" max aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
                                    </div>
                                  
                                    <span class="text-success" style="display: none" id="span_user">Mayusculas o
                                        minusculas minimo 4 caracteres, sin numeros y sin caracteres
                                        especiales.</span>
                                    @error('nombre_user')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                        <input type="email" class="form-control" name="correo" id="correo"
                                            data-span="span_correo" minlength="6" maxlength="50"
                                            value="{{ old('correo') }}" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" autocomplete="off" required>

                                    </div>
                                    <span class="text-success" style="display: none" id="span_correo">Ingrese un correo
                                        válido.</span>
                                    @error('correo')
                                        <span class="text-danger" for="input-correo">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                        <input type="password" class="error_pass form-control" name="pass_1" id="pass_1"
                                            data-span="span_pass_1"
                                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[|°¬;:,._#@$!%*?&])[A-Za-z\d Ññ|°¬;:,._#@$!%*?&]{8,30}$"
                                            minlength="8" maxlength="30" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
                                       <span class="btn btn-light" id="inputGroupPrepend" onclick="show_pass('pass_1', this)"><i
                                            class="bi bi-eye"></i></span>
                                    </div>
                                    <span class="text-success" style="display: none" id="span_pass_1">Debe tener al menos
                                        8 caracteres
                                        mínimo, una minúscula, una mayúscula, un número, un carácter
                                        especial</span>
                                    @error('pass_1')
                                        <span class="text-danger" for="input-pass_1">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Repite la contraseña</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                        <input type="password" class="error_pass form-control" name="pass_2" id="pass_2"
                                            data-span="span_pass_2"
                                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[|°¬;:,._#@$!%*?&])[A-Za-z\d Ññ|°¬;:,._#@$!%*?&]{8,30}$"
                                            minlength="8" maxlength="30" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default" required>
                                            <span class="btn btn-light" id="inputGroupPrepend" onclick="show_pass('pass_2', this)"><i
                                                class="bi bi-eye"></i></span>

                                    </div>
                                    <span class="text-success" style="display: none" id="span_pass_2">Debe tener al menos
                                        8 caracteres
                                        mínimo, una minúscula, una mayúscula, un número, un carácter
                                        especial</span>
                                    @error('pass_2')
                                        <span class="text-danger" for="input-pass_2">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                        <select class="form-select" name="tipo_usuario" aria-label="Default select example">
                                            <option value="LECTOR"   {{ old('tipo_usuario') == 'LECTOR' ? 'selected' : ''}}>Lector</option>
                                            <option value="REDACTOR" {{ old('tipo_usuario') == 'REDACTOR' ? 'selected' : ''}}>Redactor</option>
                                        </select>
                                    </div>
                                    @error('tipo_usuario')
                                        <span class="text-danger" for="input-pass_2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="perms" id="perms" value="1"
                                            id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Acepto los terminos y condiciones de privacidad
                                        </label>

                                    </div>
                                    @error('perms')
                                        <span class="text-danger" for="input-perms">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-muted">
                            <button class="btn btn-primary" type="submit" id="btn_registrarse">Finalizar registro
                            </button>
                            <br><br>
                            <div class="row">
                                <div class="col">
                                    <a class="card-text" href="{{ route('mi-cuenta') }}">Ya tengo una cuenta</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br><br><br>
                <br><br><br>

            </div>
        </div>

        <script src="{{ asset('js/des_btn.js') }}"></script>

    </div>
@endsection
