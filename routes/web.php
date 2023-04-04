<?php

use App\Http\Controllers\Admincontroller;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/form', [Admincontroller::class, 'index'])->name('index');

Route::post('/themtacgia', [Admincontroller::class, 'themtacgia'])->name('themtacgia');
Route::get('/xoatacgia/{id}', [Admincontroller::class, 'xoatacgia'])->name('xoatacgia');

Route::post('/themnhaxuatban', [Admincontroller::class, 'themnhaxuatban'])->name('themnhaxuatban');
Route::get('/xoanxb/{id}', [Admincontroller::class, 'xoanxb'])->name('xoanxb');


Route::post('/themtheloai', [Admincontroller::class, 'themtheloai'])->name('themtheloai');
Route::get('/xoatheloai/{id}', [Admincontroller::class, 'xoatheloai'])->name('xoatheloai');


Route::post('/themkhuvuc', [Admincontroller::class, 'themkhuvuc'])->name('themkhuvuc');
Route::get('/xoakhuvuc/{id}', [Admincontroller::class, 'xoakhuvuc'])->name('xoakhuvuc');
