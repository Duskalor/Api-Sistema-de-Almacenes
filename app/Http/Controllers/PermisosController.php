<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permisos = Permisos::all();
        return response()->json(["Listapermisos" => $Permisos]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "Descripcion" => "required|unique:permisos",
                "Salidas" => "required",
                "Entradas" => "required",
                "Productos" => "required",
                "Clientes" => "required",
                "Proveedores" => "required",
                "Inventario" => "required",
                "Configuracion" => "required"
            ]
        );

        $Permisos =  new Permisos;
        $Permisos->Descripcion = $request->Descripcion;
        $Permisos->Salidas = $request->Salidas;
        $Permisos->Usuarios = $request->Usuarios;
        $Permisos->Entradas = $request->Entradas;
        $Permisos->Productos = $request->Productos;
        $Permisos->Clientes = $request->Clientes;
        $Permisos->Proveedores = $request->Proveedores;
        $Permisos->Inventario = $request->Inventario;
        $Permisos->Configuracion = $request->Configuracion;
        $Permisos->save();

        $Permisos = Permisos::all();
        return response()->json([
            "Listapermisos" => $Permisos,
            "mensaje" => "Permiso creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "Salidas" => "required",
                "Entradas" => "required",
                "Productos" => "required",
                "Clientes" => "required",
                "Proveedores" => "required",
                "Inventario" => "required",
                "Configuracion" => "required"
            ]
        );
        if ($id === 1 || $id === 2) {
            return response()->json([
                "mensaje" => "Permiso No se puede editar"
            ]);
        }

        $Permisos = Permisos::find($id);
        $Permisos->Salidas = $request->Salidas;
        $Permisos->Usuarios = $request->Usuarios;
        $Permisos->Entradas = $request->Entradas;
        $Permisos->Productos = $request->Productos;
        $Permisos->Clientes = $request->Clientes;
        $Permisos->Proveedores = $request->Proveedores;
        $Permisos->Inventario = $request->Inventario;
        $Permisos->Configuracion = $request->Configuracion;
        $Permisos->save();
        $Permisos = Permisos::all();
        return response()->json(["Listapermisos" => $Permisos, "mensaje" => "Permiso actualizado"]);
    }

    public function destroy($id)
    {

        if ($id === 1 || $id === 2) {
            return response()->json([
                "mensaje" => "Permiso No se puede eliminar"
            ]);
        }
        $Permisos = Permisos::find($id);
        $Permisos->delete();
        $Permisos = Permisos::all();
        return response()->json([
            "Listapermisos" => $Permisos,
            "mensaje" => "Permiso Eliminado Correctamente"
        ]);
    }
}
