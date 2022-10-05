<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\KelasController;

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

// admin
Route::get('/', function () {
    return view('admin.data-jadwal');
});

Route::get('/add-jadwal', function () {
    return view('admin.add-jadwal');
});

Route::get('/add-pengajar', function () {
    return view('admin.add-pengajar');
});

Route::get('/add-kelas', function () {
    return view('admin.add-kelas');
});

Route::get('/add-mapel', function () {
    return view('admin.add-mapel');
});

Route::get('/data-pengajar', function () {
    return view('admin.data-pengajar');
});

Route::get('/data-kelas', [KelasController::class, 'index']);

Route::get('/data-mapel', function () {
    return view('admin.data-mapel');
});

Route::get('/perubahan-jadwal', function () {
    return view('admin.perubahan-jadwal');
});

// user
Route::get('/main', function () {
    return view('user.data-jadwal');
});

Route::get('/user-add-jadwal', function () {
    return view('user.add-jadwal');
});

// login
Route::get('/login', function () {
    return view('login.login');
});

// profil
Route::get('/profil', function () {
    return view('user.profil');
});