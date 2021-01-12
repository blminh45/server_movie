<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->KhachHangSeeder();
        $this->ChiNhanhSeeder();
        $this->GheSeeder();
        $this->RapSeeder();
        $this->TheLoaiSeeder();
        $this->PhimSeeder();
        $this->SuatChieuSeeder();
    }

    public function KhachHangSeeder()
    {
        DB::table('khach_hangs')->insert([
            [ 'ten'=>'Minh', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181245','ngay_sinh'=>'2000-1-1','email'=>'0306181245@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'A','mat_khau'=>'Minh45' ],
            [ 'ten'=>'Phú', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181257','ngay_sinh'=>'2000-1-1','email'=>'0306181257@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'B','mat_khau'=>'Phu57' ],
            [ 'ten'=>'Tâm', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181272','ngay_sinh'=>'2000-1-1','email'=>'0306181272@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'C','mat_khau'=>'Tam72' ],
            [ 'ten'=>'Toàn', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181281','ngay_sinh'=>'2000-1-1','email'=>'0306181281@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'D','mat_khau'=>'Toan81' ],
            [ 'ten'=>'Tuấn', 'dia_chi'=>'HCM', 'so_dien_thoai'=>'0306181290','ngay_sinh'=>'2000-1-1','email'=>'0306181290@caothang.edu.vn','gioi_tinh'=>'Nam','anh_dai_dien'=>'E','mat_khau'=>'TuanTuan90' ],
        ]);
    }

    public function ChiNhanhSeeder()
    {
        DB::table('chi_nhanhs')->insert([
            ['ten_chi_nhanh'=>'Galaxy An Dương Vương','dia_chi'=>'Hà nội'],
            ['ten_chi_nhanh'=>'Galaxy Hùng Vương','dia_chi'=>'TP Hồ Chí Minh'],
            ['ten_chi_nhanh'=>'Cinema','dia_chi'=>'Hà nội']
        ]);
    }

    public function DanhSachChonGheSeeder()
    {
        DB::table('danh_sach_ghe_chons')->insert([
            ['id_ghe'=>1,'id_rap'=>1,'id_lich_chieu'=>1],
            ['id_ghe'=>2,'id_rap'=>1,'id_lich_chieu'=>1],
            ['id_ghe'=>1,'id_rap'=>2,'id_lich_chieu'=>2],
            ['id_ghe'=>2,'id_rap'=>2,'id_lich_chieu'=>2],
        ]);
    }

    public function DanhSachGheSeeder()
    {
        DB::table('danh_sach_ghes')->insert([
            ['id_ghe'=>1,'id_rap'=>1],
            ['id_ghe'=>2,'id_rap'=>1],
            ['id_ghe'=>1,'id_rap'=>2],
            ['id_ghe'=>2,'id_rap'=>2],
        ]);
    }
    public function GheSeeder()
    {
        DB::table('ghes')->insert([
            [ 'hang'=>'A', 'cot'=>1],
            [ 'hang'=>'A', 'cot'=>2],
            [ 'hang'=>'A', 'cot'=>3],
            [ 'hang'=>'B', 'cot'=>1],
            [ 'hang'=>'B', 'cot'=>2],
            [ 'hang'=>'B', 'cot'=>3]
        ]);
    }
    public function LichChieuSeeder()
    {
        DB::table('lich_chieus')->insert([
            ['id_rap'=> 1,'id_phim'=> 1,'id_suat_chieu'=> 1],
            ['id_rap'=> 1,'id_phim'=> 2,'id_suat_chieu'=> 2],
            ['id_rap'=> 2,'id_phim'=> 1,'id_suat_chieu'=> 1],
            ['id_rap'=> 2,'id_phim'=> 2,'id_suat_chieu'=> 2],
        ]);
    }
    public function PhimSeeder()
    {
        DB::table('phims')->insert([
            [ 'ten_phim'=>'Koe no katachi', 'id_the_loai'=>1, 'thoi_luong'=>130 ],
            [ 'ten_phim'=>'Kimi no na wa', 'id_the_loai'=>2, 'thoi_luong'=>106 ],
            [ 'ten_phim'=>'Kaguya-sama: Love is war', 'id_the_loai'=>5, 'thoi_luong'=>24 ]
        ]);
    }
    public function RapSeeder()
    {
        DB::table('raps')->insert([
            ['ten_rap'=>'A','so_luong_ghe'=>20, 'id_chi_nhanh'=>1],
            ['ten_rap'=>'B','so_luong_ghe'=>25, 'id_chi_nhanh'=>1],
            ['ten_rap'=>'A','so_luong_ghe'=>20, 'id_chi_nhanh'=>2],
        ]);
    }
    public function SuatChieuSeeder()
    {
        DB::table('suat_chieus')->insert([
            ['ngay_chieu'=>'2020/1/1','gio_chieu'=>'9:00'],
            ['ngay_chieu'=>'2020/1/1','gio_chieu'=>'11:00'],
            ['ngay_chieu'=>'2020/1/1','gio_chieu'=>'13:00'],
            ['ngay_chieu'=>'2020/1/1','gio_chieu'=>'15:00'],
            ['ngay_chieu'=>'2020/1/2','gio_chieu'=>'9:00'],
            ['ngay_chieu'=>'2020/1/2','gio_chieu'=>'11:00'],
            ['ngay_chieu'=>'2020/1/2','gio_chieu'=>'13:00'],
            ['ngay_chieu'=>'2020/1/2','gio_chieu'=>'15:00']
        ]);
    }

    public function TheLoaiSeeder()
    {
        DB::table('the_loais')->insert([
            ['ten_the_loai'=>'tình cảm'],
            ['ten_the_loai'=>'học đường'],
            ['ten_the_loai'=>'siêu nhiên'],
            ['ten_the_loai'=>'hài hước'],
            ['ten_the_loai'=>'tâm lý']
        ]);
    }

    public function VeSeeder()
    {
        DB::table('ves')->insert([
            [ 'id_lich_chieu'=>1, 'id_khach_hang'=>1,'id_ghe'=>1,'gia'=>80],
            [ 'id_lich_chieu'=>1, 'id_khach_hang'=>2,'id_ghe'=>5,'gia'=>80],
            [ 'id_lich_chieu'=>2, 'id_khach_hang'=>3,'id_ghe'=>2,'gia'=>80],
            [ 'id_lich_chieu'=>2, 'id_khach_hang'=>4,'id_ghe'=>3,'gia'=>80],
            [ 'id_lich_chieu'=>2, 'id_khach_hang'=>5,'id_ghe'=>4,'gia'=>80],
        ]);
    }
}
