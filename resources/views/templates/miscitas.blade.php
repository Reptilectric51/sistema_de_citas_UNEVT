@extends('layouts.header')
@section('body')
<script>
    function confirmacion() {
        var mensaje = confirm("Estas seguro de cancelar tu cita. Recuerda qué si ya pagaste deberas contactar con la clinica para solicitar un rembolso.");
        if (mensaje) {
            document.getElementById("form1").submit();
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