@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Panel de Gestión - Empresa Constructora</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Base de Datos</h5>
                        <p class="card-text">Conectado a: <b>SQL Server</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Estado del Sistema</h5>
                        <p class="card-text">Operativo y listo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection