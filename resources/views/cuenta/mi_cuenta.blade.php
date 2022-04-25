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


                        @isset($status)
                            @if ($status == 'false')
                                <label class="form-label text-danger bg-light h4">Correo o contraseña invalido <i
                                        class="bi bi-emoji-frown"></i></label><br>
                            @endif
                        @endisset

                        @if (session('redirect_to'))
                            <form action="{{ route('iniciar-sesion', ['redirect_to' => session('redirect_to')]) }}"
                                method="POST" id="iniciar_sesion">
                                {{ csrf_field() }}
                            @else
                                <form action="{{ route('iniciar-sesion') }}" method="POST" id="iniciar_sesion">
                                    {{ csrf_field() }}
                        @endif

                        @isset($registro)
                            @if ($registro == 'true')
                                <label class="form-label text-success bg-light h4">¡Registrado correctamente!</label><br>
                                <label class="form-label text-success bg-light h6">Ya puedes iniciar sesión</label><br>
                            @endif
                        @endisset

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
                                    <span class="btn btn-light" id="inputGroupPrepend" onclick="show_pass('pass_ini', this)"><i
                                            class="bi bi-eye"></i></span>
                                    {{-- pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[|°¬;:,._#@$!%*?&])[A-Za-z\d Ññ|°¬;:,._#@$!%*?&]{8,30}$" --}}
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
                                <button class="btn btn_ingresar" id="btn_submit" type="submit">Ingresar
                                </button>
                            </div>
                        </div>
                        <br>

                        </form>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <a class="card-text" href="{{ route('home') }}">Olvidé mi contraseña</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-muted">

                        @if (session('redirect_to'))
                            <a class="btn btn-success"
                                href="{{ route('registrarse', ['redirect_to' => session('redirect_to')]) }}"
                                role="button">Registrarme
                            </a>
                        @else
                            <a class="btn btn-success" href="{{ route('registrarse') }}" role="button">Registrarme
                            </a>
                        @endif
                    </div>

                </div>
                <br><br><br>
                <br><br><br>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/des_btn.js') }}"></script>
    <br>
@endsection
