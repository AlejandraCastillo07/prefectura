<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $primaryKey = 'id_horario';

protected $fillable = [
    'id_maestro',
    'id_asignatura',
    'id_carrera',
    'id_grupo',
    'id_aula',
    'dia',
    'hora_inicio',
    'hora_fin',
    'visible',
    'id_usuario'
];

public function maestro() { return $this->belongsTo(Maestro::class, 'id_maestro'); }
public function asignatura() { return $this->belongsTo(Asignatura::class, 'id_asignatura'); }
public function carrera() { return $this->belongsTo(Carrera::class, 'id_carrera'); }
public function grupo() { return $this->belongsTo(Grupo::class, 'id_grupo'); }
public function aula() { return $this->belongsTo(Aula::class, 'id_aula'); }
public function usuario() {
    return $this->belongsTo(User::class, 'id_usuario');
}


}
