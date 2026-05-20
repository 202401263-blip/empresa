@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-light text-secondary">Recursos Humanos > Registro de Pagos a Empleados</h3>
    <hr>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle small">
            <thead class="table-secondary text-nowrap">
                <tr>
                    <th>ID Pago Emp</th>
                    <th>ID Maestro</th>
                    <th>Empleado</th>
                    <th>Tipo Haber</th>
                    <th>Periodo (Mes)</th>
                    <th>Días Trab.</th>
                    <th>Horas Trab.</th>
                    <th>Modalidad</th>
                    <th>Tarifa Aplicada</th>
                    <th>Monto Calculado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $p)
                <tr>
                    <td>{{ $p->id_pago_emp }}</td>
                    <td>{{ $p->id_pago }}</td>
                    <td class="fw-bold">
                        {{ $p->empleado->nombres ?? 'ID: '.$p->id_empleado }} {{ $p->empleado->apellidos ?? '' }}
                    </td>
                    <td>{{ $p->tipo_haber }}</td>
                    <td class="text-center">{{ $p->periodo_mes }}</td>
                    <td class="text-center">{{ $p->dias_trabajados }}</td>
                    <td class="text-center">{{ $p->horas_trabajadas }}</td>
                    <td>{{ $p->modalidad_aplicada }}</td>
                    <td class="text-end">{{ number_format($p->tarifa_aplicada, 2) }}</td>
                    <td class="text-end fw-bold text-primary">
                        {{ number_format($p->monto_calculado, 2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection