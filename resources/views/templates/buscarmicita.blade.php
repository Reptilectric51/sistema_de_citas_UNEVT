    @extends('layouts.header')
    @section('body')
    <h1>Para poder buscar sus citas ingrese los siguientes datos</h1>
    <form action="{{route('buscandocita')}}" method="POST">
        {{ csrf_field() }}
        <label>CURP*: </label><input type="text" name="curp" placeholder="Ingrese su curp a 18 digitos" required><br><br>
        <input type="submit" value="Buscar mi cita">
    </form>
    @endsection