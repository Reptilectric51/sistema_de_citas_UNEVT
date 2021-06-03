<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas_quiropractica;
use Illuminate\Support\Facades\DB;

class sistemcontroller extends Controller
{
    public function citas_quiropractica()
    {
        $citas = citas_quiropractica::all();
        return view("templates.citas_quiropractica")
        ->with(['citas' => $citas]);
    }
    public function agendar_cita_quiropractica()
    {
        return view("templates.agendarCita_quiropractica");
    }
    public function guardar_cita_quiropractica(Request $request)
    {
        $consultorio = $request['consultorio'];
        $fecha = $request['fecha'];
        list($año,$mes,$dia) = explode("-",$fecha);
        $hora = $request['hora'];
        list($horas,$minutos) = explode(":",$hora);
        $folio = "Q".$consultorio."-".$dia.$mes.$horas;
        $estatus = "Activo";
        $email = $request['correo'];
        $fechaactual = date("Y-m-d");
        $mesactual = date("m");
        $añoactual = date("Y");
        if ($fecha < $fechaactual ){
            echo '<script language="javascript">alert("Fecha no puede ser anterior al día de hoy"); window.location.href="agendarcitaq/";</script>';
        }elseif ($mesactual < $mes){
                echo '<script language="javascript">alert("No puedes agendar una cita con fecha del mes siguiente"); window.location.href="agendarcitaq/";</script>';
            }
                elseif ($añoactual < $año){
                    echo '<script language="javascript">alert("No puedes agendar una cita con un año superior al actual"); window.location.href="agendarcitaq/";</script>';
                }else{
                    $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
        if (count($citaexiste) == 0){
            $citas = citas_quiropractica::create(array(
                'nombre'=>$request->input('nombre'),
                'apellido_paterno'=>$request->input('apellidop'),
                'apellido_materno'=>$request->input('apellidom'),
                'email'=>$request->input('correo'),
                'consultorio'=>$request->input('consultorio'),
                'estatus'=>$estatus,
                'fecha'=>$request->input('fecha'),
                'hora'=>$request->input('hora'),
                'folio'=>$folio,
            ));
            $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            return view("templates.comprobante_quiropractica")
            ->with(['cita' => $cita]);
        }else{
            echo '<script language="javascript">alert("La cita con ese folio ya ha sido agendada. Por favor elija otra fecha o hora"); window.location.href="agendarcitaq/";</script>';
        }
                }
       /*
    /**/ 
    }

    public function buscarcq(Request $request){
        $termb = $request['tb'];
        $citas = DB::select("SELECT * FROM citas_quiropractica WHERE nombre LIKE '%$termb%'");
        return view("templates.citas_quiropractica")
            ->with(['citas' => $citas]);
    }

}