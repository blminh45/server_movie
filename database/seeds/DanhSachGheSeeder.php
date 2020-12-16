<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachGheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danh_sach_ghes')->insert([
            ['id_ghe'=>1,'id_rap'=>1],
            ['id_ghe'=>2,'id_rap'=>1],
            ['id_ghe'=>1,'id_rap'=>2],
            ['id_ghe'=>2,'id_rap'=>2],
        ]);
    }
}