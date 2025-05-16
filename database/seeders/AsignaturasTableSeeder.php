<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert([
            ['nombre_asignatura' => 'Matemáticas', 'clave_asignatura' => 'MAT101', 'horas_teoricas' => '4'],
            ['nombre_asignatura' => 'Física', 'clave_asignatura' => 'FIS102', 'horas_teoricas' => '3'],
            ['nombre_asignatura' => 'Programación', 'clave_asignatura' => 'PROG103', 'horas_teoricas' => '3'],
            ['nombre_asignatura' => 'Química', 'clave_asignatura' => 'QUI104', 'horas_teoricas' => '3'],
            ['nombre_asignatura' => 'Historia', 'clave_asignatura' => 'HIS105', 'horas_teoricas' => '2'],
        ]);
    }
}
