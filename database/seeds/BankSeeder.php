<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            ['STK'=>'123456789','ten_chu_the'=>'nguyen hoai phu','mat_khau'=>bcrypt('12345'), 'so_du'=> 1000.000],
            ['STK'=>'234567891','ten_chu_the'=>'bui le minh','mat_khau'=>bcrypt('12345'), 'so_du'=> 1000.000],
            ['STK'=>'345678912','ten_chu_the'=>'nguyen anh tuan','mat_khau'=>bcrypt('12345'), 'so_du'=> 1000.000],
            ['STK'=>'456789123','ten_chu_the'=>'nguyen hoang tam','mat_khau'=>bcrypt('12345'), 'so_du'=> 1000.000],
            ['STK'=>'567891234','ten_chu_the'=>'nguyen mai phuong toan','mat_khau'=>bcrypt('12345'), 'so_du'=> 1000.000]
        ]);
    }
}
