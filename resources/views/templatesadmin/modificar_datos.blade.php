@extends('layouts.header')
@section('body')
@if(empty(session('session_id')))
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
@foreach($paciente as $datos)
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
            <li class="breadcrumb-item active" aria-current="page">Modificar paciente</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Modificar los datos de {{$datos->nombre}} {{$datos->apellido_paterno}}
                {{$datos->apellido_materno}}</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con la información a modificar</h5>
                <form action="salvar_paciente" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$datos->id}}" readonly hidden>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Yair" name="nombre"
                            value="{{$datos->nombre}}" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellido_paterno"
                            value="{{$datos->apellido_paterno}}" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellido_materno"
                            value="{{$datos->apellido_materno}}" id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Curp*:</label>
                        <input type="text" maxlength="16" class="form-control"
                            placeholder="Verifica tu correo antes de enviar" name="curp" id="recipient-phone"
                            value="{{$datos->CURP}}" required="">
                    </div>
                    <div class="form-group">
                        <p>Género:</p>
                        @if($datos->genero == "MASCULINO")
                        <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label
                            class="col-form-label">Masculino</label>
                        <input type="radio" id="Femenino" value="Femenino" name="genero"><label
                            class="col-form-label">Femenino</label>
                        @elseif($datos->genero == "FEMENINO")
                        <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>
                        <input type="radio" id="Femenino" value="Femenino" checked name="genero"><label>Femenino</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Número Celular*:</label>
                        <input type="text" class="form-control" pattern="[0-9]{10}" maxlength="10"
                            value="{{$datos->numero_movil}}" placeholder="Verifica los 10 digitos" name="celular"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Número Fijo*:</label>
                        <input type="text" class="form-control" pattern="[0-9]{10}" maxlength="10"
                            value="{{$datos->numero_fijo}}" placeholder="Verifica los 10 digitos" name="telefono"
                            id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lugar de Procendencia*:</label>
                        <input type="text" class="form-control" value="{{$datos->lugar_de_procedencia}}"
                            placeholder="Tú Municipio" name="procedencia" id="recipient-name" required="">
                    </div>
                    @if($datos->email != "N/A")
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Correo electronico*:</label>
                        <input type="email" class="form-control" placeholder="Verifica tu correo antes de enviar"
                            name="correo" id="recipient-phone" value="{{$datos->email}}" required="">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Correo electronico*:</label>
                        <input type="text" class="form-control" placeholder="Verifica tu correo antes de enviar"
                            name="correo" id="recipient-phone" value="{{$datos->email}}" required="">
                    </div>
                    @endif
                    <input type="submit" value="Guardar" class="btn_apt">
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
    </div>
</div>
@endforeach
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