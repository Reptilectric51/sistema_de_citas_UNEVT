    <h1>Reporte de citas de área de quiropráctica</h1>
    <div class="table-responsive">
    <table class="table">
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
                @if(session('session_tipo') == 1)
                <th>
                    <h3>Opciones</h3>
                </th>
            </tr>
            @endif
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
                    @if(session('session_tipo') == 1)
                    <form action="{{route('modificarcita')}}" method="POST">
                        {{ csrf_field() }}
                        <td><select hidden name="id">
                                <option selected>{{$cita->id}}</option>
                            </select>
                            <input type="text" name="estatus" value="{{$cita->estatus}}" hidden readonly>
                            <input type="submit" value="Modificar cita">
                        </td>
                    </form>
                    @endif
                </tr>
            </tbody>
            @endforeach
    </table>