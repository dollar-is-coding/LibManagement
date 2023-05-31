<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCreateReaderCardMail;
use App\Models\TacGia;
use App\Models\NhaXuatBan;
use App\Models\TheLoai;
use App\Models\KhuVuc;
use App\Models\Sach;
use App\Models\TuSach;
use App\Models\ThuVien;
use App\Models\nguoiDung;
use App\Models\TruongHoc;
use App\Models\DocGia;
use App\Models\PhieuMuonSach;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        $tu_sach =TuSach::all();
        return view('sach.create', ['tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc,'tu_sach'=>$tu_sach]);
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
            'ten' => $request->tu_sach,
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
        return view('sach.index',['ds_sach'=>Sach::orderBy('ten','asc')->paginate(10)]);
    }

    public function dsTimKiem(Request $request)
    {
        if ($request->sort=='desc_name') {
            $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','desc')->paginate(10);
        }
        if ($request->sort=='desc_year') {
            $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->orderBy('nam_xuat_ban','desc')->paginate(10);
        }
        $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->paginate(10);
        return view('sach.index',['ds_sach'=>$ds_sach]);
    }

    public function timKiemTheoTacGia(Request $request)
    {
        return view('sach.index',['ds_sach'=>Sach::where('tac_gia_id',$request->tac_gia_id)->orderBy('ten','asc')->paginate(10)]);
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
    public function suaTuSach($id, Request $request)
    {
        TuSach::find($id)->update([
            'ten' => $request->tu_sach,
            'khu_vuc_id' => $request->khu_vuc_id,
        ]);
        return redirect()->route('hien-thi-them');
    }

    public function themSachThuVien(Request $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            if ($file->isValid()) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('img/books'), $file_name);
                $request->merge(['hinh_anh' => $file_name]);
            }
        } else {
            $file_name = "";
            $request->merge(['hinh_anh' => $file_name]);
        }
        Sach::create([
            'ten'=>$request->ten_sach,
            'tac_gia_id'=>$request->tac_gia,
            'the_loai_id'=>$request->the_loai,
            'nha_xuat_ban_id'=>$request->nha_xuat_ban,
            'nam_xuat_ban'=>$request->nam_xuat_ban,
            'tom_tat'=>$request->tom_tat,
            'hinh_anh'=>$file_name,
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
        return view('quan_tri_vien.cap_tai_khoan');
    }
    public function quanLyTaiKhoan()
    {
        return view('quan_tri_vien.quan_ly_tai_khoan',['ds_tai_khoan'=>NguoiDung::paginate(1)]);
    }

    public function showCapThe()
    {
        return view('doc_gia.create',['date'=>Carbon::now()]);
    }

    public function handleCapThe(Request $request)
    {
        $existed_reader=DocGia::where('email',$request->email)->orWhere('so_dien_thoai',$request->so_dien_thoai)->first();
        if (!$existed_reader) {
            $array=explode('/', $request->ngay_sinh);
            if (blank(DocGia::latest()->first())) {
                $ma_so=date('y').date('m').'0001';
            } else {
                $latest_month_db=substr(DocGia::latest()->first()->ma_so,2,2);
                $latest_people_db=intval(substr(DocGia::latest()->first()->ma_so,4,4));
                if ($latest_month_db==date('m')) {
                    $ma_so=date('y').date('m').str_pad($latest_people_db+1, 4, '0', STR_PAD_LEFT);
                } else {
                    $ma_so=date('y').date('m').'0001';
                }
            }
            DocGia::create([
                'ma_so'=>$ma_so,
                'ho'=>$request->ho,
                'ten'=>$request->ten,
                'gioi_tinh'=>(int)$request->gioi_tinh,
                'so_dien_thoai'=>$request->so_dien_thoai,
                'email'=>$request->email,
                'ngay_sinh'=>date('Y/m/d', strtotime($array[2].'/'.$array[1].'/'.$array[0])),
                'dia_chi'=>$request->dia_chi,
                'lop'=>$request->lop,
                'sgk'=>0,
                'sach_khac'=>0
            ]);
            $mailData=[
                'title' => 'Chào mừng bạn đến với Libro',
                'ma_so'=>$ma_so,
                'ho'=>$request->ho,
                'ten'=>$request->ten,
                'gioi_tinh'=>(int)$request->gioi_tinh,
                'ngay_sinh'=>date('Y/m/d', strtotime($array[2].'/'.$array[1].'/'.$array[0])),
                'lop'=>$request->lop,
                'dia_chi'=>$request->dia_chi
            ];
            $mailable=new SendCreateReaderCardMail($mailData);
            Mail::to($request->email)->send($mailable);
            return redirect()->route('cap-the-doc-gia');
        } else {
            return back()->with('error','Số điện thoại hoặc email đã được sử dụng');
        }
    }

    public function suaSach($id)
    {
        $sach = ThuVien::where('sach_id', $id)->get();
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        $tu_sach =TuSach::all();
        return view('sach.edit', ['sach' => $sach, 'tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc, 'tu_sach' => $tu_sach]);
    }

    public function xuLySuaSach($id, Request $request){
        Sach::find($id)->update([
            'ten' => $request->ten_sach,
            'tac_gia_id' => $request->tac_gia,
            'the_loai_id' =>$request->the_loai,
            'nha_xuat_ban_id' =>$request->nha_xuat_ban,
            'nam_xuat_ban' => $request->nam_xuat_ban,
            'tom_tat' => $request->tom_tat,
        ]);
        $img = Sach::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/books'), $filename);
            $img->hinh_anh = $filename;
        }
        $img->save();
        ThuVien::find($id)->update([
            'tu_sach_id' => $request->tu_sach,
            'so_luong' => $request->so_luong,
        ]);
        return back();
    }

    public function showMuonSachList()
    {
        $ds_doc_gia=DocGia::where('sgk','>',0)->orWhere('sach_khac','>',0)->paginate(10);
        return view('doc_gia.index',['ds_doc_gia'=>$ds_doc_gia]);
    }

    public function showChiTietDocGia($id)
    {
        $doc_gia=DocGia::find($id);
        $sach_muon=PhieuMuonSach::where('doc_gia_id',$id)->get();
        return view('doc_gia.detail',['doc_gia'=>$doc_gia,'sach'=>$sach_muon]);
    }

    public function showReaderCard()
    {
        return view('xac_thuc_email.reader_card');
    }
}
