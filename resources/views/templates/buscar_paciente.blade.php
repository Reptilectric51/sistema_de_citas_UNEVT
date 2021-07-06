@extends('layouts.header')
    @section('body')
    <h3>Por favor completa los siguientes datos</h3>
    <form action="{{route('buscardatospaciente')}}" method="POST">
        {{ csrf_field() }}
        <label>Ingrese su correo electronico</label>
        <input type="email" name="correo" placeholder="Por favor ingresa tú correo electronico en caso de no tener dejalo vacio"><br><br>
        <label>Ingrese su curp</label>
        <input type="text" minlength="18" maxlength="18" placeholder="Escriba su curp aquí" required name="curp"><br><br>
        <input type="submit" value="Enviar">
    </form>
    @endsection