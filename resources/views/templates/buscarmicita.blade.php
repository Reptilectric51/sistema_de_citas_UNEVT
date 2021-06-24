    @extends('layouts.header')
    @section('body')
    <h1>Para poder buscar sus citas ingrese los siguientes datos</h1>
    <form action="{{route('buscandocita')}}" method="POST">
        {{ csrf_field() }}
        <label>Nombre*: </label><input type="text" name="nombre" placeholder="ej: kirby" required><br><br>
        <label>Apellido paterno*: </label><input type="text" name="apellidop" placeholder="ej: Martinez"
            required><br><br>
        <label>Apellido materno*:</label><input type="text" name="apellidom" placeholder="ej: Hernandez"
            required><br><br>
        <label>Correo electrónico*:</label><input type="email" name="correo" placeholder="ej: mail@mail.com"
            required><br><br>
        <label>Número de telefono celular:</label><input type="tel" name="celular" pattern="[0-9]{10}"
            placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
        <label>Elija el área*:</label><select name="area" required>
            <option value="">Elija una opción</option>
            <option>Quiropractica</option>
        </select><br><br>
        <input type="submit" value="Buscar mi cita">
    </form>
    @endsection