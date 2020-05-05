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

// Auth::routes();
Route::post('/api/login','UserController@login');

//Usuarios
Route::post('/api/usuario/registrar','UserController@register');


// Route::get('/', 'LoginController@index')->name('home');
// Route::get('/api/login','LoginController@index');