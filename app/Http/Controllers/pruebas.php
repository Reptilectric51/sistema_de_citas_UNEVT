<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pruebas extends Controller
{
    public function prueba(Request $request){
        $fecha = $request['fecha'];
        $consult = $request['consul'];
        $horas = DB::select("SELECT  hora from citas_quiropractica WHERE fecha = '$fecha' and consultorio = '$consult'");
        return view ('pruebas.data')
        ->with(['horas'=>$horas]);
    }
}
