@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Registro de Incidencias y Paralizaciones</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle">
            <thead class="table-secondary">
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Proyecto</th>
                    <th>Motivo Paralización</th>
                    <th>Inicio Paralización</th>
                    <th>Fin Paralización</th>
                    <th>Responsable Reporte</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($paralizaciones as $p)
                <tr>
                    <td>{{ $p->id_paralizacion }}</td>
                    <td>{{ $p->proyecto->nombre_proyecto ?? 'N/A' }}</td>
                    <td>{{ $p->motivo }}</td>
                    <td>{{ $p->fecha_inicio_par }}</td>
                    <td>{{ $p->fecha_fin_par ?? 'EN CURSO' }}</td>
                    <td>{{ $p->responsable_reporte }}</td>
                    <td>{{ $p->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection