<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phim;
use App\rap;
use App\chi_nhanh;
use App\the_loai;
use App\khach_hang;
use App\lich_chieu;
use App\suat_chieu;
use App\ve;
use App\ghe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //phim
    public function danh_sach_phim()
    {
        $dsphim = phim::where('trang_thai', 1)->get();
        $the_loais = the_loai::all();
        return view(
            'pages.phim.danh-sach-phim',
            [
                'phim' => $dsphim,
                'the_loais' => $the_loais
            ]
        );
    }

    //the loai
    public function danh_sach_theloai()
    {
        $the_loais = the_loai::where('trang_thai', 1)->get();
        return view('pages.the_loai.danh-sach-theloai')->with("dstheloai", $the_loais);
    }

    //chi nhanh
    public function danh_sach_chinhanh()
    {
        $dschi_nhanh = chi_nhanh::where('trang_thai', 1)->get();
        return view('pages.rap_phim.danh-sach-chinhanh')->with("dschinhanh", $dschi_nhanh);
    }

    //rap
    public function danh_sach_rap()
    {
        $c_nhanh = chi_nhanh::where('trang_thai', 1)->get();
        $dsrap = rap::where('trang_thai', '<>', 0)->get();

        return view('pages.rap_phim.danh-sach-rap', ["dsrap" => $dsrap, "dschi_nhanh" => $c_nhanh]);
    }

    //suat chieu
    public function danh_sach_suatchieu()
    {
        $suat_chieus = suat_chieu::where('trang_thai', 1)->get();
        return view('pages.suat_chieu.danh-sach-suatchieu')->with("ds_suat_chieu", $suat_chieus);
    }

    public function them_suatchieu()
    {
        return view('pages.suat_chieu.them-suatchieu');
    }

    public function sua_suatchieu($id)
    {
        $suat_chieus = suat_chieu::find($id);
        $ds_suatchieu = suat_chieu::where('trang_thai', 1)->get();
        return view('pages.suat_chieu.sua-suatchieu')->with('suat_chieu', $suat_chieus)->with('ds_suatchieu', $ds_suatchieu);
    }

    //lich chieu
    public function danh_sach_lichchieu()
    {
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        return view('pages.lich_chieu.danh-sach-lichchieu')->with("ds_lich_chieu", $lich_chieus);
    }

    public function them_lichchieu()
    {
        $phims = phim::where('trang_thai', 1)->get();
        $raps = rap::where('trang_thai', 1)->get();
        $suat_chieus = suat_chieu::where('trang_thai', 1)->get();
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        return view('pages.lich_chieu.them-lichchieu')->with("phim", $phims)->with("rap", $raps)->with("ds_suat_chieu", $suat_chieus)->with("ds_lich_chieu", $lich_chieus);
    }

    //ve
    public function danh_sach_ve()
    {
        $dsve = ve::where('trang_thai', 1)->get();
        return view('pages.ve.danh-sach-ve')->with("dsve", $dsve);
    }

    public function them_ve()
    {
        $khach_hang = khach_hang::where('trang_thai', 1)->get();
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        $ghes = ghe::where('trang_thai', 1)->get();
        $ves = ve::all();
        return view('pages.ve.them-ve')->with("ds_ve", $ves)->with("khach_hang", $khach_hang)->with("ds_lich_chieu", $lich_chieus)->with("ds_ghe", $ghes);
    }

    //thanh vien
    public function danh_sach_thanh_vien()
    {
        $dskhachhang = khach_hang::all();
        return view('pages.thanh_vien.danh-sach-thanh-vien')->with("dskhachhang", $dskhachhang);
    }

    public function them_khachhang()
    {
        return view('pages.thanh_vien.them-thanhvien');
    }

    public function cap_nhat_thanhvien($id)
    {
        $khach_hangs = khach_hang::find($id);
        return view('pages.thanh_vien.cap-nhat-thanhvien')->with("khach_hangs", $khach_hangs);
    }

    //function
    public function ThemSuatChieu(Request $request)
    {

        $suat_chieus = new suat_chieu;
        if ($request->giochieu == "09:00")  $suat_chieus->gio_chieu = "09:00";
        if ($request->giochieu == "12:00")  $suat_chieus->gio_chieu = "12:00";
        if ($request->giochieu == "15:00")  $suat_chieus->gio_chieu = "15:00";
        if ($request->giochieu == "18:00")  $suat_chieus->gio_chieu = "18:00";
        if ($request->giochieu == "21:00")  $suat_chieus->gio_chieu = "21:00";
        $suat_chieus->ngay_chieu = $request->ngaychieu;
        if ($request->giochieu == "09:00" || $request->giochieu == "12:00")  $suat_chieus->gia_suat_chieu = "30000";
        else if ($request->giochieu == "15:00") $suat_chieus->gia_suat_chieu = "40000";
        else $suat_chieus->gia_suat_chieu = "50000";
        $suat_chieus->save();
        return redirect()->action('HomeController@danh_sach_suatchieu');
    }

    public function SuaSuatChieu(Request $request, $id)
    {

        $suat_chieus =  suat_chieu::find($id);
        if ($request->giochieu == "09:00")  $suat_chieus->gio_chieu = "09:00";
        if ($request->giochieu == "12:00")  $suat_chieus->gio_chieu = "12:00";
        if ($request->giochieu == "15:00")  $suat_chieus->gio_chieu = "15:00";
        if ($request->giochieu == "18:00")  $suat_chieus->gio_chieu = "18:00";
        if ($request->giochieu == "21:00")  $suat_chieus->gio_chieu = "21:00";
        $suat_chieus->ngay_chieu = $request->ngaychieu;
        if ($request->giochieu == "09:00" || $request->giochieu == "12:00")  $suat_chieus->gia_suat_chieu = "30000";
        else if ($request->giochieu == "15:00") $suat_chieus->gia_suat_chieu = "40000";
        else $suat_chieus->gia_suat_chieu = "50000";
        $suat_chieus->save();
        return redirect()->action('HomeController@danh_sach_suatchieu');
    }

    public function xoa_suatchieu($id)
    {
        $suat_chieus = suat_chieu::find($id);
        $suat_chieus->trang_thai = "0";
        $suat_chieus->save();
        return redirect()->action('HomeController@danh_sach_suatchieu');
    }

    public function ThemLichChieu(Request $request)
    {
        $lich_chieus = new lich_chieu;
        $lich_chieus->id_rap = $request->rapphim;
        $lich_chieus->id_phim = $request->phim;
        $lich_chieus->id_suat_chieu = $request->suat_chieu;
        $suat_chieus = suat_chieu::find($request->suat_chieu);
        $phims = phim::find($request->phim);
        $lich_chieus->gia_lich_chieu = $suat_chieus->gia_suat_chieu + $phims->gia_phim;
        $lich_chieus->save();
        return redirect()->action('HomeController@danh_sach_lichchieu');
    }

    public function xoa_lichchieu($id)
    {
        $lich_chieus = lich_chieu::find($id);
        $lich_chieus->trang_thai = "0";
        $lich_chieus->save();
        return redirect()->action('HomeController@danh_sach_lichchieu');
    }

    public function ThemVe(Request $request)
    {
        $ves = new ve;
        $ves->id_lich_chieu = $request->lich_chieu;
        $ves->id_khach_hang = $request->khach_hang;
        $ves->id_ghe = $request->ghe;
        $lich_chieus = lich_chieu::find($request->lich_chieu);
        $ghes = ghe::find($request->ghe);
        $ves->gia_ve = $lich_chieus->gia_lich_chieu + $ghes->gia_ghe;
        $ves->save();
        return json_encode($ves, 200);
    }
}
