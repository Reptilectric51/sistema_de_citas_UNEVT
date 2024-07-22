<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\administradores;

class modificacionesadminController extends Controller
{
    public function modificardatosadmin(Request $request)
    {
        $passwordactual=session('session_password');
        $id=session('session_id');
        $newpass = $request['pass'];
        $confirmpass = $request['confpassword'];
        $newname = $request['nombre'];
        $user = $request['user'];
        $newcorreo = $request['correo'];
        $session = $request['session'];
        $apellido_paterno = $request['Apellido_paterno'];
        $apellido_materno = $request['Apellido_materno'];
        $userexist = DB::select("SELECT * FROM administradores WHERE usuario = '$user'");
        $userexist1 = DB::select("SELECT * FROM administradores WHERE usuario = '$user' AND id = '$id'");
        $correoexist = DB::select("SELECT * FROM administradores WHERE correo = '$newcorreo'");
        $correoexist1 = DB::select("SELECT * FROM administradores WHERE correo = '$newcorreo' AND id = '$id'");
        if($passwordactual == $confirmpass){
            if((count($userexist)==1 && count($userexist1)==0) || (count($userexist)==1 && count($userexist1)==1) || (count($userexist)==0 && count($userexist1)==0)){
                if((count($correoexist)==1 && count($correoexist1)==0) || (count($correoexist)==1 && count($correoexist1)==1) || (count($correoexist)==0 && count($correoexist1)==0)){
                    $actualizardatos = DB::update("UPDATE administradores SET nombre = '$newname', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno',  correo = '$newcorreo', usuario = '$user', contraseña = '$newpass', tipo_de_sesión = '$session' WHERE id = $id");
                    $request->session()->forget('session_id');
                    $request->session()->forget('session_name');
                    $request->session()->forget('session_ap');
                    $request->session()->forget('session_am');
                    $request->session()->forget('session_correo');
                    $request->session()->forget('session_password');
                    $request->session()->forget('session_usuario');
                    $request->session()->forget('session_tipo');
                    echo '<script language="javascript">alert("Cambios realizados correctamente para visualisarlos vuelva a iniciar sesión"); window.location.href="iniciarsesion/";</script>';
                }else{
                    echo "Correo existe";
                }
            }else{
                echo "El usuario existe";
            }
        }elseif($passwordactual != $confirmpass){
            echo '<script language="javascript">alert("confirmación de la contraseña incorrecta intentelo otra vez"); history.go(-1);</script>';
        }
    }

    public function buscar_usuario(Request $request)
    {
        $termb = $request['termb'];
        $usuarios = administradores::where("usuario", "LIKE", '%'.$termb.'%')->simplepaginate(10);
        return view ("templatesroot.administradores")
        ->with(['usuarios' => $usuarios])
        ->with(['termb' => $termb]);
    }
}
