<?php

namespace App\Http\Controllers\GestionOperativa; // ¡Recuerda: sin espacios antes de esto!

use App\Http\Controllers\Controller;
use App\Models\ParalizacionObra;
use Illuminate\Http\Request;

class ParalizacionController extends Controller
{
    public function index()
    {
        $paralizaciones = ParalizacionObra::with('proyecto')->get();
        return view('operativa.paralizaciones.index', compact('paralizaciones'));
    }
}