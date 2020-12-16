<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ves')->insert([
            [ 'id_suat_chieu'=>1, 'id_khach_hang'=>1],
            [ 'id_suat_chieu'=>1, 'id_khach_hang'=>2],
            [ 'id_suat_chieu'=>2, 'id_khach_hang'=>1],
            [ 'id_suat_chieu'=>2, 'id_khach_hang'=>2]
        ]);
    }
}
