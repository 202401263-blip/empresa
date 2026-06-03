<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Constructora - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            color: white;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 12px 20px;
            transition: transform 0.25s ease, background 0.25s ease, color 0.25s ease;
            border-radius: 4px;
            margin: 2px 10px;
        }
        .sidebar .nav-link:hover {
            background: #343a40;
            color: #ffffff;
            transform: translateX(4px);
        }
        .sidebar .nav-link i { width: 25px; }
        .active-link {
            background: #0d6efd !important;
            color: white !important;
        }
        .submenu .nav-link {
            padding: 8px 20px 8px 45px !important;
            font-size: 0.85em;
        }
        hr { border-top: 1px solid #495057; margin: 1rem 10px; }

        .interactive-card,
        .stat-card {
            transition: transform 0.28s ease, box-shadow 0.28s ease;
            will-change: transform;
        }
        .interactive-card:hover,
        .stat-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.14) !important;
        }
        .interactive-panel {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .interactive-panel:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08) !important;
        }
        .table-interactive tbody tr {
            transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }
        .table-interactive tbody tr:hover {
            transform: translateY(-2px) scale(1.005);
            background-color: #f8f9ff !important;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.08);
            position: relative;
            z-index: 1;
        }
        .interactive-btn {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .interactive-btn:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 14px rgba(13, 110, 253, 0.25);
        }
        .user-badge {
            background: rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 10px 14px;
            margin: 0 10px 12px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar shadow">
                <div class="text-center mb-3">
                    <h4 class="fw-bold text-white mb-0">CONSTRUCTORA</h4>
                    <small class="text-white-50">Gestión Integral</small>
                    <hr>
                </div>

                @auth
                <div class="user-badge text-white-50">
                    <div class="text-white fw-semibold text-truncate">{{ $authUser->nombreParaMostrar() }}</div>
                    <div class="text-capitalize"><i class="fas fa-id-badge me-1"></i>{{ $authUser->rolNormalizado() }}</div>
                </div>
                @endauth

                <ul class="nav flex-column">
                    <li class="px-3 mt-2 mb-1 text-uppercase text-white-50 small fw-semibold">Inicio</li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                            <i class="fas fa-gauge-high"></i> Panel de control
                        </a>
                    </li>

                    <li class="px-3 mt-3 mb-1 text-uppercase text-white-50 small fw-semibold">Maestros</li>
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh']) && \Illuminate\Support\Facades\Route::has('operativa.ciudades.index'))
                        <li class="nav-item"><a href="{{ route('operativa.ciudades.index') }}" class="nav-link {{ request()->routeIs('operativa.ciudades.*') ? 'active-link' : '' }}"><i class="fas fa-city"></i> Ciudades</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.materiales.index'))
                        <li class="nav-item"><a href="{{ route('operativa.materiales.index') }}" class="nav-link {{ request()->routeIs('operativa.materiales.*') ? 'active-link' : '' }}"><i class="fas fa-cubes-stacked"></i> Materiales</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.maquinarias.catalogo'))
                        <li class="nav-item"><a href="{{ route('operativa.maquinarias.catalogo') }}" class="nav-link {{ request()->routeIs('operativa.maquinarias.catalogo*') ? 'active-link' : '' }}"><i class="fas fa-truck-monster"></i> Catálogo maquinaria</a></li>
                    @endif

                    <li class="px-3 mt-3 mb-1 text-uppercase text-white-50 small fw-semibold">Gestión Operativa</li>
                    @if(Auth::user()->hasRole(['admin','gerente','contab']) && \Illuminate\Support\Facades\Route::has('operativa.clientes.index'))
                        <li class="nav-item"><a href="{{ route('operativa.clientes.index') }}" class="nav-link {{ request()->routeIs('operativa.clientes.*') ? 'active-link' : '' }}"><i class="fas fa-users"></i> Clientes</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','cliente']) && \Illuminate\Support\Facades\Route::has('operativa.contratos.index'))
                        <li class="nav-item"><a href="{{ route('operativa.contratos.index') }}" class="nav-link {{ request()->routeIs('operativa.contratos.*') ? 'active-link' : '' }}"><i class="fas fa-file-signature"></i> Contratos</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh','cliente']) && \Illuminate\Support\Facades\Route::has('operativa.proyectos.index'))
                        <li class="nav-item"><a href="{{ route('operativa.proyectos.index') }}" class="nav-link {{ request()->routeIs('operativa.proyectos.*') ? 'active-link' : '' }}"><i class="fas fa-diagram-project"></i> Proyectos</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra']) && \Illuminate\Support\Facades\Route::has('operativa.cotizaciones.index'))
                        <li class="nav-item"><a href="{{ route('operativa.cotizaciones.index') }}" class="nav-link {{ request()->routeIs('operativa.cotizaciones.*') ? 'active-link' : '' }}"><i class="fas fa-file-invoice-dollar"></i> Cotizaciones</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','cliente']) && \Illuminate\Support\Facades\Route::has('operativa.cuotas.index'))
                        <li class="nav-item"><a href="{{ route('operativa.cuotas.index') }}" class="nav-link {{ request()->routeIs('operativa.cuotas.*') ? 'active-link' : '' }}"><i class="fas fa-money-check-dollar"></i> Cuotas de pago</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','contab','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.compras.index'))
                        <li class="nav-item"><a href="{{ route('operativa.compras.index') }}" class="nav-link {{ request()->routeIs('operativa.compras.*') ? 'active-link' : '' }}"><i class="fas fa-cart-shopping"></i> Compras</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.inventario.index'))
                        <li class="nav-item"><a href="{{ route('operativa.inventario.index') }}" class="nav-link {{ request()->routeIs('operativa.inventario.*') ? 'active-link' : '' }}"><i class="fas fa-boxes-stacked"></i> Inventario</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','jefe obra']) && \Illuminate\Support\Facades\Route::has('operativa.paralizaciones.index'))
                        <li class="nav-item"><a href="{{ route('operativa.paralizaciones.index') }}" class="nav-link {{ request()->routeIs('operativa.paralizaciones.*') ? 'active-link' : '' }}"><i class="fas fa-circle-pause"></i> Paralizaciones</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','cliente']) && \Illuminate\Support\Facades\Route::has('operativa.finalizadas.index'))
                        <li class="nav-item"><a href="{{ route('operativa.finalizadas.index') }}" class="nav-link {{ request()->routeIs('operativa.finalizadas.*') ? 'active-link' : '' }}"><i class="fas fa-flag-checkered"></i> Obras terminadas</a></li>
                    @endif

                    <li class="px-3 mt-3 mb-1 text-uppercase text-white-50 small fw-semibold">Recursos Humanos</li>
                    @if(Auth::user()->hasRole(['admin','gerente','jefe obra','rrhh']) && \Illuminate\Support\Facades\Route::has('rrhh.empleados.index'))
                        <li class="nav-item"><a href="{{ route('rrhh.empleados.index') }}" class="nav-link {{ request()->routeIs('rrhh.empleados.*') ? 'active-link' : '' }}"><i class="fas fa-user-tie"></i> Empleados</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','jefe obra','rrhh']) && \Illuminate\Support\Facades\Route::has('rrhh.asignaciones.index'))
                        <li class="nav-item"><a href="{{ route('rrhh.asignaciones.index') }}" class="nav-link {{ request()->routeIs('rrhh.asignaciones.*') ? 'active-link' : '' }}"><i class="fas fa-user-plus"></i> Asign. personal</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','jefe obra','rrhh']) && \Illuminate\Support\Facades\Route::has('operativa.asistencia.index'))
                        <li class="nav-item"><a href="{{ route('operativa.asistencia.index') }}" class="nav-link {{ request()->routeIs('operativa.asistencia.*') ? 'active-link' : '' }}"><i class="fas fa-clock"></i> Control de horas</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.maquinarias.asignaciones'))
                        <li class="nav-item"><a href="{{ route('operativa.maquinarias.asignaciones') }}" class="nav-link {{ request()->routeIs('operativa.maquinarias.asignaciones*') ? 'active-link' : '' }}"><i class="fas fa-tractor"></i> Asign. maquinaria</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','contab','rrhh']) && \Illuminate\Support\Facades\Route::has('rrhh.pagos.index'))
                        <li class="nav-item"><a href="{{ route('rrhh.pagos.index') }}" class="nav-link {{ request()->routeIs('rrhh.pagos.*') ? 'active-link' : '' }}"><i class="fas fa-hand-holding-dollar"></i> Pagos / planillas</a></li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','jefe obra']) && \Illuminate\Support\Facades\Route::has('rrhh.permisos.index'))
                        <li class="nav-item"><a href="{{ route('rrhh.permisos.index') }}" class="nav-link {{ request()->routeIs('rrhh.permisos.*') ? 'active-link' : '' }}"><i class="fas fa-file-circle-check"></i> Permisos y trámites</a></li>
                    @endif

                    <li class="px-3 mt-3 mb-1 text-uppercase text-white-50 small fw-semibold">Reportes</li>
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('reportes.costos.index'))
                        <li class="nav-item">
                            <a href="{{ route('reportes.costos.index') }}" class="nav-link {{ request()->routeIs('reportes.costos.*') ? 'active-link' : '' }}">
                                <i class="fas fa-chart-pie"></i> Resumen costos
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh']) && \Illuminate\Support\Facades\Route::has('alertas.index'))
                        <li class="nav-item">
                            <a href="{{ route('alertas.index') }}" class="nav-link {{ request()->routeIs('alertas.*') ? 'active-link' : '' }}">
                                <i class="fas fa-bell"></i> Alertas y Notificaciones
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole(['admin']) && \Illuminate\Support\Facades\Route::has('reportes.log.index'))
                        <li class="nav-item"><a href="{{ route('reportes.log.index') }}" class="nav-link {{ request()->routeIs('reportes.log.*') ? 'active-link' : '' }}"><i class="fas fa-shield-halved"></i> Log de cambios</a></li>
                    @endif

                    @if(Auth::user()->hasRole(['admin','rrhh']))
                    <li class="nav-item mt-3">
                        <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('rrhh.feriados.*') ? 'text-white fw-bold' : '' }}"
                           data-bs-toggle="collapse"
                           href="#menuConfiguracion"
                           role="button"
                           aria-expanded="{{ request()->routeIs('rrhh.feriados.*') ? 'true' : 'false' }}">
                            <span><i class="fas fa-gear"></i> Configuración</span>
                            <i class="fas fa-chevron-down small"></i>
                        </a>
                        <div class="collapse {{ request()->routeIs('rrhh.feriados.*') ? 'show' : '' }}" id="menuConfiguracion">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a href="{{ route('rrhh.feriados.index') }}" class="nav-link {{ request()->routeIs('rrhh.feriados.*') ? 'text-white fw-bold' : '' }}">
                                        <i class="fas fa-calendar-day me-2"></i> Feriados
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>

                @auth
                <div class="mt-4 px-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm w-100 interactive-btn">
                            <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
                @endauth
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show interactive-panel" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show interactive-panel" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="bg-white p-4 shadow-sm rounded border interactive-panel">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
