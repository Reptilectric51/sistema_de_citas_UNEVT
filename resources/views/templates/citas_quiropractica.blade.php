<!DOCTYPE html>
<html>

<head>
    <title>Citas</title>
</head>

<body>
    <h1>Reporte de citas de área de quiropráctica</h1>
    <form action="{{route('buscarcq')}}" method="POST">
        {{ csrf_field() }}
        <input type="text" placeholder="Ingrese termino de busqueda" name="tb">
        <input type="submit" value="Buscar"><br><br>
    </form>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
        <thead>
            <tr>
                <th>
                    <h3>Id</h3>
                </th>
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
            </tr>
            <thead>
                @foreach ($citas as $cita)
            <tbody>
                <tr>
                    <td>{{$cita->id}}</td>
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
                </tr>
            </tbody>
            @endforeach
    </table>
</body>

</html>