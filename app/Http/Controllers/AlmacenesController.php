<?php

namespace App\Http\Controllers;

use App\Models\Almacenes;
use App\Models\Producto;
use Illuminate\Http\Request;

class AlmacenesController extends Controller
{
    public function index()
    {
        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $almacenes = Almacenes::all();
            return response()->json([
                "ListaAlmacenes" => $almacenes,
                "mensaje" => " todos los Almacenes"
            ]);
        } else {
            $almacenes = Almacenes::where("active", true)->get();

            return response()->json(
                [
                    "ListaAlmacenes" => $almacenes,
                    "mensaje" => " todos los Almacenes"
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"       => "required|unique:almacenes",
            "ubicacion"  => "required",
            "Direccion"    => "required",
        ]);

        $almacen = new Almacenes();
        $almacen->name = $request->name;
        $almacen->ubicacion = $request->ubicacion;
        $almacen->active = true;
        $almacen->Direccion = $request->Direccion;
        $almacen->save();

        $almacenes = Almacenes::all();
        return response()->json([
            "ListaAlmacenes" => $almacenes,
            "mensaje" => "almacen creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "ubicacion" => "required",
            "active" => "required",
            "Direccion" => "required"
        ]);

        $almacen = Almacenes::find($id);
        $almacen->name = $request->name;
        $almacen->ubicacion = $request->ubicacion;
        $almacen->active = $request->active;
        $almacen->Direccion = $request->Direccion;
        $almacen->save();

        $almacenes = Almacenes::all();
        return response()->json([
            "ListaAlmacenes" => $almacenes,
            "mensaje" => "Almacen Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $producto  = Almacenes::find($id);
        $producto->active = false;
        $producto->save();


        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $almacenes = Almacenes::all();
            return response()->json([
                "ListaAlmacenes" => $almacenes,
                "mensaje" => "almacen Eliminado"
            ]);
        } else {
            $almacenes = Almacenes::where("active", true)->get();

            return response()->json(
                [
                    "ListaAlmacenes" => $almacenes,
                    "mensaje" => "todos los almacenes"
                ]
            );
        }
    }
}
