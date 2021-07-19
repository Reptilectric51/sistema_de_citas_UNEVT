    @extends('layouts.header')
    @section('body')
    @if(empty(session('session_id')))
    <h1>Bienvenido a la clinica integral de la UNEVT</h1>
    <a href="{{route('buscarusuario')}}">Agendar cita</a>
    @else
    <h1>Hola {{session('session_name')}} {{session('session_ap')}} {{session('session_am')}} por favor elija una de las opciones mostradas a continuación</h1>
    <a href="citasq">Ver citas </a><br><br>
    <a href="pacientes">Ver pacientes</a><br><br>
    @if(session('session_tipo') == 2)
    <a href="{{route('usuarios')}}">Ver usuarios</a>
    @endif
    @endif
    @endsection