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
        $phim->gia_phim = $req["gia_phim"];
        $phim->hinh_anh = $req["hinhanh"];

        $phim->save();

        $resPhim = new \stdClass();
        $resPhim->id_phim = $phim->id;
        $resPhim->ten_phim = $phim->ten_phim;
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $phim->id_the_loai;
        $resPhim->the_loai->ten_the_loai = the_loai::find($phim->id_the_loai)->ten_the_loai;
        $resPhim->thoi_luong = $phim->thoi_luong;
        $resPhim->trailer = $phim->trailer;
        $resPhim->tom_tat  = $phim->tom_tat;
        $resPhim->gia_phim  = $phim->gia_phim;
        $resPhim->hinh_anh = $phim->hinh_anh;

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
            'gia_phim' => $req["gia_phim"],
            'hinh_anh' => $req["hinhanh"]
        ]);

        $res = phim::find($request->id);

        $resPhim = new \stdClass();
        $resPhim->id = $res->id;
        $resPhim->ten_phim = $res->ten_phim;
        $resPhim->the_loai = new \stdClass();
        $resPhim->the_loai->id_the_loai = $res->id_the_loai;
        $resPhim->the_loai->ten_the_loai = the_loai::find($res->id_the_loai)->ten_the_loai;
        $resPhim->thoi_luong = $res->thoi_luong;
        $resPhim->trailer = $res->trailer;
        $resPhim->gia_phim  = $res->gia_phim;
        $resPhim->tom_tat  = $res->tom_tat;
        $resPhim->hinh_anh = $res->hinh_anh;

        return json_encode($resPhim);
    }

    public function XoaPhim(Request $req){
        $phim = phim::where('id', $req->id)->update(['trang_thai' => 0]);
        return json_encode($phim, 201);
    }


//the loai
    public function GetTheLoai(Request $req){
        $theloai = the_loai::find($req->id);
        return json_encode($theloai);
    }

    public function ThemTheLoai(Request $req)
    {
        $theloai = new the_loai;
        $theloai->ten_the_loai = $req->ten_the_loai;
        $theloai->save();

        return json_encode($theloai);
    }

    public function CapNhatTheLoai(Request $req)
    {
        $tl = the_loai::where('id', $req->id)->update([
            'ten_the_loai' => $req->ten_the_loai
        ]);
        return json_encode(the_loai::find($req->id));
    }

    public function XoaTheLoai(Request $req){
        $tl = the_loai::where('id', $req->id)->update(['trang_thai' => 0]);
        return json_encode($tl, 201);
    }


//rap
    public function GetRap(Request $req){
        $rap = rap::find($req->id);
        return json_encode($rap);
    }

    public function ThemRap(Request $req)
    {
        $rap = new rap;
        $rap->ten_rap = $req->rap["ten_rap"];
        $rap->so_luong_ghe = $req->rap["so_luong_ghe"];
        $rap->id_chi_nhanh = $req->rap["id_chi_nhanh"];
        $rap->trang_thai = 1;
        $rap->save();

        $resRap = new \stdClass();
        $resRap->id_rap = $rap->id;
        $resRap->ten_rap = $rap->ten_rap;
        $resRap->so_luong_ghe = $rap->so_luong_ghe;
        $resRap->chi_nhanh = new \stdClass();
        $resRap->chi_nhanh->id_chi_nhanh = $rap->id_chi_nhanh;
        $resRap->chi_nhanh->ten_chi_nhanh = $rap->chi_nhanh->ten_chi_nhanh;
        $resRap->trang_thai = $rap->trang_thai;

        return json_encode($resRap);
    }

    public function CapNhatRap(Request $req)
    {
        $tl = rap::where('id', $req->id)->update([
            'ten_rap' => $req->rap["ten_rap"],
            'so_luong_ghe' => $req->rap["so_luong_ghe"]
        ]);
        return json_encode(rap::find($req->id));
    }

    public function DoiTrangThaiRap(Request $req){
        $tl = rap::where('id', $req->id)->update(['trang_thai' => $req->action]);
        return json_encode($tl, 201);
    }


//chi nhanh
    public function GetChiNhanh(Request $req){
        $chi_nhanh = chi_nhanh::find($req->id);
        return json_encode($chi_nhanh);
    }

    public function ThemChiNhanh(Request $req)
    {
        $chi_nhanh = new chi_nhanh;
        $chi_nhanh->ten_chi_nhanh = $req->chi_nhanh["ten_chi_nhanh"];
        $chi_nhanh->dia_chi = $req->chi_nhanh["dia_chi"];
        $chi_nhanh->save();

        return json_encode($chi_nhanh);
    }

    public function CapNhatChiNhanh(Request $req)
    {
        $kq = chi_nhanh::where('id', $req->id)->update([
            'ten_chi_nhanh' => $req->chi_nhanh["ten_chi_nhanh"],
            'dia_chi' => $req->chi_nhanh["dia_chi"]
        ]);
        return json_encode(chi_nhanh::find($req->id));
    }

    public function XoaChiNhanh(Request $req){
        $kq = chi_nhanh::where('id', $req->id)->update(['trang_thai' => 0]);
        return json_encode($kq, 201);
    }
}