<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citas_quiropractica;
use App\Models\pacientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrdendeEnvio;
use App\Mail\EnvioComprobante;

class sistemcontroller extends Controller
{   

//-------------------------------------------Buscar cita--------------------------------------//
public function buscarcitas(Request $request)
{
    $curp = strtoupper($request['curp']);
    $citas = citas_quiropractica::where("curp", "=", $curp)->simplepaginate(10);
        if(count($citas)==0){
            echo '<script type="text/javascript">
            alert("No se han encontrado citas por favor verifique sus datos");
            window.location.href="buscarcita/";
            </script>';
        }else{
            return view("templates.miscitas")
        ->with(['citas' => $citas]);
        }
}


//--------------------------------------------Cancelar cita-----------------------------------//
public function cancelarcita(Request $request)
{
    $folio = $request['folio'];
    $rest = substr($folio, 0, 1);
    $id = $request['id'];
    $nombrec = $request['nombrec'];
    $email = $request['correo'];
    $mensaje = "Hola"." ".$nombrec;
    $mensaje2 = "Su cita con fecha:".$request['fecha'].", "."hora:".$request['hora'].", "."y folio:".$folio." "."a sido cancelda";
    if($folio != "CANCELADO"){
    if($rest != "C"){
       $actualizar = DB::update("UPDATE citas_quiropractica SET estatus = 'CANCELADA', folio = 'CANCELADO' WHERE id = '$id'");
        $data=array(
            'asunto'=>'Confirmación de cancelación de cita',
            'email'=>$email,
            'mensaje'=>$mensaje,
            'mensaje2'=>$mensaje2,
    );
    if($email != "N/A"){
        Mail::to($request->correo)->send(new OrdendeEnvio($data));
        echo '<script language="javascript">alert("La cita fue cancelada exitosamente"); window.history.back();</script>';
    }else{
        echo '<script language="javascript">alert("La cita fue cancelada exitosamente"); window.history.back();</script>';
    }
}
}else{
    echo '<script language="javascript">alert("La cita ya fue cancelada"); window.history.back();</script>';
}
}

//-------------------------------------------Fechas ocupadas------------------------------------//
    public function fechas_ocupadas()
    {
        $fechas_ocupadas = DB::table('citas_quiropractica')->orderBy('fecha', 'ASC')->get();
        return $fechas_ocupadas;
    }
//-------------------------------------------Pacientes----------------------------------------//
    public function Pacientes()
    {
        $pacientes = pacientes::all();
        return view("templatesadmin.pacientes")
        ->with(['pacientes' => $pacientes]);
    }

//-------------------------------------------Ver citas------------------------------------//
    public function citas_quiropractica()
    {
        $citas = DB::table('citas_quiropractica')->orderBy('fecha', 'ASC')->paginate(10);
        return view("templatesadmin.citas_quiropractica")
        ->with(['citas' => $citas]);
    }
//------------------------------------------Nueva cita---------------------------------------//
    public function buscar_usuario(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $correo = $request['correo'];
        $curp = $request['curp'];
        $area = $request['area'];
        $fecha = $request['fecha'];
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $nomdia = $dias[date('N', strtotime($fecha))-1];
        if($nomdia == "Domingo"){
            echo '<script language="javascript">alert("No se pueden agendar citas el dia domingo por favor pruebe otra fecha"); history.go(-1);</script>';
        }elseif(($area == "Ultrasonido" && $nomdia != "Martes" && $nomdia != "Jueves" )){
            echo '<script language="javascript">alert("Para ultrasonidos solo puede agendar cita martes y jueves por favor verifique la fecha"); history.go(-1);</script>';
        }
        else{
            $paciente = DB::select("SELECT * FROM pacientes WHERE curp = '$curp'");
        if(empty($paciente)){
            $existe = "NO";
            return view("templates.agendarCita_quiropractica")
                ->with(['paciente' => $paciente])
                ->with(['existe' => $existe])
                ->with(['curp' => $curp])
                ->with(['correo' => $correo])
                ->with(['area' => $area])
                ->with(['fecha' => $fecha])
                ->with(['nomdia' => $nomdia]);
        }else{
            $existe = "";
            return view("templates.agendarCita_quiropractica")
                ->with(['paciente' => $paciente])
                ->with(['existe' => $existe])
                ->with(['curp' => $curp])
                ->with(['correo' => $correo])
                ->with(['area' => $area])
                ->with(['fecha' => $fecha])
                ->with(['nomdia' => $nomdia]);
        }
        }
        /**/
    } 


//-----------------------------------------Agendar nueva cita-------------------------------------//
    public function agendar_cita_quiropractica()
    {
        return view("templates.agendarCita_quiropractica");
    }
    public function guardar_cita_quiropractica(Request $request)
    {
        $genero = $request['genero'];
        date_default_timezone_set('America/Mexico_City');
        $consultorio = $request['consultorio'];
        $fecha = $request['fecha'];
        list($año,$mes,$dia) = explode("-",$fecha);
        $hora = $request['hora'];
        list($horas,$minutos) = explode(":",$hora);
        $area = $request['area'];
        if($area == "Acupuntura"){
            $folio = "A".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Quiropractica"){
            $folio = "Q".$consultorio."-".$dia.$mes.$horas;
        }
        elseif($area == "Gerontología"){
            $folio = "G".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Ultrasonido"){
            $folio = "U".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rayos x"){
            $folio = "RX".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rehabilitación"){
            $folio = "R".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Laboratorio"){
            $folio = "L".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Cámara hiperbárica"){
            $folio = "CH".$consultorio."-".$dia.$mes.$horas;
        }
        $estatus = "Activo";
        $email = $request['correo'];
        if($email == ""){
            $email = "N/A"; 
        }
            $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $nomdia = $dias[date('N', strtotime($fecha))-1];
        if($nomdia == "Domingo"){
            echo '<script language="javascript">alert("No se pueden agendar citas el dia domingo por favor pruebe otra fecha"); history.go(-1);</script>';
        }else{
        $fechaactual = date("Y-m-d");
        $mesactual = date("m");
        $añoactual = date("Y");
        $nombre = $request['nombre'];
        $apellidop = $request['apellidop'];
        $apellidopm = $request['apellidom'];
        $curp = $request['curp'];
        $pacienteexiste = DB::select("SELECT * FROM pacientes WHERE CURP= '$curp'");
        if(count($pacienteexiste) == 1){
        if ($fecha < $fechaactual || $añoactual < $año){
                        echo '<script language="javascript">alert("Fecha invalida intentalo de nuevo"); history.go(-1);</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'email'=>($email),
                    'area'=>$request['area'],
                    'consultorio'=>$request->input('consultorio'),
                    'estatus'=> strtoupper($estatus),
                    'fecha'=>$request->input('fecha'),
                    'hora'=>$request->input('hora'),
                    'folio'=>$folio,
                ));
                if($email != "N/A"){
                $data = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                Mail::to($email)->send(new EnvioComprobante($data));}
                $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                return view("templates.comprobante_quiropractica")
                ->with(['cita' => $cita]);
            }else{
                echo '<script language="javascript">alert("La cita con ese folio ya ha sido agendada. Por favor elija otra fecha o hora"); history.go(-1);;</script>';
            }
                    }
        }else{
        if ($añoactual < $año || $fecha < $fechaactual){
                        echo '<script language="javascript">alert("Fecha invalida intentelo de nuevo"); history.go(-1);</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $paciente = pacientes::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'genero'=>strtoupper($request['genero']),
                    'numero_movil'=>$request['celular'],
                    'numero_fijo'=>$request['telefono'],
                    'lugar_de_procedencia'=>strtoupper($request['procedencia']),
                    'email'=>($email),
                ));
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'email'=> ($email),
                    'area'=>$request['area'],
                    'consultorio'=>$request->input('consultorio'),
                    'estatus'=> strtoupper($estatus),
                    'fecha'=>$request->input('fecha'),
                    'hora'=>$request->input('hora'),
                    'folio'=>$folio,
                ));
                if ($email != "N/A"){
                $data = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                Mail::to($email)->send(new EnvioComprobante($data));}
                $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                return view("templates.comprobante_quiropractica")
                ->with(['cita' => $cita]);
            }else{
                echo '<script language="javascript">alert("La cita con ese folio ya ha sido agendada. Por favor elija otra fecha o hora"); history.go(-1)</script>';
            }
                    }
        }
    /**/ 
        }
    }


