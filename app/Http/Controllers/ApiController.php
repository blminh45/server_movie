<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;
use App\the_loai;
use App\khach_hang;

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
    public function danh_sach_khach_hang(){
        return response()->json(khach_hang::all(), 200);
    }
    public function them_kh(Request $req){
        return response()->json(khach_hang::create($req->all()),200);
    }
}
