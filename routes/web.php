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
//Rota com Componetes Laravel
// Route::get('/', [App\Http\Controllers\ClienteControlador::class, 'index']);

//Rotas  com js
Route::get('/', [App\Http\Controllers\ClienteControlador::class, 'indexjs']);
Route::get('/json', [App\Http\Controllers\ClienteControlador::class, 'indexjson']);
