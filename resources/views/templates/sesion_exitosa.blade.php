<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Sesión de {{session('session_name')}}</title>
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
                <a class="navbar-brand" href="{{route('index')}}">UNEVT</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('index')}}">Inicio</a></li>
                </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{session('session_name')}} <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mis datos</a></li>
                            <li><a href="{{route('bye')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Hola {{session('session_name')}} por favor elija una de las opciones mostradas a continuación</h1>
    <a href="citasq">Ver citas quiropractica</a><br><br>
</body>

</html>