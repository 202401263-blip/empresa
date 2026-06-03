<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Constructora - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* EVITAR SCROLL GLOBAL EN EL BODY */
        html, body { 
            background-color: #f1f5f9; 
            color: #1e293b; 
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }
        
        /* CONTENEDOR GENERAL EN FILA */
        .app-container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* SIDEBAR CON FONDO ACLARADO (AZUL PIZARRA INDUSTRIAL CLARO) */
        .sidebar {
            width: 260px;
            min-width: 260px;
            height: 100vh;
            /* Mezcla de un degradado azul pizarra semi-claro con la textura estructural de fondo */
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.85) 0%, rgba(51, 65, 85, 0.9) 100%), 
                        url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=500&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            border-right: 2px solid #e2e8f0;
            padding: 18px 0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 1000;
        }
        
        /* SCROLLBAR SUTIL PARA EL MENÚ */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        /* OPCIONES DEL MENÚ COMPACTAS */
        .sidebar .nav-link {
            color: #f1f5f9; /* Texto blanco suave muy legible */
            padding: 7px 16px;
            transition: all 0.2s ease;
            border-radius: 6px;
            margin: 2px 12px;
            font-size: 0.88rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15); /* Efecto hover claro */
            color: #ffffff;
            transform: translateX(3px);
        }
        
        .sidebar .nav-link i { 
            width: 22px; 
            font-size: 0.95rem;
            margin-right: 6px;
            color: #cbd5e1; /* Iconos ligeramente grisáceos */
        }

        .sidebar .nav-link:hover i {
            color: #ffffff;
        }
        
        /* OPCIÓN ACTIVA (DESTACADO AMARILLO/ORO) */
        .active-link {
            background: #fbbf24 !important; 
            color: #0f172a !important; 
            font-weight: 700 !important;
            box-shadow: 0 4px 10px rgba(251, 191, 36, 0.3);
        }
        
        .active-link i {
            color: #0f172a !important;
        }
        
        /* SUBMENÚ COMPACTO */
        .submenu .nav-link {
            padding: 5px 15px 5px 38px !important;
            font-size: 0.82em;
            color: #e2e8f0;
        }
        
        /* TÍTULOS DE SECCIÓN MÁS COMPRENSIBLES Y CLAROS */
        .menu-heading {
            font-size: 0.7rem; 
            letter-spacing: 0.08em;
            color: #94a3b8 !important; /* Gris claro que resalta bien sin ser oscuro */
            font-weight: 700;
            margin-top: 12px !important;
            margin-bottom: 4px !important;
            text-transform: uppercase;
        }
        
        hr { border-top: 1px solid rgba(255, 255, 255, 0.25); margin: 0.8rem 12px; }

        /* LADO DERECHO: INDEPENDIENTE CON SU PROPIO SCROLL */
        .main-content {
            flex-grow: 1;
            height: 100vh;
            overflow-y: auto;
            padding: 24px;
            background-color: #f8fafc; /* Fondo gris claro limpio para las tablas */
        }

        /* TARJETA DE USUARIO */
        .user-badge {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(4px);
            border-radius: 6px;
            padding: 8px 12px;
            margin: 0 12px 10px;
            font-size: 0.78rem;
        }
        
        /* CONTENEDOR BLANCO DONDE SE RENDERIZAN TUS VISTAS */
        .main-content-wrapper {
            background-color: #ffffff;
            color: #1e293b;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
        }

        /* HOVER DE BOTÓN DE CERRAR SESIÓN */
        .interactive-btn:hover {
            background-color: #ef4444 !important;
            border-color: #ef4444 !important;
            color: white !important;
        }
    </style>
</head>
<body>

    <div class="app-container">
        
        <!-- LADO IZQUIERDO: MENÚ CON FONDO INDUSTRIAL MEDIO/CLARO FIJO -->
        <nav class="sidebar">
            <div class="text-center mb-2 px-2">
                <div class="d-flex align-items-center justify-content-center gap-2 mb-1">
                    <span style="background: #fbbf24; color: #0f172a; padding: 0.1rem 0.4rem; border-radius: 4px; font-weight: 900; font-size: 0.85rem;">OS</span>
                    <h6 class="fw-bold text-white mb-0" style="letter-spacing: 0.05em; font-size: 1rem;">CONSTRUCTORA</h6>
                </div>
                <small style="color: #fbbf24; font-size: 0.68rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">Gestión Integral</small>
                <hr>
            </div>

            @auth
            <div class="user-badge">
                <div class="text-white fw-bold text-truncate" style="font-size: 0.8rem;">{{ $authUser->nombreParaMostrar() ?? Auth::user()->nombreParaMostrar() }}</div>
                <div style="color: #fbbf24; font-weight: 600; font-size: 0.68rem; margin-top: 1px;" class="text-uppercase">
                    <i class="fas fa-id-badge me-1"></i>{{ $authUser->rolNormalizado() ?? Auth::user()->rolNormalizado() }}
                </div>
            </div>
            @endauth

            <ul class="nav flex-column">
                <li class="px-3 menu-heading">Inicio</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                        <i class="fas fa-gauge-high"></i> Panel de control
                    </a>
                </li>

                <li class="px-3 menu-heading">Maestros</li>
                @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh']) && \Illuminate\Support\Facades\Route::has('operativa.ciudades.index'))
                    <li class="nav-item"><a href="{{ route('operativa.ciudades.index') }}" class="nav-link {{ request()->routeIs('operativa.ciudades.*') ? 'active-link' : '' }}"><i class="fas fa-city"></i> Ciudades</a></li>
                @endif
                @if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.materiales.index'))
                    <li class="nav-item"><a href="{{ route('operativa.materiales.index') }}" class="nav-link {{ request()->routeIs('operativa.materiales.*') ? 'active-link' : '' }}"><i class="fas fa-cubes-stacked"></i> Materiales</a></li>
                @endif
                @if(Auth::user()->hasRole(['admin','gerente','jefe obra','logist']) && \Illuminate\Support\Facades\Route::has('operativa.maquinarias.catalogo'))
                    <li class="nav-item"><a href="{{ route('operativa.maquinarias.catalogo') }}" class="nav-link {{ request()->routeIs('operativa.maquinarias.catalogo*') ? 'active-link' : '' }}"><i class="fas fa-truck-monster"></i> Catálogo maquinaria</a></li>
                @endif

                <li class="px-3 menu-heading">Gestión Operativa</li>
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

                <li class="px-3 menu-heading">Recursos Humanos</li>
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

                <li class="px-3 menu-heading">Reportes</li>
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
                <li class="nav-item mt-1">
                    <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('rrhh.feriados.*') ? 'text-white fw-bold' : '' }}"
                       data-bs-toggle="collapse"
                       href="#menuConfiguracion"
                       role="button"
                       aria-expanded="{{ request()->routeIs('rrhh.feriados.*') ? 'true' : 'false' }}">
                        <span><i class="fas fa-gear"></i> Configuración</span>
                        <i class="fas fa-chevron-down small" style="font-size: 0.7rem;"></i>
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
            <div class="mt-auto pt-3 px-3">
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100 interactive-btn" style="border-color: rgba(255,255,255,0.3); font-size: 0.8rem; padding: 6px; font-weight: 600;">
                        <i class="fas fa-sign-out-alt me-1"></i> Cerrar sesión
                    </button>
                </form>
            </div>
            @endauth
        </nav>

        <!-- LADO DERECHO: CONTENIDO TOTALMENTE INDEPENDIENTE -->
        <main class="main-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #10b981; color: white;">
                    <i class="fas fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #ef4444; color: white;">
                    <i class="fas fa-circle-exclamation me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- CONTENEDOR DE TABLAS Y FORMULARIOS -->
            <div class="main-content-wrapper p-4 border">
                @yield('content')
            </div>
        </main>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>