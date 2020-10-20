<div class="table-responsive" id="table-salida">
    <table class="table table-hover">
        <thead class="text-success">
            <tr>
                <th>Nombre:</th>
                <th>Apellido:</th>
                <th>Fecha:</th>
                <th>Hora:</th>
                <!-- <th></th> -->
                <!-- <th>Acciones:</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($asistencia_salida as $asis_sal)
            <tr>
                <td>{{$asis_sal->nombre}}</td>
                <td>{{$asis_sal->apellido}}</td>
                <td>{{ \Carbon\Carbon::parse($asis_sal->fecha)->format('d-m-Y')}}</td>
                <td>
                    @if($asis_sal->hora < '10:00:00')
                        0{{ \Carbon\Carbon::parse($asis_sal->hora)->format('g:i a')}}
                    @elseif($asis_sal->hora >= '13:00:00' && $asis_sal->hora < '22:00:00')
                        0{{ \Carbon\Carbon::parse($asis_sal->hora)->format('g:i a')}}
                    @else
                        {{ \Carbon\Carbon::parse($asis_sal->hora)->format('g:i a')}}
                    @endif
                </td>
                <!-- <td>
                @if($asis_sal->hora <= '08:00:00')
                    <span class="label label-success">temprano</span>
                @else
                    <span class="label label-danger">tarde</span>
                @endif
                </td> -->
                <!-- <td class="td-actions">
                    <div class="dropdown">
                            <button href="#pablo" class="dropdown-toggle btn btn-xs btn-round btn-dark btn-block" data-toggle="dropdown" aria-expanded="false">Exportar Excel
                                <b class="caret"></b>
                            <div class="ripple-container"></div></button>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li class="dropdown-header">Seleccionar</li>
                                <li class="divider"></li>
                                <li>
                                    <a href="asistencias/export/excel/{{$asis_sal->slug}}">Semanal</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#pablo">Mensual</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#pablo">Anual</a>
                                </li>
                            </ul>
                        </div> -->
                <!-- <a href="asistencias/export/excel/{{$asis_sal->slug}}" class="btn btn-danger btn-xs" target="_blank">Excel</a> -->
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
</div>