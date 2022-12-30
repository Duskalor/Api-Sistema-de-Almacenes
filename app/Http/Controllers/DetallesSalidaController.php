<?php

namespace App\Http\Controllers;

use App\Models\DetalleSalida;
use Illuminate\Http\Request;

class DetallesSalidaController extends Controller
{
    public function index()
    {
        $detalleSalida  = DetalleSalida::all();
        return response()->json(["ListadetallesSalida" => $detalleSalida]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "IdSalida" => "required",
            "IdProducto" => "required",
            "PrecioVenta" => "required",
            "Cantidad" => "required",
            "SubTotal" => "required",
        ]);

        $Salida = new DetalleSalida();
        $Salida->IdSalida = $request->IdSalida;
        $Salida->IdProducto = $request->IdProducto;
        $Salida->PrecioVenta = $request->PrecioVenta;
        $Salida->Cantidad = $request->Cantidad;
        $Salida->SubTotal = $request->SubTotal;
        $Salida->save();

        $DetalleSalida = DetalleSalida::all();
        return response()->json(["ListaDetalleSalida" => $DetalleSalida]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            "IdSalida" => "required",
            "IdProducto" => "required",
            "PrecioVenta" => "required",
            "Cantidad" => "required",
            "SubTotal" => "required",
        ]);

        $Salida = DetalleSalida::find($id);
        $Salida->IdSalida = $request->IdSalida;
        $Salida->IdProducto = $request->IdProducto;
        $Salida->PrecioVenta = $request->PrecioVenta;
        $Salida->Cantidad = $request->Cantidad;
        $Salida->SubTotal = $request->SubTotal;
        $Salida->save();

        $Salida = DetalleSalida::all();
        return response()->json([
            "ListaSalidas" => $Salida,
            "mensaje" => "Salida Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Salida  = DetalleSalida::find($id);
        $Salida->delete();
        $Salida = DetalleSalida::all();
        return response()->json(
            [
                "ListaSalidas" => $Salida,
                "mensaje" => "Salida Eliminada"
            ]
        );
    }
}
