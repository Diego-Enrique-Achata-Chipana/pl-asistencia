<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsuarioExport implements Responsable, FromView, WithTitle, ShouldAutoSize
{
    use Exportable;

    public function view(): view
    {
        return view('usuarios.export.excel', [
            'usuarios' => User::select('nombre','apellido','email')
                            ->whereNotIn('id',[1])
                            ->orderby('id','asc')
                            ->get()
        ]);
    }
    
    public function title(): string
    {
        return 'Lista de empleados';
    }

}
