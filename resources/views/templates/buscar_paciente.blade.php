@extends('layouts.header')
    @section('body')
    	<!-- banner 2 -->
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
				<li class="breadcrumb-item active" aria-current="page">Agendar Cita</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<div class="appointment py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Agenda tú cita</h3>
				<span>
				<i class="fas fa-calendar-plus"></i>
				</span>
				<p class="mt-2" style="color:darkred;">Los datos recabados por su persona, serán manejados en estricta confidencialidad, conforme al artículo 40 de la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de México y Municipios.</p>
			</div>
			<div class="d-flex">
				<div class="appoint-img">

				</div>
                <div class="contact-right-w3l appoint-form">
					<h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con tus datos para agendar tú cita</h5>
					<form action="{{route('buscardatospaciente')}}" method="post">
                        @csrf
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">CURP*:</label>
							<input type="text" class="form-control" placeholder="Ingresa tu CURP aquí" minlength="18" maxlength="18" name="curp" id="recipient-name" required="">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Correo electronico:</label>
							<input type="email" class="form-control" placeholder="Por favor ingresa tú correo electronico en caso de no tener dejalo vacio" name="correo" id="recipient-phone" >
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Ingrese la fecha de su cita*:</label>
							<input placeholder="Fecha" name="fecha" class="date form-control" min="{{$next_date}}" id="fecha" type="date" value="" required="" />
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
							</select>
						</div>
						<input type="submit" value="Enviar" class="btn_apt">
					</form>
				</div>
				<div class="clerafix"></div>
			</div>
		</div>
	</div>
    <!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!--start-date-piker-->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
		$('.btn_apt').click(function () {
            send_area($('#area').val());
        });
		
		function send_area(area){
			$.ajax({
    url : "{{route('buscardatospaciente')}}",
    method : "POST",
    //dataType:"json",
    data : {area:area},
            
    success : function(data){
     
        //console.log(data);   
         
    }       
          
  }) 
		}
	</script>
	<!-- //End-date-piker -->

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