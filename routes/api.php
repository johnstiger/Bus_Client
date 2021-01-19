<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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

Route::apiResource('client',ResourceClient::class);
