<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
    protected $primaryKey = 'id_aula';

    public $timestamps = true;

    protected $fillable = [
        'aula',
    ];
}

