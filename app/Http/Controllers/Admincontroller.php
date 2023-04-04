<?php

namespace App\Http\Controllers;

use App\Models\TacGia;
use App\Models\NhaXuatBan;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\KhuVuc;
use App\Models\TuSach;
class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tacgia = TacGia::all();
        $nhaxuatban = NhaXuatBan::all();
        $theloai = TheLoai::all();
        $khuvuc = KhuVuc::all();
        return view('index',['tacgia'=> $tacgia, 'nhaxuatban'=> $nhaxuatban, 'theloai'=> $theloai,'khuvuc'=>$khuvuc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function themtacgia(Request $request)
    {
        $tacgia = TacGia::create([
            'ten' => $request->ten,
            
        ]);
        return redirect()->route('index');
    }
    public function themnhaxuatban(Request $request)
    {
        $nxb = NhaXuatBan::create([
            'ten' => $request->nhaxuatban,

        ]);
        return redirect()->route('index');
    }
    public function themtheloai(Request $request)
    {
        $theloai = TheLoai::create([
            'ten' => $request->theloai,

        ]);
        return redirect()->route('index');
    }
    public function themkhuvuc(Request $request)
    {
        $khuvuc = KhuVuc::create([
            'ten' => $request->khuvuc,

        ]);
        return redirect()->route('index');
    }
    public function themtusach(Request $request)
    {
        $khuvuc = TuSach::create([
            'ten' => $request->khuvuc,

        ]);
        return redirect()->route('index');
    }
    public function xoatacgia($id)
    {
        $xoatg = TacGia::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoanxb($id)
    {
        $xoanxb = NhaXuatBan::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoatheloai($id)
    {
        $xoatt = TheLoai::find($id)->delete();
        return redirect()->route('index');
    }
    public function xoakhuvuc($id)
    {
        $xoakv = KhuVuc::find($id)->delete();
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
