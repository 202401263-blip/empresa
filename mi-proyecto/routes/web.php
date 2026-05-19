<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard'); // O redirige a /ciudades
});


use App\Http\Controllers\CiudadController;
Route::get('/ciudades', [CiudadController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
});


use App\Http\Controllers\ProyectoController; // No olvides esta línea
// Esta ruta mostrará la lista de proyectos
Route::get('/proyectos', [ProyectoController::class, 'index']);
// Esta ruta servirá para guardar nuevos proyectos
Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');

Route::get('/proyectos', [App\Http\Controllers\ProyectoController::class, 'index'])->name('proyectos.index');
