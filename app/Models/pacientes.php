<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre_completo',
        'genero',
        'numero_movil',
        'numero_fijo',
        'lugar_de_procedencia',
        'email',
    ];
}
