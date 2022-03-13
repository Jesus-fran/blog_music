<div class="container contenedor_nav">
    <nav class="navbar  navbar-expand-lg  bar_nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div id="home"> <i class="bi bi-music-note-beamed"></i> 𝑴ú𝒔𝒊𝒄𝒂</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#opciones"
                aria-controls="opciones" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="opciones">
                <div class="container-fluid">
                    <div class="row">
                        <div class="navbar-nav">
                            <div class="col-md-auto offset-md-1"><a class="btn btn-outline-info offset-md-4"
                                    href="{{ route('publicaciones') }}" role="button">Publicaciones
                                </a></div>
                            <div class="col-md-auto offset-md-1">
                                @if (session('tipo') == 'ADMIN')
                                    <a class="btn btn-outline-info" href="{{ route('administracion') }}"
                                        role="button">Panel administración
                                    </a>
                                @endif
                                @if (session('tipo') == 'REDACTOR')
                                    <a class="btn btn-outline-info" href="{{ route('crear-publicacion') }}"
                                        role="button">Crear publicación
                                    </a>
                                @endif
                            </div>
                            @if (session('email'))
                                <div class="col-md-auto offset-md-1"><button type="button" class="btn  text-light"
                                        disabled data-bs-toggle="button" autocomplete="off">{{ session('nombre') }}
                                        &nbsp&nbsp<i class="bi bi-person-circle"></i></button> <a
                                        class="btn btn-outline-dark text-light" href="{{ route('cerrar-sesion') }}"
                                        role="button">Cerrar sesión</a></div>
                            @else
                                <div class="col-md-auto offset-md-1"><a class="btn btn-outline-info"
                                        href="{{ route('mi-cuenta') }}" role="button">Mi cuenta
                                        <i class="bi bi -person-fill"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br><br><br>
    </nav>
    <nav class="navbar bar_bread" id="bar_bread">
        <div class="container-fluid">
            @section('breadcrumbs')

                <!-- Breadcrumbs -->
                {{ Breadcrumbs::render('home') }}

            @show
        </div>

    </nav>
</div>
