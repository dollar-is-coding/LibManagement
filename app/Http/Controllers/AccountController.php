<?php

namespace App\Http\Controllers;

use App\Mail\SendMailCreateUser;
use App\Mail\SendMailForgotPass;
use App\Mail\SendChangeMail;
use App\Models\NguoiDung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function taoMaXacMinh(Request $request)
    {
        $emailTo = $request->email;
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify',$rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Quên mật khẩu',
            'body' => 'Vui lòng không chia sẻ bất kì ai mã này'
        ];
        $mailable = new SendMailForgotPass($mailData);

        $user = NguoiDung::where('email', $emailTo)->first();
        if ($user) {
            Mail::to($emailTo)->send($mailable);
            return redirect()->route('xac-minh');
        } else {
            return redirect()->back()->with('error', 'Email không tồn tại');   
        }
    }
    public function xacMinhQuenMatKhau(){

        return view('xac_min_quen_mat_khau');
    }
    public function xacMinh(){
        return view('xac_thuc_email.nhap_ma_xac_thuc');
    }
    public function xulyXacMinh(Request $request){
        $verify = session()->get('verify');
        $verify_nguoidung = $request->verify;
        if($verify == $verify_nguoidung){
            return redirect()->route('quen-mat-khau');
        }else{ 
            return redirect()->back()->with('error', 'Mã không hợp lệ');   
        }
    }
    public function xuLytaoTaiKhoan(Request $request)
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
    public function xacMinhMail()
    {
        $emailTo = session()->get('email_user');
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify', $rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Thay đổi email',
            'body' => 'Vui lòng không chia sẻ bất kì ai mã này'
        ];
        $mailable = new SendChangeMail($mailData);
        Mail::to($emailTo)->send($mailable);
        return view('xac_thuc_email.nhap_ma_xac_thuc_doi_email');
    }
    public function xulyXacMinhEmail(Request $request)
    {
        $verify = session()->get('verify');
        $verify_nguoidung = $request->verify;
        if ($verify == $verify_nguoidung) {
            return redirect()->route('doi-email');
        } else {
            return redirect()->back()->with('error', 'Mã không hợp lệ');
        }
    }
    public function doiEmail(){
        return view('doi_email');
    }
    public function xuLyDoiEmail(Request $request){
        $email = session()->get('email_user');
        $emaildata = NguoiDung::where('email', $request->email)->get();  
        foreach ($emaildata as $emaildatas) {
                    $emaildata = $emaildatas->email;
        }
        if ($request->email != $emaildata) {
            session(['email_user' => $request->email]);
            NguoiDung::where('email', $email)->update([
                'email' => $request->email,
            ]);
          
            return redirect()->route('xem-thong-tin');
        }
        return redirect()->back()->with('error','Email mới không được trùng với email hiện tại' );
    }
}
