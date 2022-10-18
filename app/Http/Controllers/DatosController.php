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
        return response()->json(["Datos" => $Datos]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "RazonSocial" => "required",
                "Ruc" => "required",
                "Direccion" => "required",
                "Logo" => "required",
            ]
        );


        $Datos = Datos::find($id);
        $Datos->RazonSocial = $request->RazonSocial;
        $Datos->Ruc = $request->Ruc;
        $Datos->Direccion = $request->Direccion;
        $Datos->Logo = $request->Logo;
        $Datos->save();

        return response()->json(["mensaje" => "Datos actualizados"]);
    }
}
