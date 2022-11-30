<?php

namespace App\Http\Controllers;

use App\Models\DetalleEntrada;
use Illuminate\Http\Request;

class DetallesEntradaController extends Controller
{
    public function index()
    {
        $detalleEntrada  = DetalleEntrada::all();
        return response()->json(["ListaDetalleEntrada" => $detalleEntrada]);
    }
}
