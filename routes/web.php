<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home')->get('/', function () {
    return view('index');
});


Route::name('/publicacion')->get('/publicacion', function () {
    return view('publicaciones.publicacion');
});

Route::name('/crear_publicacion')->get('/crear_publicacion', function () {
    return view('publicaciones.crear.crear_publicacion');
});


Route::name('/ini_sesion')->get('/ini_sesion', function () {
    return view('cuenta.ini_sesion');
});


Route::name('/administracion')->get('/administracion', function () {
    return view('cuenta.administracion.administracion');
});

Route::name('/admin_redactores')->get('/admin_redactores', function () {
    return view('cuenta.administracion.admin_redactores');
});

Route::name('/admin_lectores')->get('/admin_lectores', function () {
    return view('cuenta.administracion.admin_lectores');
});


Route::name('/admin_posts')->get('/admin_posts', function () {
    return view('cuenta.administracion.admin_posts');
});


Route::name('/admin_comentarios')->get('/admin_comentarios', function () {
    return view('cuenta.administracion.admin_comentarios');
});

Route::name('/regis_user')->get('/regis_user', function () {
    return view('cuenta.registrar.regis_user');
});

Route::name('/validar_form')->get('/validar_form', 'App\Http\Controllers\FormValidationController@UserForm');  


// Rutas a posts

Route::name('/{pub}')->get('/{pub}', function ($pub) {
    return view('publicaciones.'.$pub);
});


// controlador para guardar publicacion
Route::name('/guardar_pub')->post('/guardar_pub', 'App\Http\Controllers\SubirPublic@Guardar');  

// controlador para guardar comentario
Route::name('/guardar_comentario')->post('/guardar_comentario', 'App\Http\Controllers\SubirComentario@Guardar');  

// / controlador para obtener comentarios
Route::name('/obtener_comentarios')->post('/obtener_comentarios', 'App\Http\Controllers\ObtenerComentarios@Obtener');  





// rutas de errores
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
