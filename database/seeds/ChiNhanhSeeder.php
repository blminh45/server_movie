<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiNhanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('chi_nhanhs')->insert([
            ['ten_chi_nhanh'=>'Galaxy','dia_chi'=>'Hà nội'],
            ['ten_chi_nhanh'=>'Galaxy','dia_chi'=>'TP Hồ Chí Minh'],
            ['ten_chi_nhanh'=>'Cinema','dia_chi'=>'Hà nội']
        ]);
    }
}