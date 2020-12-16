<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ghes')->insert([
            [ 'hang'=>'A', 'cot'=>1],
            [ 'hang'=>'A', 'cot'=>2],
            [ 'hang'=>'A', 'cot'=>3],
            [ 'hang'=>'B', 'cot'=>1],
            [ 'hang'=>'B', 'cot'=>2],
            [ 'hang'=>'B', 'cot'=>3]
        ]);
    }
}
