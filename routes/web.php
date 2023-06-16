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
// DASHBOARD
Route::get('/', [HomeController::class, 'trangChu'])->name('trang-chu')->middleware('auth');
// XEM, TÌM KIẾM & CHI TIẾT SÁCH
Route::get('/danh-sach-cac-cuon-sach', [AdminController::class, 'dsSach'])->name('hien-thi-sach')->middleware('auth');
Route::get('/tim-kiem', [AdminController::class, 'dsTimKiem'])->name('tim-kiem')->middleware('auth');
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
// CHỈNH SỬA SÁCH CÁC LOẠI
Route::post('/sua-tac-gia/{id}', [AdminController::class, 'suaTacgia'])->name('sua-tac-gia')->middleware('auth');
Route::post('/sua-nha-xuat-ban/{id}', [AdminController::class, 'suaNhaXuatBan'])->name('sua-nha-xuat-ban')->middleware('auth');
Route::post('/sua-the-loai/{id}', [AdminController::class, 'suaTheLoai'])->name('sua-the-loai')->middleware('auth');
Route::post('/sua-khu-vuc/{id}', [AdminController::class, 'suaKhuVuc'])->name('sua-khu-vuc')->middleware('auth');
Route::post('/sua-tu-sach/{id}', [AdminController::class, 'suaTuSach'])->name('sua-tu-sach')->middleware('auth');
Route::get('/chinh-sua-sach/{id}/{id_tv}', [AdminController::class, 'suaSach'])->name('chinh-sua-sach')->middleware('auth');
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
});

Route::middleware('user')->group(function() {
    Route::get('/trang-chu', [ClientController::class, 'index'])->name('trang-chu-client');
    Route::get('/danh-muc-sach', [ClientController::class, 'danhMucSach'])->name('danh-muc-sach');
    Route::get('/thong-tin-sach', [ClientController::class, 'chiTietSach'])->name('thong-tin-sach');
    Route::get('/thang-nay-moi-nguoi-doc-gi', [ClientController::class, 'thangNayDocGi'])->name('thang-nay-doc-gi');
    Route::get('/tim-kiem', [ClientController::class, 'timKiemSach'])->name('tim-kiem');
    Route::get('/them-sach-vao-gio', [ClientController::class, 'themSachVaoGio'])->name('them-sach-vao-gio');
    Route::get('/loai-khoi-gio-sach', [ClientController::class, 'loaiKhoiGioSach'])->name('loai-khoi-gio-sach')->middleware('auth');
    Route::get('/gio-sach', [ClientController::class, 'showGioSach'])->name('hien-thi-gio-sach')->middleware('auth');
    Route::post('/muon-sach', [ClientController::class, 'handleMuonSach'])->name('muon-sach')->middleware('auth');
    Route::get('/lich-su-cho-duyet', [ClientController::class, 'showLichSuChoDuyet'])->name('cho-duyet')->middleware('auth');
    Route::get('/lich-su-dang-muon', [ClientController::class, 'showLichSuDangMuon'])->name('dang-muon')->middleware('auth');
    Route::get('/huy-phieu-muon', [ClientController::class, 'cancelPhieuMuon'])->name('huy-phieu-muon')->middleware('auth');
    Route::get('/lien-he', [ClientController::class, 'showLienHe'])->name('lien-he')->middleware('auth');
    Route::get('/yeu-thich', [ClientController::class, 'showLove'])->name('yeu-thich')->middleware('auth');
    Route::get('/da-tra', [ClientController::class, 'showLichSuDaTra'])->name('da-tra')->middleware('auth');
    Route::post('/binh-luan', [ClientController::class, 'handleBinhLuan'])->name('binh-luan')->middleware('auth');
    Route::get('/sach-theo-chu-de', [ClientController::class, 'sachTheoChuDe'])->name('sach-theo-chu-de')->middleware('auth');
    Route::get('/bai-viet', [ClientController::class, 'showBaiViet'])->name('bai-viet')->middleware('auth');
    Route::get('/trang-ca-nhan', [ClientController::class, 'showTrangCaNhan'])->name('trang-ca-nhan')->middleware('auth');
});