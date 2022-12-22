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

    public function update(Request $request, $id)
    {

        $request->validate([
            "IdEntrada" => "required",
            "IdProducto" => "required",
            "PrecioCompra" => "required",
            "Cantidad" => "required",
            "SubTotal" => "required",
        ]);

        $Entrada = DetalleEntrada::find($id);
        $Entrada->IdEntrada = $request->IdEntrada;
        $Entrada->IdProducto = $request->IdProducto;
        $Entrada->Cantidad = $request->Cantidad;
        $Entrada->SubTotal = $request->SubTotal;
        $Entrada->save();

        $Entrada = DetalleEntrada::all();
        return response()->json([
            "ListaEntradas" => $Entrada,
            "mensaje" => "Entrada Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Entrada  = DetalleEntrada::find($id);
        $Entrada->delete();
        $Entrada = DetalleEntrada::all();
        return response()->json(
            [
                "ListaEntradas" => $Entrada,
                "mensaje" => "Entrada Eliminada"
            ]
        );
    }
}
