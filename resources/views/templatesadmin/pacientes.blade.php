@extends('layouts.header')
@section('body')
    @if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
    @else
    <h1>Reporte de pacientes</h1>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <h3>Id</h3>
                </th>
                <th>
                    <h3>Nombre</h3>
                </th>
                <th>
                    <h3>Género</h3>
                </th>
                <th>
                    <h3>Número de celular</h3>
                </th>
                <th>
                    <h3>Número de teléfono fijo</h3>
                </th>
                <th>
                    <h3>Lugar de procedencia</h3>
                </th>
                <th>
                    <h3>Correo electronico</h3>
                </th>
            </tr>
            <thead>
                @foreach ($pacientes as $paciente)
            <tbody>
                <tr>
                    <td>{{$paciente->id}}</td>
                    <td>{{$paciente->nombre_completo}}</td>
                    <td>{{$paciente->genero}}</td>
                    <td>{{$paciente->numero_movil}}</td>
                    <td>{{$paciente->numero_fijo}}</td>
                    <td>{{$paciente->lugar_de_procedencia}}</td>
                    <td>{{$paciente->email}}</td>
                </tr>
            </tbody>
            @endforeach
    </table>
</div>
    @endif
@endsection