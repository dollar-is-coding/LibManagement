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
use App\Models\TruongHoc;
use App\Models\DocGia;
use App\Models\PhieuMuonSach;
use Carbon\Carbon;
use LaravelQRCode\Facades\QRCode;
use LaravelQRCode\QRCodeFactory;
use App\Http\Requests\CapTheRequest;
use App\Http\Requests\SachRequest;
use App\Http\Requests\CapTaiKhoanRequest;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ExcelImport;
use App\Imports\ExcelImportThuVien;
use App\Models\NguoiDung;
use App\Models\TinTuc;
use Illuminate\Contracts\Session\Session;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException;

use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{

    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        Excel::import(new ExcelImportThuVien,$path);
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }

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
        $tangsl = Sach::where('ten',$request->ten_sach)->where('tac_gia_id', $request->tac_gia)->where('the_loai_id', $request->the_loai)->where('nha_xuat_ban_id', $request->nha_xuat_ban)->where('nam_xuat_ban', $request->nam_xuat_ban)->first();
        $randomDateTime = Carbon::now()->addDays(random_int(0, 30));
        $randomTime = $randomDateTime->format('YmdHis');
        if(!$tangsl){
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
            $ten_sach = $request->old('ten_sach');
            $tac_gia = $request->old('tac_gia');
            $the_loai = $request->old('the_loai');
            $nha_xuat_ban = $request->old('nha_xuat_ban');
            $so_luong = $request->old('so_luong');
            $nam_xuat_ban = $request->old('nam_xuat_ban');
            $khu_vuc = $request->old('khu_vuc');
            $tu_sach = $request->old('tu_sach');
            $mo_ta = $request->old('mo_ta');
           
            Sach::create([
                'ma_sach' => $randomTime,
                'ten' => $request->ten_sach,
                'tac_gia_id' => $request->tac_gia,
                'the_loai_id' => $request->the_loai,
                'nha_xuat_ban_id' => $request->nha_xuat_ban,
                'nam_xuat_ban' => $request->nam_xuat_ban,
                'mo_ta' => $request->mo_ta,
                'hinh_anh' => $file_name,
            ]);
            ThuVien::create([
                'sach_id' =>Sach::latest()->first()->id,
                'tu_sach_id' => $request->tu_sach,
                'khu_vuc_id' => $request->khu_vuc,
                'sl_con_lai' => $request->so_luong,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }else{
            $soluongbandau = ThuVien::where('sach_id', $tangsl->id)->first();
            ThuVien::where('sach_id', $tangsl->id)->update([
                 'sl_con_lai'=>($soluongbandau->sl_con_lai + $request->so_luong)
             ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }
    }
    public function themTacGia(Request $request)
    {
        if ($request->tac_gia != '') {
            $tacgia = TacGia::where('ten', $request->tac_gia)->first();
            if (!$tacgia) {
                TacGia::create(['ten' => $request->tac_gia]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            } else {
                return back()->with('error_r', 'Tên tác giả đã tồn tại');
            }
        }
        return back()->with('error', 'Tác giả không được bỏ trống');
    }

    public function themNhaXuatBan(Request $request)
    {
        if ($request->nha_xuat_ban!='') {
            $nxb = NhaXuatBan::where('ten',$request->nha_xuat_ban)->first();
            if(!$nxb){
                NhaXuatBan::create(['ten' => $request->nha_xuat_ban]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            }else{
                return back()->with('error_r', 'Tên nhà xuất bản đã tồn tại');
            }
        }
        return back()->with('error','Nhà xuất bản không được bỏ trống');
    }
    public function themTheLoai(Request $request)
    {
        if ($request->the_loai!='') {
            $theloai = TheLoai::where('ten', $request->the_loai)->first();
           if(!$theloai){
                TheLoai::create(['ten' => $request->the_loai]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
           }else{
                return back()->with('error_r', 'Tên thể loại đã tồn tại');
           }
        }
        return back()->with('error','Thể loại không được bỏ trống');
    }
    public function themKhuVuc(Request $request)
    {
        if ($request->khu_vuc!='') {
            $khuvuc = KhuVuc::where('ten',$request->khu_vuc)->first();
            if(!$khuvuc){
                KhuVuc::create(['ten' => $request->khu_vuc]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            }else{
                return back()->with('error_r', 'Tên khu vực đã tồn tại');
            }
        }
        return back()->with('error','Khu vực không được bỏ trống');
    }
    public function themTuSach(Request $request)
    {
        if ($request->tu_sach!='') {
            $tusach = TuSach::where('ten', $request->tu_sach)->where('khu_vuc_id', $request->khu_vuc_id)->first();
            if(!$tusach){
                TuSach::create([
                    'ten' => $request->tu_sach,
                    'khu_vuc_id' => $request->khu_vuc_id,
                ]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-them-sach');
            }else {
                return back()->with('error_r', 'Tủ sách đã tồn tại');
            }
            
        }
        return back()->with('error','Tủ sách không được bỏ trống');
    }


    // CHỈNH SỬA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function suaTacgia($id, Request $request)
    {
        $tacgia = TacGia::where('ten', $request->tac_gia)->first();
        if(!$tacgia){
            TacGia::find($id)->update(['ten' => $request->tac_gia]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }
        else{
            return back()->with('error_r', 'Tên tác giả đã tồn tại');
        }
        
    }
    public function suaNhaXuatBan($id, Request $request)
    {
        $nxb = NhaXuatBan::where('ten', $request->nha_xuat_ban)->first();
        if(!$nxb){
            NhaXuatBan::find($id)->update(['ten' => $request->nha_xuat_ban]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }else{
            return back()->with('error_r', 'Tên nhà xuất bản đã tồn tại');
        }
       
    }
    public function suaTheLoai($id, Request $request)
    {
        $theloai = TheLoai::where('ten', $request->the_loai)->first();
        if(!$theloai){
            TheLoai::find($id)->update(['ten' => $request->the_loai]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }else{
            return back()->with('error_r', 'Tên thể loại đã tồn tại');
        }
        
    }
    public function suaKhuVuc($id, Request $request)
    {
        $khuvuc = KhuVuc::where('ten', $request->khu_vuc)->first();
        if(!$khuvuc){
            KhuVuc::find($id)->update(['ten' => $request->khu_vuc]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }else{
            return back()->with('error_r', 'Tên khu vực đã tồn tại');
        }
        
    }
    public function suaTuSach($id, Request $request)
    {
        $tusach = TuSach::where('ten', $request->tu_sach)->where('khu_vuc_id', $request->khu_vuc_id)->first();
        if(!$tusach){
            TuSach::find($id)->update([
                'ten' => $request->tu_sach,
                'khu_vuc_id' => $request->khu_vuc_id,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return redirect()->route('hien-thi-them-sach');
        }else{
            return back()->with('error_r', 'Tên tủ sách đã tồn tại');
        }
        
        return redirect()->route('hien-thi-them-sach');
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
    public function xuLySuaSach($id,$id_tv, SachRequest $request)
    {
        $tangsl = Sach::where('ten', $request->ten_sach)->where('tac_gia_id', $request->tac_gia)->where('the_loai_id', $request->the_loai)->where('nha_xuat_ban_id', $request->nha_xuat_ban)->where('nam_xuat_ban', $request->nam_xuat_ban)->first();
        if($tangsl){
            if (strval($tangsl->id) === $request->id_sach) {
                Sach::find($id)->update([
                    'ten' => $request->ten_sach,
                    'tac_gia_id' => $request->tac_gia,
                    'the_loai_id' => $request->the_loai,
                    'nha_xuat_ban_id' => $request->nha_xuat_ban,
                    'nam_xuat_ban' => $request->nam_xuat_ban,
                    'mo_ta' => $request->mo_ta,
                ]);
                $img = Sach::find($id);
                if ($request->has('file')) {
                    $file = $request->file;
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('img/books'), $filename);
                    $img->hinh_anh = $filename;
                }
                $img->save();
                ThuVien::where('sach_id', $tangsl->id)->update([
                    'tu_sach_id' => $request->tu_sach,
                    'sl_con_lai' => $request->so_luong,
                ]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return back();
            } else{
                $soluongbandau = ThuVien::where('sach_id', $tangsl->id)->first();
                ThuVien::where('sach_id', $tangsl->id)->update([
                    'sl_con_lai' => ($soluongbandau->sl_con_lai + $request->so_luong),
                    'sach_id' => $tangsl->id
                ]);
                Sach::find($id)->delete();
                ThuVien::where('sach_id', $tangsl->id)->delete();
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('hien-thi-sach');
            }
        }else{
            Sach::find($id)->update([
                'ten' => $request->ten_sach,
                'tac_gia_id' => $request->tac_gia,
                'the_loai_id' => $request->the_loai,
                'nha_xuat_ban_id' => $request->nha_xuat_ban,
                'nam_xuat_ban' => $request->nam_xuat_ban,
                'mo_ta' => $request->mo_ta,
            ]);
            $img = Sach::find($id);
            if ($request->has('file')) {
                $file = $request->file;
                $filename = $file->getClientOriginalName();
                $file->move(public_path('img/books'), $filename);
                $img->hinh_anh = $filename;
            }
            $img->save();
            ThuVien::where('sach_id', $id_tv)->update([
                'tu_sach_id' => $request->tu_sach,
                'sl_con_lai' => $request->so_luong,
            ]);
            FacadesSession::flash('success', 'Xử lý thành công');
            return back();
        }
    }


    // XÓA tác giả - thể loại - nhà xuất bản - khu vực - tủ sách
    public function xoaTacGia($id)
    {
        TacGia::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaNhaXuatBan($id)
    {
        NhaXuatBan::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaTheLoai($id)
    {
        TheLoai::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaKhuVuc($id)
    {
        KhuVuc::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }
    public function xoaTuSach($id)
    {
        TuSach::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return redirect()->route('hien-thi-them-sach');
    }


    // XEM, TÌM KIẾM & CHI TIẾT sách
    public function dsSach(Request $request)
    {
        $slsach = Sach::all()->count();
        $sach = Sach::orderBy('ten', 'asc')->paginate(20);
        return view('sach.index', ['sach' => $sach,'slsach'=>$slsach]);
    }
    public function timKiemTheoTacGia(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $sach = Sach::where('ten', 'like', "%$timKiem%")
        ->orderBy('ten', 'asc')
            ->paginate(20);
        $slsach = $sach->count();
        if($sach->count()===0){
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        }else{
            return view('sach.index', [
                'sach' => $sach,
                'search' => '',
                'selected' => 'asc_name',
                'slsach' => $slsach,
            ]);
        }
        
    }


    public function chiTietSach($id)
    {
        $sach=ThuVien::where('sach_id',$id)->get();
        return view('sach.detail',['sach'=>$sach]);
    }


    // CẤP THẺ độc giả
    // public function showCapThe()
    // {
    //     return view('doc_gia.create',['date'=>Carbon::now()]);
    // }
    // public function handleCapThe(CapTheRequest $request)
    // {
    //     $existed_reader=DocGia::where('email',$request->email)->orWhere('so_dien_thoai',$request->so_dien_thoai)->first();
    //     $ho=$request->old('ho');
    //     $ten=$request->old('ten');
    //     $lop=$request->old('lop');
    //     $so_dien_thoai=$request->old('so_dien_thoai');
    //     $ngay_sinh=$request->old('ngay_sinh');
    //     $dia_chi=$request->old('dia_chi');
    //     $email=$request->old('email');
    //     $gioi_tinh=$request->old('gioi_tinh');
    //     if (!$existed_reader) {
    //         $array=explode('/', $request->ngay_sinh);
    //         if (blank(DocGia::latest()->first())) {
    //             $ma_so=date('y').date('m').'0001';
    //         } else {
    //             $latest_month_db=substr(DocGia::latest()->first()->ma_so,2,2);
    //             $latest_people_db=intval(substr(DocGia::latest()->first()->ma_so,4,4));
    //             if ($latest_month_db==date('m')) {
    //                 $ma_so=date('y').date('m').str_pad($latest_people_db+1, 4, '0', STR_PAD_LEFT);
    //             } else {
    //                 $ma_so=date('y').date('m').'0001';
    //             }
    //         }
    //         $path = 'img/qr/';
    //         $file = $path . 'qr.png';
    //         QRCode::text($ma_so)
    //             ->setErrorCorrectionLevel('H')
    //             ->setSize(4)
    //             ->setMargin(2)
    //             ->setOutfile($file)
    //             ->png();
    //         $path = $file;
    //         $type = pathinfo($path, PATHINFO_EXTENSION);
    //         switch ($type) {
    //             case 'png':
    //                 $ctype = 'image/png';
    //                 break;
    //             case 'jpeg':
    //             case 'jpg':
    //                 $ctype = 'image/jpeg';
    //                 break;
    //             default:
    //                 $ctype = 'application/octet-stream';
    //         }
    //         $data = file_get_contents($path);
    //         $base64 = 'data:' . $ctype . ';base64,' . base64_encode($data);
    //         $validate=DocGia::create([
    //             'ma_so'=>$ma_so,
    //             'ho'=>$request->ho,
    //             'ten'=>$request->ten,
    //             'gioi_tinh'=>(int)$request->gioi_tinh,
    //             'so_dien_thoai'=>$request->so_dien_thoai,
    //             'email'=>$request->email,
    //             'ngay_sinh'=>date('Y/m/d', strtotime($array[2].'/'.$array[1].'/'.$array[0])),
    //             'dia_chi'=>$request->dia_chi,
    //             'lop'=>$request->lop,
    //             'sgk'=>0,
    //             'sach_khac'=>0
    //         ]);
    //         $mailData = [
    //             'title' => 'Chào mừng bạn đến với Libro',
    //             'ma_so'=>$ma_so,
    //             'ho'=>$request->ho,
    //             'ten'=>$request->ten,
    //             'gioi_tinh'=>(int)$request->gioi_tinh,
    //             'ngay_sinh'=>date('Y/m/d', strtotime($array[2].'/'.$array[1].'/'.$array[0])),
    //             'lop'=>$request->lop,
    //             'dia_chi'=>$request->dia_chi,
    //             'qrcode'=> $base64
    //         ];
    //         $mailable=new SendCreateReaderCardMail($mailData);
    //         Mail::to($request->email)->send($mailable);
    //         return back()->with('success','Tạo thẻ mới thành công');
    //     } else {
    //         return back()->with('error','Số điện thoại hoặc email đã được sử dụng');
    //     }
    // }


    // XEM, TÌM KIẾM & CHI TIẾT độc giả
    // public function showDocGiaList()
    // {
    //     $ds_doc_gia=DocGia::paginate(10);
    //     return view('doc_gia.index',['ds_doc_gia'=>$ds_doc_gia,'tim_kiem'=>'','sap_xep'=>'all']);
    // }
    // public function handleDocGiaSearch(Request $request)
    // {
    //     $doc_gia=DocGia::where('ma_so','like','%'.$request->tim_kiem.'%')
    //         ->orderBy('ma_so','asc')
    //         ->paginate(10);
    //     if ($request->sap_xep=='borrowing') {
    //         $doc_gia=DocGia::where([['ma_so','like','%'.$request->tim_kiem.'%'],['sach_khac','>',0]])
    //             ->orWhere([['ma_so','like','%'.$request->tim_kiem.'%'],['sgk','>',0]])
    //             ->paginate(10);
    //     }
    //     return view('doc_gia.index',
    //         ['ds_doc_gia'=>$doc_gia,'tim_kiem'=>$request->tim_kiem,'sap_xep'=>$request->sap_xep]);
    // }

    // public function showChiTietDocGia($id)
    // {
    //     $doc_gia=DocGia::find($id);
    //     $sach_muon=PhieuMuonSach::where('doc_gia_id',$id)->get();
    //     return view('doc_gia.detail',['doc_gia'=>$doc_gia,'sach'=>$sach_muon]);
    // }

    // public function return($id)
    // {
    //     $doc_gia=DocGia::find($id);
    //     $sach_muon=PhieuMuonSach::where('doc_gia_id',$id)->get();
    //     return view('doc_gia.return',['doc_gia'=>$doc_gia,'sach'=>$sach_muon]);
    // }


    // Cấp tài khoản - quản lý tài khoản
    public function capTaiKhoan()
    {
        return view('tai_khoan.create');
    }
    public function xuLyTaoTaiKhoan(CapTaiKhoanRequest $request)
    {
        //random 4 so va 4 chữ 
        $numbers = '0123456789';
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            if ($i < 4
            ) {
                $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
            } else {
                $randomString .= $letters[rand(0, strlen($letters) - 1)];
            }
        }
        $ho=$request->old('ho');
        $ten=$request->old('ten');
        $vai_tro=$request->old('vai_tro');
        $email=$request->old('email');
        $gioi_tinh=$request->old('gioi_tinh');
        //random pas chu and so
        $user = NguoiDung::where('email', $request->email)->first();
        if (!$user) {
            session()->put('mat_khau', $randomString);
            $user = NguoiDung::create([
                'email' => $request->email,
                'mat_khau' => Hash::make($randomString),
                'ho' => $request->ho,
                'ten' => $request->ten,
                'hinh_anh' => '',
                'vai_tro' => $request->vai_tro,
                'gioi_tinh' => $request->gioi_tinh,
                'ngay_sinh'=> '2000/1/1',
                'dien_thoai'=>''
            ]);
            $this->taoTaiKhoan($user);
            return redirect()->route('tao-tai-khoan');
        } else {
            return back()->with('errorMail', 'Không thể tạo tài khoản do email đã tồn tại');
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
        $admin = NguoiDung::where('vai_tro',1)->get();
        $thuthu = NguoiDung::where('vai_tro', 2)->get();
        $docgia = NguoiDung::where('vai_tro', 3)->get();
        return view('tai_khoan.index', ['admin' => $admin,'thuthu'=>$thuthu,'docgia'=>$docgia ]);
        // return view('tai_khoan.index',['ds_tai_khoan'=>NguoiDung::paginate(10)]);
    }
    public function themTinTuc(){
        return view('tin_tuc.them_tin_tuc');
    }
    public function dsTinTuc(){
        $tintuc = TinTuc::all();
        $sltintuc =TinTuc::all()->count();
        return view('tin_tuc.xem_tin_tuc',['tintuc'=>$tintuc, 'sltintuc'=> $sltintuc]);
    }
    public function xuLyThemTinTuc(Request $request){
        
        if($request->noi_bat != ''){
            TinTuc::update(['noi_bat' => 0]);
        }
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            if ($file->isValid()) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('img/avt'), $file_name);
                $request->merge(['hinh_anh' => $file_name]);
            }
        } else {
            $file_name = "";
            $request->merge(['hinh_anh' => $file_name]);
        }
        if ($request->tieu_de != '') {
                TinTuc::create([
                    'ten' => $request->tieu_de,
                    'noi_dung' =>$request->noi_dung,
                    'noi_bat' =>$request->noi_bat=='' ? 0 : 1,
                    'anh_bia' => $file_name
                ]);
                FacadesSession::flash('success', 'Xử lý thành công');
                return redirect()->route('them-tin-tuc');
        }else{
            return back()->with('error', 'Tiêu đề không được bỏ trống');
        }
       
    }
    public function xemChiTietTinTuc($id){
        $tintuc = TinTuc::where('id',$id)->get();
        return view('tin_tuc.chi_tiet_tin_tuc',['tintuc'=>$tintuc]);
    }
    public function xoaTinTuc($id){
        TinTuc::find($id)->delete();
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function suaTinTuc($id){
        $tintuc = TinTuc::where('id',$id)->get();
        return view('tin_tuc.sua_tin_tuc',['tintuc'=>$tintuc]);
    }
    public function xuLySuaTinTuc($id, Request $request){
        TinTuc::find($id)->update([
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
        ]);
        $img = TinTuc::find($id);
        if ($request->has('file')) {
            $file = $request->file_upload;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/avt'), $filename);
            $img->hinh_anh = $filename;
        }
        $img->save();
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }

    public function timKiemDocGiaDuyetSach(Request $request){
        $timKiem = $request->tim_kiem;
        $cho_duyet = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai',1)
            ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($cho_duyet->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.phe_duyet_sach', [
                'cho_duyet' => $cho_duyet,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function timKiemDocGiaDangMuonSach(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $dang_muon = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai', 2)
        ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($dang_muon->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.dang_muon_sach', [
                'dang_muon' => $dang_muon,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function timKiemDocGiaDaMuonSach(Request $request)
    {
        $timKiem = $request->tim_kiem;
        $dang_muon = PhieuMuonSach::where('ma_phieu_muon', 'like', "%$timKiem%")->where('trang_thai', 3)
        ->orderBy('ma_phieu_muon', 'asc')->get();
        if ($dang_muon->count() === 0) {
            return back()->with('error', 'Không tìm thấy kết quả nào!!!');
        } else {
            return view('muon_sach.da_muon_sach', [
                'dang_muon' => $dang_muon,
                'search' => '',
                'selected' => 'asc_name',
            ]);
        }
    }
    public function duyetMuonSach(){
        $cho_duyet = PhieuMuonSach::where('trang_thai', 1)->get();
        return view('muon_sach.phe_duyet_sach', ['cho_duyet' => $cho_duyet]);
    }
    public function xuLyMuonSach($id){
        $so_luong = PhieuMuonSach::where('trang_thai', 1)->where('ma_phieu_muon', $id)->count();
        PhieuMuonSach::where('ma_phieu_muon',$id)->update([
            'trang_thai'=>2,
            'thu_thu_id'=> Auth::id(),
        ]);
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function xuLyTraSach($id)
    {
        PhieuMuonSach::where('ma_phieu_muon', $id)->update([
            'trang_thai' => 3,
        ]);
        FacadesSession::flash('success', 'Xử lý thành công');
        return back();
    }
    public function dangMuonSach()
    {
        $dang_muon = PhieuMuonSach::where('trang_thai', 2)->get();
        return view('muon_sach.dang_muon_sach',['dang_muon'=> $dang_muon]);
    }

    public function daMuonSach()
    {
        $da_muon = PhieuMuonSach::where('trang_thai', 3)->get();
        return view('muon_sach.da_muon_sach',['da_muon'=> $da_muon]);
    }
    public function chiTietPhieu($id){
        $chitiet = PhieuMuonSach::where('ma_phieu_muon',$id)->get();   
        return view('muon_sach.chi_tiet',['chitiet'=>$chitiet]);
    }
    public function thanhToanSach($id){
        $thanhtoan = PhieuMuonSach::where('ma_phieu_muon',$id)->get();
        $detail = PhieuMuonSach::where('ma_phieu_muon', $id)->first();
        return view('muon_sach.thanh_toan',['thanhtoan'=> $thanhtoan,'detail'=> $detail]);
    }
}
