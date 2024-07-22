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
        <label>{!!QrCode::size(300)->generate("{$citas->folio}") !!}</label>
        @endforeach
        <p>Lo esperamos en la fecha marcada en su cita guarde este comprobante para recibir la atención</p>
    </body>
</html>