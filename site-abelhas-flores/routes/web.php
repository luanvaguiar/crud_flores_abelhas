<?php

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

use App\Http\Controllers\AbelhasController;
use App\Http\Controllers\AbelhasFloresController;
use App\Http\Controllers\FloresController;

Route::get('/', [AbelhasController::class, 'getAll']);

Route::get('/abelhas', 'AbelhasController@index');
Route::get('/flores', 'FloresController@index');
Route::post('/flores/cadastrar',  [FloresController::class, 'create'])->name('flores.create');
Route::post('/abelhas/cadastrar',  [AbelhasController::class, 'create'])->name('abelhas.create');
Route::post('/filtro', [AbelhasFloresController::class, 'filtrar'])->name('abelhasflores.buscar');
