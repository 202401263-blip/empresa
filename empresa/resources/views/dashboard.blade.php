@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4">
        <h1 class="h2">Panel de Control: Gestión Operativa</h1>
        <span class="badge bg-dark">Base de Datos: SQL Server</span>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white mb-4 shadow">
                <div class="card-body text-center">
                    <h6>Total Clientes</h6>
                    <h2 class="fw-bold">{{ $totalClientes ?? '0' }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4 shadow">
                <div class="card-body text-center">
                    <h6>Proyectos Activos</h6>
                    <h2 class="fw-bold">{{ $totalProyectos ?? '0' }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark mb-4 shadow">
                <div class="card-body text-center">
                    <h6>Horas Registradas</h6>
                    <h2 class="fw-bold">{{ number_format($totalHoras ?? 0, 1) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4 shadow">
                <div class="card-body text-center">
                    <h6>Paralizaciones</h6>
                    <h2 class="fw-bold">{{ $totalParalizaciones ?? '0' }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection