<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use App\Models\ThuVien;

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
            'email'=>$request->email
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
        return view('chi_tiet_sach',['sach'=>$sach]);
    }
    public function quenMatKhau(){
        return view('quen_mat_khau');
    }
}
