<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});


// Breadcrumbs para administrar publicaciones

// Home > Publicaciones
Breadcrumbs::for('/publicacion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Publicaciones', route('/publicacion'));
});

// Home > Publicaciones > crear publicación
Breadcrumbs::for('/crear_publicacion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Crear nueva publicación', route('/crear_publicacion'));
}); 

// Home > Publicaciones > crear publicación
Breadcrumbs::for('/estadisticas', function (BreadcrumbTrail $trail) {
    $trail->parent('/publicacion');
    $trail->push('Mis estadisticas', route('/estadisticas'));
}); 

// Home > Iniciar sesión > Administracion    
Breadcrumbs::for('/administracion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Administracion', route('/administracion'));
});


// Home > Iniciar sesión > Administracion > admin redactores    
Breadcrumbs::for('/admin_redactores', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar redactores', route('/admin_redactores'));
});


// Home > Iniciar sesión > Administracion > Admin lectores    
Breadcrumbs::for('/admin_lectores', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar lectores', route('/admin_lectores'));
});

// Home > Iniciar sesión > Administracion > Admin posts    
Breadcrumbs::for('/admin_posts', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar posts', route('/admin_posts'));
});


// Home > Iniciar sesión > Administracion > Admin comentarios    
Breadcrumbs::for('/admin_comentarios', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar comentarios', route('/admin_comentarios'));
});


// Home >  > Iniciar sesión
Breadcrumbs::for('/ini_sesion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Iniciar sesion', route('/ini_sesion'));
});

// Home > Iniciar sesión > registrar
Breadcrumbs::for('/regis_user', function (BreadcrumbTrail $trail) {
    $trail->parent('/ini_sesion');
    $trail->push('Registrarse', route('/regis_user'));
});

// Home > Publicaciones > $nombre publicación
Breadcrumbs::for('/{pub}', function (BreadcrumbTrail $trail, $pub) {
    $trail->parent('/publicaciones');
    $trail->push('Festival de música', route('/{pub}'));
});



