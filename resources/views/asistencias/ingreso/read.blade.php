<div class="table-responsive" id="table-ingreso">
    <table class="table table-hover">
        <thead class="text-success">
            <tr>
                <th>Nombre:</th>
                <th>Apellido:</th>
                <th>Fecha:</th>
                <th>Hora:</th>
                <th></th>
                <!-- <th>Acciones:</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($asistencia_ingreso as $asis_ing)
            <tr>
                <td>{{$asis_ing->nombre}}</td>
                <td>{{$asis_ing->apellido}}</td>
                <td>{{ \Carbon\Carbon::parse($asis_ing->fecha)->format('d-m-Y')}}</td>
                <td>
                    @if($asis_ing->hora < '10:00:00')
                        0{{ \Carbon\Carbon::parse($asis_ing->hora)->format('g:i a')}}
                    @elseif($asis_ing->hora >= '13:00:00' && $asis_ing->hora < '22:00:00')
                        0{{ \Carbon\Carbon::parse($asis_ing->hora)->format('g:i a')}}
                    @else
                        {{ \Carbon\Carbon::parse($asis_ing->hora)->format('g:i a')}}
                    @endif
                </td>
                <td>
                @if($asis_ing->hora <= '08:00:00')
                    <span class="label label-success">temprano</span>
                @else
                    <span class="label label-danger">tarde</span>
                @endif
                </td>
                <!-- <td class="td-actions">
                    <div class="dropdown">
                            <button href="#pablo" class="dropdown-toggle btn btn-xs btn-round btn-default btn-block" data-toggle="dropdown" aria-expanded="false">Exportar Excel
                                <b class="caret"></b>
                            <div class="ripple-container"></div></button>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li class="dropdown-header">Seleccionar</li>
                                <li class="divider"></li>
                                <li>
                                    <a href="asistencias/export/excel/{{$asis_ing->slug}}">hace una semana</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#pablo">hace un mes</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#pablo">hace un año</a>
                                </li>
                            </ul>
                        </div> -->
                <!-- <a href="asistencias/export/excel/{{$asis_ing->slug}}" class="btn btn-danger btn-xs" target="_blank">Excel</a> -->
                <!-- </td> -->
            </tr>
        @endforeach    
        </tbody>
    </table>
</div>