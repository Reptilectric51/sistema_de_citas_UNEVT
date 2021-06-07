<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas_quiropractica;
use App\Models\pacientes;
use Illuminate\Support\Facades\DB;

class sistemcontroller extends Controller
{   
//-------------------------------------------Quiropractica------------------------------------//
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
        $nombre = $request['nombre'];
        $apellidop = $request['apellidop'];
        $apellidopm = $request['apellidom'];
        $nombre_completo = $nombre." ".$apellidop." ".$apellidopm;
        $pacienteexiste = DB::select("SELECT * FROM pacientes WHERE nombre_completo = '$nombre_completo'");
        if(count($pacienteexiste) == 1){
            if ($fecha < $fechaactual ){
                echo '<script language="javascript">alert("Fecha no puede ser anterior al día de hoy"); window.location.href="agendarcitaq/";</script>';
            }elseif ($añoactual < $año){
                        echo '<script language="javascript">alert("No puedes agendar una cita con un año superior al actual"); window.location.href="agendarcitaq/";</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'email'=> strtoupper($email),
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
        }else{
            if ($fecha < $fechaactual ){
                echo '<script language="javascript">alert("Fecha no puede ser anterior al día de hoy"); window.location.href="agendarcitaq/";</script>';
            }elseif ($añoactual < $año){
                        echo '<script language="javascript">alert("No puedes agendar una cita con un año superior al actual"); window.location.href="agendarcitaq/";</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $paciente = pacientes::create(array(
                    'nombre_completo'=>strtoupper($nombre_completo),
                    'numero_movil'=>$request['celular'],
                    'numero_fijo'=>$request['telefono'],
                    'lugar_de_procedencia'=>strtoupper($request['procedencia']),
                    'email'=>($email),
                ));
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'email'=> strtoupper($email),
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
        }
        /*
       /*
    /**/ 
    }

    public function comprobantecqpdf(Request $request){
        $folio = $request['folio'];
        $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
        /*return view("templatespdf.comprobante_quiropracticapdf")
        ->with(['cita' => $cita]);

        /**/
        $pdf = app('dompdf.wrapper');
        $pdf ->loadView('templatespdf.comprobante_quiropracticapdf', ['cita' => $cita]);
        return $pdf->download('comprobante de mi cita.pdf');
    }

    public function buscarcq(Request $request){
        $termb = $request['tb'];
        $citas = DB::select("SELECT * FROM citas_quiropractica WHERE nombre LIKE '%$termb%' OR folio = '$termb'");
        return view("templates.citas_quiropractica")
            ->with(['citas' => $citas]);
    }

}