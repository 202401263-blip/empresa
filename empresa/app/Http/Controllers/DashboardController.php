<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Proyecto;
use App\Models\RegistroHoraDiario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contamos datos reales de tu SQL Server
        $totalClientes = Cliente::count();
        $totalProyectos = Proyecto::count();
        $totalHoras = RegistroHoraDiario::sum('horas_normales');
        
        // Traemos los últimos 5 proyectos para una tabla rápida
        $ultimosProyectos = Proyecto::latest('id_proyecto')->take(5)->get();

        return view('dashboard', compact('totalClientes', 'totalProyectos', 'totalHoras', 'ultimosProyectos'));
    }
}