<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KhachHangSeeder::class);
        $this->call(ChiNhanhSeeder::class);
        $this->call(RapSeeder::class);
        $this->call(GheSeeder::class);
        $this->call(DanhSachGheSeeder::class);
        $this->call(TheLoaiSeeder::class);
        $this->call(PhimSeeder::class);
        $this->call(SuatChieuSeeder::class);
        $this->call(DanhSachChonGheSeeder::class);
        $this->call(VeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
