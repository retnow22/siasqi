<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KafalahController;

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
Route::get('/registrasi', [RegistrasiController::class, 'registrasi']);
Route::post('/postregistrasi', [RegistrasiController::class, 'postregistrasi']);

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
    Route::post('/nilai/addpeserta', [NilaiController::class, 'addpeserta']);
    Route::get('/nilai/{id}/deletepeserta', [NilaiController::class, 'deletepeserta']);  
    Route::get('/lihatakun', [RegistrasiController::class, 'lihatakun']);
    Route::post('/tambahakun', [RegistrasiController::class, 'tambahakun']);
    Route::get('/akun/{id}/edit', [RegistrasiController::class, 'editakun']);
    Route::post('/akun/{id}/update', [RegistrasiController::class, 'updateakun']);
    Route::get('/akun/{id}/delete', [RegistrasiController::class, 'deleteakun']);
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::post('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/{id}/update', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/{id}/delete', [PembayaranController::class, 'delete']);
    Route::get('/laporan-kbm', [PresensiController::class, 'index']);
    Route::get('/informasi', [InformasiController::class, 'index']);
    Route::post('/informasi/create', [InformasiController::class, 'create']);
    Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit']);
    Route::post('/informasi/{id}/update', [InformasiController::class, 'update']);
    Route::get('/informasi/{id}/delete', [InformasiController::class, 'delete']);
    Route::get('/kafalah', [KafalahController::class, 'index']);
    Route::post('/kafalah/create', [KafalahController::class, 'create']);
    Route::get('/kafalah/{id}/edit', [KafalahController::class, 'edit']);
    Route::post('/kafalah/{id}/update', [KafalahController::class, 'update']);
    Route::get('/kafalah/{id}/delete', [KafalahController::class, 'delete']);    
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth', 'checkRole:Admin,Pengajar']], function(){
    Route::get('/pengajar/{id}/lihatpeserta', [PengajarController::class, 'lihatpeserta']);   
});

Route::group(['middleware' => ['auth', 'checkRole:Pengajar']], function(){
    Route::get('/pengajar/{id}/profil', [PengajarController::class, 'profil']);
    Route::post('/pengajar/{id}/updateprofil', [PengajarController::class, 'updateprofil']);
    Route::get('/pengajar/{id}/jadwal', [PengajarController::class, 'jadwal']);
    Route::get('/pengajar/{id}/inputnilai', [PengajarController::class, 'inputnilai']);
    Route::post('/pengajar/{id}/updatenilai', [PengajarController::class, 'updatenilai']);
    Route::get('/presensi/{id}/input-laporan', [PresensiController::class, 'inputlaporan']);
    Route::post('/presensi/create', [PresensiController::class, 'create']);
    Route::get('/presensi/{id}/edit', [PresensiController::class, 'edit']);
    Route::post('/presensi/{id}/update', [PresensiController::class, 'update']);
    Route::get('/presensi/{id}/delete', [PresensiController::class, 'delete']);
    Route::get('/pengajar/{id}/lihatpresensi', [PengajarController::class, 'lihatPresensi']);
    Route::get('/pengajar/{id}/inputpresensi', [PengajarController::class, 'inputPresensi']);
    Route::post('/pengajar/{id}/updatepresensi', [PengajarController::class, 'updatePresensi']);
    
});

Route::group(['middleware' => ['auth', 'checkRole:Peserta']], function(){
    Route::get('/peserta/{id}/hasil-studi', [PesertaController::class, 'nilai']);    
    Route::get('/peserta/{id}/profil', [PesertaController::class, 'profil']);
    Route::post('/peserta/{id}/updateprofil', [PesertaController::class, 'updateprofil']);
    Route::get('/peserta/{id}/rencana-studi', [PesertaController::class, 'rencanastudi']);
    Route::get('/peserta/{id}/daftar-studi', [PesertaController::class, 'daftarstudi']);
    Route::get('/peserta/{id}/pilihmatpel', [PesertaController::class, 'pilihmatpel']); 
    Route::get('/peserta/{id}/pembayaran', [PesertaController::class, 'pembayaran']);
    Route::get('/peserta/{id}/presensi', [PesertaController::class, 'presensi']);
    Route::get('/peserta/{id}/cetak-nilai', [PesertaController::class, 'cetaknilai']);
       
});


