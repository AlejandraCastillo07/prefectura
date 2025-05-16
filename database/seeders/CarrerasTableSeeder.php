<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            ['carrera' => 'Ingeniería en Sistemas'],
            ['carrera' => 'Ingeniería Industrial'],
            ['carrera' => 'Licenciatura en Física'],
            ['carrera' => 'Licenciatura en Química'],
            ['carrera' => 'Licenciatura en Historia'],
        ]);
    }
}
