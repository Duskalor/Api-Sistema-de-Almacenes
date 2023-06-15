<?php

namespace App\Http\Controllers;

use App\Models\DetalleSalida;
use Illuminate\Http\Request;

class DetallesSalidaController extends Controller
{
    public function index()
    {
        $detalleSalida  = DetalleSalida::all();
        return response()->json(["ListaDetalleSalida" => $detalleSalida]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "IdSalida" => "required",
            "IdProducto" => "required",
            "Cantidad" => "required",
        ]);

        $Salida = new DetalleSalida();
        $Salida->IdSalida = $request->IdSalida;
        $Salida->IdProducto = $request->IdProducto;
        $Salida->Cantidad = $request->Cantidad;
        $Salida->save();

        $DetalleSalida = DetalleSalida::all();
        return response()->json(["ListaDetalleSalida" => $DetalleSalida]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            "IdSalida" => "required",
            "IdProducto" => "required",
            "Cantidad" => "required",
        ]);

        $Salida = DetalleSalida::find($id);
        $Salida->IdSalida = $request->IdSalida;
        $Salida->IdProducto = $request->IdProducto;
        $Salida->Cantidad = $request->Cantidad;
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
