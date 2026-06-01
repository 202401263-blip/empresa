{{-- Menú del sidebar reorganizado en 4 bloques interactivos --}}

@php
    $isDashboard = request()->routeIs('dashboard');
    $isMaestros = request()->routeIs('operativa.ciudades.*', 'operativa.materiales.*', 'operativa.maquinarias.*');
    $isOperativa = request()->routeIs('operativa.clientes.*', 'operativa.contratos.*', 'operativa.proyectos.*', 'operativa.cotizaciones.*', 'operativa.cuotas.*', 'operativa.compras.*', 'operativa.inventario.*', 'operativa.paralizaciones.*', 'operativa.finalizadas.*');
    $isRRHH = request()->routeIs('rrhh.*', 'operativa.asistencia.*', 'operativa.maquinarias.asignaciones*');
    $isReportes = request()->routeIs('reportes.*', 'alertas.*', 'rrhh.feriados.*');
@endphp

<!-- BLOQUE 1: INICIO Y NAVEGACIÓN PRINCIPAL -->
@if(\Illuminate\Support\Facades\Route::has('dashboard'))
<x-sidebar-block 
    title="Inicio" 
    icon="fa-home"
    :expanded="$isDashboard"
    :items="[
        [
            'label' => 'Panel de control',
            'url' => route('dashboard'),
            'icon' => 'fa-gauge-high',
            'active' => request()->routeIs('dashboard')
        ]
    ]">
</x-sidebar-block>
@endif

<!-- BLOQUE 2: CONFIGURACIÓN Y MAESTROS -->
@if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh']))
@php
    $maestrosItems = [];
    
    if(Route::has('operativa.ciudades.index')) {
        $maestrosItems[] = [
            'label' => 'Ciudades',
            'url' => route('operativa.ciudades.index'),
            'icon' => 'fa-city',
            'active' => request()->routeIs('operativa.ciudades.*')
        ];
    }
    
    if(Route::has('operativa.materiales.index')) {
        $maestrosItems[] = [
            'label' => 'Materiales',
            'url' => route('operativa.materiales.index'),
            'icon' => 'fa-cubes-stacked',
            'active' => request()->routeIs('operativa.materiales.*')
        ];
    }
    
    if(Route::has('operativa.maquinarias.catalogo')) {
        $maestrosItems[] = [
            'label' => 'Catálogo maquinaria',
            'url' => route('operativa.maquinarias.catalogo'),
            'icon' => 'fa-truck-monster',
            'active' => request()->routeIs('operativa.maquinarias.catalogo*')
        ];
    }
    
    if(Route::has('rrhh.feriados.index') && Auth::user()->hasRole(['admin','rrhh'])) {
        $maestrosItems[] = [
            'label' => 'Feriados',
            'url' => route('rrhh.feriados.index'),
            'icon' => 'fa-calendar-day',
            'active' => request()->routeIs('rrhh.feriados.*')
        ];
    }
@endphp

@if(!empty($maestrosItems))
<x-sidebar-block 
    title="Configuración" 
    icon="fa-cogs"
    :expanded="$isMaestros"
    :items="$maestrosItems">
</x-sidebar-block>
@endif
@endif

<!-- BLOQUE 3: GESTIÓN OPERATIVA -->
@php
    $operativaItems = [];
    
    if(Auth::user()->hasRole(['admin','gerente','contab']) && Route::has('operativa.clientes.index')) {
        $operativaItems[] = [
            'label' => 'Clientes',
            'url' => route('operativa.clientes.index'),
            'icon' => 'fa-users',
            'active' => request()->routeIs('operativa.clientes.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','cliente']) && Route::has('operativa.contratos.index')) {
        $operativaItems[] = [
            'label' => 'Contratos',
            'url' => route('operativa.contratos.index'),
            'icon' => 'fa-file-signature',
            'active' => request()->routeIs('operativa.contratos.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh','cliente']) && Route::has('operativa.proyectos.index')) {
        $operativaItems[] = [
            'label' => 'Proyectos',
            'url' => route('operativa.proyectos.index'),
            'icon' => 'fa-diagram-project',
            'active' => request()->routeIs('operativa.proyectos.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra']) && Route::has('operativa.cotizaciones.index')) {
        $operativaItems[] = [
            'label' => 'Cotizaciones',
            'url' => route('operativa.cotizaciones.index'),
            'icon' => 'fa-file-invoice-dollar',
            'active' => request()->routeIs('operativa.cotizaciones.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','cliente']) && Route::has('operativa.cuotas.index')) {
        $operativaItems[] = [
            'label' => 'Cuotas de pago',
            'url' => route('operativa.cuotas.index'),
            'icon' => 'fa-money-check-dollar',
            'active' => request()->routeIs('operativa.cuotas.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','contab','jefe obra','logist']) && Route::has('operativa.compras.index')) {
        $operativaItems[] = [
            'label' => 'Compras',
            'url' => route('operativa.compras.index'),
            'icon' => 'fa-cart-shopping',
            'active' => request()->routeIs('operativa.compras.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','jefe obra','logist']) && Route::has('operativa.inventario.index')) {
        $operativaItems[] = [
            'label' => 'Inventario',
            'url' => route('operativa.inventario.index'),
            'icon' => 'fa-boxes-stacked',
            'active' => request()->routeIs('operativa.inventario.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','jefe obra']) && Route::has('operativa.paralizaciones.index')) {
        $operativaItems[] = [
            'label' => 'Paralizaciones',
            'url' => route('operativa.paralizaciones.index'),
            'icon' => 'fa-circle-pause',
            'active' => request()->routeIs('operativa.paralizaciones.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','cliente']) && Route::has('operativa.finalizadas.index')) {
        $operativaItems[] = [
            'label' => 'Obras terminadas',
            'url' => route('operativa.finalizadas.index'),
            'icon' => 'fa-flag-checkered',
            'active' => request()->routeIs('operativa.finalizadas.*')
        ];
    }
