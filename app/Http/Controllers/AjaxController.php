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

    public function resForm($res){
        $resPhim = new \stdClass();
        $resPhim->id_phim = $res->id;
        $resPhim->ten_phim = $res->ten_phim; //$req["tenphim"];
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $res->id_the_loai;//$req["theloai"];
        $resPhim->the_loai->ten_the_loai = the_loai::find($res->id_the_loai)->ten_the_loai;
        $resPhim->thoi_luong = $res->thoi_luong;//$req["thoiluong"];
        $resPhim->trailer = $res->trailer;//$req["trailer"];
        $resPhim->tom_tat  = $res->tom_tat;//$req["tomtat"];
        $resPhim->hinh_anh = $res->hinh_anh;//$req["hinhanh"];
        return $resPhim;
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
        $resPhim->id_phim = $phim->id;
        $resPhim->ten_phim = $phim->ten_phim; //$req["tenphim"];
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $phim->id_the_loai;//$req["theloai"];
        $resPhim->the_loai->ten_the_loai = the_loai::find($phim->id_the_loai)->ten_the_loai;
        $resPhim->thoi_luong = $phim->thoi_luong;//$req["thoiluong"];
        $resPhim->trailer = $phim->trailer;//$req["trailer"];
        $resPhim->tom_tat  = $phim->tom_tat;//$req["tomtat"];
        $resPhim->hinh_anh = $phim->hinh_anh;//$req["hinhanh"];

        return json_encode($resPhim);
    }

    public function CapNhatPhim(Request $request)
    {
        // $req = $request->phim;
        $phim = phim::where('id', $request->id)->update([
            'ten_phim' => $request->phim["tenphim"],
            'id_the_loai' => $request->phim["theloai"],
            'thoi_luong' => $request->phim["thoiluong"],
            'trailer' => $request->phim["trailer"],
            'tom_tat' => $request->phim["tomtat"],
            'hinh_anh' => $request->phim["hinhanh"]
        ]);
        $res = phim::find($request->id);
        $resPhim = new \stdClass();
        $resPhim->id_phim = $res->id;
        $resPhim->ten_phim = $res->ten_phim;
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $res->id_the_loai;
        $resPhim->the_loai->ten_the_loai = the_loai::find($res->id_the_loai)->ten_the_loai;
        $resPhim->thoi_luong = $res->thoi_luong;
        $resPhim->trailer = $res->trailer;
        $resPhim->tom_tat  = $res->tom_tat;
        $resPhim->hinh_anh = $res->hinh_anh;
        return json_encode($resPhim);
    }

    public function XoaPhim(Request $req){
        $phim = phim::where('id', $req->id)->update(['trang_thai' => 0]);
        return json_encode($phim, 201);
    }
}