    @extends('layouts.header')
    @section('body')
    @if(empty(session('session_id')))
    <h1>Bienvenido a la clinica integral de la UNEVT</h1>
    <h3>Selecciones el área en la que desea agendar su cita</h2>
    <a href="{{route('agendarCitaq')}}">Quiropractica</a>
    @else
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/index">
    @endif
    @endsection