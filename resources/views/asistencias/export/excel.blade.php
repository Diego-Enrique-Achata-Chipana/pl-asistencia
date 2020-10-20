<table>
    <thead>
        <tr>
            <th>Nombre:</th>
            <th>Fecha:</th>
            <th>Hora:</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($asistencia_entrada as $asis_ent)
        <tr>
            <td>{{$asis_ent->nombre}} {{$asis_ent->apellido}}</td>
            <td>{{$asis_ent->fecha}}</td>
            <td>{{$asis_ent->hora}}</td>
            <td>
            @if($asis_ent->hora <= '08:00:00')
                <span>temprano</span>
            @else
                <span>tarde</span>
            @endif
            </td>
        </tr>
        @endforeach    
    </tbody>
</table>