<?php

namespace App\Http\Controllers\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        //  los empleados 
        $empleados = Empleado::all(); 
        return view('rrhh.empleados.index', compact('empleados'));
    }

    public function asignaciones() 
    {
    //  asignaciones con sus relaciones 
    $asignaciones = \App\Models\AsignacionEmpleado::with(['empleado', 'proyecto'])->get();
    return view('rrhh.asignaciones.index', compact('asignaciones'));
    }

    public function pagos()
   {
    //  los pagos con la información del empleado
    $pagos = \App\Models\PagoEmpleado::with('empleado')->get();
    return view('rrhh.pagos.index', compact('pagos'));
   }
     
       public function permisos()
    {
    // los permisos
    $permisos = \App\Models\Permiso::with('proyecto')->get();
    
    return view('rrhh.permisos.index', compact('permisos'));

    }

    public function feriados()
{
    // Usamos all() directamente porque no hay tablas relacionadas
    $feriados = \App\Models\Feriado::all(); 
    
    return view('rrhh.feriados.index', compact('feriados'));
}
}