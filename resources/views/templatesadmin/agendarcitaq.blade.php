<!DOCTYPE html>
<html>

<head>
    <title>Agendar cita quiropractica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">UNEVT</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Citas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Buscar mi cita</a></li>
                            <!-- <li><a href="#">Agendar cita</a></li>-->
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="iniciarsesion/"><span class="glyphicon glyphicon-log-in"></span> Soy un
                            administrador</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Por favor llena el siguiente formulario con tus datos para agendar la cita en el área de quiropractica</h1>
    <form action="{{route('guardarcitaqadmin')}}" method="POST">
        {{ csrf_field() }}
        <label>Nombre(s)*:</label><input type="text" name="nombre" placeholder="ej: Kirby" required><br><br>
        <label>Apellido paterno*:</label><input type="text" name="apellidop" placeholder="ej: Martinez"
            required><br><br>
        <label>Apellido materno*:</label><input type="text" name="apellidom" placeholder="ej: Hernandez"
            required><br><br>
        <label>Correo electronico*:</label><input type="text" name="correo" placeholder="ej mail@mail.com"
            required><br><br>
        <label>Número celular*:</label><input type="tel" name="celular" pattern="[0-9]{10}"
            placeholder="Número de telefono a 10 digitos" maxlength="10" required><br><br>
        <label>Número de telefono fijo:</label><input type="tel" name="telefono" pattern="[0-9]{10}"
            placeholder="Número de telefono fijo a 10 digitos" maxlength="10"><br><br>
        <label>Lugar de procedencia*:</label><input type="text" name="procedencia" placeholder="ej: Ocoyoacac"><br><br>
        <label>Consultorio*:</label><select name="consultorio" required>
            <option selected value="">Elije una opción</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br><br>
        <label>Ingrese la fecha de su cita*:</label><input type="date" name="fecha" required><br><br>
        <label>Hora*:</label><select name="hora" required>
            <option selected value="">Elije una opción por favor</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
        </select><br><br>
        <input type="submit" value="Agendar cita"> <input type="reset" value="Reiniciar formulario">
    </form>
</body>

</html>