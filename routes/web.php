<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dang-nhap',[HomeController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/xu-ly-dang-nhap',[HomeController::class, 'xuLyDangNhap'])->name('xu-ly-dang-nhap')->middleware('guest');
Route::get('/dang-xuat',[HomeController::class, 'xuLyDangXuat'])->name('xu-ly-dang-xuat')->middleware('auth');
Route::get('/xem-thong-tin',[HomeController::class, 'xemThongTin'])->name('xem-thong-tin')->middleware('auth');
Route::post('/xu-ly-doi-thong-tin',[HomeController::class, 'xuLySuaThongTin'])->name('xu-ly-doi-thong-tin')->middleware('auth');
Route::get('/doi-mat-khau',[HomeController::class, 'doiMatKhau'])->name('doi-mat-khau')->middleware('auth');
Route::post('/xu-ly-doi-mat-khau',[HomeController::class, 'xuLyDoiMatKhau'])->name('xu-ly-doi-mat-khau')->middleware('auth');
Route::get('/',[HomeController::class, 'trangChu'])->name('trang-chu')->middleware('auth');
Route::get('/chi-tiet-sach/{id}',[HomeController::class, 'chiTietSach'])->name('chi-tiet-sach')->middleware('auth');
Route::get('/chinh-sua-sach/{id}', [AdminController::class, 'suaSach'])->name('chinh-sua-sach')->middleware('auth');
Route::get('/hien-thi-muon-sach/{id}', [HomeController::class, 'showMuonSach'])->name('hien-thi-muon-sach')->middleware('auth');
Route::post('/xu-ly-muon-sach', [HomeController::class, 'handleMuonSach'])->name('xu-ly-muon-sach')->middleware('auth');

Route::prefix('/admin')->group(function(){
    Route::get('/hien-thi-them', [AdminController::class, 'index'])->name('hien-thi-them')->middleware('auth');
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
    Route::post('/sua-tac-gia/{id}', [AdminController::class, 'suaTacgia'])->name('sua-tac-gia')->middleware('auth');
    Route::post('/sua-nha-xuat-ban/{id}', [AdminController::class, 'suaNhaXuatBan'])->name('sua-nha-xuat-ban')->middleware('auth');
    Route::post('/sua-the-loai/{id}', [AdminController::class, 'suaTheLoai'])->name('sua-the-loai')->middleware('auth');
    Route::post('/sua-khu-vuc/{id}', [AdminController::class, 'suaKhuVuc'])->name('sua-khu-vuc')->middleware('auth');
    Route::post('/sua-tu-sach/{id}', [AdminController::class, 'suaTuSach'])->name('sua-tu-sach')->middleware('auth');
    Route::post('/them-sach-vao-thu-vien', [AdminController::class, 'themSachThuVien'])->name('xu-ly-them-sach')->middleware('auth');
    Route::get('/tim-kiem', [AdminController::class, 'dsTimKiem'])->name('tim-kiem')->middleware('auth');
    Route::get('/tao-tai-khoan',[AdminController::class, 'taoTaiKhoan'])->name('tao-tai-khoan')->middleware('auth');
    Route::post('/xu-ly-tao-tai-khoan',[AdminController::class, 'xuLytaoTaiKhoan'])->name('xu-ly-tao-tai-khoan')->middleware('auth');
    Route::get('/quan-ly-tai-khoan',[AdminController::class, 'quanLyTaiKhoan'])->name('quan-ly-tai-khoan')->middleware('auth');
    Route::get('/tim-kiem-theo-tac-gia',[AdminController::class, 'timKiemTheoTacGia'])->name('tim-kiem-theo-tac-gia')->middleware('auth');
    Route::get('/cap-the-doc-gia',[AdminController::class, 'showCapThe'])->name('cap-the-doc-gia')->middleware('auth');
    Route::post('/xu-ly-cap-the',[AdminController::class, 'handleCapThe'])->name('xu-ly-cap-the')->middleware('auth');
});

Route::get('qrcode', function () {
    // return QrCode::size(300)->generate('A basic example of QR code!');
    return QrCode::size(300)->backgroundColor(255,55,0)->phoneNumber('0384269150');
});
