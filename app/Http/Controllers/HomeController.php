<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use App\Models\ThuVien;
use App\Models\DocGia;
use App\Models\PhieuMuonSach;

class HomeController extends Controller
{
    public function dangNhap()
    {
        return view('dang_nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $admin=['email'=>$request->email,'password'=>$request->password,'vai_tro'=>1];
        if(Auth::attempt($admin)) {
            session()->put('email_user',$admin['email']);
            return redirect()->route('trang-chu');
        } 
        return redirect()->back()->with('error','Đăng nhập thất bại');
    }

    public function xuLyDangXuat(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }

    public function xemThongTin()
    {
        return view('thong_tin');
    }

    public function xuLySuaThongTin(Request $request)
    {
        $nguoiDung=NguoiDung::where('id',Auth::id())->update([
            'ho'=>$request->ho,
            'ten'=>$request->ten,
            'gioi_tinh'=>(int)$request->gioi_tinh,
            'email'=>$request->email,
        ]);
        $img =NguoiDung::find(Auth::id());
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/avt'), $filename);
            $img->anh_dai_dien = $filename;
        }
        $img->save();
        return redirect()->back();
    }

    public function doiMatKhau()
    {
        return view('doi_mat_khau');
    }

    public function xuLyDoiMatKhau(Request $request)
    {
        if ($request->new_pass==$request->confirm_pass&&Hash::check($request->old_pass,Auth::user()->mat_khau)) {
            NguoiDung::find(Auth::id())->update([
                'mat_khau'=>Hash::make($request->new_pass),
            ]);
            return redirect()->back();
        }
        return redirect()->back()->with('error','Thay đổi mật khẩu thất bại!');
    }

    public function trangChu()
    {
        return view('trang_chu');
    }

    public function chiTietSach($id)
    {
        $sach=ThuVien::where('sach_id',$id)->get();
        $sl_nguoi_muon=PhieuMuonSach::where('sach_id',$id)->get()->count();
        return view('chi_tiet_sach',['sach'=>$sach,'sl_nguoi_muon'=>$sl_nguoi_muon]);
    }

    public function showMuonSach($id)
    {
        $sach=ThuVien::where('sach_id',$id)->get();
        $doc_gia=DocGia::all();
        return view('muon_sach',['sach'=>$sach,'ds_doc_gia'=>$doc_gia]);
    }

    public function handleMuonSach(Request $request)
    {
        $ngay_muon=explode('/', $request->ngay_muon);
        $ngay_tra=explode('/', $request->ngay_tra);
        
        PhieuMuonSach::create([
            'doc_gia_id'=>$request->ma_so,
            'sach_id'=>$request->sach,
            'so_luong'=>$request->so_luong,
            'ngay_muon'=>date('Y/m/d', strtotime($ngay_muon[2].'/'.$ngay_muon[1].'/'.$ngay_muon[0])),
            'ngay_tra'=>date('Y/m/d', strtotime($ngay_tra[2].'/'.$ngay_tra[1].'/'.$ngay_tra[0])),
        ]);
        ThuVien::where('sach_id',$request->sach)->update([
            'so_luong'=>(ThuVien::where('sach_id',$request->sach)->first()->so_luong-$request->so_luong)
        ]);
        return redirect()->route('hien-thi-sach');
    }
    public function quenMatKhau(){
        return view('quen_mat_khau');
    }
    public function xuLyCapNhatMatKhau(Request $request)
    {
        $email =session()->get('emailTo');
        if ($request->password == $request->again_password) {
            NguoiDung::where('email',$email)->update([
                'mat_khau' => Hash::make($request->password),
            ]);
            return redirect()->route('dang-nhap');
        }
        return redirect()->back()->with('error', 'Mật khẩu không trùng nhau!');
    }
}
