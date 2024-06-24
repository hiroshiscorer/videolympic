<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', '\App\Http\Controllers\HomeController@index');
Route::get('home', function (){
    return redirect('/');
});
Auth::routes();

Route::get('/atletas', '\App\Http\Controllers\AtletaController@index');
Route::get('/juegos', '\App\Http\Controllers\JuegoController@index');
Route::get('/juego/{juego}', '\App\Http\Controllers\JuegoController@show');
Route::get('/atleta/{atleta}', '\App\Http\Controllers\AtletaController@show');


// Route::group( [ 'middleware' => 'auth'], function () {
Route::middleware('auth')->group(function() {
    Route::get('/admin', '\App\Http\Controllers\HomeController@admin');
    Route::get('/nuevo-resultado', '\App\Http\Controllers\EventoController@create')->name('nuevo-resultado');
    Route::post('/guardar-resultado', '\App\Http\Controllers\EventoController@store');
    Route::get('/editar-resultado', 'App\Http\Controllers\EventoController@edit')->name('/editar-resultado');
    Route::post('/update-resultado', '\App\Http\Controllers\EventoController@update');

    Route::post('/eliminar-resultado', 'App\Http\Controllers\EventoController@destroy');

});
