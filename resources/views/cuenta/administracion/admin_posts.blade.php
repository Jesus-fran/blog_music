@extends('index')

@section('btn_sesion')
@endsection


@section('breadcrumbs')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('/admin_posts') }}
@endsection
@section('contenido')

<br>
<br>
<br>

<div class="container">
    <h4>Posts recientes</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('img/posts/1.webp') }}" class="card-img-top imagen_posts" alt="...">
            <div class="card-body">
              <h5 class="card-title">Festival de música</h5>
              <p class="card-text">Mejores festivales de música del año 2021 en México. Descubrelos.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                  <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                  <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
                </small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('img/posts/2.webp') }}" class="card-img-top imagen_posts" alt="...">
            <div class="card-body">
              <h5 class="card-title">La guitarra, ¿ un instrumento antiguo?</h5>
              <p class="card-text">La guitarra es unos de los instrumentos más usados en todos los generos.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                  <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                  <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>  
                </small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('img/posts/3.webp') }}" class="card-img-top imagen_posts" alt="...">
            <div class="card-body">
              <h5 class="card-title">¿Qué es la música clasica?</h5>
              <p class="card-text">Se denomina música clásica a toda composición nacida en la era del clasismo del año 1,750 hasta el...</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                  <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                  <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
                </small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('img/posts/4.webp') }}" class="card-img-top imagen_posts" alt="...">
            <div class="card-body">
              <h5 class="card-title">Los mejores musicas de DJ</h5>
              <p class="card-text">¿Quienes son los mejores DJ en el mundo y cuales son sus músicas?.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                  <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                  <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
                </small>
            </div>
          </div>
        </div>

        <div class="col">
            <div class="card h-100">
              <img src="{{ asset('img/posts/5.webp') }}" class="card-img-top imagen_posts" alt="...">
              <div class="card-body">
                <h5 class="card-title">Festival de rock</h5>
                <p class="card-text">Conoce que artistas estaran en el festival 2022 de rock. ¿Cuales son los requisitos para asistir?</p>
              </div>
              <div class="card-footer">
                  <small class="text-muted">
                    <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                    <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
                  </small>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
              <img src="{{ asset('img/posts/6.webp') }}" class="card-img-top imagen_posts" alt="...">
              <div class="card-body">
                <h5 class="card-title">El reggaeton y su gran influencia</h5>
                <p class="card-text">¿Por que el reggaeton se a convertido en uno de los géneros más escuchados? </p>
              </div>
              <div class="card-footer">
                  <small class="text-muted">
                    <a class="btn btn-primary" href="{{ url('') }}" role="button">Editar</a>
                    <a class="btn btn-warning" href="{{ url('') }}" role="button">Eliminar</a>
                  </small>
              </div>
            </div>
        </div>

    </div>

</div>

<br>
<br>
<br>
@endsection