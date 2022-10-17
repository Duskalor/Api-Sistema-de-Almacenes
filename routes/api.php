<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("login", [UserAuthController::class, "login"]);
Route::post("register", [UserAuthController::class, "register"]);



Route::get("user", [UserController::class, "index"]);
Route::put("user/update/{id}", [UserController::class, "update"]);


Route::get("cliente", [ClienteController::class, "index"]);
Route::post("cliente/create", [ClienteController::class, "store"]);
Route::put("cliente/update/{id}", [ClienteController::class, "update"]);
Route::delete("cliente/delete/{id}", [ClienteController::class, "destroy"]);
