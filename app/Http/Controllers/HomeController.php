<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phim;
use App\rap;
use App\chi_nhanh;
use App\the_loai;
use App\khach_hang;
use App\suat_chieu;

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
        return view("home");
    }

    public function danh_sach_phim()
    {
        $dsphim = phim::all();
        return view('pages.danh-sach-phim')->with("dsphim", $dsphim);
    }

    public function danh_sach_theloai()
    {
        $the_loais = the_loai::all();
        return view('pages.danh-sach-theloai')->with("dstheloai", $the_loais);
    }

    public function danh_sach_suatchieu()
    {
        return view('pages.danh-sach-suatchieu');
    }

    public function them_suatchieu()
    {
        return view('pages.them-suatchieu');
    }

    public function them_phim()
    {
        return view('pages.them-phim');
    }

    public function them_rap()
    {
        return view('pages.them-rap');
    }

    public function them_chinhanh()
    {
        return view('pages.them-chinhanh');
    }

    public function them_theloai()
    {
        return view('pages.them-theloai');
    }

    public function them_khachhang()
    {
        return view('pages.them-thanhvien');
    }

    public function cap_nhat_phim($id)
    {
        $capnhatphim = phim::find($id);
        return view('pages.cap-nhat-phim')->with("capnhatphim", $capnhatphim);
    }

    public function cap_nhat_theloai($id)
    {
        $the_loais = the_loai::find($id);
        return view('pages.cap-nhat-theloai')->with("dstheloai", $the_loais);
    }

    public function cap_nhat_rap($id)
    {
        $raps = rap::find($id);
        return view('pages.cap-nhat-rap')->with("capnhatrap", $raps);
    }

    public function cap_nhat_thanhvien($id)
    {
        $khach_hangs = khach_hang::find($id);
        return view('pages.cap-nhat-thanhvien')->with("khach_hangs", $khach_hangs);
    }

    public function cap_nhat_chinhanh($id)
    {
        $chi_nhanhs = chi_nhanh::find($id);
        return view('pages.cap-nhat-chi-nhanh')->with("capnhatchinhanh", $chi_nhanhs);
    }

    public function danh_sach_rap()
    {
        $dsrap = rap::all();
        return view('pages.danh-sach-rap')->with("dsrap", $dsrap);
    }

    public function danh_sach_chinhanh()
    {
        $dschi_nhanh = chi_nhanh::all();
        return view('pages.danh-sach-chinhanh')->with("dschinhanh", $dschi_nhanh);
    }

    public function danh_sach_thanh_vien()
    {
        $dskhachhang = khach_hang::all();
        return view('pages.danh-sach-thanh-vien')->with("dskhachhang", $dskhachhang);
    }

    public function ThemPhim(Request $request)
    {
        $url = "g8.jpg";
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = $file->getClientOriginalName('poster');
            $fileExt = $file->getClientOriginalExtension('poster');
            $file->move('images', $filename);
            $url = $filename;
        }

        $phims = new phim;
        $phims->ten_phim = $request->tenphim;
        $phims->hinh_anh = $url;
        $phims->id_the_loai = "1";
        $phims->thoi_luong = $request->thoiluong;
        $newday = date("Y-m-d", strtotime($request->ngaykhoicchieu));
        $phims->khoi_chieu = $newday;
        $phims->tom_tat = $request->tomtat;

        $phims->save();
        return redirect()->action('HomeController@danh_sach_phim');
    }

    public function SuaPhim(Request $request, $id)
    {
        $url = $request->hinh_anh;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = $file->getClientOriginalName('poster');
            $fileExt = $file->getClientOriginalExtension('poster');
            $file->move('images', $filename);
            $url = $filename;
        }

        $phims = phim::find($id);
        $phims->ten_phim = $request->tenphim;
        $phims->hinh_anh = $url;
        $phims->id_the_loai = "1";
        $phims->thoi_luong = $request->thoiluong;
        $newday = date("Y-m-d", strtotime($request->ngaykhoicchieu));
        $phims->khoi_chieu = $newday;
        $phims->tom_tat = $request->tom_tat;

        $phims->save();
        return redirect()->action('HomeController@danh_sach_phim');
    }

    public function ThemRap(Request $request)
    {
        $raps = new rap;
        $raps->so_luong_ghe = $request->soluongghe;
        $raps->id_chi_nhanh = "1";

        $raps->save();
        return redirect()->action('HomeController@danh_sach_rap');
    }

    public function SuaRap(Request $request, $id)
    {
        $raps = rap::find($id);
        $raps->so_luong_ghe = $request->soluongghe;
        $raps->id_chi_nhanh = $request->chinhanh;

        $raps->save();
        return redirect()->action('HomeController@danh_sach_rap');
    }

    public function ThemChiNhanh(Request $request)
    {
        $chi_nhanhs = new chi_nhanh;
        $chi_nhanhs->ten_chi_nhanh = $request->tenchinhanh;
        $chi_nhanhs->dia_chi = $request->diachi;

        $chi_nhanhs->save();
        return redirect()->action('HomeController@danh_sach_chinhanh');
    }

    public function SuaChiNhanh(Request $request, $id)
    {
        $chi_nhanhs = chi_nhanh::find($id);
        $chi_nhanhs->ten_chi_nhanh = $request->tenchinhanh;
        $chi_nhanhs->dia_chi = $request->diachichinhanh;

        $chi_nhanhs->save();
        return redirect()->action('HomeController@danh_sach_chinhanh');
    }

    public function ThemTheLoai(Request $request)
    {
        $the_loais = new the_loai;
        $the_loais->ten_the_loai = $request->tentheloai;

        $the_loais->save();
        return redirect()->action('HomeController@danh_sach_theloai');
    }

    public function SuaTheLoai(Request $request, $id)
    {
        $the_loais = the_loai::find($id);
        $the_loais->ten_the_loai = $request->tentheloai;

        $the_loais->save();
        return redirect()->action('HomeController@danh_sach_theloai');
    }

    public function ThemKhachHang(Request $request)
    {
        $filename = "g8.jpg";
        if ($request->hasFile('hinhdaidien')) {
            $file = $request->file('hinhdaidien');
            $filename = $file->getClientOriginalName('hinhdaidien');
            $file->move('images', $filename);
        }

        $khach_hangs = new khach_hang;
        $khach_hangs->ten = $request->tenkhachhang;
        $khach_hangs->dia_chi = $request->diachiKH;
        $khach_hangs->so_dien_thoai = $request->sodienthoai;
        $khach_hangs->gioi_tinh = $request->gioitinh;
        $khach_hangs->anh_dai_dien = $filename;
        $khach_hangs->email = $request->email;
        $password = bcrypt('$request->matkhau');
        $khach_hangs->mat_khau = $password;

        $khach_hangs->save();
        return redirect()->action('HomeController@danh_sach_thanh_vien');
    }

    public function SuaKhachHang(Request $request, $id)
    {
        $filename = $request->hinhdaidien;
        if ($request->hasFile('hinhdaidien')) {
            $file = $request->file('hinhdaidien');
            $filename = $file->getClientOriginalName('hinhdaidien');
            $file->move('images', $filename);
        }

        $khach_hangs = khach_hang::find($id);
        $khach_hangs->ten = $request->tenkhachhang;
        $khach_hangs->dia_chi = $request->diachiKH;
        $khach_hangs->so_dien_thoai = $request->sodienthoai;
        $khach_hangs->gioi_tinh = $request->gioitinh;
        $khach_hangs->anh_dai_dien = $filename;
        $khach_hangs->email = $request->email;
        $password = bcrypt('$request->matkhau');
        $khach_hangs->mat_khau = $password;

        $khach_hangs->save();
        return redirect()->action('HomeController@danh_sach_thanh_vien');
    }

    public function ThemSuatChieu(Request $request)
    {
        $suat_chieus = new suat_chieu;
        $suat_chieus->id_Rap = "1";
        $suat_chieus->id_Phim = "1";
        $suat_chieus->Gio = $request->giochieu;
        $suat_chieus->Ngaychieu = $request->ngaychieu;

        $suat_chieus->save();
        return redirect()->action('HomeController@danh_sach_suatchieu');
    }

    public function SuaSuatChieu(Request $request, $id)
    {
        $phims = phim::find($id);
        $phims->id_Rap = $request->rapphim;
        $phims->id_Phim = $request->phim;
        $phims->Gio = $request->giochieu;
        $newday = date("Y-m-d", strtotime($request->ngaychieu));
        $phims->Ngaychieu = $newday;

        $phims->save();
        return redirect()->action('HomeController@//dsSuatChieu');
    }

    public function ThemVe(Request $request)
    {
        $phims = new phim;
        $phims->id_SuatChieu = $request->suatchieu;
        $phims->id_KH = $request->khachhang;

        $phims->save();
        return redirect()->action('HomeController@them_phim');
    }

    public function SuaVe(Request $request, $id)
    {
        $phims = phim::find($id);
        $phims->id_SuatChieu = $request->suatchieu;
        $phims->id_KH = $request->khachhang;

        $phims->save();
        return redirect()->action('HomeController@//dsVe');
    }
}