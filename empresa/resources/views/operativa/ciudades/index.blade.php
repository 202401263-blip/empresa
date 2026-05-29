@extends('layouts.app')
@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-light text-secondary mb-0">Gestión Operativa &rsaquo; Ciudades</h3>
        @canAccess('ciudad', 'I')
        <a href="{{ route('operativa.ciudades.create') }}" class="btn btn-primary btn-sm interactive-btn">
            <i class="fas fa-plus me-1"></i>Nueva Ciudad
        </a>
        @endcanAccess
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle table-interactive">
            <thead class="table-secondary">
                <tr><th>ID</th><th>Nombre</th><th>Departamento</th><th>País</th><th></th></tr>
            </thead>
            <tbody class="small">
            @forelse($ciudades as $c)
                <tr>
                    <td>{{ $c->id_ciudad }}</td>
                    <td class="fw-bold">{{ $c->nombre }}</td>
                    <td>{{ $c->departamento }}</td>
                    <td>{{ $c->pais }}</td>
                    <td class="text-nowrap">
                        @canAccess('ciudad', 'U')
                        <a href="{{ route('operativa.ciudades.edit', $c->id_ciudad) }}" class="btn btn-sm btn-outline-secondary interactive-btn"><i class="fas fa-pencil-alt"></i></a>
                        @endcanAccess
                        @canAccess('ciudad', 'D')
                        <form action="{{ route('operativa.ciudades.destroy', $c->id_ciudad) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar ciudad?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger interactive-btn"><i class="fas fa-trash"></i></button>
                        </form>
                        @endcanAccess
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">Sin ciudades registradas.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection