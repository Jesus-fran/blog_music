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

Route::name('/ini_sesion')->get('/ini_sesion', function () {
    return view('login.ini_sesion');
});

Route::name('/regis_user')->get('/regis_user', function () {
    return view('login.registrar.regis_user');
});

Route::name('/publicacion')->get('/publicacion', function () {
    return view('publicaciones.publicacion');
});

Route::name('/crear_publicacion')->get('/crear_publicacion', function () {
    return view('publicaciones.crear.crear_publicacion');
});

Route::name('/estadisticas')->get('/estadisticas', function () {
    return view('publicaciones.estadisticas');
});

Route::name('/mi_cuenta')->get('/mi_cuenta', function () {
    return view('cuenta.mi_cuenta');
});

Route::name('/edit_cuenta')->get('/edit_cuenta', function () {
    return view('cuenta.edit_cuenta');
});

Route::name('/privacidad')->get('/privacidad', function () {
    return view('cuenta.privacidad');
});


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
