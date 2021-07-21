@extends('layouts.header')
@section('body')
 @if(empty(session('session_id')))
 <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
 @else
 @foreach($paciente as $datos)
 <form action="salvar_paciente" method="POST">
     @csrf
    <h3>Modificar los datos de {{$datos->nombre}} {{$datos->apellido_paterno}} {{$datos->apellido_materno}}</h3>
    <input type="text" name="id" value="{{$datos->id}}" readonly hidden>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{$datos->nombre}}" required><br><br>
    <label>Apellido paterno:</label>
    <input type="text" name="apellido_paterno" value="{{$datos->apellido_paterno}}" required><br><br>
    <label>Apellido materno:</label>
    <input type="text" name="apellido_materno" value="{{$datos->apellido_materno}}" required><br><br>
    <label>CURP:</label>
    <input type="text" name="curp" value="{{$datos->CURP}}" required><br><br>
    <p>Género:</p>
    @if($datos->genero == "MASCULINO")
        <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
        @elseif($datos->genero == "FEMENINO")
        <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
    @endif
    <label>Número de celular:</label>
    <input type="tel" name="celular" pattern="[0-9]{10}" value="{{$datos->numero_movil}}" placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
    <label>Número de telefono fijo:</label>
    <input type="tel" name="telefono" pattern="[0-9]{10}" value="{{$datos->numero_fijo}}"placeholder="Número de telefono fijo a 10 digitos" maxlength="10"><br><br>
    <label>Lugar de procedencia</label>
    <input type="text" name="procedencia" value="{{$datos->lugar_de_procedencia}}" required><br><br>
    <label>Correo:</label>
    @if($datos->email != "N/A")
    <input type="email" name="correo" value="{{$datos->email}}" required><br><br>
    @else
    <input type="text" name="correo" value="{{$datos->email}}" required><br><br>
    @endif
    <input type="submit" value="Guardar">
 </form>
 @endforeach   
 @endif
 @endsection