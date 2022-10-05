<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorreiosController;
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
    return view('welcome');
    Route::controller(CorreiosController::class)->group(
    function () {
        Route::get('/', 'index')->name('rastreio.index');
        Route::get('/rastreio/{codigo}', 'consulta')->name('rastreio.consulta2');
        Route::put('/rastreio', 'consulta')->name('rastreio.consulta');

    });
});
