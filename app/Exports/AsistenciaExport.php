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
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AsistenciaExport implements Responsable, WithTitle, FromView, 
ShouldAutoSize
{
    use Exportable;

    public function forUser(string $user)
    {
        $this->user = $user;
        return $this;
    }

    public function hoy()
    {
        $fecha = Carbon::now();
        $fecha = $fecha->toDateString();
        return $fecha;
    }

    public function unaSemana()
    {
        $fecha = Carbon::now()->subdays('6');
        $fecha = $fecha->toDateString();
        return $fecha;
    }

    public function view(): view
    {
        return view('asistencias.export.excel',[
            'asistencia_entrada' => DB::table('asistencias as a')
            ->join('users as u','a.user_id','=','u.id')
            ->select('u.id as uid','u.nombre as nombre','u.apellido as apellido','a.fecha as fecha','a.hora as hora')
            ->where('a.turno','=','1')
            ->where('u.slug','=',$this->user)
            ->wherebetween('a.fecha',[$this->unaSemana(),$this->hoy()])
            ->orderby('a.id','desc')
            ->get()
        ]);
    }

    public function title(): string
    {
        return 'Reporte de asistencia semanal';
    }
}
