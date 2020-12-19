<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khach_hangs')->insert([
            [ 'ten'=>'Minh', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181245','email'=>'0306181245@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'2.png','mat_khau'=>'Minh45' ],
            [ 'ten'=>'Phú', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181257','email'=>'0306181257@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'2.png','mat_khau'=>'Phu57' ],
            [ 'ten'=>'Tâm', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181272','email'=>'0306181272@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'2.png','mat_khau'=>'Tam72' ],
            [ 'ten'=>'Toàn', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181281','email'=>'0306181281@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'2.png','mat_khau'=>'Toan81' ],
            [ 'ten'=>'Tuấn', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181290','email'=>'0306181290@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'2.png','mat_khau'=>'TuanTuan90' ],
        ]);
    }
}
