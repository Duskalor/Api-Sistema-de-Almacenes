<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'FullName' => "required",
            'Usuario' => "required",
            'email' => "required|email|unique:users",
            'password' => "required|confirmed|min:6",
            'password_confirmation' => 'required|same:password',
            'IdPermisos' => "required",
        ]);

        $user = new User();
        $user->FullName = $request->FullName;
        $user->Usuario =  $request->Usuario;
        $user->email =    $request->email;
        $user->password = Hash::make($request->password);
        $user->IdPermisos = $request->IdPermisos;
        $user->save();
        $user = User::all();
        return response()->json(["ListaUsuarios" => $user, "mensaje " => "registrado correctamente"]);
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $LoginUser = User::where("email", $request->email)->first();

        if (!isset($LoginUser)) {
            return response()->json(["mensaje" => "usuario no existe"]);
        }
        if (!(Hash::check($request->password, $LoginUser->Password))) {
            return response()->json(["mensaje" => "Contraseña incorrecta"]);
        }

        $token = $LoginUser->createToken("token_Access")->plainTextToken;

        return response()->json([
            "User" => $LoginUser,
            "token" => $token,
            "mensaje" => "Login Correcto"
        ]);
    }
    public function Logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(["mensaje" => "Se cerro correctamente"]);
    }
}
