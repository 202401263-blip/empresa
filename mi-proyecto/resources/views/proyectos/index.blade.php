@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h2 class="mb-0">Gestión de Proyectos</h2>
        <button class="btn btn-primary">+ Nuevo Proyecto</button>
    </div>
    <div class="card-body">
        <table class="table table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Avance</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $p)
                <tr>
                    <td>{{ $p->codigo_proyecto }}</td>
                    <td>{{ $p->nombre_proyecto }}</td>
                    <td>{{ $p->ubicacion }}</td>
                    <td>
                        <div class="progress" style="height: 15px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $p->porcentaje_avance }}%;">
                                {{ $p->porcentaje_avance }}%
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge {{ $p->estado == 'Activo' ? 'bg-success' : 'bg-warning' }}">
                            {{ $p->estado }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection