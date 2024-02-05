<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.index');
});

Route::get('/peserta', function () {
    return view('admin.peserta.index');
});

Route::get('/sertif', function () {
    return view('admin.certificate.index');
});
