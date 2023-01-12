<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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
    return view('template/index');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    /*Mapel*/
    Route::get('/view_mapel',[AdminController::class,'view_mapel']);
    Route::post('/tambah_mapel_proses',[AdminController::class,'tambah_mapel_proses']);
    Route::get('/detail_mapel',[AdminController::class,'detail_mapel']);
    Route::post('/tambah_detail_mapel_proses',[AdminController::class,'tambah_detail_mapel_proses']);
    Route::get('/jadwal_mapel',[AdminController::class,'jadwal_mapel']);
    Route::post('/tambah_jadwal_proses',[AdminController::class,'tambah_jadwal_proses']);
    

    /*Materi*/
    Route::get('/materi',[AdminController::class,'materi']);
    Route::post('/tambah_materi_proses',[AdminController::class,'tambah_materi_proses']);
    Route::get('/ruang_kelas',[AdminController::class,'ruang_kelas']);
    Route::post('/tambah_ruang_proses',[AdminController::class,'tambah_ruang_proses']);
    Route::get('/program_belajar',[AdminController::class,'program_belajar']);
    Route::get('/nilai',[AdminController::class,'nilai_skd']);

    /*User Management*/
    Route::get('/user_management',[AdminController::class,'user_management']);

    /*Absensi*/
    Route::get('/absensi',[AdminController::class,'absensi']);
    Route::get('/siswa',[AdminController::class,'siswa']);
    Route::post('/tambah_siswa_proses',[AdminController::class,'tambah_siswa_proses']);
    Route::get('/tentor',[AdminController::class,'tentor']);
    Route::post('/tambah_tentor_proses',[AdminController::class,'tambah_tentor_proses']);
    
});




Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login',[LoginController::class, 'process_login'])->name('login');
Route::get('/register','LoginController@show_signup_form')->name('register');
Route::post('/register','LoginController@process_signup');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');