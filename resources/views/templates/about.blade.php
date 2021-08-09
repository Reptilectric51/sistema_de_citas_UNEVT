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
				<li class="breadcrumb-item active" aria-current="page">Acerca de Nosotros</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- about -->
	<section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title">Acerca de Nosotros</h3>
				<span>
					<i class="fas fa-question"></i>
				</span>
			</div>
			<!--style="color:#816F5F;"-->
			<p class="aboutpara text-lg-left mx-auto">La Clínica Integral Universitaria (CIU) surge como un espacio innovador para la atención del paciente y sus familiares con un trato clínico humanístico, mediante el diagnóstico y tratamientos interdisciplinarios. Estamos altamente comprometidos en brindar una atención de calidad y oportuna, mediante profesionales de las áreas en Acupuntura, Rehabilitación Gerontología y 	Quiropráctica.
				<br>
				<br>
			Fue inaugurada el 21 de febrero del 2013 por el entonces Gobernador Constitucional Eruviel Ávila Villegas,   surge con el propósito de fortalecer la práctica clínica de los estudiantes y pasantes de la UNEVT, creando servicios Acupuntura, Gerontología, Rehabilitación y Quiropráctica en beneficio de los pacientes, en los inicios la CIU contaba con 20 consultorios de quiropráctica, 8 consultorios de gerontología,  9 consultorios  de Acupuntura y un área de rehabilitación.  Se cuenta con servicios especializados de apoyo al diagnóstico en  2015 se inició a brindar el servicio de rayos X, en el año 2017 inicio actividades el laboratorio de análisis clínicos y en 2020  implementó el servicio de ultrasonido.</p>
		</div>
	</section>
	<!-- //about -->

	<!-- middle section -->
	<!--<div class="w3ls-welcome py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="row">
				<div class="col-lg-5 welcome-right">
					<img src="images/b2.png" alt=" " class="img-fluid">
				</div>
				<div class="col-lg-7 welcome-left mt-4">
					<h3>Awesome Theme for Medical and Health Websites</h3>
					<h6 class="mt-3">Suspendisse porta erat sit amet eros sagittis</h6>
					<h4 class="my-4 font-italic">Cum sociis natoque penatibus et magnis dis parturient montesmus, Proin vel nibh et
						elit mollis commodo et nec augue
						tristique sed.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta erat sit amet eros sagittis, quis
						hendrerit
						libero aliquam. Fusce semper augue ac dolor efficitur, a pretium metus pellentesque.</p>
					<div class="readmore-w3-agileits mt-md-5 mt-4">
						<a href="single.html" class="w3ls-button-agile text-dark">View Some More</a>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- //middle section -->

	<!-- team -->
	<section class="team py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Nuestros Supervisores</h3>
				<span>
					<i class="fas fa-user-circle"></i>	
				</span>
				<p class="mt-2">Son los encargados de nuestra intitución.</p>
			</div>
			<div class="row inner-sec-w3layouts-agileinfo">
				<div class="col-md-4 team-grids text-center">
					<img src="images/t1.jpeg" class="img-fluid" alt="">
					<div class="team-info">
						<div class="caption">
							<h4>Olga Pérez Sanabria</h4>
							<h6>Maestra en Derecho Fiscal y Abogada</h6>
						</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white">
									<i class="fas fa-phone mr-2"></i>(728) 287-83-82</p>
							</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white" align="center">
									<i class="far fa-envelope-open mr-2"></i>
									<a href="mailto:info@example.com" class="text-white">rectoria@unevt.edu.mx</a>
								</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 team-grids text-center">
					<img src="images/t2.jpeg" class="img-fluid" alt="">
					<div class="team-info">
						<div class="caption">
							<h4>Omar Ruiz Castillo</h4>
							<h6>Licenciado en Administración y Promoción de la Obra Urbana</h6>
						</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white">
									<i class="fas fa-phone mr-2"></i>(728) 287-83-82</p>
							</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white" align="center">
									<i class="far fa-envelope-open mr-2"></i>
									<a href="mailto:info@example.com" class="text-white">dacademico@unevt.edu.mx</a>
								</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="team py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Nuestro Equipo de Trabajo</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
				<p class="mt-2">Contamos con un amplia variedad de persona que se encargara de tu salud y bienestar.</p>
			</div>
			<div class="row inner-sec-w3layouts-agileinfo">
				<div class="col-md-4 team-grids text-center">
					<img src="images/t1.jpg" class="img-fluid" alt="">
					<div class="team-info">
						<div class="caption">
							<h4>Rebeca Alejandra Avendaño Espina</h4>
							<h6>Lic en Acupuntura Médica y Rehabilitación Integral</h6>
						</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white">
									<i class="fas fa-phone mr-2"></i>(728) 287-83-82 Ext 2040</p>
							</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white" align="center">
									<i class="far fa-envelope-open mr-2"></i>
									<a href="mailto:info@example.com" class="text-white">coordinacionacupuntura@unevt.edu.mx</a>
								</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 team-grids text-center">
					<img src="images/t2.jpg" class="img-fluid" alt="">
					<div class="team-info">
						<div class="caption">
							<h4>Laura Marina Rodríguez Hernández</h4>
							<h6>Lic. en Quiropráctica</h6>
						</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white">
									<i class="fas fa-phone mr-2"></i>(728) 287-83-82 Ext 2020</p>
							</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white" align="center">
									<i class="far fa-envelope-open mr-2"></i>
									<a href="mailto:info@example.com" class="text-white">coordinacionquiropractica@unevt.edu.mx</a>
								</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 team-grids text-center">
					<img src="images/t3.jpg" class="img-fluid" alt="">
					<div class="team-info">
						<div class="caption">
							<h4>María Fernanda Vázquez Rivero</h4>
							<h6>Encargada del Servicio de Imagenología</h6>
						</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white">
									<i class="fas fa-phone mr-2"></i> (728) 287-83-82 Ext 2021</p>
							</div>
						<div class="col-lg-7 col-6 top-w3layouts">
								<p class="text-white" align="center">
									<i class="far fa-envelope-open mr-2"></i>
									<a href="mailto:info@example.com" class="text-white">maria.vazquez@unevt.edu.mx</a>
								</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- team -->

	<!-- banner bottom -->
	<div class="banner-bottom py-5">
		<div class="d-flex container py-xl-3 py-lg-3">
			<div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1">
				<!---->
				<h3 class="text-white my-3">Servicio de Filtro</h3>
				<h6 class="text-white">¿En qué consiste el servicio de filtro?</h6>
				<br>
				<p style="color:white;">Consiste en la valoración inicial para definir el o las áreas de atención a su padecimiento, de acuerdo a los criterios de admisión establecidos por la Cínica Integral Universitaria.
				En el servicio de filtro (Denominada área de primer contacto) NO SE LLEVA A CABO NINGÚN TRATAMIENTO, es únicamente una parte del procedimiento de admisión.</p>
				<p style="color:#EC1010;"><b>NOTA: No se cuenta con servicio de urgencias. </b></p>
				
				<p style="color:white;"> Los datos requeridos para llevar a cabo la valoración de filtro son los siguientes:
					<br>
				a. Nombre completo del o de la paciente
					<br>
				b. Dirección
					<br>
				c. Edad
					<br>
				d. Teléfono
					<br>
				e. Ocupación Actual
					<br>
				f. Motivo de Consulta
					<br>
				g. Presentar estudios de laboratorio o gabinete (en caso de contar con los mismos) </p>
			</div>
			<!--<div class="button">
				<a href="about.html" class="w3ls-button-agile">Read More
					<i class="fas fa-hand-point-right"></i>
				</a>
			</div>-->
		</div>
	</div>
	<!-- //banner bottom -->

	<!-- services -->
	<div class="why-choose-agile pt-5" id="services">
		<div class="container pt-xl-5 pt-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title"><center> La CIU cuenta con los siguientes servicios: </center></h3>
				<span>
					<i class="fas fa-band-aid"></i>
				</span>
				<p class="mt-2">Cada servicio se basa en un área en especifico.</p>
				<div class="row about_grids mt-5">
				<div class="col-lg-4">
					<img src="images/service1.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Acupuntura </h3>
					<p class="my-3">La acupuntura es un procedimiento terapéutico de la medicina tradicional china (MTC) desarrollado hace más de tres mil años. Consiste en la inserción con fines terapéuticos de agujas en puntos precisos de la piel denominados acupuntos para padecimientos crónico-degenerativos y cuadros dolorosos agudos de padecimientos como: gastritis, colitis, neuropatías, alteraciones emocionales, alteraciones menstruales, migrañas, insomnio, entre otras.</p>
				</div>
				<div class="col-lg-4 my-lg-0 my-5">
					<img src="images/service2.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Cuarto de Estimulación Multisensorial (CEMS) </h3>
					<p class="my-3">Espacio dedicado para la atención pacientes con trastornos del desarrollo psicomotor y neurológico adquiridos o hereditarios. Cuenta con tubo de burbujas, columpio vestibular, alberca de pelotas, escalones graduados, proyector de luz, panel de cinco actividades, luces led, panel infinito, fibra óptica lluvia, set de aromaterapia, piso de foamy.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service3.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Área de psicomotricidad </h3>
					<p class="my-3">Espacio dedicado para la atención pacientes con trastornos del desarrollo psicomotor y neurológico adquiridos o hereditarios. Cuenta con un circuito psicomotor, pared para escalar, albercas de pelotas.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service4.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Quiropráctica </h3>
					<p class="my-3">Se encarga del diagnóstico y tratamiento de problemas neuro-músculo-esqueléticos, en especial los padecimientos relacionados a la columna vertebral tales son: cervicales, lumbalgias, hernias discales, entre otros problemas que involucran a la salud en general.</p>
				</div>
				<div class="col-lg-4 my-lg-0 my-5">
					<img src="images/service5.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Rehabilitación </h3>
					<p class="my-3">Atender a pacientes por medio de la mecanoterapia, electroterapia, termoterapia, ejercicios terapéuticos, entre otros enfocados al sistema neuro-músculo-esquelético con enfoque en rehabilitar al paciente con algún tipo de discapacidad física.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service6.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Gerontología </h3>
					<p class="my-3">Se encarga de la evaluación, diagnóstico, y tratamiento de la salud de la persona mayor; en especial de los padecimientos relacionados con el funcionamiento orgánico y aspectos psico-sociales relacionados con la salud, con el fin de mantener y prolongar la capacidad funcional en los adultos mayores, para el logro de un envejecimiento activo y saludable.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service7.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Imagenología </h3>
					<p class="my-3">Es el área competente que apoya a la valoración y diagnóstico clínico, ofreciendo atención interna y externa, equipado con una sala convencional de Rayo X y una adicional de Ultrasonido.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service8.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Laboratorio de Análisis Clínicos </h3>
					<p class="my-3">El Laboratorio de Análisis Clínicos tiene como propósito ofrecer al prestador de servicios de salud resultados confiables, con el fin de prevenir, detectar y/o diagnosticar alguna enfermedad de manera oportuna.</p>
				</div>
				<div class="col-lg-4">
					<img src="images/service9.jpg" alt="" class="img-fluid" />
					<h3 class="mt-3 text-dark">Cámara Hiperbárica </h3>
					<p class="my-3">La oxigenación hiperbárica permite a los pacientes que sus niveles de saturación del oxígeno sean incrementados considerablemente, así como en los fluidos de todo el cuerpo. Los resultados de esta saturación de oxígeno, son un incremento acelerado en la formación de nuevos vasos capilares y vasos sanguíneos periféricos. Ello permite una recuperación mucho en los tejidos y la piel asi como en os procesos post-operatorios.</p>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- //services -->

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
    @endsection