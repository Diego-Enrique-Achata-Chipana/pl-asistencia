<?php

namespace App\Exports;

use App\Asistencia;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AsistenciaQuincenalExport implements Responsable, WithTitle, FromView, 
ShouldAutoSize
{
    use Exportable;

    public function view(): view
    {
        $fecha = Carbon::now()->ToDateString();
        $quincenal = Carbon::now()->subdays('15')->ToDateString();

        return view('asistencias.ingreso-salida.export.excel.quincenal',[
            'asistencias' => DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso 
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 1
            )
            T1
            INNER JOIN
            (
            SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 2	
            )T2 ON T1.empleado = T2.empleado 
            WHERE T1.fecha = T2.fecha 
            AND T1.fecha BETWEEN '$quincenal' AND '$fecha' 
            ORDER BY T2.aid DESC")
        ]);
    }

    public function title(): string
    {
        return 'Reporte de asistencia quincenal';
    }
    
}
