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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-pengajar', function () {
    return view('add-pengajar');
});

Route::get('/add-kelas', function () {
    return view('add-kelas');
});

Route::get('/add-mapel', function () {
    return view('add-mapel');
});

Route::get('/data-pengajar', function () {
    return view('data-pengajar');
});

Route::get('/data-kelas', function () {
    return view('data-kelas');
});

Route::get('/data-mapel', function () {
    return view('data-mapel');
});