@extends('layouts.header')
@section('body')
@if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
    <h1>Hola {{session('session_name')}} por favor elija una de las opciones mostradas a continuación</h1>
    <a href="citasq">Ver citas quiropractica</a><br><br>
    <a href="pacientes">Ver pacientes</a>
    @endif
@endsection