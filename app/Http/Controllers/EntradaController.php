<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {

        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $entrada = Entrada::all();
            return response()->json([
                "ListaEntradas" => $entrada,
                "mensaje" => "entrada Eliminado"
            ]);
        } else {
            $entradas = entrada::where("active", true)->get();

            return response()->json(
                [
                    "ListaEntradas" => $entradas,
                    "mensaje" => " todos los entradas"
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "NumeroDocumento" => "required|unique:entradas",
            "IdUsuario" => "required",
            "CantidadProductos" => "required",
            "razonEntrada" => "required",
            "IdAlmacenes" => "required",
            "IdEmpleados" => "required",
        ]);

        $Entrada = new Entrada();
        $Entrada->NumeroDocumento = $request->NumeroDocumento;
        $Entrada->IdAlmacenes = $request->IdAlmacenes;
        $Entrada->IdEmpleados = $request->IdEmpleados;
        $Entrada->IdUsuario = $request->IdUsuario;
        $Entrada->active = true;
        $Entrada->CantidadProductos = $request->CantidadProductos;
        $Entrada->razonEntrada = $request->razonEntrada;
        $Entrada->save();

        $Entradas = Entrada::all();

        return response()->json([
            "Entrada" => $Entrada,
            "ListaEntradas" => $Entradas,
            "mensaje" => "Entrada creada"
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            // "IdUsuario" => "required",
            "CantidadProductos" => "required",
            // "MontoTotal" => "required",
            "razonEntrada" => "required",
            "active" => "required",
        ]);

        $Entrada = Entrada::find($id);
        // $Entrada->IdUsuario = $request->IdUsuario;
        $Entrada->razonEntrada = $request->razonEntrada;
        $Entrada->active = $request->active;
        $Entrada->CantidadProductos = $request->CantidadProductos;
        // $Entrada->MontoTotal = $request->MontoTotal;
        $Entrada->save();

        $Entrada = Entrada::all();
        return response()->json([
            "ListaEntradas" => $Entrada,
            "mensaje" => "Entrada Actualizado"
        ]);
    }

    public function destroy($id)
    {

        $entrada  = Entrada::find($id);
        $entrada->active = false;
        $entrada->save();


        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $entradas = Entrada::all();
            return response()->json([
                "ListaEntradas" => $entradas,
                "mensaje" => "entrada Eliminado"
            ]);
        } else {
            $entradas = entrada::where("active", true)->get();

            return response()->json(
                [
                    "ListaEntradas" => $entradas,
                    "mensaje" => " todos los entradas"
                ]
            );
        }
    }
}
