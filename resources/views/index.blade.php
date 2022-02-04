<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Mi musica</title>
</head>
<body>
    
        <nav class="navbar navbar-dark bar_nav">
            <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}"><div id="home">Mi Música</div></a>
                    <!-- <img src="{{ asset('img/logo.png') }}" class="logo" alt="home">             -->
                    <a class="btn btn-outline-info offset-md-4" href="{{ url('/publicacion') }}" role="button">Publicaciones           
                    </a>

                    <a class="btn btn-outline-info" href="{{ url('/ini_sesion') }}" role="button">Mi cuenta
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    </a>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar posts" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
            <br><br><br>

            @section('breadcrumbs')
            
            <!-- Breadcrumbs -->
            {{ Breadcrumbs::render('home') }}
            
            @show
        </nav>

            <div class="container-fluid ">
            @section('contenido')
                <br>
                <img src="{{ asset('img/banner2.jpg') }}" class="banner" alt="banner1">
                <h6>
                    En este blog puedes encontrar publicaciones de los distintos tipos de música.
                    Asi como saber opiniones sobre los generos de música mas escuchados.
                </h6>
                <h6>¡¡Sientete libre de  leer , comentar o expresar tus ideas y gustos!!.</h6>
                
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
</body>
</html>