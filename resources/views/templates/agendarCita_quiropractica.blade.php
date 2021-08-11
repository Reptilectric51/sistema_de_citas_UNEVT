@extends('layouts.header')
<meta name="_token" content="{{csrf_token()}}">
@section('body')
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
                <i class="fas fa-user-md"></i>
            </span>
            <p class="mt-2" style="color:darkred;">Los datos recabados por su persona, serán manejados en estricta
                confidencialidad, conforme al artículo 40 de la Ley de Protección de Datos Personales en Posesión de
                Sujetos Obligados del Estado de México y Municipios.</p>
        </div>
        <div class="d-flex">
            <div class="appoint-img">
            </div>
        @if(empty(session('session_id')))
        <form action="{{route('guardarcitaq')}}" method="POST">
            @else
            <form action="{{route('guardarcitaqadmin')}}" method="POST">
                @endif
                {{ csrf_field() }}
                @if($existe == "")
                <div class="contact-right-w3l appoint-form">
                    <h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con tus datos para
                        agendar tú cita</h5>
                    @foreach($paciente as $pacien)
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label>
                        <input class="form-control" type="text" name="nombre" placeholder="ej: Kirby"
                            value="{{$pacien->nombre}}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido paterno*:</label>
                        <input class="form-control" type="text" name="apellidop" value="{{$pacien->apellido_paterno}}"
                            placeholder="ej: Martinez" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido materno*:</label>
                        <input class="form-control" type="text" name="apellidom" value="{{$pacien->apellido_materno}}"
                            placeholder="ej: Hernandez" required>
                    </div>
                    <p>Por favor seleccione un genero</p>
                    @if($pacien->genero == "MASCULINO")
                    <input type="radio" id="Masculino" value="Masculino" checked name="genero">
                    <label>Masculino</label>
                    <input type="radio" id="Femenino" value="Femenino" name="genero">
                    <label>Femenino</label>
                    @elseif($pacien->genero == "FEMENINO")
                    <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label>Masculino</label>
                    <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label>
                    @else
                    <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>
                    <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label>
                    @endif
                    @if($pacien->email == "")
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
                        <label for="recipient-name" class="col-form-label">Número celular*:</label>
                        <input class="form-control" type="text" name="celular" pattern="[0-9]{10}"
                            value="{{$pacien->numero_movil}}" placeholder="Número de telefono a 10 digitos"
                            maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Número de telefono fijo:</label>
                        <input class="form-control" type="text" name="telefono" pattern="[0-9]{10}"
                            value="{{$pacien->numero_fijo}}" placeholder="Número de telefono fijo a 10 digitos"
                            maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lugar de procedencia*:</label>
                        <input class="form-control" type="text" name="procedencia" placeholder="ej: Ocoyoacac"
                            value="{{$pacien->lugar_de_procedencia}}">
                    </div>
                    <input type="text" value="{{$area}}" name="area" hidden readonly>
                    <input type="date" value="{{$fecha}}" name="fecha" id="fecha" required readonly hidden>
                    @if($area == "Quiropractica")
                    <label for="recipient-name">Consultorio*:</label><select class="form-control" id="consultorio"
                        name="consultorio">
                        <option selected disabled value="">Elije una opción</option>
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
                    @if($nomdia != "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
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
                    @elseif($nomdia == "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                    </select>
                    @endif
                    @elseif($area == "Acupuntura")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción</option>
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
                    @if($nomdia != "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
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
                    @elseif($nomdia == "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                    </select>
                    @endif
                    @elseif($area == "Gerontología")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    @if($nomdia != "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
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
                    @elseif($nomdia == "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                    </select>
                    @endif
                    @elseif($area == "Ultrasonido")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="1">1</option>
                    </select>
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                    </select><br><br>
                    @elseif($area == "Rayos x")
                    <label> for="recipient-name" class="col-form-label"Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="1">1</option>
                    </select><br><br>
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
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
                    </select><br><br>
                    @elseif($area == "Rehabilitación")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción</option>
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
                    </select><br><br>
                    @if($nomdia != "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                    </select><br><br>
                    @elseif($nomdia == "Sabado")
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                    </select><br><br>
                    @endif
                    @elseif($area == "Laboratorio")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="1">1</option>
                    </select><br><br>
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:00">08:00</option>
                        <option value="08:15">08:15</option>
                        <option value="08:30">08:30</option>
                        <option value="08:45">08:45</option>
                        <option value="09:00">09:00</option>
                        <option value="09:15">09:15</option>
                        <option value="09:30">09:30</option>
                        <option value="09:45">09:45</option>
                        <option value="10:00">10:00</option>
                    </select><br><br>
                    @elseif($area == "Cámara hiperbárica")
                    <label for="recipient-name" class="col-form-label">Consultorio*:</label><select class="form-control"
                        id="consultorio" name="consultorio">
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="1">1</option>
                    </select><br><br>
                    <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                        id="hora" name="hora" required>
                        <option selected disabled value="">Elije una opción por favor</option>
                        <option value="08:30">08:30</option>
                        <option value="09:30">09:30</option>
                        <option value="10:10">10:10</option>
                        <option value="11:10">11:10</option>
                        <option value="11:50">11:50</option>
                        <option value="12:50">12:50</option>
                        <option value="13:30">13:30</option>
                        <option value="14:30">14:30</option>
                        <option value="15:10">15:10</option>
                    </select>
                    @endif
                    @endforeach
                    @endif
                    @if($existe != "")
                    <div class="contact-right-w3l appoint-form">
                        <h5 class="title-w3 text-center mb-5">Por favor llena el siguiente formulario con tus datos para
                            agendar tú cita</h5>
                        <label for="recipient-name" class="col-form-label">Nombre(s)*:</label><input
                            class="form-control" type="text" name="nombre" placeholder="ej: Kirby" required>
                        <label for="recipient-name" class="col-form-label">Apellido paterno*:</label><input
                            class="form-control" type="text" name="apellidop" placeholder="ej: Martinez"
                            required>
                        <label for="recipient-name" class="col-form-label">Apellido materno*:</label><input
                            class="form-control" type="text" name="apellidom" placeholder="ej: Hernandez"
                            required>
                        <p>Por favor seleccione un genero</p>
                        <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>
                        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label>
                        @if($correo != "")
                        <input class="form-control" type="mail" name="correo" hidden placeholder="ej mail@mail.com" value="{{$correo}}">
                        @else
                        <input class="form-control" hidden type="mail" name="correo" placeholder="ej mail@mail.com">
                        @endif
                        <label for="recipient-name" class="col-form-label">Número celular*:</label><input
                            class="form-control" type="text" name="celular" pattern="[0-9]{10}"
                            placeholder="Número de telefono a 10 digitos" maxlength="10" required>
                        <label for="recipient-name" class="col-form-label">Número de telefono fijo:</label><input
                            class="form-control" type="text" name="telefono" pattern="[0-9]{10}"
                            placeholder="Número de telefono fijo a 10 digitos" maxlength="10">
                        <label>Lugar de procedencia*:</label><input class="form-control" type="text" name="procedencia"
                            placeholder="ej: Ocoyoacac">
                        <input class="form-control" type="text" value="{{$area}}" name="area" hidden readonly>
                        <label for="recipient-name" class="col-form-label">Ingrese la fecha de su cita*:</label><input
                            class="form-control" type="date" value="{{$fecha}}" name="fecha" id="fecha"
                            required>
                        @if($area == "Quiropractica")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción</option>
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
                        </select><br><br>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                        </select><br><br>
                        @elseif($area == "Acupuntura")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select><br><br>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:30">08:30</option>
                            <option value="09:30">09:30</option>
                            <option value="10:30">10:30</option>
                            <option value="11:30">11:30</option>
                            <option value="12:30">12:30</option>
                            <option value="13:30">13:30</option>
                            <option value="14:30">14:30</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                        </select><br><br>
                        @elseif($area == "Gerontología")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select><br><br>
                        @if($nomdia != "Sabado")
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                        </select><br><br>
                        @elseif($nomdia == "Sabado")
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                        </select><br><br>
                        @endif
                        @elseif($area == "Ultrasonido")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="1">1</option>
                        </select><br><br>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                        </select><br><br>
                        @elseif($area == "Rayos x")
                        <label>Consultorio*:</label><select class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="1">1</option>
                        </select><br><br>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
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
                        </select><br><br>
                        @elseif($area == "Rehabilitación")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción</option>
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
                        </select><br><br>
                        @if($nomdia != "Sabado")
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                        </select><br><br>
                        @elseif($nomdia == "Sabado")
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                        </select><br><br>
                        @endif
                        @elseif($area == "Laboratorio")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="1">1</option>
                        </select><br><br>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
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
                        @elseif($area == "Cámara hiperbárica")
                        <label for="recipient-name" class="col-form-label">Consultorio*:</label><select
                            class="form-control" id="consultorio" name="consultorio">
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="1">1</option>
                        </select>
                        <label for="recipient-name" class="col-form-label">Hora*:</label><select class="form-control"
                            id="hora" name="hora" required>
                            <option selected disabled value="">Elije una opción por favor</option>
                            <option value="08:30">08:30</option>
                            <option value="09:30">09:30</option>
                            <option value="10:10">10:10</option>
                            <option value="11:10">11:10</option>
                            <option value="11:50">11:50</option>
                            <option value="12:50">12:50</option>
                            <option value="13:30">13:30</option>
                            <option value="14:30">14:30</option>
                            <option value="15:10">15:10</option>
                        </select>
                        @endif
                        @endif
                        <input type="text" value="{{$curp}}" hidden name="curp" readonly>
                        <input type="submit" value="Agendar cita"> <input type="reset" value="Reiniciar formulario">
            </form>
        </div>
    </div>
</div>
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