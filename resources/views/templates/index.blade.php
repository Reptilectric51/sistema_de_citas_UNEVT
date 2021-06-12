<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Bienvenido</title>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Citas <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('buscarcita')}}">Buscar mi cita</a></li>
                           <!-- <li><a href="#">Agendar cita</a></li>-->
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="iniciarsesion/"><span class="glyphicon glyphicon-log-in"></span> Soy un administrador</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Bienvenido a la clinica integral de la UNEVT</h1>
    <h2>Selecciones el área en la que desea agendar su cita</h2>
    <a href="{{route('agendarCitaq')}}">Quiropractica</a>
</body>

</html>