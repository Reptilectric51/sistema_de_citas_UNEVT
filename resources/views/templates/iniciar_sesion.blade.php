<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
</head>

<body>
            <div align = center>
                <h1>Iniciar sesión</h1>
                <form action="{{route('login')}}" method="POST">
                    {{ csrf_field() }}
                    <label>Usuario*:</label>
                    <input type="text" name="usuario" placeholder="Ingrese su correo o su nombre de usuario" required><br><br>
                    <label>Contraseña*:</label>
                    <input type="password" name="contraseña" placeholder="Ingrese su contraseña" required><br><br>
                    <input type="submit" value="Iniciar sesión">
                </form>
            </div>

</body>

</html>