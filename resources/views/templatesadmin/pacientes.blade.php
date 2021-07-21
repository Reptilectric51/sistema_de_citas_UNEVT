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
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>CURP<h3>
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
                @if( session('session_tipo') == 2 || session('session_tipo') == 1)
                <th>
                    <h3>Opciones</h3>
                </th>
                @endif
            </tr>
            <thead>
                @foreach ($pacientes as $paciente)
            <tbody>
                <tr>
                    <td>{{$paciente->nombre}} {{$paciente->apellido_paterno}} {{$paciente->apellido_materno}}</td>
                    <td>{{$paciente->CURP}}</td>
                    <td>{{$paciente->genero}}</td>
                    <td>{{$paciente->numero_movil}}</td>
                    <td>{{$paciente->numero_fijo}}</td>
                    <td>{{$paciente->lugar_de_procedencia}}</td>
                    <td>{{$paciente->email}}</td>
                    @if( session('session_tipo') == 2 || session('session_tipo') == 1)
                    <td>
                        <form action="{{route('modificar_paciente')}}" method="POST">
                            @csrf
                            <input type="text" name=id value="{{$paciente->id}}" readonly hidden>
                            <input type="submit" value = "Actualizar datos">
                        </form>
                    </td>
                    @endif
                </tr>
            </tbody>
            @endforeach
    </table>
</div>
    @endif
@endsection