@endphp

@if(!empty($operativaItems))
<x-sidebar-block 
    title="Operativa" 
    icon="fa-tasks"
    :expanded="$isOperativa"
    :items="$operativaItems">
</x-sidebar-block>
@endif

<!-- BLOQUE 4: RECURSOS HUMANOS -->
@if(Auth::user()->hasRole(['admin','gerente','jefe obra','rrhh','logist']))
@php
    $rrhhItems = [];
    
    if(Auth::user()->hasRole(['admin','gerente','jefe obra','rrhh']) && Route::has('rrhh.empleados.index')) {
        $rrhhItems[] = [
            'label' => 'Empleados',
            'url' => route('rrhh.empleados.index'),
            'icon' => 'fa-user-tie',
            'active' => request()->routeIs('rrhh.empleados.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','jefe obra','rrhh']) && Route::has('rrhh.asignaciones.index')) {
        $rrhhItems[] = [
            'label' => 'Asign. personal',
            'url' => route('rrhh.asignaciones.index'),
            'icon' => 'fa-user-plus',
            'active' => request()->routeIs('rrhh.asignaciones.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','jefe obra','rrhh']) && Route::has('operativa.asistencia.index')) {
        $rrhhItems[] = [
            'label' => 'Control de horas',
            'url' => route('operativa.asistencia.index'),
            'icon' => 'fa-clock',
            'active' => request()->routeIs('operativa.asistencia.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','jefe obra','logist']) && Route::has('operativa.maquinarias.asignaciones')) {
        $rrhhItems[] = [
            'label' => 'Asign. maquinaria',
            'url' => route('operativa.maquinarias.asignaciones'),
            'icon' => 'fa-tractor',
            'active' => request()->routeIs('operativa.maquinarias.asignaciones*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','contab','rrhh']) && Route::has('rrhh.pagos.index')) {
        $rrhhItems[] = [
            'label' => 'Pagos / planillas',
            'url' => route('rrhh.pagos.index'),
            'icon' => 'fa-hand-holding-dollar',
            'active' => request()->routeIs('rrhh.pagos.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','jefe obra']) && Route::has('rrhh.permisos.index')) {
        $rrhhItems[] = [
            'label' => 'Permisos y trámites',
            'url' => route('rrhh.permisos.index'),
            'icon' => 'fa-file-circle-check',
            'active' => request()->routeIs('rrhh.permisos.*')
        ];
    }
@endphp

@if(!empty($rrhhItems))
<x-sidebar-block 
    title="Recursos Humanos" 
    icon="fa-people-group"
    :expanded="$isRRHH"
    :items="$rrhhItems">
</x-sidebar-block>
@endif
@endif

<!-- BLOQUE 5: REPORTES Y MONITOREO -->
@php
    $reportesItems = [];
    
    if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist']) && Route::has('reportes.costos.index')) {
        $reportesItems[] = [
            'label' => 'Resumen costos',
            'url' => route('reportes.costos.index'),
            'icon' => 'fa-chart-pie',
            'active' => request()->routeIs('reportes.costos.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin','gerente','contab','jefe obra','logist','rrhh']) && Route::has('alertas.index')) {
        $reportesItems[] = [
            'label' => 'Alertas y Notificaciones',
            'url' => route('alertas.index'),
            'icon' => 'fa-bell',
            'active' => request()->routeIs('alertas.*')
        ];
    }
    
    if(Auth::user()->hasRole(['admin']) && Route::has('reportes.log.index')) {
        $reportesItems[] = [
            'label' => 'Log de cambios',
            'url' => route('reportes.log.index'),
            'icon' => 'fa-shield-halved',
            'active' => request()->routeIs('reportes.log.*')
        ];
    }
@endphp

@if(!empty($reportesItems))
<x-sidebar-block 
    title="Reportes" 
    icon="fa-chart-line"
    :expanded="$isReportes"
    :items="$reportesItems">
</x-sidebar-block>
@endif
