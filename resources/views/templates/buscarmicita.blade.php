<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Buscar cita</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">UNEVT</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Citas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('buscarcita')}}">Buscar mi cita</a></li>
                            <!-- <li><a href="#">Agendar cita</a></li>-->
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="iniciarsesion/"><span class="glyphicon glyphicon-log-in"></span> Soy un
                            administrador</a></li>
                </ul>
            </div>
        </div>
    </nav>
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
</body>

</html>