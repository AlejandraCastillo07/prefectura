<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas'; // Opcional si sigue la convención

    protected $primaryKey = 'id_asignatura';

    public $timestamps = true;

    protected $fillable = [
        'nombre_asignatura',
        'clave_asignatura',
        'horas_teoricas',
        // Agrega otros campos si es necesario
    ];

    // Relaciones
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_asignatura');
    }
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Asignatura extends Model
// {
//     protected $table = 'asignaturas'; // Solo si el nombre no sigue la convención Laravel (no obligatorio si es plural del modelo)

//     protected $primaryKey = 'id_asignatura'; // Laravel asume 'id' por defecto

//     public $timestamps = true; // Por si decides desactivarlos, déjalo en true si usas created_at/updated_at

//     protected $fillable = [
//         'nombre_asignatura',
//         'clave_asignatura',
//         'horas_teoricas',
//     ];

    
// }
