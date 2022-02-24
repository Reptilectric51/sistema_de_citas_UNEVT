@extends('layouts.header')
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
            <li class="breadcrumb-item active" aria-current="page">Crear nuevo usuario</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- contact -->
<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Crear nuevo usuario</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Llenar con los datos del nuevo usuario</h5>
                <form action="{{route('crearusuario')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Yair" name="nombre"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellido_paterno"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellido_materno"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Usuario(Matricula o no de servidor
                            publico)*:</label>
                        <input type="text" class="form-control"
                            placeholder="Ingrese aquí la matricula o el no de servidor público" name="usuario"
                            id="recipient-name" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Correo*:</label>
                        <input type="email" class="form-control" placeholder="Verifica el correo antes de enviar"
                            name="correo" id="recipient-phone" required="">
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Tipo de usuario</label>
                        <select required="" name="sesion" class="form-control">
                            <option selected disabled>Selecciona el tipo de usuario</option>
                            <option value="0">Usuario</option>
                            <option value="1">Administrador</option>
                            <option value="2">Superusuario</option>
                        </select>
                    </div>
                    <div class="form-group">
							<label for="datepicker" class="col-form-label">Selecciona en Áerea</label>
							<select required="" class="form-control" id="area" name="area">
								<option value="">Elige una Opción</option>
								<option>Acupuntura</option>
								<option value="Cámara hiperbárica">Cámara Hiperbárica</option>
								<option value="Quiropractica">Quiropráctica</option>
								<option>Rehabilitación</option>
								<option value="Gerontología">Gerontología</option>
								<option>Ultrasonido</option>
								<option value="Laboratorio">Laboratorio de Análisis Clínicos</option>
								<option>Rayos x</option>
                                <option>Administración</option>
							</select>
						</div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña*:</label>
                        <input type="password" class="form-control" name="contraseña" id="recipient-name" required="">
                    </div>

                    <input type="submit" value="Guardar nuevo usuario" class="btn_apt">
                </form>
            </div>
            <div class="clerafix"></div>
        </div>
    </div>
</div>
<!-- //contact -->
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