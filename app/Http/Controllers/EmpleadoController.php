<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = Empleado::all();
        return response()->json([
            "ListaDeEmpleados" => $empleado,
            "mensaje" => " todos los empleados"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "FullName" => "required",
            "Cargo" => "required"
        ]);

        $cliente = new Empleado();
        $cliente->FullName = $request->FullName;
        $cliente->Cargo = $request->Cargo;
        $cliente->active = 1;
        $cliente->save();

        $cliente = Empleado::all();
        return response()->json([
            "ListaDeEmpleados" => $cliente,
            "mensaje" => "Cliente creado"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "FullName" => "required",
            "Cargo" => "required"
        ]);

        $Empleado = Empleado::find($id);
        $Empleado->FullName = $request->FullName;
        $Empleado->Dni = $request->Dni;
        $Empleado->save();

        $Empleado = Empleado::all();


        return response()->json([
            "ListaDeEmpleados" => $Empleado,
            "mensaje" => "Empleado Actualizado"
        ]);
    }

    public function destroy($id)
    {
        $Empleado  = Empleado::find($id);
        $Empleado->delete();

        $Empleados = Empleado::all();
        return response()->json(
            [
                "ListaDeEmpleados" => $Empleados,
                "mensaje" => "Empleado Eliminado",
            ]
        );
    }
}
