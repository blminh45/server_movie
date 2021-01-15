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
    public function danh_sach_ve()
    {
        $dsve = ve::where('trang_thai', 1)->get();
        return view('pages.ve.danh-sach-ve')->with("dsve", $dsve);
    }
    public function danh_sach_suatchieu()
    {
        $suat_chieus = suat_chieu::where('trang_thai', 1)->get();
        return view('pages.suat_chieu.danh-sach-suatchieu')->with("ds_suat_chieu", $suat_chieus);
    }
    public function danh_sach_lichchieu()
    {
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        return view('pages.lich_chieu.danh-sach-lichchieu')->with("ds_lich_chieu", $lich_chieus);
    }


    //the loai
    public function danh_sach_theloai()
    {
        $the_loais = the_loai::all();
        return view('pages.the_loai.danh-sach-theloai')->with("dstheloai", $the_loais);
    }
    public function them_suatchieu()
    {
        return view('pages.suat_chieu.them-suatchieu');
    }
    public function sua_suatchieu($id)
    {
        $suat_chieus = suat_chieu::find($id);
        return view('pages.suat_chieu.sua-suatchieu')->with('suat_chieu', $suat_chieus);
    }
    public function them_lichchieu()
    {
        $phims = phim::where('trang_thai', 1)->get();
        $raps = rap::where('trang_thai', 1)->get();
        $suat_chieus = suat_chieu::where('trang_thai', 1)->get();
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        return view('pages.lich_chieu.them-lichchieu')->with("phim", $phims)->with("rap", $raps)->with("ds_suat_chieu", $suat_chieus)->with("ds_lich_chieu", $lich_chieus);
    }
    public function them_ve()
    {
        $khach_hang = khach_hang::where('trang_thai', 1)->get();
        $lich_chieus = lich_chieu::where('trang_thai', 1)->get();
        $ghes = ghe::where('trang_thai', 1)->get();
        return view('pages.ve.them-ve')->with("khach_hang", $khach_hang)->with("ds_lich_chieu", $lich_chieus)->with("ds_ghe", $ghes);
    }



    //rap
    public function danh_sach_rap()
    {
        $c_nhanh = chi_nhanh::all();
        $dsrap = rap::all();

        return view('pages.rap_phim.danh-sach-rap', ["dsrap" => $dsrap]); //->with("dsrap", $dsrap);
    }

    public function them_rap()
    {
        $dschi_nhanh = chi_nhanh::where('trang_thai', 1)->get();
        return view('pages.rap_phim.them-rap', ['dschi_nhanh' => $dschi_nhanh]);
    }

    public function cap_nhat_rap($id)
    {
        $raps = rap::find($id);
        return view('pages.rap_phim.cap-nhat-rap')->with("capnhatrap", $raps);
    }

    //chi nhanh
    public function danh_sach_chinhanh()
    {
        $dschi_nhanh = chi_nhanh::where('trang_thai', 1)->get();
        return view('pages.rap_phim.danh-sach-chinhanh')->with("dschinhanh", $dschi_nhanh);
    }

    public function them_chinhanh()
    {
        return view('pages.rap_phim.them-chinhanh');
    }

    public function cap_nhat_chinhanh($id)
    {
        $chi_nhanhs = chi_nhanh::find($id);
        return view('pages.rap_phim.cap-nhat-chi-nhanh')->with("capnhatchinhanh", $chi_nhanhs);
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
    public function ThemPhim(Request $request)
    {
        $img_name = "g8.jpg";
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $img_name = $file->getClientOriginalName('poster');
            $file->move('images', $img_name);
        }

        $phims = new phim;
        $phims->ten_phim = $request->tenphim;
        $phims->hinh_anh = $img_name;
        $phims->id_the_loai = $request->theloai;
        $phims->thoi_luong = $request->thoiluong;
        $newday = date("Y-m-d", strtotime($request->ngaykhoicchieu));
        $phims->khoi_chieu = $newday;
        $phims->tom_tat = $request->tomtat;

        $phims->save();
        return redirect()->action('HomeController@danh_sach_phim');
    }

    public function SuaPhim(Request $request, $id)
    {
        $img_name = phim::find($id)->hinh_anh;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $img_name = $file->getClientOriginalName('poster');
            $file->move('images', $img_name);
        }

        $phims = phim::find($id);
        $phims->ten_phim = $request->tenphim;
        $phims->hinh_anh = $img_name;
        $phims->id_the_loai = $request->theloai;
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
        $raps->ten_rap = 'rạp ' . (count(rap::where('id_chi_nhanh', $request->chi_nhanh)->get()) + 1);
        $raps->so_luong_ghe = $request->soluongghe;
        $raps->id_chi_nhanh = $request->chi_nhanh;
        $raps->trang_thai = $request->trang_thai;

        $raps->save();
        return redirect()->action('HomeController@danh_sach_rap');
    }

    public function SuaRap(Request $request, $id)
    {
        $raps = rap::find($id);
        $raps->so_luong_ghe = $request->soluongghe;
        $raps->id_chi_nhanh = $request->chi_nhanh;
        $raps->trang_thai = $request->trang_thai;

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

    public function xoa_suatchieu($id)
    {
        $suat_chieus = suat_chieu::find($id);
        $suat_chieus->trang_thai = "0";
        $suat_chieus->save();
        return redirect()->action('HomeController@danh_sach_suatchieu');
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
        return redirect()->action('HomeController@danh_sach_ve');
    }



    // public function DangNhap(Request $req){
    //     $arr = [
    //         'email'=>$req->email,
    //         'password'=>$req->password,
    //     ];

    //     if(Auth::attempt ($arr)){
    //         $user = User::find(Auth::user()->id);
    //         $req->session()->put('user' , $user);

    //         return redirect('/');
    //     }
    //     else{
    //         return 'Đăng nhập thất bại';
    //     }
    // }

    // public function DangXuat()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
}