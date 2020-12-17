<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuatChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suat_chieus')->insert([
            ['id_rap'=>1,'id_phim'=>1,'ngay_chieu'=>'2020/1/1','gio_chieu'=>'9:00'],
            ['id_rap'=>2,'id_phim'=>2,'ngay_chieu'=>'2020/1/2','gio_chieu'=>'9:00'],
        ]);
    }
}
