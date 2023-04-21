<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\TacGia;
use App\Models\NhaXuatBan;
use App\Models\TheLoai;
use App\Models\KhuVuc;
use App\Models\TuSach;
use App\Models\ThuVien;
use App\Models\Sach;
use App\Models\nguoiDung;


class AdminController extends Controller
{
    public function index()
    {
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        return view('them', ['tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc]);
    }

    public function layKhuVuc()
    {
        $danh_sach_khu_vuc = KhuVuc::all();
        return response()->json($danh_sach_khu_vuc);
    }

    public function laytuSachTheoID(Request $request)
    {
        $khu_vuc_id = $request->input('khu_vuc_id');
        $tu_sach = TuSach::where('khu_vuc_id', $khu_vuc_id)->get();
        return response()->json(['tu_sach' => $tu_sach]);
    }

    public function themTacGia(Request $request)
    {
        TacGia::create(['ten' => $request->tacgia]);
        return redirect()->route('hien-thi-them');
    }

    public function themNhaXuatBan(Request $request)
    {
        NhaXuatBan::create(['ten' => $request->nhaxuatban]);
        return redirect()->route('hien-thi-them');
    }

    public function themTheLoai(Request $request)
    {
        TheLoai::create(['ten' => $request->theloai]);
        return redirect()->route('hien-thi-them');
    }

    public function themKhuVuc(Request $request)
    {
        KhuVuc::create(['ten' => $request->khuvuc]);
        return redirect()->route('hien-thi-them');
    }

    public function themTuSach(Request $request)
    {
        TuSach::create([
            'ten' => $request->tusach,
            'khu_vuc_id'=>$request->khu_vuc_id,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function xoaTacGia($id)
    {
        TacGia::find($id)->delete();
        return redirect()->route('hien-thi-them');
    }

    public function xoaNhaXuatBan($id)
    {
        NhaXuatBan::find($id)->delete();
        return redirect()->route('hien-thi-them');
    }

    public function xoaTheLoai($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->route('hien-thi-them');
    }

    public function xoaKhuVuc($id)
    {
        KhuVuc::find($id)->delete();
        return redirect()->route('hien-thi-them');
    }

    public function xoaTuSach($id)
    {
        TuSach::find($id)->delete();
        return redirect()->route('hien-thi-them');
    }

    public function dsSach()
    {
        return view('ds_sach',['ds_sach'=>Sach::orderBy('ten','asc')->get()]);
    }

    public function dsTimKiem(Request $request)
    {
        if ($request->sort=='desc_name') {
            return view('ds_sach',['ds_sach'=>Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','desc')->get()]);
        }
        if ($request->sort=='desc_year') {
            return view('ds_sach',['ds_sach'=>Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->orderBy('nam_xuat_ban','desc')->get()]);
        }
        return view('ds_sach',['ds_sach'=>Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->get()]);
    }

    public function suaTacgia($id, Request $request)
    {
        TacGia::find($id)->update([
            'ten' => $request->tac_gia,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function suaNhaXuatBan($id, Request $request)
    {
        NhaXuatBan::find($id)->update([
            'ten' => $request->nha_xuat_ban,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function suaTheLoai($id, Request $request)
    {
        TheLoai::find($id)->update([
            'ten' => $request->the_loai,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function suaKhuVuc($id, Request $request)
    {
        KhuVuc::find($id)->update([
            'ten' => $request->khu_vuc,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function themSachThuVien(Request $request)
    {
        Sach::create([
            'ten'=>$request->ten_sach,
            'tac_gia_id'=>$request->tac_gia,
            'the_loai_id'=>$request->the_loai,
            'nha_xuat_ban_id'=>$request->nha_xuat_ban,
            'nam_xuat_ban'=>$request->nam_xuat_ban,
            'tom_tat'=>$request->tom_tat,
            'hinh_anh'=>''
        ]);
        ThuVien::create([
            'sach_id'=>Sach::latest()->first()->id,
            'tu_sach_id'=>$request->tu_sach,
            'so_luong'=>$request->so_luong
        ]);
        return redirect()->route('hien-thi-sach');
    }

    public function taoTaiKhoan()
    {
        return view('tao_tai_khoan');
    }

    public function xuLytaoTaiKhoan(Request $request)
    {
        NguoiDung::create([
            'email'=>$request->email,
            'mat_khau'=>Hash::make($request->password),
            'ho'=>$request->ho,
            'ten'=>$request->ten,
            'anh_dai_dien'=>'',
            'vai_tro'=>$request->vai_tro,
        ]);
        return redirect()->route('hien-thi-sach');
    }

}
