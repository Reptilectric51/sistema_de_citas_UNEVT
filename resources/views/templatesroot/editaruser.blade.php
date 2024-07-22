@extends ('layouts.header')
@section('body')
@if(session('session_tipo') == 2)
@foreach($usuario as $user)
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
            <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Editar usuario</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los nuevos datos del usuario</h5>
                <form action="{{route('guardar_usuario')}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$user->id}}" readonly hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Yair" name="nombre"
                            id="recipient-name" value="{{$user->nombre}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellido_paterno"
                            id="recipient-name" value="{{$user->apellido_paterno}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellido_materno"
                            id="recipient-name" value="{{$user->apellido_materno}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Usuario(Matricula o no de servidor
                            publico)*:</label>
                        <input type="text" class="form-control"
                            placeholder="Ingrese aquí la matricula o el no de servidor público" name="usuario"
                            id="recipient-name" value="{{$user->usuario}}" required="">
                    </div>
                    <div class=" form-group">
                        <label for="recipient-name" class="col-form-label">Correo*:</label>
                        <input type="email" class="form-control" placeholder="Verifica el correo antes de enviar"
                            value="{{$user->correo}}" name="correo" id="recipient-phone" required="">
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Tipo de usuario</label>
                        <select required="" name="sesion" class="form-control">
                            @if($user->tipo_de_sesión == 0)
                            <option selected value="0">Usuario</option>
                            <option value="1">Administrador</option>
                            <option value="2">Superusuario</option>
                            @elseif($user->tipo_de_sesión == 1)
                            <option value="1" selected>Administrador</option>
                            <option value="0">Usuario</option>
                            <option value="2">Superusuario</option>
                            @elseif($user->tipo_de_sesión == 2)
                            <option value="2" selected>Superusuario</option>
                            <option value="1">Administrador</option>
                            <option value="0">Usuario</option>
                            @endif
                        </select>
                    </div>
                    @if($user->estatus == "ACTIVO")
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Tipo de usuario</label>
                        <select required="" name="estatus" class="form-control">
                            <option>ACTIVO</option>
                            <option>DESACTIVADO</option>
                        </select>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Tipo de usuario</label>
                        <select required="" name="estatus" class="form-control">
                            <option>DESACTIVADO</option>
                            <option>ACTIVO</option>
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña*:</label>
                        <input type="password" class="form-control" value="{{$user->contraseña}}" name="contraseña" id="recipient-name" required="">
                    </div>

                    <input type="submit" value="Actualizar usuario" class="btn_apt">
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
    </div>
</div>
<!-- //contact -->
@endforeach
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