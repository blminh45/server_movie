<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;
use App\the_loai;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function danh_sach_phim()
    {
        $phims = phim::all();
        return view('pages.danh-sach-phim', ['phims'=>$phims]);
    }

    public function them_phim(Request $req)
    {
        if($req->hasFile('hinh')) {
            $file = $req->file('hinh');
            $filename = $file->getClientOriginalName('hinh');
            $fileExt = $file->getClientOriginalExtension('hinh');
            $file->move('images', $filename);
        }

        $ten_phim = $req->TenPhim;
        $thoi_luong = $req->ThoiLuong;
        $url_hinh = 'images/'.$filename;

        return view('pages.danh-sach-phim');
        return $req->url();
    }

    public function cap_nhat_phim()
    {
        return view('pages.cap-nhat-phim');
    }

    public function danh_sach_rap()
    {
        return view('pages.danh-sach-rap');
    }

    public function danh_sach_thanh_vien()
    {
        return view('pages.danh-sach-thanh-vien');
    }
}
