<?php

namespace App\Http\Controllers\GestionOperativa;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all(); // Trae todos los clientes de SQL Server
        return view('operativa.clientes.index', compact('clientes'));
    }
}