<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rootController extends Controller
{
    public function buscar_usuario()
    {
        $usuarios = DB::table('administradores')->simplepaginate(10);
        return view("templatesroot.administradores")
        ->with(['usuarios' => $usuarios]);
    }
}
