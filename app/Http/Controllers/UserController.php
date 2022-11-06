<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json(["ListaUsuarios" => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "FullName" => "required",
                "email" => "required|email",
                "Usuario" => "required",
                "IdPermisos" => "required"
            ]
        );
        if ($id === 4) {
            return response()->json([
                "mensaje" => "Usuario No se puede eliminar"
            ]);
        }

        $user = User::find($id);
        $user->FullName = $request->FullName;
        $user->email = $request->email;
        $user->Usuario = $request->Usuario;
        $user->IdPermisos = $request->IdPermisos;
        $user->save();

        $user = User::all();
        return response()->json(["ListaUsuarios" => $user, "mensaje" => "Update correcto"]);
    }

    public function delete($id)
    {
        if ($id === 4) {
            return response()->json([
                "mensaje" => "Usuario No se puede eliminar"
            ]);
        }
        $user = User::find($id);
        $user->delete();
        $user = User::all();
        return response()->json([
            "ListaUsuarios" => $user,
            "mensaje" => "Usuario Eliminado Correctamente"
        ]);
    }
}
