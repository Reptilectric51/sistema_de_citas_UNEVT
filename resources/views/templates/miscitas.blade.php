@extends('layouts.header')
@section('body')
<script>
    function confirmacion() {
        var mensaje = confirm("Recuerda que si cancelas tu cita no se te rembolsara el costo de la misma");
        if (mensaje) {
            document.getElementById("form1").submit();
        }
        else {
            alert("¡Haz denegado el mensaje!");
        }
    }
</script>
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>
<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}">Inicio</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Todas tus citas</li>
        </ol>
    </div>
</div>
<!-- //page details -->

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
                    <form id="form1" action="{{route('cancelarcita')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="folio" value="{{$cita->folio}}" hidden readonly>
                        <input type="text" name="id" value="{{$cita->id}}" hidden readonly>
                        <input type="text" name="correo" value="{{$cita->email}}" hidden readonly>
                        <input type="text" name="fecha" value="{{$cita->fecha}}" hidden readonly>
                        <input type="text" name="hora" value="{{$cita->hora}}" hidden readonly>
                        <input type="text" name="nombrec"
                            value="{{$cita->nombre}} {{$cita->apellido_paterno}} {{$cita->apellido_materno}}" hidden
                            readonly>
                        <input type="button" value="Cancelar mi cita" onclick="confirmacion()">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $citas->links() !!}
    </div>

</div>
@endsection