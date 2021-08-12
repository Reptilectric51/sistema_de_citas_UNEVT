@extends('layouts.header')
@section('body')
    @if(empty(session('session_id')))
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
    @else
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
            <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
        </ol>
    </div>
</div>
    <h1>Reporte de pacientes</h1>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>CURP<h3>
                </th>
                <th>
                    <h3>Género</h3>
                </th>
                <th>
                    <h3>Número de celular</h3>
                </th>
                <th>
                    <h3>Número de teléfono fijo</h3>
                </th>
                <th>
                    <h3>Lugar de procedencia</h3>
                </th>
                <th>
                    <h3>Correo electronico</h3>
                </th>
                @if( session('session_tipo') == 2 || session('session_tipo') == 1)
                <th>
                    <h3>Opciones</h3>
                </th>
                @endif
            </tr>
            <thead>
                @foreach ($pacientes as $paciente)
            <tbody>
                <tr>
                    <td>{{$paciente->nombre}} {{$paciente->apellido_paterno}} {{$paciente->apellido_materno}}</td>
                    <td>{{$paciente->CURP}}</td>
                    <td>{{$paciente->genero}}</td>
                    <td>{{$paciente->numero_movil}}</td>
                    <td>{{$paciente->numero_fijo}}</td>
                    <td>{{$paciente->lugar_de_procedencia}}</td>
                    <td>{{$paciente->email}}</td>
                    @if( session('session_tipo') == 2 || session('session_tipo') == 1)
                    <td>
                        <form action="{{route('modificar_paciente')}}" method="POST">
                            @csrf
                            <input type="text" name=id value="{{$paciente->id}}" readonly hidden>
                            <input type="submit" value = "Actualizar datos">
                        </form>
                    </td>
                    @endif
                </tr>
            </tbody>
            @endforeach
    </table>
</div>
    @endif
    <!-- Js files -->
        <!-- JavaScript -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <!-- Default-JavaScript-File -->

        <!-- banner slider -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: true,
                    speed: 1000,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>
        <!-- //banner slider -->

        <!-- fixed navigation -->
        <script src="js/fixed-nav.js"></script>
        <!-- //fixed navigation -->

        <!-- smooth scrolling -->
        <script src="js/SmoothScroll.min.js"></script>
        <!-- move-top -->
        <script src="js/move-top.js"></script>
        <!-- easing -->
        <script src="js/easing.js"></script>
        <!--  necessary snippets for few javascript files -->
        <script src="js/medic.js"></script>

        <script src="js/bootstrap.js"></script>
        <!-- Necessary-JavaScript-File-For-Bootstrap -->

        <!-- //Js files -->
@endsection