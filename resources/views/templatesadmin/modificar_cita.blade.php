@extends('layouts.header')
<meta name="_token" content="{{csrf_token()}}">
@section('body')
@if(empty(session('session_id')))
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
@foreach ($citas as $cita)
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
            <h3 class="title">Modificar cita</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <div class="d-flex">
            <div class="appoint-img">

            </div>
            <div class="contact-right-w3l appoint-form">
                <h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con los datos a modificar
                </h5>
                <form action="{{route('salvar_cita')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Yair" name="nombre"
                            id="recipient-name" value="{{$cita->nombre}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Arzate" name="apellidop"
                            id="recipient-name" value="{{$cita->apellido_paterno}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno*:</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Mendoza" name="apellidom"
                            id="recipient-name" value="{{$cita->apellido_materno}}" required="">
                    </div>
                    @if($cita->email == "N/A")
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Correo electronico*:</label>
                        <input type="text" class="form-control" placeholder="Verifica tu correo antes de enviar"
                            name="correo" id="recipient-phone" value="{{$cita->email}}" required="">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="recipient-phone" class="col-form-label">Correo electronico*:</label>
                        <input type="email" class="form-control" placeholder="Verifica tu correo antes de enviar"
                            name="correo" id="recipient-phone" value="{{$cita->email}}" required="">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Estatus de la cita</label>
                        <select required="" class="form-control" name="estatus">
                            @if($cita->estatus == "Activo")
                            <option selected>Activo</option>
                            <option>Cancelado</option>
                            @else($cita->estatus == "Cancelado")
                            <option>Activo</option>
                            <option selected>Cancelado</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Ingrese la fecha de su cita*:</label>
                        <input placeholder="Fecha" class="date form-control" id="fecha" type="date" name="fecha"
                            value="{{$cita->fecha}}" required="" />
                    </div>
                    <div class="form-group">
                        @if($area == "Quiropractica")
                        <label for="datepicker" class="col-form-label">Selecciona tu Consultorio</label>
                        <select required="" name="consultorio" id="consultorio" class="form-control">
                            <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
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
                            <option selected  value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                            <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                        <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
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
                    <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                    <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
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
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
            <select required="" name="hora" id="hora" class="form-control">
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
            <select required="" name="hora" id="hora" class="form-control">
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
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
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
            <select required="" name="hora" id="hora" class="form-control">
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
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
                <option selected value="{{$cita->consultorio}}">{{$cita->consultorio}}</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="datepicker" class="col-form-label">Seleccione la hora para su cita</label>
            <select required="" name="hora" id="hora" class="form-control">
                <option selected value="{{$cita->hora}}">{{$cita->hora}}</option>
                <option value="08:30">08:30</option>
                <option value="10:10">10:10</option>
                <option value="11:50">11:40</option>
                <option value="13:30">13:10</option>
                <option value="15:10">15:40</option>
            </select>
            </select>
        </div>
        @endif
        <div class="form-group">
            <input type="text" name="area" value="{{$cita->area}}" hidden readonly>
        </div>
        <div class="form-group">
            <input type="text" name="folio" value="{{$cita->folio}}" hidden readonly>
        </div>
        <div class="form-group">
            <input type="text" name="id" value="{{$cita->id}}" hidden readonly>
        </div>
        <input type="submit" value="Guardar datos" class="btn_apt">
        </form>
    </div>
    <div class="clerafix"></div>
</div>
</div>
</div>
@endforeach
@endif
<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('#fecha').on('change', function () {
        clear();
        fechas_ocupadas($(this).val(), $('#consultorio').val());
    });

    $('#consultorio').on('change', function () {
        clear();
        fechas_ocupadas($('#fecha').val(), $(this).val());
    });
    function clear() {
        $("#hora option").each(function () {
            if ($(this).val() != '') {
                $(this).prop('disabled', false);
            }
        });
    }
    function fechas_ocupadas(fecha, consultorio) {

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
                    if (val.fecha == fecha && val.consultorio == consultorio)
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