<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
        
            $table->unsignedBigInteger('id_maestro');
            $table->unsignedBigInteger('id_asignatura');
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_aula');
        
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin'); 
            $table->boolean('visible')->default(true); 
            $table->unsignedBigInteger('id_usuario');  // Relacionado con la tabla de usuarios
            
                      
            $table->timestamps();
        
            $table->foreign('id_maestro')->references('id_maestro')->on('maestros')->onDelete('cascade');
            $table->foreign('id_asignatura')->references('id_asignatura')->on('asignaturas')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->foreign('id_aula')->references('id_aula')->on('aulas')->onDelete('cascade');
             // Definición de la relación con la tabla `users` (usuarios)
             $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
