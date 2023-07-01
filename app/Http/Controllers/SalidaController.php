<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {

        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $Salida = Salida::all();
            return response()->json([
                "ListaSalidas" => $Salida,
                "mensaje" => "todos las Salidas"
            ]);
        } else {
            $Salidas = Salida::where("active", true)->get();

            return response()->json(
                [
                    "ListaSalidas" => $Salidas,
                    "mensaje" => " todos las Salidas"
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "NumeroDocumento" => "required|unique:Salidas",
            "IdUsuario" => "required",
            "CantidadProductos" => "required",
            "razonSalida" => "required",
            "IdAlmacenes" => "required",
        ]);

        $Salida = new Salida();
        $Salida->NumeroDocumento = $request->NumeroDocumento;
        $Salida->IdAlmacenes = $request->IdAlmacenes;
        $Salida->IdUsuario = $request->IdUsuario;
        $Salida->active = true;
        $Salida->CantidadProductos = $request->CantidadProductos;
        $Salida->razonSalida = $request->razonSalida;
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
            "IdUsuario" => "required",
            "CantidadProductos" => "required",
            "razonSalida" => "required",
        ]);

        $Salida = Salida::find($id);
        $Salida->IdUsuario = $request->IdUsuario;
        $Salida->CantidadProductos = $request->CantidadProductos;
        $Salida->razonSalida = $request->razonSalida;
        $Salida->save();

        $Salida = Salida::all();
        return response()->json([
            "ListaSalidas" => $Salida,
            "mensaje" => "Salida Actualizado"
        ]);
    }

    public function destroy($id)
    {
        // $Salida  = Salida::find($id);
        // $Salida->delete();
        // $Salida = Salida::all();
        // return response()->json(
        //     [
        //         "ListaSalidas" => $Salida,
        //         "mensaje" => "Salida Eliminada"
        //     ]
        // );

        $Salida  = Salida::find($id);
        $Salida->active = false;
        $Salida->save();


        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $salidas = Salida::all();
            return response()->json([
                "ListaSalidas" => $salidas,
                "mensaje" => "Salida Eliminado"
            ]);
        } else {
            $salidas = salida::where("active", true)->get();

            return response()->json(
                [
                    "ListaSalidas" => $salidas,
                    "mensaje" => "Salida Eliminado"
                ]
            );
        }
    }
}
