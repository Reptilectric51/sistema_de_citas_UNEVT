@extends('layouts.header')
@section('body')
@if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
    <h1>Tú información es la siguinete</h1>
    <form>
        <label>Nombre completo:</label><input type="text" value="{{session('session_name')}}" size="25" readonly><br><br>
        <label>Usuario:</label><input type="text" value="{{session('session_usuario')}}" size="25" readonly><br><br>
        <label>Correo:</label><input type="text" value="{{session('session_correo')}}" size="25" readonly><br><br>
    </form>
    @endif
@endsection