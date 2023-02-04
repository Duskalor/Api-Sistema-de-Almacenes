<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Datos = Datos::all();
        //dd($Datos);
        return response()->json(["Datos" => $Datos]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "RazonSocial" => "required",
                "Ruc" => "required",
                "Direccion" => "required",
            ]
        );


        $Datos = Datos::find($id);
        $Datos->RazonSocial = $request->RazonSocial;
        $Datos->Ruc = $request->Ruc;
        $Datos->Direccion = $request->Direccion;
        $Datos->save();
        $Datos = Datos::all();

        return response()->json(["Datos" => $Datos, "mensaje" => "Datos actualizados"]);
    }
    public function report()
    {
        // $ListaDatos =  ["producto", "user", "cliente", "proveedor", "permisos", "entrada", "salida"];
        $ListaDatos =  ["entrada", "salida"];
        return response()->json(["ListaDatos" => $ListaDatos]);
    }
}
