<div class="container bg-dark contenedor_nav">
    <nav class="navbar  navbar-expand-lg bg-dark navbar-dark bar_nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div id="home">Mi Música</div>
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
                                @section('btns')
                                    {{-- btns --}}
                                @show
                            </div>
                            <div class="col-md-auto offset-md-1"> <a class="btn btn-outline-info"
                                    href="{{ route('mi-cuenta') }}" role="button">Mi cuenta
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </a></div>
                            <div class="col-md-auto offset-md-1">
                                {{-- <div class="input-group">
                                    <input class="form-control me-2" type="search" placeholder="Buscar posts"
                                        aria-label="Search">
                                    <span class="input-group-text btn btn-outline-info" type="submit">Search</span>
                                  </div> --}}
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Buscar posts"
                                        aria-label="Buscar posts" aria-describedby="Buscar posts">
                                    <button class="input-group-text btn btn-outline-info"
                                        type="submit">Search</button>
                                </div>
                            </div>
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