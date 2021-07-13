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
        $estatus = strtoupper('activo');
        $administradores = administradores::create(array(
           'nombre' => strtoupper($request['nombre']),
           'apellido_paterno' => strtoupper($request['apellido_paterno']),
           'apellido_materno' => strtoupper($request['apellido_materno']),
           'usuario' => $request['usuario'],
           'correo' => $request['correo'],
           'tipo_de_sesión' => strtoupper($request['sesion']),
           'contraseña' => $request['contraseña'], 
           'estatus' => $estatus
        ));
        echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location.href="/usuarios";</script>';
    }

    public function editar_usuarios(Request $request)
    {
        $id = $request['id'];
        $usuario = DB::select("SELECT * FROM administradores WHERE id = '$id'");
        return view ('templatesroot.editaruser')
        ->with(['usuario' => $usuario ]);
    }
    
    public function guardar_usuario(Request $request)
    {
        $id = $request['id'];
        $nombre = $request['nombre'];
        $apellido_paterno = $request['apellido_paterno'];
        $apellido_materno = $request['apellido_materno'];
        $usuario = $request['usuario'];
        $correo = $request['correo'];
        $tipo_de_sesion = $request['sesion'];
        $contraseña = $request['contraseña'];
        $guardar_usuario = DB::update("UPDATE administradores SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', usuario = '$usuario', correo = '$correo', tipo_de_sesión = '$tipo_de_sesion', contraseña = '$contraseña'");
        echo'<script type="text/javascript">
                    alert("Usuario actualizado");
                    window.location.href="usuarios/";
                    </script>';
    }
}
