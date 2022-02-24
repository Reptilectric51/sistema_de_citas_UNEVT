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
        $usuario = $request['usuario'];
        $correo = $request['correo'];
        $userexist = DB::select("SELECT * FROM administradores WHERE usuario = '$usuario'");
        $emailexist = DB::select("SELECT * FROM administradores  WHERE correo = '$correo'");
        if(count($userexist) ==0 && count($emailexist) ==0){
        $administradores = administradores::create(array(
           'nombre' => strtoupper($request['nombre']),
           'apellido_paterno' => strtoupper($request['apellido_paterno']),
           'apellido_materno' => strtoupper($request['apellido_materno']),
           'usuario' => $request['usuario'],
           'correo' => $request['correo'],
           'tipo_de_sesión' => strtoupper($request['sesion']),
           'area' => $request['area'],
           'contraseña' => $request['contraseña'], 
           'estatus' => $estatus
        ));
        echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location.href="/usuarios";</script>';
        }else{
            echo'<script type="text/javascript">
                        alert("El usuario ya ha sido registrado anteriormente");
                        history.go(-1);
                        </script>';  
        }
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
        $nombre = strtoupper($request['nombre']);
        $apellido_paterno = strtoupper($request['apellido_paterno']);
        $apellido_materno = strtoupper($request['apellido_materno']);
        $usuario = $request['usuario'];
        $correo = $request['correo'];
        $tipo_de_sesion = $request['sesion'];
        $contraseña = $request['contraseña'];
        $area = $request['area'];
        $estatus = $request['estatus'];
        $userexist = DB::select("SELECT * FROM administradores  WHERE id = '$id'AND usuario = '$usuario'");
        $userexist1 = DB::select("SELECT * FROM administradores  WHERE usuario = '$usuario'");
        $emailexist = DB::select("SELECT * FROM administradores  WHERE id = '$id' AND correo = '$correo'");
        $emailexist1 = DB::select("SELECT * FROM administradores  WHERE correo = '$correo'");
        if(((count($userexist)==0 && count($userexist1)==1) || (count($userexist1)== 1 && count($userexist) == 1) || (count($userexist)==0 && count($userexist1)==0)) || ((count($emailexist)==1 && count($emailexist1)==0) || (count($emailexist1)== 1 && count($emailexist) == 1) || (count($emailexist)==0 && count($emailexist1)==0))){
            $guardar_usuario = DB::update("UPDATE administradores SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', correo = '$correo', tipo_de_sesión = '$tipo_de_sesion', estatus='$estatus', contraseña = '$contraseña' WHERE id='$id'");
            echo'<script type="text/javascript">
                        alert("Usuario actualizado");
                        window.location.href="usuarios";
                        </script>';           
        }else{
            echo'<script type="text/javascript">
                        alert("El usuario ya ha sido registrado anteriormente");
                        history.go(-1);
                        </script>';  
        }/**/

    }
}
