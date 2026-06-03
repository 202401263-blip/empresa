@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h3 class="mt-4 fw-light text-secondary">Maestro General de Clientes</h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm align-middle">
            <thead class="table-secondary">
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Nombre / Razón Social</th>
                    <th>Doc. Identidad</th>
                    <th>Tipo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha Registro</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($clientes as $c)
                <tr>
                    <td>{{ $c->id_cliente }}</td>
                    <td class="fw-bold text-uppercase">{{ $c->nombre_razon }}</td>
                    <td>{{ $c->documento_identidad }}</td>
                    <td>{{ $c->tipo_cliente }}</td>
                    <td>{{ $c->direccion }}</td>
                    <td>{{ $c->telefono_principal}}</td>
                    <td>{{ $c->correo }}</td>
                    <td>{{ $c->fecha_registro }}</td>
                    <td>{{ $c->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection