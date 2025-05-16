<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaestrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maestros')->insert([
            ['nombre' => 'Carlos', 'apellido' => 'González'],
            ['nombre' => 'Ana', 'apellido' => 'Martínez'],
            ['nombre' => 'Luis', 'apellido' => 'Pérez'],
            ['nombre' => 'María', 'apellido' => 'Hernández'],
            ['nombre' => 'José', 'apellido' => 'López'],
        ]);
    }
}
