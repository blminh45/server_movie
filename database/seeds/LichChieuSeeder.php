<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lich_chieus')->insert([
            ['id_rap'=> 1,'id_phim'=> 1,'id_suat_chieu'=> 1],
            ['id_rap'=> 1,'id_phim'=> 2,'id_suat_chieu'=> 2],
            ['id_rap'=> 2,'id_phim'=> 1,'id_suat_chieu'=> 1],
            ['id_rap'=> 2,'id_phim'=> 2,'id_suat_chieu'=> 2],
        ]);
    }
}
