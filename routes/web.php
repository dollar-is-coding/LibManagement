<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QRcode;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode as qrcodea;

// DASHBOARD
Route::get('/', [HomeController::class, 'trangChu'])->name('trang-chu')->middleware('auth');

// ĐĂNG NHẬP & ĐĂNG XUẤT
Route::get('/dang-nhap', [HomeController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/xu-ly-dang-nhap', [HomeController::class, 'xuLyDangNhap'])->name('xu-ly-dang-nhap')->middleware('guest');
Route::get('/dang-xuat', [HomeController::class, 'xuLyDangXuat'])->name('xu-ly-dang-xuat')->middleware('auth');

// Nhập mã xác minh, đặt lại mật khẩu
Route::get('/dat-lai-mat-khau', [HomeController::class, 'datLaiMatKhau'])->name('dat-lai-mat-khau');
Route::post('/dat-lai-mat-khau', [HomeController::class, 'xuLyDatLaiMatKhau'])->name('xu-ly-dat-lai-mat-khau');
Route::get('/xac-minh-quen-mat-khau', [HomeController::class, 'hienThiNhapMailQuenMatKhau'])->name('nhap-mail-quen-mat-khau');
Route::post('/xac-minh-quen-mat-khau', [HomeController::class, 'xuLyNhapMailQuenMatKhau'])->name('xu-ly-nhap-mail-quen-mat-khau');
Route::get('/xac-minh', [HomeController::class, 'nhapMaXacMinh'])->name('nhap-ma-xac-minh');
Route::post('/xac-minh', [HomeController::class, 'XuLyNhapMaXacMinh']);



// Route::middleware('guest')->group(function () {
Route::middleware('admin')->group(function () {
//quen mat khau
Route::get('/xac-minh-quen-mat-khau-nguoi-dung', [HomeController::class, 'hienNhapXacThucQuenMatKhau'])->name('nhap-ma-quen-mat-khau');
Route::post('/xac-minh-quen-mat-khau-nguoi-dung', [HomeController::class, 'xuLyGuiMaQuenMatKhau'])->name('xu-ly-gui-ma-quen-mat-khau');

Route::get('/doi-mat-khau-moi', [HomeController::class, 'hienDoiMatKhau'])->name('hien-doi-mat-khau-moi');
Route::post('/doi-mat-khau-moi', [HomeController::class, 'xuLyNhapMaXacThucQuenMatKhau'])->name('nhap-ma-xac-thuc-quen-mat-khau');
// DASHBOARD
Route::get('/', [HomeController::class, 'trangChu'])->name('trang-chu')->middleware('auth');
// XEM, TÌM KIẾM & CHI TIẾT SÁCH
Route::get('/danh-sach-cac-cuon-sach', [AdminController::class, 'dsSach'])->name('hien-thi-sach')->middleware('auth');
Route::get('/chi-tiet-sach/{id}', [AdminController::class, 'chiTietSach'])->name('chi-tiet-sach')->middleware('auth');
Route::get('/tim-kiem-theo-tac-gia',[AdminController::class, 'timKiemTheoTacGia'])->name('tim-kiem-theo-tac-gia')->middleware('auth');
// THÊM MỚI SÁCH CÁC LOẠI
Route::get('/hien-thi-them-sach', [AdminController::class, 'showThemSach'])->name('hien-thi-them-sach')->middleware('auth');
Route::post('/them-sach-vao-thu-vien', [AdminController::class, 'themSachThuVien'])->name('xu-ly-them-sach')->middleware('auth');
Route::post('/them-tac-gia', [AdminController::class, 'themTacGia'])->name('them-tac-gia')->middleware('auth');
Route::post('/them-nha-xuat-ban', [AdminController::class, 'themNhaXuatBan'])->name('them-nha-xuat-ban')->middleware('auth');
Route::post('/them-the-loai', [AdminController::class, 'themTheLoai'])->name('them-the-loai')->middleware('auth');
Route::post('/them-khu-vuc', [AdminController::class, 'themKhuVuc'])->name('them-khu-vuc')->middleware('auth');
Route::post('/them-tu-sach', [AdminController::class, 'themTuSach'])->name('them-tu-sach')->middleware('auth');

//import SÁCH
Route::post('/import-sach-excel', [AdminController::class, 'import_csv'])->name('import-sach')->middleware('auth');
//export
Route::post('/export-excel', [AdminController::class, 'export'])->name('export')->middleware('auth');
// CHỈNH SỬA SÁCH CÁC LOẠI
Route::post('/sua-tac-gia/{id}', [AdminController::class, 'suaTacgia'])->name('sua-tac-gia')->middleware('auth');
Route::post('/sua-nha-xuat-ban/{id}', [AdminController::class, 'suaNhaXuatBan'])->name('sua-nha-xuat-ban')->middleware('auth');
Route::post('/sua-the-loai/{id}', [AdminController::class, 'suaTheLoai'])->name('sua-the-loai')->middleware('auth');
Route::post('/sua-khu-vuc/{id}', [AdminController::class, 'suaKhuVuc'])->name('sua-khu-vuc')->middleware('auth');
Route::post('/sua-tu-sach/{id}', [AdminController::class, 'suaTuSach'])->name('sua-tu-sach')->middleware('auth');
Route::get('/chinh-sua-sach/{id}', [AdminController::class, 'suaSach'])->name('chinh-sua-sach')->middleware('auth');
Route::post('/chinh-sua-sach/{id}/{id_tv}', [AdminController::class, 'xuLySuaSach'])->name('xu-ly-sua-sach')->middleware('auth');

// XÓA SÁCH CÁC LOẠI
Route::get('/xoa-nha-xuat-ban/{id}', [AdminController::class, 'xoaNhaXuatBan'])->name('xoa-nha-xuat-ban')->middleware('auth');
Route::get('/xoa-the-loai/{id}', [AdminController::class, 'xoaTheLoai'])->name('xoa-the-loai')->middleware('auth');
Route::get('/xoa-khu-vuc/{id}', [AdminController::class, 'xoaKhuVuc'])->name('xoa-khu-vuc')->middleware('auth');
Route::get('/xoa-tu-sach/{id}', [AdminController::class, 'xoaTuSach'])->name('xoa-tu-sach')->middleware('auth');
Route::get('/xoa-tac-gia/{id}', [AdminController::class, 'xoaTacGia'])->name('xoa-tac-gia')->middleware('auth');

// CẤP THẺ, XEM, TÌM KIẾM & CHI TIẾT ĐỘC GIẢ
Route::get('/cap-the-doc-gia',[AdminController::class, 'showCapThe'])->name('cap-the-doc-gia')->middleware('auth');
Route::post('/xu-ly-cap-the',[AdminController::class, 'handleCapThe'])->name('xu-ly-cap-the')->middleware('auth');
Route::get('/hien-thi-doc-gia',[AdminController::class, 'showDocGiaList'])->name('hien-thi-doc-gia')->middleware('auth');
Route::get('/tim-kiem-doc-gia',[AdminController::class, 'HandleDocGiaSearch'])->name('tim-kiem-doc-gia')->middleware('auth');
Route::get('/hien-thi-chi-tiet-doc-gia/{id}',[AdminController::class, 'showChiTietDocGia'])->name('hien-thi-chi-tiet-doc-gia')->middleware('auth');
Route::get('/tra-sach/{id}',[AdminController::class, 'return'])->name('tra-sach')->middleware('auth');

// MƯỢN SÁCH
Route::get('/hien-thi-muon-sach-giao-khoa', [HomeController::class, 'showMuonSGK'])->name('hien-thi-muon-sach-giao-khoa')->middleware('auth');
Route::post('/xu-ly-muon-sach-giao-khoa', [HomeController::class, 'handleMuonSGK'])->name('xu-ly-muon-sach-giao-khoa')->middleware('auth');
Route::get('/hien-thi-muon-sach-khac', [HomeController::class, 'showMuonSachKhac'])->name('hien-thi-muon-sach-khac')->middleware('auth');
Route::post('/xu-ly-muon-sach-khac', [HomeController::class, 'handleMuonSachKhac'])->name('xu-ly-muon-sach-khac')->middleware('auth');

// QUYỀN ADMIN
Route::get('/tao-tai-khoan',[AdminController::class, 'capTaiKhoan'])->name('tao-tai-khoan')->middleware('auth');
Route::post('/xu-ly-tao-tai-khoan',[AdminController::class, 'xuLytaoTaiKhoan'])->name('xu-ly-tao-tai-khoan')->middleware('auth');
Route::get('/quan-ly-tai-khoan',[AdminController::class, 'quanLyTaiKhoan'])->name('quan-ly-tai-khoan')->middleware('auth');

// CÁ NHÂN
Route::get('/xem-thong-tin', [HomeController::class, 'xemThongTin'])->name('xem-thong-tin')->middleware('auth');
Route::post('/xu-ly-doi-thong-tin', [HomeController::class, 'xuLySuaThongTin'])->name('xu-ly-doi-thong-tin')->middleware('auth');
Route::get('/doi-mat-khau', [HomeController::class, 'doiMatKhau'])->name('doi-mat-khau')->middleware('auth');
Route::post('/xu-ly-doi-mat-khau', [HomeController::class, 'xuLyDoiMatKhau'])->name('xu-ly-doi-mat-khau')->middleware('auth');
Route::get('/xac-minh-doi-email', [HomeController::class, 'xacMinhMail'])->name('xac-minh-email')->middleware('auth');
Route::post('/xac-minh-doi-email', [HomeController::class, 'xulyXacMinhEmail'])->name('xac-minh-gui-mail')->middleware('auth');
Route::get('/doi-email', [HomeController:: class, 'doiEmail'])->name('doi-email')->middleware('auth');
Route::post('/doi-email', [HomeController::class, 'xuLyDoiEmail'])->middleware('auth');

// Tin tức
Route::get('/them-tin-tuc', [AdminController::class, 'themTinTuc'])->name('them-tin-tuc')->middleware('auth');
Route::post('/them-tin-tuc', [AdminController::class, 'xuLyThemTinTuc'])->name('xu-ly-them-tin-tuc')->middleware('auth');
Route::get('/quan-ly-tin-tuc', [AdminController::class, 'dsTinTuc'])->name('danh-sach-tin-tuc')->middleware('auth');
Route::get('/xem-chi-tiet-tin-tuc/{id}', [AdminController::class, 'xemChiTietTinTuc'])->name('chi-tiet-tin-tuc')->middleware('auth');
Route::get('/xoa-tin-tuc/{id}', [AdminController::class, 'xoaTinTuc'])->name('xoa-tin-tuc')->middleware('auth');
Route::get('/sua-tin-tuc/{id}', [AdminController::class, 'suaTinTuc'])->name('sua-tin-tuc')->middleware('auth');
Route::post('/sua-tin-tuc/{id}', [AdminController::class, 'xuLySuaTinTuc'])->name('xu-ly-sua-tin-tuc')->middleware('auth');

// Mượn sách
Route::get('/tim-kiem-duyet-sach', [AdminController::class, 'timKiemDocGiaDuyetSach'])->name('tim-kiem-duyet-sach')->middleware('auth');
Route::get('/tim-kiem-dang-muon-sach', [AdminController::class, 'timKiemDocGiaDangMuonSach'])->name('tim-kiem-dang-muon-sach')->middleware('auth');
Route::get('/tim-kiem-da-muon-sach', [AdminController::class, 'timKiemDocGiaDaMuonSach'])->name('tim-kiem-da-muon-sach')->middleware('auth');


Route::get('/muon-sach', [AdminController::class, 'duyetMuonSach'])->name('phe-duyet-muon-sach')->middleware('auth');
Route::get('/muon-sach/{id}', [AdminController::class, 'xuLyMuonSach'])->name('xu-ly-muon-sach')->middleware('auth');

Route::get('/dang-muon-sach', [AdminController::class, 'dangMuonSach'])->name('dang-muon-sach')->middleware('auth');
Route::post('/dang-muon-sach/{id}', [AdminController::class, 'xuLyTraSach'])->name('xu-ly-tra-sach')->middleware('auth');

Route::get('/da-muon-sach', [AdminController::class, 'daMuonSach'])->name('da-muon-sach')->middleware('auth');


Route::get('/chi-tiet-phieu/{id}', [AdminController::class, 'chiTietPhieu'])->name('chi-tiet-phieu')->middleware('auth');

Route::get('/thanh-toan-sach/{id}', [AdminController::class, 'thanhToanSach'])->name('thanh-toan-sach')->middleware('auth');


Route::get('/chi-tiet-tai-khoan/{id}', [AdminController::class, 'chiTietTaiKhoan'])->name('chi-tiet-tai-khoan')->middleware('auth');
Route::post('/thay-doi-thong-tin-tai-khoan/{id}', [AdminController::class, 'xuLyDoiThongTinNguoiDung'])->name('xu-ly-doi-thong-tin-tai-khoan')->middleware('auth');

Route::post('/thanh-toan-sach', [AdminController::class, 'handleThanhToan'])->name('thanh-toan')->middleware('auth');


Route::get('/bao-cao-sach-hu', [AdminController::class, 'sachHu'])->name('bao-cao-sach-hu')->middleware('auth');
Route::post('/xu-ly-bo-sach-vao-kho', [AdminController::class, 'xuLyBoSachVaoKho'])->name('xu-ly-bo-sach-vao-kho')->middleware('auth');

Route::get('/quan-ly-kho-sach', [AdminController::class, 'quanLyKhoSach'])->name('quan-ly-kho-sach')->middleware('auth');

Route::get('/quan-ly-lien-he', [AdminController::class, 'quanLyLienHe'])->name('quan-ly-lien-he')->middleware('auth');
Route::post('/quan-ly-lien-he/{id}', [AdminController::class, 'xuLyDangChuY'])->name('xu-ly-chu-y')->middleware('auth');

Route::get('/xoa-lien-he/{id}', [AdminController::class, 'xoaLienHe'])->name('xoa-lien-he')->middleware('auth');
});
Route::middleware('user')->group(function () {
    Route::get('/nguoi-dung',function(){
        return view('client.dang_nhap');
    });
    Route::get('/email',function(){
        return view('client.email_xac_thuc');
    });
    Route::get('/xac-thuc',function(){
        return view('client.xac_thuc');
    });
    Route::get('/mat-khau-moi',function(){
        return view('client.mat_khau_moi');
    });
    Route::get('/trang-chu', [ClientController::class, 'index'])->name('trang-chu-client');
    Route::get('/the-loai-sach', [ClientController::class, 'danhMucSach'])->name('the-loai-sach');
    Route::get('/thong-tin-sach', [ClientController::class, 'chiTietSach'])->name('thong-tin-sach');
    Route::get('/thang-nay-moi-nguoi-doc-gi', [ClientController::class, 'thangNayDocGi'])->name('thang-nay-doc-gi');
    Route::get('/tim-kiem', [ClientController::class, 'timKiem'])->name('tim-kiem');
    Route::get('/them-sach-vao-gio', [ClientController::class, 'themSachVaoGio'])->name('them-sach-vao-gio');
    Route::get('/loai-khoi-gio-sach', [ClientController::class, 'loaiKhoiGioSach'])->name('loai-khoi-gio-sach')->middleware('auth');
    Route::get('/gio-sach', [ClientController::class, 'showGioSach'])->name('hien-thi-gio-sach')->middleware('auth');
    Route::post('/muon-sach', [ClientController::class, 'handleMuonSach'])->name('muon-sach')->middleware('auth');
    Route::get('/huy-phieu-muon', [ClientController::class, 'cancelPhieuMuon'])->name('huy-phieu-muon')->middleware('auth');
    Route::get('/lien-he', [ClientController::class, 'showLienHe'])->name('lien-he')->middleware('auth');
    Route::get('/yeu-thich', [ClientController::class, 'showLove'])->name('yeu-thich')->middleware('auth');
    Route::post('/binh-luan', [ClientController::class, 'handleBinhLuan'])->name('binh-luan')->middleware('auth');
    Route::get('/sach-theo-chu-de', [ClientController::class, 'sachTheoChuDe'])->name('sach-theo-chu-de')->middleware('auth');
    Route::get('/tin-tuc', [ClientController::class, 'showTinTuc'])->name('tin-tuc')->middleware('auth');
    Route::post('/cap-nhat-thong-tin', [ClientController::class, 'handleCapNhatThongTin'])->name('cap-nhat-thong-tin')->middleware('auth');
    Route::get('/tai-khoan-cua-toi', [ClientController::class, 'showCaNhan'])->name('tai-khoan-cua-toi')->middleware('auth');
    Route::get('/xu-ly-gio-sach', [ClientController::class, 'handleGioSach'])->name('xu-ly-gio-sach')->middleware('auth');
    Route::post('/gui-lien-he', [ClientController::class, 'sendLienHe'])->name('gui-lien-he')->middleware('auth');
});
