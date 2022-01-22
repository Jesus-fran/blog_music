<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > iniciar sesion
Breadcrumbs::for('/ini_sesion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Iniciar sesion', route('/ini_sesion'));
});

// Home > iniciar sesion > registrar
Breadcrumbs::for('/regis_user', function (BreadcrumbTrail $trail) {
    $trail->parent('/ini_sesion');
    $trail->push('Registrarse', route('/regis_user'));
});

// Home > Publicaciones
Breadcrumbs::for('/publicacion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Publicaciones', route('/publicacion'));
});

// Home > Publicaciones > crear publicación
Breadcrumbs::for('/crear_publicacion', function (BreadcrumbTrail $trail) {
    $trail->parent('/publicacion');
    $trail->push('Crear nueva publicación', route('/crear_publicacion'));
}); 

// Home > Publicaciones > crear publicación
Breadcrumbs::for('/estadisticas', function (BreadcrumbTrail $trail) {
    $trail->parent('/publicacion');
    $trail->push('Mis estadisticas', route('/estadisticas'));
}); 

// Home > Mi cuenta
Breadcrumbs::for('/mi_cuenta', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mis cuenta', route('/mi_cuenta'));
}); 

// Home > Mi cuenta > editar cuenta
Breadcrumbs::for('/edit_cuenta', function (BreadcrumbTrail $trail) {
    $trail->parent('/mi_cuenta');
    $trail->push('Editar cuenta', route('/edit_cuenta'));
});

// Home > Mi cuenta > privacidad
Breadcrumbs::for('/privacidad', function (BreadcrumbTrail $trail) {
    $trail->parent('/mi_cuenta');
    $trail->push('Privacidad', route('/privacidad'));
});