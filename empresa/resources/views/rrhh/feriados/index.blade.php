@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-light text-secondary">Recursos Humanos > Calendario de Feriados</h3>
    <hr>
    
    <div class="table-responsive shadow-sm border rounded bg-white p-3">
        <table class="table table-hover table-sm align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Departamento</th>
                    <th>Recargo (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feriados as $f)
                <tr>
                    <td>{{ $f->id_feriado }}</td>
                    <td class="fw-bold">{{ $f->fecha }}</td>
                    <td>{{ $f->nombre }}</td>
                    <td><span class="badge bg-info text-dark">{{ $f->tipo }}</span></td>
                    <td>{{ $f->departamento ?? 'Nacional' }}</td>
                    <td class="text-end fw-bold text-danger">{{ number_format($f->recargo_pct, 2) }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection