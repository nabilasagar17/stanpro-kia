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
    return view('layouts/index');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/view_mapel',[AdminController::class,'view_mapel']);
    Route::get('/user_management',[AdminController::class,'user_management']);
    Route::get('/detail_mapel',[AdminController::class,'detail_mapel']);
    Route::get('/jadwal_mapel',[AdminController::class,'jadwal_mapel']);
    Route::get('/absensi',[AdminController::class,'absensi']);
    Route::get('/materi',[AdminController::class,'materi']);
});




Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
Route::post('/login','LoginController@process_login')->name('login');
Route::get('/register','LoginController@show_signup_form')->name('register');
Route::post('/register','LoginController@process_signup');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');