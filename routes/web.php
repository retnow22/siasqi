<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;

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
});

// Route::get('/peserta', 'App\Http\Controllers\PesertaController@index');
Route::get('/peserta', [PesertaController::class, 'index']);
Route::post('/peserta/create', [PesertaController::class, 'create']);
Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit']);
Route::post('/peserta/{id}/update', [PesertaController::class, 'update']);
Route::get('/peserta/{id}/delete', [PesertaController::class, 'delete']);