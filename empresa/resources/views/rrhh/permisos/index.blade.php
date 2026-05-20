@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-light text-secondary">Recursos Humanos > Permisos y Feriados</h3>
    <hr>

    <h5 class="text-muted mb-3"><i class="fas fa-file-contract me-2"></i>Permisos Legales y Trámites</h5>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-hover table-sm small">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th><th>Tipo</th><th>Entidad</th><th>F. Solicitud</th><th>Costo</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permisos as $p)
                <tr>
                    <td>{{ $p->id_permiso }}</td>
                    <td>{{ $p->tipo_permiso }}</td>
                    <td>{{ $p->entidad_emisora }}</td>
                    <td>{{ $p->fecha_solicitud }}</td>
                    <td>{{ number_format($p->costo_tramite, 2) }}</td>
                    <td>{{ $p->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection