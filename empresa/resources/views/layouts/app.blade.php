<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Constructora - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Estilos Sidebar */
        .sidebar {
            min-height: 100vh;
            background-color: #212529; /* Fondo oscuro formal */
            color: white;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 12px 20px;
            transition: all 0.3s;
            border-radius: 4px;
            margin: 2px 10px;
        }
        .sidebar .nav-link:hover {
            background: #343a40;
            color: #ffffff;
        }
        .sidebar .nav-link i {
            width: 25px;
        }
        /* Link Activo */
        .active-link {
            background: #0d6efd !important;
            color: white !important;
        }
        /* Submenús */
        .submenu .nav-link {
            padding: 8px 20px 8px 45px !important;
            font-size: 0.85em;
        }
        hr {
            border-top: 1px solid #495057;
            margin: 1rem 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar shadow">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-white">CONSTRUCTORA</h4>
                    <hr>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') || request()->is('/') ? 'active-link' : '' }}">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('gestion-operativa*') ? 'text-white fw-bold' : '' }}" 
                           data-bs-toggle="collapse" 
                           href="#menuOperativa" 
                           role="button" 
                           aria-expanded="{{ request()->is('gestion-operativa*') ? 'true' : 'false' }}">
                            <span><i class="fas fa-hard-hat"></i> Gestión Operativa</span>
                            <i class="fas fa-chevron-down small"></i>
                        </a>
                        
                        <div class="collapse {{ request()->is('gestion-operativa*') ? 'show' : '' }}" id="menuOperativa">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a href="{{ route('operativa.clientes.index') }}" class="nav-link {{ request()->is('*clientes*') ? 'text-white fw-bold' : '' }}">
                                        Clientes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('operativa.proyectos.index') }}" class="nav-link {{ request()->is('*proyectos*') ? 'text-white fw-bold' : '' }}">
                                        Proyectos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/gestion-operativa/registro_horas_diaria') }}" class="nav-link {{ request()->is('*registro_horas*') ? 'text-white fw-bold' : '' }}">
                                        Control de Horas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/gestion-operativa/paralizacion_obra') }}" class="nav-link {{ request()->is('*paralizacion*') ? 'text-white fw-bold' : '' }}">
                                        Paralizaciones
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/gestion-operativa/obras_terminadas') }}" class="nav-link {{ request()->is('*obras_terminadas*') ? 'text-white fw-bold' : '' }}">
                                        Obras Finalizadas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('recursos-humanos*') ? 'text-white fw-bold' : '' }}" 
                           data-bs-toggle="collapse" 
                           href="#menuRRHH" 
                           role="button" 
                           aria-expanded="{{ request()->is('recursos-humanos*') ? 'true' : 'false' }}">
                            <span><i class="fas fa-users-cog"></i> Recursos Humanos</span>
                            <i class="fas fa-chevron-down small"></i>
                        </a>
                        
                        <div class="collapse {{ request()->is('recursos-humanos*') ? 'show' : '' }}" id="menuRRHH">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a href="{{ route('rrhh.empleados.index') }}" class="nav-link {{ request()->is('*empleados*') ? 'text-white fw-bold' : '' }}">
                                        Maestro Empleados
                                    </a>

                                    </li>
                                <li class="nav-item">
                                     <a href="{{ route('rrhh.asignaciones.index') }}" class="nav-link">Asignaciones</a>
                                    
                                    </li>
                                <li class="nav-item">
                                    <a href="{{ route('rrhh.pagos.index') }}" class="nav-link">Pagos / Planillas</a>
                                </li>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('rrhh.permisos.index') }}" class="nav-link {{ request()->is('*permisos*') ? 'active-link' : '' }}">
                                        Permisos / Trámites
                                    </a>
                             <li class="nav-item">
                <a href="{{ route('rrhh.feriados.index') }}" 
                   class="nav-link {{ request()->is('*feriados*') ? 'text-danger fw-bold' : 'text-white-50' }}">
                    <i class="fas fa-calendar-day me-2"></i> Feriados
                </a>
            </li>
                                
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <div class="bg-white p-4 shadow-sm rounded border">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>