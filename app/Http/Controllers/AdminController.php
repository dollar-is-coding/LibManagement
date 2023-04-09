<?php

namespace App\Http\Controllers;

use App\Models\TacGia;
use App\Models\NhaXuatBan;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\KhuVuc;
use App\Models\TuSach;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $_tacgia = TacGia::all();
        $_nhaxuatban = NhaXuatBan::all();
        $_theloai = TheLoai::all();
        $_khuvuc = KhuVuc::all();
        return view('index', ['_tacgia' => $_tacgia, '_nhaxuatban' => $_nhaxuatban, '_theloai' => $_theloai, '_khuvuc' => $_khuvuc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function themTacGia(Request $request)
    {
        $_tacgia = TacGia::create([
            'ten' => $request->ten,

        ]);
        return redirect()->route('index');
    }
    public function themNhaXuatBan(Request $request)
    {
        $_nxb = NhaXuatBan::create([
            'ten' => $request->nhaxuatban,

        ]);
        return redirect()->route('index');
    }
    public function themTheLoai(Request $request)
    {
        $_theloai = TheLoai::create([
            'ten' => $request->theloai,

        ]);
        return redirect()->route('index');
    }
    public function themKhuVuc(Request $request)
    {
        $_khuvuc = KhuVuc::create([
            'ten' => $request->khuvuc,

        ]);
        return redirect()->route('index');
    }
    public function themTuSach(Request $request)
    {
        $_khuvuc = TuSach::create([
            'ten' => $request->khuvuc,

        ]);
        return redirect()->route('index');
    }
    public function xoaTacGia($id)
    {
        $_xoatg = TacGia::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoaNhaXuatBan($id)
    {
        $_xoanxb = NhaXuatBan::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoaTheLoai($id)
    {
        $_xoatt = TheLoai::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoaKhuVuc($id)
    {
        $_xoakv = KhuVuc::find($id)->delete();
        return redirect()->route('index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
