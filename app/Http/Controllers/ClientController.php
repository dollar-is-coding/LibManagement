<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\TacGia;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
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
        return view('client.chi_tiet_danh_muc',['sach'=>$sach,'the_loai_id'=>$id]);
    }

    public function timKiemSach()
    {
        $id=request()->input('tac_gia');
        $sach=Sach::where('tac_gia_id',$id)->paginate('10');
        $tac_gia=TacGia::find($id);
        return view('client.tim_kiem',['sach'=>$sach,'tac_gia'=>$tac_gia]);
    }
}
