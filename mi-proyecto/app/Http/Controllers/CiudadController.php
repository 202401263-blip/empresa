<?php

namespace App\Http\Controllers;

use App\Models\Ciudad; // Importamos tu modelo (con C mayúscula)
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        // Obtenemos todas las ciudades de la tabla empresa_constructora5.ciudad
        $ciudades = Ciudad::all();

        // Enviamos los datos a una vista llamada 'ciudades.index'
        return view('ciudades.index', compact('ciudades'));
    }
}