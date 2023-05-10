<?php

namespace App\Http\Controllers;

use App\Mail\SendMailForgotPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function Forget_Password(Request $request)
    {
        $emailTo = $request->email;
        $rand = rand(100000, 999999);
        session()->put('emailTo', $emailTo);
        session()->put('verify',$rand);
        $mailData = [
            'verify' => $rand,
            'title' => 'Forgot Password',
            'body' => 'abc'
        ];
        $mailable = new SendMailForgotPass($mailData);

        Mail::to($emailTo)->send($mailable);
        return redirect()->route('xac-minh');
    }
    public function Verify(){
        // echo
        // session()->get('verify');
        return view('send_mail.verify');
    }
    public function Xu_ly_xac_minh(Request $request){
        $verify = session()->get('verify');
        $verify_nguoidung = $request->verify;
        if($verify == $verify_nguoidung){
            return redirect()->route('quen-mat-khau');
        }else{ 
            return redirect()->back()->with('error', 'Mã không hợp lệ');   
        }
    }
}
