<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $Entrada = Entrada::all();
        return response()->json([
            "ListaEntradas" => $Entrada,
            "mensaje" => " todos las Entradas"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "NumeroDocumento" => "required|unique:entradas",
            "IdUsuario" => "required",
            "IdProveedor" => "required",
        ]);

        $Entrada = new Entrada();
        $Entrada->NumeroDocumento = $request->NumeroDocumento;
        $Entrada->IdUsuario = $request->IdUsuario;
        $Entrada->IdProveedor = $request->IdProveedor;
        $Entrada->save();
        $Entrada = Entrada::all();

        return response()->json([
            "ListaEntradas" => $Entrada,
            "mensaje" => "Entrada creada"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "IdUsuario" => "required",
            "IdProveedor" => "required",
        ]);

        $Entrada = Entrada::find($id);
        $Entrada->IdUsuario = $request->IdUsuario;
        $Entrada->IdProveedor = $request->IdProveedor;
        $Entrada->save();

        $Entrada = Entrada::all();
        return response()->json([
            "ListaEntradas" => $Entrada,
            "mensaje" => "Entrada Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Entrada  = Entrada::find($id);
        $Entrada->delete();
        $Entrada = Entrada::all();
        return response()->json(
            [
                "ListaEntradas" => $Entrada,
                "mensaje" => "Entrada Eliminada"
            ]
        );
    }
}
