<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachChonGheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danh_sach_chon_ghes')->insert([
            ['id_ghe'=>1,'id_rap'=>1,'id_suat_chieu'=>1],
            ['id_ghe'=>2,'id_rap'=>1,'id_suat_chieu'=>1],
            ['id_ghe'=>1,'id_rap'=>2,'id_suat_chieu'=>2],
            ['id_ghe'=>2,'id_rap'=>2,'id_suat_chieu'=>2],
        ]);
    }
}
