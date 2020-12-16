<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('raps')->insert([
            ['so_luong_ghe'=>20, 'id_chi_nhanh'=>1],
            ['so_luong_ghe'=>25, 'id_chi_nhanh'=>1],
            ['so_luong_ghe'=>20, 'id_chi_nhanh'=>2],
        ]);
    }
}
