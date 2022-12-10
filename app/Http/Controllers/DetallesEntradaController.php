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

    public function store(Request $request)
    {
        $request->validate([
            "IdEntrada" => "required",
            "IdProducto" => "required",
            "PrecioCompra" => "required",
            "Cantidad" => "required",
            "SubTotal" => "required",
        ]);

        $Entrada = new DetalleEntrada();
        $Entrada->IdEntrada = $request->IdEntrada;
        $Entrada->IdProducto = $request->IdProducto;
        $Entrada->PrecioCompra = $request->PrecioCompra;
        $Entrada->Cantidad = $request->Cantidad;
        $Entrada->SubTotal = $request->SubTotal;
        $Entrada->save();

        $detalleEntrada = DetalleEntrada::all();
        return response()->json(["ListaDetalleEntrada" => $detalleEntrada]);
    }
}
