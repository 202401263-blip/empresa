<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Constructora - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar-interactive.css') }}">
    <style>
        :root {
            --primary-color: #0d6efd;
            --sidebar-bg: #1a1f24;
            --sidebar-hover: #252a30;
            --text-muted: #adb5bd;
            --text-white: #ffffff;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            --bs-body-color: #212529;
        }

        body { 
            background-color: #f0f2f5; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, #0f1217 100%);
            color: white;
            padding: 20px 10px;
            position: sticky;
            top: 0;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #495057 transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #495057;
            border-radius: 3px;
        }

        .sidebar .nav-link {
            color: var(--text-muted);
            padding: 10px 15px;
            transition: var(--transition-smooth);
            border-radius: 6px;
            margin: 4px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            position: relative;
        }

        .sidebar .nav-link:hover {
            background: rgba(13, 110, 253, 0.15);
            color: var(--text-white);
            padding-left: 18px;
        }

        .sidebar .nav-link i { 
            width: 20px; 
            text-align: center;
            font-size: 0.9rem;
        }

        .sidebar .nav-link span {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .active-link {
            background: rgba(13, 110, 253, 0.25) !important;
            color: var(--primary-color) !important;
            font-weight: 600;
            border-left: 3px solid var(--primary-color);
            padding-left: 12px !important;
        }

        .active-link i {
            color: var(--primary-color);
        }

        .submenu .nav-link {
            padding: 8px 20px 8px 45px !important;
            font-size: 0.85em;
        }

        hr { 
            border-top: 1px solid #495057; 
            margin: 1rem 10px; 
        }

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

                <!-- MENÚ REFACTORIZADO EN 4 BLOQUES INTERACTIVOS -->
                @include('partials.sidebar-menu')

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
    <script src="{{ asset('js/sidebar-interactive.js') }}"></script>
</body>
</html>
