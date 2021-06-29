<form action="{{route('horas')}}" method="POST">
    {{ csrf_field() }}
    <input type="date" required name="fecha">
    <select name="consul" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </select>
    <input type="submit" value="Enviar">
</form>