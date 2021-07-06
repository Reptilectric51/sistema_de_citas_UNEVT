    @extends('layouts.header')
    @section('body')
    @if(empty(session('session_id')))
    <h1>Bienvenido a la clinica integral de la UNEVT</h1>
    <h3>Selecciones el área en la que desea agendar su cita</h2>
    <a href="{{route('buscarusuario')}}">Quiropractica</a>
    @else
    <h1>Hola {{session('session_name')}} por favor elija una de las opciones mostradas a continuación</h1>
    <a href="citasq">Ver citas quiropractica</a><br><br>
    <a href="pacientes">Ver pacientes</a>
    @endif
    @endsection