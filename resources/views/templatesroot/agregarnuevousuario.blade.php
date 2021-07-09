@extends('layouts.header')
@section('body')
<form action="{{route('crearusuario')}}" method="POST">
    {{ csrf_field() }}
    <label>Nombre:*</label><input type="text" name="nombre" required
        placeholder="Ingrese el nombre del nuevo usuario"><br><br>
    <label>Apellido paterno:*</label><input type="text" name="apellido_paterno" required
        placeholder="Ingrese el apellido paterno del nuevo usuario"><br><br>
    <label>Apellido materno:*</label><input type="text" name="apellido_materno" required
        placeholder="Ingrese el apellido materno del nuevo usuario"><br><br>
    <label>Usuario(Matricula o no de servidor publico):*</label><input type="text" name="usuario" required
        placeholder="Ingrese aquí la matricula o el no de servidor público"><br><br>
    <label>Correo:*</label><input type="email" name="correo" required
        placeholder="Ingrese un correo valido para el nuevo usuario"><br><br>
    <label>Tipo de usuario:*</label><select name="sesion">
        <option selected disabled >Selecciona el tipo de usuario</option>
        <option value="0">Usuario</option>
        <option value="1">Administrador</option>
        <option value="2">Superusuario</option>
    </select><br><br>
    <label>Contraseña:*</label><input type="password" name="contraseña" required placeholder="Por favor ingrese la contraseña para el nuevo usuario"><br><br>
    <input type="submit" value="Registrar">
</form>
@endsection