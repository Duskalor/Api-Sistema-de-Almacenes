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
        return response()->json(["Usuarios" => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "FullName" => "required",
                "email" => "required|email",
                "Usuario" => "required",
                "password" => "required",
                "IdPermisos" => "required"
            ]
        );


        $user = User::find($id);
        $user->FullName = $request->FullName;
        $user->email = $request->email;
        $user->Usuario = $request->Usuario;
        $user->password = Hash::make($request->password);
        $user->IdPermisos = $request->IdPermisos;
        $user->save();

        return response()->json(["mensaje" => "Update correcto"]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "mensaje" => "Usuario Eliminado Correctamente"
        ]);
    }
}
