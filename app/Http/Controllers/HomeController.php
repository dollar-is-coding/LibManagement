<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;

class HomeController extends Controller
{
    public function dangKy()
    {
        return view('dang_ky');
    }

    public function xuLyDangKy(Request $request)
    {
        NguoiDung::create([
            'email'=>$request->email,
            'mat_khau'=>Hash::make($request->password),
            'ho'=>$request->ho,
            'ten'=>$request->ten,
            'anh_dai_dien'=>'',
            'vai_tro'=>$request->vai_tro,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function dangNhap()
    {
        return view('dang_nhap');
    }

    public function xuLyDangNhap(Request $request)
    {
        $admin=['email'=>$request->email,'password'=>$request->password,'vai_tro'=>1];
        if(Auth::attempt($admin)) {
            return redirect()->route('hien-thi-them');
        } 
        return redirect()->back()->with('error','Đăng nhập thất bại');
    }
}
