<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert([
            ['aula' => 'A1'],
            ['aula' => 'A2'],
            ['aula' => 'A3'],
            ['aula' => 'B1'],
            ['aula' => 'B2'],
        ]);
    }
}
