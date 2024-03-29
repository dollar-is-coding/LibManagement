<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use App\Models\GioSach;
use App\Models\LichSuSach;
use App\Models\PhieuMuonSach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\BinhLuan;
use App\Models\LichSuTinTuc;
use App\Models\TinTuc;
use App\Models\NguoiDung;
use App\Models\ThuVien;
use App\Models\PhieuPhat;
use App\Models\LienHe;
use Illuminate\Support\Arr;

class ClientController extends Controller
{
    public function index()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        // Book recc
        $book_recc = Sach::where('de_xuat', 1)->get();

        // Hiện thị thể loại
        $the_loai = Sach::groupBy('the_loai_id')
            ->select('the_loai_id', Sach::raw('count(*) as total'))
            ->get();

        // Sách mới hàng tuần
        $start_of_week = Carbon::now()->startOfWeek();
        $end_of_week = Carbon::now()->endOfWeek();
        $sach_moi = Sach::where([
            ['created_at', '>=', $start_of_week],
            ['created_at', '<=', $end_of_week]
        ])->take(4)->get();

        // Tháng này đọc gì
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $xu_huong = PhieuMuonSach::where([
            ['created_at', '>=', $start_of_month],
            ['created_at', '<=', $end_of_month],
            ['trang_thai', '>', 1]
        ])->groupBy('sach_id')
            ->select('sach_id', PhieuMuonSach::raw('count(*) as total'))
            ->orderBy('total', 'desc')
            ->get();

