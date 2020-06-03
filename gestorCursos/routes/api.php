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

Route::apiResource('cursos',"ApiCursoController");
Route::apiResource('users',"ApiUserController");
Route::apiResource('alumnos',"ApiAlumnoController",['only'=>['index','show']]);

Route::fallback(function(){
    return response()->json(['mensaje'=>'Ruta no encontrada'],404);
});
