<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;
use App\rap;
use App\chi_nhanh;
use App\the_loai;
use App\khach_hang;
use App\suat_chieu;

class AjaxController extends Controller
{
//phim
    public function danh_sach_phim()
    {
        $phim = phim::where('trang_thai', 1)->get();
        $the_loais = the_loai::all();
        return view('pages.phim.danh-sach-phim', ['phim'=>$phim, 'the_loais'=>$the_loais]);
    }

    public function GetPhim(Request $req){
        $phim = phim::find($req->id);
        return json_encode($phim);
    }

    public function ThemPhim(Request $request)
    {
        $req = $request->phim;
        $phim = new phim;
        $phim->ten_phim = $req["tenphim"];
        $phim->id_the_loai = $req["theloai"];
        $phim->thoi_luong = $req["thoiluong"];
        $phim->trailer = $req["trailer"];
        $phim->tom_tat = $req["tomtat"];
        $phim->hinh_anh = $req["hinhanh"];

        $phim->save();

        $resPhim = new \stdClass();
        $resPhim->ten_phim = $req["tenphim"];
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $req["theloai"];
        $resPhim->the_loai->ten_the_loai = the_loai::find($req["theloai"])->ten_the_loai;
        $resPhim->thoi_luong = $req["thoiluong"];
        $resPhim->trailer = $req["trailer"];
        $resPhim->tom_tat  = $req["tomtat"];
        $resPhim->hinh_anh = $req["hinhanh"];

        return json_encode($resPhim);
    }

    public function CapNhatPhim(Request $request)
    {
        $req = $request->phim;
        $phim = phim::where('id', $request->id)->update([
            'ten_phim' => $req["tenphim"],
            'id_the_loai' => $req["theloai"],
            'thoi_luong' => $req["thoiluong"],
            'trailer' => $req["trailer"],
            'tom_tat' => $req["tomtat"],
            'hinh_anh' => $req["hinhanh"]
        ]);
        
        return json_encode(phim::find($request->id));
    }

    public function XoaPhim(Request $req){
        $phim = phim::where('id', $req->id)->update(['trang_thai' => 0]);
        return json_encode($phim, 201);
    }
}