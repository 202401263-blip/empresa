@extends('layouts.app')

@section('content')
<div style="position: relative; width: 100%; min-height: 90vh; background-color: #0f172a; background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.96) 0%, rgba(30, 41, 59, 0.88) 100%), url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?fm=jpg&q=80&w=1920'); background-size: cover; background-position: center; background-attachment: fixed; border-radius: 1.25rem; padding: 2.5rem; box-sizing: border-box; font-family: system-ui, -apple-system, sans-serif; box-shadow: 0 20px 50px rgba(0,0,0,0.4); margin-bottom: 2rem;">

    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #fbbf24; padding-bottom: 1.5rem; margin-bottom: 2.5rem;">
        <div>
            <h1 style="font-size: 2rem; font-weight: 900; color: #ffffff; margin: 0; letter-spacing: -0.02em;">Panel de Control</h1>
            <p style="font-size: 0.9rem; color: #e2e8f0; margin: 0; margin-top: 0.4rem; font-weight: 500;">
                Bienvenido, <span style="color: #fbbf24; font-weight: 700;">{{ auth()->user()->nombreParaMostrar() }}</span> — Rol: <span style="text-transform: uppercase; background-color: rgba(251, 191, 36, 0.2); color: #fbbf24; padding: 0.2rem 0.6rem; border-radius: 0.35rem; font-size: 0.75rem; font-weight: 700; border: 1px solid rgba(251, 191, 36, 0.4);">{{ auth()->user()->rolNormalizado() }}</span>
            </p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            @canAccess('proyecto')
            <form method="GET" action="{{ route('operativa.proyectos.index') }}" style="margin: 0; display: flex; align-items: center; background: rgba(15, 23, 42, 0.8); border: 1px solid rgba(255,255,255,0.2); border-radius: 0.5rem; padding: 0.4rem 0.85rem;">
                <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar proyecto..." style="background: transparent; border: none; outline: none; color: #ffffff; font-size: 0.85rem; width: 180px;">
                <button type="submit" style="background: none; border: none; color: #fbbf24; cursor: pointer; padding: 0;">🔍</button>
            </form>
            @endcanAccess
            <span style="font-size: 0.75rem; font-weight: 800; color: #0f172a; background-color: #fbbf24; padding: 0.5rem 1.25rem; border-radius: 0.5rem; letter-spacing: 0.05em; box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);">SQL SERVER</span>
        </div>
    </div>

    <div style="margin-bottom: 2.5rem;">
        <p style="font-size: 0.75rem; font-weight: 800; color: #fbbf24; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;">Acciones Inmediatas</p>
        <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
            
            @canAccess('registro_horas')
            <a href="{{ route('operativa.asistencia.create') }}" class="action-btn" style="display: flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: #ffffff; padding: 0.6rem 1.2rem; border-radius: 0.5rem; text-decoration: none; font-size: 0.85rem; font-weight: 700; transition: all 0.2s;">
                ⏱️ Registrar Horas Diarias
            </a>
            @endcanAccess

            @canAccess('proyecto')
            <a href="{{ route('operativa.proyectos.index') }}" class="action-btn" style="display: flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: #ffffff; padding: 0.6rem 1.2rem; border-radius: 0.5rem; text-decoration: none; font-size: 0.85rem; font-weight: 700; transition: all 0.2s;">
                📁 Ver Proyectos
            </a>
            @endcanAccess

            @canAccess('paralizacion')
            <a href="{{ route('operativa.paralizaciones.index') }}" class="action-btn" style="display: flex; align-items: center; gap: 0.5rem; background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.4); color: #f87171; padding: 0.6rem 1.2rem; border-radius: 0.5rem; text-decoration: none; font-size: 0.85rem; font-weight: 700; transition: all 0.2s;">
                🚨 Incidentes y Paralizaciones
            </a>
            @endcanAccess
            
        </div>
    </div>

    <div class="row g-3 mb-4">
        @canAccess('cliente')
        <div class="col-12 col-sm-6 col-md-3">
            <div style="background: rgba(15, 23, 42, 0.85); border: 1px solid rgba(255, 255, 255, 0.12); border-top: 4px solid #fbbf24; padding: 1.5rem; border-radius: 0.75rem; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.3);">
                <span style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Total Clientes</span>
                <h2 style="font-size: 2.2rem; font-weight: 900; color: #ffffff; margin: 0;">{{ $totalClientes ?? 0 }}</h2>
            </div>
        </div>
        @endcanAccess

        @canAccess('proyecto')
        <div class="col-12 col-sm-6 col-md-3">
            <div style="background: rgba(15, 23, 42, 0.85); border: 1px solid rgba(255, 255, 255, 0.12); border-top: 4px solid #fbbf24; padding: 1.5rem; border-radius: 0.75rem; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.3);">
                <span style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Proyectos Activos</span>
                <h2 style="font-size: 2.2rem; font-weight: 900; color: #fbbf24; margin: 0;">{{ $totalProyectos ?? 0 }}</h2>
            </div>
        </div>
        @endcanAccess

        @canAccess('registro_horas')
        <div class="col-12 col-sm-6 col-md-3">
            <div style="background: rgba(15, 23, 42, 0.85); border: 1px solid rgba(255, 255, 255, 0.12); border-top: 4px solid #ffffff; padding: 1.5rem; border-radius: 0.75rem; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.3);">
                <span style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Horas Registradas</span>
                <h2 style="font-size: 2.2rem; font-weight: 900; color: #ffffff; margin: 0;">{{ number_format($totalHoras ?? 0, 1) }}</h2>
            </div>
        </div>
        @endcanAccess

        @canAccess('paralizacion')
        <div class="col-12 col-sm-6 col-md-3">
            <div style="background: rgba(15, 23, 42, 0.85); border: 1px solid rgba(239, 68, 68, 0.3); border-top: 4px solid #ef4444; padding: 1.5rem; border-radius: 0.75rem; text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.3);">
                <span style="font-size: 0.75rem; font-weight: 700; color: #f87171; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.5rem;">Paralizaciones</span>
                <h2 style="font-size: 2.2rem; font-weight: 900; color: #ef4444; margin: 0;">{{ $totalParalizaciones ?? 0 }}</h2>
            </div>
        </div>
        @endcanAccess
    </div>

    <div class="row g-4">
        
        @canAccess('proyecto')
        <div class="col-12 col-lg-8">
            @if(isset($ultimosProyectos) && $ultimosProyectos->count())
            <div style="background: rgba(15, 23, 42, 0.9); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 15px 30px rgba(0,0,0,0.3); height: 100%;">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
                    <div>
                        <h4 style="font-size: 1.1rem; font-weight: 800; color: #ffffff; margin: 0;">Últimos proyectos incorporados</h4>
                        <p style="font-size: 0.8rem; color: #cbd5e1; margin: 0; margin-top: 0.25rem;">Monitoreo y asignación de obras activas.</p>
                    </div>
                    <a href="{{ route('operativa.proyectos.index') }}" style="color: #fbbf24; font-size: 0.8rem; font-weight: 700; text-decoration: none;">Ver todos</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle" style="color: #ffffff; font-size: 0.85rem;">
                        <thead>
                            <tr style="border-bottom: 2px solid rgba(251, 191, 36, 0.4); color: #cbd5e1; font-weight: 700;">
                                <th style="padding: 1rem; background: transparent;">ID</th>
                                <th style="padding: 1rem; background: transparent;">Nombre del Proyecto</th>
                                <th style="padding: 1rem; background: transparent; text-align: center;">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ultimosProyectos as $p)
                            <tr class="custom-tr" style="border-bottom: 1px solid rgba(255,255,255,0.08); transition: background-color 0.15s ease;">
                                <td style="padding: 1rem; font-weight: 700; color: #fbbf24; background: transparent;">#{{ $p->id_proyecto }}</td>
                                <td style="padding: 1rem; font-weight: 500; background: transparent; color: #ffffff;">
                                    {{ $p->nombre_proyecto ?? $p->nombre ?? '—' }}
                                </td>
                                <td style="padding: 1rem; text-align: center; background: transparent;">
                                    <span style="background-color: rgba(251, 191, 36, 0.15); color: #fbbf24; padding: 0.35rem 0.75rem; border-radius: 0.5rem; font-weight: 700; font-size: 11px; border: 1px solid rgba(251, 191, 36, 0.3); text-transform: uppercase; letter-spacing: 0.02em;">
                                        {{ $p->estado ?? 'N/D' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @endcanAccess

        <div class="col-12 col-lg-4">
            <div style="background: rgba(15, 23, 42, 0.9); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 15px 30px rgba(0,0,0,0.3); height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h4 style="font-size: 1.1rem; font-weight: 800; color: #ffffff; margin: 0; display: flex; align-items: center; gap: 0.5rem;">
                        ⚠️ Centro de Alertas
                    </h4>
                    <p style="font-size: 0.8rem; color: #cbd5e1; margin: 0; margin-top: 0.25rem; margin-bottom: 1.25rem;">Monitoreo global de registros e incidencias técnicas.</p>
                    
                    <div style="background: rgba(251, 191, 36, 0.1); border-left: 4px solid #fbbf24; padding: 0.75rem; border-radius: 0 0.5rem 0.5rem 0; margin-bottom: 0.75rem;">
                        <span style="font-size: 11px; font-weight: 800; color: #fbbf24; text-transform: uppercase; display: block;">Módulo Operativo</span>
                        <p style="font-size: 0.8rem; color: #ffffff; margin: 0; margin-top: 0.2rem; font-weight: 500;">Control de asistencia y asignación de maquinaria activos.</p>
                    </div>

                    <div style="background: rgba(59, 130, 246, 0.1); border-left: 4px solid #3b82f6; padding: 0.75rem; border-radius: 0 0.5rem 0.5rem 0;">
                        <span style="font-size: 11px; font-weight: 800; color: #3b82f6; text-transform: uppercase; display: block;">Base de datos</span>
                        <p style="font-size: 0.8rem; color: #ffffff; margin: 0; margin-top: 0.2rem; font-weight: 500;">Sincronización con motor SQL Server exitosa.</p>
                    </div>
                </div>

                <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem; margin-top: 1rem; text-align: center;">
                    <a href="{{ route('reportes.alertas.index') }}" style="font-size: 0.8rem; color: #fbbf24; text-decoration: none; font-weight: 700;">Ver Alertas del Sistema →</a>
                </div>
            </div>
        </div>

    </div>

</div>

<style>
    .custom-tr:hover {
        background-color: rgba(251, 191, 36, 0.08) !important;
    }
    .action-btn:hover {
        background: #fbbf24 !important;
        color: #0f172a !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(251,191,36,0.3);
    }
    .table > :not(caption) > * > * {
        color: inherit !important;
    }
</style>
@endsection