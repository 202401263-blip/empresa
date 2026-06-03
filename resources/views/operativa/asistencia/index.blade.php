@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Reporte Diario de Asistencia y Costos</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle">
            <thead class="table-secondary">
                <tr class="text-nowrap">
                    <th>ID</th>
                   
                    <th>Proyecto</th>
                    <th>Fecha Trabajo</th>
                    <th>H. Normales</th>
                    <th>H. Extra (D)</th>
                    <th>H. Extra (N)</th>
                    <th>Monto Día</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($registros as $r)
                <tr>
                    <td>{{ $r->id_registro }}</td>
                    
                    <td>{{ $r->proyecto->nombre_proyecto ?? 'N/A' }}</td>
                    <td>{{ $r->fecha_trabajo }}</td>
                    <td>{{ $r->horas_normales }}</td>
                    <td>{{ $r->horas_extra_diurnas }}</td>
                    <td>{{ $r->horas_extra_nocturnas }}</td>
                    <td class="fw-bold">{{ number_format($r->monto_total_dia, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection