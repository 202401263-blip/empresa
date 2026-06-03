<?php

namespace App\Http\Controllers\GestionOperativa;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function index()
    {
        // Traemos los proyectos con su contrato para no hacer consultas de más
        $proyectos = Proyecto::all(); 
        return view('operativa.proyectos.index', compact('proyectos'));
    }
}