<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'FullName' => "required",
            'Usuario' => "required|unique:users",
            'email' => "required|email|unique:users",
            'password' => "required|confirmed|min:6",
            'password_confirmation' => 'required|same:password',
            'IdPermisos' => "required",
            'IdAlmacenes' => "required",
        ]);

        $user = new User();
        $user->FullName = $request->FullName;
        $user->Usuario =  $request->Usuario;
        $user->email =    $request->email;
        $user->password = Hash::make($request->password);
        $user->IdPermisos = $request->IdPermisos;
        $user->IdAlmacenes = $request->IdAlmacenes;
        $user->save();
        $user = User::all();
        return response()->json(["ListaUsuarios" => $user, "mensaje " => "registrado correctamente"]);
    }
    public function login(Request $request)
    {
        $request->validate([
            "Usuario" => "required",
            "password" => "required"
        ]);

        $LoginUser = User::where("Usuario", $request->Usuario)->first();

        if (!isset($LoginUser)) {
            return response()->json(["mensaje" => "usuario o contraseña incorrecto", "success" => false]);
        }
        if (!(Hash::check($request->password, $LoginUser->Password))) {
            return response()->json(["mensaje" => "Contraseña incorrecta"]);
        }

        $token = $LoginUser->createToken("token_Access")->plainTextToken;

        return response()->json([
            "User" => $LoginUser,
            "userToken" => $token,
            "success" => true,
            "mensaje" => "Login Correcto"
        ]);
    }
    public function Logout()
    {
        auth('sanctum')->user()->currentAccessToken()->delete();
        return response()->json([
            "success" => false,
            "mensaje" => "Se cerro correctamente"
        ]);
    }
}
