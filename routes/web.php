<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
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
    Route::post('/edit_mapel_proses',[AdminController::class,'edit_mapel_proses']);
    Route::get('/detail_mapel/{id}',[AdminController::class,'detail_mapel']);
    Route::post('/tambah_detail_mapel_proses/{id}',[AdminController::class,'tambah_detail_mapel_proses']);
    Route::get('/jadwal_mapel',[AdminController::class,'jadwal_mapel']);
    Route::post('/tambah_jadwal_proses',[AdminController::class,'tambah_jadwal_proses']);
    

    /*Materi*/
    Route::get('/materi',[AdminController::class,'materi']);
    Route::get('/download_materi/{nama_file}',[AdminController::class,'download_materi']);
    Route::post('/tambah_materi_proses',[AdminController::class,'tambah_materi_proses']);
    Route::get('/ruang_kelas',[AdminController::class,'ruang_kelas']);
    Route::post('/tambah_ruang_proses',[AdminController::class,'tambah_ruang_proses']);
    Route::get('/program_belajar',[AdminController::class,'program_belajar']);
    Route::get('/nilai_skd',[AdminController::class,'nilai_skd']);
    Route::get('/nilai_utbk',[AdminController::class,'nilai_utbk']);

    /*User Management*/
    Route::get('/user_management',[AdminController::class,'user_management']);

    /*Absensi*/
    Route::get('/absensi',[AdminController::class,'jadwal_mapel']);
    Route::get('/detail_absensi/{id}',[AdminController::class,'detail_absensi']);   
    Route::get('/laporan_absensi/{id}',[AdminController::class,'laporan_absensi']);  
    Route::post('/tambah_absensi_proses',[AdminController::class,'tambah_absensi_proses']);   
    Route::get('/siswa',[AdminController::class,'siswa']);
    Route::post('/tambah_siswa_proses',[AdminController::class,'tambah_siswa_proses']);
    Route::get('/tentor',[AdminController::class,'tentor']);
    Route::post('/tambah_tentor_proses',[AdminController::class,'tambah_tentor_proses']);

    //agenda
    Route::get('/agenda',[AdminController::class,'agenda']);
    Route::post('/tambah_agenda',[AdminController::class,'tambah_agenda']);

    //tentor only
    Route::get('/nilai',[AdminController::class,'nilai_skd']);

    //siswa
    Route::get('/program',[AdminController::class,'program']);

    
});
Route::prefix('siswa')->group(function () {
    Route::get('/program',[SiswaController::class,'program']);
    Route::post('/tambah_jadwal',[SiswaController::class,'tambah_jadwal']);
    Route::get('/jadwal_siswa',[SiswaController::class,'jadwal_siswa']);
    Route::post('/update_jadwal_siswa',[SiswaController::class,'update_jadwal_siswa']);
    Route::post('/update_program_siswa',[SiswaController::class,'update_program_siswa']);
});



Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login',[LoginController::class, 'process_login'])->name('login');
Route::get('/register','LoginController@show_signup_form')->name('register');
Route::post('/register','LoginController@process_signup');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');