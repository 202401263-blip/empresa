<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ciudad extends Model // Debe ser idéntico al nombre del archivo
{
    protected $table = 'empresa_constructora5.ciudad';
    protected $primaryKey = 'id_ciudad';
    public $timestamps = false;
}