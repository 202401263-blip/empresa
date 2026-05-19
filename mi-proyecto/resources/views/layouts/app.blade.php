<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Constructora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #212529; color: white; padding: 20px; }
        .sidebar a { color: #adb5bd; text-decoration: none; display: block; padding: 10px; }
        .sidebar a:hover { background: #343a40; color: white; }
    </style>
</head>
<body class="d-flex">
    <div class="sidebar col-md-2">
        <h4>Constructora</h4>
        <hr>
        <a href="/">🏠 Inicio</a>
        <a href="/ciudades">📍 Ciudades</a>
        <a href="#">👷 Empleados</a>
        <a href="{{ route('proyectos.index') }}">🏗️ Proyectos</a>
    </div>
    <div class="p-4 w-100 bg-light">
        @yield('content')
    </div>
</body>
</html>

