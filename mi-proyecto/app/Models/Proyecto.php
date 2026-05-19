<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'empresa_constructora5.proyecto';
    protected $primaryKey = 'id_proyecto';
    public $timestamps = false;

    // Campos que permitiremos llenar desde el formulario
    protected $fillable = [
        'id_contrato', 'nombre_proyecto', 'codigo_proyecto', 
        'ubicacion', 'coordenadas_gps', 'fecha_inicio_real', 
        'fecha_fin_programada', 'porcentaje_avance', 'estado', 
        'tipo_obra', 'superficie_m2'
    ];
}