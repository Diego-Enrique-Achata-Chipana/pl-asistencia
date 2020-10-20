<table>
    <thead>
        <tr>
            <th>Nombre:</th>
            <th>Fecha:</th>
            <th>Ingreso:</th>
            <th>Salida:</th>
        </tr>
    </thead>
    <tbody>
    @foreach($asistencias as $asis)
        <tr>
            <td>{{$asis->Empleado}} {{$asis->Apellido}}</td>
            <td>{{ \Carbon\Carbon::parse($asis->Fecha)->format('d-m-Y')}}</td>
            <td>
                @if($asis->Ingreso < '10:00:00')
                    0{{ \Carbon\Carbon::parse($asis->Ingreso)->format('g:i a')}}
                @elseif($asis->Ingreso >= '13:00:00' && $asis->Ingreso < '22:00:00')
                    0{{ \Carbon\Carbon::parse($asis->Ingreso)->format('g:i a')}}
                @else
                    {{ \Carbon\Carbon::parse($asis->Ingreso)->format('g:i a')}}
                @endif    
            </td>
            <td>
                @if($asis->Salida < '10:00:00')
                    0{{ \Carbon\Carbon::parse($asis->Salida)->format('g:i a')}}
                @elseif($asis->Salida >= '13:00:00' && $asis->Salida < '22:00:00')
                    0{{ \Carbon\Carbon::parse($asis->Salida)->format('g:i a')}}
                @else
                    {{ \Carbon\Carbon::parse($asis->Salida)->format('g:i a')}}
                @endif
            </td>
            <td>
                @if($asis->Ingreso <= '08:00:00')
                    Temprano
                @else
                    Tarde
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>