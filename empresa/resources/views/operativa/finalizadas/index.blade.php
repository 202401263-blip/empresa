@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Histórico de Cierres de Obra</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle">
            <thead class="table-secondary">
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Proyecto</th>
                    <th>Fecha Cierre Real</th>
                    <th>Nro Acta Entrega</th>
                    <th>Monto Cierre Final</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($obras as $o)
                <tr>
                    <td>{{ $o->id_terminada }}</td>
                    <td class="fw-bold">{{ $o->proyecto->nombre_proyecto ?? 'N/A' }}</td>
                    <td>{{ $o->fecha_terminacion_real }}</td>
                    <td>{{ $o->numero_acta }}</td>
                    <td>{{ number_format($o->monto_final, 2) }}</td>
                    <td><small>{{ $o->observaciones }}</small></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection