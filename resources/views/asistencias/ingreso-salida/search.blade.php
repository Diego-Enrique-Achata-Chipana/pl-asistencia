@if(count($asistencias) > 0)
<div class="table-responsive" id="table-ingreso-salida-ajax">
    <table class="table table-hover">
        <thead class="text-success">
            <tr>
                <th>Nombre:</th>
                <th>Fecha:</th>
                <th>Ingreso:</th>
                <th>Salida</th>
                <th>Acciones:</th>
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
                <td class="td-actions">
                    <div class="dropdown">
                            <button href="#pablo" class="dropdown-toggle btn btn-xs btn-round btn-success btn-block" 
                            data-toggle="dropdown" aria-expanded="false">Exportar 
                                <b class="caret"></b>
                            <div class="ripple-container"></div></button>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li class="dropdown-header">Excel</li>
                                <li class="divider"></li>
                                <li>
                                    <a href="asistencias/export/excel/semanal/{{$asis->user}}">Semanal</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="asistencias/export/excel/quincenal/{{$asis->user}}">Quincenal</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="asistencias/export/excel/mensual/{{$asis->user}}">Mensual</a>
                                </li>
                            </ul>
                        </div>
                <!-- <a href="asistencias/export/excel/{{$asis->Empleado}}" class="btn btn-danger btn-xs" target="_blank">Excel</a> -->
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
</div>
@else
<div class="tim-tipo" id="search-ingreso-salida"> 
    <p>No se registro la asistencia de <b>{{$nombre}} {{$apellido}}</b> el <b> {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y')}}</b></p>
</div>
@endif