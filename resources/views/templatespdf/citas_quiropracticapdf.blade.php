<!DOCTYPE html>
<html>
    <head>
        <title>Comprobante de cita</title>
    </head>
    <body>
    <table>
        <thead>
            <tr>
                <th>
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>Email</h3>
                </th>
                <th>
                    <h3>Consultorio</h3>
                </th>
                <th>
                    <h3>Estatus</h3>
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
                    <h3>Actualizado</h3>
                </th>                
            </tr>
</thead>
                @foreach ($citas as $cita)
            <tbody>
                <tr>
                    <td>{{$cita->nombre}} {{$cita->apellido_paterno}} {{$cita->apellido_materno}}</td>
                    <td>{{$cita->email}}</td>
                    <td>{{$cita->consultorio}}</td>
                    <td>{{$cita->estatus}}</td>
                    <td>{{$cita->fecha}}</td>
                    <td>{{$cita->hora}}</td>
                    <td>{{$cita->folio}}</td>
                    <td>{{$cita->created_at}}</td>
                    <td>{{$cita->updated_at}}</td>
                    </form>
                </tr>
            </tbody>
            @endforeach
    </table>
</body>
<html>