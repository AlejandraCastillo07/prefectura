<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    protected $table = 'tipo_estados';
    protected $primaryKey = 'id_estado';
    
    public $timestamps = false;

    protected $fillable = ['estado'];
}