//----------------------------------------Comprobante cita----------------------------------------//
    public function comprobantecqpdf(Request $request){
        $folio = $request['folio'];
        if($folio != "CANCELADO"){
        $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
        $pdf = app('dompdf.wrapper');
        $pdf ->loadView('templatespdf.comprobante_quiropracticapdf', ['cita' => $cita]);
        return $pdf->download('comprobante de mi cita.pdf');
    }else{
        echo '<script language="javascript">alert("No puedes generar el comprobante debido a que la cita ya esta cancelada"); window.history.back();</script>';
    }
        /**/
    }

    public function buscarcq(Request $request){
        $termb = $request['tb'];
        $citas = citas_quiropractica::where("nombre", "Like", '%'.$termb.'%')->orwhere("consultorio", "LIKE", '%'.$termb.'%')->orwhere("folio", "=", $termb)->orwhere("fecha", "=" , $termb)->orwhere("hora", "=" , $termb)->orwhere("CURP", "=" , $termb)->orderBy('fecha', 'ASC')->simplepaginate(10);
        if($termb != ""){
        return view("templatesadmin.citas_quiropractica")
            ->with(['citas' => $citas])
            ->with(['termb' =>$termb]);
        }else{
            return view("templatesadmin.citas_quiropractica")
            ->with(['citas' => $citas]);
        }
    }


