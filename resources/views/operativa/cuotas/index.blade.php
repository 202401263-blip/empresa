@extends('layouts.app')
@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-light text-secondary mb-0">Gestión Operativa &rsaquo; Cuotas de Pago</h3>
        <a href="{{ route('operativa.cuotas.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Nueva Cuota</a>
    </div>
    <div class="alert alert-info py-2 small">
        <i class="fas fa-bolt me-1"></i>
        Datos consumidos desde la vista SQL Server <code>empresa_constructora5.v_estado_cuotas</code> con evaluación dinámica.
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle table-interactive">
            <thead class="table-secondary text-nowrap">
                <tr><th>ID</th><th>Contrato / Cliente</th><th>Nro.</th><th>Monto</th><th>Vencimiento</th><th>Días retraso</th><th>Estado dinámico</th><th>Pago</th><th>Acciones</th></tr>
            </thead>
            <tbody class="small">
            @forelse($cuotas as $c)
                @php
                    $estado = strtolower((string) ($c['evaluacion_dinamica'] ?? $c['estado_cuota'] ?? 'pendiente'));
                    $badge = str_contains($estado, 'pagad') ? 'success' : (str_contains($estado, 'venc') ? 'danger' : 'warning');
                    $diasRetraso = (int) ($c['dias_retraso'] ?? 0);
                @endphp
                <tr>
                    <td>{{ $c['id_cuota'] ?? '—' }}</td>
                    <td>
                        <div><code>{{ $c['numero_contrato'] ?? '—' }}</code></div>
                        <div class="text-muted">{{ $c['nombre_razon'] ?? $c['cliente'] ?? '—' }}</div>
                    </td>
                    <td class="text-center">{{ $c['numero_cuota'] ?? '—' }}</td>
                    <td class="text-end">{{ number_format((float) ($c['monto_cuota'] ?? 0), 2) }}</td>
                    <td>{{ $c['fecha_vencimiento'] ?? '—' }}</td>
                    <td>
                        @if($diasRetraso > 0)
                            <span class="badge bg-danger">{{ $diasRetraso }} días</span>
                        @else
                            <span class="text-muted">0</span>
                        @endif
                    </td>
                    <td><span class="badge bg-{{ $badge }}">{{ $c['evaluacion_dinamica'] ?? $c['estado_cuota'] ?? 'Pendiente' }}</span></td>
                    <td class="text-end">{{ isset($c['monto_pagado']) ? number_format((float) $c['monto_pagado'], 2) : '—' }}</td>
                    <td>
                        <form action="{{ route('operativa.cuotas.registrar_pago', $c['id_cuota']) }}" method="POST" class="d-inline-flex align-items-center gap-1">
                            @csrf
                            <input type="date" class="form-control form-control-sm" name="fecha_pago_real" required>
                            <input type="number" step="0.01" min="0" class="form-control form-control-sm" name="monto_pagado" placeholder="Monto" required>
                            <button class="btn btn-sm btn-outline-success interactive-btn">Registrar Pago</button>
                        </form>
                        <form action="{{ route('operativa.cuotas.reanudar_obra', $c['id_cuota']) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary interactive-btn">Reanudar Obra</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center text-muted">Sin cuotas registradas.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
