<?php

use App\Http\Controllers\AdminController;
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
Route::get('/form', [AdminController::class, 'index'])->name('index');

Route::post('/themtacgia', [AdminController::class, 'themTacGia'])->name('themtacgia');
Route::get('/xoatacgia/{id}', [AdminController::class, 'xoaTacGia'])->name('xoatacgia');

Route::post('/themnhaxuatban', [AdminController::class, 'themNhaXuatBan'])->name('themnhaxuatban');
Route::get('/xoanxb/{id}', [AdminController::class, 'xoaNhaXuatBan'])->name('xoanxb');


Route::post('/themtheloai', [AdminController::class, 'themTheLoai'])->name('themtheloai');
Route::get('/xoatheloai/{id}', [AdminController::class, 'xoaTheLoai'])->name('xoatheloai');


Route::post('/themkhuvuc', [AdminController::class, 'themKhuVuc'])->name('themkhuvuc');
Route::get('/xoakhuvuc/{id}', [AdminController::class, 'xoaKhuVuc'])->name('xoakhuvuc');
