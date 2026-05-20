@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Control Maestro de Proyectos</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle">
            <thead class="table-secondary">
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre Proyecto</th>
                    <th>Ubicación</th>
                    <th>Sup. Terreno</th>
                    <th>Sup. Construida</th>
                    <th>Presupuesto</th>
                    <th>Avance %</th>
                    <th>Inicio</th>
                    <th>Fin Est.</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($proyectos as $p)
                <tr>
                    <td>{{ $p->id_proyecto }}</td>
                    <td><code>{{ $p->codigo_proyecto }}</code></td>
                    <td class="fw-bold">{{ $p->nombre_proyecto }}</td>
                    <td>{{ $p->ubicacion }}</td>
                    <td>{{ number_format($p->superficie_terreno, 2) }}</td>
                    <td>{{ number_format($p->superficie_construida, 2) }}</td>
                    <td>{{ number_format($p->presupuesto_estimado, 2) }}</td>
                    <td>{{ $p->porcentaje_avance }}%</td>
                    <td>{{ $p->fecha_inicio_programada }}</td>
                    <td>{{ $p->fecha_fin_programada }}</td>
                    <td>{{ $p->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection