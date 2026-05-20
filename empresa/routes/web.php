<?php

// En routes/web.php

use App\Http\Controllers\DashboardController;

// Esta es la que cambia la pantalla de inicio
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Tus otras rutas de gestión operativa se mantienen abajo...

use App\Http\Controllers\GestionOperativa\ClienteController;
use App\Http\Controllers\GestionOperativa\ProyectoController;
use App\Http\Controllers\GestionOperativa\RegistroHoraController;
use App\Http\Controllers\GestionOperativa\ParalizacionController;
use App\Http\Controllers\GestionOperativa\ObraTerminadaController;
 use App\Http\Controllers\RRHH\EmpleadoController;

Route::prefix('gestion-operativa')->group(function () {
    // Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('operativa.clientes.index');
    
    // Proyectos
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('operativa.proyectos.index');
    
    // Registro de Horas Diarias
    Route::get('/registro_horas_diaria', [RegistroHoraController::class, 'index'])->name('operativa.asistencia.index');
    // Paralizaciones
    Route::get('/paralizacion_obra', [ParalizacionController::class, 'index'])->name('operativa.paralizaciones.index');
  
    // obras terminadas
    Route::get('/obras_terminadas', [ObraTerminadaController::class, 'index'])->name('operativa.finalizadas.index');

});


Route::prefix('recursos-humanos')->group(function () {
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('rrhh.empleados.index');

    Route::get('/asignaciones', [EmpleadoController::class, 'asignaciones'])->name('rrhh.asignaciones.index');

    Route::get('/pagos', [EmpleadoController::class, 'pagos'])->name('rrhh.pagos.index');

    Route::get('/permisos', [EmpleadoController::class, 'permisos'])->name('rrhh.permisos.index');

    
    Route::get('/rrhh/feriados', [EmpleadoController::class, 'feriados'])->name('rrhh.feriados.index');
    });