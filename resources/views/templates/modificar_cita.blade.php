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
    <label>Correo electrónico: </label><input type="mail" value="{{$cita->email}}" name="correo"><br><br>
    <label>Consultorio: </label><select name="consultorio">
            <option selected>{{$cita->consultorio}}</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br><br>
    <label>Estatus: </label><select name="estatus">
        <option>Activo</option>
        <option>Cancelada</option>
    </select><br><br>
    <label>Fecha: </label><input type="date" value="{{$cita->fecha}}" name="fecha" required><br><br>
    <label>Hora: </label><select name="hora" required>
            <option selected >{{$cita->hora}}</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
        </select><br><br>
    <label>Folio: </label><input type="text" value="{{$cita->folio}}" name="folio" required readonly><br><br>
    <input type="submit" value="Guardar"> 
    <input type="button" onclick="location.href='/citasq';" value="Cancelar" />
</form>
@endforeach
@endif

</html>