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
Route::get('/form', [Admincontroller::class, 'index'])->name('index');

Route::post('/themtacgia', [Admincontroller::class, 'themTacGia'])->name('themtacgia');
Route::get('/xoatacgia/{id}', [Admincontroller::class, 'xoaTacGia'])->name('xoatacgia');

Route::post('/themnhaxuatban', [Admincontroller::class, 'themNhaXuatBan'])->name('themnhaxuatban');
Route::get('/xoanxb/{id}', [Admincontroller::class, 'xoaNhaXuatBan'])->name('xoanxb');


Route::post('/themtheloai', [Admincontroller::class, 'themTheLoai'])->name('themtheloai');
Route::get('/xoatheloai/{id}', [Admincontroller::class, 'xoaTheLoai'])->name('xoatheloai');


Route::post('/themkhuvuc', [Admincontroller::class, 'themKhuVuc'])->name('themkhuvuc');
Route::get('/xoakhuvuc/{id}', [Admincontroller::class, 'xoaKhuVuc'])->name('xoakhuvuc');