//-----------------------------------------Modificar cita-----------------------------------------//
    public function modificarcita(Request $request){
        $id = $request['id'];
        $cestatus = $request['estatus'];
        $area = $request['area'];
        $fecha = $request['fecha'];
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $nomdia = $dias[date('N', strtotime($fecha))-1];
        $citas = DB::select("SELECT * FROM citas_quiropractica WHERE id = '$id'");
        return view("templatesadmin.modificar_cita")
        ->with(['citas' => $citas])
        ->with(['area' => $area])
        ->with(['nomdia' => $nomdia]);
        /**/ 
    }

    public function salvarcita(Request $request){
        date_default_timezone_set('America/Mexico_City');
        $id = $request['id'];
        $nombre = strtoupper($request['nombre']);
        $apellidop = strtoupper($request['apellidop']);
        $apellidom = strtoupper ($request['apellidom']);
        $correo = $request['correo'];
        $estatus = strtoupper($request['estatus']);
        $folio = $request['folio'];
        $fecha = $request['fecha'];
        $fechaactual = date("Y-m-d");
        $añoactual = date("Y");
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $nomdia = $dias[date('N', strtotime($fecha))-1];
        if($nomdia == "Domingo"){
            echo '<script language="javascript">alert("No se pueden agendar citas el dia domingo por favor pruebe otra fecha"); history.go(-1);</script>';
        }else{
        list($año,$mes,$dia) = explode("-",$fecha);
        $hora = $request['hora'];
        list($horas,$minutos) = explode(":",$hora);
        $consultorio = $request['consultorio'];
        $area = $request['area'];
        if($area == "Acupuntura"){
            $folion = "A".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Quiropractica"){
            $folion = "Q".$consultorio."-".$dia.$mes.$horas;
        }
        elseif($area == "Gerontología"){
            $folion = "G".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Ultrasonido"){
            $folion = "U".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rayos x"){
            $folion = "RX".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rehabilitación"){
            $folion = "R".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Laboratorio"){
            $folion = "L".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Cámara hiperbárica"){
            $folion = "CH".$consultorio."-".$dia.$mes.$horas;
        }
        $nombrec = $nombre." ".$apellidop." ".$apellidom;
        $mensaje = "Hola"." ".$nombrec;
        $mensaje2 = "Su cita con fecha:".$request['fecha'].", "."hora:".$request['hora'].", "."y folio:".$folio." "."a sido cancelda";
        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folion' AND id = '$id'");
        $citaexiste1 = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folion'");
        $email = $request['correo'];
        if($estatus != "CANCELADA"){
            if ($fecha < $fechaactual ){
                echo '<script language="javascript">alert("Fecha no puede ser anterior al día de hoy"); history.go(-1);</script>';
            }elseif($añoactual < $año){
                echo '<script language="javascript">alert("No puede agendar una cita un año posterior al actual"); history.go(-1);</script>';
            }elseif((count($citaexiste) == 1 && count($citaexiste1) == 0) || (count($citaexiste) == 1 && count($citaexiste1) == 1) || (count($citaexiste) == 0 && count($citaexiste1) == 0)){
                if ($folio==$folion){
                    $actualizar = DB::update("UPDATE citas_quiropractica SET nombre = '$nombre', apellido_paterno = '$apellidop', apellido_materno = '$apellidom', email = '$correo', estatus = '$estatus', folio = '$folion', consultorio ='$consultorio', fecha = '$fecha', hora = '$hora' WHERE id = '$id'");
                    echo'<script type="text/javascript">
                    alert("Cita actualizada");
                    window.location.href="citasq/";
                    </script>';
                }else{
                    $actualizar = DB::update("UPDATE citas_quiropractica SET nombre = '$nombre', apellido_paterno = '$apellidop', apellido_materno = '$apellidom', email = '$correo', estatus = '$estatus', folio = '$folion', consultorio ='$consultorio', fecha = '$fecha', hora = '$hora' WHERE id = '$id'");
                    echo'<script type="text/javascript">
                    alert("Cita actualizada");
                    window.location.href="citasq/";
                    </script>';
                }
            }else{
                echo'<script type="text/javascript">
                    alert("El folio ya esta asignado a otra cita por favor vuelva a intentar");
                    history.go(-1);
                    </script>';
            }
        }else{

            $folio = strtoupper("Cancelado");
            $actualizar = DB::update("UPDATE citas_quiropractica SET nombre = '$nombre', apellido_paterno = '$apellidop', apellido_materno = '$apellidom', email = '$correo', estatus = '$estatus', folio = '$folio' WHERE id = '$id'");
            if($correo != "N/A"){
            $data=array(
                'asunto'=>'Confirmación de cancelación de cita',
                'email'=>$request->correo,
                'mensaje'=>$mensaje,
                'mensaje2'=>$mensaje2,
            );
            echo'<script type="text/javascript">
            alert("Cita cancelada");
            window.location.href="citasq";
            </script>';
            Mail::to($request->correo)->send(new OrdendeEnvio($data));
            }else{
                echo'<script type="text/javascript">
            alert("Cita cancelada");
            window.location.href="citasq/";
            </script>';
            }
        } 
        /**/
    }
    }
    public function guardar_cita_quiropracticad(Request $request)
    {
        $genero = $request['genero'];
        date_default_timezone_set('America/Mexico_City');
        $consultorio = $request['consultorio'];
        $fecha = $request['fecha'];
        list($año,$mes,$dia) = explode("-",$fecha);
        $hora = $request['hora'];
        list($horas,$minutos) = explode(":",$hora);
        $area = $request['area'];
        if($area == "Acupuntura"){
            $folio = "A".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Quiropractica"){
            $folio = "Q".$consultorio."-".$dia.$mes.$horas;
        }
        elseif($area == "Gerontología"){
            $folio = "G".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Ultrasonido"){
            $folio = "U".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rayos x"){
            $folio = "RX".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Rehabilitación"){
            $folio = "R".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Laboratorio"){
            $folio = "L".$consultorio."-".$dia.$mes.$horas;
        }elseif($area == "Cámara hiperbárica"){
            $folio = "CH".$consultorio."-".$dia.$mes.$horas;
        }
        $estatus = "Activo";
        $email = $request['correo'];
        if($email == ""){
            $email = "N/A"; 
        }
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
            $nomdia = $dias[date('N', strtotime($fecha))-1];
        if($nomdia == "Domingo"){
            echo '<script language="javascript">alert("No se pueden agendar citas el dia domingo por favor pruebe otra fecha"); history.go(-1);</script>';
        }else{
        $fechaactual = date("Y-m-d");
        $mesactual = date("m");
        $añoactual = date("Y");
        $nombre = $request['nombre'];
        $apellidop = $request['apellidop'];
        $apellidopm = $request['apellidom'];
        $curp = $request['curp'];
        $pacienteexiste = DB::select("SELECT * FROM pacientes WHERE CURP= '$curp'");
        if(count($pacienteexiste) == 1){
        if ($fecha < $fechaactual || $añoactual < $año){
                        echo '<script language="javascript">alert("Fecha invalida intentalo de nuevo"); history.go(-1);</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'email'=>($email),
                    'area'=>$request['area'],
                    'consultorio'=>$request->input('consultorio'),
                    'estatus'=> strtoupper($estatus),
                    'fecha'=>$request->input('fecha'),
                    'hora'=>$request->input('hora'),
                    'folio'=>$folio,
                ));
                if($email != "N/A"){
                $data = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                Mail::to($email)->send(new EnvioComprobante($data));}
                $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                return view("templates.comprobante_quiropractica")
                ->with(['cita' => $cita]);
            }else{
                echo '<script language="javascript">alert("La cita con ese folio ya ha sido agendada. Por favor elija otra fecha o hora"); window.location.href="agendarcitaq/";</script>';
            }
                    }
        }else{
        if ($añoactual < $año || $fecha < $fechaactual){
                        echo '<script language="javascript">alert("Fecha invalida intentelo de nuevo"); history.go(-1);</script>';
                    }else{
                        $citaexiste = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
            if (count($citaexiste) == 0){
                $paciente = pacientes::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'genero'=>strtoupper($request['genero']),
                    'numero_movil'=>$request['celular'],
                    'numero_fijo'=>$request['telefono'],
                    'lugar_de_procedencia'=>strtoupper($request['procedencia']),
                    'email'=>($email),
                ));
                $citas = citas_quiropractica::create(array(
                    'nombre'=> strtoupper($request->input('nombre')),
                    'apellido_paterno'=> strtoupper($request->input('apellidop')),
                    'apellido_materno'=> strtoupper($request->input('apellidom')),
                    'CURP'=>strtoupper($curp),
                    'email'=> ($email),
                    'area'=>$request['area'],
                    'consultorio'=>$request->input('consultorio'),
                    'estatus'=> strtoupper($estatus),
                    'fecha'=>$request->input('fecha'),
                    'hora'=>$request->input('hora'),
                    'folio'=>$folio,
                ));
                if ($email != "N/A"){
                $data = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                Mail::to($email)->send(new EnvioComprobante($data));}
                $cita = DB::select("SELECT * FROM citas_quiropractica WHERE folio = '$folio'");
                return view("templates.comprobante_quiropractica")
                ->with(['cita' => $cita]);
            }else{
                echo '<script language="javascript">alert("La cita con ese folio ya ha sido agendada. Por favor elija otra fecha o hora"); window.location.href="agendarcitaq/";</script>';
            }
                    }
        }
    /**/ 
    }
}

    public function comprobantecitasqpdf(Request $request){
        $termb = $request['tb1'];
        if($termb == ""){
        $citas = citas_quiropractica::all();
        $pdf = app('dompdf.wrapper');
        $pdf ->loadView('templatespdf.citas_quiropracticapdf', ['citas' => $citas])->setPaper('a4', 'landscape');
        return $pdf->download('comprobante de mi cita.pdf');
        }else{
        $citas = citas_quiropractica::where("nombre", "Like", '%'.$termb.'%')->orwhere("consultorio", "LIKE", '%'.$termb.'%')->orwhere("folio", "=", $termb)->orwhere("fecha", "=" , $termb)->orwhere("hora", "=" , $termb)->orderBy('fecha', 'ASC')->simplepaginate(10);
        $pdf = app('dompdf.wrapper');
        $pdf ->loadView('templatespdf.citas_quiropracticapdf', ['citas' => $citas])->setPaper('a4', 'landscape');
        return $pdf->download('comprobante de mi cita.pdf');
        }
    }

    public function modificar_pacientes(Request $request){
        $id = $request['id'];
        $paciente = DB::select("SELECT * FROM pacientes WHERE id = '$id'");
        return view("templatesadmin.modificar_datos")
        ->with(["paciente"=>$paciente]);
    }

    public function salvar_paciente(Request $request){
        $id = $request['id'];
        $nombre = strtoupper($request['nombre']);
        $apellidop = strtoupper($request['apellido_paterno']);
        $apellidom = strtoupper($request['apellido_materno']);
        $curp = strtoupper($request['curp']);
        $genero = strtoupper($request['genero']);
        $celular = strtoupper($request['celular']);
        $fijo = strtoupper($request['telefono']);
        $procedencia = strtoupper($request['procedencia']);
        $email = strtoupper($request['correo']);
        $actualizar = DB::update("UPDATE pacientes SET nombre = '$nombre', apellido_paterno = '$apellidop', apellido_materno = '$apellidom', genero = '$genero' ,CURP = '$curp', numero_movil = '$celular', numero_fijo = '$fijo', lugar_de_procedencia = '$procedencia', email = '$email' WHERE id='$id' AND CURP='$curp'");
        echo '<script language="javascript">alert("Paciente actualizado correctamente"); window.location.href="pacientes";</script>';
    }


    public function about(){
        $servicios = '32';
        return view("templates.about")
        ->with(["servicios"=>$servicios]);
    }

    
}