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

Route::resource('mundo',MundoController::class);
//Route::post('paises', 'MundoController@Paises');

Route::post('/paises',          [App\Http\Controllers\MundoController::class, 'paises']);

Route::post('/guardar',          [App\Http\Controllers\MundoController::class, 'guardar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
