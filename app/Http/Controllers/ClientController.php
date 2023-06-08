<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;

class ClientController extends Controller
{
    public function index()
    {
        $start_of_week=Carbon::now()->startOfWeek();
        $end_of_week=Carbon::now()->endOfWeek();
        $the_loai=TheLoai::all();
        $sach_moi=Sach::where([['updated_at','>=',$start_of_week],['updated_at','<=',$end_of_week]])->take(4)->get();
        return view('client.index',['the_loai'=>$the_loai,'sach_moi'=>$sach_moi]);
    }

    public function danhMucSach()
    {
        $sgk=Sach::where('the_loai_id',1)->take(4)->get();
        $tham_khao=Sach::where('the_loai_id',2)->take(4)->get();
        $phat_trien=Sach::where('the_loai_id',3)->take(4)->get();
        $tap_chi=Sach::where('the_loai_id',4)->take(4)->get();
        $khoa_hoc=Sach::where('the_loai_id',5)->take(4)->get();
        $van_hoc=Sach::where('the_loai_id',6)->take(4)->get();
        return view('client.danh_muc_sach',['sgk'=>$sgk,'tham_khao'=>$tham_khao,'tap_chi'=>$tap_chi,'phat_trien'=>$phat_trien,'khoa_hoc'=>$khoa_hoc,'van_hoc'=>$van_hoc]);
    }

    public function chiTietSach()
    {
        $id=request()->input('id');
        $sach=Sach::find($id);
        return view('client.chi_tiet_sach',['sach'=>$sach]);
    }

    public function chiTietDanhMuc()
    {
        $id=request()->input('id');
        $sach=Sach::where('the_loai_id',$id)->paginate('10');
        $so_luong=Sach::where('the_loai_id',$id)->get();
        return view('client.chi_tiet_danh_muc',['sach'=>$sach,'so_luong'=>$so_luong->count(),'the_loai_id'=>$id]);
    }

    public function timKiemSach()
    {
        $id=request()->input('tac_gia');
        $sach=Sach::where('tac_gia_id',$id)->paginate('10');
        $so_luong=Sach::where('tac_gia_id',$id)->get();
        $tac_gia=TacGia::find($id);
        return view('client.tim_kiem',['sach'=>$sach,'so_luong'=>$so_luong->count(),'tac_gia'=>$tac_gia]);
    }

    public function sachHangTuan()
    {
        $start_of_week=Carbon::now()->startOfWeek();
        $end_of_week=Carbon::now()->endOfWeek();
        $sach_moi=Sach::where([['updated_at','>=',$start_of_week],['updated_at','<=',$end_of_week]])->paginate('10');
        $so_luong=Sach::where([['updated_at','>=',$start_of_week],['updated_at','<=',$end_of_week]])->get();
        return view('client.sach_moi_hang_tuan',['sach_moi'=>$sach_moi,'so_luong'=>$so_luong->count(),'bat_dau'=>$start_of_week,'ket_thuc'=>$end_of_week]);
    }

    public function themSachVaoGio()
    {
        # code...
    }
}
