<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\phim;

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
    public function index()
    {
         $phims = phim::all();

        return response()->json($phims, Response::HTTP_OK);
        //return view('home');
    }

    public function danh_sach_phim()
    {
        return new PhimResource(Phim::all());
        // return view('pages.danh-sach-phim');
    }

    public function them_phim()
    {
        return view('pages.them-phim');
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
