<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $producto = Producto::all();
            return response()->json([
                "ListaProductos" => $producto,
                "mensaje" => " todos los productos"
            ]);
        } else {
            $productos = Producto::where("active", true)->get();

            return response()->json(
                [
                    "ListaProductos" => $productos,
                    "mensaje" => " todos los productos"
                ]
            );
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "Codigo"       => "required|unique:productos",
            "Descripcion"  => "required",
            "Categoria"    => "required",
            "Stock"        => "required",
        ]);

        $producto = new Producto();
        $producto->Codigo = $request->Codigo;
        $producto->Descripcion = $request->Descripcion;
        $producto->active = true;
        $producto->Categoria = $request->Categoria;
        $producto->Stock = $request->Stock;
        $producto->save();

        $producto = Producto::all();
        return response()->json([
            "ListaProductos" => $producto,
            "mensaje" => "producto creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            "Descripcion" => "required",
            "Categoria" => "required",
            "active" => "required",
            "Stock" => "required"
        ]);

        $producto = Producto::find($id);

        $producto->Descripcion = $request->Descripcion;
        $producto->Categoria = $request->Categoria;
        $producto->active = $request->active;
        $producto->Stock = $request->Stock;
        $producto->save();

        $producto = Producto::all();
        return response()->json([
            "ListaProductos" => $producto,
            "mensaje" => "producto Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $producto  = Producto::find($id);
        $producto->active = false;
        $producto->save();


        $userCode =  auth('sanctum')->user()->IdPermisos;
        if ($userCode == 1) {
            $producto = Producto::all();
            return response()->json([
                "ListaProductos" => $producto,
                "mensaje" => "producto Eliminado"
            ]);
        } else {
            $productos = Producto::where("active", true)->get();

            return response()->json(
                [
                    "ListaProductos" => $productos,
                    "mensaje" => " todos los productos"
                ]
            );
        }
    }
}
