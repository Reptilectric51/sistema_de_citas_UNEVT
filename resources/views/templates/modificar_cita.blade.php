<html>

<head>
    <title>Modificar cita</title>
</head>
@if(empty(session('session_id')))
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
@foreach ($citas as $cita)
<form action="{{route('salvar_cita')}}" method="POST">
    {{ csrf_field() }}
    <h3>Aquí puede modificar la cita de {{$cita->nombre}}</h3>
    <label>ID: </label><input type="text" value="{{$cita->id}}" name="id" readonly><br><br>
    <label>Nombre: </label><input type="text" value="{{$cita->nombre}}" name="nombre" required><br><br>
    <label>Apellido paterno: </label><input type="text" value="{{$cita->apellido_paterno}}" name="apellidop"
        required><br><br>
    <label>Apellido materno: </label><input type="text" value="{{$cita->apellido_materno}}" name="apellidom"
        required><br><br>
    <label>Correo electrónico: </label><input type="text" value="{{$cita->email}}" name="correo" required><br><br>
    <label>Consultorio: </label><input type="text" value="{{$cita->consultorio}}" name="consultorio" required
        readonly><br><br>
    <label>Estatus: </label><select name="estatus">
        <option>Activo</option>
        <option>Cancelada</option>
    </select><br><br>
    <label>Fecha: </label><input type="date" value="{{$cita->fecha}}" name="fecha" required readonly><br><br>
    <label>Hora: </label><input type="text" value="{{$cita->hora}}" name="hora" required readonly><br><br>
    <label>Folio: </label><input type="text" value="{{$cita->folio}}" name="folio" required readonly><br><br>
    <input type="submit" value="Guardar"> 
    <input type="button" onclick="location.href='/citasq';" value="Cancelar" />
</form>
@endforeach
@endif

</html>