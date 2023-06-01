<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCreateReaderCardMail;
use App\Mail\SendMailCreateUser;
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
use App\Http\Requests\CapTheRequest;
use App\Http\Requests\SachRequest;

class AdminController extends Controller
{
    // THÊM MỚI sách - tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function showThemSach()
    {
        $tac_gia = TacGia::all();
        $nha_xuat_ban = NhaXuatBan::all();
        $the_loai = TheLoai::all();
        $khu_vuc = KhuVuc::all();
        $tu_sach =TuSach::all();
        return view('sach.create', ['tac_gia' => $tac_gia, 'nha_xuat_ban' => $nha_xuat_ban, 'the_loai' => $the_loai, 'khu_vuc' => $khu_vuc,'tu_sach'=>$tu_sach]);
    }
    public function themSachThuVien(SachRequest $request)
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
        $ten_sach=$request->old('ten_sach');
        $tac_gia=$request->old('tac_gia');
        $the_loai=$request->old('the_loai');
        $nha_xuat_ban=$request->old('nha_xuat_ban');
        $so_luong=$request->old('so_luong');
        $nam_xuat_ban=$request->old('nam_xuat_ban');
        $khu_vuc=$request->old('khu_vuc');
        $tu_sach=$request->old('tu_sach');
        $tom_tat=$request->old('tom_tat');
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
    public function themTacGia(Request $request)
    {
        if ($request->tac_gia!='') {
            TacGia::create(['ten' => $request->tac_gia]);
            return redirect()->route('hien-thi-them');
        }
        return back()->with('error','Tác giả không được bỏ trống');
    }
    public function themNhaXuatBan(Request $request)
    {
        if ($request->nha_xuat_ban!='') {
            NhaXuatBan::create(['ten' => $request->nha_xuat_ban]);
            return redirect()->route('hien-thi-them');
        }
        return back()->with('error','Nhà xuất bản không được bỏ trống');
    }
    public function themTheLoai(Request $request)
    {
        if ($request->the_loai!='') {
            TheLoai::create(['ten' => $request->the_loai]);
            return redirect()->route('hien-thi-them');
        }
        return back()->with('error','Thể loại không được bỏ trống');
    }
    public function themKhuVuc(Request $request)
    {
        if ($request->khu_vuc!='') {
            KhuVuc::create(['ten' => $request->khu_vuc]);
            return redirect()->route('hien-thi-them');
        }
        return back()->with('error','Khu vực không được bỏ trống');
    }
    public function themTuSach(Request $request)
    {
        if ($request->tu_sach!='') {
            TuSach::create([
                'ten' => $request->tu_sach,
                'khu_vuc_id'=>$request->khu_vuc_id,
            ]);
            return redirect()->route('hien-thi-them');
        }
        return back()->with('error','Tủ sách không được bỏ trống');
    }


