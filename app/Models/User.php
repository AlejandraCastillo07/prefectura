<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con Asistencia
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_usuario');  // Verifica que 'id_usuario' sea la clave foránea en la tabla 'asistencias'
    }

    // Relación con Horario (Si un usuario tiene muchos horarios)
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_usuario');  // Asegúrate de que 'id_usuario' es la clave foránea en la tabla 'horarios'
    }

    public function esPrefecto()
{
    return $this->rol === 'prefecto';
}

public function esJefeAcademico()
{
    return $this->rol === 'jefe_academico';
}

public function esSubdirector()
{
    return $this->rol === 'subdirector';
}

}
