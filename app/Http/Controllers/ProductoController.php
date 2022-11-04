<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return response()->json([
            "ListaProductos" => $producto,
            "mensaje" => " todos los productos"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "Codigo" => "required|unique:productos",
            "Descripcion" => "required",
            "Categoria" => "required",
            "PrecioCompra" => "required",
            "PrecioVenta" => "required",
            "Stock" => "required"
        ]);

        $producto = new Producto();
        $producto->Codigo = $request->Codigo;
        $producto->Descripcion = $request->Descripcion;
        $producto->Categoria = $request->Categoria;
        $producto->PrecioCompra = $request->PrecioCompra;
        $producto->PrecioVenta = $request->PrecioVenta;
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
            "PrecioCompra" => "required",
            "PrecioVenta" => "required",
            "Stock" => "required"
        ]);

        $producto = Producto::find($id);

        $producto->Descripcion = $request->Descripcion;
        $producto->Categoria = $request->Categoria;
        $producto->PrecioCompra = $request->PrecioCompra;
        $producto->PrecioVenta = $request->PrecioVenta;
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
        $producto->delete();
        $producto = Producto::all();
        return response()->json(
            ["ListaProductos" => $producto, "mensaje" => "producto Eliminado"]
        );
    }
}
