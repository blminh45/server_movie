<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\bank;

class BankController extends Controller
{
    public function KiemTraChuThe($credential){
        $b_pass = bank::select('mat_khau')->where('STK', $credential->STK)->get();
        if(Hash::check($credential->mat_khau, $b_pass[0]->mat_khau))
            return true;
        return false;
    }

    public function ThongTinTaiKhoan(Request $req){
        $b_pass = bank::select('mat_khau')->where('STK', $req->STK)->get();
        if(Hash::check($req->mat_khau, $b_pass[0]->mat_khau))
            return json_encode(bank::where('STK', $req->STK)->get(), 200);
        return json_encode("Not Found", 404);
    }

    public function KiemTraTaiKhoan($req){
        $tk = bank::where('STK', $req->STK);
        if($req->so_tien > $tk->so_du)
            return json_encode("Fail", 202);
    }

    public function TruSoDu(Request $req) {
        $credential = new \stdClass();
        $credential->STK = $req->STK;
        $credential->mat_khau = $req->mat_khau;
        if(BankController::KiemTraChuThe($credential)){
            $tk = bank::where('STK', $req->STK)->get()[0];
            if($tk->so_du < $req->so_tien)
                return json_encode("khong du so du tai khoan", 202);
            else {
                bank::where('STK', $req->STK)->update(["so_du"=>$tk->so_du -= $req->so_tien]);
                return json_encode("thanh toan thanh cong", 200);
            }
        }
    }
}
?>