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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Sanctum Auth
Route::group(['middleware' => 'auth:api'], function () {
    Route::post("create", [\App\Http\Controllers\ApiController::class, 'store']);
    Route::get("list/{id?}", [\App\Http\Controllers\ApiController::class, 'list']);
    Route::post("update/{id}", [\App\Http\Controllers\ApiController::class, 'update']);
    Route::delete("delete/{id}", [\App\Http\Controllers\ApiController::class, 'destroy']);
    Route::get("search/{name}", [\App\Http\Controllers\ApiController::class, 'search']);
    Route::post("validate", [\App\Http\Controllers\ApiController::class, 'validation']);
    Route::post('details', [\App\Http\Controllers\UserController::class, 'details']);
});
Route::post("login", [\App\Http\Controllers\UserController::class, 'login']);
