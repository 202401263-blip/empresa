@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4">
        <div>
            <h1 class="h2 mb-1">Panel de Control</h1>
            <p class="text-muted mb-0 small">Bienvenido, {{ auth()->user()->nombreParaMostrar() }} — Rol: <span class="text-capitalize">{{ auth()->user()->rolNormalizado() }}</span></p>
        </div>
        <span class="badge bg-dark">SQL Server</span>
    </div>

    <div class="row g-3">
        @canAccess('cliente')
        <div class="col-md-3">
            <div class="card stat-card bg-primary text-white mb-2 shadow interactive-card">
                <div class="card-body text-center py-4">
                    <h6 class="opacity-75">Total Clientes</h6>
                    <h2 class="fw-bold mb-0">{{ $totalClientes ?? 0 }}</h2>
                </div>
            </div>
        </div>
        @endcanAccess

        @canAccess('proyecto')
        <div class="col-md-3">
            <div class="card stat-card bg-success text-white mb-2 shadow interactive-card">
                <div class="card-body text-center py-4">
                    <h6 class="opacity-75">Proyectos</h6>
                    <h2 class="fw-bold mb-0">{{ $totalProyectos ?? 0 }}</h2>
                </div>
            </div>
        </div>
        @endcanAccess

        @canAccess('registro_horas')
        <div class="col-md-3">
            <div class="card stat-card bg-warning text-dark mb-2 shadow interactive-card">
                <div class="card-body text-center py-4">
                    <h6 class="opacity-75">Horas Registradas</h6>
                    <h2 class="fw-bold mb-0">{{ number_format($totalHoras ?? 0, 1) }}</h2>
                </div>
            </div>
        </div>
        @endcanAccess

        @canAccess('paralizacion')
        <div class="col-md-3">
            <div class="card stat-card bg-danger text-white mb-2 shadow interactive-card">
                <div class="card-body text-center py-4">
                    <h6 class="opacity-75">Paralizaciones</h6>
                    <h2 class="fw-bold mb-0">{{ $totalParalizaciones ?? 0 }}</h2>
                </div>
            </div>
        </div>
        @endcanAccess
    </div>

    @canAccess('proyecto')
    @if(isset($ultimosProyectos) && $ultimosProyectos->count())
    <div class="card mt-4 shadow-sm interactive-card">
        <div class="card-header bg-light fw-semibold">Últimos proyectos</div>
        <div class="table-responsive">
            <table class="table table-hover table-interactive mb-0 align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimosProyectos as $p)
                    <tr>
                        <td>{{ $p->id_proyecto }}</td>
                        <td>{{ $p->nombre_proyecto ?? $p->nombre ?? '—' }}</td>
                        <td><span class="badge bg-secondary">{{ $p->estado ?? 'N/D' }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @endcanAccess
</div>
@endsection
