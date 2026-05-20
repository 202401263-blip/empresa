<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    protected $table = 'empresa_constructora5.feriado';
    protected $primaryKey = 'id_feriado';
    public $timestamps = false;

    // Estos campos deben coincidir con tu imagen
    protected $fillable = [
        'fecha', 
        'nombre', 
        'tipo', 
        'departamento', 
        'recargo_pct'
    ];
}