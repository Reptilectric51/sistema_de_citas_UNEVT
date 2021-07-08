<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administradores extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $fillable = [
        'nombre',
        'usuario',
        'correo',
        'tipo_de_sesión',
        'contraseña'
    ];
}
