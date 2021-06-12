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

        $consulta = DB::select("SELECT * FROM administradores WHERE correo = '$usuario' OR usuario = '$usuario' AND contraseña = '$contraseña'");
        if(count($consulta) == 0){
            echo '<script type="text/javascript">
            alert("Usuario no existente por favor intentelo de nuevo");
            window.location.href="iniciarsesion/";
            </script>';
        }else{
            $request->session()->put('session_id', $consulta[0]->id);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_correo', $consulta[0]->correo);
            $request->session()->put('session_usuario', $consulta[0]->usuario);

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_correo = $request->session()->get('session_correo');
            $session_usuario = $request->session()->get('session_usuario');
            return view('templates.sesion_exitosa')
            ->with($nombre = $session_name);
        }
    }

    public function logout(Request $request)
    {

        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_correo');

        return view('templates.iniciar_sesion');
    }

}
