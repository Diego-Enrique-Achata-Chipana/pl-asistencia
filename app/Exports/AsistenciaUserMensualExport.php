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

class AsistenciaUserMensualExport implements Responsable, WithTitle, FromView, 
ShouldAutoSize
{
    use Exportable;

    public function forUser(string $user)
    {
        $this->user = $user;
        return $this;
    }

    public function view(): view
    {
        $fecha = Carbon::now()->ToDateString();
        $mensual = Carbon::now()->subdays('30')->ToDateString();
        return view('asistencias.ingreso-salida.export.excel.mensual',[
            'asistencias' => DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO, 
            T2.SALIDA, T1.USER
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso, 
            u.slug as user
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
            AND T1.user = '$this->user'
            AND T1.fecha BETWEEN '$mensual' AND '$fecha' 
            ORDER BY T2.aid DESC")
        ]);
    }

    public function title(): string
    {
        return 'Asistencia Mensual';
    }
}
