<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="{{ asset('js/javascript.js') }}"></script>

    <title>Mi musica</title>
</head>

<body>

    <div class="container bg-dark contenedor_nav">
        <nav class="navbar  navbar-expand-lg bg-dark navbar-dark bar_nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                                        href="{{ url('/publicacion') }}" role="button">Publicaciones
                                    </a></div>
                                <div class="col-md-auto offset-md-1">
                                    @section('btns')
                                        {{-- btns --}}
                                    @show
                                </div>
                                <div class="col-md-auto offset-md-1"> <a class="btn btn-outline-info"
                                        href="{{ url('/ini_sesion') }}" role="button">Mi cuenta
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

    <div class="container contenedor">

        @section('contenido')
            <br>
            <img src="{{ asset('img/banner2.jpg') }}" class="banner" alt="banner1" id="banner_2">
            <p class="text">
                En este blog puedes encontrar publicaciones de los distintos tipos de música.
                Asi como saber opiniones sobre los generos de música mas escuchados.
            </p>
            <p class="text">¡¡Sientete libre de leer , comentar o expresar tus ideas y gustos!!.</p>

            <br>
            <div>
                <img src="{{ asset('img/banner4.jpg') }}" class="banner4" alt="banner4">
            </div>
            <br><br><br>

            <!-- <a href="{{ url('/401') }}">Error 401</a><br>
                                        <a href="{{ url('/403') }}">Error 403</a><br>
                                        <a href="{{ url('/404') }}">Error 404</a><br>
                                        <a href="{{ url('/419') }}">Error 419</a> -->
        @show

    </div>

    <div class="container contenedor_foot">
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">

                        <h5 class="text-white">Blog: Mi Música</h5>
                        <ul>
                            <li><a class="text-white" href="#">Cookies</a></li>
                            <li><a class="text-white" href="#">Política de privacidad</a></li>
                            <li><a class="text-white" href="#">Aviso legal</a></li>
                            <li><a class="text-white" href="#">Términos y condiciones</a></li>
                        </ul>

                    </div>
                    <div class="col">
                        <ul>
                            <li><a class="text-white" href="#">Facebook</a></li>
                            <li><a class="text-white" href="#">Instagram</a></li>
                            <li><a class="text-white" href="#">Pinterest</a></li>
                            <li><a class="text-white" href="#">Twitter</a></li>
                            <li><a class="text-white" href="#">WhatsApp</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <br>
                            <li>
                                <p class="text-white">Mi música. © 2021</p>
                            </li>
                            <li><a class="text-white" href="#">www.miMusica.com</a></li><br>
                            <li>
                                <p class="text-white">Desarrollado por Equipo 5, 8A IDyGS </p>
                            </li>
                        </ul>
                    </div>

                    <div class="col">
                        <ul><br>
                            <li>
                                <h5 class="text-white">Gracias por seguirnos.</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>


</body>

</html>
