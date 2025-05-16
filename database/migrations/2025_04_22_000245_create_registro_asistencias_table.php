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
        Schema::create('registro_asistencias', function (Blueprint $table) {
            $table->id('id_asistencia');
            
            // Claves foráneas
            $table->unsignedBigInteger('id_horario');
            $table->foreign('id_horario')->references('id_horario')->on('horarios')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('tipo_estados')->onDelete('cascade');
            
            // Otros campos
            $table->date('fecha_asistencia');
            $table->time('hora_asistencia');
            $table->boolean('visible')->default(true);
            $table->unsignedBigInteger('id_usuario');  // Relacionado con la tabla de usuarios
            
            // Definición de la relación con la tabla `users` (usuarios)
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_asistencias');
    }
};
