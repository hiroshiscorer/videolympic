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

Route::get('/athletes', '\App\Http\Controllers\AtletaController@index');
Route::get('/events', '\App\Http\Controllers\JuegoController@index');
Route::get('/event/{juego}', '\App\Http\Controllers\JuegoController@show');
Route::get('/athlete/{atleta}', '\App\Http\Controllers\AtletaController@show');


// Route::group( [ 'middleware' => 'auth'], function () {
Route::middleware('auth')->group(function() {
    Route::get('/admin', '\App\Http\Controllers\HomeController@admin')->name('admin');

    Route::get('/nuevo-atleta', '\App\Http\Controllers\AtletaController@create')->name('nuevo-atleta');
    Route::post('/guardar-atleta', '\App\Http\Controllers\AtletaController@store');

    Route::get('/editar-atleta/{atleta}', 'App\Http\Controllers\AtletaController@edit')->name('/editar-atleta');
    Route::post('/update-atleta', '\App\Http\Controllers\AtletaController@update');
    Route::post('/eliminar-atleta', 'App\Http\Controllers\AtletaController@destroy');

    Route::get('/nuevo-resultado', '\App\Http\Controllers\EventoController@create')->name('nuevo-resultado');
    Route::post('/guardar-resultado', '\App\Http\Controllers\EventoController@store');

    Route::get('/editar-resultado', 'App\Http\Controllers\EventoController@edit')->name('/editar-resultado');
    Route::post('/update-resultado', '\App\Http\Controllers\EventoController@update');
    Route::post('/eliminar-resultado', 'App\Http\Controllers\EventoController@destroy');

    Route::get('/nuevo-juego', '\App\Http\Controllers\JuegoController@create')->name('nuevo-juego');
    Route::post('/guardar-juego', '\App\Http\Controllers\JuegoController@store');

    Route::get('/editar-juego/{juego}', 'App\Http\Controllers\JuegoController@edit')->name('/editar-juego');
    Route::post('/update-juego', '\App\Http\Controllers\JuegoController@update');
    Route::post('/eliminar-juego', 'App\Http\Controllers\JuegoController@destroy');

});
