<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $primaryKey = 'id_grupo';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        // Agrega otros campos del grupo si los hay
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_grupo');
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Grupo extends Model
// {
//     protected $table = 'grupos'; // Si no es plural, define el nombre exacto de la tabla
//     protected $primaryKey = 'id_grupo'; // Laravel asume 'id' por defecto, pero en este caso, lo cambiamos

//     public $timestamps = true; // Para que Laravel maneje automáticamente created_at y updated_at

//     protected $fillable = [
//         'grupo',
//     ];
// }
