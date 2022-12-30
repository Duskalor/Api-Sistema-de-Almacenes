<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $Salida = Salida::all();
        return response()->json([
            "ListaSalidas" => $Salida,
            "mensaje" => " todos las Salidas"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "NumeroDocumento" => "required|unique:Salidas",
            "IdCliente" => "required",
            "IdUsuario" => "required",
            "CantidadProductos" => "required",
            "MontoTotal" => "required",
        ]);

        $Salida = new Salida();
        $Salida->NumeroDocumento = $request->NumeroDocumento;
        $Salida->IdCliente = $request->IdCliente;
        $Salida->IdUsuario = $request->IdUsuario;
        $Salida->CantidadProductos = $request->CantidadProductos;
        $Salida->MontoTotal = $request->MontoTotal;
        $Salida->save();

        $Salidas = Salida::all();

        return response()->json([
            "Salida" => $Salida,
            "ListaSalidas" => $Salidas,
            "mensaje" => "Salida creada"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "IdCliente" => "required",
            "IdUsuario" => "required",
            "CantidadProductos" => "required",
            "MontoTotal" => "required",
        ]);

        $Salida = Salida::find($id);
        $Salida->IdCliente = $request->IdCliente;
        $Salida->IdUsuario = $request->IdUsuario;
        $Salida->CantidadProductos = $request->CantidadProductos;
        $Salida->MontoTotal = $request->MontoTotal;
        $Salida->save();

        $Salida = Salida::all();
        return response()->json([
            "ListaSalidas" => $Salida,
            "mensaje" => "Salida Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Salida  = Salida::find($id);
        $Salida->delete();
        $Salida = Salida::all();
        return response()->json(
            [
                "ListaSalidas" => $Salida,
                "mensaje" => "Salida Eliminada"
            ]
        );
    }
}
