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
        $dsphim = phim::all();
        foreach ($dsphim as $item) {
            echo "
            <tr>
            <td class='idPhim'>".$item->id."</td>
            <td>".$item->ten_phim."</td>
            <td> <img width='100%' src='/images/".$item->hinh_anh."'></td>
            <td>".$item->the_loai->ten_the_loai."</td>
            <td><a type='submit' href='#mediumModal' class='btn btn-warning' id='getPhim' data-toggle='modal' data-target='#mediumModal'>Update</a></td>
                <td>
                    <button type='button' class='btn btn-secondary' style='background-color: #606060; color: #fff;''>Delete</button>
                </td>
                <td><button class='btn btn-info'>Lịch chiếu</button></td>
            </tr>
            ";
        }
    }

    public function getPhim(Request $req){
        $phim = phim::find($req->id);
        
        return json_encode($phim);
    }

    public function ThemPhim(Request $request)
    {
        $req = $request->phim;
        $phims = new phim;
        $phims->ten_phim = $req["tenphim"];
        $phims->id_the_loai = $req["theloai"];
        $phims->thoi_luong = $req["thoiluong"];
        $phims->trailer = $req["trailer"];
        $phims->tom_tat = $req["tomtat"];
        $phims->hinh_anh = $req["poster"];

        $phims->save();
        return redirect()->action('AjaxController@danh_sach_phim');
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
            'hinh_anh' => $req["poster"]
        ]);
        
        return redirect()->action('AjaxController@danh_sach_phim');
    }

}