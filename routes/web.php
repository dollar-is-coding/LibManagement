<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dang-nhap',[HomeController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/xu-ly-dang-nhap',[HomeController::class, 'xuLyDangNhap'])->name('xu-ly-dang-nhap')->middleware('guest');
Route::get('/dang-ky',[HomeController::class, 'dangKy'])->name('dang-ky')->middleware('auth');
Route::post('/xu-ly-dang-ky',[HomeController::class, 'xuLyDangKy'])->name('xu-ly-dang-ky')->middleware('auth');

Route::get('/hien-thi-them', [AdminController::class, 'index'])->name('hien-thi-them')->middleware('auth');
// Route::get('/lay-tu-sach-theo-khu-vuc', [AdminController::class, 'laytuSachTheoID'])->name('lay-tu-sach-theo-khu-vuc')->middleware('auth');
Route::post('/them-tac-gia', [AdminController::class, 'themTacGia'])->name('them-tac-gia')->middleware('auth');
Route::post('/them-nha-xuat-ban', [AdminController::class, 'themNhaXuatBan'])->name('them-nha-xuat-ban')->middleware('auth');
Route::post('/them-the-loai', [AdminController::class, 'themTheLoai'])->name('them-the-loai')->middleware('auth');
Route::post('/them-khu-vuc', [AdminController::class, 'themKhuVuc'])->name('them-khu-vuc')->middleware('auth');
Route::post('/them-tu-sach', [AdminController::class, 'themTuSach'])->name('them-tu-sach')->middleware('auth');
Route::get('/xoa-tac-gia/{id}', [AdminController::class, 'xoaTacGia'])->name('xoa-tac-gia')->middleware('auth');
Route::get('/xoa-nha-xuat-ban/{id}', [AdminController::class, 'xoaNhaXuatBan'])->name('xoa-nha-xuat-ban')->middleware('auth');
Route::get('/xoa-the-loai/{id}', [AdminController::class, 'xoaTheLoai'])->name('xoa-the-loai')->middleware('auth');
Route::get('/xoa-khu-vuc/{id}', [AdminController::class, 'xoaKhuVuc'])->name('xoa-khu-vuc')->middleware('auth');
Route::get('/xoa-tu-sach/{id}', [AdminController::class, 'xoaTuSach'])->name('xoa-tu-sach')->middleware('auth');
Route::get('/danh-sach-cac-cuon-sach', [AdminController::class, 'dsSach'])->name('hien-thi-sach')->middleware('auth');
Route::get('/lay-danh-sach-khu-vuc', [AdminController::class, 'layKhuVuc'])->name('lay-khu-vuc')->middleware('auth');

// Route::get('/hien-tac-gia/{id}', [AdminController::class, 'hienTacGia'])->name('hien-tac-gia')->middleware('auth');
Route::post('/sua-tac-gia/{id}', [AdminController::class, 'suaTacgia'])->name('sua-tac-gia')->middleware('auth');
Route::post('/sua-nha-xuat-ban/{id}', [AdminController::class, 'suaNhaXuatBan'])->name('sua-nha-xuat-ban')->middleware('auth');
Route::post('/sua-the-loai/{id}', [AdminController::class, 'suaTheLoai'])->name('sua-the-loai')->middleware('auth');
Route::post('/sua-khu-vuc/{id}', [AdminController::class, 'suaKhuVuc'])->name('sua-khu-vuc')->middleware('auth');
Route::post('/sua-tu-sach/{id}', [AdminController::class, 'suaTuSach'])->name('sua-tu-sach')->middleware('auth');
Route::post('/them-sach', [AdminController::class, 'themSach'])->name('them-sach')->middleware('auth');