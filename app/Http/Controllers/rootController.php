<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\administradores;

class rootController extends Controller
{
    public function buscar_usuario()
    {
        $usuarios = DB::table('administradores')->simplepaginate(10);
        return view("templatesroot.administradores")
        ->with(['usuarios' => $usuarios]);
    }

    public function crear_usuario(REQUEST $request)
    {
        $administradores = administradores::create(array(
           'nombre' => strtoupper($request['nombre']),
           'apellido_paterno' => strtoupper($request['apellido_paterno']),
           'apellido_materno' => strtoupper($request['apellido_materno']),
           'usuario' => strtoupper($request['usuario']),
           'correo' => strtoupper($request['correo']),
           'tipo_de_sesión' => strtoupper($request['sesion']),
           'contraseña' => strtoupper($request['contraseña']) 
        ));
        echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location.href="/usuarios";</script>';
    }
}
