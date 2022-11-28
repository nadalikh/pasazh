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
Route::post('preLogin', [\App\Http\Controllers\Api\userController::class, 'preLogin']);
Route::post('login', [\App\Http\Controllers\Api\userController::class, 'login']);
Route::middleware('auth:sanctum')->prefix('shop')->group(function(){
    Route::post("create", [\App\Http\Controllers\Api\shopController::class, "create"]);
    Route::post("edit/{shop_id}", [\App\Http\Controllers\Api\shopController::class, "update"])->middleware('msAuth');
});
Route::middleware(['auth:sanctum', 'msAuth'])->prefix('product')->group(function(){
    Route::post("create/{shop_id}", [\App\Http\Controllers\Api\productController::class, "create"]);
    Route::post("getAll/{shop_id}", [\App\Http\Controllers\Api\productController::class, "getAll"]);
});


