<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RegisterController;

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

Route::group(['middleware' => 'auth'], function () {
    // admin
    Route::get('/', [JadwalController::class, 'index']);

    //pegawai
    Route::get('/data-pegawai', [UserController::class, 'index']);
    Route::get('data-pegawai.{user:username}', [UserController::class, 'show']);
    Route::get('/add-pegawai', [UserController::class, 'create']);
    Route::post('/add-pegawai', [UserController::class, 'store']);
    Route::get('{pegawai}.editP', [UserController::class, 'edit']);
    Route::patch('data-pegawai.{pegawai}', [UserController::class, 'update']);
    Route::delete('data-pegawai.{pegawai}', [UserController::class, 'destroy']);

    //kegiatan
    Route::get('/data-kegiatan', [KegiatanController::class, 'index']);
    Route::get('data-kegiatan.{kegiatan:kegiatan_id}', [KegiatanController::class, 'show']);
    Route::get('/add-kegiatan', [KegiatanController::class, 'create']);
    Route::post('/add-kegiatan', [KegiatanController::class, 'store']);
    Route::get('{kegiatan}.editK', [KegiatanController::class, 'edit']);
    Route::patch('data-kegiatan.{kegiatan}', [KegiatanController::class, 'update']);
    Route::delete('data-kegiatan.{kegiatan}', [KegiatanController::class, 'destroy']);

    //jadwal
    
    Route::get('/add-jadwal', [JadwalController::class, 'create']);
    Route::get('data-jadwal.{jadwal:kegiatan_id}', [JadwalController::class, 'show']);
    Route::post('/add-jadwal', [JadwalController::class, 'store']);
    Route::get('{jadwal}.edit', [JadwalController::class, 'edit']);
    Route::patch('data-jadwal.{jadwal}', [JadwalController::class, 'update']);
    Route::delete('data-jadwal.{jadwal}', [JadwalController::class, 'destroy']);
});

// Route::get('/add-jadwal/checkJP', [JadwalController::class, 'checkJP']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// profil
Route::get('/profil', function () {
    return view('user.profil');
});

Route::get('/perubahan-jadwal', function () {
    return view('dashboard.rubah-jadwal.perubahan-jadwal');
});

// user
Route::get('/main', function () {
    return view('user.data-jadwal');
});