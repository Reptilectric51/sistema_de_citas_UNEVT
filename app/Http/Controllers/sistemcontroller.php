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
        $folio = "Q".$consultorio."-".$dia.$horas;
        $estatus = "Activo";

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
        return redirect()->route('comprobantecitaq');
    }

    $email = "junolik.245@outlook.com";

    public function comprobantecitaq(Request $request)
    {
        $citas = DB::select('SELECT * FROM citas_quiropráctica WHERE email = "$email"');
        return view("templates.comprobante_quiropractica")
        ->with(['citas' => $citas]);
    }

}
