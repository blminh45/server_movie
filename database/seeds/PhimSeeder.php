<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phims')->insert([
            [ 'ten_phim'=>'Koe no katachi', 'id_the_loai'=>1, 'thoi_luong'=>130, 'hinh_anh'=>'A_Silent_Voice_Film_Poster.jpg' ],
            [ 'ten_phim'=>'Kimi no na wa', 'id_the_loai'=>2, 'thoi_luong'=>106, 'hinh_anh'=>'Kimi no na wa.jpg' ],
            [ 'ten_phim'=>'Kaguya-sama: Love is war', 'id_the_loai'=>5, 'thoi_luong'=>24, 'hinh_anh'=>'love-is-war.jpg' ],
        ]);
    }
}
