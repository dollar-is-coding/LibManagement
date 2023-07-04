<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Exports\MultiSheetExport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCreateReaderCardMail;
use App\Mail\SendMailCreateUser;
use App\Models\TacGia;
use App\Models\NhaXuatBan;
use App\Models\TheLoai;
use App\Models\KhuVuc;
use App\Models\Sach;
use App\Models\TuSach;
use App\Models\ThuVien;
use App\Models\TruongHoc;
use App\Models\DocGia;
use App\Models\PhieuMuonSach;
use Carbon\Carbon;
use LaravelQRCode\Facades\QRCode;
use LaravelQRCode\QRCodeFactory;
use App\Http\Requests\CapTheRequest;
use App\Http\Requests\SachRequest;
use App\Http\Requests\CapTaiKhoanRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr;
use App\Models\KhoSach;
use App\Imports\ExcelImport;
use App\Models\BinhLuan;
use App\Models\LienHe;
use App\Models\NguoiDung;
use App\Models\PhieuPhat;
use App\Models\PhieuTraSach;
use App\Models\TinTuc;
use Exception;
use Illuminate\Contracts\Session\Session;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException;

use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{

    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function export()
    {
        return Excel::download(new MultiSheetExport, 'thong_ke.xlsx');
    }
    // THÊM MỚI sách - tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function showThemSach()
    {
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        $tu_sach = TuSach::all();
        return view('sach.create', ['tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc, 'tu_sach' => $tu_sach]);
    }
    public function themSachThuVien(SachRequest $request)
    {
        $tangsl = Sach::where('ten', $request->ten_sach)->where('tac_gia_id', $request->tac_gia)->where('the_loai_id', $request->the_loai)->where('nha_xuat_ban_id', $request->nha_xuat_ban)->where('nam_xuat_ban', $request->nam_xuat_ban)->first();
        $randomDateTime = Carbon::now()->addDays(random_int(0, 30));
        $randomTime = $randomDateTime->format('YmdHis');
        if (!$tangsl) {
            if ($request->hasFile('file_upload')) {
                $file = $request->file_upload;
                if ($file->isValid()) {
                    $file_name = $file->getClientOriginalName();
                    $file->move(public_path('img/books'), $file_name);
                    $request->merge(['hinh_anh' => $file_name]);
                }
            } else {
                $file_name = "";
                $request->merge(['hinh_anh' => $file_name]);
            }
            $ten_sach = $request->old('ten_sach');
            $tac_gia = $request->old('tac_gia');
            $the_loai = $request->old('the_loai');
            $nha_xuat_ban = $request->old('nha_xuat_ban');
            $so_luong = $request->old('so_luong');
            $nam_xuat_ban = $request->old('nam_xuat_ban');
            $khu_vuc = $request->old('khu_vuc');
            $tu_sach = $request->old('tu_sach');
            $mo_ta = $request->old('mo_ta');
            $gia_tien = $request->old('gia_tien');

            $dexuat = Sach::where('de_xuat', 1)->count();
            $dexuatend = Sach::where('de_xuat', 1)->orderBy('created_at', 'desc')->first();
            if ($dexuat < 7) {
                Sach::create([
                    'ma_sach' => $randomTime,
                    'ten' => $request->ten_sach,
                    'tac_gia_id' => $request->tac_gia,
                    'the_loai_id' => $request->the_loai,
                    'nha_xuat_ban_id' => $request->nha_xuat_ban,
                    'nam_xuat_ban' => $request->nam_xuat_ban,
                    'mo_ta' => $request->mo_ta,
                    'hinh_anh' => $file_name,
                    'gia_tien' => $request->gia_tien,
                    'de_xuat' => $request->de_xuat ? 1 : 0,
                ]);
            } else {
                $dexuatend->de_xuat = 0;
                $dexuatend->save();
                Sach::create([
                    'ma_sach' => $randomTime,
                    'ten' => $request->ten_sach,
                    'tac_gia_id' => $request->tac_gia,
                    'the_loai_id' => $request->the_loai,
                    'nha_xuat_ban_id' => $request->nha_xuat_ban,
                    'nam_xuat_ban' => $request->nam_xuat_ban,
                    'mo_ta' => $request->mo_ta,
                    'hinh_anh' => $file_name,
                    'gia_tien' => $request->gia_tien,
                    'de_xuat' => $request->de_xuat ? 1 : 0,
                ]);
            }
            ThuVien::create([
                'sach_id' => Sach::latest()->first()->id,
                'tu_sach_id' => $request->tu_sach,
                'khu_vuc_id' => $request->khu_vuc,
                'sl_con_lai' => $request->so_luong,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            $soluongbandau = ThuVien::where('sach_id', $tangsl->id)->first();
            ThuVien::where('sach_id', $tangsl->id)->update([
                'sl_con_lai' => ($soluongbandau->sl_con_lai + $request->so_luong)
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }
    }
    public function themTacGia(Request $request)
    {
        if ($request->tac_gia != '') {
            $tacgia = TacGia::where('ten', $request->tac_gia)->first();
            if (!$tacgia) {
                TacGia::create(['ten' => $request->tac_gia]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tên tác giả đã tồn tại');
            }
        }
        return back()->with('error', 'Tác giả không được bỏ trống');
    }

    public function themNhaXuatBan(Request $request)
    {
        if ($request->nha_xuat_ban != '') {
            $nxb = NhaXuatBan::where('ten', $request->nha_xuat_ban)->first();
            if (!$nxb) {
                NhaXuatBan::create(['ten' => $request->nha_xuat_ban]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tên nhà xuất bản đã tồn tại');
            }
        }
        return back()->with('error', 'Nhà xuất bản không được bỏ trống');
    }
    public function themTheLoai(Request $request)
    {
        if ($request->the_loai != '') {
            $theloai = TheLoai::where('ten', $request->the_loai)->first();
            if (!$theloai) {
                TheLoai::create(['ten' => $request->the_loai]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tên thể loại đã tồn tại');
            }
        }
        return back()->with('error', 'Thể loại không được bỏ trống');
    }
    public function themKhuVuc(Request $request)
    {
        if ($request->khu_vuc != '') {
            $khuvuc = KhuVuc::where('ten', $request->khu_vuc)->first();
            if (!$khuvuc) {
                KhuVuc::create(['ten' => $request->khu_vuc]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tên khu vực đã tồn tại');
            }
        }
        return back()->with('error', 'Khu vực không được bỏ trống');
    }
    public function themTuSach(Request $request)
    {
        if ($request->tu_sach != '') {
            $tusach = TuSach::where('ten', $request->tu_sach)->where('khu_vuc_id', $request->khu_vuc_id)->first();
            if (!$tusach) {
                TuSach::create([
                    'ten' => $request->tu_sach,
                    'khu_vuc_id' => $request->khu_vuc_id,
                ]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tủ sách đã tồn tại');
            }
        }
        return back()->with('error', 'Tủ sách không được bỏ trống');
    }


    // CHỈNH SỬA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function suaTacgia($id, Request $request)
    {
        $tacgia = TacGia::where('ten', $request->tac_gia)->first();
        if (!$tacgia) {
            TacGia::find($id)->update(['ten' => $request->tac_gia]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            return back()->with('error_r', 'Tên tác giả đã tồn tại');
        }
    }
    public function suaNhaXuatBan($id, Request $request)
    {
        $nxb = NhaXuatBan::where('ten', $request->nha_xuat_ban)->first();
        if (!$nxb) {
            NhaXuatBan::find($id)->update(['ten' => $request->nha_xuat_ban]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            return back()->with('error_r', 'Tên nhà xuất bản đã tồn tại');
        }
    }
    public function suaTheLoai($id, Request $request)
    {
        $theloai = TheLoai::where('ten', $request->the_loai)->first();
        if (!$theloai) {
            TheLoai::find($id)->update(['ten' => $request->the_loai]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            return back()->with('error_r', 'Tên thể loại đã tồn tại');
        }
    }
    public function suaKhuVuc($id, Request $request)
    {
        $khuvuc = KhuVuc::where('ten', $request->khu_vuc)->first();
        if (!$khuvuc) {
            KhuVuc::find($id)->update(['ten' => $request->khu_vuc]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            return back()->with('error_r', 'Tên khu vực đã tồn tại');
        }
    }
    public function suaTuSach($id, Request $request)
    {
        $tusach = TuSach::where('ten', $request->tu_sach)->where('khu_vuc_id', $request->khu_vuc_id)->first();
        if (!$tusach) {
            TuSach::find($id)->update([
                'ten' => $request->tu_sach,
                'khu_vuc_id' => $request->khu_vuc_id,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        } else {
            return back()->with('error_r', 'Tên tủ sách đã tồn tại');
        }

        return redirect()->route('hien-thi-them-sach');
    }


    // CHỈNH SỬA sách
    public function suaSach($id)
    {
        $sach = ThuVien::where('sach_id', $id)->get();
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        $tu_sach = TuSach::all();
        return view('sach.edit', ['sach' => $sach, 'tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc, 'tu_sach' => $tu_sach]);
    }
    public function xuLySuaSach($id, $id_tv, SachRequest $request)
    {
        $dexuat = Sach::where('de_xuat', 1)->count();
        $dexuatend = Sach::where('de_xuat', 1)->orderBy('created_at', 'desc')->first();
        $tangsl = Sach::where('ten', $request->ten_sach)->where('tac_gia_id', $request->tac_gia)->where('the_loai_id', $request->the_loai)->where('nha_xuat_ban_id', $request->nha_xuat_ban)->where('nam_xuat_ban', $request->nam_xuat_ban)->first();
        $de_xuat = $request->has('de_xuat') ? 1 : 0;
        if ($tangsl) {
            if (strval($tangsl->id) === strval($request->id_sach)) {
                if ($dexuat < 7) {
                    Sach::find($id)->update([
                        'ten' => $request->ten_sach,
                        'tac_gia_id' => $request->tac_gia,
                        'the_loai_id' => $request->the_loai,
                        'nha_xuat_ban_id' => $request->nha_xuat_ban,
                        'nam_xuat_ban' => $request->nam_xuat_ban,
                        'mo_ta' => $request->mo_ta,
                        'de_xuat' => $de_xuat,
                        'gia_tien' => $request->gia_tien,
                    ]);
                } else {
                    $dexuatend->de_xuat = 0;
                    $dexuatend->save();
                    Sach::find($id)->update([
                        'ten' => $request->ten_sach,
                        'tac_gia_id' => $request->tac_gia,
                        'the_loai_id' => $request->the_loai,
                        'nha_xuat_ban_id' => $request->nha_xuat_ban,
                        'nam_xuat_ban' => $request->nam_xuat_ban,
                        'mo_ta' => $request->mo_ta,
                        'de_xuat' => $de_xuat,
                        'gia_tien' => $request->gia_tien,
                    ]);
                }
                $img = Sach::find($id);
                if ($request->has('file')) {
                    $file = $request->file;
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('img/books'), $filename);
                    $img->hinh_anh = $filename;
                }
                $img->save();
                ThuVien::where('sach_id', $tangsl->id)->update([
                    'tu_sach_id' => $request->tu_sach,
                    'sl_con_lai' => $request->so_luong,
                ]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return back();
            } else {
                $soluongbandau = ThuVien::where('sach_id', $tangsl->id)->first();
                ThuVien::where('sach_id', $tangsl->id)->update([
                    'sl_con_lai' => ($soluongbandau->sl_con_lai + $request->so_luong),
                    'sach_id' => $tangsl->id
                ]);
                Sach::find($id)->delete();
                ThuVien::where('sach_id', $id_tv)->delete();
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-sach');
            }
        } else {
            if ($dexuat < 7) {
                Sach::find($id)->update([
                    'ten' => $request->ten_sach,
                    'tac_gia_id' => $request->tac_gia,
                    'the_loai_id' => $request->the_loai,
                    'nha_xuat_ban_id' => $request->nha_xuat_ban,
                    'nam_xuat_ban' => $request->nam_xuat_ban,
                    'mo_ta' => $request->mo_ta,
                    'de_xuat' => $de_xuat,
                    'gia_tien' => $request->gia_tien,
                ]);
            } else {
                $dexuatend->de_xuat = 0;
                $dexuatend->save();
                Sach::find($id)->update([
                    'ten' => $request->ten_sach,
                    'tac_gia_id' => $request->tac_gia,
                    'the_loai_id' => $request->the_loai,
                    'nha_xuat_ban_id' => $request->nha_xuat_ban,
                    'nam_xuat_ban' => $request->nam_xuat_ban,
                    'mo_ta' => $request->mo_ta,
                    'de_xuat' => $de_xuat,
                    'gia_tien' => $request->gia_tien,
                ]);
            }
            $img = Sach::find($id);
            if ($request->has('file')) {
                $file = $request->file;
                $filename = $file->getClientOriginalName();
                $file->move(public_path('img/books'), $filename);
                $img->hinh_anh = $filename;
            }
            $img->save();
            ThuVien::where('sach_id', $id_tv)->update([
                'tu_sach_id' => $request->tu_sach,
                'sl_con_lai' => $request->so_luong,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return back();
        }
    }


    // XÓA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function xoaTacGia($id)
    {
        TacGia::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaNhaXuatBan($id)
    {
        NhaXuatBan::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaTheLoai($id)
    {
        TheLoai::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaKhuVuc($id)
    {
        KhuVuc::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaTuSach($id)
    {
        TuSach::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }


    // XEM, TÌM KIẾM & CHI TIẾT sách
    public function dsSach()
    {
        $slsach = Sach::all()->count();
        $sach = Sach::orderBy('ten', 'asc')->paginate(20);
        return view('sach.index', ['sach' => $sach, 'slsach' => $slsach]);
    }
    public function timKiemTheoTacGia(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $tim_kiem = $request->old('tim_kiem');
        $sach = Sach::where('ten', 'like', "%$timKiem%")
        ->orderBy('ten', 'asc')
            ->paginate(20);
        $slsach = $sach->count();
        if ($sach->count() == 0) {
            return back()->withInput()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            $queryString = http_build_query(['tim_kiem' => $timKiem]);
            $sach->appends(['tim_kiem' => $timKiem]);
            return view('sach.index', [
                'sach' => $sach,
                'search' => '',
                'selected' => 'asc_name',
                'slsach' => $slsach,
                'queryString' => $queryString,
            ]);
        }
    }



    public function chiTietSach($id)
    {
        $tongbl = Sach::where('id', $id)->first();
        $binhluan = BinhLuan::where('sach_id', $id)->where('binh_luan_id', 0)->get();
        $sach = ThuVien::where('sach_id', $id)->get();
        return view('sach.detail', ['sach' => $sach, 'binhluan' => $binhluan, 'tongbl' => $tongbl]);
    }

    // Cấp tài khoản - quản lý tài khoản
    public function capTaiKhoan()
    {
        return view('tai_khoan.create');
    }
    public function xuLyTaoTaiKhoan(CapTaiKhoanRequest $request)
    {
        //random 4 so va 4 chữ 
        $numbers = '0123456789';
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            if (
                $i < 4
            ) {
                $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
            } else {
                $randomString .= $letters[rand(0, strlen($letters) - 1)];
            }
        }
        $ho = $request->old('ho');
        $ten = $request->old('ten');
        $vai_tro = $request->old('vai_tro');
        $email = $request->old('email');
        $gioi_tinh = $request->old('gioi_tinh');
        //random pas chu and so
        $user = NguoiDung::where('email', $request->email)->first();
        if (!$user) {
            if ($request->vai_tro == 1 || $request->vai_tro == 2) {
                session()->put('mat_khau', $randomString);
                $user = NguoiDung::create([
                    'email' => $request->email,
                    'mat_khau' => Hash::make($randomString),
                    'ho' => $request->ho,
                    'ten' => $request->ten,
                    'hinh_anh' => '',
                    'vai_tro' => $request->vai_tro,
                    'gioi_tinh' => $request->gioi_tinh,
                    'ngay_sinh' => date('Y-m-d', strtotime($request->ngay_sinh)),
                    'dien_thoai' => '',
                    'ma_hs' => ''
                ]);
                $this->taoTaiKhoan($user);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('tao-tai-khoan');
            } else {
                session()->put('mat_khau', $randomString);
                $user = NguoiDung::create([
                    'email' => $request->email,
                    'mat_khau' => Hash::make($randomString),
                    'ho' => $request->ho,
                    'ten' => $request->ten,
                    'hinh_anh' => '',
                    'vai_tro' => $request->vai_tro,
                    'gioi_tinh' => $request->gioi_tinh,
                    'ngay_sinh' =>  date('Y-m-d', strtotime($request->ngay_sinh)),
                    'dien_thoai' => '',
                    'ma_hs' => $request->ma_hs,
                ]);
                $this->taoTaiKhoan($user);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('tao-tai-khoan');
            }
            FacadesSession::flash('success', 'Xử lý thành công');
        } else {
            return back()->with('errorMail', 'Không thể tạo tài khoản do email đã tồn tại');
        }
    }
    public function taoTaiKhoan($user)
    {
        $mailData = [
            'title' => 'Chào mừng bạn đến với Libro',
            'body' => 'Vui lòng không chia sẻ tài khoản này với ai',
            'name' => $user['ten'],
            'email' => $user['email'],
            'mat_khau' => session()->get('mat_khau'),
        ];
        session()->forget('mat_khau');
        $mailable = new SendMailCreateUser($mailData);
        Mail::to($user['email'])->send($mailable);
        return redirect()->route('tao-tai-khoan');
    }
    public function quanLyTaiKhoan()
    {
        $admin = NguoiDung::where('vai_tro', 1)->where('id', '!=', Auth::id())->get();
        $thuthu = NguoiDung::where('vai_tro', 2)->where('id', '!=', Auth::id())->get();
        $docgia = NguoiDung::where('vai_tro', 3)->get();
        return view('tai_khoan.index', ['admin' => $admin, 'thuthu' => $thuthu, 'docgia' => $docgia]);
        // return view('tai_khoan.index',['ds_tai_khoan'=>NguoiDung::paginate(10)]);
    }
    public function themTinTuc()
    {
        return view('tin_tuc.them_tin_tuc');
    }
    public function dsTinTuc()
    {
        $tintuc = TinTuc::all();
        $sltintuc = TinTuc::all()->count();
        return view('tin_tuc.xem_tin_tuc', ['tintuc' => $tintuc, 'sltintuc' => $sltintuc]);
    }
    public function xuLyThemTinTuc(Request $request)
    {
        if ($request->noi_bat != '') {
            TinTuc::where('noi_bat', 1)->update(['noi_bat' => 0]);
        }
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            if ($file->isValid()) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('img/news'), $file_name);
                $request->merge(['anh_bia' => $file_name]);
            }
        } else {
            $file_name = "";
            $request->merge(['anh_bia' => $file_name]);
        }
        if ($request->tieu_de != '') {
            TinTuc::create([
                'ten' => $request->tieu_de,
                'noi_dung' => $request->noi_dung,
                'noi_bat' => $request->noi_bat ? 1 : 0,
                'anh_bia' => $file_name
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('them-tin-tuc');
        } else {
            return back()->with('error', 'Tiêu đề không được bỏ trống');
        }
    }
    public function xemChiTietTinTuc($id)
    {
        $tintuc = TinTuc::where('id', $id)->get();
        return view('tin_tuc.chi_tiet_tin_tuc', ['tintuc' => $tintuc]);
    }
    public function xoaTinTuc($id)
    {
        TinTuc::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function suaTinTuc($id)
    {
        $tintuc = TinTuc::where('id', $id)->get();
        return view('tin_tuc.sua_tin_tuc', ['tintuc' => $tintuc]);
    }
    public function xuLySuaTinTuc($id, Request $request)
    {
        $noi_bat = $request->has('noi_bat') ? 1 : 0;
        if ($noi_bat == 1) {
            TinTuc::where('noi_bat', 1)->update(['noi_bat' => 0]);
        }
        TinTuc::find($id)->update([
            'ten' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
            'noi_bat' => $noi_bat,
        ]);
        $img = TinTuc::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/news'), $filename);
            $img->anh_bia = $filename;
        }
        $img->save();
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }

    public function timKiemDocGiaDuyetSach(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $cho_duyet = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai', 1)
            ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($cho_duyet->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.phe_duyet_sach', [
                'cho_duyet' => $cho_duyet,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function timKiemDocGiaDangMuonSach(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $dang_muon = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai', 2)
            ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($dang_muon->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.dang_muon_sach', [
                'dang_muon' => $dang_muon,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function timKiemDocGiaDaMuonSach(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $dang_muon = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai', 3)
            ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($dang_muon->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.da_muon_sach', [
                'dang_muon' => $dang_muon,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function duyetMuonSach()
    {
        $cho_duyet = PhieuMuonSach::where('trang_thai', 1)->get();
        return view('muon_sach.phe_duyet_sach', ['cho_duyet' => $cho_duyet]);
    }
    public function xuLyMuonSach($id)
    {
        $so_luong = PhieuMuonSach::where('trang_thai', 1)->where('ma_phieu_muon', $id)->count();
        PhieuMuonSach::where('ma_phieu_muon', $id)->update([
            'trang_thai' => 2,
            'thu_thu_id' => Auth::id(),
            'han_tra' => date('Y/m/d', strtotime(date('Y/m/d') . ' + 14 days')),
        ]);
        return back();
    }
    public function xuLyTraSach(Request $request, $id)
    {
        PhieuMuonSach::where('ma_phieu_muon', $id)->update([
            'trang_thai' => 3,
        ]);

        foreach ($request->all() as $key => $value) {
            if ($key != '_token' && $key != 'all') {
                PhieuPhat::create([
                    'doc_gia_id' => $request->doc_gia_id,
                    'thu_thu_id' => Auth::id(),
                    'ma_phieu' => $request->ma_phieu_muon,
                    'sach_id' => $request->sach_id,
                    'ly_do' => $request->ly_do,
                    'so_luong' => $request->so_luong,
                    'tien_phat' => $request->$key,
                    'ly_do' => '',
                    'tong_tien_phat' => $request->tong_tien_phat,
                ]);
            }
        }
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function dangMuonSach()
    {
        $dang_muon = PhieuMuonSach::where('trang_thai', 2)->get();
        return view('muon_sach.dang_muon_sach', ['dang_muon' => $dang_muon]);
    }

    public function daMuonSach()
    {
        $da_muon = PhieuMuonSach::where('trang_thai', 3)->get();
        return view('muon_sach.da_muon_sach', ['da_muon' => $da_muon]);
    }
    public function chiTietPhieu($id)
    {
        $tong_tien = PhieuPhat::where('ma_phieu', $id)->first();
        $chi_tiet_sach = PhieuMuonSach::where('ma_phieu_muon', $id)->first();
        $chitiet = PhieuMuonSach::where('ma_phieu_muon', $id)->get();
        return view('muon_sach.chi_tiet', ['chitiet' => $chitiet, 'chi_tiet_sach' => $chi_tiet_sach, 'tong_tien' => $tong_tien]);
    }
    public function thanhToanSach($id)
    {
        $charge = 0;
        $thanhtoan = PhieuMuonSach::where('ma_phieu_muon', $id)->get();
        $detail = PhieuMuonSach::where('ma_phieu_muon', $id)->first();
        if (Carbon::now('Asia/Ho_Chi_Minh') > Carbon::parse($detail->han_tra)) {
            $expired = Carbon::parse($detail->han_tra)->diffIndays(Carbon::now('Asia/Ho_Chi_Minh')) + 1;
            if ($expired <= 3) {
                $charge = $thanhtoan->count() * 5000;
            } else {
                $charge = $thanhtoan->count() * 10000;
            }
        }
        return view('muon_sach.thanh_toan', ['thanhtoan' => $thanhtoan, 'detail' => $detail, 'tien_phat_het_han' => $charge]);
    }

    public function handleThanhToan(Request $request)
    {
        $all_requests = $request->all();
        $tong_so_sach = 0;
        PhieuTraSach::create([
            'ma_phieu_muon' => $request->ma_phieu,
            'thu_thu_id' => Auth::id(),
            'trang_thai' => $request->het_han == 1 ? 1 : 0 // Kiểm tra 1 là quá hạn, 0 là đúng hạn
        ]);
        PhieuMuonSach::where('ma_phieu_muon', $request->ma_phieu)->update(['trang_thai' => 3]);
        foreach ($all_requests as $key => $value) {
            // Nếu khác '_token' và key là số
            if ($key != '_token' && is_numeric($key)) {
                $array = explode('|', $value);
                // Nguyên vẹn
                if ($array[1] == 1) {
                    if ($all_requests['het_han'] == 1) {
                        PhieuPhat::create([
                            'doc_gia_id' => $request->doc_gia,
                            'thu_thu_id' => Auth::id(),
                            'ma_phieu' => $all_requests['ma_phieu'],
                            'sach_id' => $key,
                            'so_luong' => 1,
                            'ly_do' => 'Hết hạn',
                            'tien_phat' => 20000,
                            'tong_tien_phat' => $all_requests['tong_tien_phat'],
                            'tong_so_sach' => 0
                        ]);
                        $tong_so_sach++;
                    }
                    $this_book = ThuVien::where('sach_id', $key)->first();
                    ThuVien::where('sach_id', $key)->update(['sl_con_lai' => $this_book->sl_con_lai + 1]);
                    // Mất sách
                } elseif ($array[1] == 2) {
                    PhieuPhat::create([
                        'doc_gia_id' => $request->doc_gia,
                        'thu_thu_id' => Auth::id(),
                        'ma_phieu' => $all_requests['ma_phieu'],
                        'sach_id' => $key,
                        'so_luong' => 1,
                        'ly_do' => $all_requests['het_han'] == 1 ? 'Hết hạn + Mất sách' : 'Mất sách',
                        'tien_phat' => $all_requests['het_han'] == 1 ? $array[0] + 20000 : $array[0],
                        'tong_tien_phat' => $all_requests['tong_tien_phat'],
                        'tong_so_sach' => 0
                    ]);
                    $tong_so_sach++;
                    // Hư hỏng
                } else {
                    PhieuPhat::create([
                        'doc_gia_id' => $request->doc_gia,
                        'thu_thu_id' => Auth::id(),
                        'ma_phieu' => $all_requests['ma_phieu'],
                        'sach_id' => $key,
                        'so_luong' => 1,
                        'ly_do' => $all_requests['het_han'] == 1 ? 'Hết hạn + Hư hỏng (' . $all_requests['hu_hong_' . $key] . ')' : 'Hư hỏng (' . $all_requests['hu_hong_' . $key] . ')',
                        'tien_phat' => $all_requests['het_han'] == 1 ? $array[0] + 20000 : $array[0],
                        'tong_tien_phat' => $all_requests['tong_tien_phat'],
                        'tong_so_sach' => 0
                    ]);
                    KhoSach::create([
                        'sach_id' => $key,
                        'thu_thu_id' => Auth::id(),
                        'ly_do' => 'Độc giả làm hư (' . $all_requests['hu_hong_' . $key] . ')',
                        'so_luong' => 1
                    ]);
                    $tong_so_sach++;
                }
            }
        }
        PhieuPhat::where('ma_phieu', $all_requests['ma_phieu'])->update(['tong_so_sach' => $tong_so_sach]);
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('da-muon-sach');
    }
    public function chiTietTaiKhoan($id)
    {
        $detail = NguoiDung::find($id);
        return view('tai_khoan.detail', ['detail' => $detail]);
    }
    public function xuLyDoiThongTinNguoiDung($id, Request $request)
    {
        $vaitro = NguoiDung::where('id', $id)->first();
        if ($vaitro->vai_tro == 1 || $vaitro->vai_tro == 2) {
            NguoiDung::find($id)->update([
                'ho' => $request->ho,
                'ten' => $request->ten,
                'ma_hs' => '',
                'ngay_sinh' => $request->ngay_sinh,
                'gioi_tinh' => $request->gioi_tinh,
            ]);
        } else if ($vaitro->vai_tro == 3) {
            NguoiDung::find($id)->update([
                'ho' => $request->ho,
                'ten' => $request->ten,
                'ma_hs' => $request->ma_hs,
                'ngay_sinh' => $request->ngay_sinh,
                'gioi_tinh' => $request->gioi_tinh,
            ]);
        }
        $img = NguoiDung::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/avt'), $filename);
            $img->hinh_anh = $filename;
        }
        FacadesSession::flash('success', 'Xử lý thành công');
        $img->save();

        return back();
    }
    public function sachHu()
    {
        $sach = ThuVien::where('sl_con_lai', '>', 0)->get();
        return view('sach.sach_hu', ['sach' => $sach]);
    }
    public function xuLyBoSachVaoKho(Request $request)
    {
        $so_luong_tong = ThuVien::where('sach_id', $request->ten_sach)->first();
        $sl = intval($so_luong_tong->sl_con_lai);
        $so_luong_tru = intval($request->so_luong);
        $sl_con_lai = $sl - $so_luong_tru;
        if ($sl < $so_luong_tru) {
            return back()->with('error', 'Số lượng sách cần bỏ vào kho vượt quá số lượng sách hiện có !!!');
        } else {
            KhoSach::create([
                'sach_id' => $request->ten_sach,
                'thu_thu_id' => Auth::id(),
                'ly_do' => $request->ly_do,
                'so_luong' => $request->so_luong,
            ]);
            ThuVien::where('sach_id', $request->ten_sach)->update([
                'sl_con_lai' => $sl_con_lai,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return back();
        }
    }
    public function quanLyKhoSach()
    {
        $khosach = KhoSach::where('so_luong', '>', 0)->get();
        return view('sach.quan_ly_kho', ['khosach' => $khosach]);
    }
    public function quanLyLienHe()
    {
        $lienhe = LienHe::all();
        $sl = LienHe::all()->count();
        return view('lien_he.quan_ly_phan_hoi', ['lienhe' => $lienhe, 'sl' => $sl]);
    }
    public function xuLyDangChuY()
    {
        LienHe::where('id', request()->input('id'))->update([
            'dang_chu_y' => request()->input('check')
        ]);
        return back();
    }
    public function xoaLienHe($id)
    {
        LienHe::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function chiTietKhoSach($id)
    {
        $sach = ThuVien::where('sl_con_lai', '>', 0)->get();
        $kho = KhoSach::find($id)->first();
        return view('sach.chi_tiet_kho_sach', ['kho' => $kho, 'sach' => $sach]);
    }
    public function xyLyChinhSuaSachkho(Request $request, $id)
    {
        KhoSach::where('id',$id)->update([
            'sach_id' => $request->ten_sach,
            'thu_thu_id' => Auth::id(),
            'ly_do' => $request->ly_do,
            'so_luong' => $request->so_luong,
        ]);
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function xoaSachKho($id)
    {
        KhoSach::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('quan-ly-kho-sach');
    }
    public function xuLyCapNhatDeXuat()
    {
        $dexuat = Sach::where('de_xuat', 1)->count();
        $dexuatend = Sach::where('de_xuat', 1)->orderBy('created_at', 'desc')->first();
        if($dexuat<7){
            Sach::where('id', request()->input('sach'))->update([
                'de_xuat' => request()->input('check'),
            ]);
        }else{
            $dexuatend->de_xuat = 0;
            $dexuatend->save();
            Sach::where('id', request()->input('sach'))->update([
                'de_xuat' => request()->input('check'),
            ]); 
        }
        return redirect()->route('hien-thi-sach');
    }
    public function xuLyXoaBinhLuan($id){
        $binhluan_con = BinhLuan::where('binh_luan_id',$id)->where('id',$id)->get();
        if($binhluan_con){
            BinhLuan::where('binh_luan_id',$id)->delete();
            BinhLuan::where('id',$id)->delete();
        }else{
            BinhLuan::where('id', $id)->delete();
        }
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
}
