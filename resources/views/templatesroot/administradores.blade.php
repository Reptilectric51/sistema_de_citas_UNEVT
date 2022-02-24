@extends ('layouts.header')
@section('body')
@if(session('session_tipo') == 2)
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
            <li class="breadcrumb-item active" aria-current="page">Todos los usuarios</li>
        </ol>
    </div>
</div>
<form action="{{route('buscar_usuario')}}" method="POST">
    @csrf
    @if(empty($termb))
    <input type="search" name="termb" placeholder="Ingrese su termino de busqueda">&nbsp;<input type="submit" value="Buscar"><br><br>
    @elseif($termb != "")
    <input type="search" name="termb" value="{{$termb}}" placeholder="Ingrese su termino de busqueda">&nbsp;<input type="submit" value="Buscar"><br><br>
    @endif
</form>
<input type="button" onclick="location.href='{{route('registrar_nuevo_usuario')}}'" value="Registrar un nuevo usuario"><br>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Nombre</h3>
                </th>
                <th>
                    <h3>usuario</h3>
                </th>
                <th>
                    <h3>Correo</h3>
                </th>
                <th>
                    <h3>Tipo de usuario</h3>
                </th>
                <th>
                    <h3>Contraseña</h3>
                </th>
                <th>
                    <h3>Área</h3>
                </th>
                <th>
                    <h3>Estatus</h3>
                </th>
                <th>
                    <h3>Opciones</h3>
                </th>
            </tr>
</thead>
                @foreach ($usuarios as $usuario)
            <tbody>
                <tr>
                    <td>{{$usuario->nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</td>
                    <td>{{$usuario->usuario}}</td>
                    <td>{{$usuario->correo}}</td>
                    @if($usuario->tipo_de_sesión == 0)
                    <td>Usuario</td>
                    @elseif($usuario->tipo_de_sesión == 1)
                    <td>Administrador</td>
                    @elseif($usuario->tipo_de_sesión == 2)
                    <td>Superusuario</td>
                    @endif
                    <td>{{$usuario->contraseña}}</td>
                    <td>{{$usuario->area}}</td>
                    <td>{{$usuario->estatus}}</td>
                    <td>
                        <form action="{{route('editar_usuario')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" value="{{$usuario->id}}" hidden readonly>
                            <input type="submit" value="Editar usuario">
                        </form>
                    </td>
                    </form>
                </tr>
            </tbody>
            @endforeach
    </table>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $usuarios->links() !!}
    </div>
@else
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=/">
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