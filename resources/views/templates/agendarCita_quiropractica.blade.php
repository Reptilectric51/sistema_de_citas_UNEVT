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
        <label>Nombre(s)*:</label><input type="text" name="nombre" placeholder="ej: Kirby" required><br><br>
        <label>Apellido paterno*:</label><input type="text" name="apellidop" placeholder="ej: Martinez"
            required><br><br>
        <label>Apellido materno*:</label><input type="text" name="apellidom" placeholder="ej: Hernandez"
            required><br><br>
        <label>Correo electronico*:</label><input type="mail" name="correo" placeholder="ej mail@mail.com"
            ><br><br>
        <label>Número celular*:</label><input type="tel" name="celular" pattern="[0-9]{10}"
            placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
        <label>Número de telefono fijo:</label><input type="tel" name="telefono" pattern="[0-9]{10}"
            placeholder="Número de telefono fijo a 10 digitos" maxlength="10"><br><br>
        <label>Lugar de procedencia*:</label><input type="text" name="procedencia" placeholder="ej: Ocoyoacac"><br><br>
        <label>Consultorio*:</label><select id="consultorio" name="consultorio">
            <option selected disabled value="">Elije una opción</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br><br>
        <label>Ingrese la fecha de su cita*:</label><input type="date" name="fecha" id="fecha" required><br><br>
        <label>Hora*:</label><select id="hora" name="hora" required>
            <option selected disabled value="">Elije una opción por favor</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
        </select><br><br>
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
            url: '{{route('fechas_ocupadas')}}',
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