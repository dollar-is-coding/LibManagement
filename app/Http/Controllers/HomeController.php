<?php

namespace App\Http\Controllers;

use App\Mail\SendMailCreateUser;
use App\Mail\SendMailForgotPass;
use App\Mail\SendChangeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use App\Models\ThuVien;
use App\Models\DocGia;
use App\Models\PhieuMuonSach;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TaiKhoanRequest;
use App\Http\Requests\MatKhauRequest;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\MuonSachRequest;
use App\Models\LienHe;
use App\Models\Sach;
use App\Models\TinTuc;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{
    public function trangChu()
    {
        $ten = Auth::user()->ten;
        $slsach = Sach::all()->count();
        $sldocgia = NguoiDung::where('vai_tro', 3)->count();
        $slthuthu = NguoiDung::where('vai_tro', 2)->count();
        $sltintuc = TinTuc::all()->count();
        $slsachduyet = PhieuMuonSach::where('trang_thai', 1)->distinct('ma_phieu_muon')->count();
        $slphanhoi = LienHe::all()->count();
        return view('trang_chu', ['slsach' => $slsach, 'sldocgia' => $sldocgia, 'slthuthu' => $slthuthu,'sltintuc'=>$sltintuc,'ten'=>$ten, 'slsachduyet'=> $slsachduyet, 'slphanhoi'=> $slphanhoi]);
    }


    // ĐĂNG NHẬP & ĐĂNG XUẤT
    public function dangNhap()
    {
        return view('dang_nhap');
    }
    public function xuLyDangNhap(DangNhapRequest $request)
    {
        // $admin=['email'=>$request->email,'password'=>$request->password];
        // if(Auth::attempt($admin)) {
        //     session()->put('email_user',$admin['email']);
        //     return redirect()->route('trang-chu');
        // } 
        // return redirect()->back()->with('error','Đăng nhập thất bại');
        //start 
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'vai_tro' => 1,
        ];
        $thuthu = [
            'email' => $request->email,
            'password' => $request->password,
            'vai_tro' => 2,
        ];
        $docgia = [
            'email' => $request->email,
            'password' => $request->password,
            'vai_tro' => 3,
        ];

        if (Auth::attempt($admin)) {
            session(['vai_tro' => $admin['vai_tro'], 'email_user' => $admin['email']]);
            return redirect()->route('trang-chu');
        } else if (Auth::attempt($thuthu)) {
            session(['vai_tro' => $thuthu['vai_tro'], 'email_user' => $thuthu['email']]);
            return redirect()->route('trang-chu');
        } else if (Auth::attempt($docgia)) {
            session(['vai_tro' => $docgia['vai_tro'], 'email_user' => $docgia['email']]);
            return redirect()->route('trang-chu-client');
        }
        return back()->with('error', 'Đăng nhập thất bại');

    }
    public function xuLyDangXuat()
    {
  
        Auth::logout();
        session()->flush();
        return redirect()->route('dang-nhap');
    }

    // Cá nhân
    public function xemThongTin()
    {
        return view('ca_nhan.ho_so');
    }
    public function xuLySuaThongTin(TaiKhoanRequest $request)
    {
        $ho=$request->old('ho');
        $ten=$request->old('ten');
        $nguoiDung=NguoiDung::where('id',Auth::id())->update([
            'ho'=>$request->ho,
            'ten'=>$request->ten,
            'gioi_tinh'=>(int)$request->gioi_tinh,
        ]);
        $img =NguoiDung::find(Auth::id());
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/avt'), $filename);
            $img->hinh_anh = $filename;
        }
        FacadesSession::flash('success', 'Xử lý thành công');
        $img->save();
        
        return redirect()->back();
    }
    public function doiMatKhau()
    {
        return view('ca_nhan.doi_mat_khau');
    }
    public function xuLyDoiMatKhau(Request $request)
    {
        if ($request->new_pass==$request->confirm_pass&&Hash::check($request->old_pass,Auth::user()->mat_khau)) {
            NguoiDung::find(Auth::id())->update([
                'mat_khau'=>Hash::make($request->new_pass),
            ]);
            return redirect()->back();
        }
        FacadesSession::flash('success', 'Xử lý thành công');
        return back()->with('error','Thay đổi mật khẩu thất bại');
    }

    // Quên mật khẩu ( nhập mail, nhập mã xác minh, đặt lại mật khẩu)
    public function hienThiNhapMailQuenMatKhau()
    {
        return view('quen_mat_khau.nhap_mail_quen_mat_khau');
    }
    public function xuLyNhapMailQuenMatKhau(Request $request)
    {
        $emailTo = $request->email;
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify', $rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Quên mật khẩu',
            'body' => 'Vui lòng không chia sẻ bất kì ai mã này'
        ];
        $mailable = new SendMailForgotPass($mailData);
        $user = NguoiDung::where('email', $emailTo)->first();
        if ($user) {
            Mail::to($emailTo)->send($mailable);
            return redirect()->route('nhap-ma-xac-minh');
        } else {
            return back()->with('error', 'Email không tồn tại');
        }
    }
    public function hienNhapXacThucQuenMatKhau(){
        return view('ca_nhan.nhap_ma_xac_thuc');
    }
    public function hienDoiMatKhau(){
        return view('ca_nhan.doi_mat_khau_moi');
    }
    public function xuLyGuiMaQuenMatKhau()
    {
        $emailTo = Auth::user()->email;
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify', $rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Quên mật khẩu',
            'body' => 'Vui lòng không chia sẻ bất kì ai mã này'
        ];
        $mailable = new SendMailForgotPass($mailData);
        Mail::to($emailTo)->send($mailable);
        return redirect()->route('nhap-ma-quen-mat-khau');
    }
    public function xuLyNhapMaXacThucQuenMatKhau(Request $request)
    {
        $verify = session()->get('verify');
        $verify_nguoidung = $request->xac_thuc;
        if ($verify == $verify_nguoidung) {
            return redirect()->route('hien-doi-mat-khau-moi');
        } else {
            return back()->with('error', 'Mã không hợp lệ');
        }
    }
    public function nhapMaXacMinh()
    {
        return view('quen_mat_khau.nhap_ma_xac_thuc');
    }
    public function xuLyNhapMaXacMinh(Request $request)
    {
        $verify = session()->get('verify');
        $verify_nguoidung = $request->verify;
        if ($verify == $verify_nguoidung) {
            return redirect()->route('dat-lai-mat-khau');
        } else {
            return back()->with('error', 'Mã không hợp lệ');
        }
    }
    public function datLaiMatKhau(){
        return view('quen_mat_khau.dat_lai_mat_khau');
    }
    public function xuLyDatLaiMatKhau(Request $request)
    {
        $email=session()->get('emailTo');
        if ($request->new_pass == $request->confirm_pass) {
            NguoiDung::where('email',$email)->update([
                'mat_khau' => Hash::make($request->new_pass),
            ]);
            return redirect()->route('dang-nhap');
        }
        return back()->with('error', 'Mật khẩu không trùng nhau!');
    }


    //  Nhập mã xác minh, Thay đổi email
    public function xacMinhMail()
    {
        $emailTo = session()->get('email_user');
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify', $rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Thay đổi email',
            'body' => 'Vui lòng không chia sẻ bất kì ai mã này'
        ];
        $mailable = new SendChangeMail($mailData);
        Mail::to($emailTo)->send($mailable);
        return view('ca_nhan.nhap_ma_xac_thuc_doi_email');
    }
    public function xulyXacMinhEmail(Request $request)
    {
        $verify = session()->get('verify');
        $verify_nguoidung = $request->verify;
        if ($verify == $verify_nguoidung) {
            return redirect()->route('doi-email');
        } else {
            return back()->with('error', 'Mã không hợp lệ');
        }
    }
    public function doiEmail()
    {
        return view('ca_nhan.doi_email');
    }
    public function xuLyDoiEmail(Request $request)
    {
        $email = session()->get('email_user');
        $emaildata = NguoiDung::where('email', $request->email)->get();
        foreach ($emaildata as $emaildatas) {
            $emaildata = $emaildatas->email;
        }
        if ($request->email != $emaildata) {
            session(['email_user' => $request->email]);
            NguoiDung::where('email', $email)->update([
                'email' => $request->email,
            ]);
            return redirect()->route('xem-thong-tin');
        }
        return back()->with('error', 'Email mới không được trùng với email hiện tại');
    }
}
