<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $table = 'maestros'; // Nombre exacto de la tabla
    protected $primaryKey = 'id_maestro'; // Especificamos el campo de la llave primaria

    public $timestamps = true; // Laravel manejará automáticamente created_at y updated_at

    protected $fillable = [
        'nombre',
        'apellido',
    ];
}
