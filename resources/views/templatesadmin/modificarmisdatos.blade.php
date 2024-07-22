@extends('layouts.header')
@section('body')
@if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
    <h1>Tú información es la siguinete</h1>
    <form action="{{route('guardarmisdatos')}}" method="POST">
        {{ csrf_field() }}
        <label>Nombre completo:</label><input type="text" value="{{session('session_name')}}" size="25" name="nombre" required><br><br>
        <label>Apellido paterno:</label><input type="text" value="{{session('session_ap')}}" size="25" name="Apellido_paterno" required><br><br>
        <label>Apellido materno:</label><input type="text" value="{{session('session_am')}}" size="25" name="Apellido_materno" required><br><br>
        <label>Usuario:</label><input type="text" value="{{session('session_usuario')}}" name="user" size="25" required><br><br>
        <label>Correo:</label><input type="email" value="{{session('session_correo')}}" name="correo" size="25" required><br><br>
        <label>Contraseña:</label><input type="password" value="{{session('session_password')}}" name="pass" size="25" required minlength="8"><br><br>
        @if(session('session_tipo') == 1 || session('session_tipo') == 2)
        <label>Tipo de sesión:</label>
        <select name="session">
            <option value="1">Administrador</option>
            <option value="0">Usuario</option>
            @if(session('session_tipo') == 2)
            <option value="2" selected>Superusuario</option>
            @endif
        </select><br><br>
        <label>Confirme su contraseña para continuar:</label><input type="password" name="confpassword" size="25" placeholder="Confirme su contraseña para continuar" required minlength="8"><br><br>
        <input type="submit" value = "Guardar">
        @elseif(session('session_tipo') == 0)
        <label>Tipo de sesión:</label><input type="text" value="Usuario" size="25" readonly><br><br>
        <input type="button" onclick="alert('¡Usted no puede modificar sus datos por favor llame a un administrador!')" value="Modificar datos" />
        @endif    
    </form>
    @endif
@endsection