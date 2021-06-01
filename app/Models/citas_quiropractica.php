<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas_quiropractica extends Model
{
    use HasFactory;

    protected $table = 'citas_quiropráctica';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'consultorio',
        'estatus',
        'fecha',
        'hora',
        'folio',
    ];
}
