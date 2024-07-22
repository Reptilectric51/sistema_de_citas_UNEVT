<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function validar(Request $request)
    {
        $usuario = $request['usuario'];
        $contraseña = $request['contraseña'];

        $consulta = DB::select("SELECT * FROM administradores WHERE correo = '$usuario' OR usuario = '$usuario' AND contraseña = '$contraseña' AND estatus = 'ACTIVO'");
        if(count($consulta) == 0){
            echo '<script type="text/javascript">
            alert("Usuario no existente o desactivado por favor intentelo de nuevo");
            window.location.href="iniciarsesion";
            </script>';
        }else{
            $request->session()->put('session_id', $consulta[0]->id);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_ap', $consulta[0]->apellido_paterno);
            $request->session()->put('session_am', $consulta[0]->apellido_materno);
            $request->session()->put('session_correo', $consulta[0]->correo);
            $request->session()->put('session_password', $consulta[0]->contraseña);
            $request->session()->put('session_usuario', $consulta[0]->usuario);
            $request->session()->put('session_tipo', $consulta[0]->tipo_de_sesión);

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_ap = $request->session()->get('session_ap');
            $session_am = $request->session()->get('session_am');
            $session_correo = $request->session()->get('session_correo');
            $session_password = $request->session()->get('session_password');
            $session_usuario = $request->session()->get('session_usuario');
            $session_tipo = $request->session()->get('session_tipo');
            return view('templates.index')
            ->with($nombre = $session_name);/**/
        }
    }

    public function logout(Request $request)
    {

        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_ap');
        $request->session()->forget('session_am');
        $request->session()->forget('session_correo');
        $request->session()->forget('session_password');
        $request->session()->forget('session_usuario');
        $request->session()->forget('session_tipo');

        return view('templates.index');
    }

}
