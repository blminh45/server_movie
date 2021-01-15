<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\bank;

class BankController extends Controller
{
    public function ThongTinTaiKhoan(Request $req){
        $b_pass = bank::select('mat_khau')->where('STK', $req->STK)->get();
        if(Hash::check($req->mat_khau, $b_pass[0]->mat_khau))
            return json_encode(bank::where('STK', $req->STK)->get(), 200);
        return json_encode("Not Found", 404);
    }

    public function KiemTraTaiKhoan(Request $req){
        $tk = bank::where('STK', $req->stk);
        if($req->so_tien > $tk->so_du)
            return json_encode("Fail", 202);
    }
}
?>