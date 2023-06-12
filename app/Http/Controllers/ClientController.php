<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use App\Models\GioSach;
use App\Models\PhieuMuonSach;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        } else {
            $gio_sach=null;
        }
        $start_of_week=Carbon::now()->startOfWeek();
        $end_of_week=Carbon::now()->endOfWeek();
        $the_loai=TheLoai::all();
        $sach_moi=Sach::where([
            ['updated_at','>=',$start_of_week],
            ['updated_at','<=',$end_of_week]
        ])->take(4)->get();
        return view('client.index',[
            'the_loai'=>$the_loai,
            'sach_moi'=>$sach_moi,
            'gio_sach'=>$gio_sach
        ]);
    }

    public function danhMucSach()
    {
        if (Auth::user()) {
            $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        } else {
            $gio_sach=null;
        }
        $sgk=Sach::where('the_loai_id',1)->take(4)->get();
        $tham_khao=Sach::where('the_loai_id',2)->take(4)->get();
        $phat_trien=Sach::where('the_loai_id',3)->take(4)->get();
        $tap_chi=Sach::where('the_loai_id',4)->take(4)->get();
        $khoa_hoc=Sach::where('the_loai_id',5)->take(4)->get();
        $van_hoc=Sach::where('the_loai_id',6)->take(4)->get();
        return view('client.danh_muc_sach',[
            'sgk'=>$sgk,
            'tham_khao'=>$tham_khao,
            'tap_chi'=>$tap_chi,
            'phat_trien'=>$phat_trien,
            'khoa_hoc'=>$khoa_hoc,
            'van_hoc'=>$van_hoc,
            'gio_sach'=>$gio_sach
        ]);
    }

    public function chiTietSach()
    {
        $id=request()->input('id');
        $sach=Sach::find($id);
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        return view('client.chi_tiet_sach',['sach'=>$sach,'gio_sach'=>$gio_sach]);
    }

    public function chiTietDanhMuc()
    {
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        $id=request()->input('id');
        $sach=Sach::where('the_loai_id',$id)->paginate('10');
        $so_luong=Sach::where('the_loai_id',$id)->get();
        return view('client.chi_tiet_danh_muc',[
            'sach'=>$sach,
            'so_luong'=>$so_luong->count(),
            'the_loai_id'=>$id,
            'gio_sach'=>$gio_sach
        ]);
    }

    public function timKiemTacGia()
    {
        $id=request()->input('tac_gia');
        $sach=Sach::where('tac_gia_id',$id)->paginate('10');
        $so_luong=Sach::where('tac_gia_id',$id)->get();
        $tac_gia=TacGia::find($id);
        return view('client.tim_kiem_tac_gia',[
            'sach'=>$sach,
            'so_luong'=>$so_luong->count(),
            'tac_gia'=>$tac_gia
        ]);
    }

    public function sachHangTuan()
    {
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        $start_of_week=Carbon::now()->startOfWeek();
        $end_of_week=Carbon::now()->endOfWeek();
        $sach_moi=Sach::where([
            ['updated_at','>=',$start_of_week],
            ['updated_at','<=',$end_of_week]
        ])->paginate('10');
        $so_luong=Sach::where([['updated_at','>=',$start_of_week],['updated_at','<=',$end_of_week]])->get();
        return view('client.sach_moi_hang_tuan',[
            'sach_moi'=>$sach_moi,
            'so_luong'=>$so_luong->count(),
            'bat_dau'=>$start_of_week,
            'ket_thuc'=>$end_of_week,
            'gio_sach'=>$gio_sach,
        ]);
    }

    public function themSachVaoGio()
    {
        $gio_sach=GioSach::where([['sach_id',request()->input('sach')],['doc_gia_id',Auth::user()->id]])->first();
        if (!$gio_sach) {
            GioSach::create([
                'doc_gia_id'=>Auth::user()->id,
                'sach_id'=>request()->input('sach')
            ]);
        }
        return back();
    }

    public function loaiKhoiGioSach()
    {
        $sach=request()->input('id');
        GioSach::where([['doc_gia_id',Auth::user()->id],['sach_id',$sach]])->delete();
        return back();
    }

    public function showGioSach()
    {
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->paginate('10');
        return view('client.gio_sach',['gio_sach'=>$gio_sach]);
    }

    public function handleMuonSach(Request $request)
    {
        if (blank(PhieuMuonSach::latest()->first())) {
            $ma_so=date('y').date('m').'0001';
        } else {
            $latest_month_db=substr(PhieuMuonSach::latest()->first()->ma_phieu_muon,2,2);
            $latest_pms_db=intval(substr(PhieuMuonSach::latest()->first()->ma_phieu_muon,4,4));
            if ($latest_month_db===date('m')) {
                $ma_so=date('y').date('m').str_pad($latest_pms_db+1, 4, '0', STR_PAD_LEFT);
            } else {
                $ma_so=date('y').date('m').'0001';
            }
        }
        foreach ($request->all() as $key => $value) {
            if ($key!='_token') {
                PhieuMuonSach::create([
                    'ma_phieu_muon'=>$ma_so,
                    'doc_gia_id'=>Auth::user()->id,
                    'thu_thu_id'=>null,
                    'sach_id'=>$key,
                    'so_luong'=>1,
                    'han_tra'=>date('Y/m/d', strtotime(date('Y/m/d') . ' + 14 days'))
                ]);
                GioSach::where('sach_id',$key)->delete();
            }
        }
        return back();
    }
    
    public function showLichSuChoDuyet() 
    {
        $cho_duyet=PhieuMuonSach::where([['doc_gia_id',Auth::user()->id],['trang_thai',1]])->get();
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        return view('client.cho_duyet',['gio_sach'=>$gio_sach,'cho_duyet'=>$cho_duyet]);
    }

    public function showLichSuDangMuon() 
    {
        $cho_duyet=PhieuMuonSach::where([['doc_gia_id',Auth::user()->id],['trang_thai',2]])->get();
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        return view('client.dang_muon',['gio_sach'=>$gio_sach,'cho_duyet'=>$cho_duyet]);
    }

    public function showLichSuDaTra()
    {
        $da_tra=PhieuMuonSach::where([['doc_gia_id',Auth::user()->id],['trang_thai',3]])->get();
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        return view('client.da_tra',['gio_sach'=>$gio_sach,'da_tra'=>$da_tra]);
    }

    public function cancelPhieuMuon()
    {
        $ma_phieu_cho=request()->input('ma_phieu_muon');
        PhieuMuonSach::where('ma_phieu_muon',$ma_phieu_cho)->update(['trang_thai'=>0]);
        return back();
    }
}
