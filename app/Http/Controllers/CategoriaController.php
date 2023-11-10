<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categoria = Categoria::all();
        return response()->json(["Categoria" => $Categoria]);
    }

    /**     
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["Categoria" => "required|unique:categorias"]);

        $Categoria = new Categoria();
        $Categoria->Categoria = $request->Categoria;
        $Categoria->save();

        $Categoria = Categoria::all();

        return response()->json(["Categoria" => $Categoria, "mensaje" => "Categoria creada"]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(["Categoria" => "required"]);

        $Categoria = Categoria::find($id);
        $Categoria->Categoria = $request->Categoria;
        $Categoria->save();

        $Categoria = Categoria::all();
        return response()->json([
            "Categoria" => $Categoria,
            "mensaje" => "Categoria Actualizada"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Categoria  = Categoria::find($id);
        $Categoria->active = false;
        $Categoria->save();


        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $Categorias = Categoria::all();
            return response()->json([
                "ListaCategorias" => $Categorias,
                "mensaje" => "Categoria Eliminada"
            ]);
        } else {
            $Categorias = Categoria::where("active", true)->get();

            return response()->json(
                [
                    "ListaCategorias" => $Categorias,
                    "mensaje" => " todos los Categorias"
                ]
            );
        }
    }
}
