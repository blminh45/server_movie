<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;
use App\the_loai;

class ApiController extends Controller
{
    public function danh_sach_phim()
    {
        $phims = phim::all();
        return response()->json($phims, Response::HTTP_OK);
    }

    public function them_phim(Request $req)
    {
        $phim = phim::create($req->all());
        return response()->json($phim, 201);
    }

    public function tim_phim($id)
    {
        $phim = phim::find($id);
        return response()->json($phim, 200);
    }

    public function sua_phim(Request $req, $id)
    {
        $phim = phim::where('id', $id)->update($req->all());
        return response()->json($phim, 200);
    }

    public function destroy($id, Request $req)
    {
        $phim = phim::where('id', $id)->update($req->all());
        return response()->json($phim, 200);
    }

    public function danh_sach_the_loai(){
        return response()->json(the_loai::all(), 200);
    }

    // public function ThemKhachHang(Request $request)
    // {
    //     $img_name = "g8.jpg";
    //     if ($request->hasFile('hinhdaidien')) {
    //         $file = $request->file('hinhdaidien');
    //         $img_name = $file->getClientOriginalName('hinhdaidien');
    //         $file->move('images', $img_name);
    //     }

    //     $khach_hangs = new khach_hang;
    //     $khach_hangs->ten = $request->tenkhachhang;
    //     $khach_hangs->dia_chi = $request->diachiKH;
    //     $khach_hangs->so_dien_thoai = $request->sodienthoai;
    //     $khach_hangs->gioi_tinh = $request->gioitinh;
    //     $khach_hangs->anh_dai_dien = $img_name;
    //     $khach_hangs->email = $request->email;
    //     $password = bcrypt('$request->matkhau');
    //     $khach_hangs->mat_khau = $password;

    //     $khach_hangs->save();
    //     return redirect()->action('HomeController@danh_sach_thanh_vien');
    // }

    // public function SuaKhachHang(Request $request, $id)
    // {
    //     $img_name = khach_hang::find($id)->hinhdaidien;
    //     if ($request->hasFile('hinhdaidien')) {
    //         $file = $request->file('hinhdaidien');
    //         $img_name = $file->getClientOriginalName('hinhdaidien');
    //         $file->move('images', $img_name);
    //     }

    //     $khach_hangs = khach_hang::find($id);
    //     $khach_hangs->ten = $request->tenkhachhang;
    //     $khach_hangs->dia_chi = $request->diachiKH;
    //     $khach_hangs->so_dien_thoai = $request->sodienthoai;
    //     $khach_hangs->gioi_tinh = $request->gioitinh;
    //     $khach_hangs->anh_dai_dien = $img_name;
    //     $khach_hangs->email = $request->email;
    //     $password = bcrypt('$request->matkhau');
    //     $khach_hangs->mat_khau = $password;

    //     $khach_hangs->save();
    //     return redirect()->action('HomeController@danh_sach_thanh_vien');
    // }
}
