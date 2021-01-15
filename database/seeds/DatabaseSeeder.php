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
        // $this->call(UserSeeder::class);
        $this->BankSeeder();
        $this->KhachHangSeeder();
        $this->ChiNhanhSeeder();
        $this->GheSeeder();
        $this->RapSeeder();
        $this->TheLoaiSeeder();
        $this->PhimSeeder();
        $this->SuatChieuSeeder();
    }

    public function BankSeeder()
    {
        DB::table('banks')->insert([
            ['STK' => '123456789', 'ten_chu_the' => 'nguyen hoai phu', 'mat_khau' => bcrypt('12345'), 'so_du' => 10000000],
            ['STK' => '234567891', 'ten_chu_the' => 'bui le minh', 'mat_khau' => bcrypt('12345'), 'so_du' => 10000000],
            ['STK' => '345678912', 'ten_chu_the' => 'nguyen anh tuan', 'mat_khau' => bcrypt('12345'), 'so_du' => 10000000],
            ['STK' => '456789123', 'ten_chu_the' => 'nguyen hoang tam', 'mat_khau' => bcrypt('12345'), 'so_du' => 10000000],
            ['STK' => '567891234', 'ten_chu_the' => 'nguyen mai phuong toan', 'mat_khau' => bcrypt('12345'), 'so_du' => 10000000]
        ]);
    }

    public function KhachHangSeeder()
    {
        DB::table('khach_hangs')->insert([
            ['ten' => 'Minh', 'dia_chi' => 'HCM', 'so_dien_thoai' => '0306181245', 'ngay_sinh' => '2000-1-1', 'email' => '0306181245@caothang.edu.vn', 'anh_dai_dien' => 'A', 'mat_khau' => 'Minh45'],
            ['ten' => 'Phú', 'dia_chi' => 'HCM', 'so_dien_thoai' => '0306181257', 'ngay_sinh' => '2000-1-1', 'email' => '0306181257@caothang.edu.vn', 'anh_dai_dien' => 'B', 'mat_khau' => 'Phu57'],
            ['ten' => 'Tâm', 'dia_chi' => 'HCM', 'so_dien_thoai' => '0306181272', 'ngay_sinh' => '2000-1-1', 'email' => '0306181272@caothang.edu.vn', 'anh_dai_dien' => 'C', 'mat_khau' => 'Tam72'],
            ['ten' => 'Toàn', 'dia_chi' => 'HCM', 'so_dien_thoai' => '0306181281', 'ngay_sinh' => '2000-1-1', 'email' => '0306181281@caothang.edu.vn', 'anh_dai_dien' => 'D', 'mat_khau' => 'Toan81'],
            ['ten' => 'Tuấn', 'dia_chi' => 'HCM', 'so_dien_thoai' => '0306181290', 'ngay_sinh' => '2000-1-1', 'email' => '0306181290@caothang.edu.vn', 'anh_dai_dien' => 'E', 'mat_khau' => 'TuanTuan90'],
        ]);
    }

    public function ChiNhanhSeeder()
    {
        DB::table('chi_nhanhs')->insert([
            ['ten_chi_nhanh' => 'Galaxy An Dương Vương', 'dia_chi' => 'Hà nội'],
            ['ten_chi_nhanh' => 'Galaxy Hùng Vương', 'dia_chi' => 'TP Hồ Chí Minh'],
            ['ten_chi_nhanh' => 'Cinema', 'dia_chi' => 'Hà nội']
        ]);
    }

    public function DanhSachChonGheSeeder()
    {
        DB::table('danh_sach_ghe_chons')->insert([
            ['id_ghe' => 1, 'id_rap' => 1, 'id_lich_chieu' => 1],
            ['id_ghe' => 2, 'id_rap' => 1, 'id_lich_chieu' => 1],
            ['id_ghe' => 1, 'id_rap' => 2, 'id_lich_chieu' => 2],
            ['id_ghe' => 2, 'id_rap' => 2, 'id_lich_chieu' => 2],
        ]);
    }

    public function DanhSachGheSeeder()
    {
        DB::table('danh_sach_ghes')->insert([
            ['id_ghe' => 1, 'id_rap' => 1],
            ['id_ghe' => 2, 'id_rap' => 1],
            ['id_ghe' => 1, 'id_rap' => 2],
            ['id_ghe' => 2, 'id_rap' => 2],
        ]);
    }
    public function GheSeeder()
    {
        DB::table('ghes')->insert([
            ['trang_thai' => '1', 'hang' => 'A', 'cot' => 1, 'gia_ghe' => '20000'],
            ['trang_thai' => '1', 'hang' => 'A', 'cot' => 2, 'gia_ghe' => '20000'],
            ['trang_thai' => '1', 'hang' => 'A', 'cot' => 3, 'gia_ghe' => '20000'],
            ['trang_thai' => '0', 'hang' => 'B', 'cot' => 1, 'gia_ghe' => '30000'],
            ['trang_thai' => '1', 'hang' => 'B', 'cot' => 2, 'gia_ghe' => '30000'],
            ['trang_thai' => '0', 'hang' => 'B', 'cot' => 3, 'gia_ghe' => '30000']
        ]);
    }
    public function PhimSeeder()
    {
        DB::table('phims')->insert([
            ['trang_thai' => '1', 'gia_phim' => '40000', 'ten_phim' => 'Koe no katachi', 'id_the_loai' => 1, 'thoi_luong' => 130, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'A_Silent_Voice_Film_Poster.jpg', 'tom_tat' => 'A_Silent_Voice_Film_Poster', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '1', 'gia_phim' => '50000', 'ten_phim' => 'Kimi no na wa', 'id_the_loai' => 2, 'thoi_luong' => 106, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'p12.jpg', 'tom_tat' => 'Kimi no na wa', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '1', 'gia_phim' => '60000', 'ten_phim' => 'Kaguya-sama: Love is war', 'id_the_loai' => 5, 'thoi_luong' => 24, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'p7.jpg', 'tom_tat' => 'Kaguya-sama: Love is war', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '1', 'gia_phim' => '40000', 'ten_phim' => 'Sieu Nhan Gao', 'id_the_loai' => 1, 'thoi_luong' => 130, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'A_Silent_Voice_Film_Poster.jpg', 'tom_tat' => 'A_Silent_Voice_Film_Poster', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '1', 'gia_phim' => '40000', 'ten_phim' => 'Hoa Phuong Do', 'id_the_loai' => 1, 'thoi_luong' => 130, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'A_Silent_Voice_Film_Poster.jpg', 'tom_tat' => 'A_Silent_Voice_Film_Poster', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '0', 'gia_phim' => '50000', 'ten_phim' => 'Cao Thang 65', 'id_the_loai' => 2, 'thoi_luong' => 106, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'p12.jpg', 'tom_tat' => 'Kimi no na wa', 'trailer' => 'Q6iK6DjV_iE'],
            ['trang_thai' => '0', 'gia_phim' => '50000', 'ten_phim' => 'Test lan ne', 'id_the_loai' => 2, 'thoi_luong' => 106, 'diem' => 8, 'tuoi' => 16, 'hinh_anh' => 'p12.jpg', 'tom_tat' => 'Kimi no na wa', 'trailer' => 'Q6iK6DjV_iE']
        ]);
    }
    public function RapSeeder()
    {
        DB::table('raps')->insert([
            ['ten_rap' => 'A', 'so_luong_ghe' => 20, 'id_chi_nhanh' => 1],
            ['ten_rap' => 'B', 'so_luong_ghe' => 25, 'id_chi_nhanh' => 3],
            ['ten_rap' => 'C', 'so_luong_ghe' => 20, 'id_chi_nhanh' => 2],
        ]);
    }
    public function SuatChieuSeeder()
    {
        DB::table('suat_chieus')->insert([
            ['ngay_chieu' => '2021/1/20', 'gia_suat_chieu' => '30000', 'gio_chieu' => '09:00:00'],
            ['ngay_chieu' => '2021/1/19', 'gia_suat_chieu' => '30000', 'gio_chieu' => '12:00:00'],
            ['ngay_chieu' => '2021/1/18', 'gia_suat_chieu' => '40000', 'gio_chieu' => '15:00:00'],
            ['ngay_chieu' => '2021/1/17', 'gia_suat_chieu' => '50000', 'gio_chieu' => '18:00:00'],
            ['ngay_chieu' => '2021/1/17', 'gia_suat_chieu' => '50000', 'gio_chieu' => '21:00:00']
        ]);
    }

    public function TheLoaiSeeder()
    {
        DB::table('the_loais')->insert([
            ['ten_the_loai' => 'tình cảm'],
            ['ten_the_loai' => 'học đường'],
            ['ten_the_loai' => 'siêu nhiên'],
            ['ten_the_loai' => 'hài hước'],
            ['ten_the_loai' => 'tâm lý']
        ]);
    }
    // $this->call(KhachHangSeeder::class);
    // $this->call(ChiNhanhSeeder::class);
    // $this->call(RapSeeder::class);
    // $this->call(GheSeeder::class);
    // $this->call(DanhSachGheSeeder::class);
    // $this->call(TheLoaiSeeder::class);
    // $this->call(PhimSeeder::class);
    // $this->call(SuatChieuSeeder::class);
    // $this->call(DanhSachChonGheSeeder::class);
    // $this->call(VeSeeder::class);
    // $this->call(UserSeeder::class);
}
