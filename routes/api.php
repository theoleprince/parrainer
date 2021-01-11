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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {

    Route::post('token', [App\Http\Controllers\Api\AuthController::class, 'login']);


    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('user', [App\Http\Controllers\Api\AuthController::class, 'user']);
        Route::delete('token', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::post('updatepassword', [App\Http\Controllers\Api\AuthController::class, 'updatePassword']);
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/create', [App\Http\Controllers\Api\UserController::class, 'create']);
    Route::get('/update', [App\Http\Controllers\Api\UserController::class, 'update']);
    Route::get('/delete', [App\Http\Controllers\Api\UserController::class, 'delete']);
    Route::get('/info', [App\Http\Controllers\Api\UserController::class, 'getUserInfo']);
    Route::get('/', [App\Http\Controllers\Api\UserController::class, 'getUsers']);
});