    // CHỈNH SỬA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function suaTacgia($id, Request $request)
    {
        TacGia::find($id)->update(['ten' => $request->tac_gia]);
        return redirect()->route('hien-thi-them');
    }
    public function suaNhaXuatBan($id, Request $request)
    {
        NhaXuatBan::find($id)->update(['ten' => $request->nha_xuat_ban]);
        return redirect()->route('hien-thi-them');
    }
    public function suaTheLoai($id, Request $request)
    {
        TheLoai::find($id)->update(['ten' => $request->the_loai]);
        return redirect()->route('hien-thi-them');
    }
    public function suaKhuVuc($id, Request $request)
    {
        KhuVuc::find($id)->update(['ten' => $request->khu_vuc]);
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


    // CHỈNH SỬA sách
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


    // XÓA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
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


    // XEM, TÌM KIẾM & CHI TIẾT sách
    public function dsSach()
    {
        $sach=Sach::orderBy('ten','asc')->paginate(10);
        return view('sach.index',['ds_sach'=>$sach,'selected'=>'asc_name','search'=>'']);
    }
    public function dsTimKiem(Request $request)
    {
        $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->paginate(10);
        if ($request->sort=='desc_name') {
            $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','desc')->paginate(10);
        }
        if ($request->sort=='desc_year') {
            $ds_sach=Sach::where('ten','like','%'.$request->tim_kiem.'%')->orderBy('ten','asc')->orderBy('nam_xuat_ban','desc')->paginate(10);
        }
        return view('sach.index',['ds_sach'=>$ds_sach,'search'=>$request->tim_kiem,'selected'=>$request->sort]);
    }
    public function timKiemTheoTacGia(Request $request)
    {
        $sach=Sach::where('tac_gia_id',$request->tac_gia_id)->orderBy('ten','asc')->paginate(10);
        return view('sach.index',['ds_sach'=>$sach,'search'=>'','selected'=>'asc_name']);
    }
    public function chiTietSach($id)
    {
        $sach=ThuVien::where('sach_id',$id)->get();
        $sl_nguoi_muon=PhieuMuonSach::where('sach_id',$id)->get()->count();
        return view('sach.detail',['sach'=>$sach,'sl_nguoi_muon'=>$sl_nguoi_muon]);
    }


    // CẤP THẺ độc giả
    public function showCapThe()
    {
        return view('doc_gia.create',['date'=>Carbon::now()]);
    }
    public function handleCapThe(CapTheRequest $request)
    {
        $existed_reader=DocGia::where('email',$request->email)->orWhere('so_dien_thoai',$request->so_dien_thoai)->first();
        $ho=$request->old('ho');
        $ten=$request->old('ten');
        $lop=$request->old('lop');
        $so_dien_thoai=$request->old('so_dien_thoai');
        $ngay_sinh=$request->old('ngay_sinh');
        $dia_chi=$request->old('dia_chi');
        $email=$request->old('email');
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
            $validate=DocGia::create([
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
            
            $mailData = [
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


    // XEM, TÌM KIẾM & CHI TIẾT độc giả
    public function showDocGiaList()
    {
        $ds_doc_gia=DocGia::paginate(10);
        return view('doc_gia.index',['ds_doc_gia'=>$ds_doc_gia,'tim_kiem'=>'','sap_xep'=>'all']);
    }
    public function handleDocGiaSearch(Request $request)
    {
        $doc_gia=DocGia::where('ma_so','like','%'.$request->tim_kiem.'%')
            ->orderBy('ma_so','asc')
            ->paginate(10);
        if ($request->sap_xep=='borrowing') {
            $doc_gia=DocGia::where([['ma_so','like','%'.$request->tim_kiem.'%'],['sach_khac','>',0]])
                ->orWhere([['ma_so','like','%'.$request->tim_kiem.'%'],['sgk','>',0]])
                ->paginate(10);
        }
        return view('doc_gia.index',
            ['ds_doc_gia'=>$doc_gia,'tim_kiem'=>$request->tim_kiem,'sap_xep'=>$request->sap_xep]);
    }
    public function showChiTietDocGia($id)
    {
        $doc_gia=DocGia::find($id);
        $sach_muon=PhieuMuonSach::where('doc_gia_id',$id)->get();
        return view('doc_gia.detail',['doc_gia'=>$doc_gia,'sach'=>$sach_muon]);
        return back()->redirect('hien-thi-doc-gia');
    }


    // Cấp tài khoản - quản lý tài khoản
    public function capTaiKhoan()
    {
        return view('quan_tri_vien.cap_tai_khoan');
    }
    public function xuLyTaoTaiKhoan(Request $request)
    {
        $user = NguoiDung::where('email', $request->email)->first();
        if (!$user) {
            session()->put('mat_khau', $request->password);
            $user = NguoiDung::create([
                'email' => $request->email,
                'mat_khau' => Hash::make($request->password),
                'ho' => $request->ho,
                'ten' => $request->ten,
                'anh_dai_dien' => '',
                'vai_tro' => $request->vai_tro,
                'gioi_tinh' => $request->gioi_tinh,
            ]);
            $this->taoTaiKhoan($user);
            return redirect()->route('tao-tai-khoan');
        } else {
            return redirect()->back()->with('errorMail', 'Email đã tồn tại');
        }
    }
    public function taoTaiKhoan($user)
    {
        $mailData = [
                'title' => 'Chào mừng bạn đến với Libro',
                'body' => 'Vui lòng không chia sẻ tài khoản này với ai',
                'name' => $user['ten'],
                'email' => $user['email'],
                'mat_khau' => session()->get('mat_khau'),
            ];
        session()->forget('mat_khau');
        $mailable = new SendMailCreateUser($mailData);
        Mail::to($user['email'])->send($mailable);
        return redirect()->route('tao-tai-khoan');
    }
    public function quanLyTaiKhoan()
    {
        return view('quan_tri_vien.quan_ly_tai_khoan',['ds_tai_khoan'=>NguoiDung::paginate(10)]);
    }
}
