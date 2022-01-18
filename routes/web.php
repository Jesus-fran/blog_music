<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

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
