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
        return view('pages.phim.danh-sach-phim', 
            [
                'phim' => $dsphim,
                'the_loais' => $the_loais
            ]);
    }

//the loai
    public function danh_sach_theloai()
    {
        $the_loais = the_loai::all();
        return view('pages.the_loai.danh-sach-theloai')->with("dstheloai", $the_loais);
    }

//suat chieu
    public function danh_sach_suatchieu()
    {
        return view('pages.suat_chieu.danh-sach-suatchieu');
    }

    public function them_suatchieu()
    {
        return view('pages.suat_chieu.them-suatchieu');
    }

//rap
    public function danh_sach_rap()
    {
        $c_nhanh = chi_nhanh::all();
        $dsrap = rap::all();

        return view('pages.rap_phim.danh-sach-rap', ["dsrap"=>$dsrap]);//->with("dsrap", $dsrap);
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
        $raps->ten_rap = 'rạp '.(count(rap::where('id_chi_nhanh', $request->chi_nhanh)->get())+1);
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
        $the_loais = the_loais::find($id);
        $the_loais->ten_the_loai = $request->tentheloai;

        $the_loais->save();
        return redirect()->action('HomeController@danh_sach_theloai');
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
        return redirect()->action('HomeController@//them_phim');
    }

    public function SuaVe(Request $request, $id)
    {
        $phims = phim::find($id);
        $phims->id_SuatChieu = $request->suatchieu;
        $phims->id_KH = $request->khachhang;

        $phims->save();
        return redirect()->action('HomeController@//dsVe');
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
?>