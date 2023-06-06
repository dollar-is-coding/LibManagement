<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function danhMucSach()
    {
        return view('client.danh_muc_sach');
    }
}
