<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Asistencia extends Model
{
    use HasFactory;

    
    protected $table = 'registro_asistencias';

    protected $primaryKey = 'id_asistencia'; // Usamos la clave primaria correcta

    public $incrementing = true; // Laravel ya lo asume, pero lo dejamos claro

    // NO PONGAS keyType => bigint porque no es válido
    // protected $keyType = 'bigint'; ← ¡ESTO NO!

    protected $fillable = [
        'id_horario', 
        'id_estado', 
        'fecha_asistencia', 
        'hora_asistencia',
        'visible',
        'id_usuario',
    ];

    public function tipoestado()
    {
        return $this->belongsTo(TipoEstado::class, 'id_estado');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }

    public function usuario()
{
    return $this->belongsTo(User::class, 'id_usuario');
}
}
