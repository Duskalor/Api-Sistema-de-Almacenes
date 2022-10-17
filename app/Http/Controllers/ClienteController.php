<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        return response()->json([
            "clientes" => $cliente,
            "mensaje" => " todos los clientes"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "FullName" => "required",
            "Dni" => "required"
        ]);

        $cliente = new Cliente();
        $cliente->FullName = $request->FullName;
        $cliente->Dni = $request->Dni;
        $cliente->save();


        return response()->json([
            "mensaje" => "Cliente creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "FullName" => "required",
            "Dni" => "required"
        ]);

        $cliente = Cliente::find($id);
        $cliente->FullName = $request->FullName;
        $cliente->Dni = $request->Dni;
        $cliente->save();


        return response()->json([
            "mensaje" => "Cliente Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $cliente  = Cliente::find($id);
        $cliente->delete();
        return response()->json(
            ["mensaje" => "Cliente Eliminado"]
        );
    }
}
