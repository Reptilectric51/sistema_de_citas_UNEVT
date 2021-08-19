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
<h1>Reporte de citas de área de quiropráctica</h1>
    <form action="{{route('buscarcq')}}" method="POST">
        {{ csrf_field() }}
        @if(empty($termb))
        <input type="text" placeholder="Ingrese termino de busqueda" name="tb">
        @else
        <input type="text" placeholder="Ingrese termino de busqueda" name="tb" value="{{$termb}}">
        @endif
        <input type="submit" value="Buscar"><br><br>
    </form>
    <form action="{{route('comprobantecitasqpdf')}}" method="POST">
        {{ csrf_field() }}
        @if(empty($termb))
        <input type="text" value="" name="tb1" hidden>
        <input type="button" onclick="location.href='{{route('buscarusuario')}}';" class="btn_apt" value="Agendar nueva cita" />
        <input type="submit" value="Descargar formato pdf" class="btn_apt">
        <input type="button" onclick="location.href='{{route('reportesexcelcitas')}}';" class="btn_apt" value="Descargar reportes excel" />
        @else
        <input type="button" onclick="location.href='{{route('buscarusuario')}}';" class="btn_apt" value="Agendar nueva cita" />
        <input type="text" value="{{$termb}}" name="tb1" hidden>
        <input type="submit" class="btn_apt" value="Descargar formato pdf">
        @endif
    </form>
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Nombre completo</h3>
                </th>
                <th>
                    <h3>CURP</h3>
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
                @if(session('session_tipo') == 1 || session('session_tipo') == 2)
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
                    <td>{{$cita->CURP}}</td>
                    <td>{{$cita->email}}</td>
                    <td>{{$cita->consultorio}}</td>
                    <td>{{$cita->estatus}}</td>
                    <td>{{$cita->fecha}}</td>
                    <td>{{$cita->hora}}</td>
                    <td>{{$cita->folio}}</td>
                    <td>{{$cita->created_at}}</td>
                    <td>{{$cita->updated_at}}</td>
                    @if(session('session_tipo') == 1 || session('session_tipo') == 2)
                    <form action="{{route('modificarcita')}}" method="POST">
                        {{ csrf_field() }}
                        <td><select hidden name="id">
                                <option selected>{{$cita->id}}</option>
                            </select>
                            <input type="text" name="estatus" value="{{$cita->estatus}}" hidden readonly>
                            <input type="text" name="fecha" value="{{$cita->fecha}}" hidden readonly>
                            <input type="text" name="area" value="{{$cita->area}}" hidden readonly>
                            <input type="submit" value="Modificar cita">
                        </td>
                    </form>
                    @endif
                </tr>
            </tbody>
            @endforeach
    </table>
        {!! $citas->links('vendor.pagination.bootstrap-4') !!}
</div>
@if(empty($termb))
    @else
    <label align="center">Se muestran los resultados para {{$termb}}</label>
    @endif
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