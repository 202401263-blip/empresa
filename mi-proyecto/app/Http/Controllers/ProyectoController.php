<?php

namespace App\Http\Controllers;

use App\Models\Proyecto; // Importamos el modelo
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        // Traemos todos los proyectos de la base de datos
        $proyectos = Proyecto::all();

        // Retornamos la vista pasándole los datos
        return view('proyectos.index', compact('proyectos'));
    }
}