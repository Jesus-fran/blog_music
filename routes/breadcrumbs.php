<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});


// PUBLICACIONES

// Home > Publicaciones
Breadcrumbs::for('/publicaciones', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Publicaciones', route('publicaciones'));
});

// Home > Publicaciones > Crear publicación
Breadcrumbs::for('/crear-publicacion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Crear nueva publicación', route('crear-publicacion'));
}); 

// MI CUENTA

// Home > Mi cuenta
Breadcrumbs::for('/mi-cuenta', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Mi cuenta', route('mi-cuenta'));
});

// Home > Mi cuenta > Registrarse
Breadcrumbs::for('/registrarse', function (BreadcrumbTrail $trail) {
    $trail->parent('/mi-cuenta');
    $trail->push('Registrarse', route('registrarse'));
});


// ADMINISTRACIÓN

// Home >  Panel administracion    
Breadcrumbs::for('/administracion', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Panel administracion', route('administracion'));
});

// Home >  Administracion > Admin redactores    
Breadcrumbs::for('/admin-redactores', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar redactores', route('admin-redactores'));
});

// Home >  Administracion > Admin lectores    
Breadcrumbs::for('/admin-lectores', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar lectores', route('admin-lectores'));
});

// Home >  Administracion > Admin publicaciones  
Breadcrumbs::for('/admin-publicaciones', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar posts', route('admin-publicaciones'));
});

// Home > Administracion > Admin comentarios    
Breadcrumbs::for('/admin-comentarios', function (BreadcrumbTrail $trail) {
    $trail->parent('/administracion');
    $trail->push('Administrar comentarios', route('admin-comentarios'));
});
