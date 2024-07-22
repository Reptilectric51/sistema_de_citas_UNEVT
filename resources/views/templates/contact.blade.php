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
				<li class="breadcrumb-item active" aria-current="page">Conócenos</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title">Misión</h3>
				<span>
					<i class="fas fa-universal-access"></i>
				</span>
			</div>
			<p align="center">
				Consolidarse como una Institución de Salud de alta competitividad, líder en atención integral, a través de tratamientos multidisciplinarios de acupuntura, rehabilitación, quiropráctica y gerontología, con profesionales altamente calificados.
			</p>
				<br>
		</div>
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title">Visión</h3>
				<span>
					<i class="fas fa-universal-access"></i>
				</span>
			</div>
			<p align="center">
				Ser una Clínica Integral Universitaria reconocida a Nacional e Internacionalmente, que oferte tratamientos multidisciplinarios y complementarios, contribuyendo al bienestar y calidad de la vida de la sociedad. 
			</p>
				<br>
		</div>
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title">Objetivos</h3>
				<span>
					<i class="fas fa-universal-access"></i>
				</span>
			</div>
			<p align="center">
				General
			Brindar servicios multidisciplinarios y complementarios de salud, que garanticen una atención de óptima calidad, confiable y oportuna humana; basada en altos niveles científicos con la finalidad de satisfacer las necesidades y expectativas de nuestros pacientes y su grupo familiar en un ambiente agradable, en excelentes condiciones.
			</p>
				<br>
		</div>
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title">¿Qué hacer en mi primera visita a la Clínica Integral Universitaria?</h3>
				<span>
					<i class="fas fa-question-circle"></i>
				</span>
			</div>
			<p align="left">
				1.	Agendar tu cita al teléfono (728) 287 83 82 ext. 2023 en un horario de 8:00 a 16:00 horas.
				<br>
				2.	Presentarse 10 minutos antes de su cita.
				<br>
				3.	Pasar por el filtro sanitario donde se te proporcionara gel antibacterial, se te tomara la temperatura y tus nivels de oxigeno, asi mismo se te hara una valoración simplificada para COVID-19.
				<br>
				4.	Presentar en recepción el folio y/o carnet para validar su cita.
				<br>
				5.	Dejar su identificación oficial (INE, IFE, INAPAM, INSEN, Cedula Profesional o Licencia De Conducir de la persona que pasara a valoración).
				<br>
				6.	Ser tan amable de esperar su turno; la revisión de filtro puede demorar, ya que para cada paciente requiere una atención personalizada, por lo que se pide no abandonar la sala de espera, ya que le llamarán cuando sea tu turno.
				<br>
				7.	En el área de filtro, le pueden solicitar estudios para su ingreso a consulta de primera vez.
				<br>
				8.	Pasar al área de caja para cubrir el costo de su consulta.
				<br>
				9.	Entregar el recibo de pago en el área de recepción.
				<br>
				10.	Esperar a ser llamado por el área que será atendido por primera vez, en caso de no contar con un espacio para atenderlo se le entregarán una tarjeta de indicaciones, fecha y horario de consulta de primera vez, además de su recibo de pago.
				<br>
				11.	En caso de ser referido a otra institución de salud se le entregara su hoja de referencia debidamente requisitada.
				<br>
				12.	Su carnet se le entregará el día de su cita de primera vez.
			</p>
				<br>
		</div>
	</section>
	<!-- //contact -->

	<!-- Map -->
	<h4 class="title"><center> Ubicación de la Clínica</h4></center>
		<center><i class="fas fa-map-pin"></i></center>
			<br>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.821512130769!2d-99.47729858509622!3d19.246609086990244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cdf4145d842173%3A0xfad38865fffc1376!2sClinica%20Integral%20Universitaria%20UNEVT!5e0!3m2!1ses-419!2smx!4v1627952829649!5m2!1ses-419!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<!-- //Map -->


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