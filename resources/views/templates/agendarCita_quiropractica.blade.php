@extends('layouts.header')
<meta name="_token" content="{{csrf_token()}}">
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

<div class="appointment py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Agenda tú cita</h3>
            <span>
            <i class="fas fa-calendar-plus"></i>
            </span>
            <p class="mt-2" style="color:darkred;">Los datos recabados por su persona, serán manejados en estricta
                confidencialidad, conforme al artículo 40 de la Ley de Protección de Datos Personales en Posesión de
                Sujetos Obligados del Estado de México y Municipios.</p>
        </div>
        <div class="d-flex">
            <div class="appoint-img"></div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con tus datos para agendar
                    tú cita</h5>
                @if(empty(session('session_id')))
                <form action="{{route('guardarcitaq')}}" method="POST">
                    @else
                    <form action="{{route('guardarcitaqadmin')}}" method="POST">
                        @endif
                        @csrf
                        @if($existe == "")
                        @foreach($paciente as $pacien)
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                            <input type="text" class="form-control" value="{{$pacien->nombre}}"
                                placeholder="Ejemplo: Yair" name="nombre" id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                            <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellidop"
                                id="recipient-name" value="{{$pacien->apellido_paterno}}" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                            <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellidom"
                                id="recipient-name" value="{{$pacien->apellido_materno}}" required="">
                        </div>
                        @if($pacien->email == "N/A")
                        <div class="form-group">
                            <input class="form-control" hidden type="mail" name="correo" placeholder="ej mail@mail.com"
                                value="{{$correo}}">
                        </div>
                        @else
                        <div class="form-group">
                            <input class="form-control" hidden type="mail" name="correo" placeholder="ej mail@mail.com"
                                value="{{$pacien->email}}">
                        </div>
                        @endif
                        <div class="form-group">
                            <p>Género:</p>
                            @if($pacien->genero == "MASCULINO")
                            <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label
                                class="col-form-label">Masculino</label>
                            <input type="radio" id="Femenino" value="Femenino" name="genero"><label
                                class="col-form-label">Femenino</label>
                            @elseif($pacien->genero == "FEMENINO")
                            <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>
                            <input type="radio" id="Femenino" value="Femenino" checked name="genero"><label>Femenino</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Número Celular*:</label>
                            <input type="text" class="form-control" placeholder="Verifica los 10 digitos" pattern="[0-9]{10}" name="celular"
                                id="recipient-name" required="" value="{{$pacien->numero_movil}}" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Número de telefono fijo*:</label>
                            <input type="text" class="form-control" pattern="[0-9]{10}" placeholder="Verifica los 10 digitos" name="telefono"
                                id="recipient-name" value="{{$pacien->numero_fijo}}" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Lugar de Procendencia*:</label>
                            <input type="text" class="form-control" placeholder="Tú Municipio" name="procedencia"
                                id="recipient-name" value="{{$pacien->lugar_de_procedencia}}" required="">
                        </div>
                        @endforeach
                        @else
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                            <input type="text" class="form-control" placeholder="Ejemplo: Yair" name="nombre"
                                id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                            <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellidop"
                                id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                            <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellidom"
                                id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" hidden
                                placeholder="Verifica tu correo antes de enviar" value="{{$correo}}" name="email"
                                id="recipient-phone">
                        </div>
                        <div class="form-group">
                            <p>Género:</p>
                            <input type="radio" id="Masculino" value="Masculino" name="genero"><label
                                class="col-form-label">Masculino</label>
                            <input type="radio" id="Femenino" value="Femenino" name="genero"><label
                                class="col-form-label">Femenino</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Número Celular*:</label>
                            <input type="text" class="form-control" placeholder="Verifica los 10 digitos" pattern="[0-9]{10}" name="celular"
                                id="recipient-name" required="" maxlength="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Número de telefono fijo:</label>
                            <input type="text" class="form-control" pattern="[0-9]{10}" placeholder="Verifica los 10 digitos" name="telefono"
                                id="recipient-name" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Lugar de Procendencia*:</label>
                            <input type="text" class="form-control" placeholder="Tú Municipio" name="procedencia"
                                id="recipient-name" required="">
                        </div>
                        @endif
                        <input type="text" value="{{$area}}" name="area" hidden readonly>
                        <input type="date" value="{{$fecha}}" name="fecha" id="fecha" required readonly hidden>
                        @if($area == "Quiropractica")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                            <select required="" name="consultorio" id="consultorio" class="form-control">
                                <option selected disabled value="">Por favor seleccione una opción</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                        </div>
                        @if($nomdia != "Sabado")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected value="Seleccione una opción por favor">Seleccione una opción por favor
                                </option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                            </select>
                        </div>
                        @endif
                        @elseif($area == "Acupuntura")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                            <select required="" name="consultorio" id="consultorio" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        @if($nomdia != "Sabado")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                            </select>
                        </div>
                        @endif
                        @elseif($area == "Gerontología")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                            <select required="" name="consultorio" id="consultorio" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        @if($nomdia != "Sabado")
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                            <select required="" name="hora" id="hora" class="form-control">
                                <option selected disabled value="">Seleccione una opción por favor</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                            </select>
                        </div>
                        @endif
                        @elseif($area == "Ultrasonido")
                        <div class="form-group">
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                                <select required="" name="consultorio" id="consultorio" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                </select>
                            </div>
                            @elseif($area == "Rayos x")
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                                <select required="" name="consultorio" id="consultorio" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                </select>
                            </div>
                            @elseif($area == "Rehabilitación")
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                                <select required="" name="consultorio" id="consultorio" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            @if($nomdia != "Sabado")
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                </select>
                            </div>
                            @endif
                            @elseif($area == "Laboratorio")
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                                <select required="" name="consultorio" id="consultorio" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:15">08:15</option>
                                    <option value="08:30">08:30</option>
                                    <option value="08:45">08:45</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:15">09:15</option>
                                    <option value="09:30">09:30</option>
                                    <option value="09:45">09:45</option>
                                    <option value="10:00">10:00</option>
                                </select>
                            </div>
                            @elseif($area == "Cámara hiperbárica")
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                                <select required="" name="consultorio" id="consultorio" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
                                <select required="" name="hora" id="hora" class="form-control">
                                    <option selected disabled value="">Seleccione una opción por favor</option>
                                    <option value="08:30">08:30</option>
                                    <option value="10:10">10:10</option>
                                    <option value="11:50">11:40</option>
                                    <option value="13:30">13:10</option>
                                    <option value="15:10">15:40</option>
                                </select>
                                </select>
                            </div>
                            @endif
                            <input type="hidden" value="{{$_POST['area']}}" hidden class="area" readonly>
                            <input type="text" value="{{$curp}}" hidden name="curp" readonly>
                            <input type="submit" value="Agendar mi Cita" class="btn_apt">
                    </form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var a = $('.area').val();
        var normalize = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç", 
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }      
      return ret.join( '' );
  }
 
})();
//}
//console.log( normalize(area) );
var area = normalize(a);
        $('#fecha').on('change', function () {
            clear();
            fechas_ocupadas($(this).val(), $('#consultorio').val(),area);
        });

        $('#consultorio').on('change', function () {
            clear();
            fechas_ocupadas($('#fecha').val(), $(this).val(),area);
        });
        
        function clear() {
            $("#hora option").each(function () {
                if ($(this).val() != '') {
                    $(this).prop('disabled', false);
                }
            });
        }
        function fechas_ocupadas(fecha, consultorio, area) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('fechas_ocupadas')}}",
                dataType: "json",
                data: { val: 1 },
                success: function (data) {
                      
                    $.each(data, function (i, val) {
                        console.log(val.area,area);
                        if (val.fecha == fecha && val.consultorio == consultorio && val.area == area)
                            $('#hora option[value="' + val.hora + '"]').prop('disabled', true);
                    });
                }
            });

        }
    });
</script>
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