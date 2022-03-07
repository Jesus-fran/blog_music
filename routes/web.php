<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Models\Usuario;
use App\Http\Controllers\FormValidationController;
use App\Http\Controllers\GetViewsController;
use App\Http\Controllers\SubirPublic;
use App\Http\Controllers\SubirComentario;
use App\Http\Controllers\ObtenerComentarios;

// Home
Route::get('/', [GetViewsController:: class, 'ViewHome'])->name('home');

// Mi cuenta
Route::get('mi-cuenta', [GetViewsController:: class, 'ViewMiCuenta'])->name('mi-cuenta');

Route::get('registrarse', [GetViewsController:: class, 'ViewRegistrarse'])->name('registrarse');

Route::get('registrarse/{registro?}', [FormValidationController:: class, 'GetViewRegistrarse'])->name('registrarse');

Route::post('registrar-usuario', [FormValidationController:: class, 'UserForm'])->name('registrar-usuario');

Route::post('iniciar-sesion', [FormValidationController:: class, 'IniciarSesion'])->name('iniciar-sesion');

// Publicaciones
Route::get('publicaciones', [GetViewsController:: class, 'ViewPublicaciones'])->name('publicaciones');

Route::get('crear-publicacion', [GetViewsController:: class, 'ViewCrearPublicacion'])->name('crear-publicacion');

Route::post('/guardar-publicacion', [SubirPublic:: class, 'Guardar'])->name('guardar-publicacion');

// Comentarios
Route::post('/guardar-comentario', [SubirComentario:: class, 'Guardar'])->name('guardar_comentario');
Route::post('/obtener-comentarios', [ObtenerComentarios:: class, 'Obtener'])->name('obtener-comentarios');

// Administracion
Route::get('administracion', [GetViewsController:: class, 'ViewAdministracion'])->name('administracion');
Route::get('admin-redactores', [GetViewsController:: class, 'ViewAdminRedactores'])->name('admin-redactores');
Route::get('admin-lectores', [GetViewsController:: class, 'ViewAdminLectores'])->name('admin-lectores');
Route::get('admin-publicaciones', [GetViewsController:: class, 'ViewAdminPublicaciones'])->name('admin-publicaciones');
Route::get('admin-comentarios', [GetViewsController:: class, 'ViewAdminComentarios'])->name('admin-comentarios');

// Errores
Route::get('/401', function () {
    return view('errors.401');
});

Route::get('/403', function () {
    return view('errors.403');
});

Route::get('/404', function () {
    return view('errors.404');
});

Route::get('/419', function () {
    return view('errors.419');
});
