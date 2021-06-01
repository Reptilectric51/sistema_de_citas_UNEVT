<!DOCTYPE html>
<html>
    <head>
        <title>Comprobante de cita</title>
    </head>
    <body>
        <h1>Su cita a sido agendada con los siguientes datos</h1>
        @foreach ($citas as $cita)
        <label>Nombre: </label><label>{{$cita->nombre}}</label><label> {{$cita->apellido_paterno}}</label><label> {{$cita->apellido_materno}}</label><br><br>
        <label>Consultorio: </label> <label>{{$cita->consultorio}}</label><br><br>
        <label>Fecha: </label><label>{{$cita->fecha}}</label><br>
        <label>Hora: </label><label>{{$cita->hora}}</label><br>
        <label>Folio: </label> <label>{{$cita->folio}}</label><br>
        @endforeach
        <p>Lo esperamos en la fecha marcada en su cita guarde este comprobante para recibir la atención</p>
    </body>
</html>