<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    public $timestamps = true;

    protected $fillable = [
        'carrera',
    ];
}
