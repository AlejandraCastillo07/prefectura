<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            ['grupo' => 'A'],
            ['grupo' => 'B'],
            ['grupo' => 'C'],
            ['grupo' => 'D'],
            ['grupo' => 'E'],
        ]);
    }
}
