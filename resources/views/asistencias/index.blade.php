@extends('layouts.admin')
@section('titulo')
Asistencias 
@endsection
@section('contenido')
<div class="card">
    <div class="card-header card-header-icon" data-background-color="default">
        <i class="material-icons">chrome_reader_mode</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">Asistencias</h4>
        <div class="table-responsive table-hover table-condensed">
            <table class="table">
                <thead class="text-primary">
                    <tr>
                        <th>Nombre:</th>
                        <th>Fecha:</th>
                        <th>Hora:</th>
                        <th>Acciones:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection