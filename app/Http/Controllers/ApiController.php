<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;
use App\the_loai;
use App\khach_hang;
use App\rap;
use App\chi_nhanh;
use App\ghe;

class ApiController extends Controller
{
    public function danh_sach_phim()
    {
        $phims = phim::all();
        return response()->json($phims, Response::HTTP_OK);
    }

    public function tim_phim($id)
    {
        $phim = phim::find($id);
        return response()->json($phim, 200);
    }

    public function danh_sach_the_loai(){
        return response()->json(the_loai::all(), 200);
    }

    public function DanhSachKhachHang(){
        return response()->json(khach_hang::all(),200);
    }

    public function danh_sach_rap(){
        return json_encode(rap::all(), 200);
    }

    public function danh_sach_ghe(){
        return json_encode(ghe::all(), 200);
    }

    public function danh_sach_chi_nhanh(){
        // return json_encode(chi_nhanh::all(), 200);
        $result = chi_nhanh::join('raps', 'chi_nhanhs.id', '=', 'raps.id_chi_nhanh')->get();
        return response()->json($result, Response::HTTP_OK);
    }

    public function them_kh(Request $req){
        return response()->json(khach_hang::create($req->all()),200);
    }
}
