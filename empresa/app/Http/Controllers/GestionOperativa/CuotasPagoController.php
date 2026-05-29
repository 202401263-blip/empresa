<?php

namespace App\Http\Controllers\GestionOperativa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuotasPagoController extends Controller
{
    public function index()
    {
        // Fuente principal: vista SQL Server con cálculos dinámicos de estado/días de retraso.
        $cuotas = DB::table('empresa_constructora5.v_estado_cuotas')
            ->orderBy('fecha_vencimiento')
            ->get()
            ->map(fn ($row) => (array) $row);

        return view('operativa.cuotas.index', compact('cuotas'));
    }
 
    public function create()
    {
        $contratos = \App\Models\Contrato::with('cliente')->orderByDesc('id_contrato')->get();
        return view('operativa.cuotas.create', compact('contratos'));
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_contrato'      => 'required|integer',
            'numero_cuota'     => 'required|integer|min:1',
            'monto_cuota'      => 'required|numeric|min:0',
            'fecha_vencimiento'=> 'required|date',
            'estado_cuota'     => 'required|in:pendiente,pagada_tiempo,pagada_tarde,vencida',
            'observaciones'    => 'nullable|string',
        ]);
 
        \App\Models\CuotasPago::create($data);
        return redirect()->route('operativa.cuotas.index')
                         ->with('success', 'Cuota registrada.');
    }
 
    public function edit($id)
    {
        $cuota     = \App\Models\CuotasPago::findOrFail($id);
        $contratos = \App\Models\Contrato::with('cliente')->orderByDesc('id_contrato')->get();
        return view('operativa.cuotas.edit', compact('cuota', 'contratos'));
    }
 
    public function update(Request $request, $id)
    {
        $cuota = \App\Models\CuotasPago::findOrFail($id);
        $data  = $request->validate([
            'monto_cuota'      => 'required|numeric|min:0',
            'fecha_vencimiento'=> 'required|date',
            'fecha_pago_real'  => 'nullable|date',
            'monto_pagado'     => 'nullable|numeric|min:0',
            // estado_cuota lo cambia el trigger trg_cuota_estado_al_pagar
            'observaciones'    => 'nullable|string',
        ]);
 
        $cuota->update($data);
        return redirect()->route('operativa.cuotas.index')
                         ->with('success', 'Cuota actualizada. El estado fue ajustado por el trigger.');
    }
 
    public function destroy($id)
    {
        \App\Models\CuotasPago::findOrFail($id)->delete();
        return redirect()->route('operativa.cuotas.index')
                         ->with('success', 'Cuota eliminada.');
    }

    public function registrarPago(Request $request, $id)
    {
        $data = $request->validate([
            'fecha_pago_real' => 'required|date',
            'monto_pagado' => 'required|numeric|min:0',
        ]);

        DB::table('empresa_constructora5.cuotas_pago')
            ->where('id_cuota', $id)
            ->update([
                'fecha_pago_real' => $data['fecha_pago_real'],
                'monto_pagado' => $data['monto_pagado'],
            ]);

        return redirect()->route('operativa.cuotas.index')
            ->with('success', 'Pago registrado. El estado de cuota se recalcula automáticamente en base de datos.');
    }

    public function reanudarObra($id)
    {
        // Queda preparado para invocar el SP de reanudación.
        // Si tu SP requiere parámetros, aquí se pueden pasar.
        DB::statement('EXEC empresa_constructora5.p_reanudar_obra');

        return redirect()->route('operativa.cuotas.index')
            ->with('success', "Procedimiento p_reanudar_obra() ejecutado para la cuota {$id}.");
    }
}