        return view('client.index', [
            'de_xuat' => $book_recc,
            'the_loai' => $the_loai,
            'sach_moi' => $sach_moi,
            'gio_sach' => $gio_sach,
            'xu_huong' => $xu_huong
        ]);
    }

    public function chiTietSach()
    {
        $id = request()->input('id');
        $matrix = PhieuMuonSach::where('sach_id', $id)->get();
        $relative = [];
        foreach ($matrix as $key => $value) {
            $relative[] = $value->ma_phieu_muon;
        }
        $lien_quan = PhieuMuonSach::whereIn('ma_phieu_muon', $relative)->where('sach_id', '!=', $id)->groupBy('sach_id')
            ->select('sach_id', PhieuMuonSach::raw('count(*) as total'))
            ->orderBy('total', 'desc')->take(6)->get();
        $gio_sach = null;
        $ds_da_xem = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
            $da_xem = LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $id]])->first();
            $ds_da_xem = LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', '!=', $id]])->orderBy('updated_at', 'desc')->take(6)->get();
            if (!$da_xem) {
                LichSuSach::create([
                    'doc_gia_id' => Auth::user()->id,
                    'sach_id' => $id,
                    'da_xem' => 1,
                    'da_thich' => 0
                ]);
                Sach::find($id)->update([
                    'luot_xem' => Sach::find($id)->luot_xem + 1
                ]);
            } else {
                LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $id]])
                    ->update(['da_xem' => 1]);
            }
        }
        $sach = Sach::find($id);
        $tac_gia = Sach::find($id)->tac_gia_id;
        $cung_tac_gia = Sach::where([['tac_gia_id', $tac_gia], ['id', '!=', $id]])->get();
        $binh_luan = BinhLuan::where([['sach_id', $id], ['binh_luan_id', 0]])->get();
        $phan_hoi = BinhLuan::where([['sach_id', $id], ['binh_luan_id', '!=', 0]])->orderBy('created_at', 'DESC')->get();
        $can_comment = 0;
        foreach ($sach->hasPhieuMuon as $key => $value) {
            if ($value->doc_gia_id == Auth::id() && $value->trang_thai == 3 && $value->sach_id == $id) {
                $can_comment = 1;
                break;
            }
        }
        $dang_muon = PhieuMuonSach::where([['sach_id', $id], ['trang_thai', 2]])->get();
        $da_muon = PhieuMuonSach::where([['sach_id', $id], ['trang_thai', 3]])->get();
        return view('client.chi_tiet_sach', [
            'sach' => $sach,
            'gio_sach' => $gio_sach,
            'cung_tac_gia' => $cung_tac_gia,
            'ds_da_xem' => $ds_da_xem,
            'binh_luan' => $binh_luan,
            'da_muon' => $can_comment,
            'lien_quan' => $lien_quan,
            'phan_hoi' => $phan_hoi,
            'dang_muon' => $dang_muon->count(),
            'so_lan_da_muon' => $da_muon->count()
        ]);
    }


    // List of Book
    public function danhMucSach()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        $the_loai = TheLoai::all();
        return view('client.ds_sach.the_loai_sach', [
            'gio_sach' => $gio_sach,
            'the_loai' => $the_loai,
        ]);
    }
    public function sachTheoChuDe()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        $dieu_kien = request()->input('dieu_kien');
        // 1. Sách mới hàng tuần
        if ($dieu_kien == 1) {
            $start_of_week = Carbon::now()->startOfWeek();
            $end_of_week = Carbon::now()->endOfWeek();
            $sach = Sach::where([
                ['created_at', '>=', $start_of_week],
                ['created_at', '<=', $end_of_week]
            ])->paginate('10');
            $so_luong = Sach::where([
                ['created_at', '>=', $start_of_week],
                ['created_at', '<=', $end_of_week]
            ])->get();
            return view('client.ds_sach.sach_theo_chu_de', [
                'dieu_kien' => 1,
                'gio_sach' => $gio_sach,
                'sach' => $sach,
                'so_luong' => $so_luong->count(),
                'bat_dau' => $start_of_week,
                'ket_thuc' => $end_of_week,
            ]);
        }
        // 2. Sách theo tác giả
        if ($dieu_kien == 2) {
            $id = request()->input('tac_gia');
            $tac_gia = TacGia::find($id);
            $sach = Sach::where('tac_gia_id', $id)->paginate('10');
            $so_luong = Sach::where('tac_gia_id', $id)->get();
            return view('client.ds_sach.sach_theo_chu_de', [
                'dieu_kien' => 2,
                'gio_sach' => $gio_sach,
                'tac_gia' => $tac_gia,
                'sach' => $sach,
                'so_luong' => $so_luong->count(),
            ]);
        }
        // 3. Sách theo thể loại
        if ($dieu_kien == 3) {
            $id = request()->input('the_loai');
            $the_loai = TheLoai::find($id);
            $sach = Sach::where('the_loai_id', $id)->paginate('10');
            $so_luong = Sach::where('the_loai_id', $id)->get();
            return view('client.ds_sach.sach_theo_chu_de', [
                'dieu_kien' => 3,
                'gio_sach' => $gio_sach,
                'the_loai' => $the_loai,
                'sach' => $sach,
                'so_luong' => $so_luong->count(),
            ]);
        }
        return back();
    }
    public function thangNayDocGi()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        $start_of_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();
        $end_of_month = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth();
        $xu_huong = PhieuMuonSach::where([
            ['updated_at', '>=', $start_of_month],
            ['updated_at', '<=', $end_of_month],
            ['trang_thai', '>', 1]
        ])
            ->groupBy('sach_id')
            ->select('sach_id', PhieuMuonSach::raw('count(*) as total'))
            ->take(15)->get();
        return view('client.ds_sach.thang_nay_doc_gi', ['xu_huong' => $xu_huong, 'gio_sach' => $gio_sach]);
    }
    public function timKiem(Request $request)
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        $key_word = $request->search;
        $ma_sach = Sach::where('ma_sach', $request->search)->first();
        if ($ma_sach) {
            return redirect()->route('thong-tin-sach', ['id' => $ma_sach->id]);
        }
        $sach = Sach::where('ten', 'like', "%$key_word%")->orWhere('mo_ta', 'like', "%$key_word%")->paginate('20');
        $so_luong = Sach::where('ten', 'like', "%$key_word%")->orWhere('mo_ta', 'like', "%$key_word%")->get();
        return view('client.ds_sach.tim_kiem', [
            'sach' => $sach,
            'gio_sach' => $gio_sach,
            'so_luong' => $so_luong->count(),
            'key_word' => $key_word
        ]);
    }


    // Show - Add - Remove Book from Cart
    public function handleGioSach()
    {
        if (request()->input('gio_sach') == 'Chọn sách') {
            $gio_sach = GioSach::where([
                ['sach_id', request()->input('sach')],
                ['doc_gia_id', Auth::user()->id]
            ])->first();
            if (!$gio_sach) {
                GioSach::create([
                    'doc_gia_id' => Auth::user()->id,
                    'sach_id' => request()->input('sach')
                ]);
            }
            return response()->json(['data' => 'success']);
        }
        GioSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', request()->input('sach')]])->delete();
        return response()->json(['data' => 'success']);
    }
    public function loaiKhoiGioSach()
    {
        $sach = request()->input('id');
        GioSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $sach]])->delete();
        return response()->json(['message' => 'success']);
    }
    public function showGioSach()
    {
        $phieu_muon = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 1]])
            ->orWhere([['doc_gia_id', Auth::user()->id], ['trang_thai', 2]])->get();
        $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->paginate('10');
        return view('client.gio_sach', [
            'gio_sach' => $gio_sach,
            'phieu_muon' => $phieu_muon
        ]);
    }


    // Thêm phiếu mượn sách
    public function handleMuonSach(Request $request)
    {
        // Kiểm tra đang có phiếu chờ nào không
        $phieu_muon = PhieuMuonSach::latest()->first();
        $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        // Kiểm tra có checkbox ALL hay không
        $tong_so_luong = count($request->all()) - 1;
        if (Arr::has($request->all(), 'all')) {
            $tong_so_luong = count($request->all()) - 2;
        }

        // Cập nhật thêm sách vào phiếu chờ duyệt
        if (PhieuMuonSach::first() && $phieu_muon->doc_gia_id == Auth::id() && $phieu_muon->trang_thai == 1) {
            PhieuMuonSach::where('ma_phieu_muon', $phieu_muon->ma_phieu_muon)->update([
                'tong_so_luong' => $tong_so_luong + $phieu_muon->tong_so_luong
            ]);
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key != 'all') {
                    PhieuMuonSach::create([
                        'ma_phieu_muon' => $phieu_muon->ma_phieu_muon,
                        'doc_gia_id' => Auth::user()->id,
                        'thu_thu_id' => null,
                        'sach_id' => $key,
                        'so_luong' => 1,
                        'han_tra' => date('Y/m/d', strtotime(date('Y/m/d') . ' + 14 days')),
                        'tong_so_luong' => $tong_so_luong + $phieu_muon->tong_so_luong
                    ]);
                    GioSach::where([['sach_id', $key], ['doc_gia_id', Auth::id()]])->delete();
                    ThuVien::where('sach_id', $key)->update([
                        'sl_con_lai' => ThuVien::where('sach_id', $key)->first()->sl_con_lai - 1
                    ]);
                }
            }
            // Tạo phiếu chờ duyệt mới
        } else {
            if (blank(PhieuMuonSach::latest()->first())) {
                $ma_so = date('y') . date('m') . '0001';
            } else {
                $latest_month_db = substr(PhieuMuonSach::latest()->first()->ma_phieu_muon, 2, 2);
                $latest_pms_db = intval(substr(PhieuMuonSach::latest()->first()->ma_phieu_muon, 4, 4));
                if ($latest_month_db === date('m')) {
                    $ma_so = date('y') . date('m') . str_pad($latest_pms_db + 1, 4, '0', STR_PAD_LEFT);
                } else {
                    $ma_so = date('y') . date('m') . '0001';
                }
            }
            foreach ($request->all() as $key => $value) {
                if ($key != '_token' && $key != 'all') {
                    PhieuMuonSach::create([
                        'ma_phieu_muon' => $ma_so,
                        'doc_gia_id' => Auth::user()->id,
                        'thu_thu_id' => null,
                        'sach_id' => $key,
                        'so_luong' => 1,
                        'han_tra' => date('Y/m/d', strtotime(date('Y/m/d') . ' + 14 days')),
                        'tong_so_luong' => $tong_so_luong
                    ]);
                    GioSach::where([['sach_id', $key], ['doc_gia_id', Auth::id()]])->delete();
                    ThuVien::where('sach_id', $key)->update([
                        'sl_con_lai' => ThuVien::where('sach_id', $key)->first()->sl_con_lai - 1
                    ]);
                }
            }
        }
        $cho_duyet = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 1]])->get();
        return redirect()->route('tai-khoan-cua-toi', ['gio_sach' => $gio_sach, 'cho_duyet' => $cho_duyet]);
    }

    public function cancelPhieuMuon()
    {
        $ma_phieu_cho = request()->input('ma_phieu_muon');
        $ds_phieu = PhieuMuonSach::where('ma_phieu_muon', $ma_phieu_cho)->get();
        foreach ($ds_phieu as $key => $value) {
            ThuVien::where('sach_id', $value->sach_id)
                ->update(['sl_con_lai' => ThuVien::where('sach_id', $value->sach_id)
                    ->first()->sl_con_lai + 1]);
        }
        PhieuMuonSach::where('ma_phieu_muon', $ma_phieu_cho)->update(['trang_thai' => 0]);
        return back();
    }


    // Interact
    public function showLove()
    {
        $sach = request()->input('sach');
        $da_thich = LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $sach]])->first();
        if (!$da_thich) {
            LichSuSach::create([
                'doc_gia_id' => Auth::user()->id,
                'sach_id' => $sach,
                'da_xem' => 0,
                'da_thich' => 1
            ]);
            Sach::find($sach)->update(['luot_thich' => Sach::find($sach)->luot_thich + 1]);
        } else {
            if ($da_thich->da_thich == 1) {
                LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $sach]])
                    ->update(['da_thich' => 0]);
                Sach::find($sach)->update(['luot_thich' => Sach::find($sach)->luot_thich - 1]);
            } elseif ($da_thich->da_thich == 0) {
                LichSuSach::where([['doc_gia_id', Auth::user()->id], ['sach_id', $sach]])
                    ->update(['da_thich' => 1]);
                Sach::find($sach)->update(['luot_thich' => Sach::find($sach)->luot_thich + 1]);
            }
        }
        return back();
    }
    public function handleBinhLuan(Request $request)
    {
        $sach = request()->input('sach');
        Sach::find($sach)->update([
            'luot_binh_luan' => Sach::find($sach)->luot_binh_luan + 1
        ]);
        BinhLuan::create([
            'binh_luan_id' => request()->input('tra_loi') ? request()->input('tra_loi') : 0,
            'sach_id' => $sach,
            'nguoi_dung_id' => Auth::user()->id,
            'noi_dung' => $request->binh_luan
        ]);
        $new_binh_luan = BinhLuan::latest()->first();
        if (request()->input('tra_loi')) {
            $url = url('/thong-tin-sach?id=' . $sach . '&binh_luan=' . request()->input('tra_loi') . '&phan_hoi=' . $new_binh_luan->id . '#binh_luan_' . $new_binh_luan->id);
        } else {
            $url = url('/thong-tin-sach?id=' . $sach . '&binh_luan=' . $new_binh_luan->id . '&phan_hoi=0' . '#binh_luan_' . $new_binh_luan->id);
        }
        return redirect($url);
    }

    public function xoaBinhLuan()
    {
        $binh_luan = request()->input('id');
        if (request()->input('binh_luan_chinh')) {
            $rows = BinhLuan::where('id', $binh_luan)->orWhere('binh_luan_id', $binh_luan)->delete();
        } else {
            $rows = BinhLuan::find($binh_luan)->delete();
        }
        return response()->json(['rows' => $rows]);
    }


    // Info
    public function showCaNhan()
    {
        $da_muon_sl = PhieuMuonSach::where([['doc_gia_id', Auth::id()], ['trang_thai', 3]])
            ->distinct('sach_id')->select('sach_id')->get();
        $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        $phieu_huy = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 0]])->orderBy('ma_phieu_muon', 'DESC')->get();
        $cho_duyet = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 1]])->get();
        $dang_muon = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 2]])->orderBy('ma_phieu_muon', 'DESC')->get();
        $da_tra = PhieuMuonSach::where([['doc_gia_id', Auth::user()->id], ['trang_thai', 3]])->orderBy('ma_phieu_muon', 'DESC')->get();
        $phieu_phat = PhieuPhat::where('doc_gia_id', Auth::id())->orderBy('ma_phieu', 'DESC')->get();
        return view('client.trang_ca_nhan', [
            'gio_sach' => $gio_sach,
            'phieu_huy' => $phieu_huy,
            'cho_duyet' => $cho_duyet,
            'dang_muon' => $dang_muon,
            'da_tra' => $da_tra,
            'phieu_phat' => $phieu_phat,
            'sach_da_muon' => $da_muon_sl->count()
        ]);
    }
    public function handleCapNhatThongTin(Request $request)
    {
        $img = NguoiDung::find(Auth::id());
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


    public function showLienHe()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        return view('client.lien_he', ['gio_sach' => $gio_sach]);
    }
    public function showTinTuc()
    {
        $gio_sach = null;
        if (Auth::check()) {
            $gio_sach = GioSach::where('doc_gia_id', Auth::user()->id)->get();
        }
        if (request()->input('tin_tuc')) {
            $isNoiBat = 0;
            $noi_bat = TinTuc::find(request()->input('tin_tuc'));
            $tin_tuc = TinTuc::where('noi_bat', 0)->where('id', '!=', request()->input('tin_tuc'))
                ->orderBy('created_at', 'DESC')->take(6)->get();
            TinTuc::find(request()->input('tin_tuc'))->update(['luot_xem' => $noi_bat->luot_xem + 1]);
        } else {
            $noi_bat = TinTuc::where('noi_bat', 1)->first();
            $tin_tuc = TinTuc::where('noi_bat', 0)->orderBy('created_at', 'DESC')->take(6)->get();
            $isNoiBat = 1;
            if ($noi_bat) {
                TinTuc::find($noi_bat->id)->update(['luot_xem' => $noi_bat->luot_xem + 1]);
            }
        }
        return view('client.tin_tuc', [
            'gio_sach' => $gio_sach,
            'noi_bat' => $noi_bat,
            'tin_tuc' => $tin_tuc,
            'is_noi_bat' => $isNoiBat
        ]);
    }
    public function sendLienHe(Request $request)
    {
        LienHe::create(['tieu_de' => $request->tieu_de, 'noi_dung' => $request->noi_dung]);
        return back();
    }

    public function showThayDoiMatKhau()
    {
        return view('client.thay_doi_mat_khau');
    }
}
