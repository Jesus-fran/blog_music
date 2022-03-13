<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- bootstrap y boostrap icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    {{-- popper --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    {{-- estilos css y codigo javascript--}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="{{ asset('js/animaciones.js') }}"></script>

    <title>Mi musica</title>
</head>

<body>

    @include('navbar_y_footer/navbar')
    

    <div class="container contenedor">

        @section('contenido')
            <br>
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
        @show

    </div>

    
    @include('navbar_y_footer/footer')

</body>
</html>
