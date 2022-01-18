<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <title>Mi musica</title>
</head>
<body>
    
        <nav class="navbar navbar-dark bg-dark nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Home</a>            
                    <button class="btn btn-outline-success me-2" type="button">Publica</button>
                    <button class="btn btn-outline-success me-2" type="button">Sesión</button>
                    <button class="btn btn-outline-success me-2" type="button">Registrate</button>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
            <br><br><br>
            
        </nav>

            <div class="container-fluid">
            @section('contenido')
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <a href="{{ url('/401') }}">Error 401</a><br>
                <a href="{{ url('/403') }}">Error 403</a><br>
                <a href="{{ url('/404') }}">Error 404</a><br>
                <a href="{{ url('/419') }}">Error 419</a>
                <br><br><br>
                <br><br><br>
                <br><br><br>
            @show
            </div>
            
            <footer class="footer bg-dark">
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