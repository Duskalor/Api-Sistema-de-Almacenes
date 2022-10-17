<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedor = Proveedor::all();
        return response()->json([
            "proveedor" => $proveedor,
            "mensaje" => " todos los proveedor"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "FullName" => "required",
            "Ruc" => "required"
        ]);

        $proveedor = new Proveedor();
        $proveedor->FullName = $request->FullName;
        $proveedor->Ruc = $request->Ruc;
        $proveedor->save();


        return response()->json([
            "mensaje" => "Proveedor creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "FullName" => "required",
            "Ruc" => "required"
        ]);

        $proveedor = Proveedor::find($id);
        $proveedor->FullName = $request->FullName;
        $proveedor->Ruc = $request->Ruc;
        $proveedor->save();


        return response()->json([
            "mensaje" => "Proveedor Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Proveedor  = Proveedor::find($id);
        $Proveedor->delete();
        return response()->json(
            ["mensaje" => "Proveedor Eliminado"]
        );
    }
}
