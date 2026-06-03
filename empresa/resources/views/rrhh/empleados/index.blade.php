@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Recursos Humanos > Maestro de Empleados</h3>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle small">
            <thead class="table-secondary text-nowrap">
                <tr>
                    <th>ID</th>
                    <th>CI</th>
                    <th>Nombres y Apellidos</th>
                    <th>Cargo/Especialidad</th>
                    <th>Salario Base</th>
                    <th>Mod. Pago</th>
                    <th>Tarifas (H/HE/J/D)</th>
                    <th>Tipo Contrato</th>
                    <th>Ingreso</th>
                    <th>Contacto</th>
                    <th>Datos Bancarios/AFP</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $e)
                <tr>
                    <td>{{ $e->id_empleado }}</td>
                    <td>{{ $e->ci }}</td>
                    <td class="fw-bold">{{ $e->nombres }} {{ $e->apellidos }}</td>
                    <td>
                        {{ $e->cargo }} <br>
                        <small class="text-muted">{{ $e->especialidad }}</small>
                    </td>
                    <td>{{ number_format($e->salario_base, 2) }}</td>
                    <td>{{ $e->modalidad_pago }}</td>
                    <td>
                        <small>
                            H: {{ $e->tarifa_hora }} | HE: {{ $e->tarifa_hora_extra }} <br>
                            J: {{ $e->tarifa_jornal }} | D: {{ $e->tarifa_destajo }}
                        </small>
                    </td>
                    <td>{{ $e->tipo_contrato }}</td>
                    <td>{{ $e->fecha_ingreso }}</td>
                    <td>
                        {{ $e->telefono }} <br>
                        <small>{{ $e->correo }}</small>
                    </td>
                    <td>
                        <small>
                            {{ $e->banco }}: {{ $e->cuenta_bancaria }} <br>
                            AFP: {{ $e->afp }}
                        </small>
                    </td>
                    <td class="text-center">
                        {{ $e->activo == 1 ? 'ACTIVO' : 'INACTIVO' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


