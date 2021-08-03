<html>
<head>
    <title>Modificar cita</title>
</head>
@if(empty(session('session_id')))
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=iniciarsesion/">
@else
@foreach ($citas as $cita)
<form action="{{route('salvar_cita')}}" method="POST">
    {{ csrf_field() }}
    <h3>Aquí puede modificar la cita de {{$cita->nombre}}</h3>
    <input type="text" value="{{$cita->id}}" name="id" readonly hidden>
    <label>Nombre: </label><input type="text" value="{{$cita->nombre}}" name="nombre" required><br><br>
    <label>Apellido paterno: </label><input type="text" value="{{$cita->apellido_paterno}}" name="apellidop"
        required><br><br>
    <label>Apellido materno: </label><input type="text" value="{{$cita->apellido_materno}}" name="apellidom"
        required><br><br>
    <label>Correo electrónico: </label><input type="mail" value="{{$cita->email}}" name="correo"><br><br>
    <input type="text" name="area" value="{{$cita->area}}" hidden readonly>
    <label>Estatus: </label><select name="estatus">
        <option>Activo</option>
        <option>Cancelada</option>
    </select><br><br>
    <label>Fecha: </label><input type="date" value="{{$cita->fecha}}" name="fecha" required><br><br>
    @if($area == "Quiropractica")
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
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
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br><br>
        @if($nomdia != "Sabado")
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="1">1</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
        </select><br><br>   
        @elseif($area == "Rayos x")
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="1">1</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
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
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="1">1</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="1">1</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
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
        </select><br><br>
        @endif
    <label>Folio: </label><input type="text" value="{{$cita->folio}}" name="folio" required readonly><br><br>
    <input type="submit" value="Guardar"> 
    <input type="button" onclick="location.href='/citasq';" value="Cancelar" />
</form>
@endforeach
@endif

</html>