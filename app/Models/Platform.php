<?php

// Indicamos el namespace del modelo

namespace App\Models;

// Importamos las clases que vamos a usar
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Definimos la clase Platform que extiende de Model
class Platform extends Model
{
    // Usamos los rasgos HasFactory y SoftDeletes
    use HasFactory;
    use SoftDeletes;

    // Indicamos el nombre de la tabla de la base de datos
    protected $table = 'ticket_platforms';

    // Indicamos los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre_plataforma',
    ];
}
