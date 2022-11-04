<?php

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

Route::apiResource('mascotas', 
    \App\Http\Controllers\MascotaController::class);

// Route::get('/usuarios', function() {
//     return \App\Models\Usuario::all();
// });

Route::apiResource('usuarios', 
    \App\Http\Controllers\UsuarioController::class);

// Route::get(
//         'usuarios', post
//         'App\Http\Controllers\UsuarioController@index'
//     ) -> name('usuarios.index');


// localhost:8000/api/usuario/10/mascotas
Route::post("usuarios/{usuario}/mascotas",
    "App\Http\Controllers\UsuarioController@agregarMascota")->name
    ("usuario.agregarMascota");

Route::get("usuarios/{usuario}/mascotas",
    "App\Http\Controllers\UsuarioController@mascotas")->name
    ("usuario.mascotas");
    
    // Route::apiResource("trabajos_usuarios",
    // "App\Http\Controllers\trabajos_usuarios");
Route::apiResource('trabajos_usuarios', 
    \App\Http\Controllers\TrabajoUsuarioController::class);

Route::post("trabajos_usuarios/trabajo/{trabajo}/usuario/{usuario}",
        "App\Http\Controllers\TrabajoUsuarioController@asignar_trabajo_usuario")
    ->name("trabajos_usuarios.asignar_trabajo_usuario");