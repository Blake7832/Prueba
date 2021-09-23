<?php

use App\Http\Controllers\RolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
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

Route::get('test',[UserLoginController::class,'index']);
Route::post('test',[UserLoginController::class,'store']);
Route::put('test/{id}',[UserLoginController::class,'store']);

Route::get('createRol',[RolController::class,'index']);
Route::post('createRol',[RolController::class,'store']);
Route::put('createRol/{rols}',[RolController::class,'update']);
Route::delete('createRol/{rols}',[RolController::class,'destroy']);

Route::get('/hola',function (){
  return "hola mundo";
});