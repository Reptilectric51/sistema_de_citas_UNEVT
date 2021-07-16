@extends ('layouts.header')
@section('body')
    <h3>Editar usuario</h3>
    @foreach($usuario as $user)
    <form action="guardar_usuario" method="POST">
        {{ csrf_field() }}
        <input type="text" name="id" value="{{$user->id}}" readonly hidden>
        <label>Nombre del usuario:*</label><input type="text" name="nombre" value="{{$user->nombre}}"><br><br>
        <label>Apellido paterno:*</label><input type="text" name="apellido_paterno" value="{{$user->apellido_paterno}}"><br><br>
        <label>Apellido materno:*</label><input type="text" name="apellido_materno" value="{{$user->apellido_materno}}"><br><br>
        <label>Matricula o no de servidor público:*</label><input type="usuario" name="usuario" value="{{$user->usuario}}" readonly><br><br>
        <label>Correo:*</label><input type="text" name="correo" value="{{$user->correo}}"><br><br>
        <p>Tipo de usuario:*</p>
        <select name="sesion">
            @if($user->tipo_de_sesión == 0)
            <option selected value="0">Usuario</option>
            <option value="1">Administrador</option>
            <option value="2">Superusuario</option>
            @elseif($user->tipo_de_sesión == 1)
            <option value="1" selected>Administrador</option>
            <option value="0">Usuario</option>
            <option value="2">Superusuario</option>
            @elseif($user->tipo_de_sesión == 2)
            <option value="2" selected>Superusuario</option>
            <option value="1">Administrador</option>
            <option value="0">Usuario</option>
            @endif
        </select>
        <br><br>
        <label>Estatus</label><select name="estatus">
            <option>ACTIVO</option>
            <option>DESACTIVADO</option>
        </select><br><br>
        <label>Contraseña:*</label><input type="password" name="contraseña" value="{{$user->contraseña}}"><br><br>
        <input type="submit" value="Guardar"> 
    </form>
    @endforeach
@endsection