<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use App\Models\GioSach;
use App\Models\LichSu;
use App\Models\PhieuMuonSach;
use Illuminate\Support\Facades\Auth;
use App\Models\BinhLuan;

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
        $start_of_month=Carbon::now()->startOfMonth();
        $end_of_month=Carbon::now()->endOfMonth();
        $the_loai=Sach::groupBy('the_loai_id')
            ->select('the_loai_id',Sach::raw('count(*) as total'))
            ->get();
        $sach_moi=Sach::where([
            ['updated_at','>=',$start_of_week],
            ['updated_at','<=',$end_of_week]
        ])->take(4)->get();
        $xu_huong=PhieuMuonSach::where([
            ['updated_at','>=',$start_of_month],
            ['updated_at','<=',$end_of_month]
        ])->groupBy('sach_id')
            ->select('sach_id', PhieuMuonSach::raw('count(*) as total'))
            ->orderBy('total','desc')
            ->get();
        return view('client.index',[
            'the_loai'=>$the_loai,
            'sach_moi'=>$sach_moi,
            'gio_sach'=>$gio_sach,
            'xu_huong'=>$xu_huong
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
        $da_xem=LichSu::where([['doc_gia_id',Auth::user()->id],['sach_id',$id]])->first();
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        $tac_gia=Sach::find($id)->tac_gia_id;
        $cung_tac_gia=Sach::where('tac_gia_id',$tac_gia)->get();
        $ds_da_xem=LichSu::where('doc_gia_id',Auth::user()->id)->orderBy('updated_at','desc')->take(6)->get();
        if (!$da_xem) {
            LichSu::create([
                'doc_gia_id'=>Auth::user()->id,
                'sach_id'=>$id,
                'da_xem'=>1,
                'da_thich'=>0
            ]);
        } else {
            LichSu::where([['doc_gia_id',Auth::user()->id],['sach_id',$id]])
                ->update(['da_xem'=>1]);
        }
        Sach::find($id)->update([
            'luot_xem'=>Sach::find($id)->luot_xem+1
        ]);
        $binh_luan=BinhLuan::where([['sach_id',$id],['binh_luan_id',0]])->get();
        return view('client.chi_tiet_sach',[
            'sach'=>$sach,
            'gio_sach'=>$gio_sach,
            'cung_tac_gia'=>$cung_tac_gia,
            'ds_da_xem'=>$ds_da_xem,
            'binh_luan'=>$binh_luan
        ]);
    }

    public function chiTietDanhMuc()
    {
        if (Auth::user()) {
            $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        } else {
            $gio_sach=null;
        }
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
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        $sach=Sach::where('tac_gia_id',$id)->paginate('10');
        $so_luong=Sach::where('tac_gia_id',$id)->get();
        $tac_gia=TacGia::find($id);
        return view('client.tim_kiem_tac_gia',[
            'sach'=>$sach,
            'so_luong'=>$so_luong->count(),
            'tac_gia'=>$tac_gia,
            'gio_sach'=>$gio_sach 
        ]);
    }

    public function timKiem(Request $request)
    {
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        $key_word=$request->search;
        $sach=Sach::where('ten','like',"%$key_word%")->orWhere('mo_ta','like',"%$key_word%")->paginate('20');
        $so_luong=Sach::where('ten','like',"%$key_word%")->orWhere('mo_ta','like',"%$key_word%")->get();
        return view('client.tim_kiem',[
            'sach'=>$sach,
            'gio_sach'=>$gio_sach,
            'so_luong'=>$so_luong->count(),
            'key_word'=>$key_word
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

    public function showLove()
    {
        $sach=request()->input('sach');
        $da_thich=LichSu::where([['doc_gia_id',Auth::user()->id],['sach_id',$sach]])->first();
        if (!$da_thich) {
            LichSu::create([
                'doc_gia_id'=>Auth::user()->id,
                'sach_id'=>$sach,
                'da_xem'=>0,
                'da_thich'=>1
            ]);
            Sach::find($sach)->update(['luot_thich'=>Sach::find($sach)->luot_thich+1]);
        } else {
            if ($da_thich->da_thich==1) {
                LichSu::where([['doc_gia_id',Auth::user()->id],['sach_id',$sach]])
                ->update(['da_thich'=>0]);
                Sach::find($sach)->update(['luot_thich'=>Sach::find($sach)->luot_thich-1]);
            } elseif($da_thich->da_thich==0) {
                LichSu::where([['doc_gia_id',Auth::user()->id],['sach_id',$sach]])
                ->update(['da_thich'=>1]);
                Sach::find($sach)->update(['luot_thich'=>Sach::find($sach)->luot_thich+1]);
            }
        }
        return back();
    }

    public function handleBinhLuan(Request $request)
    {
        BinhLuan::create([
            'binh_luan_id'=>request()->input('tra_loi')?request()->input('tra_loi'):0,
            'sach_id'=>request()->input('sach'),
            'nguoi_dung_id'=>Auth::user()->id,
            'noi_dung'=>$request->binh_luan
        ]);
        return back();
    }

    public function showLienHe() 
    {
        $gio_sach=GioSach::where('doc_gia_id',Auth::user()->id)->get();
        return view('client.lien_he',['gio_sach'=>$gio_sach]);
    }
}
