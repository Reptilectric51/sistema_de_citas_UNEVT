<!DOCTYPE html>
<html>
    <head>
        <title>Comprobante de cita</title>
    </head>
    <body>
        <h1>Su cita a sido agendada con los siguientes datos</h1>
        @foreach ($cita as $citas)
        <label>Nombre: </label><label>{{$citas->nombre}}</label><label> {{$citas->apellido_paterno}}</label><label> {{$citas->apellido_materno}}</label><br>
        <label>Consultorio: </label> <label>{{$citas->consultorio}}</label><br>
        <label>Fecha: </label><label>{{$citas->fecha}}</label><br>
        <label>Hora: </label><label>{{$citas->hora}}</label><br>
        <label>Folio: </label> <label>{{$citas->folio}}</label><br>
        <div class="Código QR">
        {!!QrCode::size(300)->generate("Nombre: {$citas->nombre} {$citas->apellido_paterno} {$citas->apellido_materno}, Folio: {$citas->folio}, Consultorio: {$citas->consultorio}, Fecha: {$citas->fecha}, Hora: {$citas->hora}") !!}
        </div>
        <form action="{{route('pdfcitacq')}}" method="POST">
            {{ csrf_field() }}
            <select name="folio" hidden>
                <option hidden selected value="{{$citas->folio}}">{{$citas->folio}}</option>
            </select>
            <input type="button" onclick="location.href='https://sfpya.edomexico.gob.mx/recaudacion/'" value="Planeo pagar en línea" >
            <input type="submit" value="Descargar mi comprobante de cita en formato pdf">
            <input type="button" onclick="window.open('{{route('como_pagar')}}', '_blank');" value="No se como crear mi formato de pago">
        </form><br><br>
        @endforeach
        @if(empty(session('session_id')))
        <form action="{{route('index')}}" method="GET">
            <input type="submit" value="Planeo pagar en clinica y regresar al inicio">
        </form>
        @else
        <form action="/citasq" method="GET">
            <input type="submit" value="Regresar a las citas">
        </form>
        @endif
        <p>Lo esperamos en la fecha marcada en su cita guarde este comprobante para recibir la atención</p>
        <p>Si no encuentra el estudio en servicio al contribuyente favor de pasar a caja</p>
        <img src="{{ asset('images/protocolo_de_ingreso.jpg') }}" width= 1000px>
    </body>
</html>