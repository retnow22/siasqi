<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MatpelController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);

Route::group(['middleware' => ['auth', 'checkRole:Admin']], function(){
    Route::get('/peserta', [PesertaController::class, 'index']);
    Route::post('/peserta/create', [PesertaController::class, 'create']);
    Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit']);
    Route::post('/peserta/{id}/update', [PesertaController::class, 'update']);
    Route::get('/peserta/{id}/delete', [PesertaController::class, 'delete']);
    Route::get('/pengajar', [PengajarController::class, 'index']);
    Route::post('/pengajar/create', [PengajarController::class, 'create']);
    Route::get('/pengajar/{id}/edit', [PengajarController::class, 'edit']);
    Route::post('/pengajar/{id}/update', [PengajarController::class, 'update']);
    Route::get('/pengajar/{id}/delete', [PengajarController::class, 'delete']);
    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::post('/nilai/create', [NilaiController::class, 'create']);
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit']);
    Route::post('/nilai/{id}/update', [NilaiController::class, 'update']);
    Route::get('/nilai/{id}/delete', [NilaiController::class, 'delete']);    
    Route::get('/jadwal', [MatpelController::class, 'index']);
    Route::post('/jadwal/create', [MatpelController::class, 'create']);
    Route::get('/jadwal/{id}/edit', [MatpelController::class, 'edit']);
    Route::post('/jadwal/{id}/update', [MatpelController::class, 'update']);
    Route::get('/jadwal/{id}/delete', [MatpelController::class, 'delete']);
});

Route::group(['middleware' => ['auth', 'checkRole:Admin,Peserta,Pengajar']], function(){
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth', 'checkRole:Pengajar']], function(){
    Route::get('/pengajar/{id}/profil', [PengajarController::class, 'profil']);
    Route::post('/pengajar/{id}/updateprofil', [PengajarController::class, 'updateprofil']);
});

Route::group(['middleware' => ['auth', 'checkRole:Peserta']], function(){
    Route::get('/peserta/{id}/hasil-studi', [PesertaController::class, 'nilai']);    
});


