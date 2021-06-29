@foreach ($horas as $hora)
    <select name="" >  
    @if($hora->hora != "10:00")
    <option>10:00</option>
    @elseif($hora->hora != "11:00")
    <option>11:00</option>
    @elseif($hora->hora != "12:00")
    <option>12:00</option>
    @elseif($hora->hora != "13:00")
    <option>13</option>
    @endif
    </select>
@endforeach