<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check())
        return redirect('makingShop');
    return view('welcome');
})->name('root');

Route::post('preLogin', [\App\Http\Controllers\userController::class, 'preLogin'])->name("preLogin");
Route::post('login', [\App\Http\Controllers\userController::class, 'login'])->name("login");

Route::middleware('auth')->group(function(){
    Route::get("makingShop", [\App\Http\Controllers\shopController::class, 'makingShopRedirect'])->name("makingShopRedirect");
    Route::post("createShop", [\App\Http\Controllers\shopController::class, 'create'])->name("createShop");
    Route::middleware('msAuth')->group(function(){
        Route::get("editShop/{unique_id}", [\App\Http\Controllers\shopController::class, "updateShopRedirect"]);
        Route::post("editShop/{unique_id}", [\App\Http\Controllers\shopController::class, "updateShop"])->name('editShop');
    });
});
