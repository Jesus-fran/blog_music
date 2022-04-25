<?php

use App\Models\Usuario;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\SubirPublic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EliminarLector;
use App\Http\Controllers\SubirRespuesta;
use App\Http\Controllers\ObtenerLectores;
use App\Http\Controllers\SubirComentario;
use App\Http\Controllers\AdminComentarios;
use App\Http\Controllers\EliminarRedactor;
use App\Http\Controllers\FiltrarPosts;
use App\Http\Controllers\ObtenerPostsAdmin;
use App\Http\Controllers\ObtenerRedactores;
use App\Http\Controllers\GetViewsController;
use App\Http\Controllers\ObtenerComentarios;
use App\Http\Controllers\ObtenerPublicaciones;
use App\Http\Controllers\FormValidationController;

// Home
Route::get('/', [GetViewsController:: class, 'ViewHome'])->name('home');

// Mi cuenta
Route::get('mi-cuenta', [GetViewsController:: class, 'ViewMiCuenta'])->name('mi-cuenta');
Route::post('iniciar-sesion', [FormValidationController:: class, 'IniciarSesion'])->name('iniciar-sesion');
Route::get('registrarse', [GetViewsController:: class, 'ViewRegistrarse'])->name('registrarse');
Route::post('registrar-usuario', [FormValidationController:: class, 'UserForm'])->name('registrar-usuario');
Route::get('cerrar-sesion', [FormValidationController:: class, 'CerrarSesion'])->name('cerrar-sesion');

// Publicaciones
Route::get('publicaciones', [GetViewsController:: class, 'ViewPublicaciones'])->name('publicaciones');
Route::get('publicaciones/{id}', [GetViewsController:: class, 'ViewPublicacion'])->name('publicacion');
Route::get('obtener-publicaciones', [ObtenerPublicaciones:: class, 'ObtenerPublicacion'] )->name('obtener-publicaciones');
Route::get('filtro-categoria', [FiltrarPosts:: class, 'FiltrarCategorias'] )->name('filtro-categoria');
Route::get('crear-publicacion', [GetViewsController:: class, 'ViewCrearPublicacion'])->name('crear-publicacion')->middleware('redactor');
Route::post('/guardar-publicacion', [SubirPublic:: class, 'Guardar'])->name('guardar-publicacion')->middleware('redactor');;

// Comentarios
Route::post('/obtener-comentarios', [ObtenerComentarios:: class, 'Obtener'])->name('obtener-comentarios');
Route::post('/guardar-comentario', [SubirComentario:: class, 'Guardar'])->name('guardar_comentario')->middleware('lector');
Route::post('/guardar-respuesta', [SubirRespuesta:: class, 'Guardar'])->name('guardar-respuesta')->middleware('lector');
// Administracion
Route::get('administracion', [GetViewsController:: class, 'ViewAdministracion'])->name('administracion')->middleware('admin');
Route::get('admin-redactores', [GetViewsController:: class, 'ViewAdminRedactores'])->name('admin-redactores')->middleware('admin');
Route::get('admin-lectores', [GetViewsController:: class, 'ViewAdminLectores'])->name('admin-lectores')->middleware('admin');
Route::get('admin-publicaciones', [GetViewsController:: class, 'ViewAdminPublicaciones'])->name('admin-publicaciones')->middleware('admin');
Route::get('admin-comentarios', [GetViewsController:: class, 'ViewAdminComentarios'])->name('admin-comentarios')->middleware('admin');
Route::get('obtener-publicaciones-admin', [ObtenerPostsAdmin:: class, 'ObtenerPublicacion'] )->name('obtener-publicaciones-admin')->middleware('admin');
Route::post('eliminar-publicacion', [ObtenerPostsAdmin:: class, 'Eliminar'] )->name('eliminar-publicacion');
Route::get('obtener-redactores', [ObtenerRedactores::class, 'Obtener'])->name('obtener-redactores')->middleware('admin');
Route::post('eliminar-redactor', [EliminarRedactor::class, 'Eliminar'])->name('eliminar-redactor')->middleware('admin');
Route::get('obtener-lectores', [ObtenerLectores::class, 'Obtener'])->name('obtener-lectores')->middleware('admin');
Route::post('eliminar-lector', [EliminarLector::class, 'Eliminar'])->name('eliminar-lector')->middleware('admin');
Route::get('obtener-comentarios-admin', [AdminComentarios::class, 'Obtener'])->name('obtener-comentarios-admin')->middleware('admin');
Route::post('eliminar-comentarios', [AdminComentarios::class, 'EliminarComentario'])->name('eliminar-comentarios')->middleware('admin');
Route::post('eliminar-respuestas', [AdminComentarios::class, 'EliminaRespuesta'])->name('eliminar-respuestas')->middleware('admin');



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
