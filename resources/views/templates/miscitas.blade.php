<!DOCTYPE html>
<html>
@foreach ($citas as $cita)

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Se muestran las citas de {{$cita->nombre}} {{$cita->apellido_paterno}}</title>
    @endforeach

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
                        <li><a href="iniciarsesion/"><span class="glyphicon glyphicon-log-in"></span> Soy un
                                administrador</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <h3>Nombre</h3>
                    </th>
                    <th>
                        <h3>Apellido paterno</h3>
                    </th>
                    <th>
                        <h3>Apellido materno</h3>
                    </th>
                    <th>
                        <h3>Correo electrónico</h3>
                    </th>
                    <th>
                        <h3>Consultorio</h3>
                    </th>
                    <th>
                        <h3>Estatus de la cita</h3>
                    </th>
                    <th>
                        <h3>Fecha</h3>
                    </th>
                    <th>
                        <h3>Hora</h3>
                    </th>
                    <th>
                        <h3>Folio</h3>
                    </th>
                    <th>
                        <h3>Creada</h3>
                    </th>
                    <th>
                        <h3>Opciones</h3>
                    </th>
                </tr>
                <thead>
                    @foreach ($citas as $cita)
                <tbody>
                    <tr>
                        <td>{{$cita->nombre}}</td>
                        <td>{{$cita->apellido_paterno}}</td>
                        <td>{{$cita->apellido_materno}}</td>
                        <td>{{$cita->email}}</td>
                        <td>{{$cita->consultorio}}</td>
                        <td>{{$cita->estatus}}</td>
                        <td>{{$cita->fecha}}</td>
                        <td>{{$cita->hora}}</td>
                        <td>{{$cita->folio}}</td>
                        <td>{{$cita->created_at}}</td>
                        <form action="{{route('pdfcitacq')}}" method="POST">
                            {{ csrf_field() }}
                            <td>
                                <input type="text" name="folio" value="{{$cita->folio}}" hidden readonly>
                                <input type="submit" value="Descargar comprobante pdf">
                        </form><br><br>
                        <form action="{{route('cancelarcita')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="folio" value="{{$cita->folio}}" hidden readonly>
                            <input type="text" name="id" value="{{$cita->id}}" hidden readonly>
                            <input type="text" name="correo" value="{{$cita->email}}" hidden readonly>
                            <input type="text" name="fecha" value="{{$cita->fecha}}" hidden readonly>
                            <input type="text" name="hora" value="{{$cita->hora}}" hidden readonly>
                            <input type="text" name="nombrec" value="{{$cita->nombre}} {{$cita->apellido_paterno}} {{$cita->apellido_materno}}" hidden readonly>
                            <input type="submit" value="Cancelar cita">
                        </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
        </table>
        </div>
        </body>

</html>