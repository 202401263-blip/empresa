<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function costos()
    {
        // Ejecuta el procedimiento almacenado para refrescar los datos
        DB::statement('EXEC dbo.p_refrescar_resumen_costos');

        // Obtiene los datos de la tabla con el esquema completo
        $datos = DB::table('empresa_constructora5.resumen_costos_proyecto')->get();

        return view('reportes.costos.index', compact('datos'));
    }
}


