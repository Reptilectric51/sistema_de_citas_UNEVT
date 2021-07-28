    @extends('layouts.header')
    <meta name="_token" content="{{csrf_token()}}">
    @section('body')
    @if(empty(session('session_id')))
    <h1>Por favor llena el siguiente formulario con tus datos para agendar la cita en el área de quiropractica</h1>
    <form action="{{route('guardarcitaq')}}" method="POST">
        @else
        <form action="{{route('guardarcitaqadmin')}}" method="POST">
            @endif
        {{ csrf_field() }}
        @if($existe == "")
        @foreach($paciente as $pacien)
        <label>Nombre(s)*:</label><input type="text" name="nombre" placeholder="ej: Kirby" value="{{$pacien->nombre}}" required><br><br>
        <label>Apellido paterno*:</label><input type="text" name="apellidop" value="{{$pacien->apellido_paterno}}" placeholder="ej: Martinez"
            required><br><br>
        <label>Apellido materno*:</label><input type="text" name="apellidom" value="{{$pacien->apellido_materno}}" placeholder="ej: Hernandez"
            required><br><br>
        <p>Por favor seleccione un genero</p>
        @if($pacien->genero == "MASCULINO")
        <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
        @elseif($pacien->genero == "FEMENINO")
        <input type="radio" id="Masculino" value="Masculino" checked name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
        @else
        <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
        @endif
        @if($pacien->email == "")
        <label>Correo electronico*:</label><input type="mail" name="correo" placeholder="ej mail@mail.com" value="{{$correo}}"
            ><br><br>
        @else
        <label>Correo electronico*:</label><input type="mail" name="correo" placeholder="ej mail@mail.com" value="{{$pacien->email}}"
            ><br><br>
        @endif
        <label>Número celular*:</label><input type="tel" name="celular" pattern="[0-9]{10}" value="{{$pacien->numero_movil}}" 
            placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
        <label>Número de telefono fijo:</label><input type="tel" name="telefono" pattern="[0-9]{10}" value="{{$pacien->numero_fijo}}"
            placeholder="Número de telefono fijo a 10 digitos" maxlength="10"><br><br>
        <label>Lugar de procedencia*:</label><input type="text" name="procedencia" placeholder="ej: Ocoyoacac" value="{{$pacien->lugar_de_procedencia}}"><br><br>
        <input type="text" value="{{$area}}" name="area" hidden readonly>
        <label>Ingrese la fecha de su cita*:</label><input type="date" name="fecha" id="fecha" required><br><br>
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
            <option value="7">7</option>
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
        @elseif($area == "Imagenología")   
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción</option>
            <option value="1">Rayos X</option>
            <option value="2">Ultrasonido</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="08:30">08:00</option>
            <option value="09:30">09:00</option>
            <option value="10:30">10:00</option>
            <option value="11:30">11:00</option>
            <option value="12:30">12:00</option>
            <option value="13:30">13:00</option>
            <option value="14:30">14:00</option>
            <option value="15:30">15:00</option>
            <option value="16:00">16:00</option>
        </select><br><br>     
        @endif
        @endforeach
        @endif
        @if($existe != "")
        <label>Nombre(s)*:</label><input type="text" name="nombre" placeholder="ej: Kirby" required><br><br>
        <label>Apellido paterno*:</label><input type="text" name="apellidop" placeholder="ej: Martinez"
            required><br><br>
        <label>Apellido materno*:</label><input type="text" name="apellidom"  placeholder="ej: Hernandez"
            required><br><br>
        <p>Por favor seleccione un genero</p>
        <input type="radio" id="Masculino" value="Masculino" name="genero"><label>Masculino</label>    
        <input type="radio" id="Femenino" value="Femenino" name="genero"><label>Femenino</label> <br><br>
        @if($correo != "")
        <label>Correo electronico*:</label><input type="mail" name="correo" placeholder="ej mail@mail.com" value="{{$correo}}"
            ><br><br>
        @else
        <label>Correo electronico*:</label><input type="mail" name="correo" placeholder="ej mail@mail.com"
            ><br><br>
        @endif    
        <label>Número celular*:</label><input type="tel" name="celular" pattern="[0-9]{10}"
            placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
        <label>Número de telefono fijo:</label><input type="tel" name="telefono" pattern="[0-9]{10}" 
            placeholder="Número de telefono fijo a 10 digitos" maxlength="10"><br><br>
        <label>Lugar de procedencia*:</label><input type="text" name="procedencia" placeholder="ej: Ocoyoacac"><br><br>
        <input type="text" value="{{$area}}" name="area" hidden readonly>
        <label>Ingrese la fecha de su cita*:</label><input type="date" name="fecha" id="fecha" required><br><br>
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
            <option value="7">7</option>
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
        @elseif($area == "Imagenología")   
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción</option>
            <option value="1">Rayos X</option>
            <option value="2">Ultrasonido</option>
        </select><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="08:30">08:00</option>
            <option value="09:30">09:00</option>
            <option value="10:30">10:00</option>
            <option value="11:30">11:00</option>
            <option value="12:30">12:00</option>
            <option value="13:30">13:00</option>
            <option value="14:30">14:00</option>
            <option value="15:30">15:00</option>
            <option value="16:00">16:00</option>
        </select><br><br>          
        @endif
        @endif
        <input type="text" value="{{$curp}}" hidden name="curp" readonly >
        <input type="submit" value="Agendar cita"> <input type="reset" value="Reiniciar formulario">
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(document).ready( function() {
$('#fecha').on('change', function() {
    clear();
    fechas_ocupadas($(this).val(),$('#consultorio').val());
});

$('#consultorio').on('change', function() {
    clear();
    fechas_ocupadas($('#fecha').val(),$(this).val());
});
function clear() {
    $("#hora option").each(function (){
        if($(this).val()!=''){
    $(this).prop('disabled', false);
        }
    });
}
function fechas_ocupadas(fecha,consultorio) {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{route('fechas_ocupadas')}}",
            dataType:"json",
            data: { val: 1 },
            success: function (data) {
                $.each(data, function(i, val) {
                    if(val.fecha==fecha && val.consultorio==consultorio)
                 $('#hora option[value="'+val.hora+'"]').prop('disabled', true);
              });  
            }
        });
    
    }
});
</script>