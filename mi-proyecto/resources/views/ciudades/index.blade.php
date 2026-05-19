@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2>Gestión de Ciudades</h2>
        <button class="btn btn-primary">+ Nueva Ciudad</button>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>País</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ciudades as $ciudad)
                <tr>
                    <td>{{ $ciudad->id_ciudad }}</td>
                    <td>{{ $ciudad->nombre_ciudad }}</td>
                    <td>{{ $ciudad->departamento }}</td>
                    <td>{{ $ciudad->pais }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection