@extends('layouts.header')
@section('body')
@if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
    <h1>Tú información es la siguinete</h1>
    <form>
        <label>Nombre:</label><input type="text" value="{{session('session_name')}}" size="25" readonly><br><br>
        <label>Apellido paterno:</label><input type="text" value="{{session('session_ap')}}" size="25" readonly><br><br>
        <label>Apellido materno:</label><input type="text" value="{{session('session_am')}}" size="25" readonly><br><br>
        <label>Usuario:</label><input type="text" value="{{session('session_usuario')}}" size="25" readonly><br><br>
        <label>Correo:</label><input type="text" value="{{session('session_correo')}}" size="25" readonly><br><br>
        <label>Contraseña:</label><input type="password" value="{{session('session_password')}}" size="25" readonly><br><br>
        @if(session('session_tipo') == 1)
        <label>Tipo de sesión:</label><input type="text" value="Administrador" size="25" readonly><br><br>
        <input type="button" onclick="location.href='{{route('modificardatos')}}'" value="Modificar datos" />
        @elseif(session('session_tipo') == 0)
        <label>Tipo de sesión:</label><input type="text" value="Usuario" size="25" readonly><br><br>
        <input type="button" onclick="alert('¡Usted no puede modificar sus datos por favor llame a un administrador!')" value="Modificar datos" />
        @elseif(session('session_tipo') == 2)
        <label>Tipo de sesión:</label><input type="text" value="Superusuario" size="25" readonly><br><br>
        <input type="button" onclick="location.href='{{route('modificardatos')}}'" value="Modificar datos" />
        @endif
        
    </form>
    @endif
@endsection