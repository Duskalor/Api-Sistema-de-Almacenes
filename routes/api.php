<?php

use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DetallesEntradaController;
use App\Http\Controllers\DetallesSalidaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RefreshController;
use App\Http\Controllers\SalidaController;
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

Route::middleware('auth:sanctum')->group(function () {

    //RUTA PRODUCTOS
    Route::get("producto", [ProductoController::class, "index"]);
    Route::post("producto/create", [ProductoController::class, "store"]);
    Route::put("producto/update/{id}", [ProductoController::class, "update"]);
    Route::delete("producto/delete/{id}", [ProductoController::class, "destroy"]);

    // RUTA USUARIOS
    Route::get("user", [UserController::class, "index"]);
    Route::get("user/details/{id}", [UserController::class, "details"]);

    Route::put("user/update/{id}", [UserController::class, "update"]);
    Route::delete("user/delete/{id}", [UserController::class, "delete"]);

    // RUTA CLIENTES
    Route::get("cliente", [ClienteController::class, "index"]);
    Route::post("cliente/create", [ClienteController::class, "store"]);
    Route::put("cliente/update/{id}", [ClienteController::class, "update"]);
    Route::delete("cliente/delete/{id}", [ClienteController::class, "destroy"]);

    // RUTA ALMACENES
    Route::get("almacenes", [AlmacenesController::class, "index"]);
    Route::post("almacenes/create", [AlmacenesController::class, "store"]);
    Route::put("almacenes/update/{id}", [AlmacenesController::class, "update"]);
    Route::delete("almacenes/delete/{id}", [AlmacenesController::class, "destroy"]);

    //RUTA PROVEEDORES
    Route::get("proveedor", [ProveedorController::class, "index"]);
    Route::post("proveedor/create", [ProveedorController::class, "store"]);
    Route::put("proveedor/update/{id}", [ProveedorController::class, "update"]);
    Route::delete("proveedor/delete/{id}", [ProveedorController::class, "destroy"]);

    //RUTA PERMISOS
    Route::get("permisos", [PermisosController::class, "index"]);
    Route::post("permisos/create", [PermisosController::class, "store"]);
    Route::put("permisos/update/{id}", [PermisosController::class, "update"]);
    Route::delete("permisos/delete/{id}", [PermisosController::class, "destroy"]);

    //RUTA DATOS
    Route::get("datos", [DatosController::class, "index"]);
    Route::put("datos/update/{id}", [DatosController::class, "update"]);

    //RUTA ENTRADA
    Route::get("entrada", [EntradaController::class, "index"]);
    Route::post("entrada/create", [EntradaController::class, "store"]);
    Route::put("entrada/update/{id}", [EntradaController::class, "update"]);
    Route::delete("entrada/delete/{id}", [EntradaController::class, "destroy"]);

    //RUTA DETALLE ENTRADA
    Route::get("detalleEntrada", [DetallesEntradaController::class, "index"]);
    Route::post("detalleEntrada/create", [DetallesEntradaController::class, "store"]);
    Route::put("detalleEntrada/update/{id}", [DetallesEntradaController::class, "update"]);
    Route::delete("detalleEntrada/delete/{id}", [DetallesEntradaController::class, "destroy"]);


    //RUTA SALIDA
    Route::get("salida", [SalidaController::class, "index"]);
    Route::post("salida/create", [SalidaController::class, "store"]);
    Route::put("salida/update/{id}", [SalidaController::class, "update"]);
    Route::delete("salida/delete/{id}", [SalidaController::class, "destroy"]);

    //RUTA DETALLE SALIDA
    Route::get("detalleSalida", [DetallesSalidaController::class, "index"]);
    Route::post("detalleSalida/create", [DetallesSalidaController::class, "store"]);
    Route::put("detalleSalida/update/{id}", [DetallesSalidaController::class, "update"]);
    Route::delete("detalleSalida/delete/{id}", [DetallesSalidaController::class, "destroy"]);


    // RUTA USUARIOS/AUTCH
    Route::post("user/create", [UserAuthController::class, "create"]);
    Route::get("logout", [UserAuthController::class, "Logout"]);
});




Route::post("login", [UserAuthController::class, "login"]);
