<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Citas</title>
</head>

<body>
    @if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
    @else
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
                            <li><a href="{{route('misdatos')}}">Mis datos</a></li>
                            <li><a href="{{route('bye')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Reporte de citas de área de quiropráctica</h1>
    <form action="{{route('buscarcq')}}" method="POST">
        {{ csrf_field() }}
        <input type="text" placeholder="Ingrese termino de busqueda" name="tb">
        <input type="submit" value="Buscar"><br><br>
    </form>
    <input type="button" onclick="location.href='{{route('agendarcitaqa')}}';" value="Agendar nueva cita" />
    <div class="table-responsive">
    <table class="table">
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
                    <form action="{{route('modificarcita')}}" method="POST">
                        {{ csrf_field() }}
                        <td><select hidden name="id">
                                <option selected>{{$cita->id}}</option>
                            </select>
                            <input type="text" name="estatus" value="{{$cita->estatus}}" hidden readonly>
                            <input type="submit" value="Modificar cita">
                        </td>
                    </form>
                </tr>
            </tbody>
            @endforeach
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $citas->links() !!}
    </div>
</div>
</body>
@endif
</html>