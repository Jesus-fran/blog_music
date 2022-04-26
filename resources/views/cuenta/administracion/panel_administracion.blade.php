@extends('index')

@section('btn_sesion')
@endsection

@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/administracion') }}
@endsection
@section('contenido')
<br>

<div class="container-fluid">
    <h5 class="sub-font">Estadísticas del blog<h5>

    {{-- Codigo para el grafico --}}
    <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      </main>
    </div>
    <br>

    <h5 class="sub-font">Opciones de administración</h5>
    <br>
    
    <div class="row">
        <div class="card-group">
            <div class="col">
                <div class="card card_admin" style="width: 18rem;">
                    <img src="{{ asset('img/usuario_redactor_2.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title sub-font">Usuarios redactores</h5>
                      <p class="card-text">Administra a los usuarios que redactan o redactaran en los posts</p><br>
                      <a href="{{ route('admin-redactores') }}" class="btn btn_ingresar">Administrar redactores</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card_admin" style="width: 18rem;">
                    <img src="{{ asset('img/admin_posts.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title sub-font">Posts para administrar</h5><br><br>
                      <p class="card-text">Elimina, oculta y aprueba los posts de los redactores.</p><br><br>
                      <a href="{{ route('admin-publicaciones') }}" class="btn btn_ingresar">Administrar posts</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card_admin" style="width: 18rem;">
                    <img src="{{ asset('img/usuario_lector.webp') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title sub-font">Usuarios lectores</h5>
                      <p class="card-text">Elimina o suspende usuarios lectores.</p><br>
                      <a href="{{ route('admin-lectores') }}" class="btn btn_ingresar">Administrar lectores</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card_admin" style="width: 18rem;">
                    <img src="{{asset('img/admin_comentarios_2.jpg')}}" class="card-img-top img_admin" alt="...">
                    <div class="card-body">
                
                      <h5 class="card-title sub-font">Comentarios y respuestas</h5>
                      <p class="card-text">Elimina comentarios o respuestas de los posts.</p>
                      <a href="{{ route('admin-comentarios') }}" class="btn btn_ingresar">Administrar comentarios</a>
                    </div>
                </div>
            </div>

        </div>

        
    </div>

       

</div>

<br>
{{-- Muestra una grafica --}}
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="{{ asset('js/datos_grafico.js') }}">
</script>
@endsection