<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
// use App\Http\Controllers\ResourceClient;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('client', [ClientController::class,'client']);
// Route::get('client/{id}', [ClientController::class,'clientId']);
// Route::post('client', [ClientController::class,'clientSave']);
// Route::put('client/{id}', [ClientController::class,'clientUpdate']);
// Route::delete('client/{id}', [ClientController::class,'clientDelete']);


Route::post('client/login',[App\Http\Controllers\ResourceClient::class,'login']);
Route::post('client/register',[App\Http\Controllers\ResourceClient::class,'register']);
Route::apiResource('client',ResourceClient::class);
Route::apiResource('user',ResourceUser::class);
