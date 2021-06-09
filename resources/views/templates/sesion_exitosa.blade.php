<!DOCTYPE html>
<html>

<head>
    <title>Sesión de {{session('session_name')}}</title>
</head>

<body>
    <h1>Hola {{session('session_name')}} por favor elija una de las opciones mostradas a continuación</h1>
    <a href="citasq">Ver citas quiropractica</a><br><br>
    <a href="{{route('bye')}}">Cerrar sesión</a>
</body>

</html>